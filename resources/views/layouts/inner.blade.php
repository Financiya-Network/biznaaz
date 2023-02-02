<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title . TITLE_FOR_LAYOUT }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <link rel="shortcut icon" href="{!! FAVICON_PATH !!}" type="image/x-icon" />
    <link rel="icon" href="{!! FAVICON_PATH !!}" type="image/x-icon" /> --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="canonical" href="<?php echo HTTP_PATH; ?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="../public/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../public/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../public/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../public/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../public/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../public/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../public/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../public/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../public/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../public/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../public/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/favicon/favicon-16x16.png">
    <link rel="manifest" href="../public/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

    {{ HTML::script('public/js/front/bootstrap.min.js') }}

    {{-- All css------------------------------------------------------------------------------------------- --}}

    {{ HTML::style('public/css1/post-26.css') }}
    {{ HTML::style('public/css1/style.min.css') }}
    {{ HTML::style('public/css1/wc-blocks-vendors-style.css') }}
    {{ HTML::style('public/css1/wc-blocks-style.css') }}
    {{ HTML::style('public/css1/classic-themes.min.css') }}
    {{ HTML::style('public/css1/styles.css') }}
    {{ HTML::style('public/css1/woocommerce-layout.css') }}
    {{ HTML::style('public/css1/woocommerce.css') }}
    {{ HTML::style('public/css1/magnific-popup.css') }}
    {{ HTML::style('public/css1/perfect-scrollbar.css') }}
    {{ HTML::style('public/css1/leaflet.css') }}
    {{ HTML::style('public/css1/woocommerce1.css') }}
    {{ HTML::style('public/css1/all-awesome.css') }}
    {{ HTML::style('public/css1/flaticon.css') }}
    {{ HTML::style('public/css1/themify-icons.css') }}
    {{ HTML::style('public/css1/animate.css') }}
    {{ HTML::style('public/css1/bootstrap.css') }}
    {{ HTML::style('public/css1/slick.css') }}
    {{ HTML::style('public/css1/sliding-menu.min.css') }}
    {{ HTML::style('public/css1/frontend-lite.min.css') }}
    {{ HTML::style('public/css1/post-5260.css') }}
    {{ HTML::style('public/css1/post-1552.css') }}
    {{ HTML::style('public/css1/post-1860.css') }}
    {{ HTML::style('public/css1/post-3167.css') }}
    {{ HTML::style('public/css1/post-5677.css') }}
    {{ HTML::style('public/css1/select2.min.css') }}
    {{ HTML::style('public/css1/post-1984.css') }}
    {{ HTML::style('public/css1/post-2965.css') }}
    {{ HTML::style('public/css1/elementor-icons.min.css') }}
    {{ HTML::style('public/css1/post-6.css') }}
    {{ HTML::style('public/css1/fontawesome.min.css') }}
    {{ HTML::style('public/css1/brands.min.css') }}
    {{ HTML::style('public/css1/rs6.css') }}
    {{ HTML::style('public/css1/template.css') }}
    {{ HTML::style('public/css1/post-3201.css') }}
    {{ HTML::style('public/css1/post-3038.css') }}
    {{ HTML::style('public/css1/animations.min.css') }}
    {{ HTML::style('public/css1/style.css') }}

    {{-- All js--------------------------------------------------------------------------------------------------------------- --}}

    {{-- {{ HTML::script('public/js1/jquery.min.js') }} --}}
    {{ HTML::script('public/js1/bootstrap.bundle.min.js') }}
    {{ HTML::script('public/js1/slick.min.js') }}
    {{-- {{ HTML::script('public/js1/jquery.magnific-popup.min.js') }} --}}
    {{ HTML::script('public/js1/jquery.unveil.js') }}
    {{ HTML::script('public/js1/perfect-scrollbar.jquery.min.js') }}
    {{ HTML::script('public/js1/sliding-menu.min.js') }}
    {{ HTML::script('public/js1/functions.js') }}
    {{ HTML::script('public/js1/index1.js') }}
    {{ HTML::script('public/js1/index.js') }}
    {{ HTML::script('public/js1/rbtools.min.js') }}
    {{ HTML::script('public/js1/rs6.min.js') }}
    {{ HTML::script('public/js1/jquery.blockUI.min.js') }}
    {{ HTML::script('public/js1/add-to-cart.min.js') }}
    {{ HTML::script('public/js1/js.cookie.min.js') }}
    {{ HTML::script('public/js1/jquery.magnific-popup.min.js') }}
    {{ HTML::script('public/js1/core.min.js') }}
    {{ HTML::script('public/js1/core.min.js') }}
    {{ HTML::script('public/js1/mouse.min.js') }}
    {{ HTML::script('public/js1/slider.min.js') }}
    {{ HTML::script('public/js1/jquery.ui.touch-punch.min.js') }}
    {{ HTML::script('public/js1/woocommerce.min.js') }}
    {{ HTML::script('public/js1/main.js') }}
    {{ HTML::script('public/js1/perfect-scrollbar1.jquery.min.js') }}
    {{ HTML::script('public/js1/main1.js') }}
    {{ HTML::script('public/js1/woocommerce.js') }}
    {{ HTML::script('public/js1/jquery.highlight.js') }}
    {{ HTML::script('public/js1/leaflet.js') }}
    {{ HTML::script('public/js1/Control.Geocoder.js') }}
    {{ HTML::script('public/js1/leaflet.markercluster.js') }}
    {{ HTML::script('public/js1/LeafletHtmlIcon.js') }}
    {{ HTML::script('public/js1/job-map.js') }}
    {{ HTML::script('public/js1/job.js') }}
    {{ HTML::script('public/js1/select2.min.js') }}
    {{ HTML::script('public/js1/handlebars.min.js') }}
    {{ HTML::script('public/js1/typeahead.bundle.min.js') }}
    {{ HTML::script('public/js1/jquery-numerator.min.js') }}
    {{ HTML::script('public/js1/forms.js') }}
    {{ HTML::script('public/js1/webpack.runtime.min.js') }}
    {{ HTML::script('public/js1/frontend-modules.min.js') }}
    {{ HTML::script('public/js1/waypoints.min.js') }}
    {{ HTML::script('public/js1/bootstrap.min.js') }}

     {{ HTML::style('public/css/front/bootstrap.min.css')}}
        {{-- {{ HTML::style('public/css/front/style.css')}} --}}
        {{ HTML::style('public/css/front/home.css')}}
        {{ HTML::style('public/css/front/inner.css')}}
        {{ HTML::style('public/css/front/stylee.css')}}
        {{ HTML::style('public/css/front/font-awesome.css')}}
        {{ HTML::style('public/css/front/media.css')}}

        {{ HTML::script('public/js/jquery-2.1.0.min.js')}}
        {{ HTML::script('public/js/front/bootstrap.js')}}
        {{ HTML::script('public/js/jquery.validate.js')}}
        {{ HTML::script('public/js/front/menu.js')}}
        {{ HTML::script('public/js/ajaxsoringpagging.js')}}
        {{ HTML::script('public/js/front/bootstrap.min.js')}}

</head>

<body>
    @include('elements.header2')
    <div class="main_dashboard" style="margin-top: 9rem;margin-bottom: -2rem;">
        {{-- @include('elements.topmenu') --}}
        @yield('content')
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip();

                $("#maraction").click(function() {
                    $("#offer-show").addClass("offer-div");
                    $(".dashboard-rights-section").removeClass("offer-div");
                });
            });
        </script>
    </div>
    @include('elements.footer_inner')

</body>

</html>
