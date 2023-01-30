@extends('layouts.home')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('.search-area').on("keyup click", function () { 
            $(".search-bar-panel").show();
            $(".is_service_selected").val(0);
            //alert();
            //if (e.which == 13) {
            keyword = $('.search-area').val();
            if (keyword) {
                $(".dlt-keyword").show();
                var currentRequest = null;
                $.ajaxSetup({cache: false}); // assures the cache is emptyDownload The App Now
                if (currentRequest != null) {
                    currentRequest.abort();
                    currentRequest = null;
                }
                currentRequest = $.ajax({
                    type: 'POST',
                    url: "<?php echo HTTP_PATH . '/gigs/getkeyword'; ?>",
                    data: {'keyword': keyword, "_token": "{{ csrf_token() }}"},
                    cache: false,

                    beforeSend: function () {

                    },
                    success: function (data) {
                        //  $("#wrkr_srch_ldr").hide();
                        //NProgress.done();
                        $(".searchgig").html('');
                        $(".searchgig").html(data);

                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });

            } else {
                $(".dlt-keyword").hide();
                $(".searchgig").html("");
                $(".is_service_selected").val(0);
            }
            return false;    //<---- Add this line
            // }
        });

        $('.dlt-keyword').on("click", function () {
            $(".searchgig").html("");
            $(".search-area").val("").focus();
            $(".is_service_selected").val(0);
            $(".dlt-keyword").hide();
        });
        $(".searchform").validate();
        $(".searchform").submit(function (event) {
            //alert(1);
            if ($('ul.user-ul li').hasClass('selected')) {
                //alert(2);
                userslug = $('ul.user-ul li.selected').attr('id');
                //alert(userslug);
                location.href = "{{HTTP_PATH}}/public-profile/" + userslug;
                event.preventDefault();
            }

        });
        $(document).on('click', function (event) {
            if (!$(event.target).closest('.center_seacrh').length && !$(event.target).closest('.search-bar-panel').length) {
                $(".search-bar-panel").hide();
            }
        });
    });
</script>
<section class="slider">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <?php $i=1;?>
            @foreach($bannerList as $banner)
            @php $clasBan = ''; 
            $bancls = '';
            @endphp
            @if($i == 1)
                @php $clasBan = 'active'; 
                $bancls = 'frfgggggtgtg';
                @endphp
            @endif
            <div class="carousel-item <?php echo $clasBan;?>">
                {{HTML::image(BANNER_DISPLAY_PATH.$banner->name, SITE_TITLE,array('class'=>$bancls))}}
                </div>
                @php $i++;@endphp
            @endforeach
            <!--<div class="carousel-item active">-->
            <!--    {{HTML::image('public/img/front/banner1.jpg', SITE_TITLE,array('class'=>'frfgggggtgtg'))}}-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--    {{HTML::image('public/img/front/banner2.jpg', SITE_TITLE)}}-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--    {{HTML::image('public/img/front/banner3.jpg', SITE_TITLE)}}-->
            <!--</div>-->
        </div>
        <div class="slider_contaent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h1 class="slider_title">be your own boss</h1>
                        <div class="slider_con">It’s a marketplace which helps workers who are seeking for work</div>
                        <div class="center_seacrh">
                            <div class="search_bar desktop_search">
                                <div class="center_seacrh">
                                    <div class="search_bar desktop_search">
                                        {{ Form::open(array('url' => url('gigs'), 'method' => 'post', 'class' => 'searchform', 'id' => 'searchform')) }}
                                        <div class="seacrh_in">
                                            <input id="search-area" autocomplete="off" type="text" name="title" class="required search-area form-control" placeholder="Which service are you looking for?">
                                            <div class="dlt-keyword" style="display:none;">x</div>
                                        </div>  
                                        <div class="search_btn"><input class="homesearch" type="submit" value="Search" /></div>
                                        <input type="hidden" value="1" id="pageidd" name="page"> 
                                        <input type="hidden" id="is_service_selected" name="is_service_selected" class="is_service_selected"> 
                                        {{ Form::close()}}
                                        <div class="searchgig" id="searchgig">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="category">
                                <li><a href="javascript:void(0);" class="active">Popular: </a></li>
                                @if($globalCategories)
                        @foreach($globalCategories as $cat)
                                <li><a href="{{URL::to( 'gigs/'.$cat->slug)}}">{!! $cat->name !!} </a></li>
                                @if($loop->iteration == 3)
                                @break
                            @endif
                            @endforeach 
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="Purchase-Membership">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">

                    <h2>Popular Professional Services</h2>

                </div>
            </div>
        </div>
        <div id="popularprofes" class="owl-carousel owl-theme">
            @if($globalCategories)
            @foreach($globalCategories as $cat)
            <div class="item_owl">
            <div class="purchase-categorys">
                {{HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->home_image, SITE_TITLE)}}
                <div class="popular">
                    <p>{!! $cat->sub_title !!}</p>
                    <!--<h3><a href="{{URL::to( 'gigs/'.$cat->slug)}}">{!! $cat->name !!}</a></h3>-->
                    <h3>{!! $cat->name !!}</h3>
                </div>
            </div>
            </div>
            @if($loop->iteration == 5)
            @php break @endphp
            @endif
            @endforeach                    
            @endif
            
            

        </div>
    </div>
