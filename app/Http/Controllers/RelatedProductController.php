<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class RelatedProductController extends Controller
{
    protected static $category;

    public static function getRelatedProducts($id) {
        $product = new Product();

        $productItem = $product->find($id);

        self::$category = $productItem->category->category;
    }
}
