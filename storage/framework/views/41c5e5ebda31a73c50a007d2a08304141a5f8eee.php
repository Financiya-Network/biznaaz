<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
    <?php echo $__env->make('elements.topcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="st_pages">
        <div class="container">
        <div class="st_pages_title"><?php echo $pageInfo->title; ?></div>
        <div class="st_pages_cnt"><?php echo $pageInfo->description; ?></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>