</section>




<section class="recently_added">
    <div class="container">
        <div class="jobs_itle">
            <div class="row">
                <div class="col-md-11">
                    <div class="section-title text-center">
                        <h2 class="">Recently Added Gigs</h2>    
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="view-all-but text-right"><a href="{{ URL::to( 'gigs')}}">View all</a></div>
                </div>
            </div>
            <div class="home-gigs">
                @if(!$gigcatlist->isEmpty()) 
                @foreach($gigcatlist as $allrecord)
                @if(isset($allrecord->User->slug))
                @include('elements.gigbox')
                @endif
                @endforeach
                @endif

            </div>
        </div>
    </div>
</section>




<section class="explore_marketplace">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="">Explore The Marketplace</h2>
        </div>
        <div class="gategory-gigs">
            @if($globalCategories)
            @foreach($globalCategories as $cat)
            <div class="gigs-category-bx">
                <div class="thumbnail">
                    <a href="{{URL::to( 'gigs/'.$cat->slug)}}">
                        <div class="gigs-category-img">
                            {{HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->image, SITE_TITLE)}}
                        </div>
                        <div class="caption">
                            <h3>{!! $cat->name !!}</h3>
                            <p>{!! $cat->description !!}</p>
                        </div>
                    </a>
                </div>
            </div>
            @if($loop->iteration == 8)
            @php break @endphp
            @endif
            @endforeach                    
            @endif
            <div class="cate"><a href="{{URL::to('categories')}}">All Categories</a></div>
        </div>
    </div>
</section>
<section class="introducing_gigger">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="introducing_gigger_text">
                    <h5>Introducing <?php echo SITE_TITLE; ?></h5>
                    <div class="your_terms">
                        <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)}}</span>Your Terms</h6>
                        <p class="text-left">Whatever you need to simplify your to do list, no matter your budget.</p>
                    </div>
                    <div class="your_terms">
                        <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)}}</span>Your Timeline</h6>
                        <p class="text-left">Find services based on your goals and deadlines, it’s that simple.</p>
                    </div>
                    <div class="your_terms">
                        <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)}}</span>Your Safety</h6>
                        <p class="text-left">our payment is always secure, Kartick is builtto protect your peace of mind</p>
                    </div>

                    <div class="your_terms">
                        <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)}}</span>24/7 Support</h6>
                        <p class="text-left">We will provide you 24/7 support so you dont face any problem.</p>
                    </div>

                    <div class="your_terms">
                        <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)}}</span>Quick Results</h6>
                        <p class="text-left">Easy to find the services and getting work done quickly.</p>
                    </div>
                    <div class="your_terms">
                        <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)}}</span>User Friendly</h6>
                        <p class="text-left">From searching to payment to review, the process is very user friendly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(!$recentCompletedlist->isEmpty()) 
<section class="reviews">
    <h4 class="main-title text-center pb-4">Recently Completed Gigs</h4>
    <div class="container">
        <div class="owl-carousel" id="recently-completed">
            <!-- card -->
            @foreach($recentCompletedlist as $allrecord)
                @if(isset($allrecord->Seller))
            <div class="item">
                <div class=" card">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                            <div class="user">
                                @if($allrecord->Seller->profile_image)
                                    <a href="{{ URL::to( 'public-profile/'.$allrecord->Seller->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @else
                                    <a href="{{ URL::to( 'public-profile/'.$allrecord->Seller->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @endif
                            </div>
                        </div>
                        <div class="col-xs-7 col-7 info-col">
                            <h4 class="title">{{$allrecord->Gig->Category->name}}</h4>
                            <h6 class="sub-title">{{$allrecord->updated_at->format('d F Y')}}</h6>

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text_p">
                            <p>{{$allrecord->Gig->title}}</p>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                            <p></p>
                            <p>@if($allrecord->package == 'basic')
                                        {!! str_limit($allrecord->Gig->basic_description, $limit = 90, $end = '...') !!}
                                    @elseif($allrecord->package == 'standard')
                                        {!! str_limit($allrecord->Gig->basic_standard, $limit = 90, $end = '...') !!}
                                    @else($allrecord->package == 'premium')
                                        {!! str_limit($allrecord->Gig->basic_premium, $limit = 90, $end = '...') !!}
                                    @endif</p>
                        </div>
                    </div>
                </div>
            </div>
                @endif
                @endforeach
            
        </div>
    </div>
