@extends('index')

@section('title', 'Контакты')

@section('body')
    <div class="inner-banner">
    </div>
    <section class="w3l-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="#url">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact Us</li>
            </ul>
        </div>
    </section>

    <!-- /contact-form -->
    <section class="w3l-contact-6 py-5" id="contact">
        <div class="contact-info  py-lg-4 py-md-3">
            <div class="container">
                <div class="title-content mb-5">
                    <h5 class="title-small text-center mb-2">Свяжитесь с нами</h5>
                    <h3 class="title-big text-center mb-5">Ответим на любой вопрос за 60 минут</h3>
                </div>
                <div class="grid contact-grids pt-3">
                    <div class="contact-left">
                        <div class="grid">
                            <span class="fa fa-map-marker"></span>
                            <div class="location-info">
                                <span>Адресс</span>
                                <p>г. Тольятти</p>
                                <p>ул. Дзержинского д. 55</p>
                                <p>445036</p>
                            </div>
                        </div>
                        <div class="grid">
                            <span class="fa fa-envelope-o"></span>
                            <div class="email-info">
                                <span>Напишите нам на почту</span>
                                <a href="mailto:info@blackbeans.ru">support@blackbeans.ru</a>
                            </div>
                        </div>
                        <div class="grid">
                            <span class="fa fa-phone"></span>
                            <div class="email-info">
                                <span>Phone Number</span>
                                <a href="tel:(123) 456-78-90"> 7 (905) 019-66-59</a><br>
                            </div>
                        </div>
                    </div>
                    <div class="contacts12-main">
                        <form class="signin-form" id="feedback_submit">
                            <div class="input-grids">
                                <div>
                                    <label class="form-field" for="w3lName">Имя</label>
                                    <input type="text" name="w3lName" id="w3lName" placeholder="Иван"
                                           class="contact-input">
                                </div>
                                <div>
                                    <label class="form-field" for="w3lSender">Email для обратной связи</label>
                                    <input type="email" name="w3lSender" id="w3lSender"
                                           placeholder="support@blackbeans.ru"
                                           class="contact-input" required>
                                </div>
                            </div>
                            <div>
                                <label class="form-field" for="w3lSubect">Тема</label>
                                <input type="text" name="w3lSubect" id="w3lSubect" placeholder="Есть вопрос!"
                                       class="contact-input">
                            </div>
                            <div>
                                <label class="form-field" for="w3lMessage">Текст</label>
                                <textarea name="w3lMessage" id="w3lMessage" placeholder="Опишите суть вопроса"
                                          required></textarea>
                            </div>
                            <div class="text-right">
                                <button id="" class="btn btn-style btn-primary submit">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- //contact-form -->

@endsection

@section('js')
    <script src="{{ URL::asset('js/inc/feedback.js') }}"></script>
@endsection
