@extends('layouts.home')
@section('content')
  <section class="slider">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
               {{HTML::image('public/img/front/banner1.jpg', SITE_TITLE)}}
          </div>
          <div class="carousel-item">
               {{HTML::image('public/img/front/banner2.jpg', SITE_TITLE)}}
          </div>
          <div class="carousel-item">
               {{HTML::image('public/img/front/banner3.jpg', SITE_TITLE)}}
          </div>
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
                {{ Form::open(array('url' => url('gigs'), 'method' => 'post',  'id' => 'searchform')) }}
                <div class="seacrh_in"><input type="text" name="title" class="form-control" placeholder="What Service are you looking for"></div>  
                <div class="search_btn"><input class="homesearch" type="submit" value="Get Started Now" /></div>
                <input type="hidden" value="1" id="pageidd" name="page"> 
                {{ Form::close()}}
            </div>
        </div>
                    </div>
                    <ul class="category">
                      <li><a href="#" class="active">Popular: </a></li>
                      <li><a href="#">Voice Over </a></li>
                      <li><a href="#"> Translation  </a></li>
                      <li><a href="#">  Logo Design  </a></li>
                      <li><a href="#">  Articles & Blog Posts  </a></li>
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
            <div class="item_owl">
              {{HTML::image('public/img/front/home/popular1.png', SITE_TITLE)}}
              <div class="popular">
                <p>Build your website</p>
                <h3>PHP Designing</h3>
              </div>
            </div>
            <div class="item_owl">
              {{HTML::image('public/img/front/home/popular1.png', SITE_TITLE)}}
              <div class="popular">
                <p>Build your website</p>
                <h3>Logo Designing</h3>
              </div>
            </div>
            <div class="item_owl">
              {{HTML::image('public/img/front/home/popular3.png', SITE_TITLE)}}
              <div class="popular">
                <p>Learn Your Business</p>
                <h3>Data Entry</h3>
              </div>
            </div>
            <div class="item_owl">
              {{HTML::image('public/img/front/home/popular4.png', SITE_TITLE)}}
              <div class="popular">
                <p>Renovate your home or office</p>
                <h3>Interior Designer</h3>
              </div>
            </div>
            
            <div class="item_owl">
              {{HTML::image('public/img/front/home/popular5.png', SITE_TITLE)}}
              <div class="popular">
                <p>Wedding photography</p>
                <h3>Photographer</h3>
              </div>
            </div>
            
          </div>
        </div>
      </section>




<div class="jobs_sction">
    <div class="container">
        <div class="jobs_itle">
             <div class="gifg">
            <div class="job-gigs-ss">
            <h3 class="explore">Recently Added Gigs</h3>    
            <div class="tiltee">Get inspired to build your business</div>
            </div>
            <div class="view-all-but"><a href="{{ URL::to( 'gigs')}}">View all<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
             </div>
            <div class="home-gigs">
            <div class="row">
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
</div>


  

<section class="gigs-category">
    <div class="container">
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
  <section class="introducing_gigger">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                          <div class="introducing_gigger_text">
                            <h5>Introducing LS Gigger</h5>
                            <div class="your_terms">
                              <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon_img.png', SITE_TITLE)}}</span>Your Terms</h6>
                              <p class="text-left">Whatever you need to simplify your to do list, no matter your budget.</p>
                            </div>
                            <div class="your_terms">
                              <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon_img.png', SITE_TITLE)}}</span>Your Timeline</h6>
                              <p class="text-left">Find services based on your goals and deadlines, it’s that simple.</p>
                            </div>
                            <div class="your_terms">
                              <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon_img.png', SITE_TITLE)}}</span>Your Safety</h6>
                              <p class="text-left">our payment is always secure, Kartick is builtto protect your peace of mind</p>
                            </div>
                            
                            <div class="your_terms">
                              <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon_img.png', SITE_TITLE)}}</span>24/7 Support</h6>
                              <p class="text-left">We will provide you 24/7 support so you dont face any problem.</p>
                            </div>
                            
                            <div class="your_terms">
                              <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon_img.png', SITE_TITLE)}}</span>Quick Results</h6>
                              <p class="text-left">Easy to find the services and getting work done quickly.</p>
                            </div>
                            <div class="your_terms">
                              <h6 class="text-left"><span>{{HTML::image('public/img/front/home/icon_img.png', SITE_TITLE)}}</span>User Friendly</h6>
                              <p class="text-left">From searching to payment to review, the process is very user friendly</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

