<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($title.TITLE_FOR_LAYOUT); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        <link rel="icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>

       <?php echo e(HTML::style('public/css/front/bootstrap.min.css')); ?>

        <?php echo e(HTML::style('public/css/front/style.css')); ?>

        <?php echo e(HTML::style('public/css/front/home.css')); ?>

        <?php echo e(HTML::style('public/css/front/inner.css')); ?>

        <?php echo e(HTML::style('public/css/front/stylee.css')); ?>

        <?php echo e(HTML::style('public/css/front/font-awesome.css')); ?>

        <?php echo e(HTML::style('public/css/front/media.css')); ?>


        <?php echo e(HTML::script('public/js/jquery-2.1.0.min.js')); ?>

        <?php echo e(HTML::script('public/js/front/bootstrap.js')); ?>

        <?php echo e(HTML::script('public/js/jquery.validate.js')); ?>

        <?php echo e(HTML::script('public/js/front/menu.js')); ?>

        <?php echo e(HTML::script('public/js/ajaxsoringpagging.js')); ?>

        <?php echo e(HTML::script('public/js/front/bootstrap.min.js')); ?>

    </head>
    <body>
        <?php echo $__env->make('elements.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main_dashboard">
            <?php echo $__env->make('elements.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?> 
            <script>
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
              
                $("#maraction").click(function () {
                    $("#offer-show").addClass("offer-div");
                    $(".dashboard-rights-section").removeClass("offer-div");
                });
                });
            </script>
        </div>
        <?php echo $__env->make('elements.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      
    </body>
</html>