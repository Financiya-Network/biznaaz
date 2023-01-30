<?php if(!$allrecords->isEmpty()): ?>
<div class="management-table">
    <div class="management-table-tr">
        <div class="management-table-th">Date</div>
        <div class="management-table-th">Request Title</div>
        <div class="management-table-th">Budget</div>
        <div class="management-table-th">Offer Amount</div>
        <div class="management-table-th">Deliver In</div>
        <div class="management-table-th">Revisions</div>
        <div class="management-table-th">Status</div>
        <div class="management-table-th">Action</div>
    </div>
    <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($allrecord->Service)): ?>
    <div class="management-table-tr">
        <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
        <div class="management-table-td"><?php if(isset($allrecord->Service->title)): ?><?php echo e(str_limit($allrecord->Service->title, $limit = 50, $end = '...')); ?><?php else: ?> 
                N/A
            <?php endif; ?></div>
        <div class="management-table-td">
            <?php if(isset($allrecord->Service->price) && $allrecord->Service->price > 0): ?>
                <?php echo e(CURR.number_format($allrecord->Service->price,2)); ?>

            <?php else: ?> 
                N/A
            <?php endif; ?>
        </div>
        <div class="management-table-td"><?php echo e(CURR.number_format($allrecord->amount, 2)); ?></div>
        <div class="management-table-td"><?php echo e($allrecord->deliver_in); ?> Days</div>
        <div class="management-table-td"><?php echo e($allrecord->revisions); ?></div>
        <div class="management-table-td">
            <?php if($allrecord->Service->status == 5 && ($allrecord->status == 0 || $allrecord->status == 2)): ?>
                Rejected
            <?php elseif($allrecord->Service->status == 5 && $allrecord->status == 1): ?>
                Accepted
            <?php else: ?>
                Pending
            <?php endif; ?>
        </div>
        <div class="management-table-td">
            <?php if($allrecord->Service->status == 5 && $allrecord->status == 1): ?>
                <a href="<?php echo e(URL::to( 'services/workplace/'.$allrecord->slug)); ?>" title="Go to Workplace" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
            <?php else: ?>
                
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php else: ?>
<div class="management-full">No requests found. </div>
<?php endif; ?>