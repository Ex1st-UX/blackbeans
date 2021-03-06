$(document).on('click', '#add_to_order', checkOrderValidation)
$(document).on('submit', '#order_create', function (e) {
    createOrder(e)
});

// При загрузке страницы отправляем AJAX для получения корзины
$(document).ready(function () {
    $.ajax({
        url: '/cart/render',
        dataType: 'JSON',
        method: 'POST',
        data: config,
        beforeSend: function () {
            preloaderAdd('.cart-total-wrapper', 'preloader-total-cart text-center');
            preloaderAdd('.cart-total-summary', 'preloader-total-cart text-center');
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

let payment = 0;

function createOrder(e) {
    e.preventDefault();
    $('#payment_method_error').detach();

    const arOrder = getOrderFormValues();

    if (payment) {
        $.ajax({
            url: '/cart/submit',
            dataType: 'JSON',
            method: 'POST',
            data: arOrder,
            success: function (response) {
                $('#order_id').text(response.orderId);

                $('#order-modals-button').trigger('click');
            },
            error: function () {
                alert('Ошибка');
            }
        });
    } else {
        $('<p class="text-danger" id="payment_method_error">Выберите способ оплаты</p>').appendTo('.payment-wrapper');
    }
}

function checkOrderValidation() {
    $('.order_validation_error_wrapper').empty();

    const arOrder = getOrderFormValues();

    if (arOrder.name.length <= 0) {
        errorValidationRender('error_name', 'Заполните имя');
    }
    if (arOrder.surname.length <= 0) {
        errorValidationRender('error_surname', 'Заполните фамилию');
    }
    if (arOrder.email.length <= 0) {
        errorValidationRender('error_email', 'Укажите электронную почту');
    }
    if (arOrder.delievery.length <= 0) {
        errorValidationRender('error_delievery', 'Выберите доставку');
    }
    if (arOrder.street.length <= 0) {
        errorValidationRender('error_street', 'Укажите улицу и дом');
    }
    if (arOrder.city.length <= 0) {
        errorValidationRender('error_city', 'Укажите город');
    }
    if (arOrder.phone.length <= 0) {
        errorValidationRender('error_phone', 'Заполните телефон');
    }
    if (arOrder.payment <= 0) {
        errorValidationRender('error_payment', 'Выберите способ оплаты');
    }
}

function getOrderFormValues() {
    const arOrder = {
        name: $('#name').val(),
        surname: $('#surname').val(),
        email: $('#email').val(),
        delievery: $('#method-item').data('id'),
        delieveryCost: $('#delievery_cost_total').text(),
        discount: $('#discount').text(),
        total: $('#summary').text(),
        street: $('#street').val(),
        city: $('#city').val(),
        phone: $('#phone').val(),
        appartments: $('#apps').val(),
        postcode: 445000,
        payment: payment,
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

    return arOrder;
}

function errorValidationRender(selectorID, text) {
    selectorID = '#' + selectorID;

    $(selectorID).html('<p class="text-danger order_validation_error">' + text + '</p>');
}

// Отмечаем выбранный способ оплаты
$('.payment-item-wrapper').on('click', function () {
    $('.payment-item-wrapper').removeClass('payment-active');

    $(this).addClass('payment-active');

    payment = $(this).data('id')
});

// Перемещаем корзину в верх (ТОЛЬКО ДЛЯ МОБИЛЬНОЙ ВЕРСИИ)
if (screenWidth <= 600) {
    $('.contacts12-main').prependTo('.left-side-block');
}

function cartRender(response) {
    preloaderRemove();

    var data = response.data;

    if (!data) {
        $('<h2>Ваша корзина пуста</h2>').appendTo('.contacts12-main');
    } else {
        for (var dataItem of Object.entries(data)) {

            let id = dataItem[1].id;
            name = dataItem[1].name;
            quantity = dataItem[1].quantity;
            price = dataItem[1].price;
            qtySumm = price * quantity + ' р';
            grind = dataItem[1].attributes.grind;
            image = dataItem[1].attributes.image;
            cartTotal = response.cartTotal;
            url = dataItem[1].attributes.url;

            $(
                '<tr>' +
                '<td><img width="100%" src="/storage/' + image + '"</td>' +
                '<td>' +
                '<a style="color: darkgrey;" href="' + url + '">' + name + '</a>' +
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
            '<table class="table table-borderless payment-table">' +
            '<tbody>' +
            '<tr>' +
            '<td>Корзина</td>' +
            '<td class="font-weight-bolder"><span id="summary">' + cartTotal + '</span> руб.</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Доставка</td>' +
            '<td class="font-weight-bolder" id="delievery_cost_total">0 руб.</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Скидка</td>' +
            '<td class="font-weight-bolder" id="discount">0 руб.</td>' +
            '</tr>' +
            '<tr>' +
            '<td class="font-weight-bolder">К оплате</td>' +
            '<td class="font-weight-bolder"><span id="summary">' + cartTotal + '</span> руб.</td>' +
            '</tr>' +
            '</tbody>' +
            '</table>' +
            '<button type="submit" id="add_to_order" class="btn-lg btn-block btn-order-submit">Оформить заказ</button>' +
            '</div>'
        ).appendTo('.left-side-block');
    }
}
