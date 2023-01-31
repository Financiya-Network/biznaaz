<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <link rel="shortcut icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon" />
    <link rel="icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon" />

    <?php
    $currentURl = url()->current();
    $pageLink = $currentURl;
    $checkUrl = substr($currentURl, -1);
    
    if ($checkUrl == '/') {
        $pageLink = substr($currentURl, 0, strrpos($currentURl, '/'));
    }
    ?>
    <link rel="canonical" href="<?php echo $pageLink; ?>" />
    <?php if (isset($subCatInfo) && !empty($subCatInfo->meta_title)) {
            ?>
    <title><?php echo $subCatInfo->meta_title; ?></title>
    <meta name="description" itemprop="description" content="<?php echo $subCatInfo->meta_description; ?>">
    <meta name="keywords" itemprop="keywords" content="<?php echo $subCatInfo->meta_keyword; ?>">
    <?php } else if (isset($catInfo) && !empty($catInfo->meta_title)) {
            ?>
    <title><?php echo $catInfo->meta_title; ?></title>
    <meta name="description" itemprop="description" content="<?php echo $catInfo->meta_description; ?>">
    <meta name="keywords" itemprop="keywords" content="<?php echo $catInfo->meta_keyword; ?>">
    <?php } else if (Request::segment(1) == 'gigs') {
            ?>
    <title><?php echo e($title . TITLE_FOR_LAYOUT); ?></title>
    <meta name="description" itemprop="description"
        content="Post & browse the freelance gigs jobs, services & projects. Find the best online freelance jobs for Writing, Graphic, Digital Marketing, Software & other services.">
    <meta name="keywords" itemprop="keywords" content="freelance gigs, gig jobs, find gigs, online gigs, post a gig">
    <?php } else { ?>
    <title><?php echo e($title . TITLE_FOR_LAYOUT); ?></title>
    <?php }
         ?>
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />

    
    <script type='text/javascript' src='../public/js1/jquery.min.js' id='jquery-core-js'></script>
    <script type='text/javascript' src='../public/js1/jquery-migrate.min.js' id='jquery-migrate-js'></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

    <?php echo e(HTML::style('public/css1/widget-icon-list.min.css')); ?>

    <?php echo e(HTML::style('public/css1/woocommerce-smallscreen.css')); ?>


    
    <?php echo e(HTML::script('public/js1/bootstrap.bundle.min.js')); ?>

    <?php echo e(HTML::script('public/js1/slick.min.js')); ?>

    <?php echo e(HTML::script('public/js1/jquery.magnific-popup.min.js')); ?>

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

    <?php echo e(HTML::script('public/js/front/jquery.lazyload.js')); ?>




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
    <?php echo $__env->make('elements.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('elements.footer_inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>
