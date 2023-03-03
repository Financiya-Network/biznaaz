@extends('layouts.dashboard')
@section('content')
    {{ HTML::script('public/js/facebox.js') }}
    {{ HTML::style('public/css/facebox.css') }}
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
                                                        <li><a href="{{ URL::to('index1') }}">Home</a> </li>
                                                        <li><a href="#">Services</a></li>
                                                        @if (isset($recordInfo) && !empty($recordInfo))
                                                            <li><span class="active">{{ $recordInfo->title }}</span></li>
                                                        @else
                                                            Refine Result
                                                        @endif
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

                                                    @if ($siteSettings->facebook_link)
                                                        <a href="{!! $siteSettings->facebook_link !!}" target="_blank">
                                                            <i class="fab fa-facebook-f"></i> </a>
                                                    @endif
                                                    @if ($siteSettings->twitter_link)
                                                        <a href="{!! $siteSettings->twitter_link !!}" target="_blank">
                                                            <i class="fab fa-twitter"></i> </a>
                                                    @endif
                                                    @if ($siteSettings->linkedin_link)
                                                        <a href="{!! $siteSettings->linkedin_link !!}" target="_blank">
                                                            <i class="fab fa-linkedin-in"></i> </a>
                                                    @endif

                                                    @if ($siteSettings->instagram_link)
                                                        <a href="{!! $siteSettings->instagram_link !!}" target="_blank">
                                                            <i class="fab fa-instagram"></i> </a>
                                                    @endif
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
                                                @if (isset($recordInfo) && !empty($recordInfo))
                                                    <h1 class="service-detail-title">{{ $recordInfo->title }}</h1> <span
                                                        class="flex-shrink-0"></span>
                                                @else
                                                    Refine Result
                                                @endif
                                            </div>
                                            <div class="service-metas-detail d-flex align-items-center flex-wrap">
                                                <div class="service-author">
                                                    @if ($userInfo->profile_image)
                                                        <a href="{{ URL::to('public-profile/' . $userInfo->slug) }}">
                                                            <div class="freelancer-logo d-flex align-items-center">
                                                                {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $userInfo->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;']) }}
                                                            </div>
                                                            <span class="text">
                                                                {{ $userInfo->first_name }}
                                                                {{ $userInfo->last_name }}</span>
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ URL::to('public-profile/' . $userInfo->slug) }}">{{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;']) }}</a>
                                                    @endif
                                                </div>
                                                <div class="rating-reviews">
                                                    <i class="fa fa-star"></i>
                                                    @if ($userInfo)
                                                        <span class="rating"> {{ $userInfo->average_rating }}</span>
                                                        <span class="text">({{ $userInfo->total_review }} Reviews)</span>
                                                    @endif
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
                                                            @if ($recordInfo)
                                                                <div class="value">
                                                                    {{ $recordInfo->basic_delivery }} Days </div>
                                                            @endif
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
                                                                    @if ($userInfo)
                                                                        <a href="#">{{ $userInfo->city }}</a>
                                                                    @endif
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
                                                        @foreach ($recordInfo->Image as $gigimage)
                                                            @if (isset($gigimage->name) && !empty($gigimage->name))
                                                                <div class="item">
                                                                    {{-- <a href="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service12.jpg"
                                                                        data-elementor-lightbox-slideshow="freeio-gallery"
                                                                        class="p-popup-image"> --}}
                                                                    <div class="image-wrapper">
                                                                        {{ HTML::image(GIG_FULL_DISPLAY_PATH . $gigimage->name, SITE_TITLE, ['title' => $recordInfo->title, 'class' => 'attachment-xx1x1 size-xx1x1', 'style' => 'margin-inline: 100px;']) }}
                                                                    </div>
                                                                    {{-- </a> --}}
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="slick-carousel slick-carousel-gallery-thumbs d-none d-md-block"
                                                    data-carousel="slick" data-items="6" data-large="5" data-medium="4"
                                                    data-small="3" data-smallest="2" data-pagination="false"
                                                    data-nav="false" data-autoplay="false"
                                                    data-asnavfor=".slick-carousel-gallery-main" data-slidestoscroll="1"
                                                    data-focusonselect="true">
                                                    @foreach ($recordInfo->Image as $gigimage)
                                                        @if (isset($gigimage->name) && !empty($gigimage->name))
                                                            <div class="item">
                                                                <div class="image-wrapper">
                                                                    {{ HTML::image(GIG_FULL_DISPLAY_PATH . $gigimage->name, SITE_TITLE, ['title' => $recordInfo->title, 'class' => 'attachment-xx1x1 size-xx1x1']) }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>


                                            </div>
                                            <!-- service description -->
                                            <div class="service-detail-description">
                                                <h3 class="title">Service Description</h3>
                                                {!! nl2br($recordInfo->description) !!}
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
                                            @if (!empty($recordInfo->Gigfaq) && count($recordInfo->Gigfaq) > 0)
                                                <div id="service-detail-faq" class="service-detail-faq">
                                                    <div class="inner">
                                                        <h4 class="title_1">Frequently Asked Questions</h4>
                                                        <div class="panel-group" id="service-faq-accordion"
                                                            role="tablist" aria-multiselectable="true">
                                                            @foreach ($recordInfo->Gigfaq as $key => $gigfaq)
                                                                <div class="accordion-item accordion-item-faq">
                                                                    <h4 class="accordion-header">
                                                                        <a class="accordion-button collapsed collapse-top"
                                                                            role="button" data-bs-toggle="collapse"
                                                                            data-bs-parent="#service-faq-accordion"
                                                                            href="#service-faq-collapse-{{ $key }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="service-faq-collapse-{{ $key }}">
                                                                            {{ $gigfaq->question }} </a>
                                                                    </h4>
                                                                    <div id="service-faq-collapse-{{ $key }}"
                                                                        class="accordion-collapse collapse  collapse-bottom"
                                                                        role="tabpanel" aria-labelledby="heading-{{ $key }}">
                                                                        <div class="accordion-body">
                                                                            <div class="description">{{ $gigfaq->answer }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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
                                                                            onclick="updateprice('{{ $recordInfo->basic_price }}', 'basic')">Basic</a>
                                                                    </li>
                                                                    <li role="presentation"><a href="#standard_1"
                                                                            aria-controls="standard" role="tab"
                                                                            data-toggle="tab"
                                                                            onclick="updateprice('{{ $recordInfo->standard_price }}', 'standard')">Standard</a>
                                                                    </li>
                                                                    <li role="presentation"><a href="#premium_1"
                                                                            aria-controls="premium" role="tab"
                                                                            data-toggle="tab"
                                                                            onclick="updateprice('{{ $recordInfo->premium_price }}', 'premium')">Premium</a>
                                                                    </li>
                                                                </ul>

                                                                <!-- Tab panes -->
                                                                <div class="tab-content">
                                                                    <div role="tabpanel" class="tab-pane active"
                                                                        id="basic_1">
                                                                        <div class="offer-bxs">
                                                                            <div class="offer-bxs-price">
                                                                                <span
                                                                                    class="package-title-text">{{ $recordInfo->basic_title }}</span>
                                                                                <span
                                                                                    class="package-price">{{ CURR . $recordInfo->basic_price }}</span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                {{ $recordInfo->basic_description }}</p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time">{{ $recordInfo->basic_delivery }}
                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    {{ $recordInfo->basic_revision }}
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
                                                                                    class="package-title-text">{{ $recordInfo->standard_title }}</span>
                                                                                <span
                                                                                    class="package-price">{{ CURR . $recordInfo->standard_price }}</span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                {{ $recordInfo->standard_description }}</p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time">{{ $recordInfo->standard_delivery }}
                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    {{ $recordInfo->standard_revision }}
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
                                                                                    class="package-title-text">{{ $recordInfo->basic_title }}</span>
                                                                                <span
                                                                                    class="package-price">{{ CURR . $recordInfo->basic_price }}</span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                {{ $recordInfo->basic_description }}</p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time">{{ $recordInfo->basic_delivery }}
                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    {{ $recordInfo->basic_revision }}
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
                                                                                    class="package-title-text">{{ $recordInfo->premium_title }}</span>
                                                                                <span
                                                                                    class="package-price">{{ CURR . $recordInfo->premium_price }}</span>
                                                                            </div>
                                                                            <p class="package-description">
                                                                                {{ $recordInfo->premium_description }}</p>
                                                                            <div class="offers-details">
                                                                                <span class="offer-icons">
                                                                                    <i class="fas fa-clock fa-lg"></i>
                                                                                    <span
                                                                                        class="delivery-time">{{ $recordInfo->premium_delivery }}
                                                                                        days</span>
                                                                                    Delivery
                                                                                </span>
                                                                                <span class="offer-icons">
                                                                                    <i class='fas fa-sync'></i>
                                                                                    {{ $recordInfo->premium_revision }}
                                                                                    Revision
                                                                                </span>
                                                                                <ul class="buyables-offer">

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{ Form::open(['method' => 'post', 'id' => 'addggiform_1', 'class' => 'addggiform']) }}
                                                                    <input type="hidden" name="type" id="settype_1"
                                                                        value="basic">
                                                                    <input type="hidden" name="slug" id="gigslug_1"
                                                                        value="{{ $recordInfo->slug }}">
                                                                    <input type="hidden" name="examt" id="examt_1"
                                                                        value="">
                                                                    <input type=hidden id="extragig_idd_1"
                                                                        name="extragig_idd" value="" />
                                                                    <input type=hidden id="gigextra_rm_1"
                                                                        name="gigextra_rm" value="" />
                                                                    <div class="package-footer">
                                                                        <p class="hidebtn" id="hidebtn_1">

                                                                            @if (Session::get('user_id') != $recordInfo->user_id)

                                                                                @if ($recordInfo->pause == 0 || $recordInfo->User->accept_orders == 0 || $recordInfo->User->hide_weekend == 1)

                                                                                    <?php
                                                                                    $waitlist = $recordInfo->waitlist;
                                                                                    
                                                                                    $wait = explode(',', $waitlist);
                                                                                    ?>

                                                                                    @if (Session::get('user_id'))
                                                                                        @if (in_array(Session::get('user_id'), $wait))
                                                                                            <span
                                                                                                class="btn-lrg-standard btn-lrg-basc">Added
                                                                                                to Waiting
                                                                                                List</span>
                                                                                        @else
                                                                                            <span class="btn-lrg-standard"
                                                                                                id="myBtn1_1"
                                                                                                onclick="submitwaitlist()"
                                                                                                id="waitlist_1">Add to
                                                                                                Waiting
                                                                                                List</span>
                                                                                        @endif
                                                                                    @else
                                                                                        <span class="btn-lrg-standard"
                                                                                            id="myBtn1_1"
                                                                                            onclick="submitwaitlist()"
                                                                                            id="waitlist">Add to Waiting
                                                                                            List</span>
                                                                                    @endif
                                                                                @else
                                                                                    <span onclick="submitform()"
                                                                                        class="btn-lrg-standard">Continue
                                                                                        ({{ CURR }}<span
                                                                                            class="js-str-currency"
                                                                                            id="btnprice_1">{{ $recordInfo->basic_price }}</span>)
                                                                                    </span>

                                                                                @endif

                                                                            @endif

                                                                        </p>
                                                                        <div class="gigdloader" id="gigdloader_1">
                                                                            {{ HTML::image('public/img/loading.gif', SITE_TITLE) }}
                                                                        </div>
                                                                    </div>
                                                                    {{ Form::close() }}
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </aside>
                                                    <aside class="widget widget_1 widget_apus_service_author">
                                                        <h2 class="widget-title"><span>About The Seller</span></h2>
                                                        <div class="widget-service-author">
                                                            <div class="service-author-heading d-flex align-items-center">
                                                                <div class="service-author-image flex-shrink-0">
                                                                    @if ($userInfo->profile_image)
                                                                        <a
                                                                            href="{{ URL::to('public-profile/' . $userInfo->slug) }}">
                                                                            <div
                                                                                class="freelancer-logo d-flex align-items-center">
                                                                                {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $userInfo->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;']) }}
                                                                            </div>
                                                                        </a>
                                                                    @else
                                                                        <a
                                                                            href="{{ URL::to('public-profile/' . $userInfo->slug) }}">{{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;']) }}</a>
                                                                    @endif
                                                                </div>
                                                                <div class="service-author-right flex-grow-1">
                                                                    @if ($userInfo)
                                                                        <h5><a
                                                                                href="{{ URL::to('public-profile/' . $recordInfo->User->slug) }}">
                                                                                {{ $userInfo->first_name }}
                                                                                {{ $userInfo->last_name }} </a></h5>
                                                                        <!-- job -->
                                                                        <div class="freelancer-job">
                                                                            {{ $userInfo->address }}</div>
                                                                        <div class="rating-reviews">
                                                                            <i class="fa fa-star"></i>
                                                                            <span
                                                                                class="rating text-link">{{ $userInfo->average_rating }}</span>
                                                                            <span
                                                                                class="text">({{ $userInfo->total_review }}
                                                                                Review)</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="metas">
                                                                @if ($userInfo)
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
                                                                @endif
                                                            </div>

                                                            {{-- <a href="#apus-contact-form-wrapper"
                                                                class="btn btn-theme btn-outline w-100 btn-service-contact-form btn-show-popup">Contact
                                                                Me <i class="flaticon-right-up next"></i></a> --}}
                                                            @if (Session::get('user_id') != $recordInfo->user_id)
                                                                <span class="contct_per_detail"><a
                                                                        href="javascript:void(0);"
                                                                        class="btn-lrg-standard"
                                                                        onclick='$("#info12").show();'data-toggle="modal"
                                                                        data-target="#myModal_mobile">Contact
                                                                        Seller</a></span>
                                                            @endif
                                                        </div>

                                                        {{-- <div id="apus-contact-form-wrapper"
                                                            class="apus-contact-form mfp-hide apus-popup-form"
                                                            data-effect="fadeIn">

                                                            <a href="javascript:void(0);"
                                                                class="close-magnific-popup ali-right"><i
                                                                    class="ti-close"></i></a>

                                                            <form method="post" action="?"
                                                                class="contact-form-wrapper">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="subject" placeholder="Subject"
                                                                                required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="email" class="form-control"
                                                                                name="email" placeholder="E-mail"
                                                                                required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                class="form-control style2" name="phone"
                                                                                placeholder="Phone" required="required">
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                                </div><!-- /.form-group -->


                                                                <input type="hidden" name="post_id" value="5557">
                                                                <button class="button btn btn-theme btn-outline w-100"
                                                                    name="contact-form">Send Message<i
                                                                        class="flaticon-right-up next"></i></button>
                                                            </form>
                                                        </div> --}}

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
                                                                                        @if ($recordInfo->User->profile_image)
                                                                                            {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->User->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
                                                                                        @else
                                                                                            {{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}
                                                                                        @endif
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
                                                                                        {{ Form::open(['method' => 'post', 'id' => 'contactmessage_1', 'url' => 'users/messageuser', 'enctype' => 'multipart/form-data']) }}
                                                                                        <div class="contact_div">
                                                                                            {{ Form::textarea('message', '', ['class' => 'form-control required', 'placeholder' => '', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id' => 'messageid_mobile', 'onkeyup' => 'countCharmobile()']) }}
                                                                                            <div class="sec_blw_top">
                                                                                                <div class="sec_blw">
                                                                                                    <span
                                                                                                        id="charcount_mobile">0/2500</span>
                                                                                                    <span class="right_sp">
                                                                                                        {{ Form::file('attachment', ['class' => 'form-control', 'accept' => 'image/png']) }}
                                                                                                    </span>
                                                                                                </div>
                                                                                                <div class="upbtn">
                                                                                                    {{ Form::hidden('receiver_id', $recordInfo->User->id, ['id' => 'receiver_id']) }}
                                                                                                    <!--<button type="button" class="succbtn" id="succbtnbtn">Send</button>-->
                                                                                                    {{ Form::submit('Send', ['class' => 'succbtn', 'id' => 'succbtnbtn']) }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{ Form::close() }}
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
                                            {{-- <div id="reviews">

                                                <div class="box-info-white max-780">
                                                    @if ($userInfo)
                                                        <h3 class="title">{{ $userInfo->total_review }} Reviews</h3>

                                                        <div class="d-md-flex align-items-center">
                                                            <div
                                                                class="detail-average-rating flex-column d-flex align-items-center justify-content-center">
                                                                <div class="average-value">{{ $userInfo->average_rating }}
                                                                </div>
                                                                <div class="average-star">
                                                                    <div class="review-stars-rated-wrapper">
                                                                        <div class="review-stars-rated">
                                                                            <ul class="review-stars">
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                            </ul>

                                                                            <ul class="review-stars filled"
                                                                                style="width: 90%">
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                                <li><span class="fa fa-star"></span></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="total-rating">
                                                                    {{ $userInfo->total_review }} ratings </div>
                                                            </div>

                                                            <div class="detail-rating">
                                                                <div class="item-rating">
                                                                    <div class="list-rating">

                                                                        <div class="value-content">
                                                                            <div class="list-number">
                                                                                5 Star </div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 50%">
                                                                                </div>
                                                                            </div>
                                                                            <div class="value">
                                                                                60% </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-rating">
                                                                    <div class="list-rating">

                                                                        <div class="value-content">
                                                                            <div class="list-number">
                                                                                4 Star </div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 50%">
                                                                                </div>
                                                                            </div>
                                                                            <div class="value">
                                                                                50% </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-rating">
                                                                    <div class="list-rating">

                                                                        <div class="value-content">
                                                                            <div class="list-number">
                                                                                3 Star </div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 0%">
                                                                                </div>
                                                                            </div>
                                                                            <div class="value">
                                                                                0% </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-rating">
                                                                    <div class="list-rating">

                                                                        <div class="value-content">
                                                                            <div class="list-number">
                                                                                2 Star </div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 0%">
                                                                                </div>
                                                                            </div>
                                                                            <div class="value">
                                                                                0% </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item-rating">
                                                                    <div class="list-rating">

                                                                        <div class="value-content">
                                                                            <div class="list-number">
                                                                                1 Star </div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 0%">
                                                                                </div>
                                                                            </div>
                                                                            <div class="value">
                                                                                0% </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div id="comments">

                                                    <ol class="comment-list">
                                                        <li class="comment byuser comment-author-admin even thread-even depth-1"
                                                            id="li-comment-38">

                                                            <div id="comment-38" class="the-comment ">
                                                                <div class="avatar">
                                                                    <img alt=''
                                                                        src='https://secure.gravatar.com/avatar/87250bdf8483607f9d96cc0f31293e83?s=80&#038;d=mm&#038;r=g'
                                                                        srcset='https://secure.gravatar.com/avatar/87250bdf8483607f9d96cc0f31293e83?s=160&#038;d=mm&#038;r=g 2x'
                                                                        class='avatar avatar-80 photo' height='80'
                                                                        width='80' loading='lazy' decoding='async' />
                                                                </div>
                                                                <div class="comment-box">
                                                                    <div class="clearfix">
                                                                        <div class="name-comment">
                                                                            admin </div>
                                                                        <div class="meta d-flex align-items-center">
                                                                            <div class="star-rating"
                                                                                title="Rated 4 out of 5">
                                                                                <span class="review-avg"><i
                                                                                        class="fa fa-star"></i>4.0</span>
                                                                            </div>
                                                                            <div class="date">
                                                                                November 9, 2022 </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div itemprop="description" class="comment-text">
                                                                    <p>Nemo enim ipsam voluptatem quia voluptas sit
                                                                        aspernatur aut odit aut fugit, sed quia consequuntur
                                                                        magni dolores eos qui ratione voluptatem sequi
                                                                        nesciunt.</p>
                                                                </div>
                                                            </div>
                                                        </li><!-- #comment-## -->
                                                        <li class="comment byuser comment-author-alitufan odd alt thread-odd thread-alt depth-1"
                                                            id="li-comment-72">

                                                            <div id="comment-72" class="the-comment ">
                                                                <div class="avatar">
                                                                    <img alt=''
                                                                        src='https://secure.gravatar.com/avatar/a16e041bc8c8688b26ffa5b21b0fe763?s=80&#038;d=mm&#038;r=g'
                                                                        srcset='https://secure.gravatar.com/avatar/a16e041bc8c8688b26ffa5b21b0fe763?s=160&#038;d=mm&#038;r=g 2x'
                                                                        class='avatar avatar-80 photo' height='80'
                                                                        width='80' loading='lazy' decoding='async' />
                                                                </div>
                                                                <div class="comment-box">
                                                                    <div class="clearfix">
                                                                        <div class="name-comment">
                                                                            Ali Tufan </div>
                                                                        <div class="meta d-flex align-items-center">
                                                                            <div class="star-rating"
                                                                                title="Rated 5 out of 5">
                                                                                <span class="review-avg"><i
                                                                                        class="fa fa-star"></i>5.0</span>
                                                                            </div>
                                                                            <div class="date">
                                                                                November 16, 2022 </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div itemprop="description" class="comment-text">
                                                                    <p>Nemo enim ipsam voluptatem quia voluptas sit
                                                                        aspernatur aut odit aut fugit, sed quia consequuntur
                                                                        magni dolores eos qui ratione voluptatem sequi
                                                                        nesciunt.</p>
                                                                </div>
                                                            </div>
                                                        </li><!-- #comment-## -->
                                                    </ol>


                                                </div>


                                                <div id="review_form_wrapper" class="commentform ">
                                                    <div id="review_form">
                                                        <div class="commentform reset-button-default">
                                                            <div class="clearfix">
                                                                <div id="respond" class="comment-respond">
                                                                    <h4 class="title comment-reply-title">Add a review
                                                                        <small><a rel="nofollow"
                                                                                id="cancel-comment-reply-link"
                                                                                href="/freeio/service/web-development-with-html-css-javascript-and-php/#respond"
                                                                                style="display:none;">Cancel
                                                                                reply</a></small>
                                                                    </h4>
                                                                    <form
                                                                        action="https://demoapus1.com/freeio/wp-comments-post.php"
                                                                        method="post" id="commentform"
                                                                        enctype="multipart/form-data" class="comment-form"
                                                                        novalidate>
                                                                        <div class="choose-rating clearfix">
                                                                            <div class="choose-rating-inner row">
                                                                                <div class="col-sm-12 col-xs-12">
                                                                                    <div class="form-group yourview">
                                                                                        <div class="your-rating">Your
                                                                                            Rating for this listing</div>
                                                                                        <div class="wrapper-rating-form">
                                                                                            <div
                                                                                                class="comment-form-rating">
                                                                                                <ul class="review-stars">
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <ul
                                                                                                    class="review-stars filled">
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                    <li><span
                                                                                                            class="fa fa-star"></span>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <input type="hidden"
                                                                                                    value="5"
                                                                                                    name="rating"
                                                                                                    id="_input_rating">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="group-upload-preview clearfix"></div>
                                                                        <div class="form-group space-30"><label>Your
                                                                                Comment</label>
                                                                            <textarea id="comment" class="form-control" placeholder="Comment" name="comment" cols="45" rows="5"
                                                                                aria-required="true" required></textarea>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12 col-sm-6">
                                                                                <div class="form-group"><label>Your
                                                                                        Name</label><input id="author"
                                                                                        placeholder="Name"
                                                                                        class="form-control"
                                                                                        name="author" type="text"
                                                                                        value="" size="30"
                                                                                        aria-required="true" /></div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-6">
                                                                                <div class="form-group"><label>Your
                                                                                        Email</label><input id="email"
                                                                                        placeholder="Email"
                                                                                        class="form-control"
                                                                                        name="email" type="text"
                                                                                        value="" size="30"
                                                                                        aria-required="true" /></div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="comment-form-cookies-consent"><input
                                                                                id="wp-comment-cookies-consent"
                                                                                name="wp-comment-cookies-consent"
                                                                                type="checkbox" value="yes" /> <label
                                                                                for="wp-comment-cookies-consent">Save my
                                                                                name, email, and website in this browser for
                                                                                the next time I comment.</label></p>
                                                                        <p class="form-submit"><input name="submit"
                                                                                type="submit" id="submit"
                                                                                class="btn btn-theme btn-inverse"
                                                                                value="Submit Review" /> <input
                                                                                type='hidden' name='comment_post_ID'
                                                                                value='5557' id='comment_post_ID' />
                                                                            <input type='hidden' name='comment_parent'
                                                                                id='comment_parent' value='0' />
                                                                        </p>
                                                                    </form>
                                                                </div><!-- #respond -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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
                                                                    onclick="updateprice('{{ $recordInfo->basic_price }}', 'basic')">Basic</a>
                                                            </li>
                                                            <li role="presentation"><a href="#standard"
                                                                    aria-controls="standard" role="tab"
                                                                    data-toggle="tab"
                                                                    onclick="updateprice('{{ $recordInfo->standard_price }}', 'standard')">Standard</a>
                                                            </li>
                                                            <li role="presentation"><a href="#premium"
                                                                    aria-controls="premium" role="tab"
                                                                    data-toggle="tab"
                                                                    onclick="updateprice('{{ $recordInfo->premium_price }}', 'premium')">Premium</a>
                                                            </li>
                                                        </ul>

                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <div role="tabpanel" class="tab-pane active" id="basic">
                                                                <div class="offer-bxs">
                                                                    <div class="offer-bxs-price">
                                                                        <span
                                                                            class="package-title-text">{{ $recordInfo->basic_title }}</span>
                                                                        <span
                                                                            class="package-price">{{ CURR . $recordInfo->basic_price }}</span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        {{ $recordInfo->basic_description }}</p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time">{{ $recordInfo->basic_delivery }}
                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            {{ $recordInfo->basic_revision }} Revision
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
                                                                            class="package-title-text">{{ $recordInfo->standard_title }}</span>
                                                                        <span
                                                                            class="package-price">{{ CURR . $recordInfo->standard_price }}</span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        {{ $recordInfo->standard_description }}</p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time">{{ $recordInfo->standard_delivery }}
                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            {{ $recordInfo->standard_revision }} Revision
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
                                                                            class="package-title-text">{{ $recordInfo->basic_title }}</span>
                                                                        <span
                                                                            class="package-price">{{ CURR . $recordInfo->basic_price }}</span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        {{ $recordInfo->basic_description }}</p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time">{{ $recordInfo->basic_delivery }}
                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            {{ $recordInfo->basic_revision }} Revision
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
                                                                            class="package-title-text">{{ $recordInfo->premium_title }}</span>
                                                                        <span
                                                                            class="package-price">{{ CURR . $recordInfo->premium_price }}</span>
                                                                    </div>
                                                                    <p class="package-description">
                                                                        {{ $recordInfo->premium_description }}</p>
                                                                    <div class="offers-details">
                                                                        <span class="offer-icons">
                                                                            <i class="fas fa-clock fa-lg"></i>
                                                                            <span
                                                                                class="delivery-time">{{ $recordInfo->premium_delivery }}
                                                                                days</span>
                                                                            Delivery
                                                                        </span>
                                                                        <span class="offer-icons">
                                                                            <i class='fas fa-sync'></i>
                                                                            {{ $recordInfo->premium_revision }} Revision
                                                                        </span>
                                                                        <ul class="buyables-offer">

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{ Form::open(['method' => 'post', 'id' => 'addggiform', 'class' => 'addggiform']) }}
                                                            <input type="hidden" name="type" id="settype"
                                                                value="basic">
                                                            <input type="hidden" name="slug" id="gigslug"
                                                                value="{{ $recordInfo->slug }}">
                                                            <input type="hidden" name="examt" id="examt"
                                                                value="">
                                                            <input type=hidden id="extragig_idd" name="extragig_idd"
                                                                value="" />
                                                            <input type=hidden id="gigextra_rm" name="gigextra_rm"
                                                                value="" />
                                                            <div class="package-footer">
                                                                <p class="hidebtn" id="hidebtn">

                                                                    @if (Session::get('user_id') != $recordInfo->user_id)

                                                                        @if ($recordInfo->pause == 0 || $recordInfo->User->accept_orders == 0 || $recordInfo->User->hide_weekend == 1)

                                                                            <?php
                                                                            $waitlist = $recordInfo->waitlist;
                                                                            
                                                                            $wait = explode(',', $waitlist);
                                                                            ?>

                                                                            @if (Session::get('user_id'))
                                                                                @if (in_array(Session::get('user_id'), $wait))
                                                                                    <span
                                                                                        class="btn-lrg-standard btn-lrg-basc">Added
                                                                                        to Waiting
                                                                                        List</span>
                                                                                @else
                                                                                    <span class="btn-lrg-standard"
                                                                                        id="myBtn1"
                                                                                        onclick="submitwaitlist()"
                                                                                        id="waitlist">Add to Waiting
                                                                                        List</span>
                                                                                @endif
                                                                            @else
                                                                                <span class="btn-lrg-standard"
                                                                                    id="myBtn1"
                                                                                    onclick="submitwaitlist()"
                                                                                    id="waitlist">Add to Waiting
                                                                                    List</span>
                                                                            @endif
                                                                        @else
                                                                            <span onclick="submitform()"
                                                                                class="btn-lrg-standard">Continue
                                                                                ({{ CURR }}<span
                                                                                    class="js-str-currency"
                                                                                    id="btnprice">{{ $recordInfo->basic_price }}</span>)
                                                                            </span>

                                                                        @endif

                                                                    @endif

                                                                </p>
                                                                <div class="gigdloader" id="gigdloader">
                                                                    {{ HTML::image('public/img/loading.gif', SITE_TITLE) }}
                                                                </div>
                                                            </div>
                                                            {{ Form::close() }}
                                                        </div>

                                                    </form>
                                                </div>
                                            </aside>
                                            <aside class="widget widget_1 widget_apus_service_author">
                                                <h2 class="widget-title"><span>About The Seller</span></h2>
                                                <div class="widget-service-author">
                                                    <div class="service-author-heading d-flex align-items-center">
                                                        <div class="service-author-image flex-shrink-0">
                                                            @if ($userInfo->profile_image)
                                                                <a
                                                                    href="{{ URL::to('public-profile/' . $userInfo->slug) }}">
                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                        {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $userInfo->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;']) }}
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a
                                                                    href="{{ URL::to('public-profile/' . $userInfo->slug) }}">{{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;']) }}</a>
                                                            @endif
                                                        </div>
                                                        <div class="service-author-right flex-grow-1">
                                                            @if ($userInfo)
                                                                <h5><a
                                                                        href="{{ URL::to('public-profile/' . $recordInfo->User->slug) }}">
                                                                        {{ $userInfo->first_name }}
                                                                        {{ $userInfo->last_name }} </a></h5>
                                                                <!-- job -->
                                                                <div class="freelancer-job">
                                                                    {{ $userInfo->address }} </div>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="rating text-link">
                                                                        {{ $userInfo->average_rating }}</span>
                                                                    <span class="text">({{ $userInfo->total_review }}
                                                                        Review)</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="metas">
                                                        @if ($userInfo)
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
                                                        @endif
                                                    </div>

                                                    {{-- <a href="#apus-contact-form-wrapper"
                                                        class="btn btn-theme btn-outline w-100 btn-service-contact-form btn-show-popup">Contact
                                                        Me <i class="flaticon-right-up next"></i></a> --}}
                                                    @if (Session::get('user_id') != $recordInfo->user_id)
                                                        <span class="contct_per_detail"><a href="javascript:void(0);"
                                                                class="btn-lrg-standard"
                                                                onclick='$("#info12").show();'data-toggle="modal"
                                                                data-target="#myModal">Contact
                                                                Seller</a></span>
                                                    @endif
                                                </div>

                                                {{-- <div id="apus-contact-form-wrapper"
                                                    class="apus-contact-form mfp-hide apus-popup-form"
                                                    data-effect="fadeIn">

                                                    <a href="javascript:void(0);"
                                                        class="close-magnific-popup ali-right"><i
                                                            class="ti-close"></i></a>

                                                    <form method="post" action="?" class="contact-form-wrapper">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="subject" placeholder="Subject"
                                                                        required="required">
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control"
                                                                        name="email" placeholder="E-mail"
                                                                        required="required">
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control style2"
                                                                        name="phone" placeholder="Phone"
                                                                        required="required">
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                        </div><!-- /.form-group -->


                                                        <input type="hidden" name="post_id" value="5557">
                                                        <button class="button btn btn-theme btn-outline w-100"
                                                            name="contact-form">Send Message<i
                                                                class="flaticon-right-up next"></i></button>
                                                    </form>
                                                </div> --}}
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
                                                                                @if ($recordInfo->User->profile_image)
                                                                                    {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->User->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
                                                                                @else
                                                                                    {{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}
                                                                                @endif
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
                                                                                {{ Form::open(['method' => 'post', 'id' => 'contactmessage', 'url' => 'users/messageuser', 'enctype' => 'multipart/form-data']) }}
                                                                                <div class="contact_div">
                                                                                    {{ Form::textarea('message', '', ['class' => 'form-control required', 'placeholder' => '', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id' => 'messageid', 'onkeyup' => 'countChar()']) }}
                                                                                    <div class="sec_blw_top">
                                                                                        <div class="sec_blw">
                                                                                            <span
                                                                                                id="charcount">0/2500</span>
                                                                                            <span class="right_sp">
                                                                                                {{ Form::file('attachment', ['class' => 'form-control', 'accept' => 'image/png']) }}
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="upbtn">
                                                                                            {{ Form::hidden('receiver_id', $recordInfo->User->id, ['id' => 'receiver_id']) }}
                                                                                            <!--<button type="button" class="succbtn" id="succbtnbtn">Send</button>-->
                                                                                            {{ Form::submit('Send', ['class' => 'succbtn', 'id' => 'succbtnbtn']) }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                {{ Form::close() }}
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

                                                @forelse($gigcatlist as $allrecord)
                                                    @if (isset($allrecord->id))
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
                                                                    @if (isset($allrecord->name))
                                                                        @if (file_exists('public/files/gigs/full/' . $allrecord->name) && !empty($allrecord->name))
                                                                            {{ HTML::image('public/files/gigs/full/' . $allrecord->name, SITE_TITLE, ['style' => 'width:400px;height:260px']) }}
                                                                        @else
                                                                            {{ HTML::image('public/img/front/dummy.png', SITE_TITLE, ['style' => 'width:400px;height:260px']) }}
                                                                        @endif
                                                                    @endif



                                                                    {{-- <a
                                                                        href="{{ URL::to('gig-details/' . $allrecord->slug) }}">
                                                                        <div class="image-wrapper">
                                                                            <img width="500" height="370"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/elementor/thumbs/service10-py2khwdfecxmt60xnnpsct0wmwtxyjkhy8wjaj8ar8.jpg"
                                                                                class="attachment-500x370x1x1 size-500x370x1x1"
                                                                                alt="" />
                                                                        </div>
                                                                    </a> --}}
                                                                </div>
                                                                <a class="btn-add-service-favorite" data-service_id="5557"
                                                                    data-nonce="a1a2911e0b" data-bs-toggle="tooltip">
                                                                    @include('elements.likeunlike', [
                                                                        'gid' => $allrecord->id,
                                                                    ])
                                                                    {{-- <span  class="btn-add-service-favorite" data-service_id="5557" data-nonce="a1a2911e0b"
                          data-bs-toggle="tooltip" > @include('elements.likeunlike', ['gid' => $allrecord->id])</span> --}}
                                                                    {{-- <i class="flaticon-like"></i> --}}
                                                                </a>
                                                                {{-- <a href="javascript:void(0)"
                                                                    class="btn-add-service-favorite"
                                                                    data-service_id="5555" data-nonce="b1f86a9443"
                                                                    data-bs-toggle="tooltip" title="Add Favorite">
                                                                    <i class="flaticon-like"></i>
                                                                    <span>Save</span> --}}
                                                                </a>
                                                            </div>

                                                            <div class="service-information">
                                                                <div class="category-service">
                                                                    <a href="{{ URL::to('public-profile/' . $allrecord->slug) }}"
                                                                        style="">{{ $allrecord->first_name . ' ' . $allrecord->last_name }}</a>
                                                                </div>

                                                                <h2 class="service-title" style="height: 58px;">
                                                                    {{ mb_substr($allrecord->title, 0, 40) }}
                                                                </h2>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span
                                                                        class="rating">{{ $allrecord->average_rating }}</span>
                                                                    <span class="text">({{ $allrecord->total_review }}
                                                                        Review)</span>
                                                                </div>
                                                                <div class="info-bottom d-flex align-items-center">
                                                                    <div class="service-author">
                                                                        <a
                                                                            href="{{ URL::to('public-profile/' . $allrecord->slug) }}">
                                                                            <div
                                                                                class="freelancer-logo d-flex align-items-center">
                                                                                <?php //echo '<pre>';print_r($allrecord->User->profile_image);
                                                                                ?>
                                                                                @if (isset($allrecord->profile_image))
                                                                                    @if (file_exists('public/files/users/full/' . $allrecord->profile_image) && !empty($allrecord->profile_image))
                                                                                        {{ HTML::image('public/files/users/full/' . $allrecord->profile_image, SITE_TITLE) }}
                                                                                    @else
                                                                                        {{ HTML::image('public/img/front/dummy.png', SITE_TITLE) }}
                                                                                    @endif
                                                                                @endif
                                                                                {{-- <img width="150" height="150"
                                                                                    src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg"
                                                                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                    alt="" decoding="async"
                                                                                    loading="lazy"
                                                                                    srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8.jpg 420w"
                                                                                    sizes="(max-width: 150px) 100vw, 150px" /> --}}
                                                                            </div>
                                                                            <span class="text">
                                                                                {{ $allrecord->first_name . ' ' . $allrecord->last_name }}</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="ms-auto">
                                                                        <div class="service-salary with-title">
                                                                            <span class="text">Starting at:</span>
                                                                            <span><span
                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>{{ $allrecord->basic_price }}</bdi></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article><!-- #post-## -->
                                                    @endif
                                                @empty
                                                    <div class="no_record">No more records found.</div>
                                                @endforelse


                                                {{-- <article
                                                    class="map-item service-item post-5554 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-design-creative service_category-development-it"
                                                    data-latitude="40.77409329202506" data-longitude="-73.91787141009002"
                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service9-495x370.jpg"
                                                    data-logo="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service9-150x150.jpg">
                                                    <div class="position-relative">
                                                        <div class="service-image">
                                                            <a
                                                                href="https://demoapus1.com/freeio/service/php-framework-that-you-can-use-to-create-your-own-custom/">
                                                                <div class="image-wrapper"><img width="500"
                                                                        height="370"
                                                                        src="https://demoapus1.com/freeio/wp-content/uploads/elementor/thumbs/service9-py2khwdfecxmt60xnnpsct0wmwtxyjkhy8wjaj8ar8.jpg"
                                                                        class="attachment-500x370x1x1 size-500x370x1x1"
                                                                        alt="" /></div>
                                                            </a>
                                                        </div>
                                                        <a href="javascript:void(0)" class="btn-add-service-favorite"
                                                            data-service_id="5554" data-nonce="b1f86a9443"
                                                            data-bs-toggle="tooltip" title="Add Favorite">
                                                            <i class="flaticon-like"></i>
                                                            <span>Save</span>
                                                        </a>
                                                    </div>

                                                    <div class="service-information">
                                                        <div class="category-service">
                                                            <a href="https://demoapus1.com/freeio/service-category/design-creative/"
                                                                style="">Design &amp; Creative</a>
                                                        </div>

                                                        <h2 class="service-title"><a
                                                                href="https://demoapus1.com/freeio/service/php-framework-that-you-can-use-to-create-your-own-custom/"
                                                                rel="bookmark">PHP framework that you can use to create
                                                                your own custom</a></h2>
                                                        <div class="rating-reviews">
                                                            <i class="fa fa-star"></i>
                                                            <span class="rating">4.0</span>
                                                            <span class="text">(1 Review)</span>
                                                        </div>
                                                        <div class="info-bottom d-flex align-items-center">
                                                            <div class="service-author">
                                                                <a
                                                                    href="https://demoapus1.com/freeio/freelancer/ali-tufan/">
                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                        <img width="150" height="150"
                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png"
                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                            alt="" decoding="async"
                                                                            loading="lazy"
                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-298x300.png 298w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-600x604.png 600w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-410x410.png 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video.png 735w"
                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                        <span class="verified"><i
                                                                                class="flaticon-tick"></i></span>
                                                                    </div>
                                                                    <span class="text">
                                                                        Ali Tufan </span>
                                                                </a>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <div class="service-salary with-title">
                                                                    <span class="text">Starting at:</span> <span><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>158</bdi></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article><!-- #post-## --> --}}



                                                {{-- <article
                                                    class="map-item service-item post-5552 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-development-it service_category-finance-accounting"
                                                    data-latitude="40.77168266674191" data-longitude="-73.92391047089716"
                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service13-495x370.jpg"
                                                    data-logo="https://demoapus1.com/freeio/wp-content/uploads/2022/11/service13-150x150.jpg">
                                                    <div class="position-relative">
                                                        <div class="service-image">
                                                            <a
                                                                href="https://demoapus1.com/freeio/service/management-software-to-help-you-manage-your-mobile-workers/">
                                                                <div class="image-wrapper"><img width="500"
                                                                        height="370"
                                                                        src="https://demoapus1.com/freeio/wp-content/uploads/elementor/thumbs/service13-py2khwdfecxmt60xnnpsct0wmwtxyjkhy8wjaj8ar8.jpg"
                                                                        class="attachment-500x370x1x1 size-500x370x1x1"
                                                                        alt="" /></div>
                                                            </a>
                                                        </div>
                                                        <a href="javascript:void(0)" class="btn-add-service-favorite"
                                                            data-service_id="5552" data-nonce="b1f86a9443"
                                                            data-bs-toggle="tooltip" title="Add Favorite">
                                                            <i class="flaticon-like"></i>
                                                            <span>Save</span>
                                                        </a>
                                                    </div>

                                                    <div class="service-information">
                                                        <div class="category-service">
                                                            <a href="https://demoapus1.com/freeio/service-category/development-it/"
                                                                style="">Development &amp; IT</a>
                                                        </div>

                                                        <h2 class="service-title"><a
                                                                href="https://demoapus1.com/freeio/service/management-software-to-help-you-manage-your-mobile-workers/"
                                                                rel="bookmark">Management software to help you manage your
                                                                mobile workers</a></h2>
                                                        <div class="rating-reviews">
                                                            <i class="fa fa-star"></i>
                                                            <span class="rating">4.5</span>
                                                            <span class="text">(2 Reviews)</span>
                                                        </div>
                                                        <div class="info-bottom d-flex align-items-center">
                                                            <div class="service-author">
                                                                <a
                                                                    href="https://demoapus1.com/freeio/freelancer/ali-tufan/">
                                                                    <div class="freelancer-logo d-flex align-items-center">
                                                                        <img width="150" height="150"
                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png"
                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                            alt="" decoding="async"
                                                                            loading="lazy"
                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-298x300.png 298w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-600x604.png 600w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-410x410.png 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video.png 735w"
                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                        <span class="verified"><i
                                                                                class="flaticon-tick"></i></span>
                                                                    </div>
                                                                    <span class="text">
                                                                        Ali Tufan </span>
                                                                </a>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <div class="service-salary with-title">
                                                                    <span class="text">Starting at:</span> <span><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>89</bdi></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article><!-- #post-## --> --}}

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

            @if (!Session::get('user_id'))

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
            @else

                $.ajax({

                    url: "{!! HTTP_PATH !!}/gigs/addwaitlist",
                    type: "POST",
                    //data: $('#addggiform').serialize(),

                    data: {
                        'user_id': '<?php echo $recordInfo->user_id;
                        ?>',
                        'gig_id': '<?php echo $recordInfo->id;
                        ?>',
                        _token: '{{ csrf_token() }}'
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
            @endif

        }
        //    
        function submitform() {
            @if (!Session::get('user_id'))
                alert('Your must login to place your order.');
            @else
                $.ajax({
                    url: "{!! HTTP_PATH !!}/payments/addtocart",
                    type: "POST",
                    data: $('.addggiform').serialize(),
                    //data: { _token: '{{ csrf_token() }}'},
                    beforeSend: function() {
                        $(".gigdloader").show();
                        $(".hidebtn").hide();
                    },
                    success: function(result) {
                        window.location = "{!! HTTP_PATH !!}/order-summary/" + result;
                    }
                });
            @endif
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
                closeImage: '{!! HTTP_PATH !!}/public/img/close.png'
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
                    _token: '{{ csrf_token() }}'
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

        @if (Session::get('user_id') && Session::get('user_id') > 0)
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
        @endif
        $(document).ready(function() {
            $("img.lazy").lazyload();
        });
    </script>
@endsection
