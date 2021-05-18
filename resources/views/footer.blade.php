<?php
//$cookie = Illuminate\Support\Facades\Cookie::get('user_id');
//
//if (isset($cookie)) {
//    $cartItems = \Cart::session($cookie)->getContent();
//} else {
//    $cartItems = null;
//}
//?>
<section class="w3l-footer-29-main py-5">
    <div class="footer-29 py-lg-4 py-md-3">
        <div class="container">
            <div class="d-grid grid-col-4 footer-top-29">
                <div class="footer-list-29 footer-1">
                    <h6 class="footer-title-29">Контакты</h6>
                    <ul>
                        <li><p><span class="fa fa-map-marker"></span>Россия, Самарская обл., г. Тольятти</p></li>
                        <li><a href="tel:+7-800-999-800"><span class="fa fa-phone"></span> + 7 (905) 019-66-59</a></li>
                        <li><a href="mailto:coffee@mail.com" class="mail"><span class="fa fa-envelope-open-o"></span>
                                support@blackbeans.ru</a></li>
                    </ul>
                    <div class="main-social-footer-29">
{{--                        <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>--}}
{{--                        <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>--}}
{{--                        <a href="#google-plus" class="google-plus"><span class="fa fa-google-plus"></span></a>--}}
{{--                        <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>--}}
                    </div>
                </div>
                <div class="footer-list-29 footer-2">
                    <ul>
                        <h6 class="footer-title-29">Полезное</h6>
                        <li><a href="/">Главная</a></li>
                        <li><a href="{{ route('catalog-product') }}">Каталог</a></li>
                        <li><a href="{{ route('cart') }}">Коризна</a></li>
                    </ul>
                </div>
                <div class="footer-list-29 footer-3">

                    <h6 class="footer-title-29">Хочешь скидку?</h6>
                    <p class="mb-3">Дарим промокоды каждую неделю</p>
                    <form action="#" class="subscribe" method="post">
                        <input type="email" name="email" placeholder="Email" required="">
                        <button><span class="fa fa-envelope-o"></span></button>
                    </form>
                </div>
                <div class="footer-list-29 footer-4">
                    <ul>
                        <h6 class="footer-title-29">Важное</h6>
                        <li><a href="{{ route('delivery') }}">Доставка</a></li>
                        <li><a href="{{ route('pay') }}">Возврат</a></li>
                        <li><a href="c{{ route('pay') }}">Оплата</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- /move top -->
</section>
{{--МОДАЛЬНЫЕ ОКНА--}}
@include('templates.modals.modals')
{{--МОДАЛЬНЫЕ ОКНА--}}
<!-- Template JavaScript -->
<script src="{{ URL::asset('js/jquery-3.x-git.js') }}"></script>

<!-- script for testimonials -->
<script>
    $(document).ready(function () {
        $('.owl-testimonial').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                480: {
                    items: 1,
                    nav: false
                },
                667: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        })
    })
</script>
<!-- //script for testimonials -->

<script src="{{ URL::asset('js/theme-change.js') }}"></script>

<script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
<!-- script for banner slider-->
<script>
    $(document).ready(function () {
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                480: {
                    items: 1,
                    nav: false
                },
                667: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        })
    })
</script>
<!-- //script -->

<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!--//MENU-JS-->

<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="{{ URL::asset('js/shop/detail-page.js') }}"></script>

@yield('js')

</body>
</html>
