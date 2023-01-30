
<?php if(isset($allrecord->User->slug)): ?>
<div class="list_box searchlist">
    <div class="images_list">
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
                $gigimgname = HTTP_PATH.'/public/img/front/dummy.png';
            }
        ?>
        <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>" class=""><img class="lazy" src="<?php echo e(HTTP_PATH); ?>/public/img/loading2.gif" data-original="<?php echo e($gigimgname); ?>"></a>
    </div>    
    <div class="bottom_box">
        <div class="profilename">
            <span class="dp">
                <?php //echo '<pre>';print_r($allrecord->User->profile_image); ?>
                <?php if(isset($allrecord->User->profile_image)): ?>
                <?php if(file_exists(PROFILE_FULL_UPLOAD_PATH . $allrecord->User->profile_image) && !empty($allrecord->User->profile_image)): ?>
                    <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->User->profile_image, SITE_TITLE)); ?>

                <?php else: ?>
                    <?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?>

                <?php endif; ?>
                <?php endif; ?>
            </span>
            <span class="dpname"><a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->User->slug)); ?>"><?php echo e($allrecord->User->first_name.' '.$allrecord->User->last_name); ?></a></span>
        </div>
        <div class="list_con">
            <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>"><?php echo e(mb_substr($allrecord->title,0,40)); ?> </a>
        </div>
        <div class="rating-badges-container">
            <span class="review"><i class="fa fa-star"></i> <?php echo e($allrecord->User->average_rating); ?> <b>(<?php echo e($allrecord->User->total_review); ?> reviews)</b></span>
        </div>
        <div class="bottom_row">
            <?php echo $__env->make('elements.likeunlike', ['gid'=>$allrecord->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>" class="amount_list">$<?php echo e($allrecord->basic_price); ?></a>
        </div>
    </div>
</div> 

<?php endif; ?>