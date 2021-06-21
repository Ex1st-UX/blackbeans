@extends('index')

@section('title', 'Детальная страница')

@section('body')
<div class="inner-banner">
</div>
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="{{ route('home') }}">Главная</a></li>
            @foreach ($breadcrumbs as $page)
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>{{  $page }}</li>
            @endforeach
        </ul>
    </div>
</section>
<section class="w3l-aboutblock1 py-5" id="bottom">
    <div class="container py-lg-5 py-md-3">
        <div class="row">
            <div class="col-lg-6 text-center">
                <img class="detail-image" src="{{ asset('/storage') . '/' . $data->image }}">
            </div>
            <div class="col-lg-6 detail-entry-content">
                <div class="detail-product-wrapper">
                    <h3 class="title-big ">{{ $data->name }}</h3>
                    <h5 class="title-price" id="currentPrice">{{ $data->price }} р</h5>
                    <p class="card-text detail-product-category">{{ $data->category->category }}</p>
                    <p class="card-text detail-product-category">{{ $data->description }}</p>
                    <div class="progress detail-product-progress">
                        <div class="progress-bar bg-dark" role="progressbar"
                             style="width: {{ $data['acidity'] * 25 }}%"
                             aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    Кислотность
                    <div class="progress detail-product-progress">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $data['dencity'] * 25 }}%"
                             aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    Плотность
                    <form id="add-to-cart-form" action="{{ '/shop/{id}/buy' }}" method="post">
                        @csrf
                        <select id="grind" class="custom-select detail-product-category">
                            <option selected>Выберите помол</option>
                            <option value="Не молоть">Не молоть</option>
                            <option value="Для турки">Для турки</option>
                            <option value="Для френчпресса">Для френчпресса</option>
                            <option value="Для гейзерной кофеварки">Для гейзерной кофеварки</option>
                        </select>
                        <div class="detail-entry-footer">
                            <div class="quantity mt-4">
                                <button class="btn minus border-btn" disabled type="button" id="minus">-</button>
                                <span class="quantity-total" id="quantity-value">1</span>
                                <button class="btn plus border-btn" type="button" id="plus">+</button>
                            </div>
                            <button type="button" data-sku="250" data-issku="false" data-current="{{ $data->id }}"
                                    data-price="{{ $data->price }}" id="sku-one"
                                    class="btn btn-style border-btn  mt-4 sku-button">250г
                            </button>
                            <button type="button" data-sku="1000" data-issku="true" data-current="{{ $data->sku->id }}"
                                    data-price="{{ $data->sku->price }}" id="sku-two"
                                    class="btn btn-style border-btn  mt-4 sku-button">1000г
                            </button>
                            <button type="submit" id="add-to-cart" data-action="{{ '/shop/buy' }}"
                                    data-item="{{ $data->id }}" data-sku="250"
                                    data-summary="{{ $data->price }}"
                                    class="btn btn-style btn-primary  mt-4 add-to-cart">Купить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description">Описание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#characteristics">Доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#opinion">Оплата</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description">
                        Описание товара...
                    </div>
                    <div class="tab-pane fade" id="characteristics">
                        Характеристики товара...
                    </div>
                    <div class="tab-pane fade" id="opinion">
                        Отзывы...
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


