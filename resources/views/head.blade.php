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
</head>
<body>
