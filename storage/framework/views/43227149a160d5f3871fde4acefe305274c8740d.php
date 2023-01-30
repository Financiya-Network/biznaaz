<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Manage Requests <a href="<?php echo e(URL::to( 'services/create-request')); ?>" class="btn btn-primary">Post a Request</a></div>
            <div class="management-bx">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="management-bx-over">
                    <?php if(!$allrecords->isEmpty()): ?>
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Request</div>
                            <div class="management-table-th">Offers</div>
                            <div class="management-table-th">Action</div>
                        </div>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="management-table-tr">
                                <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                                <div class="management-table-td"><?php echo e($allrecord->title); ?></div>
                                <div class="management-table-td">
                                    <?php if(count($allrecord->Servicesoffer) > 0): ?>
                                        <a href="<?php echo e(URL::to( 'buyer-requests-view-offers/'.$allrecord->slug)); ?>" class=""><?php echo e(count($allrecord->Servicesoffer)); ?></a>
                                    <?php else: ?>
                                        <?php echo e(count($allrecord->Servicesoffer)); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="management-table-td">
                                    <?php if($allrecord->status < 5): ?>
                                        <a href="<?php echo e(URL::to( 'services/edit-request/'.$allrecord->slug)); ?>" title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo e(URL::to( 'services/delete-request/'.$allrecord->slug)); ?>" title="Delete" class="btn btn-danger btn-xs action-list delete-list" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash-o"></i></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(URL::to( 'services/workplace/'.$allrecord->serviceoffer_slug)); ?>" title="Go to Workplace" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
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