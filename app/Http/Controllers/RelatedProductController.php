<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class RelatedProductController extends Controller
{
    protected static $arCategory = array();
    protected static $arProductsId = array();

    public static function getRelatedProducts($id) {
       self::getCategory($id);
       self::getProductsId();  
       self::getProducts();     
   }
 // Заполняет массив категорий для выбранного товара
   protected static function getCategory($id) {
    $product = new Product();

    $productItem = $product->find($id);

    $arCategory = explode(', ', $productItem->category->category);

    self::$arCategory = $arCategory;
}
protected static function getProductsId() {
    $product = new Category();

    foreach (self::$arCategory as $categoryItem) {
        $resRelatedCategory = $product->inRandomOrder()->select('product_id')->where('category', 'like', '%' . $categoryItem . '%')->take(4)->get();

        foreach ($resRelatedCategory as $relatedItem) {
            $relatedProductsId[$relatedItem->product_id] = $relatedItem->product_id;
        }
    }

    

    self::$arProductsId = $relatedProductsId;
}

protected static function getProducts() {
    $product = new Product();

    foreach (self::$arProductsId as $item) {
        $res = $product->where('id', $item)->get();

        foreach ($res as $key => $arItem) {
            $arProduct[] = array(
                'name' => $arItem->name,
                'id' => $arItem->id
            );
        }
    }

    echo "<pre>";
    print_r($arProduct);
    echo "</pre>";
    exit;
}
}
