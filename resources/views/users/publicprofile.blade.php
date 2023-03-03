@extends('layouts.dashboard')
@section('content')
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
                                                        <li><a href="{{ URL::to('index1') }}">Home</a> </li>
                                                        <li><a href="#">Freelancers</a></li>
                                                        @if (isset($recordInfo) && !empty($recordInfo))
                                                            <li><span class="active">{{ $recordInfo->first_name }}
                                                                    {{ $recordInfo->last_name }}</span></li>
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
                                            </div>
                                            {{-- @if (isset($recordInfo->id) && !empty($recordInfo->id))
                                                <a class="btn-add-service-favorite" data-service_id="5557"
                                                    data-nonce="a1a2911e0b" data-bs-toggle="tooltip">
                                                    @include('elements.likeunlike', [
                                                        'gid' => $recordInfo->id,
                                                    ])
                                                    <span  class="btn-add-service-favorite" data-service_id="5557" data-nonce="a1a2911e0b"
                                                         data-bs-toggle="tooltip" > @include('elements.likeunlike', ['gid' => $allrecord->id])</span>
                                                    <i class="flaticon-like"></i>
                                                </a>
                            
                                                
                                            @endif --}}
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

                                                        @if ($recordInfo->profile_image)
                                                            {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
                                                        @else
                                                            {{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="freelancer-information flex-grow-1">
                                                    <div class="d-flex freelancer-detail-title-wrapper">
                                                        <h1 class="freelancer-detail-title">
                                                            {{ $recordInfo->first_name }}
                                                            {{ $recordInfo->last_name }} </h1>
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
                                                                class="rating text-link">{{ $recordInfo->average_rating }}</span>
                                                            <span class="text">({{ $recordInfo->total_review }}
                                                                Review)</span>
                                                        </div>
                                                        <div class="freelancer-location with-icon"><i
                                                                class="flaticon-place"></i>
                                                            <a href="#">{{ $recordInfo->city }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="ms-auto right-action">
                                                <div class="d-flex align-items-center">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-invite-freelancer btn-theme cannot-download-cv-btn "
                                                        data-msg="Please login as &quot;Employer&quot; to download CV.">Invite</a>
                                                    <div class="send-private-wrapper">
                                                        <a href="#send-private-message-wrapper-4100"
                                                            class="btn-show-popup send-private-message-btn btn btn-theme btn-sm">Message</a>
                                                    </div>
                                                    <div id="send-private-message-wrapper-4100"
                                                        class="send-private-message-wrapper mfp-hide"
                                                        data-effect="fadeIn">
                                                        <a href="javascript:void(0);"
                                                            class="close-magnific-popup ali-right"><i
                                                                class="ti-close"></i></a>
                                                        <h3 class="title">Send message to &quot;Agent Pakulla&quot;</h3>
                                                        <a href="https://demoapus1.com/freeio/login/"
                                                            class="login">Please login to send a private message</a>
                                                    </div>
                                                </div>
                                            </div> --}}
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
                                                    {!! nl2br($recordInfo->description) !!}
                                                </div>
                                            </div>




                                            <div id="job-freelancer-education"
                                                class="freelancer-detail-education my_resume_eduarea">
                                                <h4 class="title">Education</h4>
                                                @if ($recordInfo->educations)
                                                    @foreach (json_decode($recordInfo->educations) as $key => $edu)
                                                        <div class="content">
                                                            <div class="circle">
                                                                <i class='fas fa-graduation-cap'></i>
                                                            </div>
                                                            <div class="top-info">
                                                                <span class="year">{!! $edu->year !!}</span>
                                                                <span class="edu_stats">{!! $edu->qual_name !!}</span>
                                                            </div>
                                                            <div class="edu_center">
                                                                <span class="university">{!! $edu->stream_name !!}</span>
                                                            </div>
                                                            <p class="mb0">{!! $edu->university_name !!},
                                                                {!! $edu->country_name !!}, Pass in {!! $edu->year !!}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            {{-- <div id="job-freelancer-experience"
                                                class="freelancer-detail-experience my_resume_eduarea">
                                                <h4 class="title">Work &amp; Experience</h4>
                                                <div class="content">
                                                    <div class="circle">
                                                        M </div>
                                                    <div class="top-info">
                                                        <span class="year">
                                                            2019 - 2020 </span>
                                                        <span class="edu_stats">Medical Assistant</span>
                                                    </div>
                                                    <div class="edu_center">
                                                        <span class="university">AGB Company</span>
                                                    </div>
                                                    <p class="mb0">Sed ut perspiciatis unde omnis iste natus error sit
                                                        voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                                        eaque ipsa quae ab illo inventore veritatis et.</p>
                                                </div>
                                                <div class="content">
                                                    <div class="circle">
                                                        N </div>
                                                    <div class="top-info">
                                                        <span class="year">
                                                            2021 - 2022 </span>
                                                        <span class="edu_stats">Nursing Assistant</span>
                                                    </div>
                                                    <div class="edu_center">
                                                        <span class="university">AB Company</span>
                                                    </div>
                                                    <p class="mb0">Nemo enim ipsam voluptatem quia voluptas sit
                                                        aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                                                        eos qui ratione voluptatem sequi nesciunt.</p>
                                                </div>
                                            </div> --}}

                                            <div id="job-freelancer-award" class="my_resume_eduarea color-award">
                                                <h4 class="title">Certification</h4>
                                                @if ($recordInfo->certifications)
                                                    @foreach (json_decode($recordInfo->certifications) as $key => $cert)
                                                        <div class="content">
                                                            <div class="circle">
                                                                <i class='fas fa-award'></i>
                                                            </div>
                                                            <div class="top-info">
                                                                <span class="year">{!! $cert->year !!}</span>
                                                                <span class="edu_stats">{!! $cert->certificate_name !!}</span>
                                                            </div>
                                                            <div class="mb0">{!! $cert->certificate_from !!}, Pass in
                                                                {!! $cert->year !!}</div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>


                                            <div class="widget-open-services">
                                                <div class="top-info-widget d-sm-flex align-items-center">
                                                    <h4 class="title">
                                                        Services </h4>
                                                    {{-- <div class="ms-auto">
                                                        <a href="{{ URL::to('gigs') }}"
                                                            class="text-theme view_all">
                                                            Browse Full List <i class="flaticon-right-up next"></i>
                                                        </a>
                                                    </div> --}}
                                                </div>
                                                <div class="widget-content">
                                                    <div class="slick-carousel" data-carousel="slick" data-items="4"
                                                        data-large="4" data-small="1" data-medium="2"
                                                        data-slidestoscroll="4" data-slidestoscroll_smallmedium="4"
                                                        data-slidestoscroll_extrasmall="1" data-pagination="false"
                                                        data-nav="true" data-rows="1" data-infinite="false"
                                                        data-autoplay="true">

                                                        @if (!$mygigs->isEmpty())
                                                            @foreach ($mygigs as $allrecord)
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
                                                                                href="{{ URL::to('gig-details/' . $allrecord->slug) }}">
                                                                                <div class="image-wrapper">
                                                                                    {{ HTML::image($path, SITE_TITLE, ['title' => $allrecord->title, 'style' => 'width:215px;height:175px']) }}
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <a class="btn-add-service-favorite like_top"
                                                                            data-service_id="5557" data-nonce="a1a2911e0b"
                                                                            data-bs-toggle="tooltip">
                                                                            @include(
                                                                                'elements.likeunlike',
                                                                                ['gid' => $allrecord->id]
                                                                            )
                                                                        </a>
                                                                    </div>

                                                                    <div class="service-information">
                                                                        <div class="category-service">
                                                                            <a href="{{ URL::to('public-profile/' . $allrecord->User->slug) }}"
                                                                                style="">{{ $allrecord->User->first_name . ' ' . $allrecord->User->last_name }}</a>
                                                                        </div>

                                                                        <h2 class="service-title"><a
                                                                                href="{{ URL::to('gig-details/' . $allrecord->slug) }}"
                                                                                rel="bookmark">{{ mb_substr($allrecord->title, 0, 40) }}</a>
                                                                        </h2>
                                                                        <div class="rating-reviews">
                                                                            <i class="fa fa-star"></i>
                                                                            <span
                                                                                class="rating">{{ $allrecord->User->average_rating }}</span>
                                                                            <span
                                                                                class="text">({{ $allrecord->User->total_review }}
                                                                                Review)</span>
                                                                        </div>
                                                                        <div class="info-bottom d-flex align-items-center">
                                                                            <div class="service-author">
                                                                                <a
                                                                                    href="{{ URL::to('public-profile/' . $allrecord->User->slug) }}">
                                                                                    <div
                                                                                        class="freelancer-logo d-flex align-items-center">
                                                                                        <?php //echo '<pre>';print_r($allrecord->User->profile_image);
                                                                                        ?>
                                                                                        @if (isset($allrecord->User->profile_image))
                                                                                            @if (file_exists('public/files/users/full/' . $allrecord->User->profile_image) &&
                                                                                                    !empty($allrecord->User->profile_image))
                                                                                                {{ HTML::image('public/files/users/full/' . $allrecord->User->profile_image, SITE_TITLE) }}
                                                                                            @else
                                                                                                {{ HTML::image('public/img/front/dummy.png', SITE_TITLE) }}
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                    <span class="text">
                                                                                        {{ $allrecord->User->first_name . ' ' . $allrecord->User->last_name }}
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                            <div class="ms-auto">
                                                                                <div class="service-salary with-title">
                                                                                    {{-- <span class="text">Starting
                                                                                        at:</span>  --}}
                                                                                    <span><span
                                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>{{ $allrecord->basic_price }}</bdi></span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article><!-- #post-## -->
                                                            @endforeach
                                                        @else
                                                            <div class="col-md-12">
                                                                <div class="management-full">No gig posted by this user
                                                                    yet.</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-block d-lg-none">
                                                <aside class="sidebar sidebar-listing-detail sidebar-right">
                                                    <aside class="widget widget_apus_freelancer_info">
                                                        <div class="freelancer-info-detail ">
                                                            <div class="freelancer-salary-wrapper">
                                                                {{-- <span class="woocommerce-Price-amount amount"><bdi><span
                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>60</bdi></span>
                                                                - <span class="woocommerce-Price-amount amount"><bdi><span
                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>65</bdi></span>
                                                                / hr --}}
                                                                <h1><i class='fas fa-user-tie'></i>
                                                                    {{ $recordInfo->first_name }}
                                                                    {{ $recordInfo->last_name }}</h1>
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
                                                                                    href="">{{ $recordInfo->city }}</a>
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
                                                                        @if ($recordInfo->languages)
                                                                            @foreach (json_decode($recordInfo->languages) as $key => $lang)
                                                                                @if ($lang->lang_name === 'English')
                                                                                    <div class="text">
                                                                                        {{ $lang->lang_name }}</div>
                                                                                    <div class="value">
                                                                                        <div
                                                                                            class="freelancer-meta with-icon">

                                                                                            <div class="freelancer-meta">

                                                                                                {{ $lang->lang_level }}
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
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
                                                                                    {{ $recordInfo->gender }} </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>


                                                                {{-- <li>
                                                                    <div class="icon">
                                                                        <i class="flaticon-mail"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="text">Email</div>
                                                                        <div class="value">
                                                                            <div class="freelancer-email">
                                                                                {{ $recordInfo->email_address }}</div>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <div class="icon">
                                                                        <i class="flaticon-call"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="text">Phone Number</div>
                                                                        <div class="value">
                                                                            <div class="freelancer-phone">
                                                                                <div class="phone-wrapper ">
                                                                                    <a class="phone"
                                                                                        href="tel:{{ $recordInfo->contact }}">{{ $recordInfo->contact }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li> --}}


                                                            </ul>
                                                            @if ($recordInfo->id != Session::get('user_id'))
                                                                <span class="contct_per_detail"><a
                                                                        href="javascript:void(0);"
                                                                        class="btn btn-theme btn-inverse btn-service-contact-form btn-show-popup w-100"
                                                                        onclick='$("#info12").show();'data-toggle="modal"
                                                                        data-target="#myModal_mobile">Contact
                                                                        Seller</a></span>
                                                            @endif

                                                            {{-- <div id="apus-contact-form-wrapper"
                                                                class="apus-contact-form mfp-hide" data-effect="fadeIn">
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
                                                                                    class="form-control style2"
                                                                                    name="phone" placeholder="Phone"
                                                                                    required="required">
                                                                            </div><!-- /.form-group -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                                                    </div><!-- /.form-group -->


                                                                    <input type="hidden" name="post_id" value="4100">
                                                                    <button class="button btn btn-theme btn-block"
                                                                        name="contact-form">Send Message</button>
                                                                </form>
                                                            </div> --}}
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
                                                                                            @if ($recordInfo->profile_image)
                                                                                                {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
                                                                                            @else
                                                                                                {{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}
                                                                                            @endif
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
                                                                                            {{ Form::open(['method' => 'post', 'id' => 'contactmessage', 'url' => 'users/messageuser', 'enctype' => 'multipart/form-data']) }}
                                                                                            <div class="contact_div">
                                                                                                {{ Form::textarea('message', '', ['class' => 'form-control required', 'placeholder' => '', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id' => 'messageid_mobile', 'onkeyup' => 'countCharmobile()']) }}
                                                                                                <div class="sec_blw_top">
                                                                                                    <div class="sec_blw">
                                                                                                        <span
                                                                                                            id="charcount_mobile">0/2500</span>
                                                                                                        <span
                                                                                                            class="right_sp">
                                                                                                            {{ Form::file('attachment', ['class' => 'form-control', 'accept' => 'image/png']) }}
                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="upbtn">
                                                                                                        {{ Form::hidden('receiver_id', $recordInfo->id, ['id' => 'receiver_id']) }}
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
                                                        </div>
                                                    </aside>
                                                    <aside class="widget widget_apus_freelancer_tags">
                                                        <h2 class="widget-title"><span>My Skills</span></h2>
                                                        <div class="freelancer-detail-tags">
                                                            <div class="freelancer-tags">
                                                                <div class="text-section">
                                                                    <ul class="linked-skills" id="addskilldiv">
                                                                        @if ($recordInfo->skills)
                                                                            @foreach (explode(',', $recordInfo->skills) as $skillid)
                                                                                <li id="s{!! $skillid !!}"> <span>
                                                                                        {!! $skillsList[$skillid] !!}</span>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                {{-- <li class="tag-freelancer"
                                                                    href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                    Writing</li> --}}
                                                                {{-- <a class="tag-freelancer"
                                                                    href="https://demoapus1.com/freeio/freelancer-tag/html5/">HTML5</a>
                                                                <a class="tag-freelancer"
                                                                    href="https://demoapus1.com/freeio/freelancer-tag/prototyping/">Prototyping</a> --}}
                                                            </div>
                                                        </div>
                                                    </aside>
                                                </aside>
                                            </div>
                                            @if (!$myreviews->isEmpty())
                                                <!-- Review -->
                                                <div id="reviews">
                                                    <div class="box-info-white max-780">
                                                        <h3 class="title">Latest Reviews</h3>

                                                        {{-- <span
                                                        class="rating text-link">{{ $recordInfo->average_rating }}</span>
                                                    <span class="text">({{ $recordInfo->total_review }}
                                                        Review)</span> --}}
                                                        {{-- <div class="d-md-flex align-items-center">
                                                            <div
                                                                class="detail-average-rating flex-column d-flex align-items-center justify-content-center">
                                                                <div class="average-value">
                                                                    {{ $recordInfo->average_rating }}
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
                                                                                style="width: 80%">
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
                                                                    1 rating </div>
                                                            </div>

                                                            <div class="detail-rating">
                                                                <div class="item-rating">
                                                                    <div class="list-rating">

                                                                        <div class="value-content">
                                                                            <div class="list-number">
                                                                                5 Star </div>
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
                                                                                4 Star </div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 100%">
                                                                                </div>
                                                                            </div>
                                                                            <div class="value">
                                                                                100% </div>
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
                                                        </div> --}}
                                                    </div>
                                                    @foreach ($myreviews as $allrecord)
                                                        @if (isset($allrecord->Otheruser->first_name))
                                                            <div id="comments">

                                                                <ol class="comment-list">
                                                                    <li class="comment byuser comment-author-admin even thread-even depth-1"
                                                                        id="li-comment-51">

                                                                        <div id="comment-51" class="the-comment ">
                                                                            @if ($allrecord->Otheruser->profile_image)
                                                                                <div class="avatar">
                                                                                    <a
                                                                                        href="{{ URL::to('public-profile/' . $allrecord->Otheruser->slug) }}">
                                                                                        {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->Otheruser->profile_image, SITE_TITLE, ['id' => 'pimage'], ['style' => 'width:42px;height:38px;border-radius: 36px;']) }}</a>
                                                                                </div>
                                                                            @else
                                                                                <a
                                                                                    href="{{ URL::to('public-profile/' . $recordInfo->slug) }}">{{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage', 'style' => 'width:42px;height:38px;border-radius: 36px;']) }}</a>
                                                                            @endif
                                                                            <div class="comment-box">
                                                                                <div class="clearfix">
                                                                                    <div class="name-comment">
                                                                                        <h3><a href="{{ URL::to('public-profile/' . $allrecord->Otheruser->slug) }}"
                                                                                                class="">{{ $allrecord->Otheruser->first_name . ' ' . $allrecord->Otheruser->last_name }}
                                                                                            </a></h3>
                                                                                    </div>
                                                                                    <div
                                                                                        class="meta d-flex align-items-center">
                                                                                        <div class="star-rating"
                                                                                            title="Rated 4 out of 5">
                                                                                            <span class="review-avg"><i
                                                                                                    class="fa fa-star"></i>{{ $allrecord->rating }}</span>
                                                                                        </div>
                                                                                        <div class="date">
                                                                                            {{ $allrecord->created_at->diffForHumans() }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div itemprop="description"
                                                                                class="comment-text">
                                                                                <p>{{ nl2br($allrecord->comment) }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </li><!-- #comment-## -->
                                                                </ol>


                                                            </div>
                                                        @endif
                                                    @endforeach

                                                    {{-- <div id="review_form_wrapper" class="commentform ">
                                                    <div id="review_form">
                                                        <div class="commentform reset-button-default">
                                                            <div class="clearfix">
                                                                <div id="respond" class="comment-respond">
                                                                    <h4 class="title comment-reply-title">Add a review
                                                                        <small><a rel="nofollow"
                                                                                id="cancel-comment-reply-link"
                                                                                href="/freeio/freelancer/agent-pakulla/#respond"
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
                                                                                value='4100' id='comment_post_ID' />
                                                                            <input type='hidden' name='comment_parent'
                                                                                id='comment_parent' value='0' />
                                                                        </p>
                                                                    </form>
                                                                </div><!-- #respond -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sidebar-wrapper sidebar-service col-lg-4 col-12 d-none d-lg-block">
                                        <aside class="sidebar sidebar-listing-detail sidebar-right sticky-top">
                                            <aside class="widget widget_apus_freelancer_info">
                                                <div class="freelancer-info-detail ">
                                                    <div class="freelancer-salary-wrapper">
                                                        {{-- <span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>60</bdi></span>
                                                        - <span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>65</bdi></span>
                                                        / hr --}}
                                                        <h1><i class='fas fa-user-tie'></i> {{ $recordInfo->first_name }}
                                                            {{ $recordInfo->last_name }}</h1>
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
                                                                        <a href="#">{{ $recordInfo->city }}</a>
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
                                                                                @if ($recordInfo->facebook_id)
                                                                                    <li>
                                                                                        <i class='fab fa-facebook-f'
                                                                                            style='color:#2338cc'></i><span>
                                                                                            Facebook</span>
                                                                                    </li>
                                                                                @endif
                                                                                @if ($recordInfo->google_id)
                                                                                    <li>
                                                                                        <i
                                                                                            class="fab fa-google-plus-g"></i>
                                                                                        <span>Google</span>
                                                                                    </li>
                                                                                @endif
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
                                                                @if ($recordInfo->languages)
                                                                    @foreach (json_decode($recordInfo->languages) as $key => $lang)
                                                                        @if ($lang->lang_name === 'English')
                                                                            <div class="text">{{ $lang->lang_name }}
                                                                            </div>
                                                                            <div class="value">
                                                                                <div class="freelancer-meta with-icon">

                                                                                    <div class="freelancer-meta">

                                                                                        {{ $lang->lang_level }}</div>

                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
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
                                                                            {{ $recordInfo->gender }} </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>


                                                        {{-- <li>
                                                            <div class="icon">
                                                                <i class="flaticon-mail"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Email</div>
                                                                <div class="value">
                                                                    <div class="freelancer-email">
                                                                        {{ $recordInfo->email_address }} </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon">
                                                                <i class="flaticon-call"></i>
                                                            </div>
                                                            <div class="details">
                                                                <div class="text">Phone Number</div>
                                                                <div class="value">
                                                                    <div class="freelancer-phone">
                                                                        <div class="phone-wrapper ">
                                                                            <a class="phone"
                                                                                href="tel:{{ $recordInfo->contact }}">{{ $recordInfo->contact }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li> --}}


                                                    </ul>
                                                    @if ($recordInfo->id != Session::get('user_id'))
                                                        <span class="contct_per"><a href="javascript:void(0);"
                                                                class="btn btn-theme btn-inverse btn-service-contact-form btn-show-popup w-100"
                                                                onclick='$("#info12").show();'data-toggle="modal"
                                                                data-target="#myModal">Contact Me</a></span>
                                                    @endif
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
                                                                                    @if ($recordInfo->profile_image)
                                                                                        {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
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
                                                                                                {{ Form::hidden('receiver_id', $recordInfo->id, ['id' => 'receiver_id']) }}
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

                                                </div>
                                            </aside>
                                            <aside class="widget widget_apus_freelancer_tags">
                                                <h2 class="widget-title"><span>My Skills</span></h2>
                                                <div class="freelancer-detail-tags">
                                                    <div class="freelancer-tags">
                                                        <div class="text-section">
                                                            <ul class="linked-skills" id="addskilldiv">
                                                                @if ($recordInfo->skills)
                                                                    @foreach (explode(',', $recordInfo->skills) as $skillid)
                                                                        <li id="s{!! $skillid !!}"> <span>
                                                                                {!! $skillsList[$skillid] !!}</span>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </aside>
                                    </div>

                                </div>

                                {{-- <div class="wrapper-services-related">
                                    <div class="related-freelancers related-posts">
                                        <h4 class="title">
                                            Related Freelancers </h4>
                                        <div class="widget-content">
                                            <div class="slick-carousel" data-carousel="slick" data-items="4"
                                                data-large="3" data-medium="2" data-small="1" data-smallest="1"
                                                data-slidestoscroll="4" data-slidestoscroll_medium="3"
                                                data-slidestoscroll_small="1" data-pagination="false" data-nav="true"
                                                data-rows="1" data-infinite="false" data-autoplay="false">
                                                <article id="post-4098"
                                                    class="map-item freelancer-card post-4098 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-business freelancer_category-digital-marketing freelancer_tag-creative freelancer_tag-figma freelancer_tag-prototyping"
                                                    data-latitude="" data-longitude=""
                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg">
                                                    <div class="freelancer-item position-relative">
                                                        <div class="freelancer-logo d-flex align-items-center">
                                                            <a
                                                                href="https://demoapus1.com/freeio/freelancer/thomas-powell/">
                                                                <img width="150" height="150"
                                                                    src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg"
                                                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                    alt="" decoding="async" loading="lazy"
                                                                    srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8.jpg 420w"
                                                                    sizes="(max-width: 150px) 100vw, 150px" /> </a>

                                                        </div>
                                                        <a href="javascript:void(0)" class="btn-add-freelancer-favorite"
                                                            data-freelancer_id="4098" data-nonce="0fd957ac09"
                                                            data-toggle="tooltip" title="Add Favorite">
                                                            <i class="flaticon-like"></i>
                                                            <span>Save</span>
                                                        </a>
                                                        <div class="inner-bottom">
                                                            <div class="text-center">
                                                                <h2 class="freelancer-title">
                                                                    <a href="https://demoapus1.com/freeio/freelancer/thomas-powell/"
                                                                        rel="bookmark">
                                                                        Thomas Powell </a>
                                                                </h2>

                                                                <div class="freelancer-job">
                                                                    Design & Creative </div>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="rating text-link">4.0</span>
                                                                    <span class="text">(1 Review)</span>
                                                                </div>

                                                                <div class="freelancer-tags">
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/creative/">Creative</a>
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/figma/">Figma</a>

                                                                    <span class="count-more-tags">+1</span>

                                                                </div>
                                                            </div>
                                                            <div class="freelancer-metas d-flex align-items-center">
                                                                <div class="freelancer-location with-title">
                                                                    <strong>Location:</strong>
                                                                    <a
                                                                        href="https://demoapus1.com/freeio/location/los-angeles/">Los
                                                                        Angeles</a>
                                                                </div>
                                                                <div class="freelancer-salary with-title">
                                                                    <strong>Rate:</strong> <span><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                        - <span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>30</bdi></span>
                                                                        / hr</span>
                                                                </div>
                                                            </div>

                                                            <div class="freelancer-link">
                                                                <a href="https://demoapus1.com/freeio/freelancer/thomas-powell/"
                                                                    class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                    Profile <i class="next flaticon-right-up"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article><!-- #post-## -->
                                                <article id="post-2056"
                                                    class="map-item freelancer-card post-2056 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-business freelancer_category-digital-marketing freelancer_tag-design-writing freelancer_tag-figma freelancer_tag-html5"
                                                    data-latitude="" data-longitude=""
                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team5-150x150.jpg">
                                                    <div class="freelancer-item position-relative">
                                                        <div class="freelancer-logo d-flex align-items-center">
                                                            <a href="https://demoapus1.com/freeio/freelancer/robert-fox/">
                                                                <img width="150" height="150"
                                                                    src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team5-150x150.jpg"
                                                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" />
                                                            </a>

                                                        </div>
                                                        <a href="javascript:void(0)" class="btn-add-freelancer-favorite"
                                                            data-freelancer_id="2056" data-nonce="0fd957ac09"
                                                            data-toggle="tooltip" title="Add Favorite">
                                                            <i class="flaticon-like"></i>
                                                            <span>Save</span>
                                                        </a>
                                                        <div class="inner-bottom">
                                                            <div class="text-center">
                                                                <h2 class="freelancer-title">
                                                                    <a href="https://demoapus1.com/freeio/freelancer/robert-fox/"
                                                                        rel="bookmark">
                                                                        Robert Fox </a>
                                                                </h2>

                                                                <div class="freelancer-job">
                                                                    Nursing Assistant </div>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="rating text-link">4.5</span>
                                                                    <span class="text">(2 Reviews)</span>
                                                                </div>

                                                                <div class="freelancer-tags">
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                        Writing</a>
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/figma/">Figma</a>

                                                                    <span class="count-more-tags">+1</span>

                                                                </div>
                                                            </div>
                                                            <div class="freelancer-metas d-flex align-items-center">
                                                                <div class="freelancer-location with-title">
                                                                    <strong>Location:</strong>
                                                                    <a
                                                                        href="https://demoapus1.com/freeio/location/new-york/">New
                                                                        York</a>
                                                                </div>
                                                                <div class="freelancer-salary with-title">
                                                                    <strong>Rate:</strong> <span><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                        - <span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>35</bdi></span>
                                                                        / hr</span>
                                                                </div>
                                                            </div>

                                                            <div class="freelancer-link">
                                                                <a href="https://demoapus1.com/freeio/freelancer/robert-fox/"
                                                                    class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                    Profile <i class="next flaticon-right-up"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article><!-- #post-## -->
                                                <article id="post-1918"
                                                    class="map-item freelancer-card post-1918 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-business freelancer_category-digital-marketing freelancer_tag-design-writing freelancer_tag-figma freelancer_tag-html5 freelancer_tag-prototyping freelancer_tag-software-design"
                                                    data-latitude="" data-longitude=""
                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png">
                                                    <div class="freelancer-item position-relative">
                                                        <div class="freelancer-logo d-flex align-items-center">
                                                            <a href="https://demoapus1.com/freeio/freelancer/ali-tufan/">
                                                                <img width="150" height="150"
                                                                    src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png"
                                                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                    alt="" decoding="async" loading="lazy"
                                                                    srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-298x300.png 298w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-600x604.png 600w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-410x410.png 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video.png 735w"
                                                                    sizes="(max-width: 150px) 100vw, 150px" /> </a>

                                                            <span class="verified"><i class="flaticon-tick"></i></span>
                                                        </div>
                                                        <a href="javascript:void(0)" class="btn-add-freelancer-favorite"
                                                            data-freelancer_id="1918" data-nonce="0fd957ac09"
                                                            data-toggle="tooltip" title="Add Favorite">
                                                            <i class="flaticon-like"></i>
                                                            <span>Save</span>
                                                        </a>
                                                        <div class="inner-bottom">
                                                            <div class="text-center">
                                                                <h2 class="freelancer-title">
                                                                    <a href="https://demoapus1.com/freeio/freelancer/ali-tufan/"
                                                                        rel="bookmark">
                                                                        Ali Tufan </a>
                                                                </h2>

                                                                <div class="freelancer-job">
                                                                    UI/UX Designer </div>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="rating text-link">4.5</span>
                                                                    <span class="text">(2 Reviews)</span>
                                                                </div>

                                                                <div class="freelancer-tags">
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                        Writing</a>
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/figma/">Figma</a>

                                                                    <span class="count-more-tags">+3</span>

                                                                </div>
                                                            </div>
                                                            <div class="freelancer-metas d-flex align-items-center">
                                                                <div class="freelancer-location with-title">
                                                                    <strong>Location:</strong>
                                                                    <a
                                                                        href="https://demoapus1.com/freeio/location/los-angeles/">Los
                                                                        Angeles</a>
                                                                </div>
                                                                <div class="freelancer-salary with-title">
                                                                    <strong>Rate:</strong> <span><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>15</bdi></span>
                                                                        - <span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                        / hr</span>
                                                                </div>
                                                            </div>

                                                            <div class="freelancer-link">
                                                                <a href="https://demoapus1.com/freeio/freelancer/ali-tufan/"
                                                                    class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                    Profile <i class="next flaticon-right-up"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article><!-- #post-## -->
                                                <article id="post-5574"
                                                    class="map-item freelancer-card post-5574 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-graphics-design freelancer_category-trending freelancer_tag-design-writing freelancer_tag-figma freelancer_tag-software-design"
                                                    data-latitude="" data-longitude=""
                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team2-150x150.jpg">
                                                    <div class="freelancer-item position-relative">
                                                        <div class="freelancer-logo d-flex align-items-center">
                                                            <a
                                                                href="https://demoapus1.com/freeio/freelancer/samuel-smith/">
                                                                <img width="150" height="150"
                                                                    src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team2-150x150.jpg"
                                                                    class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                    alt="" decoding="async" loading="lazy" />
                                                            </a>

                                                        </div>
                                                        <a href="javascript:void(0)" class="btn-add-freelancer-favorite"
                                                            data-freelancer_id="5574" data-nonce="0fd957ac09"
                                                            data-toggle="tooltip" title="Add Favorite">
                                                            <i class="flaticon-like"></i>
                                                            <span>Save</span>
                                                        </a>
                                                        <div class="inner-bottom">
                                                            <div class="text-center">
                                                                <h2 class="freelancer-title">
                                                                    <a href="https://demoapus1.com/freeio/freelancer/samuel-smith/"
                                                                        rel="bookmark">
                                                                        Samuel Smith </a>
                                                                </h2>

                                                                <div class="freelancer-job">
                                                                    Design & Creative </div>
                                                                <div class="rating-reviews">
                                                                    <i class="fa fa-star"></i>
                                                                    <span class="rating text-link">4.0</span>
                                                                    <span class="text">(1 Review)</span>
                                                                </div>

                                                                <div class="freelancer-tags">
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                        Writing</a>
                                                                    <a class="tag-freelancer"
                                                                        href="https://demoapus1.com/freeio/freelancer-tag/figma/">Figma</a>

                                                                    <span class="count-more-tags">+1</span>

                                                                </div>
                                                            </div>
                                                            <div class="freelancer-metas d-flex align-items-center">
                                                                <div class="freelancer-location with-title">
                                                                    <strong>Location:</strong>
                                                                    <a
                                                                        href="https://demoapus1.com/freeio/location/new-york/">New
                                                                        York</a>
                                                                </div>
                                                                <div class="freelancer-salary with-title">
                                                                    <strong>Rate:</strong> <span><span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>65</bdi></span>
                                                                        - <span
                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-currencySymbol">&#36;</span>75</bdi></span>
                                                                        / hr</span>
                                                                </div>
                                                            </div>

                                                            <div class="freelancer-link">
                                                                <a href="https://demoapus1.com/freeio/freelancer/samuel-smith/"
                                                                    class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                    Profile <i class="next flaticon-right-up"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article><!-- #post-## -->
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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
@endsection
