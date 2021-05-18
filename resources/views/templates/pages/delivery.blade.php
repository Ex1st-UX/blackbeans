@extends('index')

@section('title', 'Доставка')

@section('body')
    <div class="inner-banner">
    </div>
    <section class="w3l-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="#url">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About Us</li>
            </ul>
        </div>
    </section>

    <section class="w3l-homeblock3">
        <div class="midd-w3 py-5">
            <div class="container py-lg-5 py-md-3">
                <div class="row">
                    <div class="col-lg-6 ">
                        <img src="images/bg.jpg" alt="" class="radius-image img-fluid">
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-3 about-right-faq align-self">
                        <h3 class="title-big">Факты о доставке</h3>
                        <ul class="w3l-lists mt-4">
                            <li><span class="fa fa-check" aria-hidden="true"></span>Доставка полностью беслпатная</li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>Отправления только по России
                            </li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>По городам России доставка осуществляется почтой России до отделения</li>
                            <li><span class="fa fa-check" aria-hidden="true"></span>По Тольятти доставка осуществляется курьером до двери
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
