<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="//fonts.googleapis.com/css2?family=Manrope:wght@200;400;600&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style-starter.css')}}">

    {{--ФАВИКОН--}}
    <link type="image/x-icon" href="{{ URL::asset('images/favicon.jpg') }}" rel="shortcut icon">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(85184932, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/85184932" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</head>
<body>