</section>
@endif
@if(!$testimonils->isEmpty()) 
<section class="testimonials reviews">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Testimonial</h2>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="customers-testimonials" class="owl-carousel">
                    <!--TESTIMONIAL 1 -->
                    @foreach($testimonils as $allrecord)
                    <div class="item">
                        <div class=" card">
                           
                                <div class="user-img">
                                    <div class="user">
                                        {{HTML::image(TESTIMONIAL_SMALL_DISPLAY_PATH.$allrecord->image, SITE_TITLE)}}
                                    </div>
                                </div>
                                <div class="user-details">
                                    <h4 class="title grahem">{{$allrecord->client_name}}</h4>
                                    <h6 class="sub-title genarel">{{$allrecord->country}}</h6>

                                </div>
<!--                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                    <ul class="rating">
                                        <li>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                </div>-->
                                <div class="testmonila-descrimtion p-col">
                                    <p>{!! str_limit($allrecord->description, $limit = 120, $end = '...') !!}</p>
                                </div>
                           
                        </div>
                    </div>
                    @endforeach  
                    <!--END OF TESTIMONIAL 1 -->


                </div>
                <!--END OF TESTIMONIAL 5 -->
            </div>
        </div>
    </div>
</div>
</section>
@endif


<section class="Introducing">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="introducing_freelance" data-aos="flip-up">
                    <h6>Introducing {{ SITE_TITLE }}</h6>
                    <p>It’s a job marketplace which users can be register as a both poster
                        and worker.Works will be both online and offline.</p>
                    <a class="get_started" href="{{URL::to( 'about-us')}}">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="download_the_app">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="text">
                    <h5>Download The App Now</h5>
                    <p>Connect to opportunities and show your professional potential to the world with us. As the world’s most affordable and easiest to use the digital marketplace, <?php echo SITE_TITLE;?> enables freelancers and entrepreneurs to start doing, growing and succeeding. Geography, time, and budget are no longer barriers.</p>
                    <ul class="android">
                        <li> <i class="fa fa-android" aria-hidden="true"></i><br><span>ANDROID </span></li>
                        <li> <i class="fa fa-apple" aria-hidden="true"></i> <br><span>IOS</span> </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="img_section">
                    {{HTML::image('public/img/front/home/download_the.png', SITE_TITLE)}}
                </div>
            </div>
        </div>
    </div>
</section>
{{ HTML::script('public/js/front/pageScript.js')}}
<script type="text/javascript">

    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });

    $('#toTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
</script>

<script type="text/javascript">
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 1100) {
            $('.menu_in').addClass('fixedmenu').fadeIn();
        } else {
            $('.menu_in').removeClass('fixedmenu').fadeOut();
        }
    });
</script>
<!--<script src='https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js'></script>
<script type="text/javascript">
    AOS.init({
        duration: 1200
    });
</script>-->
<script type="text/javascript">
    $('#videoLink')
            .magnificPopup({
                type: 'inline',
                midClick: true
            })

    $(document).ready(function () {
        $('.dropp').click(function () {
            $(".openn").slideToggle();
        });
    });

    $('#offerslider').owlCarousel({
        rtl: false,
        loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 1000,
        smartSpeed: 1000,
        slideSpeed: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {items: 1},
            479: {items: 1},
            640: {items: 2},
            766: {items: 2},
            900: {items: 3},
            1100: {items: 3},
            1280: {items: 3}
        }

    })

    $(document).ready(function () {
        $("#login").click(function () {
            $("#forget_pop_up").toggle();
        });
        $(".close_div").click(function () {
            $("#forget_pop_up").hide();
        });
    });

    $(document).ready(function () {

        $(".close_div").click(function () {
            $("#forget_pop_up").hide();

        });

    });
</script>
<script>
    jQuery(document).ready(function ($) {
        "use strict";
        //  TESTIMONIALS CAROUSEL HOOK
        $('#customers-testimonials').owlCarousel({
            loop: true,
            margin: 35,
            nav: true,
            center: true,
            autoplay: false,
            dots: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#popularprofes').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {items: 1, nav: true},
                600: {items: 2, nav: false},
                1000: {items: 5, nav: true, loop: true, margin: 20
                }
            }
        })
    })
</script>
<script>
    $(".reviews .owl-carousel").owlCarousel({
        loop: true,
        margin: 35,
        nav: true,
        center: true,
        autoplay: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
</script>
@endsection