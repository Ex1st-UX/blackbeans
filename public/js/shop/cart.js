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
                '<td><img width="100px" src="/storage/' + image + '"</td>' +
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

var payment = 2

// Создать заказ
$(document).on('submit', '#order_create', function (e) {
    e.preventDefault();

    var arOrder = {
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
        postcode: $('#postcode').val(),
        payment: payment,
        _token: $('meta[name="csrf-token"]').attr('content'),
    };

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
});

// Отмечаем выбранный способ оплаты
$('.payment-item-wrapper').on('click', function () {

    $('.payment-item-wrapper').removeClass('payment-active');

    $(this).addClass('payment-active');

    payment = $(this).data('id')
});




