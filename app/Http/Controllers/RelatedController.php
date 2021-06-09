<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RelatedController extends Controller
{
    public function setProductCookie(Request $req) {
        // Проверяем, есть ли ID Пользователя в куки. Если нет - записываем
        if (!Cookie::get('user_id')) {
            $generate_id = intval(uniqid());
            $user_id = $generate_id;
        } else {
            $user_id = Cookie::get('user_id');
        }

        $arRelated = array(
            22,33,44
        );
    }
}
