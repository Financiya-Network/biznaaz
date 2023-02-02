<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--        <title><?php echo e($title . TITLE_FOR_LAYOUT); ?></title>-->
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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="canonical" href="<?php echo HTTP_PATH; ?>" />
    <link rel="apple-touch-icon" sizes="57x57" href="public/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="public/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="public/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="public/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="public/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="public/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="public/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="public/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="public/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="public/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="public/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/favicon/favicon-16x16.png">
    <link rel="manifest" href="public/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    



    <meta name="generator" content="WordPress 6.1.1" />
    <meta name="generator" content="WooCommerce 7.1.0" />

    

    <?php echo e(HTML::style('public/css1/post-26.css')); ?>

    <?php echo e(HTML::style('public/css1/style.min.css')); ?>

    <?php echo e(HTML::style('public/css1/wc-blocks-vendors-style.css')); ?>

    <?php echo e(HTML::style('public/css1/wc-blocks-style.css')); ?>

    <?php echo e(HTML::style('public/css1/classic-themes.min.css')); ?>

    <?php echo e(HTML::style('public/css1/styles.css')); ?>

    <?php echo e(HTML::style('public/css1/woocommerce-layout.css')); ?>

    <?php echo e(HTML::style('public/css1/woocommerce.css')); ?>

    <?php echo e(HTML::style('public/css1/magnific-popup.css')); ?>

    <?php echo e(HTML::style('public/css1/perfect-scrollbar.css')); ?>

    <?php echo e(HTML::style('public/css1/leaflet.css')); ?>

    <?php echo e(HTML::style('public/css1/woocommerce1.css')); ?>

    <?php echo e(HTML::style('public/css1/all-awesome.css')); ?>

    <?php echo e(HTML::style('public/css1/flaticon.css')); ?>

    <?php echo e(HTML::style('public/css1/themify-icons.css')); ?>

    <?php echo e(HTML::style('public/css1/animate.css')); ?>

    <?php echo e(HTML::style('public/css1/bootstrap.css')); ?>

    <?php echo e(HTML::style('public/css1/slick.css')); ?>

    <?php echo e(HTML::style('public/css1/sliding-menu.min.css')); ?>

    <?php echo e(HTML::style('public/css1/frontend-lite.min.css')); ?>

    <?php echo e(HTML::style('public/css1/post-5260.css')); ?>

    <?php echo e(HTML::style('public/css1/post-1552.css')); ?>

    <?php echo e(HTML::style('public/css1/post-1860.css')); ?>

    <?php echo e(HTML::style('public/css1/post-3167.css')); ?>

    <?php echo e(HTML::style('public/css1/post-5677.css')); ?>

    <?php echo e(HTML::style('public/css1/select2.min.css')); ?>

    <?php echo e(HTML::style('public/css1/post-1984.css')); ?>

    <?php echo e(HTML::style('public/css1/post-2965.css')); ?>

    <?php echo e(HTML::style('public/css1/elementor-icons.min.css')); ?>

    <?php echo e(HTML::style('public/css1/post-6.css')); ?>

    <?php echo e(HTML::style('public/css1/fontawesome.min.css')); ?>

    <?php echo e(HTML::style('public/css1/brands.min.css')); ?>

    <?php echo e(HTML::style('public/css1/rs6.css')); ?>

    <?php echo e(HTML::style('public/css1/template.css')); ?>

    <?php echo e(HTML::style('public/css1/post-3201.css')); ?>

    <?php echo e(HTML::style('public/css1/post-3038.css')); ?>

    <?php echo e(HTML::style('public/css1/animations.min.css')); ?>

    <?php echo e(HTML::style('public/css1/style.css')); ?>



    

    <?php echo e(HTML::script('public/js1/jquery.min.js')); ?>

    <?php echo e(HTML::script('public/js1/bootstrap.bundle.min.js')); ?>

    <?php echo e(HTML::script('public/js1/slick.min.js')); ?>

    
    <?php echo e(HTML::script('public/js1/jquery.unveil.js')); ?>

    <?php echo e(HTML::script('public/js1/perfect-scrollbar.jquery.min.js')); ?>

    <?php echo e(HTML::script('public/js1/sliding-menu.min.js')); ?>

    <?php echo e(HTML::script('public/js1/functions.js')); ?>

    <?php echo e(HTML::script('public/js1/index1.js')); ?>

    <?php echo e(HTML::script('public/js1/index.js')); ?>

    <?php echo e(HTML::script('public/js1/rbtools.min.js')); ?>

    <?php echo e(HTML::script('public/js1/rs6.min.js')); ?>

    <?php echo e(HTML::script('public/js1/jquery.blockUI.min.js')); ?>

    <?php echo e(HTML::script('public/js1/add-to-cart.min.js')); ?>

    <?php echo e(HTML::script('public/js1/js.cookie.min.js')); ?>

    <?php echo e(HTML::script('public/js1/jquery.magnific-popup.min.js')); ?>

    <?php echo e(HTML::script('public/js1/core.min.js')); ?>

    <?php echo e(HTML::script('public/js1/core.min.js')); ?>

    <?php echo e(HTML::script('public/js1/mouse.min.js')); ?>

    <?php echo e(HTML::script('public/js1/slider.min.js')); ?>

    <?php echo e(HTML::script('public/js1/jquery.ui.touch-punch.min.js')); ?>

    <?php echo e(HTML::script('public/js1/woocommerce.min.js')); ?>

    <?php echo e(HTML::script('public/js1/main.js')); ?>

    <?php echo e(HTML::script('public/js1/perfect-scrollbar1.jquery.min.js')); ?>

    <?php echo e(HTML::script('public/js1/main1.js')); ?>

    <?php echo e(HTML::script('public/js1/woocommerce.js')); ?>

    <?php echo e(HTML::script('public/js1/jquery.highlight.js')); ?>

    <?php echo e(HTML::script('public/js1/leaflet.js')); ?>

    <?php echo e(HTML::script('public/js1/Control.Geocoder.js')); ?>

    <?php echo e(HTML::script('public/js1/leaflet.markercluster.js')); ?>

    <?php echo e(HTML::script('public/js1/LeafletHtmlIcon.js')); ?>

    <?php echo e(HTML::script('public/js1/job-map.js')); ?>

    <?php echo e(HTML::script('public/js1/job.js')); ?>

    <?php echo e(HTML::script('public/js1/select2.min.js')); ?>

    <?php echo e(HTML::script('public/js1/handlebars.min.js')); ?>

    <?php echo e(HTML::script('public/js1/typeahead.bundle.min.js')); ?>

    <?php echo e(HTML::script('public/js1/jquery-numerator.min.js')); ?>

    <?php echo e(HTML::script('public/js1/forms.js')); ?>

    <?php echo e(HTML::script('public/js1/webpack.runtime.min.js')); ?>

    <?php echo e(HTML::script('public/js1/frontend-modules.min.js')); ?>

    <?php echo e(HTML::script('public/js1/waypoints.min.js')); ?>

    <?php echo e(HTML::script('public/js1/bootstrap.min.js')); ?>


    


    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <meta name="generator"
        content="Powered by Slider Revolution 6.5.12 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />

</head>

<body>
    <?php echo $__env->make('elements.header_inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('elements.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>
