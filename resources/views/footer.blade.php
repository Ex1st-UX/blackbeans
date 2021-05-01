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
                    <h6 class="footer-title-29">Contact Us</h6>
                    <ul>
                        <li><p><span class="fa fa-map-marker"></span> 2005 Stokes Isle Apt. 896, Coffee Cafe Center,
                                Vacaville 10010, USA.</p></li>
                        <li><a href="tel:+7-800-999-800"><span class="fa fa-phone"></span> +(21)-255-999-8888</a></li>
                        <li><a href="mailto:coffee@mail.com" class="mail"><span class="fa fa-envelope-open-o"></span>
                                Coffee@mail.com</a></li>
                    </ul>
                    <div class="main-social-footer-29">
                        <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#google-plus" class="google-plus"><span class="fa fa-google-plus"></span></a>
                        <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                    </div>
                </div>
                <div class="footer-list-29 footer-2">
                    <ul>
                        <h6 class="footer-title-29">Featured Links</h6>
                        <li><a href="#team">Our Team</a></li>
                        <li><a href="#insta">Instagram feed</a></li>
                        <li><a href="contact.html">Our Branches</a></li>
                        <li><a href="#careers">Careers</a></li>
                        <li><a href="#help">Help & Support</a></li>
                    </ul>
                </div>
                <div class="footer-list-29 footer-3">

                    <h6 class="footer-title-29">Newsletter </h6>
                    <p class="mb-3">Get in your inbox the latest News and</p>
                    <form action="#" class="subscribe" method="post">
                        <input type="email" name="email" placeholder="Email" required="">
                        <button><span class="fa fa-envelope-o"></span></button>
                    </form>
                    <p>Subscribe and get our weekly newsletter</p>
                    <p>We'll never share your email address</p>

                </div>
                <div class="footer-list-29 footer-4">
                    <ul>
                        <h6 class="footer-title-29">Quick Links</h6>
                        <li><a href="index.html">Home Page</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="menu.html">Our Menu</a></li>
                        <li><a href="#blog"> Blog Posts</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
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

{{--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add-to-cart-success">--}}
{{--    <div class="modal-dialog modal-lg modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalCenteredLabel">Товар добавлен</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <table class="table text-center cart-modal-success table-responsive">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th></th>--}}
{{--                    <th>Название</th>--}}
{{--                    <th>Количество</th>--}}
{{--                    <th>Цена</th>--}}
{{--                    <th>Стоимость</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @if ($cartItems)--}}
{{--                    @foreach($cartItems as $item)--}}
{{--                        <tr class="">--}}
{{--                            <th scope="row"><img width="100px" src="{{ asset('/images/product.png') }}"></th>--}}
{{--                            <td class="test">{{ $item->name }}</td>--}}
{{--                            <td class="test">{{ $item->quantity }}</td>--}}
{{--                            <td class="test">{{ $item->price }}</td>--}}
{{--                            <td class="test">{{ $item->price * $item->quantity }}</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn  btn-white" data-dismiss="modal">Продолжить покупки</button>--}}
{{--                <button type="button" class="btn  btn-primary">Перейти в корзину</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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
