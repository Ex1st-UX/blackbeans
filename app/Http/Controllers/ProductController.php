<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;


class ProductController extends Controller
{
    public function add_product(Request $req)
    {
        $category = new Category();
        $product = new Product();
        $skuProduct = new Sku();

        // Записываем товар в БД
        $product->name = $req->input('name');
        $product->price = $req->input('price');
        $product->description = $req->input('description');
        $product->acidity = $req->input('acidity');
        $product->dencity = $req->input('dencity');
        $product->image = $req->file('image')->store('uploads', 'public');
        $product->category_list = implode($req->input('options'), ', ');

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
        $category->category = implode($req->input('options'), ', ');

        $category->save();

        return redirect()->route('product-admin')->with('success', 'товар добавлен');
    }

    public function product_edit_page($id)
    {
        $product = new Product();

        return view('admin.product.product-edit', ['product' => $product->find($id)]);
    }

    public function product_edit($id, Request $req)
    {

        $product = Product::find($id);

        $product->name = $req->input('name');
        $product->price = $req->input('price');
//        $product->price_2 = $req->input('price_2');
        $product->description = $req->input('description');
        $product->acidity = $req->input('acidity');
        $product->dencity = $req->input('dencity');
        $product->image = $req->file('image')->store('uploads', 'public');

        $product->save();

        return redirect()->route('product-admin')->with('success', 'товар изменен');
    }

    public function product_list_admin(Request $req)
    {
        $product = new Product();

        return view('admin.product.product-content', ['data' => $product->all()]);
    }

    public function product_list()
    {
        $product = new Product();
        return view('home', ['product' => $product->all()]);
    }

    public function product_detail($id, Request $req)
    {

        $product = Product::where('id', $id)->first();

        return view('templates.product.detail-product', ['data' => $product]);
    }

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
            }
            else {
                $sku = false;
                $dataSku = 'no';
            }

            // Добавляемый товар является торговым предложением
            if ($sku) {
                $skuProduct = Sku::where('id', $req->id)->first();

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
            }

            // Добавляемый товар НЕ является торговым предложением
            elseif (!$sku) {
                $product = Product::where('id', $req->id)->first();

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

    public function cart_condition(Request $req) {

        if ($req->ajax()) {

            $user_id = Cookie::get('user_id');

            \Cart::session($user_id);

            $data = \Cart::getContent();

            return response()->json($data);
        }
    }

    public function cart() {
        return view('templates.cart');
    }
}
