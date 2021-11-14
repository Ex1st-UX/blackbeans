@extends('index')

@section('title', 'Корзина')

@section('body')
    <div class="inner-banner">
    </div>

    <?php
    // Хлебные крошки
    $breadcrumb = new App\Http\Controllers\BreadcrumbController();
    $breadcrumb->getBreadcrumb();
    ?>

    <section class="w3l-contact-6 py-5" id="contact">
        <div class="contact-info  py-lg-4 py-md-3">
            <div class="container">
                <form method="post" id="order_create">
                    <div class="grid contact-grids pt-3">
                        {{--Форма с адресом--}}
                        @if ($cartData)
                            <div class="left-side-block">
                                <h3 class="title-big text-left mb-5">Оформление заказа</h3>
                                <div class="input-grids">
                                    <div>
                                        <label class="form-field" for="name">Имя</label>
                                        <input type="text" name="name" id="name" required placeholder="Сергей"
                                               class="contact-input"/>
                                        <div class="order_validation_error_wrapper" id="error_name"></div>
                                    </div>
                                    <div>
                                        <label class="form-field" for="surname">Фамилия</label>
                                        <input type="text" name="surname" id="surname" required placeholder="Иванов"
                                               class="contact-input"/>
                                        <div class="order_validation_error_wrapper" id="error_surname"></div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-field" for="email">E-mail</label>
                                    <input type="email" name="email" id="email" required
                                           placeholder="info@blackbeans.ru"
                                           class="contact-input"/>
                                    <div class="order_validation_error_wrapper" id="error_email"></div>
                                </div>
                                <div>
                                    <label class="form-field" for="phone">Номер телефона</label>
                                    <input type="phone" name="phone " id="phone" required
                                           placeholder="+7 (999) 999 99 99"
                                           class="contact-input form-control"/>
                                    <div class="order_validation_error_wrapper" id="error_phone"></div>
                                </div>
                                {{--ДОСТАВКА--}}
                                <h3 class="title-big text-left mb-5 delievery-title">Доставка</h3>

                                {{--РЕНДЕРИМ СПОСОБЫ ДОСТАВКИ--}}
                                @foreach ($dataDelievery as $delieveryItem)
                                    @if ($delieveryItem->active == 'Y')
                                        <a class="" data-toggle="collapse" id="method-item"
                                           data-symbol="{{ $delieveryItem->symbol_code }}"
                                           data-cost="{{ $delieveryItem->cost }}"
                                           data-id="{{ $delieveryItem->id }}" href="#{{ $delieveryItem->symbol_code }}"
                                           aria-expanded="false"
                                           aria-controls="collapseExample">
                                            <div class="delievery-item-wrapper">
                                                <img class="delivery-logo"
                                                     src="{{ asset('/storage/' . $delieveryItem->image) }}">
                                                <span class="delievery-item-content">
                                            {{ $delieveryItem->name }}
                                            </span>
                                            </div>
                                        </a>
                                        <div class="collapse delievery-adress" id="{{ $delieveryItem->symbol_code }}">
                                            <div class="input-grids delievery-">
                                                <div>
                                                    <label class="form-field"
                                                           for="city">Город</label>
                                                    <input type="text" name="city" id="city" required
                                                           value="г. Тольятти"
                                                           class="contact-input"/>
                                                    <div class="order_validation_error_wrapper" id="error_city"></div>
                                                </div>
                                                <div>
                                                    <label class="form-field" for="street">Улица,
                                                        дом</label>
                                                    <input type="text" name="street" id="street" required
                                                           placeholder="Баныкина д. 20"
                                                           class="contact-input"/>
                                                    <div class="order_validation_error_wrapper" id="error_street"></div>
                                                </div>
                                                <div class="input-grids">
                                                    <div>
                                                        <label class="form-field" for="apps">Квартира</label>
                                                        <input type="text" name="apps" id="apps" required
                                                               placeholder="кв. 72"
                                                               class="contact-input"/>
                                                        <div class="order_validation_error_wrapper" id="error_apps"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                {{--Способы оплаты--}}
                                <div class="payment-wrapper">
                                    <h3 class="title-big text-left mb-5 delievery-title">Оплата</h3>
                                    <a class="delivery-wrapper">
                                        <div data-method="" id="payment-method-cache" class="payment-item-wrapper"
                                             data-id="1">
                                            <img class="cachelogo" src="{{ asset('/images/cash-logo.png') }}">
                                            <span class="delievery-item-content">Оплата при получении</span>
                                        </div>
                                    </a>
                                    <br>
                                    <a class="delivery-wrapper">
                                        <div data-method="" id="payment-method-online" class="payment-item-wrapper"
                                             data-id="2">
                                            <img class="cachelogo" src="{{ asset('/images/visa.svg') }}">
                                            <span class="delievery-item-content">Онлайн оплата</span>
                                        </div>
                                    </a>
                                    <div class="order_validation_error_wrapper" id="error_payment"></div>
                                </div>
                            </div>
                        @endif
                        {{--Корзина--}}
                        <div class="contacts12-main cart-total-content">

                            <div>
                                <h3 class="title-big text-left mb-5 ">Корзина</h3>
                                <div id="cart-total-wrapper" class="cart-total-wrapper text-center">
                                    <table class="table text-left l table-total-cart">
                                        @csrf
                                        <tbody id="cart-total-entry">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--Итог--}}
                        </div>
                    </div>
                </form>
            </div>
    </section>
@endsection
@section('js')
    <script src="{{ URL::asset('js/shop/cart.js') }}"></script>
@endsection
