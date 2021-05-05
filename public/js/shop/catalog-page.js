var filterItem = {
    item: '',
    option: '',
    sort: '',
    _token: $('meta[name="csrf-token"]').attr('content')
}

// Показываем все товары при загрузке страницы
$(document).ready(function () {
    filterProdut();
});

// Фильтр по категориям
$('.filter-category-item').on('click', function () {

    filterItem.item = $(this).data('filter');

    filterProdut();
});

// Сортировка по цене
$('.filter-sort').on('change', function () {

    filterItem.sort = $('option:selected', this).val();
    filterItem.option = $('option:selected', this).data('option');

    filterProdut();
});

// Функция AJAX запроса для фильтрации и сортировки
function filterProdut() {

    $.ajax({
        url: '/catalog/filterByCategory',
        type: 'POST',
        dataType: 'JSON',
        data: filterItem,
        beforeSend: function () {
            $('div.product-catalog-wrapper').empty();

            preloaderAdd('.product-catalog-wrapper', 'preloader-catalog-products');
        },
        success: function (response) {
            preloaderRemove();

            var data = response.data;

            if (isEmpty(data)) {
                $(
                    '<button type="button" class="btn-lg btn-block btn-order empty-result-msg">По вашему запросу ничего не найдено</button>'
                ).appendTo('.product-catalog-wrapper');
            } else {
                for (var dataItem of Object.entries(data)) {
                    var acidity = dataItem[1].acidity,
                        category = dataItem[1].category,
                        dencity = dataItem[1].dencity,
                        id = dataItem[1].id,
                        image = dataItem[1].image,
                        name = dataItem[1].name,
                        price = dataItem[1].price,
                        skuId = dataItem[1].sku_id,
                        skuPrice = dataItem[1].sku_price;

                    $(
                        '<div class="col-lg-4 ">' +
                        '<div class="card product-list-single">' +
                        '<a class="text-center" href="/shop/' + id + '">' +
                        '<div class="card-body">' +
                        '<p class="card-text text-center text-dark font-weight-bolder">' + name + '</p>' +
                        '<p class="card-text text-center">' + category + '</p>' +
                        '</div>' +
                        '<img src="/images/product.png" alt="' + name + '" class="product-list-image">' +
                        '</a>' +
                        '<div class="card-body">' +
                        '<p class="card-text">Кислотность</p>' +
                        '<div class="progress">' +
                        '<div class="progress-bar bg-dark" role="progressbar"' +
                        'style="width: ' + acidity * 25 + '%"' +
                        'aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">' +
                        '</div>' +
                        '</div>' +
                        '<p class="card-text">Плотность</p>' +
                        '<div class="progress">' +
                        '<div class="progress-bar bg-dark" role="progressbar"' +
                        'style="width: ' + dencity * 25 + '%"' +
                        'aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>' +
                        '</div>' +
                        '<div class="bottom-card">' +
                        '<div class="float-left">' +
                        '<a>' +
                        '<p class="card-text gramm-text">250г</p>' +
                        '<h5 class="price-product" data-sku="false" data-item="' + id + '">' + price + '  р</h5>' +
                        '</a>' +
                        '</div>' +
                        '<div class="float-left margin-left">' +
                        '<a>' +
                        '<p class="card-text gramm-text">1000г</p>' +
                        '<h5 class="price-product" data-sku="true" data-item="' + skuId + '">' + skuPrice + ' р</h5>' +
                        '</a>' +
                        '</div>' +
                        '<div class="float-right button-size">' +
                        '<button type="button" data-sku="false" data-item="' + id + '" class="btn btn-dark add-to-cart">Купить</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                    ).appendTo('.product-catalog-wrapper');
                }
            }
        },
        errro: function () {
            alert('Ошибка');
        }
    });
}

var arProduct = {
    id: '',
    isSku: '',
    qty: 1,
    grind: 'Для турки',
    _token: $('meta[name="csrf-token"]').attr('content')
};

// Отслеживаем выбор торгового предложения
$(document).on('click', '.price-product', function () {

    var productSku = $(this).data('sku');
    var productId = $(this).data('item');

    var objAddToCartButton = $(this).closest('.float-left').nextAll('.button-size').children('.add-to-cart');

    $(objAddToCartButton).attr('data-item', productId);
    $(objAddToCartButton).attr('data-sku', productSku);

    arProduct.isSku = $(this).data('sku');
    arProduct.id = $(this).data('item');

    console.log(arProduct);
});

// AJAX запрос добавления в корзину
$(document).ready(function () {
    $(document).on('click', '.add-to-cart', function () {

        arProduct.isSku = $(this).data('sku');
        arProduct.id = $(this).data('item');

        console.log(arProduct);

        $.ajax({
            url: '/shop/buy',
            type: 'POST',
            dataType: 'JSON',
            data: arProduct,
            success: function (response) {
                console.log('done');
            },
            error: function () {
                alert('Ошибка')
            },
        });
    });
});




