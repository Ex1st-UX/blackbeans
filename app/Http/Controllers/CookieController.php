<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public static function saveCookie()
    {
        $response = new Response();

        if (!Cookie::get('user_id')) {
            $generate_id = random_int(1, 99999);
            $user_id = $generate_id;
        }

        $response->withCookie(cookie('user_id', $user_id, 999));

        return $response;
    }
}
