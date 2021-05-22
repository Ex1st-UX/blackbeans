// Объект с информацией о добавляемом товаре
var arProduct = {
    id: '',
    isSku: '',
    price: 0,
    qty: 1,
    grind: 'Для турки',
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
