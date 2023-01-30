<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title . TITLE_FOR_LAYOUT }}</title>
    <?php
    $cookie_name = 'XSRF-TOKEN';
    $cookie_value = csrf_token();
    setcookie($cookie_name, $cookie_value, time() + 86400 * 30, 'Secure'); // 86400 = 1 day
    setcookie($cookie_name, $cookie_value, time() + 86400 * 30, 'HttpOnly'); // 86400 = 1 day
    ?>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{!! FAVICON_PATH !!}" type="image/x-icon" />
    <link rel="icon" href="{!! FAVICON_PATH !!}" type="image/x-icon" />

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
    <!--        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css'>-->
</head>

<body>
    @include('elements.header_inner')
    @yield('content')
    @include('elements.footer')
    <script type="text/javascript">
        window.$zopim || (function(d, s) {
            var z = $zopim = function(c) {
                    z._.push(c)
                },
                $ = z.s =
                d.createElement(s),
                e = d.getElementsByTagName(s)[0];
            z.set = function(o) {
                z.set.
                _.push(o)
            };
            z._ = [];
            z.set._ = [];
            $.async = !0;
            $.setAttribute("charset", "utf-8");
            $.src = "https://v2.zopim.com/?4toXhVRHXOtCLes7sRNCMItG7HdblsBt";
            z.t = +new Date;
            $.
            type = "text/javascript";
            e.parentNode.insertBefore($, e)
        })(document, "script");
    </script>
    <script>
        $zopim(function() {
            $zopim.livechat.bubble.setColor('#1dbf73');
        });
    </script>
    <script>
        $(window).resize(function() {
            var mobileWidth = (window.innerWidth > 0) ?
                window.innerWidth :
                screen.width;
            var viewport = (mobileWidth > 360) ?
                'width=device-width, initial-scale=1.0' :
                'width=1200';
            $("meta[name=viewport]").attr('content', viewport);
        }).resize();
    </script>
</body>

</html>
