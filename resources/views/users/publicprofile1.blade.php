@extends('layouts.dashboard')
@section('content')
    {{ HTML::script('public/js/facebox.js') }}
    {{ HTML::style('public/css/facebox.css') }}
    <script type="text/javascript">
        $(document).ready(function($) {
            $("#contactmessage").validate();
            $('.close_image').hide();
            $('a[rel*=facebox]').facebox({
                closeImage: '{!! HTTP_PATH !!}/public/img/close.png'
            });
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
    <script type="text/javascript">
        var img_path = "{!! HTTP_PATH !!}/public/img";
    </script>
    {{ HTML::script('public/js/jquery.raty.min.js') }}
    <div class="main_dashboard">
        @include('elements.topcategories')
        <section class="dashboard-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="profile-bx">
                            <div class="profile-img-bxa">
                                <div class="profile-img">
                                    @if ($recordInfo->profile_image)
                                        {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
                                    @else
                                        {{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}
                                    @endif

                                </div>
                                <?php /*
                                                            @if(count($topRatedInfo) >= 10)
                                                                <span class="level_dv level3"></span>
                                                            @elseif($sellingOrders)
                                                            <?php $classLvl = ''; ?>
                                ?>
                                @if ($sellingOrders['0']->total_sum > 400 && $sellingOrders['0']->total_sum <= 1000)
                                    <?php $classLvl = 'level1'; ?>
                                @elseif($sellingOrders['0']->total_sum > 1000)
                                    <?php $classLvl = 'level2'; ?>
                                @endif
                                @if ($classLvl)
                                    <span class="level_dv <?php echo $classLvl; ?>"></span>
                                @endif
                                @endif
                                */?>
                            </div>
                            <?php
                        if ($recordInfo->user_status == 'Online') {
                            ?>
                            <div class="div_status is-online">
                                <i class="fa fa-circle"></i>
                                <?php echo $recordInfo->user_status; ?>
                            </div>
                            <?php
                        }
                        ?>
                            <h2>{!! $recordInfo->first_name . ' ' . $recordInfo->last_name !!}</h2>
                            <div class="pub_rat">
                                <script>
                                    $(function() {
                                        $('#avgRating22').raty({
                                            starOn: 'star-on.png',
                                            starOff: 'star-off.png',
                                            start: {{ $recordInfo->average_rating }},
                                            readOnly: true
                                        });
                                    });
                                </script>
                                <span class="pprate" id="avgRating22"></span>
                                <span class="pprate pub_cntr" id="avgRating22">{{ $recordInfo->average_rating }}
                                    ({{ $recordInfo->total_review }} Reviews)</span>
                                @if ($recordInfo->id != Session::get('user_id'))
                                    <span class="contct_per"><a href="javascript:void(0);" class="btn btn-primary"
                                            onclick='$("#info12").show();'data-toggle="modal" data-target="#myModal">Contact
                                            Me</a></span>
                                @endif
                            </div>
                            <div class="user-details">
                                <ul>
                                    <li><label><i class="fa fa-user" aria-hidden="true"></i>Member
                                            since</label><span>{!! $recordInfo->created_at->format('M Y') !!}</span></li>
                                    <li id="countryctn">
                                        <label class="cntry_div"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i>From</label>
                                        <span class="cnnnm cntry_right" id="countryid">
                                            <span id="cname">
                                                <?php
                                                $addd = [];
                                                if ($recordInfo->city) {
                                                    $addd[] = $recordInfo->city;
                                                }
                                                if (isset($recordInfo->Country->name)) {
                                                    $addd[] = $recordInfo->Country->name;
                                                }
                                                if ($recordInfo->zipcode) {
                                                    $addd[] = $recordInfo->zipcode;
                                                }
                                                echo implode(', ', $addd);
                                                ?>
                                            </span>
                                        </span>
                                    </li>
                                    <li id="statusctn" class="showall">
                                        <label class="cntry_div"><i class="fa fa-info" aria-hidden="true"></i>Status</label>
                                        <span class="cnnnm cntry_right" id="statusid">
                                            <?php
                                            $cls = '';
                                            if ($recordInfo->user_status == 'Online') {
                                                $cls = 'online-status';
                                            }
                                            ?>
                                            <span id="statusname" class="<?php echo $cls; ?>">
                                                <?php
                                                if ($recordInfo->user_status) {
                                                    $statusname = $recordInfo->user_status;
                                                    echo $recordInfo->user_status;
                                                }
                                                ?>
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-txtbx">
                            <div class="user-txt-bx">
                                <div id="descriptioncnt" class="showall">
                                    <h3>About myself</h3>
                                    <div id="profile-description">
                                        <div class="text show-more-height">
                                            <div class="text-section">
                                                <p id="desctext">{!! nl2br($recordInfo->description) !!}</p>
                                            </div>
                                        </div>
                                        <div class="show-more">(Show More)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-txt-bx">
                                <h3>Languages</h3>
                                <div class="text-section">
                                    <ul class="items-list" id="addlangdiv">
                                        @if ($recordInfo->languages)
                                            @foreach (json_decode($recordInfo->languages) as $key => $lang)
                                                <li id="{!! $key !!}">
                                                    <span class="title">{!! $lang->lang_name !!}</span>
                                                    <span class="sub-title">{!! $lang->lang_level !!}</span>
                                                    </span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="user-txt-bx">
                                <h3>Linked Accounts</h3>
                                <div class="text-section">
                                    <ul class="linked-acc">
                                        @if ($recordInfo->facebook_id)
                                            <li>
                                                <i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span>
                                            </li>
                                        @endif
                                        @if ($recordInfo->google_id)
                                            <li>
                                                <i class="fa fa-google" aria-hidden="true"></i><span>Google</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="user-txt-bx">
                                <h3>Skills</h3>
                                <div class="text-section">
                                    <ul class="linked-skills" id="addskilldiv">
                                        @if ($recordInfo->skills)
                                            @foreach (explode(',', $recordInfo->skills) as $skillid)
                                                <li id="s{!! $skillid !!}"> <span> {!! $skillsList[$skillid] !!}</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="user-txt-bx">
                                <h3>Education</h3>
                                <div class="text-section" id="addedudiv">
                                    @if ($recordInfo->educations)
                                        @foreach (json_decode($recordInfo->educations) as $key => $edu)
                                            <li id="{!! $key !!}">
                                                <div class="edutop"><span
                                                        class="title">{!! $edu->qual_name !!}</span><span
                                                        class="sub-title">{!! $edu->stream_name !!}</span> </div>
                                                <div class="edu_btm"><span class="title"> {!! $edu->university_name !!},
                                                        {!! $edu->country_name !!}, Pass in {!! $edu->year !!}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="user-txt-bx user-txt-bx-last">
                                <h3>Certification</h3>
                                <div class="text-section" id="addcertdiv">
                                    @if ($recordInfo->certifications)
                                        @foreach (json_decode($recordInfo->certifications) as $key => $cert)
                                            <li id="{!! $key !!}">
                                                <div class="edutop"><span class="title">{!! $cert->certificate_name !!}</span>
                                                </div>
                                                <div class="edu_btm"><span class="title"> {!! $cert->certificate_from !!}, Pass in
                                                        {!! $cert->year !!}</span></div>
                                            </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-8">
                        <div class="dashboard-rights-section">
                            <div class="row pubgig">
                                @if (!$mygigs->isEmpty())
                                    @foreach ($mygigs as $allrecord)
                                        <div class="col-sm-6 col-md-6 col-lg-4">
                                            <div class="thumbnail">
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
                                                        if (file_exists(GIG_FULL_UPLOAD_PATH . $allrecord->youtube_image)) {
                                                            $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                                        }
                                                    }
                                                    if ($gigimgname == '') {
                                                        $gigimgname = 'public/img/front/dummy.png';
                                                    }
                                                    ?>
                                                    <a href="{{ URL::to('gig-details/' . $allrecord->slug) }}"
                                                        class="">{{ HTML::image($gigimgname, SITE_TITLE, ['title' => $allrecord->title]) }}</a>
                                                </div>
                                                <div class="caption">
                                                    <h3><a href="{{ URL::to('gig-details/' . $allrecord->slug) }}">{{ $allrecord->title }}
                                                        </a></h3>
                                                    <div class="bottom_row">
                                                        @include('elements.likeunlike', [
                                                            'gid' => $allrecord->id,
                                                        ])
                                                        <a href="{{ URL::to('gig-details/' . $allrecord->slug) }}"
                                                            class="amount_list">{{ CURR . $allrecord->basic_price }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12">
                                        <div class="management-full">No gig posted by this user yet.</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if (!$myreviews->isEmpty())
                            <div class="letest-review">
                                <h2>Latest Reviews</h2>
                                <div class="client-rievews">
                                    @foreach ($myreviews as $allrecord)
                                        @if (isset($allrecord->Otheruser->first_name))
                                            <div class="client-chat">
                                                <div class="clientimg-about">
                                                    @if (isset($allrecord->Otheruser->profile_image) &&
                                                            file_exists(PROFILE_SMALL_UPLOAD_PATH . $allrecord->Otheruser->profile_image))
                                                        <a href="{{ URL::to('public-profile/' . $allrecord->Otheruser->slug) }}"
                                                            class="">{{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->Otheruser->profile_image, SITE_TITLE) }}</a>
                                                    @else
                                                        <a href="{{ URL::to('public-profile/' . $allrecord->Otheruser->slug) }}"
                                                            class="">{{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}</a>
                                                    @endif
                                                </div>
                                                <div class="client-rv">
                                                    <h3><a href="{{ URL::to('public-profile/' . $allrecord->Otheruser->slug) }}"
                                                            class="">{{ $allrecord->Otheruser->first_name . ' ' . $allrecord->Otheruser->last_name }}</a>
                                                    </h3>
                                                    <span class="review-date"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i>{{ $allrecord->created_at->diffForHumans() }}</span>
                                                    <div class="client-review-reting">
                                                        <script>
                                                            $(function() {
                                                                $('#lst{{ $allrecord->id }}').raty({
                                                                    starOn: 'star-on.png',
                                                                    starOff: 'star-off.png',
                                                                    start: {{ $allrecord->rating }},
                                                                    readOnly: true
                                                                });
                                                            });
                                                        </script>
                                                        <span class="lstreview lstreview_new"
                                                            id="lst{{ $allrecord->id }}"></span>
                                                        <b>{{ $allrecord->rating }}</b>
                                                    </div>
                                                    <p>
                                                        {{ nl2br($allrecord->comment) }}
                                                    </p>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </section>
    </div>

    <div class="modal fade publicprofile_modal" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="nzwh-wrapper">
                    <fieldset class="nzwh">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"> Send a Message</h4>
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
                                                <span id="charcount">0/2500</span>
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
    <script>
        $(".show-more").click(function() {
            if ($(".text").hasClass("show-more-height")) {
                $(this).text("(Show Less)");
            } else {
                $(this).text("(Show More)");
            }

            $(".text").toggleClass("show-more-height");
        });
    </script>
    <style>
        #profile-description {
            position: relative;
        }

        #profile-description .text {
            margin-bottom: 5px;
            position: relative;
            display: block;
        }

        #profile-description .show-more {
            color: #777;
            position: relative;
            font-size: 12px;
            padding-top: 0;
            height: 20px;
            cursor: pointer;
        }

        #profile-description .show-more:hover {
            color: #1779dd;
        }

        #profile-description .show-more-height {
            height: 65px;
            overflow: hidden;
            width: 100%;
        }
    </style>
@endsection
