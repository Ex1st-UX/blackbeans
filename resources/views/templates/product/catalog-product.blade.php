@extends('index')

@section('title', 'Купить кофе в зернах в интернет магазине')

@section('body')
    <div class="inner-banner">
    </div>
    <?php
    // Хлебные крошки
    $breadcrumb = new App\Http\Controllers\BreadcrumbController();
    $breadcrumb->getBreadcrumb();
    ?>
    <div class="container">
        <h3 class="title-catalog text-left">Как будем готовить?</h3>
        {{--ФИЛЬТРЫ--}}
        <div class="filters-wrapper">
            <div class="row text-center">
                <div class="team-info col-md-2 col-6 filter-card">
                    <a class="filter-category-item" data-filter="category-turka">
                        <div class="column position-relative ">
                            <img src="{{ asset('images/filter-icon-turka.jpg') }}" alt=""
                                 class="img-fluid radius-image filter-icon">
                        </div>
                        <h4 class="filter-name">Турка</h4>
                    </a>
                </div>
                <div class="team-info col-md-2 col-6 filter-card">
                    <a class="filter-category-item" data-filter="category-gaser">
                        <div class="column position-relative">
                            <img src="{{ asset('images/filter-icon-gaser.png') }}" alt=""
                                 class="img-fluid radius-image filter-icon">
                        </div>
                        <h4 class="filter-name">Гейзер</h4>
                    </a>
                </div>
                <div class="team-info col-md-2 col-6 filter-card">
                    <a class="filter-category-item" data-filter="category-french">
                        <div class="column position-relative">
                            <img src="{{ asset('images/filter-icon-french.png') }}" alt=""
                                 class="img-fluid radius-image filter-icon">
                        </div>
                        <h4 class="filter-name">Френч-пресс</h4>
                    </a>
                </div>
                <div class="team-info col-md-2 col-6 filter-card">
                    <a class="filter-category-item" data-filter="category-purover">
                        <div class="column position-relative">
                            <img src="{{ asset('images/filter-icon-purover.png') }}" alt=""
                                 class="img-fluid radius-image filter-icon">
                        </div>
                        <h4 class="filter-name">Пуровер</h4>
                    </a>
                </div>
                <div class="team-info col-md-2 col-6 filter-card">
                    <a class="filter-category-item" data-filter="category-cofemachine">
                        <div class="column position-relative">
                            <img src="{{ asset('images/filter-icon-coffemachine.png') }}" alt=""
                                 class="img-fluid radius-image filter-icon">
                        </div>
                        <h4 class="filter-name">Кофеварка</h4>
                    </a>
                </div>
                <div class="team-info col-md-2 col-6 filter-card">
                    <a class="filter-category-item" data-filter="category-cup">
                        <div class="column position-relative">
                            <img src="{{ asset('images/filter-icon-cap.png') }}" alt=""
                                 class="img-fluid radius-image filter-icon">
                        </div>
                        <h4 class="filter-name">Чашка</h4>
                    </a>
                </div>
            </div>
            <div class="sort-button">
                <a class="custom-select filter-sort" data-toggle="collapse" href="#collapseExample"
                   aria-expanded="false" aria-controls="collapseExample">
                    Фильтры
                </a>
            </div>
            {{--Сортировки--}}
            <div class="collapse" id="collapseExample">
                <div class="row sort">
                    <div class="col-md-3">
                        <p class="filter-items-label">Цена</p>
                        <select class="custom-select filter-sort filter-sort-items">
                            <option selected>Не выбрано</option>
                            <option data-option="price" value="asc">Дешевле</option>
                            <option data-option="price" value="desc">Дороже</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p class="filter-items-label">Популярность</p>
                        <select class="custom-select filter-sort filter-sort-items">
                            <option selected>Не выбрано</option>
                            <option data-option="popularity" value="desc">Чаще покупают</option>
                            <option data-option="popularity" value="asc">Реже покупают</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p class="filter-items-label">Кислотность</p>
                        <select class="custom-select filter-sort filter-sort-items">
                            <option selected>Не выбрано</option>
                            <option data-option="acidity" value="asc">Ниже</option>
                            <option data-option="acidity" value="desc">Выше</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <p class="filter-items-label">Плотность</p>
                        <select class="custom-select filter-sort filter-sort-items">
                            <option selected>Не выбрано</option>
                            <option data-option="dencity" value="asc">Ниже</option>
                            <option data-option="dencity" value="desc">Выше</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        {{--ФИЛЬТРЫ--}}
        <section class="product-section">
            {{--Тэги--}}
            <ul class="catalog-tabs">
                <li class="title-catalog text-left mb-4 mark-item-active" data-item="all_items" id="all_items">
                    <a>Все</a></li>
                <li class="title-catalog text-left mb-4" data-item="reccomended_items"><a>Рекомендуем</a></li>
                <li class="title-catalog text-left mb-4" data-item="new_items"><a>Новинки</a></li>
                <li class="title-catalog text-left mb-4" data-item="sales_item"><a>Акции</a></li>
            </ul>
            <div class="row product-catalog-wrapper">
                {{--Сюда рендерятся карточки товаров--}}
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('js/shop/catalog-page.js') }}"></script>
@endsection
