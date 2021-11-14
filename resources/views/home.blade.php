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
                                        <h5>Бесплатная доставка до двери в день заказа</h5>
                                        <p class="mt-4">Любимый напиток закончился, а до доставки новой пачки ждать несколько дней? - Мы поможем</p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2"
                                           href="{{ route('catalog-product') }}">
                                            Заказать</a>
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
            </div>
            <!-- <div class="icon-pos">
                <a href="#bottom"><span class="fa fa-arrow-down"></span></a>
            </div> -->
        </div>
    </section>
    <!-- /main-slider -->
    <br><br>
    <section>
        <div class="container">
            <h3 class=" title-big">Популярное за ноябрь</h3>
            <div class="row">
                {{--PRODUCTS-ARCHIVE--}}
                @foreach($product as $item)
                    <div class="col-lg-4 ">
                        <div class="card product-list-single">
                            <a class="text-center" href="/catalog/<?= $item->id ?>">
                                <div class="card-body">
                                    <p class="card-text text-center text-dark font-weight-bolder"><?= $item->name ?></p>
                                    <p class="card-text text-center category-body"><?= (!empty($item->category->category)) ? $item->category->category : '' ?></p>
                                </div>
                                <img src="/storage/<?= $item->image ?>" alt="<?= $item->name ?>" class="product-list-image">
                            </a>
                            <div class="card-body">
                                <p class="card-text">Кислотность</p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar"
                                         style="width: <?= 25 * $item->acidity ?>%"
                                         aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <p class="card-text">Плотность</p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar"
                                         style="width: <?= 25 * $item->dencity ?>%"
                                         aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="bottom-card">
                                    <div class="float-left">
                                        <a>
                                            <p class="card-text gramm-text">250г</p>
                                            <h5 class="price-product" data-price="<?= $item->price ?>" data-sku="false"
                                                data-item="<?= $item->id ?>"><span
                                                    class="price-product-border price-product-active"><?= $item->price ?></span>
                                                р</h5>
                                        </a>
                                    </div>
                                    <div class="float-left margin-left">
                                        <a>
                                            <p class="card-text gramm-text">1000г</p>
                                            <h5 class="price-product" data-price="<?= (!empty($item->sku->price)) ? $item->sku->price : '' ?>"
                                                data-sku="true"
                                                data-item="<?= (!empty($item->sku->id)) ? $item->sku->id : '' ?>">
                                                <span class="price-product-border">
                                                    <?= (!empty($item->sku->price)) ? $item->sku->price : '' ?>
                                                </span>р
                                            </h5>
                                        </a>
                                    </div>
                                    <div class="float-right button-size">
                                        <button type="button" data-sku="false" data-price="<?= (!empty($item->sku->price)) ? $item->sku->price : '' ?>"
                                                data-item="<?= $item->id ?>" class="btn btn-dark add-to-cart">
                                            Купить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--PRODUCTS-ARCHIVE--}}
            </div>
            <div class=" btn-get-more">
                <a href="{{ route('catalog-product') }}"><button type="button" class="text-center btn-lg btn-block btn-order-submit">Посмотреть все</button></a>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <div class="container">
            <h3 class=" title-big">Выгодно</h3>
            <div class="row">
                {{--PRODUCTS-ARCHIVE--}}
                @foreach($product as $item)
                    <div class="col-lg-4 ">
                        <div class="card product-list-single">
                            <a class="text-center" href="/catalog/<?= $item->id ?>">
                                <div class="card-body">
                                    <p class="card-text text-center text-dark font-weight-bolder"><?= $item->name ?></p>
                                    <p class="card-text text-center category-body"><?= (!empty($item->category->category)) ? $item->category->category : '' ?></p>
                                </div>
                                <img src="/storage/<?= $item->image ?>" alt="<?= $item->name ?>" class="product-list-image">
                            </a>
                            <div class="card-body">
                                <p class="card-text">Кислотность</p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar"
                                         style="width: <?= 25 * $item->acidity ?>%"
                                         aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <p class="card-text">Плотность</p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar"
                                         style="width: <?= 25 * $item->dencity ?>%"
                                         aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="bottom-card">
                                    <div class="float-left">
                                        <a>
                                            <p class="card-text gramm-text">250г</p>
                                            <h5 class="price-product" data-price="<?= $item->price ?>" data-sku="false"
                                                data-item="<?= $item->id ?>"><span
                                                    class="price-product-border price-product-active"><?= $item->price ?></span>
                                                р</h5>
                                        </a>
                                    </div>
                                    <div class="float-left margin-left">
                                        <a>
                                            <p class="card-text gramm-text">1000г</p>
                                            <h5 class="price-product" data-price="<?= (!empty($item->sku->price)) ? $item->sku->price : '' ?>"
                                                data-sku="true"
                                                data-item="<?= (!empty($item->sku->id)) ? $item->sku->id : '' ?>">
                                                <span class="price-product-border">
                                                    <?= (!empty($item->sku->price)) ? $item->sku->price : '' ?>
                                                </span>р
                                            </h5>
                                        </a>
                                    </div>
                                    <div class="float-right button-size">
                                        <button type="button" data-sku="false" data-price="<?= (!empty($item->sku->price)) ? $item->sku->price : '' ?>"
                                                data-item="<?= $item->id ?>" class="btn btn-dark add-to-cart">
                                            Купить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--PRODUCTS-ARCHIVE--}}
            </div>
            <div class=" btn-get-more">
                <a href="{{ route('catalog-product') }}"><button type="button" class="text-center btn-lg btn-block btn-order-submit">Посмотреть все</button></a>
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
                        <a href="{{ route('about') }}" class="btn btn-style border-btn mt-lg-5 mt-4">Подробнее</a>
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
    <!-- //homeblock2-->

    {{--<section class="w3l-homeblock5 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6 about-right-faq align-self">
                    <h3 class="title-big">Попробуйте кофе со всего мира</h3>
                    <p class="mt-4">Пейте кофе, выращенный по разным традициям</p>
                    <h3 class="title-small mt-5">Where to buy our coffee</h3>
                    <ul class="w3l-lists mt-4">
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Бразилия</a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Канада</a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Австралия</a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Америка</a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Лондон</a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Russia (05) </a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>Mexico (27) </a></li>
                        <li><a ><span class="fa fa-check" aria-hidden="true"></span>England (06) </a></li>
                    </ul>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 ">
                    <img src="images/map.jpg" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>--}}
    <section class="w3l-testimonials py-5" id="testimonials">
        <!-- main-slider -->
        <div class="container py-lg-5 py-md-4 mb-md-0 mb-md-5 mb-4">
            <div class="heading text-center mx-auto">
                <h5 class="title-small text-center mb-2">О нас говорят</h5>
                <h3 class="title-big text-center mb-5">Отзывы</h3>
            </div>
            <div class="owl-testimonial owl-carousel owl-theme">
                <div class="item">
                    <div class="slider-info">
                        <div class="img-circle">
                            <img src="images/review-image.jpg" class="img-fluid rounded" alt="client image">
                        </div>
                        <div class="message-info">
                            <div>
                                <ul class="rating-star mt-5">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div>
                            <div class="message">Раньше покупал упаковки молотого кофе в магните. Наткнулся на этот
                                магазин, теперь заказываю только тут!
                            </div>
                            <div class="name">- Сергей</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-info">
                        <div class="img-circle">
                            <img src="images/review-image.jpg" class="img-fluid rounded" alt="client image">
                        </div>
                        <div class="message-info">
                            <div>
                                <ul class="rating-star mt-5">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div>
                            <div class="message">Заказываю в третий раз. Цены не кусаются и зёрна свежие.</div>
                            <div class="name">- Наталья</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-info">
                        <div class="img-circle">
                            <img src="images/review-image.jpg" class="img-fluid rounded" alt="client image">
                        </div>
                        <div class="message-info">
                            <div>
                                <ul class="rating-star mt-5">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div>
                            <div class="message">Покупать тут реально удобно, спасибо</div>
                            <div class="name">- Екатерина</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-info">
                        <div class="img-circle">
                            <img src="images/review-image.jpg" class="img-fluid rounded" alt="client image">
                        </div>
                        <div class="message-info">
                            <div>
                                <ul class="rating-star mt-5">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                            </div>
                            <div class="message">Нравится, что за доставку платить не нужно, как в других интернет
                                магазинах. Всё ок, но не совсем удобно, что доставка толькой почтой России. Пока 4
                            </div>
                            <div class="name">- Виктория</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /main-slider -->
    </section>
    <section class="w3l-homeblock7 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-md-5 mb-4">
                    <h3 class="title-big">Безопасность и комфорт</h3>
                    <p class="mt-4">Мы понимаем, что "вкусный кофе", как фломастеры - разные. Напишите, если не
                        понравилось. Заменим на другой сорт или вернём деньги
                        <a href="{{ route('catalog-product') }}" class="btn btn-style border-btn mt-lg-5 mt-4">Посмотреть ассортимент</a>
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 col-8">
                    <img src="images/middle.png" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{ URL::asset('js/shop/catalog-page.js') }}"></script>
@endsection
