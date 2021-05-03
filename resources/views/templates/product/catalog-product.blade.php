@extends('index')

@section('title', 'Купить кофе в зернах в интернет магазине')

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
            <p class="sort">
                <a class="custom-select filter-sort" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Фильтры
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                    <form>
                        <div class="row sort">
                            <div class="col-md-3">
                                <select class="custom-select filter-sort">
                                    <option selected>Цена</option>
                                    <option data-option="price" value="asc">Дешевле</option>
                                    <option data-option="price" value="desc">Дороже</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select filter-sort">
                                    <option selected>Популярность</option>
                                    <option data-option="popularity" value="asc">Чаще покупают</option>
                                    <option data-option="popularity" value="desc">Реже покупают</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select filter-sort">
                                    <option selected>Кислотность</option>
                                    <option data-option="acidity" value="asc">Ниже</option>
                                    <option data-option="acidity" value="desc">Выше</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select filter-sort">
                                    <option selected>Плотность</option>
                                    <option data-option="dencity" value="asc">Ниже</option>
                                    <option data-option="dencity" value="desc">Выше</option>
                                </select>
                            </div>
                        </div>
                    </form>
            </div>

        </div>
        {{--ФИЛЬТРЫ--}}
        <section class="product-section">
            <ul class="catalog-tabs">
                <li class="title-catalog text-left mb-4">Все</li>
                <li class="title-catalog text-left mb-4">Рекомендуем</li>
                <li class="title-catalog text-left mb-4">Новинки</li>
                <li class="title-catalog text-left mb-4">Акции</li>
            </ul>
            <div class="row product-catalog-wrapper">
                {{--PRODUCTS-ARCHIVE--}}
                {{--@foreach($data as $prod)
                    <div class="col-lg-4 ">
                        <a href="/shop/{{ $prod->id }}">
                            <div class="card product-list-single">
                                <div class="card-body">
                                    <p class="card-text text-center text-dark font-weight-bolder">{{ $prod->name }}</p>
                                    <p class="card-text text-center">{{ $prod->category->category }}</p>
                                </div>
                                --}}{{--                                    <img src="{{ asset('/storage/') . '/' . $prod->image }}" alt="{{ $prod->name }}"--}}{{--
                                --}}{{--                                         class="product-list-image">--}}{{--
                                <img src="{{ asset('/images/product.png') }}" alt="{{ $prod->name }}"
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
                                            <h5 class="">{{ $prod->price }} р</h5>
                                        </div>
                                        <div class="float-left margin-left">
                                            <p class="card-text gramm-text">1000г</p>
                                            <h5 class="">{{ $prod->sku->price }} р</h5>
                                        </div>
                                        <div class="float-right button-size">
                                            <button class="btn btn-dark">Купить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach--}}
                {{--PRODUCTS-ARCHIVE--}}
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('js/shop/catalog-page.js') }}"></script>
@endsection
