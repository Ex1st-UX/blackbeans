<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Delievery;
use App\Models\Payment;
use App\Models\BasketOrder;
use App\Models\Sku;
use Mail;

class MailController extends Controller
{
    static $orderData = array();

    public static function OrderAdminNotification($orderId)
    {
        self::getOrderData($orderId);

        Mail::send('templates.mail.order', array('data' => self::$orderData), function ($msg) {
            $msg->to('support@blackbeans.ru', 'Новый заказ' . self::$orderData['order_id'])->subject('Новый заказ №' . self::$orderData['order_id']);
            $msg->from('support@blackbeans.ru', 'BlackBeans - интернет магазин свежего кофе');
        });
    }

    protected static function getOrderData($orderId)
    {
        $order = new Order();

        $order = $order->where('id', $orderId)->get();

        foreach ($order as $orderItem) {
            // Доставка
            $delivery = new Delievery();
            $deliveryQuery = $delivery->where('id', $orderItem->delievery_id)->get();

            foreach ($deliveryQuery as $delievryItem) {
                $deliveryName = $delievryItem->name;
            }

            // Оплата
            if ($orderItem->payment_id == 1) {
                $paymentName = 'Оплата наличными';
            } elseif ($orderItem->payment_id == 2) {
                $paymentName = 'Онлайн оплата';
            }

            // Корзина заказа
            $basket = new BasketOrder();
            $basketQuery = $basket->where('order_id', $orderId)->get();

            foreach ($basketQuery as $basketItem) {
//                $product = new Product();
//                $productData = $product->where('id', $basketItem->product_id)->get();
//
//                foreach ($productData as $productItem) {
//                    $arBasketItems[$basketItem->product_id] = array(
//                        'name' => $productItem->name,
//                        'product_id' => $basketItem->product_id,
//                        'grind' => $basketItem->grind,
//                        'quantity' => $basketItem->quantity,
//                    );
//                }

                if ($basketItem->is_sku == 'yes') {
                    $productSku = new Sku();
                    $productSkuQuery = $productSku->where('id', $basketItem->product_id)->get();

                    foreach ($productSkuQuery as $productSkuItem) {
                        $productName = $productSkuItem->name;
                        $productPrice = $productSkuItem->price;
                        $productImage = $productSkuItem->image;
                    }
                } else {
                    $product = new Product();
                    $productQuery = $product->where('id', $basketItem->product_id)->get();

                    foreach ($productQuery as $productItem) {
                        $productName = $productItem->name;
                        $productPrice = $productItem->price;
                        $productImage = $productItem->image;
                    }
                }

                $arBasketItems[$basketItem->product_id] = array(
                    'product_id' => $basketItem->product_id,
                    'grind' => $basketItem->grind,
                    'quantity' => $basketItem->quantity,
                    'product_name' => $productName,
                    'product_price' => $productPrice,
                    'product_image' => $productImage
                );
            }

            // Формирования массива с окончательными данными
            $data = array(
                'order_id' => $orderId,
                'name' => $orderItem->name,
                'surname' => $orderItem->surname,
                'email' => $orderItem->email,
                'phone' => $orderItem->phone,
                'delivery' => $deliveryName,
                'payment' => $paymentName,
                'delivery_cost' => $orderItem->delievery_cost,
                'discount' => $orderItem->discount,
                'total' => $orderItem->total,
                'city' => $orderItem->city,
                'street' => $orderItem->street,
                'apps' => $orderItem->apps,
                'postcode' => $orderItem->postcode,
                'items' => $arBasketItems
            );
        }

        self::$orderData = $data;
    }
}
