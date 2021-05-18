@extends('index')

@section('title', 'Оплата и возврат')

@section('body')
    <div class="inner-banner">
    </div>
    <section class="w3l-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="#url">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About Us</li>
            </ul>
        </div>
    </section>


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
