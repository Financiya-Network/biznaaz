<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Sent Offers <a href="<?php echo e(URL::to( 'services/create-request')); ?>" class="btn btn-primary">Post a Request</a></div>
            <div class="management-bx">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="management-bx-over">
                    <div class="m_content" id="listID">
                        <?php echo $__env->make('elements.services.offerssent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>                   
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>