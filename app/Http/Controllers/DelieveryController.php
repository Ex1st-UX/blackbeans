<?php

namespace App\Http\Controllers;

use App\Models\Delievery;
use Illuminate\Http\Request;

class DelieveryController extends Controller
{
    public function delievery_list() {
        $delievery = new Delievery();

        return view('admin.delievery.delievery', ['data' => $delievery]);
    }

    public function delievery_add() {
        $delievery = new Delievery();

        return view('admin.delievery.delievery-add', ['data' => $delievery]);
    }

    public function delievery_add_submit(Request $req) {
        $delievery = new Delievery();

        $delievery->active = 'Y';
        $delievery->name = $req->input('name');
        $delievery->cost = $req->input('cost');
        $delievery->image = $req->file('image')->store('uploads', 'public');

        $delievery->save();

        return view('admin.delievery.delievery');
    }
}
