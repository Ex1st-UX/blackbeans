// возвращает куки с указанным name,
// или undefined, если ничего не найдено
function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

// Проверка, является ли переменная/массив пустым
function isEmpty(str) {
    if (str == 0 || str.length === 0) {
        return true;
    }
}

// Генерация случайного числа
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

var config = {
    _token: $('meta[name="csrf-token"]').attr('content'),
};

function preloaderAdd(target, styles = '') {
    $(
        '<div class="spinner-border ' + styles + '" role="status">' +
        '<span class="sr-only">Loading...</span>' +
        '</div>'
    ).appendTo(target);
}

// Удаляет прелоадер
function preloaderRemove() {
    $('.spinner-border').detach();
    $('.sr-only').detach();
}

// Показывает корзину при наведении
$('#cart-total-icon').mouseenter(function (e) {
    e.preventDefault();

    conditionHandler();
});

function conditionHandler() {
    $.ajax({
        url: '/catalog/condition',
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
                $(
                    '<p class="text-center cart-condition-empty" id="cart_condition_empty">Ваша корзина пуста</p>' +
                    '<p class="text-center cart-condition-empty">&#128064;</p>' +
                    '<a href="/catalog"><button type="button" class="btn-lg btn-block btn-order">Исправить ?</button></a>'
                ).appendTo('.cart-condition');
            } else {
                // Проходим по элементам объекта
                for (var arItem of Object.entries(arData)) {

                    var name = arItem[1].name;
                    var quantity = arItem[1].quantity;
                    var price = arItem[1].price;
                    var image = arItem[1].attributes.image;

                    // Отрисовываем товар в состояние корзины
                    $(
                        '<div class="media cart-condition-entry">' +
                        '<img class="d-flex align-self-center mr-3 cart-condition-image" data-src="{{ asset(\'/images/product.png\') }}" src="/storage/' + image + '">' +
                        '<div class="media-body">' +
                        '<h5 class="mt-0">' + name + '</h5>' +
                        '<span>' +
                        '<span>' + price + ' р</span>' +
                        '<br>' +
                        '<span> Количество: ' + quantity + '</span>' +
                        '</span>' +
                        '</div>' +
                        '</div>'
                    ).appendTo('#cart-condition-content');
                }

                // $('<p>Очистить корзину</p>').appendTo('#cart-condition-content');

                //Отрисовываем кнопку "оформить заказ"
                $('<a href="/cart"><button type="button" class="btn-lg btn-block btn-order">Оформить заказ</button></a>').appendTo('#cart-condition-content');
            }

            $('#cart-total-icon').unbind();
        },
        error: function () {
            alert('Ошибка');
        }
    });
}

// Убирать состояние корзины, если пользователь убрал мышь
$('#cart-condition').mouseleave(function () {

    $('.cart-condition').attr('style', 'display: none!important;')

    // Удаляем содержимое в состоянии корзины
    $('.cart-condition-entry').detach();
    $('.btn-order').detach();
    $('.cart-condition-empty').detach();

    $('#cart-total-icon').bind('mouseenter', function (e) {
        e.preventDefault();

        conditionHandler();
    });
});

//Кнопка закрыть в окне состояния корзины
$('#cart_condition_close').on('click', function () {
    $('.cart-condition').attr('style', 'display: none!important;');
});

// Функция добавляющая товар в корзину через AJAX
function addToCart(data) {
    $.ajax({
        url: '/catalog/buy',
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
}

// AJAX для установки куки на каждой странице
$(document).ready(function () {
    $.ajax({
        url: '/setcookie',
        type: 'GET',
        data: {},
    });

    // Обработчик для промо баннера в нижнем правом углу
    $(document).scroll(function () {
        var scrollFromTop = pageYOffset;
        var cookiePromo = getCookie('promo');

        if (!cookiePromo) {
            if (scrollFromTop >= 800) {
                $('.promo-popup').css('visibility', 'visible');
            } else {
                $('.promo-popup').css('visibility', 'hidden');
            }

            $('.promo_popup_button').on('click', function () {
                $('.promo-popup').css('visibility', 'hidden');

                document.cookie = 'promo=1';
            });
        }
    });
});

