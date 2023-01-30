<?php $__env->startSection('content'); ?>
<div class="main_dashboard">
    <?php echo $__env->make('elements.topcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="login_section">
        <div class="container">
            <div class="row">
            <div class="col-sx-12 col-sm-4 col-md-3">
                <div class="user-box-login">
                    <h3 class="">Hi <?php echo e($loginuser->first_name .' '.$loginuser->last_name); ?>,</h3>
                    <p> Get best offers from sellers for your service</p>
                    <a href="<?php echo e(URL::to( 'services/create-request')); ?>" class="btn btn-primary">Post a Request</a>
                </div>
            </div>
            <div class="col-sx-12 col-sm-8 col-md-9">
             <div class="latest-bx">
                    <div id="pay_slider2" class="owl-carousel">
                        <?php $__currentLoopData = $bannerList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="home-banners">
                            <div class="thumbnail">
                                <a href="javascript:void()">
                                 <?php echo e(HTML::image(BANNER_DISPLAY_PATH.$banner->name, SITE_TITLE)); ?>

                                <div class="caption">
                                    <h3><?php echo e($banner->title); ?></h3>
                                    <p><?php echo e($banner->subtitle); ?></p>
                                </div>
                                </a>
                            </div>
                       </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>                  
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="jobs_sction">
        <div class="wrapper">
            <div class="jobs_itle">
                <div class="gifg">
                <div class="job-gigs-ss">
                    <h3 class="explore">Recently Added Gigs</h3>    
                    <div class="tiltee">Get inspired to build your business</div>
                </div>
                <div class="view-all-but"><a href="<?php echo e(URL::to( 'gigs')); ?>">View all<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
                <div class="home-gigs">
                    <?php if(!$gigcatlist->isEmpty()): ?> 
                        <?php $__currentLoopData = $gigcatlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('elements.gigbox', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!$recentCompletedlist->isEmpty()): ?> 
    <div class="completed_task">
    <div class="wrapper">
        <div class="completed_task"><h4 class="rece">Recently Completed Gigs</h4></div>    
        <div class="Recently">
            <div class="Recently_mid_row">               
                <?php $__currentLoopData = $recentCompletedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rec_block">
                        <div class="rec_block_inner">
                            <div class="rec_img_top">
                                <div class="rec_img">
                                    <?php if(isset($allrecord->Seller->profile_image)): ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Seller->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Seller->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="_date"><?php echo e($allrecord->updated_at->format('d F Y')); ?></div>                                
                            </div>
                            <div class="img_con_btm_bx">
                                <div class="img_con"><?php echo e(isset($allrecord->Gig->title) ? $allrecord->Gig->title : ''); ?></div>
                                <div class="img_con_btm">
                                    <?php if($allrecord->package == 'basic'): ?>
                                        <?php echo str_limit($allrecord->Gig->basic_description, $limit = 90, $end = '...'); ?>

                                    <?php elseif($allrecord->package == 'standard'): ?>
                                        <?php echo str_limit($allrecord->Gig->basic_standard, $limit = 90, $end = '...'); ?>

                                    <?php else: ?>
                                        <?php echo str_limit($allrecord->Gig->basic_premium, $limit = 90, $end = '...'); ?>

                                    <?php endif; ?>    
                                </div>
                            </div>
                        </div>    
                    </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
<!--        <div class="cate cate_new"><a href="#">Browse more tasks</a></div>-->
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>