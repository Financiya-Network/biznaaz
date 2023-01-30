<?php if(!$allrecords->isEmpty()): ?>
    <?php if($page == 1): ?>
        <div class="management-bx-over">
            <div class="management-table management-table-left" id="buyer_reqappend">
                <div class="management-table-tr">
                    <div class="management-table-th">Date</div>
                    <div class="management-table-th">Source</div>
                    <div class="management-table-th">Transaction ID</div>
                    <div class="management-table-th">Status</div>
                    <div class="management-table-th">Amount</div>
                </div>
                 <?php endif; ?>
                <?php global $serviceDays; ?>
                <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="management-table-tr">
                    <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y h:i A')); ?></div>
                    <div class="management-table-td"><?php echo $allrecord->source; ?></div>
                    <div class="management-table-td">
                        <?php if($allrecord->status == 1): ?>
                            <?php echo e($allrecord->trn_id); ?>

                        <?php endif; ?>
                    </div>
                    <div class="management-table-td">
                        <?php if($allrecord->status == 0): ?>
                            Pending
                        <?php elseif($allrecord->status == 1): ?>
                            Approved
                        <?php else: ?> 
                            Rejected
                        <?php endif; ?>
                    </div>
                    <div class="management-table-td">
                        <?php if($allrecord->type == 4): ?>
                            <span class="">- <?php echo e(CURR.number_format(-$allrecord->revenue, 2)); ?></span>  
                        <?php elseif($allrecord->revenue < 0): ?>
                            <span class="amt_nt">- <?php echo e(CURR.number_format(-$allrecord->revenue, 2)); ?></span>  
                        <?php else: ?> 
                            <span class="amt_add">+ <?php echo e(CURR.number_format($allrecord->revenue, 2)); ?></span>  
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == 1): ?>
            </div>
        </div>
    <?php endif; ?>
    <script>$('#reqloaddiv').show();</script>
<?php else: ?>
<?php if($page == 1): ?>
    <script>$('#reqloaddiv').hide();</script>
    <div class="management-full">No requests found. </div>
<?php else: ?>
<script>$('#reqloaddiv').hide();</script>
<?php endif; ?>
<?php endif; ?>