<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

//    public $user_id;
//    public $cookie;

    public function __construct(Request $req)
    {
//        $this->user_id = $req->cookie('user_id', intval(uniqid()));
//
//        $this->cookie = Illuminate\Support\Facades\Cookie::get('user_id');

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
