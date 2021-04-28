// Функция рендерит корзину, варианты доставки и методы оплаты
function cartRender(response) {

    preloaderRemove();

    var data = response.data;

    if (!data) {
        $('<h2>Ваша корзина пуста</h2>').appendTo('.contacts12-main');
    } else {
        for (var dataItem of Object.entries(data)) {

            var id = dataItem[1].id;
            name = dataItem[1].name;
            quantity = dataItem[1].quantity;
            price = dataItem[1].price;
            qtySumm = price * quantity + ' р';
            grind = dataItem[1].attributes.grind;
            image = dataItem[1].attributes.image;
            cartTotal = response.cartTotal;

            $(
                '<tr>' +
                '<td><img width="100px" src="/images/product.png"</td>' +
                '<td>' +
                '<a style="color: darkgrey;" href="/shop/' + id + '">' + name + '</a>' +
                '<p class="additionally-information">Помол: <span class="">' + grind + '</span></p>' +
                '</td>' +
                '<td>' +
                '<button class="btn border-btn button-quantity total-cart-minus" data-quantity="' + quantity + '" data-action="minus" data-item="' + id + '"  type="button" id="minus">-</button>' +
                '<span class="quantity-total">' +
                quantity +
                '</span>' +
                '<button class="btn border-btn button-quantity total-cart-plus" data-quantity="' + quantity + '" data-action="plus" data-item="' + id + '"  type="button" id="plus">+</button>' +
                '<p class="additionally-information"><span class="">1 шт ' + price + 'p</span></p>' +
                '</td>' +
                '<td>' +
                qtySumm +
                '<p class="additionally-information"><a  class="item-delete" data-action="delete" data-item="' + id + '">Удалить</a></p>' +
                '</td>' +
                '</tr>'
            ).appendTo('#cart-total-entry');
        }

        // Рендерим раздел "итого"
        $(
            '<div class="payment" id="cart-total-summary">' +
            '<table class="table table-borderless payment-table text-left">' +
            '<tbody>' +
            '<tr>' +
            '<td>Корзина</td>' +
            '<td class="font-weight-bolder"><span id="summary">' + cartTotal + '</span> руб.</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Доставка</td>' +
            '<td class="font-weight-bolder">0 руб.</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Скидка</td>' +
            '<td class="font-weight-bolder">0 руб.</td>' +
            '</tr>' +
            '<tr>' +
            '<td class="font-weight-bolder">К оплате</td>' +
            '<td class="font-weight-bolder"><span id="summary">' + cartTotal + '</span> руб.</td>' +
            '</tr>' +
            '</tbody>' +
            '</table>' +
            '<button type="submit" id="add_to_order" class="btn-lg btn-block btn-order-submit">Оформить заказ</button>' +
            '</div>'
        ).appendTo('.cart-total-content');
    }
}

// При загрузке страницы отправляем AJAX для получения корзины
$(document).ready(function () {

    $.ajax({
        url: '/cart/render',
        dataType: 'JSON',
        method: 'POST',
        data: config,
        beforeSend: function () {
            preloaderAdd('.cart-total-wrapper', 'preloader-total-cart text-center');
        },
        success: function (response) {
            cartRender(response);
        },
        error: function () {
            alert('Ошибка');
        },
    });
});

// Кнопка "удалить" товар из корзины
$(document).on('click', '.item-delete', function () {

    var arDelete = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        action: $(this).data('action'),
        id: $(this).data('item'),
    };

    $.ajax({
        url: '/cart/update',
        dataType: 'JSON',
        method: 'POST',
        data: arDelete,
        beforeSend: function () {
            $('#cart-total-summary').detach();
            $('#cart-total-entry').empty();

            preloaderAdd('#cart-total-wrapper', 'preloader-total-cart text-center');
        },
        success: function (response) {
            cartRender(response);
        },
        error: function () {
            alert('Ошибка');
        }
    });
});

// Кнопка "минус" к количеству товаров
$(document).on('click', '.total-cart-minus', function () {

        var arMinus = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            action: $(this).data('action'),
            id: $(this).data('item'),
        };

        $.ajax({
            url: '/cart/update',
            dataType: 'JSON',
            method: 'POST',
            data: arMinus,
            beforeSend: function () {
                $('#cart-total-summary').detach();
                $('#cart-total-entry').empty();

                preloaderAdd('#cart-total-wrapper', 'preloader-total-cart text-center');
            },
            success: function (response) {
                cartRender(response);
            },
            error: function () {
                alert('Ошибка');
            }
        });
    }
);

// Отслеживаем кнопку плюс
$(document).on('click', '.total-cart-plus', function () {

    currentQuantity = $(this).data('quantity');
    currentQuantity = currentQuantity + 1;

    var arPlus = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        action: $(this).data('action'),
        currentQuantity: currentQuantity,
        id: $(this).data('item'),
    };

    $.ajax({
        url: '/cart/update',
        dataType: 'JSON',
        method: 'POST',
        data: arPlus,
        beforeSend: function () {
            $('#cart-total-summary').detach();
            $('#cart-total-entry').empty();

            preloaderAdd('#cart-total-wrapper', 'preloader-total-cart text-center');
        },
        success: function (response) {
            cartRender(response)
        },
        error: function () {
            alert('Ошибка');
        }
    });
});

// Создать заказ
$(document).on('click', '#add_to_order', function (e) {
    e.preventDefault();

    var arOrder = {
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    $.ajax({
        url: '/cart/submit',
        dataType: 'JSON',
        method: 'POST',
        data: arOrder,
        success: function () {
            console.log('ok');
        },
        error: function () {
            alert('Ошибка');
        }
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
                        $('<p class="text-center cart-condition-empty" id="cart_condition_empty">Ваша корзина пуста</p>').appendTo('.cart-condition');
                        return;
                    } else {
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

        // Удаляем содержимое в состоянии корзины
        $('.cart-condition-entry').detach();
        $('.btn-order').detach();
        $('.cart-condition-empty').detach();

        $('#cart-total-icon').bind('hover', conditionHandler());
    });

//Кнопка закрыть в окне состояния корзины
    $('#cart_condition_close').on('click', function () {
        $('.cart-condition').attr('style', 'display: none!important;');
    });

// Добавляем аниацию выбранному методу оплаты
// $(document).on('click', '.delievery-item-wrapper', function () {
//
//     active = $(this).addClass('method-active');
//     hasActive = $(this).hasClass('method-active');
//
//     if (hasActive) {
//         $(this).removeClass('method-active');
//     }
//     else {
//         active;
//     }
// })



