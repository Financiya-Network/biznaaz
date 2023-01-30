<?php $__env->startSection('content'); ?>
<?php echo e(HTML::script('public/js/facebox.js')); ?>

<?php echo e(HTML::style('public/css/facebox.css')); ?>

<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
        });
    });
</script>
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">PayPal Transaction History </div>
            <div class="management-bx">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="management-bx-over">
                    <?php if(!$allrecords->isEmpty()): ?>
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Title</div>
                            <div class="management-table-th">Amount</div>
                            <div class="management-table-th">Transaction ID</div>
                            <div class="management-table-th">Status</div>
                        </div>
                        <?php global $gigOrderStatus; ?>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="management-table-tr">
                                <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                                <div class="management-table-td">
                                    <?php if(isset($allrecord->Gig)): ?>
                                        <?php echo e($allrecord->Gig->title); ?>

                                    <?php elseif(isset($allrecord->Service)): ?>
                                        <?php echo e($allrecord->Service->title); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="management-table-td"><?php echo e(CURR.$allrecord->amount); ?></div>
                                <div class="management-table-td"><?php echo e($allrecord->transaction_id); ?></div>
                                <div class="management-table-td">
                                    <?php if($allrecord->status): ?>
                                        Completed
                                    <?php else: ?>
                                        Pending
                                    <?php endif; ?>    
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                        <div class="management-full">No requests found. </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>