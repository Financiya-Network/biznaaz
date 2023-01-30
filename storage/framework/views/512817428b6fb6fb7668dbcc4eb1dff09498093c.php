<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo e($title.TITLE_FOR_LAYOUT); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        <link rel="icon" href="<?php echo FAVICON_PATH; ?>" type="image/x-icon"/>
        
        <?php echo e(HTML::style('public/css/bootstrap.min.css')); ?>

        <?php echo e(HTML::style('public/css/AdminLTE.min.css')); ?>

        <?php echo e(HTML::style('public/css/all-skins.min.css')); ?>

        <?php echo e(HTML::style('public/css/admin.css')); ?>

        <?php echo e(HTML::style('public/css/front/font-awesome.css')); ?>

        
        <?php echo e(HTML::script('public/js/jquery-2.1.0.min.js')); ?>

        <?php echo e(HTML::script('public/js/jquery.validate.js')); ?>

        <?php echo e(HTML::script('public/js/app.min.js')); ?>

        <?php echo e(HTML::script('public/js/ajaxsoringpagging.js')); ?>

        <?php echo e(HTML::script('public/js/listing.js')); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $__env->make('elements.admin.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('elements.admin.left_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            
            <script>
                $(".close").click(function(){
                $('.ersu_message').hide();
            });
            </script>
        </div>
     
    </body>
</html>