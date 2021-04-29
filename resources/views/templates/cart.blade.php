@extends('index')

@section('title', 'Корзина')

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
    <section class="w3l-contact-6 py-5" id="contact">
        <div class="contact-info  py-lg-4 py-md-3">
            <div class="container">
                <form method="post" action="{{ route('order-submit') }}" id="order_create">
                    <div class="grid contact-grids pt-3">
                        {{--Форма с адресом--}}
                        <div class="contacts12-main left-side-block">
                            <h3 class="title-big text-left mb-5">Оформление заказа</h3>
                            <div class="input-grids">
                                <div>
                                    <label class="form-field" for="w3lName">Имя</label>
                                    <input type="text" name="w3lName" id="name" required placeholder="Сергей"
                                           class="contact-input"/>
                                </div>
                                <div>
                                    <label class="form-field" for="w3lSender">Фамилия</label class="form-field">
                                    <input type="text" name="w3lSender" id="surname" required placeholder="Иванов"
                                           class="contact-input"/>
                                </div>
                            </div>
                            <div>
                                <label class="form-field" for="w3lSubect">E-mail</label class="form-field">
                                <input type="text" name="w3lSubect" id="email" required placeholder="info@blackbeans.ru"
                                       class="contact-input"/>
                            </div>
                            <div>
                                <label class="form-field" for="w3lSubect">Номер телефона</label class="form-field">
                                <input type="text" name="w3lSubect " id="phone" required
                                       placeholder="+7 (999) 999 99 99"
                                       class="contact-input form-control"/>
                            </div>
                            {{--ДОСТАВКА--}}
                            <h3 class="title-big text-left mb-5 delievery-title">Доставка</h3>
                            {{--РЕНДЕРИМ СПОСОБЫ ДОСТАВКИ--}}
                            @foreach ($dataDelievery as $delieveryItem)
                                @if ($delieveryItem->active == 'Y')
                                    <a class="" data-toggle="collapse" id="method-item" data-symbol="{{ $delieveryItem->symbol_code }}"
                                       data-cost="{{ $delieveryItem->cost }}"
                                       data-id="{{ $delieveryItem->id }}" href="#{{ $delieveryItem->symbol_code }}"
                                       aria-expanded="false"
                                       aria-controls="collapseExample">
                                        <div class="delievery-item-wrapper">
                                            <img class="pochta-russia-logo"
                                                 src="{{ asset('/images/pochta-russia-logo.png') }}">
                                            <span class="delievery-item-content">
                                            {{ $delieveryItem->name }}
                                            </span>
                                        </div>
                                    </a>

                                    <div class="collapse delievery-adress" id="{{ $delieveryItem->symbol_code }}">
                                        <div class="input-grids delievery-">
                                            <div>
                                                <label class="form-field"
                                                       for="w3lSubect">Город</label class="form-field">
                                                <input type="text" name="w3lSubect" id="city" required
                                                       placeholder="Москва"
                                                       class="contact-input"/>
                                            </div>
                                            <div>
                                                <label class="form-field" for="w3lSubect">Улица,
                                                    дом</label class="form-field">
                                                <input type="text" name="w3lSubect" id="street" required
                                                       placeholder="Тверская д. 18"
                                                       class="contact-input"/>
                                            </div>
                                            <div class="input-grids">

                                                <div>
                                                    <label class="form-field" for="w3lName">Квартира</label>
                                                    <input type="text" name="w3lName" id="apps" required
                                                           placeholder="72"
                                                           class="contact-input"/>
                                                </div>
                                                <div>
                                                    <label class="form-field" for="w3lName">Индекс</label>
                                                    <input type="text" name="w3lName" id="postcode" required
                                                           placeholder="000000"
                                                           class="contact-input"/>
                                                </div>
                                            </div>
                                        </div>
                                        {{--Виджет Почты России--}}
                                        <div id="ecom-widget" class="delievery-map" style="height: 500px">
                                            <script src="https://widget.pochta.ru/map/widget/widget.js"></script>
                                            <script>
                                                ecomStartWidget({
                                                    id: 12627,
                                                    callbackFunction: null,
                                                    containerId: 'ecom-widget'
                                                });
                                            </script>
                                        </div>
                                        {{--Виджет Почты России--}}
                                    </div>
                                @endif
                            @endforeach
                            {{--Способы оплаты--}}
                            <div class="payment-wrapper">
                                <h3 class="title-big text-left mb-5 delievery-title">Оплата</h3>
                                <a>
                                    <div data-method="" id="payment-method-cache" class="delievery-item-wrapper" data-id="1">
                                        <img class="cachelogo" src="{{ asset('/images/cash-logo.png') }}">
                                        <span class="delievery-item-content">Наложенный платеж</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="contacts12-main cart-total-content">
                            {{--Корзина--}}
                            <div>
                                <h3 class="title-big text-left mb-5 ">Корзина</h3>
                                <table class="table text-left l">
                                    <div id="cart-total-wrapper" class="cart-total-wrapper text-center">
                                        @csrf
                                        <tbody id="cart-total-entry">
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                            {{--Итог--}}

                        </div>
                    </div>
                </form>
            </div>
    </section>
@endsection
