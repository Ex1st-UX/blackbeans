<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as pathRequest;
use App\Models\Product;

class BreadcrumbController extends Controller
{
    protected $pages = array();
    protected $result = array();

    // Получает текущий юрл
    protected function getUrl()
    {
        $path = pathRequest::path();

        $pages = explode('/', $path);

        $this->pages = $pages;
    }

    // Функция показывает хлебные крошки на странице
    public function getBreadcrumb()
    {
        $this->getUrl();

        $this->getPagesName()
        ?>
        <section class="w3l-breadcrumb">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Главная</a></li>
                    <?php foreach ($this->result as $pageResult): ?>
                        <li class=""><span
                            class="fa fa-arrow-right mx-2" aria-hidden="true"></span><a target="_blank"
                            href="/<?= $this->pages[0] ?>"><?= $pageResult ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
        <?php
    }

    // Получает название страниц для товара
    protected function getPagesProducts($productId)
    {
        $product = new Product();

        $productName = $product->find($productId);

        return $productName->name;
    }

    protected function getPagesName()
    {
        if ($this->pages[0] == 'catalog') {
            $this->result[0] = 'каталог';
        }

        if ($this->pages[0] == 'about') {
            $this->result[0] = 'О нас';
        }

        if ($this->pages[0] == 'contact') {
            $this->result[0] = 'Контакты';
        }

        if ($this->pages[0] == 'cart') {
            $this->result[0] = 'Корзина';
        }

        if ($this->pages[0] == 'delivery') {
            $this->result[0] = 'Доставка';
        }

        if ($this->pages[0] == 'pay') {
            $this->result[0] = 'Оплата и возврат';
        }

        if ($this->pages[0] == 'login') {
            $this->result[0] = 'Вход';
        }

        if ($this->pages[0] == 'register') {
            $this->result[0] = 'Регистрация';
        }

        if ($this->pages[0] == 'catalog' and isset($this->pages[1])) {
            $productName = $this->getPagesProducts($this->pages[1]);
            array_push($this->result, $productName);
        }
    }
}
