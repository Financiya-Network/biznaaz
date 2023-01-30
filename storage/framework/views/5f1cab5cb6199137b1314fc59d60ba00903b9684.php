<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Offered Gigs</div>
            <div class="dashboard-rights-section">
                <div class="mysavedgig" id="mysavedgig"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="row pubgig">
                    <?php if(!$allrecords->isEmpty()): ?>
                        <?php $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-3" id="gigdiv<?php echo e($allrecord->id); ?>">
                                <div class="thumbnail my_savedgig">
                                    <div class="project-img">
                                        <?php
                                        $gigimgname = '';
                                        if ($allrecord->Image) {
                                            foreach ($allrecord->Image as $gigimage) {
                                                if (isset($gigimage->name) && !empty($gigimage->name)) {
                                                    $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                                                    if (file_exists($path) && !empty($gigimage->name)) {
                                                        $gigimgname = GIG_FULL_DISPLAY_PATH . $gigimage['name'];
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        if ($gigimgname == '' && $allrecord->youtube_image) {
                                            if (file_exists(GIG_FULL_UPLOAD_PATH.$allrecord->youtube_image)) {
                                                $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                            }
                                        }
                                        if ($gigimgname == '') {
                                            $gigimgname = 'public/img/front/dummy.png';
                                        }
                                        ?>
                                        <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>" class=""><?php echo e(HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])); ?></a>
                                    </div>
                                    <div class="caption">
                                        <div class="profilename">
                                            <span class="dp">
                                                <?php if(file_exists(PROFILE_FULL_UPLOAD_PATH . $allrecord->User->profile_image) && !empty($allrecord->User->profile_image)): ?>
                                                    <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->User->profile_image, SITE_TITLE)); ?>

                                                <?php else: ?>
                                                    <?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?>

                                                <?php endif; ?>
                                            </span>
                                            <span class="dpname"><a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->User->slug)); ?>"><?php echo e($allrecord->User->first_name.' '.$allrecord->User->last_name); ?></a></span>
                                        </div>
                                        <h3>
                                            <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>"><?php echo e(str_limit($allrecord->title, $limit = 40, $end = '...')); ?> </a>
                                            <!--<a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>"><?php echo e($allrecord->title); ?> </a>-->
                                        </h3>
                                        <div class="rating-badges-container">
                                            <?php if($allrecord->User->average_rating > 0): ?>
                                                <span class="review"><i class="fa fa-star"></i> <?php echo e($allrecord->User->average_rating); ?> <b>(<?php echo e($allrecord->User->total_review); ?>)</b></span>
                                            <?php else: ?> 
                                                <span class="review"><i class="fa fa-star-o"></i> <?php echo e($allrecord->User->average_rating); ?> <b>(<?php echo e($allrecord->User->total_review); ?>)</b></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="bottom_row">
                                            <div class="bottom_lft">
                                                <?php if($allrecord->offer_status == 0): ?>
                                                    <a href="<?php echo e(URL::to('acceptreject/1/'.$allrecord->slug)); ?>" class="accept_off">Accept</a>
                                                    <a href="<?php echo e(URL::to('acceptreject/2/'.$allrecord->slug)); ?>" class="reject_off">Reject</a>
                                                <?php else: ?> 
                                                    <?php if($allrecord->offer_status == 1): ?>
                                                        <span class="accept_off">Accepted</span>
                                                    <?php elseif($allrecord->offer_status == 2): ?>
                                                        <span class="reject_off">Rejected</span>
                                                    <?php elseif($allrecord->offer_status == 3): ?>
                                                        <span class="reject_off">Withdrawn</span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="bottom_rgt">
                                                <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>" class="amount_list">$<?php echo e($allrecord->basic_price); ?></a>
                                            </div>
                                        </div>
                                    </div>                                            
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?> 
                    <div class="col-md-12"><div class="management-full">No record found.</div></div>
                    <?php endif; ?>
                </div>                      
            </div>
        </div>
    </section>
</div>
<script>
function removesavedgig(gid){
    if(confirm('Are you sure you want to remove Gig from saved Gigs?') == true){
        $.ajax({
            url: "<?php echo HTTP_PATH; ?>/users/deletelikeunlike",
            type: "POST",
            data: {'gid': gid, _token: '<?php echo e(csrf_token()); ?>'},
            beforeSend: function() {$('#mysavedgig').show();},
            complete: function() {$('#mysavedgig').hide();},
            success: function (result) {
               $('#gigdiv'+gid).remove();
            }
        });
    }    
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>