<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryList;
;

class CategoryController extends Controller
{
    public function category_list() {
        $category = new CategoryList();
        return view('admin.product.category-content', ['data' => $category->all()]);
    }

    public function category_add(Request $req) {
        $category = new CategoryList();

        $category->name = $req->input('name');

        $category->save();

        return redirect()->route('category-admin');
    }
}
