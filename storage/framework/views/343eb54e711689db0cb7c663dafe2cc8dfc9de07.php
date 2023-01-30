<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
             <div class="workplace">
            <div class="manage-btn">View Offers<a href="<?php echo e(HTTP_PATH.'/services/management'); ?>" class="btn btn-primary">Back</a></div>
            <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <div class="req_dtl">
                <div class="req_dtl_head">Request Information</div>
                <div class="req_row">
                    <label>Title: </label> <span><?php echo e($serviceInfo->title); ?></span>
                    <div class="req_post"><label>Posted: </label> <?php echo e($serviceInfo->created_at->diffForHumans()); ?></div>
                </div>
                <div class="req_row">
                    <label>Category: </label> <span><?php echo e($serviceInfo->Category->name); ?> >> <?php echo e($serviceInfo->Subcategory->name); ?></span>
                    <div class="req_post"><label>Budget: </label> <?php if($serviceInfo->price): ?> <?php echo e(CURR.$serviceInfo->price); ?> <?php else: ?> N/A <?php endif; ?></div>
                </div>
                <div class="req_row _des">
                    <?php echo e($serviceInfo->description); ?>

                </div>
            </div>
            <div class="management-bx">
                <div class="tab-content lessmargin">
                    <div role="tabpanel" class="tab-pane active" id="buyeractive">
                        <div class="buyer-request-bx"><h3>View Offers</h3></div>
                        <div class="main_loader" id="loaderID"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>
                        <div class="buyer_req" id="buyer_req">
                            <?php echo $__env->make('elements.services.buyerrequestviewoffers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>