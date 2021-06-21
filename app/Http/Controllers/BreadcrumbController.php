<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as pathRequest;
use App\Models\Product;

class BreadcrumbController extends Controller
{
    protected $pages = array();

    protected function getUrl()
    {
        $path = pathRequest::path();

        $pages = explode('/', $path);

        $this->pages = $pages;
    }

    public function getBreadcrumb()
    {
        $this->getUrl();

        if ($this->pages[0] == 'shop') {
           $productName = $this->getPagesProducts($this->pages[1]);

           $this->pages[1] = $productName;
        }

        return $this->pages;
    }

    protected function getPagesProducts($productId)
    {
        $product = new Product();

        $productName = $product->find($productId);

        return $productName->name;
    }
}
