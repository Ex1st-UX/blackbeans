// Фильтр по категориям
$('.filter-category-item').on('click', function () {

    var filterItem = {
        item: $(this).data('filter'),
        _token: $('meta[name="csrf-token"]').attr('content')
    }

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
                        '<a href="/shop/' + id + '">' +
                        '<div class="card product-list-single">' +
                        '<div class="card-body">' +
                        '<p class="card-text text-center text-dark font-weight-bolder">' + name + '</p>' +
                        '<p class="card-text text-center">' + category + '</p>' +
                        '</div>' +
                        '<img src="/images/product.png" alt="' + name + '" class="product-list-image">' +
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
                        '<p class="card-text gramm-text">250г</p>' +
                        '<h5 class="">' + price + '  р</h5>' +
                        '</div>' +
                        '<div class="float-left margin-left">' +
                        '<p class="card-text gramm-text">1000г</p>' +
                        '<h5 class="">' + skuPrice + ' р</h5>' +
                        '</div>' +
                        '<div class="float-right button-size">' +
                        '<button class="btn btn-dark">Купить</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</div>'
                    ).appendTo('.product-catalog-wrapper');
                }
            }
        },
        errro: function () {
            alert('Ошибка');
        }
    });
});
