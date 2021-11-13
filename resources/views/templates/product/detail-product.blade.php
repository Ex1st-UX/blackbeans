@extends('index')

@section('title', $data->name . ' - купить свежее кофе в интернет магазине')

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
                <div class="col-lg-6 text-center">
                    <img class="detail-image" src="{{ asset('/storage') . '/' . $data->image }}">
                </div>
                <div class="col-lg-6 detail-entry-content">
                    <div class="detail-product-wrapper">
                        <h3 class="title-big ">{{ $data->name }}</h3>
                        <h5 class="title-price" id="currentPrice">{{ $data->price }} р</h5>
                        <p style="margin-top: 10px">Доставка: 0 руб.</p>
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
                            <div class="progress-bar bg-dark" role="progressbar"
                                 style="width: {{ $data['dencity'] * 25 }}%"
                                 aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        Плотность
                        <form id="add-to-cart-form" action="{{ '/catalog/{id}/buy' }}" method="post">
                            @csrf
                            <select id="grind" class="custom-select detail-product-category">
                                <option selected>Выберите помол</option>
                                <option value="в зернах">в зернах</option>
                                <option value="для френч-пресса (крупный)">для френч-пресса (крупный)</option>
                                <option value="для пуровера (средний)">для пуровера (средний)</option>
                                <option value="для гейзерной кофеварки (средний)">для гейзерной кофеварки (средний)</option>
                                <option value="для эспрессо (кофеварка, мелкий)">для эспрессо (кофеварка, мелкий)</option>
                                <option value="для турки (мелкий)">для турки (мелкий)</option>
                                <option value="для чашки (средний)">для чашки (средний)</option>
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
                                <button type="button" data-sku="1000" data-issku="true"
                                        data-current="{{ $data->sku->id }}"
                                        data-price="{{ $data->sku->price }}" id="sku-two"
                                        class="btn btn-style border-btn  mt-4 sku-button">1000г
                                </button>
                                <button type="submit" id="add-to-cart" data-action="{{ '/catalog/buy' }}"
                                        data-item="{{ $data->id }}" data-sku="250"
                                        data-summary="{{ $data->price }}"
                                        class="btn btn-style btn-primary  mt-4 add-to-cart-detail">Купить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{--Похожие товары--}}
                @if (!empty($related))
                    <div class="col-lg-12">
                        <h3 class="related-products-title">Похожие товары</h3>
                    </div>
                        @foreach ($related as $item)
                            <div class="col-lg-4">
                                <div class="card product-list-single">
                                    <a class="text-center" href="/catalog/{{ $item['id'] }}">
                                        <div class="card-body">
                                            <p class="card-text text-center text-dark font-weight-bolder">{{ $item['name'] }}</p>
                                            <p class="card-text text-center category-body">{{ $item['category'] }}</p>
                                        </div>
                                        <img src="/storage/{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                             class="product-list-image">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">Кислотность</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-dark" role="progressbar"
                                                 style="width: {{ 25 * $item['acidity'] }}%"
                                                 aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <p class="card-text">Плотность</p>
                                        <div class="progress">
                                            <div class="progress-bar bg-dark" role="progressbar"
                                                 style="width: {{ 25 * $item['dencity'] }}%"
                                                 aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="bottom-card">
                                            <div class="float-left">
                                                <a>
                                                    <p class="card-text gramm-text">250г</p>
                                                    <h5 class="price-product" data-price="{{ $item['price'] }}"
                                                        data-sku="false"
                                                        data-item="{{ $item['id'] }}"><span
                                                            class="price-product-border price-product-active">{{ $item['price'] }}</span>
                                                        р</h5>
                                                </a>
                                            </div>
                                            <div class="float-left margin-left">
                                                <a>
                                                    <p class="card-text gramm-text">1000г</p>
                                                    <h5 class="price-product" data-price="{{ $item['sku_price'] }}"
                                                        data-sku="true"
                                                        data-item="{{ $item['id'] }}"><span
                                                            class="price-product-border">{{ $item['sku_price'] }}</span>
                                                        р</h5>
                                                </a>
                                            </div>
                                            <div class="float-right button-size">
                                                <button type="button" data-sku="false"
                                                        data-price="{{ $item['sku_price'] }}"
                                                        data-item="{{ $item['id'] }}" class="btn btn-dark add-to-cart">
                                                    Купить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ URL::asset('js/shop/catalog-page.js') }}"></script>
@endsection


