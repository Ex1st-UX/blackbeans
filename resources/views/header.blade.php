@include('head')
<!--header-->
<?php
$cookie = Illuminate\Support\Facades\Cookie::get('user_id');
?>
<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark stroke" style="margin-bottom: 30px; margin-top: 25px;">
            <a class="navbar-brand" href="/">
                <span class="fa fa-coffee"></span> Coffee
            </a>
            <!-- if logo is image enable this
      <a class="navbar-brand" href="#/">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item about__active">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item menu__active">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>
                    <li class="nav-item contact__active">
                        <a class="nav-link" href="contact.html">Contacts</a>
                    </li>
                    <li class="nav-item contact__active">
                        <a class="nav-link" href="{{ route('home-admin') }}">Admin</a>
                    </li>
                    <li class="nav-item contact__active">
                        <a class="nav-link"
                           href="/cart" id="cart-total-icon">Корзина (<span id="cart-total">{{$cookie ? \Cart::session($cookie)->getTotal() : '0'}}</span>)</a>
                    </li>
                </ul>
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            {{--                            <input type="checkbox" id="checkbox">
                                                        <div class="mode-container py-1">
                                                            <i class="gg-sun"></i>
                                                            <i class="gg-moon"></i>
                                                        </div>--}}
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
{{--        Состояние корзины--}}
        <div class="card cart-condition" id="cart-condition" style="display: none!important;">
            <div class="card-body" id="cart-condition-content">
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block btn-order">Оформить заказ</button>
        </div>
    </div>
</header>
<!--/header-->
