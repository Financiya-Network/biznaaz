<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">My Notifications </div>
            <div class="management-bx">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="management-bx-over">
                    <?php if(!$allrecords->isEmpty()): ?>
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Message</div>
                            <div class="management-table-th">Action</div>
                        </div>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="management-table-tr <?php if($allrecord->status): ?> unreadd <?php endif; ?>">
                                <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                                <div class="management-table-td"><?php echo e($allrecord->message); ?></div>
                                <div class="management-table-td">
                                    <a href="<?php echo e(URL::to( 'users/delete-notification/'.$allrecord->slug)); ?>" title="Delete" class="btn btn-primary btn-xs action-list delete-list" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash-o"></i></a>
                                    <a href="<?php echo e(URL::to( 'users/view-notification/'.$allrecord->slug)); ?>" title="View" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
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