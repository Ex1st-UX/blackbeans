<?php

namespace App\Http\Controllers;

use App\Models\SaleMark;
use Darryldecode\Cart\Cart;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\RelatedController;
use Illuminate\Support\Facades\Request as pathRequest;
use App\Http\Controllers\BreadcrumbController;


class ProductController extends Controller
{
    // Добавить товар в админке
    public function add_product(Request $req)
    {
        $category = new Category();
        $product = new Product();
        $skuProduct = new Sku();
        $saleMark = new SaleMark();

        // Записываем товар в БД
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->acidity = $req->input('acidity');
        $product->dencity = $req->input('dencity');
        $product->image = $req->file('image')->store('uploads', 'public');
        $product->category_list = implode(',', $req->input('options'));

        $product->save();

        //Записываем торговое предложение в таблицу sku
        $parrentName = $req->input('name');

        $skuProduct->product_id = $product->id;
        $skuProduct->name = $parrentName . ' (1000г)';
        $skuProduct->price = $req->input('sku_price');
        $skuProduct->image = $req->file('sku_image')->store('uploads', 'public');

        $skuProduct->save();

        // Записываем категории товара в таблицу categories
        $category->product_id = $product->id;
        $category->category = implode(', ', $req->input('options'));

        $category->save();

        // Записываем маркетинговые метки
        $product_id = $product->id;
        $arSaleMarkNames = $req->input('saleMarks');

        foreach ($arSaleMarkNames as $item) {
            $arSaleMark = array(
                'product_id' => $product_id,
                'name' => $item
            );

            $saleMark->insert($arSaleMark);
        }

        return redirect()->route('product-admin')->with('success', 'товар добавлен');
    }

    // Изменить товар в админке
    public function product_edit_page($id)
    {
        $product = new Product();

        return view('admin.product.product-edit', ['product' => $product->find($id)]);
    }

    // Изменить товар в админке - отправка формы
    public function product_edit($id, Request $req)
    {
        $product = Product::find($id);

        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->acidity = $req->input('acidity');
        $product->dencity = $req->input('dencity');
        $product->image = $req->file('image')->store('uploads', 'public');

        $product->save();

        return redirect()->route('product-admin')->with('success', 'товар изменен');
    }

    // Показать список товаров в админке
    public function product_list_admin(Request $req)
    {
        $product = new Product();

        return view('admin.product.product-content', ['data' => $product->all()]);
    }

    // Показать товары на главной
    public function product_list_popularity()
    {
        $product = new Product();

        return view('home', ['product' => $product->all()->take(9)]);
    }

    public function product_list_sales()
    {
        $product = new Product();

        return view('home', ['product' => $product->all()->take(9)]);
    }

    // Детальная страница товара
    public function product_detail($id, Request $req)
    {
        $product = Product::where('id', $id)->first();

        return view('templates.product.detail-product', ['data' => $product]);
    }

