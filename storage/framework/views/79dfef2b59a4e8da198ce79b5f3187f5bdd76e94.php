<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--        <title><?php echo e($title.TITLE_FOR_LAYOUT); ?></title>-->
        <title>Biznaaz</title>
        <?php
$cookie_name = "XSRF-TOKEN";
$cookie_value = csrf_token();
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "Secure"); // 86400 = 1 day
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "HttpOnly"); // 86400 = 1 day
?>
         <meta name = "keywords" content = "fiverr clone, fiverr clone script, fiverr script, fiverr php script, fiverr php, micro jobs script, fiverr clone app, on demand marketplace, online marketplace software, best fiverr clone script" />
        <meta name="description" content="Get your own online marketplace software by using our readymade fiver clone script. LS Gigger is on demand marketplace where freelancers and entrepreneurs can connect with each other. ">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        <link rel="icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
      
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="canonical" href="<?php echo HTTP_PATH; ?>" />
        <?php echo e(HTML::style('public/css/front/bootstrap.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/style.css')); ?>

        <?php echo e(HTML::style('public/css/front/home.css')); ?>

        <?php echo e(HTML::style('public/css/front/media.css')); ?>

        <?php echo e(HTML::style('public/css/front/stylee.css')); ?>

        <?php echo e(HTML::style('public/css/front/owl.theme.default.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/owl.carousel.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/font-awesome.css')); ?>

        <?php echo e(HTML::style('public/css/front/magnific-popup.min.css')); ?>

        <?php if(isset($fixheader) && $fixheader == 1): ?>
            <?php echo e(HTML::style('public/css/front/heraderfix.css')); ?>

        <?php endif; ?>

        <?php echo e(HTML::script('public/js/jquery-2.1.0.min.js')); ?>

		<?php echo e(HTML::script('public/js/front/bootstrap.js')); ?>

        <?php echo e(HTML::script('public/js/jquery.validate.js')); ?>

        <?php echo e(HTML::script('public/js/front/menu.js')); ?>

        <?php echo e(HTML::script('public/js/front/owl.carousel.js')); ?>

        <?php echo e(HTML::script('public/js/front/jquery.magnific-popup.min.js')); ?>

        <?php echo e(HTML::script('public/js/front/cssua.min.js')); ?>

      <style>
      @media (-webkit-device-pixel-ratio: 1.25) {
        .img-res{
          zoom: 0.8;
        }
      }
      </style>
<!--        <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css'>-->
    </head>
    <body>
        <?php echo $__env->make('elements.header_inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?> 
        <?php echo $__env->make('elements.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>