<section class="w3l-blog-single1 py-5">
    <div class="container py-lg-3">
        <div class="d-grid-1">
            <div class="text">
                <h3 class="text-title">Новый заказ № {{ $data['order_id'] }}</h3>
            </div>
        </div>
        <div class="text-content-text">
            <div class="d-grid-2">
                <div class="text2">
                    <table border="4" bordercolor="#000000" cellspacing="0" cellpadding= "10">
                        <tr>
                            <th>ID</th>
                            <th>Картинка</th>
                            <th>Название</th>
                            <th>Помол</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Сумма</th>
                        </tr>
                        @foreach ($data['items'] as $item)
                            <tr>
                                <th>{{ $item['product_id'] }}</th>
                                <th width="33%"><img src="blackbeans.ru/storage/" {{ $item['product_image'] }}></th>
                                <th><a href="blackbeans.ru/" . {{ $item['product_url'] }}>{{ $item['product_name'] }}</a></th>
                                <th>{{ $item['grind'] }}</th>
                                <th width="10%">{{ $item['quantity'] }}</th>
                                <th width="10%">{{ $item['product_price'] }}</th>
                                <th width="10%">{{ $item['product_price'] * $item['quantity'] }}</th>
                            </tr>
                        @endforeach
                    </table>

                    <p><strong>Данные о клиенте</strong></p>
                    <p>Имя: {{ $data['name'] }}</p>
                    <p>Фамилия: {{ $data['surname'] }}</p>
                    <p>E-mail: {{ $data['email'] }}</p>
                    <p>Телефон: {{ $data['phone'] }}</p>
                    <p><strong>Данные о доставке</strong></p>
                    <p>Способ доставки: {{ $data['delivery'] }}</p>
                    <p>Стоимость доставки: {{ $data['delivery_cost'] }}</p>
                    <p>Город: {{ $data['city'] }}</p>
                    <p>Улица: {{ $data['street'] }}</p>
                    <p>Квартира: {{ $data['apps'] }}</p>
                    <p>Индекс: {{ $data['postcode'] }}</p>
                    <p><strong>Оплата</strong></p>
                    <p>Метод оплаты: {{ $data['payment'] }}</p>
                    <p>Скидка: {{ $data['discount'] }}</p>
                    <p>Всего: {{ $data['total'] }} руб</p>
                </div>
            </div>
        </div>
    </div>
</section>

