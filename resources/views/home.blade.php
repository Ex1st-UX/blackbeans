@extends('index')

@section('title', 'BlackBeans - интернет магазин кофе')
@section('body')
    <!-- main-slider -->
    <section class="w3l-main-slider" id="home">
        <div class="companies20-content">
            <div class="owl-one owl-carousel owl-theme">
                <div class="item">
                    <li>
                        <div class="slider-info banner-view bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg">
                                        <h5>Бесплатная доставка <span>и</span> свежий кофе</h5>
                                        <p class="mt-4">Доставим до почтового отделения или двери за наш счет</p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2"
                                           href="{{ route('catalog-product') }}">
                                            Купить</a>
                                        <a class="btn btn-style btn-white mt-sm-5 mt-4" href="{{ route('contact') }}">О
                                            нас</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item">
                    <li>
                        <div class="slider-info  banner-view banner-top1 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg">
                                        <h5>Только свежеобжаренные зёрна</h5>
                                        <p class="mt-4">Не продаём зёрна обжарки старше двух недель</p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2"
                                           href="{{ route('catalog-product') }}">
                                            Купить</a>
                                        <a class="btn btn-style btn-white mt-sm-5 mt-4" href="{{ route('about') }}">О
                                            нас</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                {{--                <div class="item">
                                    <li>
                                        <div class="slider-info banner-view banner-top2 bg bg2">
                                            <div class="banner-info">
                                                <div class="container">
                                                    <div class="banner-info-bg">
                                                        <h5>We provide <span>the best taste coffee</span></h5>
                                                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
                                                            quisquam, doloremque placeat aut numquam ipsam. </p>
                                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="reservation.html">
                                                            Book a table</a>
                                                        <a class="btn btn-style btn-white mt-sm-5 mt-4" href="about.html"> About us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                                <div class="item">
                                    <li>
                                        <div class="slider-info banner-view banner-top3 bg bg2">
                                            <div class="banner-info">
                                                <div class="container">
                                                    <div class="banner-info-bg">
                                                        <h5>We offer <span>you the best coffee product</span></h5>
                                                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
                                                            quisquam, doloremque placeat aut numquam ipsam. </p>
                                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="reservation.html">
                                                            Book a table</a>
                                                        <a class="btn btn-style btn-white mt-sm-5 mt-4" href="about.html"> About us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </div>--}}
            </div>
            <!-- <div class="icon-pos">
                <a href="#bottom"><span class="fa fa-arrow-down"></span></a>
            </div> -->
        </div>
    </section>
    <!-- /main-slider -->
    {{--    PRODUCT SALES--}}
    <section>
        <div class="container">
            <h1 class="section-title">Cкидки</h1>
            <div class="row">
                <div class="col-lg-4 ">
                    <a href="/">
                        <div class="card product-list-single">
                            <div class="card-body">
                                <p class="card-text text-center text-dark font-weight-bolder">Бразилия сантос</p>
                                <p class="card-text text-center">Для эспрессо</p>
                            </div>
                            <img src="{{ asset('/images/product.png') }}" alt="Card image" class="product-list-image">
                            <div class="card-body">
                                <p class="card-text">Кислотность</p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 41%"
                                         aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="card-text">Плотность</p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 81%"
                                         aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="bottom-card">
                                    <div class="float-left">
                                        <p class="card-text gramm-text">250г</p>
                                        <h5 class="">279 Р</h5>
                                    </div>
                                    <div class="float-left margin-left">
                                        <p class="card-text gramm-text">1000г</p>
                                        <h5 class="">999 Р</h5>
                                    </div>
                                    <div class="float-right button-size">
                                        <button class="btn btn-dark">Купить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 product-list-single">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text text-center text-dark font-weight-bolder">Бразилия сантос</p>
                            <p class="card-text text-center">Для эспрессо</p>
                        </div>
                        <img src="{{ asset('/images/product.png') }}" alt="Card image" class="product-list-image">
                        <div class="card-body">
                            <p class="card-text">Кислотность</p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 41%"
                                     aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="card-text">Плотность</p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 81%"
                                     aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="bottom-card">
                                <div class="float-left">
                                    <p class="card-text gramm-text">250г</p>
                                    <h5 class="">279 Р</h5>
                                </div>
                                <div class="float-left margin-left">
                                    <p class="card-text gramm-text">1000г</p>
                                    <h5 class="">999 Р</h5>
                                </div>
                                <div class="float-right button-size">
                                    <button class="btn btn-dark">Купить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 product-list-single">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text text-center text-dark font-weight-bolder">Бразилия сантос</p>
                            <p class="card-text text-center">Для эспрессо</p>
                        </div>
                        <img src="{{ asset('/images/product.png') }}" alt="Card image" class="product-list-image">
                        <div class="card-body">
                            <p class="card-text">Кислотность</p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 41%"
                                     aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <p class="card-text">Плотность</p>
                            <div class="progress">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 81%"
                                     aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="bottom-card">
                                <div class="float-left">
                                    <p class="card-text gramm-text">250г</p>
                                    <h5 class="">279 Р</h5>
                                </div>
                                <div class="float-left margin-left">
                                    <p class="card-text gramm-text">1000г</p>
                                    <h5 class="">999 Р</h5>
                                </div>
                                <div class="float-right button-size">
                                    <button class="btn btn-dark">Купить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <section class="w3l-index3" id="bottom">
        <div class="midd-w3 py-5">
            <div class="container py-lg-5 py-md-3">
                <div class="row">
                    <div class="col-lg-6 about-right-faq align-self">
                        <h5 class="title-small mb-3">Почему мы?</h5>
                        <h3 class="title-big">Кофе из магазина у дома - другое</h3>
                        <p class="mt-4">Дело в том, что напиток теряет вкусовые качества с первых минут после обжарки.
                            Прочувствовать букет запахов и вкусов можно только, если пить свежий кофе</p>
                        <a href="{{ route('about') }}" class="btn btn-style border-btn mt-lg-5 mt-4">Рассказываем подробно</a>
                    </div>
                    <div class="col-lg-6 left-wthree-img text-right mt-lg-0 mt-5 ">
                        <img src="images/about.jpg" alt="" class="radius-image img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /homeblock2-->
    <section class="w3l-homeblock2 py-5" id="services">
        <div class="container py-lg-5 py-md-4">
            <div class="grids-area-hny main-cont-wthree-fea row">
                <div class="col-lg-3 col-sm-6 grids-feature">
                    <div class="area-box">
                        <span class="fa fa-globe" aria-hidden="true"></span>
                        <h4><a class="title-head">Большой выбор сортового кофе</a></h4>
                        <p>География ассоритмента раскидывается от жаркой бразилии до солнечной африки</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 grids-feature mt-sm-0 mt-5">
                    <div class="area-box">
                        <span class="fa fa-coffee" aria-hidden="true"></span>
                        <h4><a class="title-head">Заменим, если не понравилось</a></h4>
                        <p>"Главное продать" - не про нас. Поменяем сорт на другой, если не подошел</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 grids-feature mt-lg-0 mt-5">
                    <div class="area-box">
                        <span class="fa fa-delicious" aria-hidden="true"></span>
                        <h4><a class="title-head">Максимальный вкус и аромат зёрен</a></h4>
                        <p>Мы не продаём кофе, обжарка которого была больше двух недель назад.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 grids-feature mt-lg-0 mt-5">
                    <div class="area-box">
                        <span class="fa fa-truck" aria-hidden="true"></span>
                        <h4><a class="title-head">Бесплатная доставка по России</a></h4>
                        <p>Бесплатная доставка для городов России, а для Тольятти - до двери в тот же день</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h3 class=" title-big">Популярное за февраль</h3>
            <div class="row">
                {{--PRODUCTS-ARCHIVE--}}
                @foreach($product as $prod)
                    <div class="col-lg-4 ">
                        <a href="/shop/{{ $prod->id }}">
                            <div class="card product-list-single">
                                <div class="card-body">
                                    <p class="card-text text-center text-dark font-weight-bolder">{{ $prod->name }}</p>
                                    <p class="card-text text-center">{{ $prod->category->category }}</p>
                                </div>
                                <img src="{{ asset('/storage/') . '/' . $prod->image }}" alt="{{ $prod->name }}"
                                     class="product-list-image">
                                <div class="card-body">
                                    <p class="card-text">Кислотность</p>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                             style="width: {{ $prod->acidity * 25 }}%"
                                             aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p class="card-text">Плотность</p>
                                    <div class="progress">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                             style="width: {{ $prod->dencity * 25 }}%"
                                             aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="bottom-card">
                                        <div class="float-left">
                                            <p class="card-text gramm-text">250г</p>
                                            <h5 class="">{{ $prod->price }} Р</h5>
                                        </div>
                                        <div class="float-left margin-left">
                                            <p class="card-text gramm-text">1000г</p>
                                            <h5 class="">999 Р</h5>
                                        </div>
                                        <div class="float-right button-size">
                                            <button class="btn btn-dark">Купить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{--PRODUCTS-ARCHIVE--}}
            </div>
        </div>
    </section>
    <!-- //homeblock2-->
    <section class="w3l-homeblock3">
        <div class="midd-w3 py-5">
            <div class="container py-lg-5 py-md-3">
                <div class="row">
                    <div class="col-lg-6 ">
                        <img src="images/bg.jpg" alt="" class="radius-image img-fluid">
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-3 about-right-faq align-self">
                        <h3 class="title-big">Какой путь проходят зёрна перед тем, как попасть в вашу турку?</p>
                        <ul class="w3l-lists mt-4">
                            <li><span class="fa fa-check" aria-hidden="true"></span>1 cup unsweetened cocoa powder</li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>1/2 cup butter, cut into 1–inch
                                pieces
                            </li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>1 1/4 cups granulated sugar</li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>1/2 cup firmly packed dark brown
                                sugar
                            </li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>1 1/4 tsp baking soda</li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>Add a Insulated Coffee Flask /
                                Shaker & a Cafe Cap
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-homeblock5 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6 about-right-faq align-self">
                    <h3 class="title-big">Sale and Delivery Points</h3>
                    <p class="mt-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel.</p>
                    <h3 class="title-small mt-5">Where to buy our coffee</h3>
                    <ul class="w3l-lists mt-4">
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>Brazil (10) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>Canada (17) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>Australia (19) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>America (15) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>London (02) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>Russia (05) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>Mexico (27) </a></li>
                        <li><a href="#url"><span class="fa fa-check" aria-hidden="true"></span>England (06) </a></li>
                    </ul>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 ">
                    <img src="images/map.jpg" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>
    <div class="w3l-bg-image">
        <div class="bg-mask py-5">
            <div class="container py-lg-5 py-4">
                <div class="text-align text-center py-lg-4 py-md-3">
                    <h3>Discover The Taste Of Real Coffee</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when
                        looking at its layout.</p>
                </div>
            </div>
        </div>
    </div>

    <section class="w3l-homeblock7 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-md-5 mb-4">
                    <h3 class="title-big">Opening Hours and Reservations.</h3>
                    <p class="mt-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit.
                        dignissimos quis soluta sapiente aperiam quod.</p>
                </div>
                <div class="col-lg-4 col-sm-6 col-8">
                    <img src="images/middle.png" alt="" class="radius-image img-fluid">
                </div>
                <div class="col-lg-4 col-sm-6 mt-sm-0 mt-4">
                    <ul class="w3l-lists mb-md-5 mb-4">
                        <h3 class="title-small"> Opening Hours: </h3>
                        <li>Monday – Friday // 09:00 - 06:00</li>
                        <li>Saturday // 10:00 – 01:00</li>
                        <li>Sunday // CLOSED</li>
                    </ul>
                    <ul class="w3l-lists">
                        <h3 class="title-small"> Reservation numbers: </h3>
                        <li><a href="tel:+7-800-999-800"><span class="fa fa-phone"></span> +(21)-255-999-8888</a></li>
                        <li><a href="tel:+7-800-999-800"><span class="fa fa-phone"></span> +(21)-255-999-8899</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
