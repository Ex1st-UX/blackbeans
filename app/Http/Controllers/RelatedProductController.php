<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class RelatedProductController extends Controller
{
    protected static $arCategory = array();
    protected static $arProductsId = array();

    public static function getRelatedProducts($id)
    {
        self::getCategory($id);
        self::getProductsId($id);

        $arProducts = self::getProducts();

        return $arProducts;
    }

    // Заполняет массив категорий для выбранного товара
    protected static function getCategory($id)
    {
        $product = new Product();

        $productItem = $product->find($id);

        $arCategory = explode(', ', $productItem->category->category);

        self::$arCategory = $arCategory;
    }

    // Получает ID рекомендцуемых товаров
    protected static function getProductsId($id)
    {
        $product = new Category();

        foreach (self::$arCategory as $categoryItem) {
            $resRelatedCategory = $product->inRandomOrder()->select('product_id')->where('category', 'like', '%' . $categoryItem . '%')->take(3)->get();

            foreach ($resRelatedCategory as $relatedItem) {

                if ($relatedItem->product_id != $id) {
                    $relatedProductsId[] = $relatedItem->product_id;
                }
            }
        }

        self::$arProductsId = $relatedProductsId;
    }

    protected static function getProducts()
    {
        $product = new Product();

        foreach (self::$arProductsId as $item) {
            $res = $product->where('id', $item)->get();

            foreach ($res as $key => $arItem) {
                $arProducts[] = array(
                    'id' => $arItem->id,
                    'name' => $arItem->name,
                    'price' => $arItem->price,
                    'image' => $arItem->image,
                    'acidity' => $arItem->acidity,
                    'dencity' => $arItem->dencity,
                    'category' => $arItem->category->category,
                    'sku_price' => $arItem->sku->price
                );
            }
        }

        return $arProducts;
    }
}
