<?php

namespace App\Http\Controllers;

use App\Models\BasketOrder;
use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function orderCreate(Request $req)
    {

        $basketOrder = new BasketOrder();
        $order = new Order();
        $productEntity = new Product();
        $skuEntity = new Sku();

        $user_id = Cookie::get('user_id');

        $data = \Cart::session($user_id)->getContent();

        // Записываем данные о покупателе
        $order->name = $req->name;
        $order->surname = $req->surname;
        $order->email = $req->email;
        $order->phone = $req->phone;

        // Адресс
        $order->city = $req->city;
        $order->street = $req->street;
        $order->apps = $req->appartments;
        $order->postcode = $req->postcode;

        // Доставка и оплата
        $order->delievery_id = intval($req->delievery);
        $order->payment_id = intval($req->payment);

        // Стоимость доставка, скидки и оплата
        $order->delievery_cost = $req->delieveryCost;
        $order->total = intval($req->total);
        $order->discount = intval($req->discount);

        $order->save();

        // Записываем корзину заказа из сессиси с содержимым корзины
        $orderId = $order->id;

        foreach ($data as $key => $value) {
            $products = array(
                'order_id' => $orderId,
                'product_id' => $value->id,
                'grind' => $value->attributes->grind,
                'quantity' => $value->quantity,
            );

            $basketInsert = $basketOrder->insert($products);
        }

        // Записываем товарам в заказе популярность
        foreach ($data as $item) {

            // Если товар является торговым предложением, то получаем его ID
            if ($item->attributes->sku == 'yes') {
                $skuId = $skuEntity->where('id', '=', $item->id)->select('product_id')->get();

                foreach ($skuId as $item) {
                    $item->id = $item->product_id;
                }
            }

            $currPopularity = $productEntity->where('id', '=', $item->id)->select('popularity')->first();

            $popularityInsert = $productEntity->where('id', '=', $item->id)->update(array(
                'popularity' => $currPopularity->popularity + $item->quantity
            ));
        }

        if ($basketInsert) {
            return response()->json(array('orderId' => $orderId));
        } else {
            return response()->json(array('orderId' => 'Ошибка. Попробуйте снова'));
        }
    }
}
