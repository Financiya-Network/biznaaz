<?php $__env->startSection('content'); ?>
    <?php echo e(HTML::script('public/js/facebox.js')); ?>

    <?php echo e(HTML::style('public/css/facebox.css')); ?>

    <div id="apus-main-content">
        <section class="service-detail-version-v1">

            <section id="primary" class="content-area inner es-340">
                <div id="main" class="site-main content" role="main">

                    <div class="single-listing-wrapper service" data-latitude="40.77229478697032"
                        data-longitude="-73.92725741145593"
                        data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service12-495x370.jpg"
                        data-logo="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service12-150x150.jpg">


                        <article id="post-5557"
                            class="service-single post-5557 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-development-it service_category-programming-tech">

                            <!-- heading -->



                            <div class="service-detail-header v1">
                                <div class="service-detail-breadcrumbs">
                                    <div class="container d-md-flex align-items-center">
                                        <div class="left-column">
                                            <div class="breadcrumbs-simple">
                                                <div class="container">
                                                    <ol class="breadcrumb">
                                                        <li><a href="<?php echo e(URL::to('index1')); ?>">Home</a> </li>
                                                        <li><a href="#">Services</a></li>
                                                        <?php if(isset($recordInfo) && !empty($recordInfo)): ?>
                                                            <li><span class="active"><?php echo e($recordInfo->title); ?></span></li>
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
                                            </div> <a href="javascript:void(0)" class="btn-add-service-favorite"
                                                data-service_id="5557" data-nonce="b1f86a9443" data-bs-toggle="tooltip"
                                                title="Add Favorite">
                                                <i class="flaticon-like"></i>
                                                <span>Save</span>
                                            </a>
                                            <a data-toggle="tooltip" href="#service-report-wrapper-5557"
                                                class="btn-show-popup btn-view-service-report"
                                                title="Report this service"><i
                                                    class="fas fa-exclamation-triangle fa-angle-right"></i></a>

                                            <div id="service-report-wrapper-5557" class="service-report-wrapper mfp-hide">
                                                <div class="inner">
                                                    <a href="javascript:void(0);" class="close-magnific-popup ali-right"><i
                                                            class="ti-close"></i></a>

                                                    <h2 class="widget-title"><span>Report this service</span></h2>
                                                    <div class="content">
                                                        <form method="post" action="?" class="report-form-wrapper">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="subject"
                                                                    placeholder="Subject" required="required">
                                                            </div><!-- /.form-group -->

                                                            <div class="form-group">
                                                                <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                            </div><!-- /.form-group -->


                                                            <input type="hidden" name="post_id" value="5557">
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

                                <div class="header-detail-service">
                                    <div class="container">

                                        <div class="info-detail-service">
                                            <div class="title-wrapper d-flex">
                                                <?php if(isset($recordInfo) && !empty($recordInfo)): ?>
                                                    <h1 class="service-detail-title"><?php echo e($recordInfo->title); ?></h1> <span
                                                        class="flex-shrink-0"></span>
                                                <?php else: ?>
                                                    Refine Result
                                                <?php endif; ?>
                                            </div>
                                            <div class="service-metas-detail d-flex align-items-center flex-wrap">
                                                <div class="service-author">
                                                    <?php if($userInfo->profile_image): ?>
                                                        <a href="<?php echo e(URL::to('public-profile/' . $userInfo->slug)); ?>">
                                                            <div class="freelancer-logo d-flex align-items-center">
                                                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $userInfo->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;'])); ?>

                                                            </div>
                                                            <span class="text">
                                                                <?php echo e($userInfo->first_name); ?>

                                                                <?php echo e($userInfo->last_name); ?></span>
                                                        </a>
                                                    <?php else: ?>
                                                        <a
                                                            href="<?php echo e(URL::to('public-profile/' . $userInfo->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;'])); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="rating-reviews">
                                                    <i class="fa fa-star"></i>
                                                    <?php if($userInfo): ?>
                                                        <span class="rating"> <?php echo e($userInfo->average_rating); ?></span>
                                                        <span class="text">(<?php echo e($userInfo->total_review); ?> Reviews)</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="views">
                                                    <i class="flaticon-website"></i>
                                                    <span class="text">867</span> Views
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="service-content-area container">
                                <!-- Main content -->
                                <div class="row content-service-detail">
                                    <div class="list-content-service col-12 col-lg-8">
                                        <div class="content-main-service">


                                            <div class="service-detail-detail">
                                                <ul class="list-service-detail d-flex align-items-center flex-wrap">
                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-calendar"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Delivery Time</div>
                                                            <?php if($recordInfo): ?>
                                                                <div class="value">
                                                                    <?php echo e($recordInfo->basic_delivery); ?> Days </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-goal"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">English level</div>
                                                            <div class="value">
                                                                Conversational </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="icon">
                                                            <i class="flaticon-tracking"></i>
                                                        </div>
                                                        <div class="details">
                                                            <div class="text">Location</div>
                                                            <div class="value">
                                                                <div class="service-location">
                                                                    <?php if($userInfo): ?>
                                                                        <a href="#"><?php echo e($userInfo->city); ?></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>



                                            <div class="property-detail-gallery gallery-listing">
                                                <div class="gallery-listing-main">
                                                    <div class="slick-carousel slick-carousel-gallery-main"
                                                        data-carousel="slick" data-items="1" data-large="1"
                                                        data-medium="1" data-small="1" data-smallest="1"
                                                        data-pagination="false" data-nav="true" data-autoplay="false"
                                                        data-slickparent="true">
                                                        <?php $__currentLoopData = $recordInfo->Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gigimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(isset($gigimage->name) && !empty($gigimage->name)): ?>
                                                                <div class="item">
                                                                    
                                                                    <div class="image-wrapper">
                                                                        <?php echo e(HTML::image(GIG_FULL_DISPLAY_PATH . $gigimage->name, SITE_TITLE, ['title' => $recordInfo->title, 'class' => 'attachment-xx1x1 size-xx1x1', 'style' => 'margin-inline: 100px;'])); ?>

                                                                    </div>
                                                                    
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div class="slick-carousel slick-carousel-gallery-thumbs d-none d-md-block"
                                                    data-carousel="slick" data-items="6" data-large="5" data-medium="4"
                                                    data-small="3" data-smallest="2" data-pagination="false"
                                                    data-nav="false" data-autoplay="false"
                                                    data-asnavfor=".slick-carousel-gallery-main" data-slidestoscroll="1"
                                                    data-focusonselect="true">
                                                    <?php $__currentLoopData = $recordInfo->Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gigimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($gigimage->name) && !empty($gigimage->name)): ?>
                                                            <div class="item">
                                                                <div class="image-wrapper">
                                                                    <?php echo e(HTML::image(GIG_FULL_DISPLAY_PATH . $gigimage->name, SITE_TITLE, ['title' => $recordInfo->title, 'class' => 'attachment-xx1x1 size-xx1x1'])); ?>

                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>


                                            </div>
                                            <!-- service description -->
                                            <div class="service-detail-description">
                                                <h3 class="title">Service Description</h3>
                                                <?php echo nl2br($recordInfo->description); ?>

                                                <div class="max-650">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4">
                                                            <h6 class="fw-500 mb-3">App type</h6>
                                                            <div class="inner">Business, Food &#038; drink,</div>
                                                            <div class="inner">Graphics &#038; design</div>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <h6 class="fw-500 mb-3">Design tool</h6>
                                                            <div class="inner">Adobe XD, Figma,</div>
                                                            <div class="inner">Adobe Photoshop</div>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <h6 class="fw-500 mb-3">Device</h6>
                                                            <div class="inner">Mobile, Desktop</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php if(!empty($recordInfo->Gigfaq) && count($recordInfo->Gigfaq) > 0): ?>
                                                <div id="service-detail-faq" class="service-detail-faq">
                                                    <div class="inner">
                                                        <h4 class="title_1">Frequently Asked Questions</h4>
                                                        <div class="panel-group" id="service-faq-accordion"
                                                            role="tablist" aria-multiselectable="true">
                                                            <?php $__currentLoopData = $recordInfo->Gigfaq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gigfaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="accordion-item accordion-item-faq">
                                                                    <h4 class="accordion-header">
                                                                        <a class="accordion-button collapsed collapse-top"
                                                                            role="button" data-bs-toggle="collapse"
                                                                            data-bs-parent="#service-faq-accordion"
                                                                            href="#service-faq-collapse-<?php echo e($key); ?>"
                                                                            aria-expanded="true"
                                                                            aria-controls="service-faq-collapse-<?php echo e($key); ?>">
                                                                            <?php echo e($gigfaq->question); ?> </a>
                                                                    </h4>
                                                                    <div id="service-faq-collapse-<?php echo e($key); ?>"
                                                                        class="accordion-collapse collapse  collapse-bottom"
                                                                        role="tabpanel" aria-labelledby="heading-<?php echo e($key); ?>">
                                                                        <div class="accordion-body">
                                                                            <div class="description"><?php echo e($gigfaq->answer); ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-block d-lg-none">
                                                <aside class="sidebar sidebar-listing-detail sidebar-right">
                                                    <aside class="widget widget_1  widget_apus_service_price">
                                                        <div class="service-price">
                                                            <form id="service-add-to-cart-5557_nF5xA"
                                                                class="service-add-to-cart" method="post">
                                                                <ul class="nav offer-nav-tabs" role="tablist">
                                                                    <li role="presentation"><a href="#basic_1"
                                                                            class="active" aria-controls="basic"
                                                                            role="tab" data-toggle="tab"
                                                                            onclick="updateprice('<?php echo e($recordInfo->basic_price); ?>', 'basic')">Basic</a>
                                                                    </li>
                                                                    <li role="presentation"><a href="#standard_1"
                                                                            aria-controls="standard" role="tab"
                                                                            data-toggle="tab"
                                                                            onclick="updateprice('<?php echo e($recordInfo->standard_price); ?>', 'standard')">Standard</a>
                                                                    </li>
                                                                    <li role="presentation"><a href="#premium_1"
                                                                            aria-controls="premium" role="tab"
                                                                            data-toggle="tab"
                                                                            onclick="updateprice('<?php echo e($recordInfo->premium_price); ?>', 'premium')">Premium</a>
                                                                    </li>
                                                                </ul>

                                                                <!-- Tab panes -->
                                                                <div class="tab-content">
                                                                    <div role="tabpanel" class="tab-pane active"
                                                                        id="basic_1">
                                                                        <div class="offer-bxs">
                                                                            <div class="offer-bxs-price">
                                                                                <span
                                                                                    class="package-title-text"><?php echo e($recordInfo->basic_title); ?></span>
                                                                                <span
                                                                                    class="package-price"><?php echo e(CURR . $recordInfo->basic_price); ?></span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                <?php echo e($recordInfo->basic_description); ?></p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time"><?php echo e($recordInfo->basic_delivery); ?>

                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    <?php echo e($recordInfo->basic_revision); ?>

                                                                                    Revision
                                                                                </span>
                                                                                <ul class="buyables-offer">
                                                                                    <!--                                                <li class="" >
                                                                                                                                    <i class="fa fa-check"></i>Background Music
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>3 Length Variations
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Scriptwriting
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>60 Seconds Running Time
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>1 Size Orientation
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Video Editing
                                                                                                                                </li>-->
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div role="tabpanel" class="tab-pane"
                                                                        id="standard_1">
                                                                        <div class="offer-bxs">
                                                                            <div class="offer-bxs-price">
                                                                                <span
                                                                                    class="package-title-text"><?php echo e($recordInfo->standard_title); ?></span>
                                                                                <span
                                                                                    class="package-price"><?php echo e(CURR . $recordInfo->standard_price); ?></span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                <?php echo e($recordInfo->standard_description); ?></p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time"><?php echo e($recordInfo->standard_delivery); ?>

                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    <?php echo e($recordInfo->standard_revision); ?>

                                                                                    Revision
                                                                                </span>
                                                                                <ul class="buyables-offer">
                                                                                    <!--                                                <li class="" >
                                                                                                                                    <i class="fa fa-check"></i>Background Music
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>3 Length Variations
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Scriptwriting
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>60 Seconds Running Time
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>1 Size Orientation
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Video Editing
                                                                                                                                </li>-->
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div role="tabpanel" class="tab-pane" id="basic_1">
                                                                        <div class="offer-bxs">
                                                                            <div class="offer-bxs-price">
                                                                                <span
                                                                                    class="package-title-text"><?php echo e($recordInfo->basic_title); ?></span>
                                                                                <span
                                                                                    class="package-price"><?php echo e(CURR . $recordInfo->basic_price); ?></span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                <?php echo e($recordInfo->basic_description); ?></p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time"><?php echo e($recordInfo->basic_delivery); ?>

                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    <?php echo e($recordInfo->basic_revision); ?>

                                                                                    Revision
                                                                                </span>
                                                                                <ul class="buyables-offer">
                                                                                    <!--                                                <li class="" >
                                                                                                                                    <i class="fa fa-check"></i>Background Music
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>3 Length Variations
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Scriptwriting
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>60 Seconds Running Time
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>1 Size Orientation
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Video Editing
                                                                                                                                </li>-->
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div role="tabpanel" class="tab-pane" id="premium_1">
                                                                        <div class="offer-bxs">
                                                                            <div class="offer-bxs-price">
                                                                                <span
                                                                                    class="package-title-text"><?php echo e($recordInfo->premium_title); ?></span>
                                                                                <span
                                                                                    class="package-price"><?php echo e(CURR . $recordInfo->premium_price); ?></span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                <?php echo e($recordInfo->premium_description); ?></p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time"><?php echo e($recordInfo->premium_delivery); ?>

                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    <?php echo e($recordInfo->premium_revision); ?>

                                                                                    Revision
                                                                                </span>
                                                                                <ul class="buyables-offer">

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php echo e(Form::open(['method' => 'post', 'id' => 'addggiform_1', 'class' => 'addggiform'])); ?>

                                                                    <input type="hidden" name="type" id="settype_1"
                                                                        value="basic">
                                                                    <input type="hidden" name="slug" id="gigslug_1"
                                                                        value="<?php echo e($recordInfo->slug); ?>">
                                                                    <input type="hidden" name="examt" id="examt_1"
                                                                        value="">
                                                                    <input type=hidden id="extragig_idd_1"
                                                                        name="extragig_idd" value="" />
                                                                    <input type=hidden id="gigextra_rm_1"
                                                                        name="gigextra_rm" value="" />
                                                                    <div class="package-footer">
                                                                        <p class="hidebtn" id="hidebtn_1">

                                                                            <?php if(Session::get('user_id') != $recordInfo->user_id): ?>

                                                                                <?php if($recordInfo->pause == 0 || $recordInfo->User->accept_orders == 0 || $recordInfo->User->hide_weekend == 1): ?>

                                                                                    <?php
                                                                                    $waitlist = $recordInfo->waitlist;
                                                                                    
                                                                                    $wait = explode(',', $waitlist);
                                                                                    ?>

                                                                                    <?php if(Session::get('user_id')): ?>
                                                                                        <?php if(in_array(Session::get('user_id'), $wait)): ?>
                                                                                            <span
                                                                                                class="btn-lrg-standard btn-lrg-basc">Added
                                                                                                to Waiting
                                                                                                List</span>
                                                                                        <?php else: ?>
                                                                                            <span class="btn-lrg-standard"
                                                                                                id="myBtn1_1"
                                                                                                onclick="submitwaitlist()"
                                                                                                id="waitlist_1">Add to
                                                                                                Waiting
                                                                                                List</span>
                                                                                        <?php endif; ?>
                                                                                    <?php else: ?>
                                                                                        <span class="btn-lrg-standard"
                                                                                            id="myBtn1_1"
                                                                                            onclick="submitwaitlist()"
                                                                                            id="waitlist">Add to Waiting
                                                                                            List</span>
                                                                                    <?php endif; ?>
                                                                                <?php else: ?>
                                                                                    <span onclick="submitform()"
                                                                                        class="btn-lrg-standard">Continue
                                                                                        (<?php echo e(CURR); ?><span
                                                                                            class="js-str-currency"
                                                                                            id="btnprice_1"><?php echo e($recordInfo->basic_price); ?></span>)
                                                                                    </span>

                                                                                <?php endif; ?>

                                                                            <?php endif; ?>

                                                                        </p>
                                                                        <div class="gigdloader" id="gigdloader_1">
                                                                            <?php echo e(HTML::image('public/img/loading.gif', SITE_TITLE)); ?>

                                                                        </div>
                                                                    </div>
                                                                    <?php echo e(Form::close()); ?>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </aside>
                                                    <aside class="widget widget_1 widget_apus_service_author">
                                                        <h2 class="widget-title"><span>About The Seller</span></h2>
                                                        <div class="widget-service-author">
                                                            <div class="service-author-heading d-flex align-items-center">
                                                                <div class="service-author-image flex-shrink-0">
                                                                    <?php if($userInfo->profile_image): ?>
                                                                        <a
                                                                            href="<?php echo e(URL::to('public-profile/' . $userInfo->slug)); ?>">
                                                                            <div
                                                                                class="freelancer-logo d-flex align-items-center">
                                                                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $userInfo->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;'])); ?>

                                                                            </div>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a
                                                                            href="<?php echo e(URL::to('public-profile/' . $userInfo->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;'])); ?></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="service-author-right flex-grow-1">
                                                                    <?php if($userInfo): ?>
                                                                        <h5><a
                                                                                href="<?php echo e(URL::to('public-profile/' . $recordInfo->User->slug)); ?>">
                                                                                <?php echo e($userInfo->first_name); ?>

                                                                                <?php echo e($userInfo->last_name); ?> </a></h5>
                                                                        <!-- job -->
                                                                        <div class="freelancer-job">
                                                                            <?php echo e($userInfo->address); ?></div>
                                                                        <div class="rating-reviews">
                                                                            <i class="fa fa-star"></i>
                                                                            <span
                                                                                class="rating text-link"><?php echo e($userInfo->average_rating); ?></span>
                                                                            <span
                                                                                class="text">(<?php echo e($userInfo->total_review); ?>

                                                                                Review)</span>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="metas">
                                                                <?php if($userInfo): ?>
                                                                    <div class="freelancer-location with-title">
                                                                        <strong>Location:</strong>
                                                                        <span>
                                                                            <?php
                                                                            $farray = [];
                                                                            if (isset($recordInfo->User->city) && $recordInfo->User->city != '') {
                                                                                $farray[] = $recordInfo->User->city;
                                                                            }
                                                                            if (isset($recordInfo->User->Country->name) && $recordInfo->User->Country->name != '') {
                                                                                $farray[] = $recordInfo->User->Country->name;
                                                                            }
                                                                            echo implode(', ', $farray);
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="freelancer-salary with-title">
                                                                        <strong>Member since:</strong>
                                                                        <span><?php echo date('F Y', strtotime($recordInfo->User->created_at)); ?></span>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>

                                                            
                                                            <?php if(Session::get('user_id') != $recordInfo->user_id): ?>
                                                                <span class="contct_per_detail"><a
                                                                        href="javascript:void(0);"
                                                                        class="btn-lrg-standard"
                                                                        onclick='$("#info12").show();'data-toggle="modal"
                                                                        data-target="#myModal_mobile">Contact
                                                                        Seller</a></span>
                                                            <?php endif; ?>
                                                        </div>

                                                        

                                                        <div class="modal fade publicprofile_modal" id="myModal_mobile"
                                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog modal-dialog_1" role="document">
                                                                <div class="modal-content">
                                                                    <div class="nzwh-wrapper">
                                                                        <fieldset class="nzwh">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title" id="myModalLabel">
                                                                                    Send a
                                                                                    Message</h4>
                                                                            </div>
                                                                            <div class="drt">
                                                                                <div class="right_pop">
                                                                                    <div class="profile-img">
                                                                                        <?php if($recordInfo->User->profile_image): ?>
                                                                                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->User->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

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
                                                                                        <?php echo e(Form::open(['method' => 'post', 'id' => 'contactmessage_1', 'url' => 'users/messageuser', 'enctype' => 'multipart/form-data'])); ?>

                                                                                        <div class="contact_div">
                                                                                            <?php echo e(Form::textarea('message', '', ['class' => 'form-control required', 'placeholder' => '', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id' => 'messageid_mobile', 'onkeyup' => 'countCharmobile()'])); ?>

                                                                                            <div class="sec_blw_top">
                                                                                                <div class="sec_blw">
                                                                                                    <span
                                                                                                        id="charcount_mobile">0/2500</span>
                                                                                                    <span class="right_sp">
                                                                                                        <?php echo e(Form::file('attachment', ['class' => 'form-control', 'accept' => 'image/png'])); ?>

                                                                                                    </span>
                                                                                                </div>
                                                                                                <div class="upbtn">
                                                                                                    <?php echo e(Form::hidden('receiver_id', $recordInfo->User->id, ['id' => 'receiver_id'])); ?>

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
                                                    </aside>
                                                </aside>
                                            </div>

                                            <!-- Review -->
                                            
                                        </div>
                                    </div>

                                    <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-none d-lg-block">
                                        <aside class="sidebar-listing-detail sidebar sidebar-right sticky-top">
                                            <aside class="widget widget_1 widget_apus_service_price">
                                                <div class="service-price">
                                                    <form id="service-add-to-cart-5557_U7zYv" class="service-add-to-cart"
                                                        method="post">
                                                        <ul class="nav offer-nav-tabs" role="tablist">
                                                            <li role="presentation"><a href="#basic" class="active"
                                                                    aria-controls="basic" role="tab"
                                                                    data-toggle="tab"
                                                                    onclick="updateprice('<?php echo e($recordInfo->basic_price); ?>', 'basic')">Basic</a>
                                                            </li>
                                                            <li role="presentation"><a href="#standard"
                                                                    aria-controls="standard" role="tab"
                                                                    data-toggle="tab"
                                                                    onclick="updateprice('<?php echo e($recordInfo->standard_price); ?>', 'standard')">Standard</a>
                                                            </li>
                                                            <li role="presentation"><a href="#premium"
                                                                    aria-controls="premium" role="tab"
                                                                    data-toggle="tab"
                                                                    onclick="updateprice('<?php echo e($recordInfo->premium_price); ?>', 'premium')">Premium</a>
                                                            </li>
                                                        </ul>

                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <div role="tabpanel" class="tab-pane active" id="basic">
                                                                <div class="offer-bxs">
                                                                    <div class="offer-bxs-price">
                                                                        <span
                                                                            class="package-title-text"><?php echo e($recordInfo->basic_title); ?></span>
                                                                        <span
                                                                            class="package-price"><?php echo e(CURR . $recordInfo->basic_price); ?></span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        <?php echo e($recordInfo->basic_description); ?></p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time"><?php echo e($recordInfo->basic_delivery); ?>

                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            <?php echo e($recordInfo->basic_revision); ?> Revision
                                                                        </span>
                                                                        <ul class="buyables-offer">
                                                                            <!--                                                <li class="" >
                                                                                                                                    <i class="fa fa-check"></i>Background Music
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>3 Length Variations
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Scriptwriting
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>60 Seconds Running Time
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>1 Size Orientation
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Video Editing
                                                                                                                                </li>-->
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane" id="standard">
                                                                <div class="offer-bxs">
                                                                    <div class="offer-bxs-price">
                                                                        <span
                                                                            class="package-title-text"><?php echo e($recordInfo->standard_title); ?></span>
                                                                        <span
                                                                            class="package-price"><?php echo e(CURR . $recordInfo->standard_price); ?></span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        <?php echo e($recordInfo->standard_description); ?></p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time"><?php echo e($recordInfo->standard_delivery); ?>

                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            <?php echo e($recordInfo->standard_revision); ?> Revision
                                                                        </span>
                                                                        <ul class="buyables-offer">
                                                                            <!--                                                <li class="" >
                                                                                                                                    <i class="fa fa-check"></i>Background Music
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>3 Length Variations
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Scriptwriting
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>60 Seconds Running Time
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>1 Size Orientation
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Video Editing
                                                                                                                                </li>-->
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane" id="basic">
                                                                <div class="offer-bxs">
                                                                    <div class="offer-bxs-price">
                                                                        <span
                                                                            class="package-title-text"><?php echo e($recordInfo->basic_title); ?></span>
                                                                        <span
                                                                            class="package-price"><?php echo e(CURR . $recordInfo->basic_price); ?></span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        <?php echo e($recordInfo->basic_description); ?></p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time"><?php echo e($recordInfo->basic_delivery); ?>

                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            <?php echo e($recordInfo->basic_revision); ?> Revision
                                                                        </span>
                                                                        <ul class="buyables-offer">
                                                                            <!--                                                <li class="" >
                                                                                                                                    <i class="fa fa-check"></i>Background Music
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>3 Length Variations
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Scriptwriting
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>60 Seconds Running Time
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>1 Size Orientation
                                                                                                                                </li>
                                                                                                                                <li class="">
                                                                                                                                    <i class="fa fa-check"></i>Video Editing
                                                                                                                                </li>-->
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane" id="premium">
                                                                <div class="offer-bxs">
                                                                    <div class="offer-bxs-price">
                                                                        <span
                                                                            class="package-title-text"><?php echo e($recordInfo->premium_title); ?></span>
                                                                        <span
                                                                            class="package-price"><?php echo e(CURR . $recordInfo->premium_price); ?></span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        <?php echo e($recordInfo->premium_description); ?></p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time"><?php echo e($recordInfo->premium_delivery); ?>

                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            <?php echo e($recordInfo->premium_revision); ?> Revision
                                                                        </span>
                                                                        <ul class="buyables-offer">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php echo e(Form::open(['method' => 'post', 'id' => 'addggiform', 'class' => 'addggiform'])); ?>

                                                            <input type="hidden" name="type" id="settype"
                                                                value="basic">
                                                            <input type="hidden" name="slug" id="gigslug"
                                                                value="<?php echo e($recordInfo->slug); ?>">
                                                            <input type="hidden" name="examt" id="examt"
                                                                value="">
                                                            <input type=hidden id="extragig_idd" name="extragig_idd"
                                                                value="" />
                                                            <input type=hidden id="gigextra_rm" name="gigextra_rm"
                                                                value="" />
                                                            <div class="package-footer">
                                                                <p class="hidebtn" id="hidebtn">

                                                                    <?php if(Session::get('user_id') != $recordInfo->user_id): ?>

                                                                        <?php if($recordInfo->pause == 0 || $recordInfo->User->accept_orders == 0 || $recordInfo->User->hide_weekend == 1): ?>

                                                                            <?php
                                                                            $waitlist = $recordInfo->waitlist;
                                                                            
                                                                            $wait = explode(',', $waitlist);
                                                                            ?>

                                                                            <?php if(Session::get('user_id')): ?>
                                                                                <?php if(in_array(Session::get('user_id'), $wait)): ?>
                                                                                    <span
                                                                                        class="btn-lrg-standard btn-lrg-basc">Added
                                                                                        to Waiting
                                                                                        List</span>
                                                                                <?php else: ?>
                                                                                    <span class="btn-lrg-standard"
                                                                                        id="myBtn1"
                                                                                        onclick="submitwaitlist()"
                                                                                        id="waitlist">Add to Waiting
                                                                                        List</span>
                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                                <span class="btn-lrg-standard"
                                                                                    id="myBtn1"
                                                                                    onclick="submitwaitlist()"
                                                                                    id="waitlist">Add to Waiting
                                                                                    List</span>
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <span onclick="submitform()"
                                                                                class="btn-lrg-standard">Continue
                                                                                (<?php echo e(CURR); ?><span
                                                                                    class="js-str-currency"
                                                                                    id="btnprice"><?php echo e($recordInfo->basic_price); ?></span>)
                                                                            </span>

                                                                        <?php endif; ?>

                                                                    <?php endif; ?>

                                                                </p>
                                                                <div class="gigdloader" id="gigdloader">
                                                                    <?php echo e(HTML::image('public/img/loading.gif', SITE_TITLE)); ?>

                                                                </div>
                                                            </div>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>

                                                    </form>
                                                </div>
                                            </aside>
                                            <aside class="widget widget_1 widget_apus_service_author">
                                                <h2 class="widget-title"><span>About The Seller</span></h2>
                                                <div class="widget-service-author">
                                                    <div class="service-author-heading d-flex align-items-center">
                                                        <div class="service-author-image flex-shrink-0">
                                                            <?php if($userInfo->profile_image): ?>
                                                                <a
                                                                    href="<?php echo e(URL::to('public-profile/' . $userInfo->slug)); ?>">
                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                        <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $userInfo->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;'])); ?>

                                                                    </div>
                                                                </a>
                                                            <?php else: ?>
                                                                <a
                                                                    href="<?php echo e(URL::to('public-profile/' . $userInfo->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;'])); ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="service-author-right flex-grow-1">
                                                            <?php if($userInfo): ?>
                                                                <h5><a
                                                                        href="<?php echo e(URL::to('public-profile/' . $recordInfo->User->slug)); ?>">
                                                                        <?php echo e($userInfo->first_name); ?>

                                                                        <?php echo e($userInfo->last_name); ?> </a></h5>
                                                                <!-- job -->
                                                                <div class="freelancer-job">
                                                                    <?php echo e($userInfo->address); ?> </div>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="rating text-link">
                                                                        <?php echo e($userInfo->average_rating); ?></span>
                                                                    <span class="text">(<?php echo e($userInfo->total_review); ?>

                                                                        Review)</span>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="metas">
                                                        <?php if($userInfo): ?>
                                                            <div class="freelancer-location with-title">
                                                                <strong>Location:</strong>
                                                                <span>
                                                                    <?php
                                                                    $farray = [];
                                                                    if (isset($recordInfo->User->city) && $recordInfo->User->city != '') {
                                                                        $farray[] = $recordInfo->User->city;
                                                                    }
                                                                    if (isset($recordInfo->User->Country->name) && $recordInfo->User->Country->name != '') {
                                                                        $farray[] = $recordInfo->User->Country->name;
                                                                    }
                                                                    echo implode(', ', $farray);
                                                                    ?>
                                                                </span>
                                                            </div>
                                                            <div class="freelancer-salary with-title">
                                                                <strong>Member since:</strong>
                                                                <span><?php echo date('F Y', strtotime($recordInfo->User->created_at)); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    
                                                    <?php if(Session::get('user_id') != $recordInfo->user_id): ?>
                                                        <span class="contct_per_detail"><a href="javascript:void(0);"
                                                                class="btn-lrg-standard"
                                                                onclick='$("#info12").show();'data-toggle="modal"
                                                                data-target="#myModal">Contact
                                                                Seller</a></span>
                                                    <?php endif; ?>
                                                </div>

                                                
                                                <div class="modal fade publicprofile_modal" id="myModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-dialog_1" role="document">
                                                        <div class="modal-content">
                                                            <div class="nzwh-wrapper">
                                                                <fieldset class="nzwh">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel"> Send a
                                                                            Message</h4>
                                                                    </div>
                                                                    <div class="drt">
                                                                        <div class="right_pop">
                                                                            <div class="profile-img">
                                                                                <?php if($recordInfo->User->profile_image): ?>
                                                                                    <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->User->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

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
                                                                                            <?php echo e(Form::hidden('receiver_id', $recordInfo->User->id, ['id' => 'receiver_id'])); ?>

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
                                            </aside>
                                        </aside>
                                    </div>

                                </div>

                                <!-- service related -->
                                <div class="wrapper-services-related">
                                    <div class="related-posts">
                                        <h4 class="title_1">
                                            All Services </h4>
                                        <div class="widget-content">
                                            <div class="slick-carousel" data-carousel="slick" data-items="4"
                                                data-large="4" data-small="1" data-medium="2" data-slidestoscroll="4"
                                                data-slidestoscroll_smallmedium="4" data-slidestoscroll_extrasmall="1"
                                                data-pagination="false" data-nav="true" data-rows="1"
                                                data-infinite="false" data-autoplay="true">

                                                <?php $__empty_1 = true; $__currentLoopData = $gigcatlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <?php if(isset($allrecord->id)): ?>
                                                        <article
                                                            class="map-item service-item post-5555 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-development-it service_category-trending"
                                                            data-latitude="40.77936946417973"
                                                            data-longitude="-73.91536380670227"
                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service10-495x370.jpg"
                                                            data-logo="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service10-150x150.jpg"
                                                            style="width: 355px;height: 494px;">
                                                            <div class="position-relative">
                                                                <div class="service-image">
                                                                    <?php //echo '<pre>';print_r($allrecord->User->profile_image);
                                                                    ?>
                                                                    <?php if(isset($allrecord->name)): ?>
                                                                        <?php if(file_exists('public/files/gigs/full/' . $allrecord->name) && !empty($allrecord->name)): ?>
                                                                            <?php echo e(HTML::image('public/files/gigs/full/' . $allrecord->name, SITE_TITLE, ['style' => 'width:400px;height:260px'])); ?>

                                                                        <?php else: ?>
                                                                            <?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE, ['style' => 'width:400px;height:260px'])); ?>

                                                                        <?php endif; ?>
                                                                    <?php endif; ?>



                                                                    
                                                                </div>
                                                                <a class="btn-add-service-favorite" data-service_id="5557"
                                                                    data-nonce="a1a2911e0b" data-bs-toggle="tooltip">
                                                                    <?php echo $__env->make('elements.likeunlike', [
                                                                        'gid' => $allrecord->id,
                                                                    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                                    
                                                                    
                                                                </a>
                                                                
                                                                </a>
                                                            </div>

                                                            <div class="service-information">
                                                                <div class="category-service">
                                                                    <a href="<?php echo e(URL::to('public-profile/' . $allrecord->slug)); ?>"
                                                                        style=""><?php echo e($allrecord->first_name . ' ' . $allrecord->last_name); ?></a>
                                                                </div>

                                                                <h2 class="service-title" style="height: 58px;">
                                                                    <?php echo e(mb_substr($allrecord->title, 0, 40)); ?>

                                                                </h2>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span
                                                                        class="rating"><?php echo e($allrecord->average_rating); ?></span>
                                                                    <span class="text">(<?php echo e($allrecord->total_review); ?>

                                                                        Review)</span>
                                                                </div>
                                                                <div class="info-bottom d-flex align-items-center">
                                                                    <div class="service-author">
                                                                        <a
                                                                            href="<?php echo e(URL::to('public-profile/' . $allrecord->slug)); ?>">
                                                                            <div
                                                                                class="freelancer-logo d-flex align-items-center">
                                                                                <?php //echo '<pre>';print_r($allrecord->User->profile_image);
                                                                                ?>
                                                                                <?php if(isset($allrecord->profile_image)): ?>
                                                                                    <?php if(file_exists('public/files/users/full/' . $allrecord->profile_image) && !empty($allrecord->profile_image)): ?>
                                                                                        <?php echo e(HTML::image('public/files/users/full/' . $allrecord->profile_image, SITE_TITLE)); ?>

                                                                                    <?php else: ?>
                                                                                        <?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?>

                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                                
                                                                            </div>
                                                                            <span class="text">
                                                                                <?php echo e($allrecord->first_name . ' ' . $allrecord->last_name); ?></span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="ms-auto">
                                                                        <div class="service-salary with-title">
                                                                            <span class="text">Starting at:</span>
                                                                            <span><span
                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span><?php echo e($allrecord->basic_price); ?></bdi></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article><!-- #post-## -->
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <div class="no_record">No more records found.</div>
                                                <?php endif; ?>


                                                



                                                

                                            </div>
                                        </div>
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
        function updateprice(price, ptype) {
            $('#btnprice').html(price);
            $('#settype').val(ptype);
            $('#btnprice_1').html(price);
            $('#settype_1').val(ptype);
        }

        function submitwaitlist() {

            <?php if(!Session::get('user_id')): ?>

                //            alert('<?php //echo __("message.Your must login to place your order.");
                ?>');
                // Get the modal

                var modal = document.getElementById("myModallogin");
                // Get the button that opens the modal

                var btn = document.getElementById("myBtn1");

                // Get the button that opens the modal for mobile
                var btn = document.getElementById("myBtn1_1");

                // Get the <span> element that closes the modal

                var span = document.getElementsByClassName("close")[0];
                // When the user clicks the button, open the modal 



                modal.style.display = "block";
                // When the user clicks on <span> (x), close the modal

                span.onclick = function() {

                    modal.style.display = "none";
                }



                // When the user clicks anywhere outside of the modal, close it

                window.onclick = function(event) {

                    if (event.target == modal) {

                        modal.style.display = "none";
                    }

                }
            <?php else: ?>

                $.ajax({

                    url: "<?php echo HTTP_PATH; ?>/gigs/addwaitlist",
                    type: "POST",
                    //data: $('#addggiform').serialize(),

                    data: {
                        'user_id': '<?php echo $recordInfo->user_id;
                        ?>',
                        'gig_id': '<?php echo $recordInfo->id;
                        ?>',
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    beforeSend: function() {
                        $("#gigdloader").show();
                        $(".hidebtn").hide();
                    },
                    complete: function() {
                        $("#gigdloader").hide();
                        $(".hidebtn").show();
                    },
                    success: function(result) {

                        $('.hidebtn').html(
                            '<span class="btn-lrg-standard btn-lrg-basc" >Added to Waiting List</span>')

                    }

                });
            <?php endif; ?>

        }
        //    
        function submitform() {
            <?php if(!Session::get('user_id')): ?>
                alert('Your must login to place your order.');
            <?php else: ?>
                $.ajax({
                    url: "<?php echo HTTP_PATH; ?>/payments/addtocart",
                    type: "POST",
                    data: $('.addggiform').serialize(),
                    //data: { _token: '<?php echo e(csrf_token()); ?>'},
                    beforeSend: function() {
                        $(".gigdloader").show();
                        $(".hidebtn").hide();
                    },
                    success: function(result) {
                        window.location = "<?php echo HTTP_PATH; ?>/order-summary/" + result;
                    }
                });
            <?php endif; ?>
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $("#maraction").click(function() {
            $("#offer-show").addClass("offer-div");
            $(".dashboard-rights-section").removeClass("offer-div");
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
    <script type="text/javascript">
        $(document).ready(function($) {
            $("#contactmessage").validate();
            $("#contactmessage_1").validate();
            $('.close_image').hide();
            $('a[rel*=facebox]').facebox({
                closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
            });
        });
    </script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>