@extends('index')

@section('title', 'Оплата и возврат')

@section('body')
    <div class="inner-banner">
    </div>
    <?php
    // Хлебные крошки
    $breadcrumb = new App\Http\Controllers\BreadcrumbController();
    $breadcrumb->getBreadcrumb();
    ?>

    <div class="container">
        <div class="row pay-wrapper">
            <div class="col-lg-6">
                <h3 class="title-big">Оплата</h3>
                <ul class="w3l-lists mt-4">
                    <li><span class="fa fa-check" aria-hidden="true"></span>Можно оплатить при получении (наложенный платеж) </li>
                    <li><span class="fa fa-check" aria-hidden="true"></span>Онлайн оплата (перевод на карту)
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h3 class="title-big">Возврат</h3>
                <ul class="w3l-lists mt-4">
                    <li><span class="fa fa-check" aria-hidden="true"></span>Если кофе вам не подошло, то напишите на почту support@blackbeans.ru</li>
                    <li><span class="fa fa-check" aria-hidden="true"></span>В течении 21 дня замени на другое или вернем деньги
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
