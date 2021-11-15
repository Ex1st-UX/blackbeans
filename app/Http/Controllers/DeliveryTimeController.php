<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryTimeController extends Controller
{
    public static function getDeliveryTime()
    {
        $timeNow = strtotime(date('Y-m-d H:i:s'));
        $timeNoDelivery = strtotime(date('Y-m-d') . ' 19:00');

        if ($timeNow <= $timeNoDelivery) {
            $html = '<p class="delivery_time_text">Доставим <span style="color: green">сегодня</span></p>';
        }
        else {
            $html = '<p class="delivery_time_text">Доставим <span style="color: red">завтра с 10:00</span></p>';
        }

        echo $html;
    }
}
