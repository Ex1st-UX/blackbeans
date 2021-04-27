// При загрузке страницы отправляем AJAX для получения корзины
// TODO: рендерить содержимое корзины одной функцией
$(document).ready(function () {

    $.ajax({
        url: '/cart/render',
        dataType: 'JSON',
        method: 'POST',
        data: config,
        beforeSend: function () {
            preloaderAdd('.cart-total-wrapper', 'preloader-total-cart text-center');
        },
        success: function (responce) {
            preloaderRemove();
            // $('.cart-total-wrapper').detach();

            var data = responce.data;

            if (!data) {
                $('<h2>Ваша корзина пуста</h2>').appendTo('.contacts12-main');
            } else {
                for (var dataItem of Object.entries(data)) {

                    var id = dataItem[1].id;
                    var name = dataItem[1].name;
                    var quantity = dataItem[1].quantity;
                    var price = dataItem[1].price;
                    var qtySumm = price * quantity + ' р';
                    var grind = dataItem[1].attributes.grind;
                    var image = dataItem[1].attributes.image

                    $(
                        '<tr>' +
                        '<td><img width="100px" src="/images/product.png"</td>' +
                        '<td>' +
                        name +
                        '<p class="additionally-information">Помол: <span class="">' + grind + '</span></p>' +
                        '</td>' +
                        '<td>' +
                        quantity +
                        '<p class="additionally-information"><span class="">1 шт ' + price + 'p</span></p>' +
                        '</td>' +
                        '<td>' +
                        qtySumm +
                        '<p class="additionally-information"><a  class="item-delete" data-action="delete" data-item="' + id + '">Удалить</a></p>' +
                        '</td>' +
                        '</tr>'
                    ).appendTo('#cart-total-entry');
                }
            }
        },
        error: function () {
            alert('Ошибка');
        },
    });
});

// Кнопка "удалить" товар из корзины
$(document).on('click', '.item-delete', function( ) {

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
            $('#cart-total-entry').empty();

            preloaderAdd('#cart-total-wrapper', 'preloader-total-cart text-center');
        },
        success: function (responce) {
            preloaderRemove();

            var data = responce.data;

            if (!data) {
                $('<h2>Ваша корзина пуста</h2>').appendTo('.contacts12-main');
            } else {
                for (var dataItem of Object.entries(data)) {

                    var id = dataItem[1].id;
                    var name = dataItem[1].name;
                    var quantity = dataItem[1].quantity;
                    var price = dataItem[1].price;
                    var qtySumm = price * quantity + ' р';
                    var grind = dataItem[1].attributes.grind;
                    var image = dataItem[1].attributes.image

                    $(
                        '<tr>' +
                        '<td><img width="100px" src="/images/product.png"</td>' +
                        '<td>' +
                        name +
                        '<p class="additionally-information">Помол: <span class="">' + grind + '</span></p>' +
                        '</td>' +
                        '<td>' +
                        quantity +
                        '<p class="additionally-information"><span class="">1 шт ' + price + 'p</span></p>' +
                        '</td>' +
                        '<td>' +
                        qtySumm +
                        '<p class="additionally-information"><a  class="item-delete" data-action="delete" data-item="' + id + '">Удалить</a></p>' +
                        '</td>' +
                        '</tr>'
                    ).appendTo('#cart-total-entry');
                }
            }
        },
        error: function () {
            alert('Ошибка');
        }
    });
});

