@extends('index')

@section('title', 'О нас')

@section('body')
    <div class="inner-banner">
    </div>
    <?php
    // Хлебные крошки
    $breadcrumb = new App\Http\Controllers\BreadcrumbController();
    $breadcrumb->getBreadcrumb();
    ?>

    <section class="w3l-aboutblock1 py-5" id="bottom">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="title-small mb-3">О нас</h5>
                    <h3 class="title-big">Почему нельзя купить кофе в магазине у дома?</h3>
                    <p class="mt-4">"Зачем заказывать кофе, когда можно сходить в соседний магазин?"<br><br>Мы часто слышим этот вопрос.<br><br>Дело
                        в том, что напиток теряет вкусовые качества с первых минут после обжарки. Прочувствовать букет
                        запахов и вкусов можно только, если пить свежий кофе</p>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 ">
                    <img src="images/about3.jpg" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-about2 py-5">
        <div class="container py-lg-5">
            <div class="row cwp23-content">
                <div class="col-lg-6">
                    <h3 class="title-big">Поможем пить только свежий кофе</h3>
                    <p class="mt-4">Знаем, что кофе - ваша страсть. Поэтому никогда не продаём зёрна, обжаренные старше двух недель. Сделать ароматный, сортовой кофе доступным - наша задача. И вот наш план:</p>
                </div>
                <div class="col-lg-6 cwp23-text align-self mt-lg-0 mt-5">
                    <div class="cwp23-text-cols">
                        <div class="column">
                            <span class="fa fa-globe" aria-hidden="true"></span>
                            <a>Большой выбор сортового кофе</a>
                            <p>География ассоритмента раскидывается от жаркой бразилии до солнечной африки</p>
                        </div>
                        <div class="column">
                            <span class="fa fa-coffee" aria-hidden="true"></span>
                            <a href="services.html">Заменим, если не понравилось</a>
                            <p>"Главное продать" - не про нас. Поменяем сорт на другой, если не подошел</p>
                        </div>
                        <div class="column">
                            <span class="fa fa-delicious" aria-hidden="true"></span>
                            <a href="services.html">Максимальный вкус и аромат зёрен</a>
                            <p>Мы не продаём кофе, обжарка которого была больше двух недель назад.</p>
                        </div>
                        <div class="column">
                            <span class="fa fa-truck" aria-hidden="true"></span>
                            <a href="services.html">Бесплатная доставка</a>
                            <p>Бесплатная доставка для городов России, а для Тольятти - до двери в тот же день</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-aboutblock3 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6 align-self">
                    <h5 class="title-small mb-3">Стоит один раз попробовать</h5>
                    <h3 class="title-big">Готовьте, как удобно</h3>
                    <p class="mt-4">Удобный фильтр поможет выбрать сорт специально для вашего способа приготовления. Чтобы попробовать свежий кофе, достаточно лишь чашки и кипятка!</p>
                    <a href="{{ route('catalog-product') }}" class="btn btn-style btn-primary mt-lg-5 mt-4 mr-2">Подобрать</a>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 ">
                    <img src="images/about.png" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
