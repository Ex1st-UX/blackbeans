<?php

namespace App\Http\Controllers;

use App\Models\Delievery;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;

// TODO: Вынести user_id в свойство контроллера
class CartController extends Controller
{
    // Получаем состояние корзины и отправляем клиенту в JSON
    public function cart_condition(Request $req)
    {
        if ($req->ajax()) {
            $user_id = Cookie::get('user_id');

            // Если корзина не пуста, возвращаем JSON
            if (\Cart::session($user_id)->isEmpty()) {
                $data = false;
            } else {
                $user_id = Cookie::get('user_id');

                \Cart::session($user_id);

                $data = \Cart::getContent();
            }

            return response()->json(['data' => $data]);
        }
    }

    //Обновляем товар из корзины
    public function cartRenderAction(Request $req)
    {
        $user_id = Cookie::get('user_id');

        if (\Cart::session($user_id)->isEmpty()) {

            return response()->json(['data' => false]);
        } else {
            // Удаление товара
            if ($req->action == 'delete') {
                \Cart::session($user_id)->remove($req->id);
            }

            // Уменьшить количество
            if ($req->action == 'minus') {
                $newQty = $req->quantity - 1;

                \Cart::session($user_id)->update($req->id, array(
                    'quantity' => $newQty,
                ));
            }

            // Увеличить количество
            if ($req->action == 'plus') {
                $newQty = $req->quantity + 1;

                \Cart::session($user_id)->update($req->id, array(
                    'quantity' => $newQty,
                ));
            }

            $data = \Cart::getContent();
            $cartTotal = \Cart::session($user_id)->getTotal();

            return response()->json(['data' => $data, 'cartTotal' => $cartTotal]);
        }
    }

    public function cart()
    {
        $delievery = new Delievery();
        $deliveryData = $delievery->all();

        $user_id = Cookie::get('user_id');

        if (\Cart::session($user_id)->isEmpty()) {
            $cartData = false;
        }
        else {
            $cartData = true;
        }

        return view('templates.cart', ['dataDelievery' => $deliveryData, 'cartData' => $cartData]);
    }
}