@if(!$testimonils->isEmpty()) 
 <section class="reviews">
                    <h4 class="main-title text-center font-weight-bold pb-4">Recently Completed Gigs</h4>
                    <div class="container">
                        <div class="owl-carousel" id="recently-completed">
                        <!-- card -->
                        <div class="item">
                          <div class=" card">
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                <div class="user">
                                       {{HTML::image('public/img/front/home/recently3.png', SITE_TITLE)}}
                                  </div>
                              </div>
                              <div class="col-xs-7 col-7 info-col">
                                <h4 class="title">Packaging Design</h4>
                                <h6 class="sub-title">28 September 2018</h6>
                                
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text_p">
                                <p>I will be your social media marketing manager</p>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                <p>I'll take up to ten customized food photos for your website or social media.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- card -->
                        <div class="item">
                          <div class=" card">
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                <div class="user">
                                       {{HTML::image('public/img/front/home/recently3.png', SITE_TITLE)}}
                                  </div>
                              </div>
                              <div class="col-xs-7 col-7 info-col">
                                <h4 class="title">Prototype Design</h4>
                                <h6 class="sub-title">16 October 2019</h6>
                                
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text_p">
                                <p>I will write killer sales pages that explode profits</p>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                <p></p>
                                <p>500 words of smart content that keeps your audience engaged and wanting more... much more.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- card -->
                        <div class="item">
                          <div class=" card">
                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                  <div class="user">
                                       {{HTML::image('public/img/front/home/recently3.png', SITE_TITLE)}}
                                  </div>
                              </div>
                              <div class="col-xs-7 col-7 info-col">
                                <h4 class="title">Map Design</h4>
                                <h6 class="sub-title">16 October 2019</h6>
                                
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text_p">
                                <p>I will be your social media marketing manager</p>
                              </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                <p>I'll take up to ten customized food photos for your website or social media.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
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
                            <div class="item">
                              <div class=" card">
                                <div class="row">
                                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                    <div class="user">
                                       {{HTML::image('public/img/front/home/testimonail1.jpg', SITE_TITLE)}}
                                  </div>
                                  </div>
                                  <div class="col-xs-7 col-7 info-col">
                                    <h4 class="title grahem">Graham</h4>
                                    <h6 class="sub-title genarel">Genarel Customer</h6>
                                    
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
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
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                    <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing selection. help agencies.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--END OF TESTIMONIAL 1 -->
                            <!--TESTIMONIAL 2 -->
                            <div class="item">
                              <div class=" card">
                                <div class="row">
                                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                    <div class="user">
                                       {{HTML::image('public/img/front/home/testimonail2.jpg', SITE_TITLE)}}
                                  </div>
                                  </div>
                                  <div class="col-xs-7 col-7 info-col">
                                    <h4 class="title grahem">Edward</h4>
                                    <h6 class="sub-title genarel">Genarel Customer</h6>
                                    
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
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
                                  </div>
                                  
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                    <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing selection. help agencies.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--END OF TESTIMONIAL 2 -->
                            <!--TESTIMONIAL 3 -->
                            <div class="item">
                              <div class=" card">
                                <div class="row">
                                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                    <div class="user">
                                       {{HTML::image('public/img/front/home/testimonail2.jpg', SITE_TITLE)}}
                                  </div>
                                  </div>
                                  <div class="col-xs-7 col-7 info-col">
                                    <h4 class="title grahem">Charlotte</h4>
                                    <h6 class="sub-title genarel">Genarel Customer</h6>
                                    
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
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
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                    <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing selection. help agencies.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--END OF TESTIMONIAL 3 -->
                            <!--TESTIMONIAL 4 -->
                            <div class="item">
                              <div class=" card">
                                <div class="row">
                                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                                    
                                    <div class="user">
                                       {{HTML::image('public/img/front/home/testimonail1.jpg', SITE_TITLE)}}
                                  </div>
                                  </div>
                                  <div class="col-xs-7 col-7 info-col">
                                    <h4 class="title grahem">Graham</h4>
                                    <h6 class="sub-title genarel">Genarel Customer</h6>
                                    
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
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
                                  </div>
                                  
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                                    <p>When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing selection. help agencies.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--END OF TESTIMONIAL 4 -->
                            <!--TESTIMONIAL 5 -->
                            
                            
                          </div>
                          <!--END OF TESTIMONIAL 5 -->
                        </div>
                      </div>
                    </div>
                  </div>
                </section>



<div class="cilent_testimonial" style="display: none">
    <div class="container cilent_wrap">
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
<div class="completed_task" style="display: none">
    <div class="container">
        <div class="completed_task"><h4 class="rece">Recently Completed Gigs</h4></div>    
        <div class="Recently">
            <div class="Recently_mid_row">               
                @foreach($recentCompletedlist as $allrecord)
                @if(isset($allrecord->Seller))
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
                @endif
                @endforeach
            </div>
        </div>
        
<!--        <div class="cate cate_new"><a href="#">Browse more tasks</a></div>-->
    </div>
</div>
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
                          <p>NODO Crypt offers unique cryptocurrency solutions that are multiplatform and easy-to-use. Our online exchange can be used on the go and it perfectly fits owners of Bitcoin and other cryptocurrencies.</p>
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
                jQuery(document).ready(function($) {
                "use strict";
                //  TESTIMONIALS CAROUSEL HOOK
                $('#customers-testimonials').owlCarousel({
                loop: true,
                margin: 35,
                nav: true,
                center: true,
                autoplay: true,
                dots:true,
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