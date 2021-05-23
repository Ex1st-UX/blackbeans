<section class="w3l-blog-single1 py-5">
    <div class="container py-lg-3">
{{--        <div class="text-bg-image">--}}
{{--            <img src="http://blackbeans.ru/images/email-logo.jpg">--}}
{{--        </div>--}}
        <div class="d-grid-1">
            <div class="text">
                <h3 class="text-title">Через форму обратной связи поступил новый вопрос</h3>
            </div>
        </div>
        <div class="text-content-text">
            <div class="d-grid-2">
                <div class="text2">
                    <p>Имя клиента: {{ $data['name'] }}</p>
                    <p>E-mail клиента: {{ $data['email'] }}</p>
                    <p>Тема: {{ $data['subject'] }}</p>
                    <p>Текст: {{ $data['text'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>


