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
$(document).on('click', '.minus', function () {

    currentQuantity = currentQuantity - 1;
    data.qty = currentQuantity;
    $('#quantity-value').text(currentQuantity);

    if (currentQuantity <= 1) {
        $('.minus').prop('disabled', true);
    } else {
        $('.minus').prop('disabled', false);
    }
})

// Отслеживаем изменение количества. Плюс
$(document).on('click', '.plus', function () {

    currentQuantity = currentQuantity + 1;
    data.qty = currentQuantity;
    $('#quantity-value').text(currentQuantity);

    if (currentQuantity <= 1) {
        $('.minus').prop('disabled', true);
    } else {
        $('.minus').prop('disabled', false);
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


