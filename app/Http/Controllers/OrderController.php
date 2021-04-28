<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function orderCreate(Request $req) {

        $order = new Order();

        $user_id = Cookie::get('user_id');

        $data = \Cart::session($user_id)->getContent();

        foreach ($data as $key => $value) {

            
        }

        return response()->json($newAr);
    }
}
