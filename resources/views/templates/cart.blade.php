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
                <div class="grid contact-grids pt-3">
                    {{--Форма с адресом--}}
                    <div class="contacts12-main">
                        <h3 class="title-big text-left mb-5">Оформление заказа</h3>
                        <div class="input-grids">
                            <div>
                                <label class="form-field" for="w3lName">Имя</label>
                                <input type="text" name="w3lName" required placeholder="Сергей"
                                       class="contact-input"/>
                            </div>
                            <div>
                                <label class="form-field" for="w3lSender">Фамилия</label class="form-field">
                                <input type="text" name="w3lSender" required placeholder="Иванов"
                                       class="contact-input"/>
                            </div>
                        </div>
                        <div>
                            <label class="form-field" for="w3lSubect">E-mail</label class="form-field">
                            <input type="text" name="w3lSubect " required placeholder="info@blackbeans.ru"
                                   class="contact-input"/>
                        </div>
                        <div>
                            <label class="form-field" for="w3lSubect">Номер телефона</label class="form-field">
                            <input type="text" name="w3lSubect " required placeholder="+7 (999) 999 99 99"
                                   class="contact-input"/>
                        </div>
                        <div>
                            <label class="form-field" for="w3lSubect">Город</label class="form-field">
                            <input type="text" name="w3lSubect " required placeholder="Москва"
                                   class="contact-input"/>
                        </div>
                        <div>
                            <label class="form-field" for="w3lSubect">Улица, дом</label class="form-field">
                            <input type="text" name="w3lSubect" required placeholder="Тверская д. 18"
                                   class="contact-input"/>
                        </div>
                        <div class="input-grids">
                            <div>
                                <label class="form-field" for="w3lName">Квартира</label>
                                <input type="text" name="w3lName" required placeholder="23"
                                       class="contact-input"/>
                            </div>
                            <div>
                                <label class="form-field" for="w3lSender">Почтовый индекс</label class="form-field">
                                <input type="email" name="w3lSender" required placeholder="000000"
                                       class="contact-input"/>
                            </div>
                        </div>
                        <div>
                            <label class="form-field" for="w3lMessage">Комментарий к заказу
                                (необязательно)</label class="form-field">
                            <textarea name="w3lMessage" id="w3lMessage" required placeholder="..."
                            ></textarea>
                        </div>
                    </div>
                    <div class="contacts12-main">
                        {{--Корзина--}}
                        <h3 class="title-big text-left mb-5 ">Корзина</h3>
                        <table class="table text-left l">
                            <div id="cart-total-wrapper" class="cart-total-wrapper text-center">
                                <form action="{{ route('cart-update') }}" method="post">
                                    @csrf
                                    <tbody id="cart-total-entry">
                                    </tbody>
                                </form>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection
