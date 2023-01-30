@extends('layouts.home')
@section('content')
<div class="slider_wrap">
    <div class="slider_wrap_inner">
        <div id="container">
            {{HTML::image('public/img/front/a.jpg', SITE_TITLE)}}
            {{HTML::image('public/img/front/c.jpg', SITE_TITLE)}}
            {{HTML::image('public/img/front/d.jpg', SITE_TITLE)}}
            {{HTML::image('public/img/front/b.jpg', SITE_TITLE)}}
        </div>
    </div>    
    <div class="slider_contaent">
        <h1 class="slider_title">be your own boss</h1>  
        <div class="slider_con">It’s a marketplace which helps workers who are seeking for work</div>
        <div class="center_seacrh">
            <div class="search_bar desktop_search">
                {{ Form::open(array('url' => url('gigs'), 'method' => 'post',  'id' => 'searchform')) }}
                <div class="seacrh_in"><input type="text" name="title" class="form-control" placeholder="What Service are you looking for"></div>  
                <div class="search_btn"><input class="homesearch" type="submit" value="Get Started Now" /></div>
                <input type="hidden" value="1" id="pageidd" name="page"> 
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>

<div class="search_bar mobile_search">
    {{ Form::open(array('url' => url('gigs'), 'method' => 'post',  'id' => 'searchform')) }}
    <div class="seacrh_in"><input type="text" name="title" class="form-control" placeholder="What Service are you looking for"></div>  
    <div class="search_btn"><input class="homesearch_m" type="submit" value="Get Started Now" /></div>
    <input type="hidden" value="1" id="pageidd" name="page"> 
    {{ Form::close()}}
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
                    @if(isset($allrecord->User->slug))
                        @include('elements.gigbox')
                        @endif
                    @endforeach
               @endif
            </div>
        </div>
    </div>
</div>
<div class="introduce" id="introduce_new">
    <div class="wrapper">
        <div class="introduce_inner">
            <div class="introduce_left">
                <div class="introtite">Introducing {{ SITE_TITLE }}</div>  
                <div class="intro_con"> It’s a job marketplace which users can be register as a both poster
                    and worker.Works will be both online and offline.</div>
                <div class="know_more"><a href="{{URL::to( 'about-us')}}">Know More</a></div>
            </div>
             <div class="introduce_right">
        {{HTML::image('public/img/front/dummy.png', SITE_TITLE)}}
    </div>
        </div>   
    </div>   
</div>  

<section class="gigs-category">
    <div class="wrapper">
        <div class="jobs_itle">
            <h3 class="explore">Explore Gigs by Categories</h3>
            <div class="tiltee">Find best gig bur category </div>
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

<div class="slide_section">
    <div class="slide_section_inner">
        <div class="wrapper">
            <div class="slide_box">
                <div class="slide_botm">
                    <div class="slide_title">Your Terms</div> 
                    <div class="slide_con"> Whatever you need to simplify<br> your to do list, no matter your budget.</div>
                </div>
            </div>
            <div class="slide_box">
               
                <div class="slide_botm">
                    <div class="slide_title">Your Timeline</div> 
                    <div class="slide_con"> Find services based on your goals and<br> deadlines, it’s that simple.</div>
                </div>
            </div>
            <div class="slide_box">
               
                <div class="slide_botm">
                    <div class="slide_title">Your Safety</div> 
                    <div class="slide_con">our payment is always secure, Kartick <br>is builtto protect your peace of mind</div>
                </div>
            </div>
            <div class="slide_box">
               
                <div class="slide_botm">
                    <div class="slide_title"> 24/7 Support</div> 
                    <div class="slide_con"> We will provide you 24/7 support <br>so you dont face any problem.</div>
                </div>
            </div>
            <div class="slide_box">
                
                <div class="slide_botm">
                    <div class="slide_title">Quick Results</div> 
                    <div class="slide_con"> Easy to find the services and<br> getting work done quickly.</div>
                </div>
            </div>
            
            <div class="slide_box">               
                <div class="slide_botm">
                    <div class="slide_title">User Friendly </div> 
                    <div class="slide_con">From searching to payment to review, <br>the process is very user friendly</div>
                </div>
            </div>
            
           
        </div>
    </div>
</div>
@if(!$testimonils->isEmpty()) 
<div class="cilent_testimonial">
    <div class="wrapper cilent_wrap">
        <div class="cile_head"><h4 class="rece">Client Testimonials</h4></div>
        <div class="sliderr_wrap">
            <div id="testimonial" class="owl-carousel owl-theme owl-loaded">
                @foreach($testimonils as $allrecord)
                    <div class="sliderr_wrap_bx">
                        <div class="sliderr_wrap_inner">
                        <div class="sliderr_wrap_left">
                            {{HTML::image(TESTIMONIAL_SMALL_DISPLAY_PATH.$allrecord->image, SITE_TITLE)}}
                        </div> 
                        <div class="sliderr_wrap_right">
                            <div class="sliderr_wrap_right_top">{!! str_limit($allrecord->description, $limit = 120, $end = '...') !!}</div>
                            <div class="sliderr_wrap_right_botm">
                                <div class="botm_name"><b>{{$allrecord->client_name}}</b>
                                    <span class="simple_name">{{$allrecord->country}}</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach               
            </div>
        </div>
    </div>
</div>
@endif
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
                                    @if($allrecord->Seller->profile_image)
                                    <a href="{{ URL::to( 'public-profile/'.$allrecord->Seller->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @else
                                    <a href="{{ URL::to( 'public-profile/'.$allrecord->Seller->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @endif
                                </div>
                                <div class="_date">{{$allrecord->updated_at->format('d F Y')}}</div>                                
                            </div>
                            <div class="img_con_btm_bx">
                                <div class="img_con">{{$allrecord->Gig->title}}</div>
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

    $(document).ready(function () {
        $('.drop1').click(function () {
            if ($('.drop1').hasClass('open1')) {
                $('.drop1').removeClass('open1');
            } else {
                $('.drop1').addClass('open1');
            }
            $(".block1").slideToggle();
        });

        $('.drop2').click(function () {

            if ($('.drop2').hasClass('open2')) {
                $('.drop2').removeClass('open2');
            } else {
                $('.drop2').addClass('open2');
            }
            $(".block2").slideToggle();
        });

        $('.drop3').click(function () {

            if ($('.drop3').hasClass('open3')) {
                $('.drop3').removeClass('open3');
            } else {
                $('.drop3').addClass('open3');
            }

            $(".block3").slideToggle();
        });

        $('.drop4').click(function () {

            if ($('.drop4').hasClass('open4')) {
                $('.drop4').removeClass('open4');
            } else {
                $('.drop4').addClass('open4');
            }
            $(".block4").slideToggle();
        });

        $('.drop5').click(function () {

            if ($('.drop5').hasClass('open5')) {
                $('.drop5').removeClass('open5');
            } else {
                $('.drop5').addClass('open5');
            }
            $(".block5").slideToggle();
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
@endsection