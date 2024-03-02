<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="width"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta name="author" content="007raspc"/>
    <meta name="format-detection" content="telephone=no"/>

    <! Favicon -->
    {{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">--}}
    {{--    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicons/favicon.png') }}">--}}
    {{--    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicons/mstile-150x150.png') }}">--}}

    <!-- color theme -->
    <meta name="msapplication-navbutton-color" content="#292929">
    <meta name="apple-mobile-web-app-status-bar-style" content="#292929">
    <meta name="theme-color" content="#292929">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <title>Page / CottonSeller</title>
</head>
<body>
<div id="app" class="wrapper"></div>
</body>
</html>
