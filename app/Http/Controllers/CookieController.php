<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function getUserID()
    {
        if (!Cookie::get('user_id')) {
            $response = new Response('user_id');
            $generate_id = random_int(1, 99999);

            $response->withCookie(cookie('user_id', $generate_id, 999));

            return $response;
        }
    }
}
