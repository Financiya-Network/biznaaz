<?php if(!$allrecords->isEmpty()): ?>
    <?php if($page == 1): ?>
        <div class="management-bx-over">
            <div class="management-table management-table-left" id="buyer_reqappend">
                <div class="management-table-tr">
                    <div class="management-table-th">Date</div>
                    <div class="management-table-th">Buyer</div>
                    <div class="management-table-th">Request</div>
                    <div class="management-table-th">Offers</div>
                    <div class="management-table-th">Duration</div>
                    <div class="management-table-th">Budget</div>
                </div>
                 <?php endif; ?>
                <?php global $serviceDays; ?>
                <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="management-table-tr">
                    <div class="management-table-td"><?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                    <div class="management-table-td">
                        <div class="buyer-img">
                        <?php if(isset($allrecord->User->profile_image)): ?>
                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->User->profile_image, SITE_TITLE,['style'=>"max-width: 60px"])); ?>

                        <?php else: ?>
                            <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE,['style'=>"max-width: 60px"])); ?>

                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="management-table-td management-table-td-fixed">
                        <a href="<?php echo e(URL::to( 'buyer-requests/'.$allrecord->slug)); ?>" class=""><?php echo e($allrecord->title); ?></a>
                        <p><?php echo e(str_limit($allrecord->description, $limit = 200, $end = '...')); ?></p>
                    </div>
                    <div class="management-table-td">
                        <?php echo e(count($allrecord->Servicesoffer)); ?>

                        
               </div>
                    <div class="management-table-td"><?php echo e($serviceDays[$allrecord->day]); ?></div>
                    <div class="management-table-td"><?php echo e(CURR.$allrecord->price); ?></div>
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