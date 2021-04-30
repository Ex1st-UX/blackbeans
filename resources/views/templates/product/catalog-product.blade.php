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
                    <div class="column position-relative">
                        <a href="#url"><img src="{{ asset('images/filter-icon-turka.jpg') }}" alt=""
                                            class="img-fluid radius-image filter-icon"></a>
                    </div>
                    <h4><a href="#team">Турка</a></h4>
                </div>
                <div class="team-info col-md-2 col-6">
                    <div class="column position-relative">
                        <a href="#url"><img src="{{ asset('images/filter-icon-gaser.png') }}" alt=""
                                            class="img-fluid radius-image filter-icon"></a>
                    </div>
                    <h4><a href="#team">Гейзер</a></h4>
                </div>
                <div class="team-info col-md-2 col-6">
                    <div class="column position-relative">
                        <a href="#url"><img src="{{ asset('images/filter-icon-french.png') }}" alt=""
                                            class="img-fluid radius-image filter-icon"></a>
                    </div>
                    <h4><a href="#team">Френч-пресс</a></h4>
                </div>
                <div class="team-info col-md-2 col-6">
                    <div class="column position-relative">
                        <a href="#url"><img src="{{ asset('images/filter-icon-purover.png') }}" alt=""
                                            class="img-fluid radius-image filter-icon"></a>
                    </div>
                    <h4><a href="#team">Пуровер</a></h4>
                </div>
                <div class="team-info col-md-2 col-6">
                    <div class="column position-relative">
                        <a href="#url"><img src="{{ asset('images/filter-icon-coffemachine.png') }}" alt=""
                                            class="img-fluid radius-image filter-icon"></a>
                    </div>
                    <h4><a href="#team">Кофеварка</a></h4>
                </div>
                <div class="team-info col-md-2 col-6">
                    <div class="column position-relative">
                        <a href="#url"><img src="{{ asset('images/filter-icon-cap.png') }}" alt=""
                                            class="img-fluid radius-image filter-icon"></a>
                    </div>
                    <h4><a href="#team">Чашка</a></h4>
                </div>
            </div>
            <form>
                <div class="row sort">
                    <div class="col-md-3">
                        <select class="custom-select">
                            <option selected>Цена</option>
                            <option value="1">Дешевле</option>
                            <option value="2">Дороже</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="custom-select">
                            <option selected>Популярность</option>
                            <option value="1">Чаще покупают</option>
                            <option value="2">Реже покупают</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="custom-select">
                            <option selected>Кислотность</option>
                            <option value="1">Ниже</option>
                            <option value="2">Выше</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="custom-select">
                            <option selected>Плотность</option>
                            <option value="1">Ниже</option>
                            <option value="2">Выше</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        {{--ФИЛЬТРЫ--}}
        <section class="product-section">
            <ul class="catalog-tabs">
                <li class="title-catalog text-left mb-4">Все</li>
                <li class="title-catalog text-left mb-4">Рекомендуем</li>
                <li class="title-catalog text-left mb-4">Новинки</li>
                <li class="title-catalog text-left mb-4">Акции</li>
            </ul>
            <div class="row">
                {{--PRODUCTS-ARCHIVE--}}
                @foreach($data as $prod)
                    <div class="col-lg-4 ">
                        <a href="/shop/{{ $prod->id }}">
                            <div class="card product-list-single">
                                <div class="card-body">
                                    <p class="card-text text-center text-dark font-weight-bolder">{{ $prod->name }}</p>
                                    <p class="card-text text-center">{{ $prod->category->category }}</p>
                                </div>
                                {{--                                    <img src="{{ asset('/storage/') . '/' . $prod->image }}" alt="{{ $prod->name }}"--}}
                                {{--                                         class="product-list-image">--}}
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
                @endforeach
                {{--PRODUCTS-ARCHIVE--}}
            </div>
        </section>
    </div>
@endsection
