<?php $__env->startSection('content'); ?>
    <div id="apus-main-content">
        <section class="freelancer_single_layout">
            <section id="primary" class="content-area inner es-340">
                <div id="main" class="site-main content" role="main">
                    <div class="single-listing-wrapper freelancer" data-latitude="" data-longitude=""
                        data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/12-150x150.jpg">

                        <article id="post-4100"
                            class="freelancer-single post-4100 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-digital-marketing freelancer_category-graphics-design freelancer_tag-design-writing freelancer_tag-html5 freelancer_tag-prototyping">

                            <div class="freelancer-detail-header">
                                <div class="service-detail-breadcrumbs">
                                    <div class="container d-md-flex align-items-center">
                                        <div class="left-column">
                                            <div class="breadcrumbs-simple">
                                                <div class="container">
                                                    <ol class="breadcrumb">
                                                        <li><a href="<?php echo e(URL::to('index1')); ?>">Home</a> </li>
                                                        <li><a href="#">Freelancers</a></li>
                                                        <?php if(isset($recordInfo) && !empty($recordInfo)): ?>
                                                            <li><span class="active"><?php echo e($recordInfo->first_name); ?>

                                                                    <?php echo e($recordInfo->last_name); ?></span></li>
                                                        <?php else: ?>
                                                            Refine Result
                                                        <?php endif; ?>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-column ms-auto">
                                            <div class="apus-social-share share-listing position-relative">
                                                <div class="d-flex align-items-center">
                                                    <span class="icon-share"><i class="flaticon-share"></i></span>
                                                    <h6 class="share-title">
                                                        Share </h6>
                                                </div>
                                                <div class="bo-social-icons">


                                                    <?php if($siteSettings->facebook_link): ?>
                                                        <a href="<?php echo $siteSettings->facebook_link; ?>" target="_blank">
                                                            <i class="fab fa-facebook-f"></i> </a>
                                                    <?php endif; ?>
                                                    <?php if($siteSettings->twitter_link): ?>
                                                        <a href="<?php echo $siteSettings->twitter_link; ?>" target="_blank">
                                                            <i class="fab fa-twitter"></i> </a>
                                                    <?php endif; ?>
                                                    <?php if($siteSettings->linkedin_link): ?>
                                                        <a href="<?php echo $siteSettings->linkedin_link; ?>" target="_blank">
                                                            <i class="fab fa-linkedin-in"></i> </a>
                                                    <?php endif; ?>

                                                    <?php if($siteSettings->instagram_link): ?>
                                                        <a href="<?php echo $siteSettings->instagram_link; ?>" target="_blank">
                                                            <i class="fab fa-instagram"></i> </a>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                            
                                            <a data-toggle="tooltip" href="#freelancer-report-wrapper-4100"
                                                class="btn-show-popup btn-view-freelancer-report"
                                                title="Report this freelancer"><i
                                                    class="fas fa-exclamation-triangle fa-angle-right"></i></a>

                                            <div id="freelancer-report-wrapper-4100"
                                                class="freelancer-report-wrapper mfp-hide">
                                                <div class="inner">
                                                    <a href="javascript:void(0);" class="close-magnific-popup ali-right"><i
                                                            class="ti-close"></i></a>

                                                    <h2 class="widget-title"><span>Report this freelancer</span></h2>
                                                    <div class="content">
                                                        <form method="post" action="?" class="report-form-wrapper">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="subject"
                                                                    placeholder="Subject" required="required">
                                                            </div><!-- /.form-group -->

                                                            <div class="form-group">
                                                                <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                            </div><!-- /.form-group -->


                                                            <input type="hidden" name="post_id" value="4100">
                                                            <button class="button btn btn-theme btn-outline w-100"
                                                                name="submit-report">Send Report<i
                                                                    class="flaticon-right-up next"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-detail-freelancer">
                                    <div class="container">

                                        <div class="d-sm-flex align-items-center">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="freelancer-thumbnail flex-shrink-0 position-relative">
                                                    <div class="freelancer-logo d-flex align-items-center">

                                                        <?php if($recordInfo->profile_image): ?>
                                                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

                                                        <?php else: ?>
                                                            <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="freelancer-information flex-grow-1">
                                                    <div class="d-flex freelancer-detail-title-wrapper">
                                                        <h1 class="freelancer-detail-title">
                                                            <?php echo e($recordInfo->first_name); ?>

                                                            <?php echo e($recordInfo->last_name); ?> </h1>
                                                        <span class="flex-shrink-0"></span>
                                                    </div>
                                                    <div class="freelancer-job">
                                                        <?php
                                                        if ($recordInfo->user_status == 'Online') {
                                                         ?>
                                                        <div class="div_status is-online">
                                                            <i class="fa fa-circle" style="font-size: 10px;"></i>
                                                            <?php echo $recordInfo->user_status; ?>
                                                        </div>
                                                        <?php
                                                             }
                                                        ?>
                                                        <?php
                                                        if ($recordInfo->user_status == 'Offline') {
                                                         ?>
                                                        <div class="div_status is-offline">
                                                            <i class="fa fa-circle" style="font-size: 10px;"></i>
                                                            <?php echo $recordInfo->user_status; ?>
                                                        </div>
                                                        <?php
                                                             }
                                                        ?>
                                                    </div>
                                                    <div class="service-metas-detail d-flex flex-wrap align-items-center">
                                                        <div class="rating-reviews">
                                                            <i class="fa fa-star"></i>
                                                            <span
                                                                class="rating text-link"><?php echo e($recordInfo->average_rating); ?></span>
                                                            <span class="text">(<?php echo e($recordInfo->total_review); ?>

                                                                Review)</span>
                                                        </div>
                                                        <div class="freelancer-location with-icon"><i
                                                                class="flaticon-place"></i>
                                                            <a href="#"><?php echo e($recordInfo->city); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="freelancer-content-area container">
                                <!-- Main content -->
                                <div class="row content-single-freelancer content-service-detail">
                                    <div class="col-12 list-content-freelancer list-content-service col-lg-8">
                                        <div class="content-main-service content-main-freelancer">

                                            <div class="freelancer-detail-detail service-detail-detail">
                                                <ul
                                                    class="list-service-detail column-4 d-flex align-items-center flex-wrap">

                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-target"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Project Success</div>
                                                            <div class="value">0</div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-goal"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Total Service</div>
                                                            <div class="value">1</div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-target"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Completed Service</div>
                                                            <div class="value">0</div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-file-1"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">In Queue service</div>
                                                            <div class="value">5</div>
                                                        </div>
                                                    </li>


                                                </ul>


                                            </div>
                                            <div id="job-freelancer-description"
                                                class="job-detail-description box-detail">
                                                <h3 class="title">About Freelancer</h3>
                                                <div class="inner">
                                                    <?php echo nl2br($recordInfo->description); ?>

                                                </div>
                                            </div>




                                            <div id="job-freelancer-education"
                                                class="freelancer-detail-education my_resume_eduarea">
                                                <h4 class="title">Education</h4>
                                                <?php if($recordInfo->educations): ?>
                                                    <?php $__currentLoopData = json_decode($recordInfo->educations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="content">
                                                            <div class="circle">
                                                                <i class='fas fa-graduation-cap'></i>
                                                            </div>
                                                            <div class="top-info">
                                                                <span class="year"><?php echo $edu->year; ?></span>
                                                                <span class="edu_stats"><?php echo $edu->qual_name; ?></span>
                                                            </div>
                                                            <div class="edu_center">
                                                                <span class="university"><?php echo $edu->stream_name; ?></span>
                                                            </div>
                                                            <p class="mb0"><?php echo $edu->university_name; ?>,
                                                                <?php echo $edu->country_name; ?>, Pass in <?php echo $edu->year; ?>

                                                            </p>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>

                                            

                                            <div id="job-freelancer-award" class="my_resume_eduarea color-award">
                                                <h4 class="title">Certification</h4>
                                                <?php if($recordInfo->certifications): ?>
                                                    <?php $__currentLoopData = json_decode($recordInfo->certifications); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="content">
                                                            <div class="circle">
                                                                <i class='fas fa-award'></i>
                                                            </div>
                                                            <div class="top-info">
                                                                <span class="year"><?php echo $cert->year; ?></span>
                                                                <span class="edu_stats"><?php echo $cert->certificate_name; ?></span>
                                                            </div>
                                                            <div class="mb0"><?php echo $cert->certificate_from; ?>, Pass in
                                                                <?php echo $cert->year; ?></div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>


                                            <div class="widget-open-services">
                                                <div class="top-info-widget d-sm-flex align-items-center">
                                                    <h4 class="title">
                                                        Services </h4>
                                                    
                                                </div>
                                                <div class="widget-content">
                                                    <div class="slick-carousel" data-carousel="slick" data-items="4"
                                                        data-large="4" data-small="1" data-medium="2"
                                                        data-slidestoscroll="4" data-slidestoscroll_smallmedium="4"
                                                        data-slidestoscroll_extrasmall="1" data-pagination="false"
                                                        data-nav="true" data-rows="1" data-infinite="false"
                                                        data-autoplay="true">

                                                        <?php if(!$mygigs->isEmpty()): ?>
                                                            <?php $__currentLoopData = $mygigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <article
                                                                    class="map-item service-item post-5555 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-development-it service_category-trending"
                                                                    data-latitude="40.77936946417973"
                                                                    data-longitude="-73.91536380670227"
                                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service10-495x370.jpg"
                                                                    data-logo="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service10-150x150.jpg">
                                                                    <div class="position-relative">
                                                                        <div class="service-image">
                                                                            <?php
                                                                            $gigimgname = '';
                                                                            if ($allrecord->Image) {
                                                                                foreach ($allrecord->Image as $gigimage) {
                                                                                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                                                                                        $path = '/public/files/gigs/full/' . $gigimage->name;
                                                                                        if (file_exists($path) && !empty($gigimage->name)) {
                                                                                            $gigimgname = '/public/files/gigs/full/' . $gigimage['name'];
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            if ($gigimgname == '' && $allrecord->youtube_image) {
                                                                                if (file_exists('public/files/gigs/full/' . $allrecord->youtube_image)) {
                                                                                    $gigimgname = 'public/files/gigs/full/' . $allrecord->youtube_image;
                                                                                }
                                                                            }
                                                                            if ($gigimgname == '') {
                                                                                $gigimgname = 'public/img/front/dummy.png';
                                                                            }
                                                                            ?>
                                                                            <a
                                                                                href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>">
                                                                                <div class="image-wrapper">
                                                                                    <?php echo e(HTML::image($path, SITE_TITLE, ['title' => $allrecord->title, 'style' => 'width:215px;height:175px'])); ?>

                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <a class="btn-add-service-favorite like_top"
                                                                            data-service_id="5557" data-nonce="a1a2911e0b"
                                                                            data-bs-toggle="tooltip">
                                                                            <?php echo $__env->make(
                                                                                'elements.likeunlike',
                                                                                ['gid' => $allrecord->id]
                                                                            , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                                        </a>
                                                                    </div>

                                                                    <div class="service-information">
                                                                        <div class="category-service">
                                                                            <a href="<?php echo e(URL::to('public-profile/' . $allrecord->User->slug)); ?>"
                                                                                style=""><?php echo e($allrecord->User->first_name . ' ' . $allrecord->User->last_name); ?></a>
                                                                        </div>

                                                                        <h2 class="service-title"><a
                                                                                href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"
                                                                                rel="bookmark"><?php echo e(mb_substr($allrecord->title, 0, 40)); ?></a>
                                                                        </h2>
                                                                        <div class="rating-reviews">
                                                                            <i class="fa fa-star"></i>
                                                                            <span
                                                                                class="rating"><?php echo e($allrecord->User->average_rating); ?></span>
                                                                            <span
                                                                                class="text">(<?php echo e($allrecord->User->total_review); ?>

                                                                                Review)</span>
                                                                        </div>
                                                                        <div class="info-bottom d-flex align-items-center">
                                                                            <div class="service-author">
                                                                                <a
                                                                                    href="<?php echo e(URL::to('public-profile/' . $allrecord->User->slug)); ?>">
                                                                                    <div
                                                                                        class="freelancer-logo d-flex align-items-center">
                                                                                        <?php //echo '<pre>';print_r($allrecord->User->profile_image);
                                                                                        ?>
                                                                                        <?php if(isset($allrecord->User->profile_image)): ?>
                                                                                            <?php if(file_exists('public/files/users/full/' . $allrecord->User->profile_image) &&
                                                                                                    !empty($allrecord->User->profile_image)): ?>
                                                                                                <?php echo e(HTML::image('public/files/users/full/' . $allrecord->User->profile_image, SITE_TITLE)); ?>

                                                                                            <?php else: ?>
                                                                                                <?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?>

                                                                                            <?php endif; ?>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                    <span class="text">
                                                                                        <?php echo e($allrecord->User->first_name . ' ' . $allrecord->User->last_name); ?>

                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="ms-auto">
                                                                                <div class="service-salary with-title">
                                                                                    
                                                                                    <span><span
                                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span><?php echo e($allrecord->basic_price); ?></bdi></span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article><!-- #post-## -->
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <div class="col-md-12">
                                                                <div class="management-full">No gig posted by this user
                                                                    yet.</div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-block d-lg-none">
                                                <aside class="sidebar sidebar-listing-detail sidebar-right">
                                                    <aside class="widget widget_apus_freelancer_info">
                                                        <div class="freelancer-info-detail ">
                                                            <div class="freelancer-salary-wrapper">
                                                                
                                                                <h1><i class='fas fa-user-tie'></i>
                                                                    <?php echo e($recordInfo->first_name); ?>

                                                                    <?php echo e($recordInfo->last_name); ?></h1>
                                                            </div>
                                                            <ul class="list-freelancer-info">


                                                                <li>
                                                                    <div class="icon">
                                                                        <i class="flaticon-place"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="text">Location</div>
                                                                        <div class="value">
                                                                            <div class="freelancer-location">
                                                                                <a
                                                                                    href=""><?php echo e($recordInfo->city); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>


                                                                <li>
                                                                    <div class="icon">
                                                                        <i class="flaticon-document"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="text">Type</div>
                                                                        <div class="value">
                                                                            <div class="freelancer-meta with-icon">

                                                                                <div class="freelancer-meta">

                                                                                    Agency Freelancers </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <div class="icon">
                                                                        <i class="flaticon-translator"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <?php if($recordInfo->languages): ?>
                                                                            <?php $__currentLoopData = json_decode($recordInfo->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($lang->lang_name === 'English'): ?>
                                                                                    <div class="text">
                                                                                        <?php echo e($lang->lang_name); ?></div>
                                                                                    <div class="value">
                                                                                        <div
                                                                                            class="freelancer-meta with-icon">

                                                                                            <div class="freelancer-meta">

                                                                                                <?php echo e($lang->lang_level); ?>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <div class="icon">
                                                                        <i class="flaticon-mars"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="text">Gender</div>
                                                                        <div class="value">
                                                                            <div class="freelancer-meta with-icon">

                                                                                <div class="freelancer-meta">
                                                                                    <?php echo e($recordInfo->gender); ?> </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>


                                                                


                                                            </ul>
                                                            <?php if($recordInfo->id != Session::get('user_id')): ?>
                                                                <span class="contct_per_detail"><a
                                                                        href="javascript:void(0);"
                                                                        class="btn btn-theme btn-inverse btn-service-contact-form btn-show-popup w-100"
                                                                        onclick='$("#info12").show();'data-toggle="modal"
                                                                        data-target="#myModal_mobile">Contact
                                                                        Seller</a></span>
                                                            <?php endif; ?>

                                                            
                                                            <div class="modal fade publicprofile_modal"
                                                                id="myModal_mobile" tabindex="-1" role="dialog"
                                                                aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="nzwh-wrapper">
                                                                            <fieldset class="nzwh">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span></button>
                                                                                    <h4 class="modal-title"
                                                                                        id="myModalLabel"> Send a Message
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="drt">
                                                                                    <div class="right_pop">
                                                                                        <div class="profile-img">
                                                                                            <?php if($recordInfo->profile_image): ?>
                                                                                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

                                                                                            <?php else: ?>
                                                                                                <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                        <div class="con_sec">
                                                                                            <h4>Please include:</h4>
                                                                                            <ul>
                                                                                                <li>Project description</li>
                                                                                                <li>Specific instructions
                                                                                                </li>
                                                                                                <li>Relevant files</li>
                                                                                                <li>Your budget</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="left_pop">
                                                                                        <div class="form_sec">
                                                                                            <?php echo e(Form::open(['method' => 'post', 'id' => 'contactmessage', 'url' => 'users/messageuser', 'enctype' => 'multipart/form-data'])); ?>

                                                                                            <div class="contact_div">
                                                                                                <?php echo e(Form::textarea('message', '', ['class' => 'form-control required', 'placeholder' => '', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id' => 'messageid_mobile', 'onkeyup' => 'countCharmobile()'])); ?>

                                                                                                <div class="sec_blw_top">
                                                                                                    <div class="sec_blw">
                                                                                                        <span
                                                                                                            id="charcount_mobile">0/2500</span>
                                                                                                        <span
                                                                                                            class="right_sp">
                                                                                                            <?php echo e(Form::file('attachment', ['class' => 'form-control', 'accept' => 'image/png'])); ?>

                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="upbtn">
                                                                                                        <?php echo e(Form::hidden('receiver_id', $recordInfo->id, ['id' => 'receiver_id'])); ?>

                                                                                                        <!--<button type="button" class="succbtn" id="succbtnbtn">Send</button>-->
                                                                                                        <?php echo e(Form::submit('Send', ['class' => 'succbtn', 'id' => 'succbtnbtn'])); ?>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?php echo e(Form::close()); ?>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </aside>
                                                    <aside class="widget widget_apus_freelancer_tags">
                                                        <h2 class="widget-title"><span>My Skills</span></h2>
                                                        <div class="freelancer-detail-tags">
                                                            <div class="freelancer-tags">
                                                                <div class="text-section">
                                                                    <ul class="linked-skills" id="addskilldiv">
                                                                        <?php if($recordInfo->skills): ?>
                                                                            <?php $__currentLoopData = explode(',', $recordInfo->skills); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skillid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li id="s<?php echo $skillid; ?>"> <span>
                                                                                        <?php echo $skillsList[$skillid]; ?></span>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </aside>
                                                </aside>
                                            </div>
                                            <?php if(!$myreviews->isEmpty()): ?>
                                                <!-- Review -->
                                                <div id="reviews">
                                                    <div class="box-info-white max-780">
                                                        <h3 class="title">Latest Reviews</h3>

                                                        
                                                        
                                                    </div>
                                                    <?php $__currentLoopData = $myreviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($allrecord->Otheruser->first_name)): ?>
                                                            <div id="comments">

                                                                <ol class="comment-list">
                                                                    <li class="comment byuser comment-author-admin even thread-even depth-1"
                                                                        id="li-comment-51">

                                                                        <div id="comment-51" class="the-comment ">
                                                                            <?php if($allrecord->Otheruser->profile_image): ?>
                                                                                <div class="avatar">
                                                                                    <a
                                                                                        href="<?php echo e(URL::to('public-profile/' . $allrecord->Otheruser->slug)); ?>">
                                                                                        <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->Otheruser->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;'])); ?></a>
                                                                                </div>
                                                                            <?php else: ?>
                                                                                <a
                                                                                    href="<?php echo e(URL::to('public-profile/' . $recordInfo->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;'])); ?></a>
                                                                            <?php endif; ?>
                                                                            <div class="comment-box">
                                                                                <div class="clearfix">
                                                                                    <div class="name-comment">
                                                                                        <h3><a href="<?php echo e(URL::to('public-profile/' . $allrecord->Otheruser->slug)); ?>"
                                                                                                class=""><?php echo e($allrecord->Otheruser->first_name . ' ' . $allrecord->Otheruser->last_name); ?>

                                                                                            </a></h3>
                                                                                    </div>
                                                                                    <div
                                                                                        class="meta d-flex align-items-center">
                                                                                        <div class="star-rating"
                                                                                            title="Rated 4 out of 5">
                                                                                            <span class="review-avg"><i
                                                                                                    class="fa fa-star"></i><?php echo e($allrecord->rating); ?></span>
                                                                                        </div>
                                                                                        <div class="date">
                                                                                            <?php echo e($allrecord->created_at->diffForHumans()); ?>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div itemprop="description"
                                                                                class="comment-text">
                                                                                <p><?php echo e(nl2br($allrecord->comment)); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li><!-- #comment-## -->
                                                                </ol>


                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-none d-lg-block">
                                        <aside class="sidebar sidebar-listing-detail sidebar-right sticky-top">
                                            <aside class="widget widget_apus_freelancer_info">
                                                <div class="freelancer-info-detail ">
                                                    <div class="freelancer-salary-wrapper">
                                                        
                                                        <h1><i class='fas fa-user-tie'></i> <?php echo e($recordInfo->first_name); ?>

                                                            <?php echo e($recordInfo->last_name); ?></h1>
                                                    </div>
                                                    <ul class="list-freelancer-info">


                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-place"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Location</div>
                                                                <div class="value">
                                                                    <div class="freelancer-location">
                                                                        <a href="#"><?php echo e($recordInfo->city); ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>


                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-document"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Linked Accounts</div>
                                                                <div class="value">
                                                                    <div class="freelancer-meta with-icon">

                                                                        <div class="freelancer-meta">

                                                                            <ul class="linked-acc">
                                                                                <?php if($recordInfo->facebook_id): ?>
                                                                                    <li>
                                                                                        <i class='fab fa-facebook-f'
                                                                                            style='color:#2338cc'></i><span>
                                                                                            Facebook</span>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                                <?php if($recordInfo->google_id): ?>
                                                                                    <li>
                                                                                        <i
                                                                                            class="fab fa-google-plus-g"></i>
                                                                                        <span>Google</span>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            </ul>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-translator"></i>
                                                            </div>
                                                            <div class="details">
                                                                <?php if($recordInfo->languages): ?>
                                                                    <?php $__currentLoopData = json_decode($recordInfo->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($lang->lang_name === 'English'): ?>
                                                                            <div class="text"><?php echo e($lang->lang_name); ?>

                                                                            </div>
                                                                            <div class="value">
                                                                                <div class="freelancer-meta with-icon">

                                                                                    <div class="freelancer-meta">

                                                                                        <?php echo e($lang->lang_level); ?></div>

                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-mars"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Gender</div>
                                                                <div class="value">
                                                                    <div class="freelancer-meta with-icon">

                                                                        <div class="freelancer-meta">
                                                                            <?php echo e($recordInfo->gender); ?> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>


                                                        


                                                    </ul>
                                                    <?php if($recordInfo->id != Session::get('user_id')): ?>
                                                        <span class="contct_per"><a href="javascript:void(0);"
                                                                class="btn btn-theme btn-inverse btn-service-contact-form btn-show-popup w-100"
                                                                onclick='$("#info12").show();'data-toggle="modal"
                                                                data-target="#myModal">Contact Me</a></span>
                                                    <?php endif; ?>
                                                    <div class="modal fade publicprofile_modal" id="myModal"
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content modal-dialog-centered"
                                                                style="margin-top: 200px;">
                                                                <div class="nzwh-wrapper">
                                                                    <fieldset class="nzwh">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">
                                                                                Send a Message</h4>
                                                                        </div>
                                                                        <div class="drt">
                                                                            <div class="right_pop">
                                                                                <div class="profile-img">
                                                                                    <?php if($recordInfo->profile_image): ?>
                                                                                        <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

                                                                                    <?php else: ?>
                                                                                        <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                                                                    <?php endif; ?>
                                                                                </div>
                                                                                <div class="con_sec">
                                                                                    <h4>Please include:</h4>
                                                                                    <ul>
                                                                                        <li>Project description</li>
                                                                                        <li>Specific instructions</li>
                                                                                        <li>Relevant files</li>
                                                                                        <li>Your budget</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="left_pop">
                                                                                <div class="form_sec">
                                                                                    <?php echo e(Form::open(['method' => 'post', 'id' => 'contactmessage', 'url' => 'users/messageuser', 'enctype' => 'multipart/form-data'])); ?>

                                                                                    <div class="contact_div">
                                                                                        <?php echo e(Form::textarea('message', '', ['class' => 'form-control required', 'placeholder' => '', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id' => 'messageid', 'onkeyup' => 'countChar()'])); ?>

                                                                                        <div class="sec_blw_top">
                                                                                            <div class="sec_blw">
                                                                                                <span
                                                                                                    id="charcount">0/2500</span>
                                                                                                <span class="right_sp">
                                                                                                    <?php echo e(Form::file('attachment', ['class' => 'form-control', 'accept' => 'image/png'])); ?>

                                                                                                </span>
                                                                                            </div>
                                                                                            <div class="upbtn">
                                                                                                <?php echo e(Form::hidden('receiver_id', $recordInfo->id, ['id' => 'receiver_id'])); ?>

                                                                                                <!--<button type="button" class="succbtn" id="succbtnbtn">Send</button>-->
                                                                                                <?php echo e(Form::submit('Send', ['class' => 'succbtn', 'id' => 'succbtnbtn'])); ?>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php echo e(Form::close()); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </aside>
                                            <aside class="widget widget_apus_freelancer_tags">
                                                <h2 class="widget-title"><span>My Skills</span></h2>
                                                <div class="freelancer-detail-tags">
                                                    <div class="freelancer-tags">
                                                        <div class="text-section">
                                                            <ul class="linked-skills" id="addskilldiv">
                                                                <?php if($recordInfo->skills): ?>
                                                                    <?php $__currentLoopData = explode(',', $recordInfo->skills); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skillid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li id="s<?php echo $skillid; ?>"> <span>
                                                                                <?php echo $skillsList[$skillid]; ?></span>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </aside>
                                    </div>

                                </div>

                                
                            </div>
                        </article><!-- #post-## -->

                    </div>

                </div><!-- .site-main -->
            </section><!-- .content-area -->
        </section>
    </div><!-- .site-content -->
    <script>
        function addtolike(gid, type) {
            $.ajax({
                url: "users/likeunlike",
                type: "POST",
                data: {
                    'gid': gid,
                    'type': type,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function() {
                    $('#lik' + gid).show();
                },
                complete: function() {
                    $('#lik' + gid).hide();
                },
                success: function(result) {
                    $('#likeunlikeid' + gid).html(result);
                }
            });
        }

        <?php if(Session::get('user_id') && Session::get('user_id') > 0): ?>
            $(document).ready(function() {
                getmessage();
            });

            function getmessage() {
                $.ajax({
                    url: "check-new-notification",
                    type: "GET",
                    success: function(result) {
                        if (result == 1) {

                        } else {
                            $('#checkunreadmsg').removeClass('displaynone');
                            $('#msgcontaine').removeClass('displaynonenot');
                            $("#msgcontaine").html('');
                            servers = $.parseJSON(result);
                            $.each(servers, function(index, value) {
                                $("#msgcontaine").append(
                                    '<li><a href="users/view-notification/' +
                                    value.url + '"><h3>' + value.message +
                                    '</h3><div class="job-tatle">' + value.from_name + '<span> ' +
                                    value.timeago + '</span></div></a></li>');
                            });
                        }
                    }
                });
            }
            setInterval(function() {
                getmessage();
            }, 30000);
        <?php endif; ?>
        $(document).ready(function() {
            $("img.lazy").lazyload();
        });
    </script>
    <script>
        function countChar() {
            var text_max = 2500;
            var text_length = $('#messageid').val().length;
            var text_remaining = text_max - text_length;
            $('#charcount').html(text_length + '/' + text_max);
            if (text_remaining == 0) {
                $('.contact_div').addClass('error_ext');
            } else {
                $('.contact_div').removeClass('error_ext');
            }

        }
    </script>
    <script>
        function countCharmobile() {
            var max = 2500;
            var length = $('#messageid_mobile').val().length;
            var remaining = max - length;
            $('#charcount_mobile').html(length + '/' + max);
            if (remaining == 0) {
                $('.contact_div').addClass('error_ext');
            } else {
                $('.contact_div').removeClass('error_ext');
            }

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>