var filterItem = {
    item: '',
    option: '',
    sort: '',
    tag: 'all_items',
    _token: $('meta[name="csrf-token"]').attr('content')
}

// Показываем все товары при загрузке страницы
$(document).ready(function () {
    filterProdut();
});

// Фильтр по категориям
$('.filter-category-item').on('click', function () {

    filterItem.item = $(this).data('filter');

    // Удаляем класс / отметку с выбранной категории
    $('.filter-icon-active').removeClass('filter-icon-active');

    // Ставим отметку на тэг "Все
    $('.title-catalog').removeClass('mark-item-active');
    $('#all_items').addClass('mark-item-active');

    // Добавляем класс - визуально отмечаем выбранный элемент
    $(this).find('.filter-icon').addClass('filter-icon-active');

    filterProdut();

    // Перемещаем пользователя к товарам после выбора категории
    var product = document.getElementById('all_items');
    product.scrollIntoView({block: "center", inline: "center", behavior: "auto"});
});

// Сортировка по цене
$('.filter-sort').on('change', function () {

    filterItem.sort = $('option:selected', this).val();
    filterItem.option = $('option:selected', this).data('option');

    filterProdut();
});

// Фильтрация по тегам
$('.title-catalog').on('click', function () {

    filterItem.tag = $(this).data('item');
    filterItem.item = '';

    // Сбрасываем отметку на выборе категории
    $('.filter-icon-active').removeClass('filter-icon-active');

    $('.title-catalog').removeClass('mark-item-active');
    $(this).addClass('mark-item-active');

    filterProdut();
});

// Объект с информацией о добавляемом товаре
var arProduct = {
    id: '',
    isSku: '',
    price: 0,
    qty: 1,
    grind: 'в зернах',
    cartTotal: Number($('#cart-total').text()),
    _token: $('meta[name="csrf-token"]').attr('content')
};

// Отслеживаем выбор торгового предложения
$(document).on('click', '.price-product', function () {

    var productPrice = $(this).data('price');
    var productSku = $(this).data('sku');
    var productId = $(this).data('item');

    // Находим через DOM дерево кнопку добавления в корзину
    var objAddToCartButton = $(this).closest('.float-left').nextAll('.button-size').children('.add-to-cart');

    $(objAddToCartButton).attr('data-price', productPrice);
    $(objAddToCartButton).attr('data-item', productId);
    $(objAddToCartButton).attr('data-sku', productSku);

    // Отмечаем выбранное торговое предложение
    if (productSku) {
        $(this).closest('.margin-left').prev().find('span').removeClass('price-product-active');
    }
    else {
        $(this).closest('.float-left').next().find('span').removeClass('price-product-active');
    }
    $(this).children().addClass('price-product-active');
});

// AJAX запрос добавления в корзину
$(document).ready(function () {
    $(document).on('click', '.add-to-cart', function () {

        // Получаем данные о товаре из кнопки добавления в корзину
        arProduct.price = $(this).attr('data-price');
        arProduct.isSku = $(this).attr('data-sku');
        arProduct.id = $(this).attr('data-item');

        addToCart(arProduct);
    });
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

                    // Рендерим карточку товара
                    $(
                        '<div class="col-lg-4 ">' +
                        '<div class="card product-list-single">' +
                        '<a class="text-center" href="/catalog/' + id + '">' +
                        '<div class="card-body">' +
                        '<p class="card-text text-center text-dark font-weight-bolder">' + name + '</p>' +
                        '<p class="card-text text-center category-body">' + category + '</p>' +
                        '</div>' +
                        '<img src="/storage/' + image + '" alt="' + name + '" class="product-list-image">' +
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
                        '<h5 class="price-product" data-price="' + price + '" data-sku="false" data-item="' + id + '"><span class="price-product-border price-product-active">' + price + '</span>  р</h5>' +
                        '</a>' +
                        '</div>' +
                        '<div class="float-left margin-left">' +
                        '<a>' +
                        '<p class="card-text gramm-text">1000г</p>' +
                        '<h5 class="price-product" data-price="' + skuPrice + '" data-sku="true" data-item="' + skuId + '"><span class="price-product-border">' + skuPrice + '</span> р</h5>' +
                        '</a>' +
                        '</div>' +
                        '<div class="float-right button-size">' +
                        '<button type="button" data-sku="false" data-price="' + price + '" data-item="' + id + '" class="btn btn-dark add-to-cart">Купить</button>' +
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





