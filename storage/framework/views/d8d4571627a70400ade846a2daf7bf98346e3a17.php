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
            <div class="manage-btn">View Buying Orders </div>
            <div class="management-bx">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="management-bx-over">
                    <?php if(!$allrecords->isEmpty()): ?>
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Order ID</div>
                            <div class="management-table-th">Seller Name</div>
                            <div class="management-table-th">Gig Title</div>
                            <div class="management-table-th">Package</div>
                            <div class="management-table-th">Amount</div>
                            <div class="management-table-th">Status</div>
                            <div class="management-table-th" style="width: 115px;">Action</div>
                        </div>
                        <?php global $gigOrderStatus; ?>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="management-table-tr">
                                <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                                <div class="management-table-td">
                                    <?php if($allrecord->pay_type === 'Wallet'): ?>
                                        <?php echo e($allrecord->wallet_trn_id); ?>

                                    <?php else: ?> 
                                        <?php echo e($allrecord->paypal_trn_id); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="management-table-td"><?php echo e(isset($allrecord->Seller)?$allrecord->Seller->first_name.' '.$allrecord->Seller->last_name:''); ?></div>
                                <div class="management-table-td"><?php if(isset($allrecord->Gig)): ?>
                                        <?php echo e($allrecord->Gig->title); ?>

                                    <?php elseif(isset($allrecord->Service)): ?>
                                        <?php echo e($allrecord->Service->title); ?>

                                    <?php endif; ?></div>
                                <div class="management-table-td"><?php echo e($allrecord->package); ?></div>
                                <div class="management-table-td"><?php echo e(CURR.$allrecord->amount); ?></div>
                                <div class="management-table-td"><?php echo e($gigOrderStatus[$allrecord->status]); ?></div>
                                <div class="management-table-td">
                                    <?php if($allrecord->status == 1): ?>
                                        <a href="<?php echo e(URL::to( 'myorders/markascompleted/'.$allrecord->slug)); ?>" title="Mark as Completed" class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to mark as completed?')"><i class="fa fa-check"></i></i></a>
                                    <?php endif; ?>
                                        <a href="#info<?php echo $allrecord->id; ?>" title="View Offer Details" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
                                    
                                    <?php if($allrecord->status == 2 && $allrecord->is_buyer_rate != 1 && $allrecord->gig_id > 0): ?>
                                        <a href="<?php echo e(URL::to( 'myorders/rateseller/'.$allrecord->slug)); ?>" title="Rate Seller" class="btn btn-primary btn-xs"><i class="fa fa-star"></i></a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(URL::to( 'myorders/workplace/'.$allrecord->slug)); ?>" title="Go to Workplace" class="btn btn-success btn-xs"><i class="fa fa-tasks"></i></i></a>
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

<?php if(!$allrecords->isEmpty()): ?>
<?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="info<?php echo $allrecord->id; ?>" style="display: none;" class="frnt_div">
    <div class="nzwh-wrapper">
        <fieldset class="nzwh">
            <legend class="head_pop">
                Order #
                <?php if($allrecord->pay_type === 'Wallet'): ?>
                    <?php echo e($allrecord->wallet_trn_id); ?>

                <?php else: ?> 
                    <?php echo e($allrecord->paypal_trn_id); ?>

                <?php endif; ?>
            </legend>
            <div class="drt">
                <div class="admin_pop"><span>Seller Name: </span>  <label><?php echo isset($allrecord->Seller)?$allrecord->Seller->first_name.' '.$allrecord->Seller->last_name:''; ?></label></div>
                <div class="admin_pop"><span>Gig Title: </span>  <label><?php echo e(isset($allrecord->Gig->title) ? $allrecord->Gig->title : ''); ?></label></div>
                <div class="admin_pop"><span>Order Date: </span>  <label><?php echo e($allrecord->created_at->format('d M, Y')); ?></label></div>
                <div class="admin_pop"><span>Order ID: </span>  <label>
                    <?php if($allrecord->pay_type === 'Wallet'): ?>
                        <?php echo e($allrecord->wallet_trn_id); ?>

                    <?php else: ?> 
                        <?php echo e($allrecord->paypal_trn_id); ?>

                    <?php endif; ?>
                    </label>
                </div>
                <div class="admin_pop"><span>Package: </span>  <label><?php echo e($allrecord->package); ?></label></div>
                 <div class="admin_pop"><span>Gig Extra: </span>  
                <label>
                    <?php 

                    $extra_ids = explode(',',$allrecord->extra_ids);
                                        if ($extra_ids) {
                                            foreach ($extra_ids as $extra_id) {
                                                if(isset($gigextra[$extra_id])){
                                                echo $gigextra[$extra_id].'<br>';
                                                }
                                                
                                            }
                                        }else{
                                           echo 'N/A';
                                        }
                                        ?>
                    </label>
                    </div>
                <div class="admin_pop"><span>Amount: </span>  <label><?php echo e(CURR.$allrecord->revenue); ?></label></div>
                <div class="admin_pop"><span>Status: </span>  <label><?php echo e($gigOrderStatus[$allrecord->status]); ?></label></div>
        </fieldset>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>