<!-- Button trigger modal -->
<button id="add-to-cart-modals-button" type="hidden" style="display: none" class="btn btn-primary" data-toggle="modal"
        data-target="#add-to-cart-success">
    Launch demo modal
</button>

{{--Попап об успешном добавлении в корзину--}}
<div class="modal fade" id="add-to-cart-success" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center modal-success-content">
            <div class="container">
                <span class="success-symbol">&#10004;</span>
                <h3 class="success-element">Товар добавлен в корзину</h3>
                <a href="/cart"><button class="btn-lg btn-block btn-order">Перейти в корзину</button></a>
                <a class="continue-shop" data-dismiss="modal">Продолжить покупки</a>
            </div>
        </div>
    </div>
</div>

{{--Заказ оформлен--}}
<button id="order-modals-button" type="hidden" style="display: none" class="btn btn-primary" data-toggle="modal"
        data-target="#order_success">
    Launch demo modal
</button>

<div class="modal fade" id="order_success" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center modal-success-content">
            <div class="container">
                <span class="success-symbol">&#10004;</span>
                <h3 class="success-element">Номер заказа: <span id="order_id"></span></h3>
                <br>
                <p>Менеджер свяжется с вами в течении 30 минут</p>
                <br>
                <a class="continue-shop" href="{{ route('catalog-product') }}">Продолжить покупки</a>
            </div>
        </div>
    </div>
</div>