    // Добавить товар в корзину
    public function product_add_to_cart(Request $req)
    {

        if ($req->ajax()) {

            // Проверяем, есть ли ID Пользователя в куки. Если нет - записываем
            if (!Cookie::get('user_id')) {
                $generate_id = intval(uniqid());
//                $user_id = $req->cookie('user_id', $generate_id);
                $user_id = $generate_id;
            } else {
                $user_id = Cookie::get('user_id');
            }

            if ($req->isSku == 'true') {
                $sku = true;
                $dataSku = 'yes';
            } else {
                $sku = false;
                $dataSku = 'no';
            }

            // Добавляемый товар является торговым предложением
            if ($sku) {
                $skuProduct = Sku::where('id', intval($req->id))->first();

                $data = array(
                    'id' => $skuProduct->id,
                    'name' => $skuProduct->name,
                    'price' => $skuProduct->price,
                    'quantity' => intval($req->qty),
                    'attributes' => array(
                        'image' => $skuProduct->image,
                        'sku' => $dataSku,
                        'grind' => $req->grind
                    ),
                );
            } // Добавляемый товар НЕ является торговым предложением
            elseif (!$sku) {
                $product = Product::where('id', intval($req->id))->first();

                $data = array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => intval($req->qty),
                    'attributes' => array(
                        'image' => $product->image,
                        'sku' => $dataSku,
                        'grind' => $req->grind
                    ),
                );
            }

            \Cart::session($user_id)->add($data);

            return response()->json(\Cart::getContent())->cookie('user_id', $user_id);
        }
    }

    // Показать все товары на странице каталога
    public function product_catalog_list()
    {
        $product = new Product();

        return view('templates.product.catalog-product', ['data' => $product->all()]);
    }

    // Фильтр на странице каталога
    public function category_filter(Request $req)
    {
        if ($req->ajax()) {

            $products = new Product();
            $categories = new Category();

            $option = $req->option;
            $direction = $req->sort;

            $allProducts = $products->join('categories', 'products.id', '=', 'categories.product_id')
                ->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

            // Сначала фильтр по категориям
            // Фильтр по категории "Турка"
            if ($req->item == 'category-turka') {

                $res = $products->join('categories', function ($join) {
                    $join->on('products.id', '=', 'categories.product_id')->where('categories.category', 'like', '%Турка%');
                })->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                if (!empty($option)) {
                    $data = $res->orderBy($option, $direction)->get();
                } else {
                    $data = $res->get();
                }
            } // Фильтр по категории "Гейзер"
            elseif ($req->item == 'category-gaser') {

                $res = $products->join('categories', function ($join) {
                    $join->on('products.id', '=', 'categories.product_id')->where('categories.category', 'like', '%Гейзер%');
                })->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                if (!empty($option)) {
                    $data = $res->orderBy($option, $direction)->get();
                } else {
                    $data = $res->get();
                }
            } // Фильтр по категории "Френч-пресс"
            elseif ($req->item == 'category-french') {

                $res = $products->join('categories', function ($join) {
                    $join->on('products.id', '=', 'categories.product_id')->where('categories.category', 'like', '%Френчпресс%');
                })->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                if (!empty($option)) {
                    $data = $res->orderBy($option, $direction)->get();
                } else {
                    $data = $res->get();
                }
            } // Фильтр по категории "Пуровер"
            elseif ($req->item == 'category-purover') {

                $res = $products->join('categories', function ($join) {
                    $join->on('products.id', '=', 'categories.product_id')->where('categories.category', 'like', '%Пуровер%');
                })->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                if (!empty($option)) {
                    $data = $res->orderBy($option, $direction)->get();
                } else {
                    $data = $res->get();
                }
            } // Фильтр по категории "Кофеварка"
            elseif ($req->item == 'category-cofemachine') {

                $res = $products->join('categories', function ($join) {
                    $join->on('products.id', '=', 'categories.product_id')->where('categories.category', 'like', '%Кофеварка%');
                })->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                if (!empty($option)) {
                    $data = $res->orderBy($option, $direction)->get();
                } else {
                    $data = $res->get();
                }
            } // Фильтр по категории "Кофеварка"
            elseif ($req->item == 'category-cup') {

                $res = $products->join('categories', function ($join) {
                    $join->on('products.id', '=', 'categories.product_id')->where('categories.category', 'like', '%Чашка%');
                })->join('skus', 'products.id', '=', 'skus.product_id')->select('products.image', 'products.price', 'products.name', 'dencity', 'category', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                if (!empty($option)) {
                    $data = $res->orderBy($option, $direction)->get();
                } else {
                    $data = $res->get();
                }
            } // Фильтр по тегам
            else {
                // Все товары
                if ($req->tag == 'all_items') {

                    if (!empty($option)) {
                        $data = $allProducts->orderBy($option, $direction)->get();
                    } else {
                        $data = $allProducts->orderBy('name', 'asc')->get();
                    }
                } // Рекомендуемые
                elseif ($req->tag == 'reccomended_items') {

                    $res = $products->join('sale_marks', function ($join) {
                        $join->on('products.id', '=', 'sale_marks.product_id')->where('sale_marks.name', '=', 'Рекомендуемые');
                    })->join('skus', 'products.id', '=', 'skus.product_id')->join('categories', 'categories.product_id', '=', 'products.id')->select('products.image', 'products.price', 'categories.category', 'products.name', 'dencity', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                    if (!empty($option)) {
                        $data = $res->orderBy($option, $direction)->get();
                    } else {
                        $data = $res->orderBy('name', 'asc')->get();
                    }
                } // Новинки
                elseif ($req->tag == 'new_items') {

                    $res = $products->join('sale_marks', function ($join) {
                        $join->on('products.id', '=', 'sale_marks.product_id')->where('sale_marks.name', '=', 'Новинки');
                    })->join('skus', 'products.id', '=', 'skus.product_id')->join('categories', 'categories.product_id', '=', 'products.id')->select('products.image', 'products.price', 'categories.category', 'products.name', 'dencity', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                    if (!empty($option)) {
                        $data = $res->orderBy($option, $direction)->get();
                    } else {
                        $data = $res->orderBy('name', 'asc')->get();
                    }
                } // Акции
                elseif ($req->tag == 'sales_item') {

                    $res = $products->join('sale_marks', function ($join) {
                        $join->on('products.id', '=', 'sale_marks.product_id')->where('sale_marks.name', '=', 'Акции');
                    })->join('skus', 'products.id', '=', 'skus.product_id')->join('categories', 'categories.product_id', '=', 'products.id')->select('products.image', 'products.price', 'categories.category', 'products.name', 'dencity', 'acidity', 'products.id', 'skus.id as sku_id', 'skus.price as sku_price');

                    if (!empty($option)) {
                        $data = $res->orderBy($option, $direction)->get();
                    } else {
                        $data = $res->orderBy('name', 'asc')->get();
                    }
                }
            }

            return response()->json(['data' => $data]);
        }
    }
}
