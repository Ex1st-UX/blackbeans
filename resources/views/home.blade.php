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
                                        <h5>Coffee time <span>is a chance to slowdown</span></h5>
                                        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
                                            quisquam, doloremque placeat aut numquam ipsam. </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="#">
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
                        <div class="slider-info  banner-view banner-top1 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg">
                                        <h5>Coffee <span>makes us fresh & Active</span></h5>
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
                </div>
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
                        <h5 class="title-small mb-3">Our Skills</h5>
                        <h3 class="title-big">We make the delicious coffee for the coffee lovers.</h3>
                        <p class="mt-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                            ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur
                            adipisicing
                            elit. Non quae, fugiat consequatur voluptatem nihil ad. Lorem ipsum dolor sit amet</p>
                        <a href="#about" class="btn btn-style border-btn mt-lg-5 mt-4">Know More</a>
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
                        <span class="fa fa-coffee"></span>
                        <h4><a href="#feature" class="title-head">Types of Coffee</a></h4>
                        <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 grids-feature mt-sm-0 mt-5">
                    <div class="area-box">
                        <span class="fa fa-glass"></span>
                        <h4><a href="#feature" class="title-head">Bean Varieties</a></h4>
                        <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 grids-feature mt-lg-0 mt-5">
                    <div class="area-box">
                        <span class="fa fa-pagelines"></span>
                        <h4><a href="#feature" class="title-head">Coffee & Pastry</a></h4>
                        <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 grids-feature mt-lg-0 mt-5">
                    <div class="area-box">
                        <span class="fa fa-envira"></span>
                        <h4><a href="#feature" class="title-head">Coffe to go</a></h4>
                        <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p>
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
                        <h3 class="title-big">The Easiest and most convenient way to make coffee</h3>
                        <p class="mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                            ultrices in ligula. Semper at tempufddfel.</p>
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
    <section class="w3l-homeblock4 py-5" id="video">
        <div class="video-recipe py-lg-5 py-md-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 align-self">
                        <h3 class="title-big">Do you want to retain the video recipe?</h3>
                        <p class="mt-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                            ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur
                            adipisicing
                            elit. Non quae, fugiat consequatur voluptatem nihil ad. Lorem ipsum dolor sit amet</p>
                    </div>
                    <div class="col-lg-7 mt-lg-0 mt-5 ">
                        <div class="row">
                            <div class="col-md-6">
                                <iframe src="https://www.youtube.com/embed/0S4MlIuUx5k" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                <h3 class="video-title mt-4">Gather more information from coffee</h3>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-5">
                                <iframe src="https://www.youtube.com/embed/3Bv8dOca-70" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                <h3 class="video-title mt-4">Work with green and roasted coffee provides</h3>
                            </div>
                        </div>
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
