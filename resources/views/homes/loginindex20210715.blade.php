@extends('layouts.dashboard')
@section('content')
<div class="main_dashboard">
    @include('elements.topcategories')
    <div class="login_section">
        <div class="container">
            <div class="row">
            <div class="col-sx-12 col-sm-4 col-md-3">
                <div class="user-box-login">
                    <h3 class="">Hi {{$loginuser->first_name .' '.$loginuser->last_name}},</h3>
                    <p> Get best offers from sellers for your service</p>
                    <a href="{{URL::to( 'services/create-request')}}" class="btn btn-primary">Post a Request</a>
                </div>
            </div>
            <div class="col-sx-12 col-sm-8 col-md-9">
             <div class="latest-bx">
                    <div id="pay_slider2" class="owl-carousel">
                        <div class="home-banners">
                            <div class="thumbnail">
                                <a href="javascript:void()">
                                 {{HTML::image('public/img/front/banner-home.jpg', SITE_TITLE)}}
                                <div class="caption">
                                    <h3>Find Best Service Provider</h3>
                                    <p>Find best service according to your requirement</p>
                                </div>
                                </a>
                            </div>
                       </div>
                        <div class="home-banners">
                            <div class="thumbnail">
                                <a href="javascript:void()">
                                    {{HTML::image('public/img/front/banner-home2.jpg', SITE_TITLE)}}
                                    <div class="caption">
                                        <h3>Get offer for seller</h3>
                                        <p>Get best offer for your service if you not proper seller</p>
                                    </div>
                                 </a>
                            </div>
                       </div>                          
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
                <div class="view-all-but"><a href="{{ URL::to( 'gigs')}}">View all<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
                <div class="home-gigs">
                    @if(!$gigcatlist->isEmpty()) 
                        @foreach($gigcatlist as $allrecord)
                            @include('elements.gigbox')
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@if(!$recentCompletedlist->isEmpty()) 
    <div class="completed_task">
    <div class="wrapper">
        <div class="completed_task"><h4 class="rece">Recently Completed Gigs</h4></div>    
        <div class="Recently">
            <div class="Recently_mid_row">               
                @foreach($recentCompletedlist as $allrecord)
                    <div class="rec_block">
                        <div class="rec_block_inner">
                            <div class="rec_img_top">
                                <div class="rec_img">
                                    @if(isset($allrecord->Seller->profile_image))
                                    <a href="{{ URL::to( 'public-profile/'.$allrecord->Seller->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @else
                                    <a href="{{ URL::to( 'public-profile/'.$allrecord->Seller->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @endif
                                </div>
                                <div class="_date">{{$allrecord->updated_at->format('d F Y')}}</div>                                
                            </div>
                            <div class="img_con_btm_bx">
                                <div class="img_con">{{$allrecord->Gig->title or ''}}</div>
                                <div class="img_con_btm">
                                    @if($allrecord->package == 'basic')
                                        {!! str_limit($allrecord->Gig->basic_description, $limit = 90, $end = '...') !!}
                                    @elseif($allrecord->package == 'standard')
                                        {!! str_limit($allrecord->Gig->basic_standard, $limit = 90, $end = '...') !!}
                                    @else($allrecord->package == 'premium')
                                        {!! str_limit($allrecord->Gig->basic_premium, $limit = 90, $end = '...') !!}
                                    @endif    
                                </div>
                            </div>
                        </div>    
                    </div> 
                @endforeach
            </div>
        </div>
<!--        <div class="cate cate_new"><a href="#">Browse more tasks</a></div>-->
    </div>
</div>
@endif
@endsection
