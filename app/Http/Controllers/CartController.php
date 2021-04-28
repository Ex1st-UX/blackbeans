<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
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
            // куки
            if (!Cookie::get('user_id')) {
                $generate_id = intval(uniqid());
                $user_id = $generate_id;
            } else {
                $user_id = Cookie::get('user_id');
            }

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

    // Получаем корзину
    public function cart_render(Request $req)
    {
        if ($req->ajax()) {

            // куки
            if (!Cookie::get('user_id')) {
                $generate_id = intval(uniqid());
                $user_id = $generate_id;
            } else {
                $user_id = Cookie::get('user_id');
            }

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
    public function cart_update(Request $req) {

        $user_id = Cookie::get('user_id');

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

        return response()->json(['data' => $data]);
    }

    public function cart()
    {
        return view('templates.cart');
    }
}
