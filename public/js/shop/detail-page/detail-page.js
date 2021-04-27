var currentQuantity = Number($('#quantity-value').text());

// Объект содержит данные о добавляемом товаре. Отправляется в AJAX
var data = {
    id: $('#sku-one').data('current'),
    price: $('#add-to-cart').data('summary'),
    qty: 1,
    isSku: false,
    cartTotal: Number($('#cart-total').text()),
    action: $('#add-to-cart').data('action'),
    grind: $('#grind option:selected').text(),
    _token: $('meta[name="csrf-token"]').attr('content')
};

// Получаем информацию о выбранном помоле
$('#grind').on('change', function () {
    data.grind = $('#grind option:selected').text();
});

// Отслеживаем изменение количества. Минус
$('#minus').on('click', function () {

    currentQuantity = currentQuantity - 1;
    data.qty = currentQuantity;
    $('#quantity-value').text(currentQuantity);

    if (currentQuantity <= 1) {
        $('#minus').prop('disabled', true);
    } else {
        $('#minus').prop('disabled', false);
    }
})

// Отслеживаем изменение количества. Плюс
$('#plus').on('click', function () {

    currentQuantity = currentQuantity + 1;
    data.qty = currentQuantity;
    $('#quantity-value').text(currentQuantity);

    if (currentQuantity <= 1) {
        $('#minus').prop('disabled', true);
    } else {
        $('#minus').prop('disabled', false);
    }
})

// Отслеживаем изменения торгового предложения и изменяем цену
$('.sku-button').on('click', function priceHandler() {

    data.isSku = $(this).data('issku');
    data.id = $(this).data('current');
    data.price = $(this).data('price');

    $('#currentPrice').text(data.price + ' p');
});

// AJAX Добавление в корзину с детальной страницы
$(document).ready(function () {
    $('#add-to-cart-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: data.action,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function () {
                $('#add-to-cart-modals-button').trigger('click');

                data.cartTotal = data.cartTotal + (data.price * data.qty);
                $('#cart-total').text(data.cartTotal);
            },
            error: function () {
                alert('Ошибка');
            }

        });
    });
});

// Обработчик всплытия корзины при наведении
conditionHandler();

function conditionHandler() {
    $('#cart-total-icon').mouseenter(function (e) {
        e.preventDefault();

        $.ajax({
            url: '/shop/condition',
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function () {
                // Раскрываем состояние корзины
                $('.cart-condition').attr('style', 'display: block;');

                preloaderAdd('.cart-condition', 'preloader-condition');
            },
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                preloaderRemove()

                var arData = response.data;

                if (!arData) {
                    $('<p class="text-center" id="cart_condition_empty">Ваша корзина пуста</p>').appendTo('.cart-condition');
                    return;
                }
                else {
                    // Проходим по элементам объекта
                    for (var arItem of Object.entries(arData)) {

                        // TODO: Сортировка по убыванию цены в состоянии корзины
                        // priceSorted.sort(function (a, b)
                        // {
                        //     if (a.quantity > b.quantity) {
                        //
                        //         return console.log('-1');
                        //     }
                        //     if (a.quantity < b.quantity) {
                        //         return console.log('1');
                        //     }
                        //     // a должно быть равным b
                        //     return console.log('0');;
                        // });

                        var name = arItem[1].name;
                        var quantity = arItem[1].quantity;
                        var price = arItem[1].price;

                        // Отрисовываем твоар в состояние корзины
                        $(
                            '<div class="media cart-condition-entry">' +
                            '<img class="d-flex align-self-center mr-3 cart-condition-image" data-src="{{ asset(\'/images/product.png\') }}" src="/images/product.png">' +
                            '<div class="media-body">' +
                            '<h5 class="mt-0">' + name + '</h5>' +
                            '<span>' +
                            '<span>' + price + '</span>' +
                            '<br>' +
                            '<span> Количество: ' + quantity + '</span>' +
                            '</span>' +
                            '</div>' +
                            '</div>'
                        ).appendTo('#cart-condition-content');

                        $('#cart-total-icon').unbind();
                    }

                    //Отрисовываем кнопку "оформить заказ"
                    $('<a href="/cart"><button type="button" class="btn-lg btn-block btn-order">Оформить заказ</button></a>').appendTo('#cart-condition-content');
                }
            },
            error: function () {
                alert('Ошибка');
            }
        });
    });
}

// Убирать состояние корзины, если пользователь убрал мышь
$('#cart-condition').mouseleave(function () {

    $('.cart-condition').attr('style', 'display: none!important;')

    // Удаляем карточку в состоянии корзины
    $('.cart-condition-entry').detach();
    $('.btn-order').detach();
    $('#cart_condition_empty').detach();

    $('#cart-total-icon').bind('hover', conditionHandler());
});

//Кнопка закрыть в окне состояния корзины
$('#cart_condition_close').on('click', function () {
    $('.cart-condition').attr('style', 'display: none!important;');
});
