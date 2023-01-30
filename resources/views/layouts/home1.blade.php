<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--        <title>{{ $title . TITLE_FOR_LAYOUT }}</title>-->
    <title>Biznaaz</title>
    <?php
    $cookie_name = 'XSRF-TOKEN';
    $cookie_value = csrf_token();
    setcookie($cookie_name, $cookie_value, time() + 86400 * 30, 'Secure'); // 86400 = 1 day
    setcookie($cookie_name, $cookie_value, time() + 86400 * 30, 'HttpOnly'); // 86400 = 1 day
    ?>
    <meta name="keywords"
        content="fiverr clone, fiverr clone script, fiverr script, fiverr php script, fiverr php, micro jobs script, fiverr clone app, on demand marketplace, online marketplace software, best fiverr clone script" />
    <meta name="description"
        content="Get your own online marketplace software by using our readymade fiver clone script. LS Gigger is on demand marketplace where freelancers and entrepreneurs can connect with each other. ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{!! FAVICON_PATH !!}" type="image/x-icon" />
    <link rel="icon" href="{!! FAVICON_PATH !!}" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="canonical" href="<?php echo HTTP_PATH; ?>" />
    {{ HTML::style('public/css/front/bootstrap.min.css') }}
    {{ HTML::style('public/css/front/style.css') }}
    {{ HTML::style('public/css/front/home.css') }}
    {{ HTML::style('public/css/front/media.css') }}
    {{ HTML::style('public/css/front/stylee.css') }}
    {{ HTML::style('public/css/front/owl.theme.default.min.css') }}
    {{ HTML::style('public/css/front/owl.carousel.min.css') }}
    {{ HTML::style('public/css/front/font-awesome.css') }}
    {{ HTML::style('public/css/front/magnific-popup.min.css') }}
    @if (isset($fixheader) && $fixheader == 1)
        {{ HTML::style('public/css/front/heraderfix.css') }}
    @endif

    {{ HTML::script('public/js/jquery-2.1.0.min.js') }}
    {{ HTML::script('public/js/front/bootstrap.js') }}
    {{ HTML::script('public/js/jquery.validate.js') }}
    {{ HTML::script('public/js/front/menu.js') }}
    {{ HTML::script('public/js/front/owl.carousel.js') }}
    {{ HTML::script('public/js/front/jquery.magnific-popup.min.js') }}
    {{ HTML::script('public/js/front/cssua.min.js') }}
    <style>
        @media (-webkit-device-pixel-ratio: 1.25) {
            .img-res {
                zoom: 0.8;
            }
        }
    </style>
    <!--        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css'>-->
</head>

<body>
    @include('elements.header_inner')
    @yield('content')
    @include('elements.footer')
</body>

</html>
