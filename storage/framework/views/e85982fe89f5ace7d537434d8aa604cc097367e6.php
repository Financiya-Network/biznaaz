
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    data: {'keyword': keyword, "_token": "<?php echo e(csrf_token()); ?>"},
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
                location.href = "<?php echo e(HTTP_PATH); ?>/public-profile/" + userslug;
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
<style>
@media  only screen and (min-width: 900px)
  .img-res {
    height: 680px;
  }
  
  .gategory-gigs .gigs-category-bx:hover {

  position: relative;
  animation: mymove 2s;
}
@keyframes  mymove {
  from {left: 0px;}
  to {left: 200px;}
}
</style>
<section class="slider text-white">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner responsive2">
            <?php $i = 1; ?>
            <?php $__currentLoopData = $bannerList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $clasBan = ''; 
            $bancls = 'img-res';
            ?>
            <?php if($i == 1): ?>
            <?php $clasBan = 'active'; 
            $bancls = 'frfgggggtgtg';
            ?>
            <?php endif; ?>
            <div class="carousel-item <?php echo $clasBan; ?>">
                <?php echo e(HTML::image(BANNER_DISPLAY_PATH.$banner->name, SITE_TITLE,array('class'=>$bancls,'width'=>'100%'))); ?>

                <div class="carousel-caption slider-txt">
                    <div class="container">
                        <div class="slider_title text-white"><?php echo e($banner->title); ?></div>
                        <div class="slider_con text-white"><?php echo e($banner->subtitle); ?></div>
                    </div>
                </div>


            </div>
            <?php $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--<div class="carousel-item active">-->
            <!--    <?php echo e(HTML::image('public/img/front/banner1.jpg', SITE_TITLE,array('class'=>'frfgggggtgtg'))); ?>-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--    <?php echo e(HTML::image('public/img/front/banner2.jpg', SITE_TITLE)); ?>-->
            <!--</div>-->
            <!--<div class="carousel-item">-->
            <!--    <?php echo e(HTML::image('public/img/front/banner3.jpg', SITE_TITLE)); ?>-->
            <!--</div>-->
        </div>
        <div class="slider_contaent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!--<h1 class="slider_title">be your own boss</h1>
                        <div class="slider_con">It’s a marketplace which helps workers who are seeking for work</div>-->
                        <div class="center_seacrh">
                            <div class="search_bar desktop_search">
                                <div class="center_seacrh">
                                    <div class="search_bar desktop_search">
                                        <?php echo e(Form::open(array('url' => url('gigs'), 'method' => 'post', 'class' => 'searchform', 'id' => 'searchform'))); ?>

                                        <div class="seacrh_in">
                                            <input id="search-area" autocomplete="off" type="text" name="title" class="required search-area form-control" placeholder="Which service are you looking for?">
                                            <div class="dlt-keyword" style="display:none;">x</div>
                                        </div>  
                                        <div class="search_btn"><input class="homesearch" type="submit" value="Search" /></div>
                                        <input type="hidden" value="1" id="pageidd" name="page"> 
                                        <input type="hidden" id="is_service_selected" name="is_service_selected" class="is_service_selected"> 
                                        <?php echo e(Form::close()); ?>

                                        <div class="searchgig" id="searchgig">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="category text-white">
                                <li><a href="javascript:void(0);" class="text-white">Popular: </a></li>
                                <?php if($globalCategories): ?>
                                <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(URL::to( 'gigs/'.$cat->slug)); ?>" class="text-white"><?php echo $cat->name; ?> </a></li>
                                <?php if($loop->iteration == 3): ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="hidden" style="overflow: hidden; display: none; opacity: 0">
<h1>Biznaaz</h1>
<h2>Online Marketplace Software</h2>
</div>
<section class="Purchase-Membership mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="Purchase-Membership-Title">Popular Professional Services</div>
                </div>
            </div>
        </div>
        <div id="popularprofes" class="responsive owl-carousel owl-theme">
            <?php if($globalCategories): ?>
            <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item_owl ">
                <div class="purchase-categorys d-flex justify-content-center">
                    <?php echo e(HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->home_image, SITE_TITLE, array('width' => '260px'))); ?>

                    <div class="popular">
                        <p><?php echo $cat->sub_title; ?></p>
                        <!--<h3><a href="<?php echo e(URL::to( 'gigs/'.$cat->slug)); ?>"><?php echo $cat->name; ?></a></h3>-->
                        <h3><?php echo $cat->name; ?></h3>
                    </div>
                </div>
            </div>
            <?php if($loop->iteration == 5): ?>
            <?php break ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
            <?php endif; ?>
         
                  </div>

    </div>
</section>

<section class="text-white py-5" style="background-color:#003264 !important;">
    <div class="banner">
  <div class="container-fluid">
    <div class="row d-flex align-items-center">
      <div class="col-sm-4 order-2 offset-1 order-sm-1">
        <h1 class="fw-bold display-4">Coding</h1>
        <p>You don't need to read this. Now that you hav decided to read it anyways, its just some random dummy text to fill up the space for Bootstrap banner or hero section.</p>
        <a href="#" class="btn btn-light my-3"> Learn More</a>
      </div>
      <div class="col-sm-7 order-1 order-sm-2 d-flex justify-content-start">
        <img src="https://fiverr-res.cloudinary.com/q_auto,f_auto,w_870,dpr_1.0/v1/attachments/generic_asset/asset/d9c17ceebda44764b591a8074a898e63-1599597624757/business-desktop-870-x1.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</div>
</section>



<section class="explore_marketplace">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="">Explore The Marketplace</h2>
        </div>
        <div class="gategory-gigs cate_div" id="cate_div">
            <?php if($globalCategories): ?>
            <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="gigs-category-bx">
                <div class="thumbnail">
                    <a href="<?php echo e(URL::to( 'gigs/'.$cat->slug)); ?>">
                        <div class="gigs-category-img">
                          	
                            <?php echo e(HTML::image(CATEGORY_FULL_DISPLAY_PATH.$cat->image, SITE_TITLE)); ?>

                        </div>
                        <div class="caption">
                            <h3><?php echo $cat->name; ?></h3>
                            <p><?php echo $cat->description; ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php if($loop->iteration == 8): ?>
            <?php break ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
            <?php endif; ?>
            <div class="cate"><a href="<?php echo e(URL::to('categories')); ?>">All Categories</a></div>
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
                        <h6 class="text-left"><span><?php echo e(HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)); ?></span>Your Terms</h6>
                        <p class="text-left">Whatever you need to simplify your to do list, no matter your budget.</p>
                    </div>
                    <div class="your_terms">
                        <h6 class="text-left"><span><?php echo e(HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)); ?></span>Your Timeline</h6>
                        <p class="text-left">Find services based on your goals and deadlines, it’s that simple.</p>
                    </div>
                    <div class="your_terms">
                        <h6 class="text-left"><span><?php echo e(HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)); ?></span>Your Safety</h6>
                        <p class="text-left">our payment is always secure, Kartick is builtto protect your peace of mind</p>
                    </div>

                    <div class="your_terms">
                        <h6 class="text-left"><span><?php echo e(HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)); ?></span>24/7 Support</h6>
                        <p class="text-left">We will provide you 24/7 support so you dont face any problem.</p>
                    </div>

                    <div class="your_terms">
                        <h6 class="text-left"><span><?php echo e(HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)); ?></span>Quick Results</h6>
                        <p class="text-left">Easy to find the services and getting work done quickly.</p>
                    </div>
                    <div class="your_terms">
                        <h6 class="text-left"><span><?php echo e(HTML::image('public/img/front/home/icon-mark.png', SITE_TITLE)); ?></span>User Friendly</h6>
                        <p class="text-left">From searching to payment to review, the process is very user friendly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(!$recentCompletedlist->isEmpty()): ?> 
<section class="reviews">
    <h4 class="main-title text-center pb-4">Recently Completed Gigs</h4>
    <div class="container">
        <div class="owl-carousel" id="recently-completed">
            <!-- card -->
            <?php $__currentLoopData = $recentCompletedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($allrecord->Seller)): ?>
            <div class="item">
                <div class=" card">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 img-col">
                            <div class="user">
                                <?php if($allrecord->Seller->profile_image): ?>
                                <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Seller->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Seller->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-7 col-7 info-col">
                            <h4 class="title"><?php echo e($allrecord->Gig->Category->name); ?></h4>
                            <h6 class="sub-title"><?php echo e($allrecord->updated_at->format('d F Y')); ?></h6>

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text_p">
                            <p><?php echo e($allrecord->Gig->title); ?></p>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 p-col">
                            <p></p>
                            <p><?php if($allrecord->package == 'basic'): ?>
                                <?php echo str_limit($allrecord->Gig->basic_description, $limit = 90, $end = '...'); ?>

                                <?php elseif($allrecord->package == 'standard'): ?>
                                <?php echo str_limit($allrecord->Gig->basic_standard, $limit = 90, $end = '...'); ?>

                                <?php else: ?>
                                <?php echo str_limit($allrecord->Gig->basic_premium, $limit = 90, $end = '...'); ?>

                                <?php endif; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!$testimonils->isEmpty()): ?> 
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
                    <?php $__currentLoopData = $testimonils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class=" card">

                            <div class="user-img">
                                <div class="user">
                                    <?php echo e(HTML::image(TESTIMONIAL_SMALL_DISPLAY_PATH.$allrecord->image, SITE_TITLE)); ?>

                                </div>
                            </div>
                            <div class="user-details">
                                <h4 class="title grahem"><?php echo e($allrecord->client_name); ?></h4>
                                <h6 class="sub-title genarel"><?php echo e($allrecord->country); ?></h6>

                            </div>
                            <!--                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                                <ul class="rating">
                                                                    <li>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-star-o"></i>download_the_app
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
                                <p><?php echo str_limit($allrecord->description, $limit = 120, $end = '...'); ?></p>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    <!--END OF TESTIMONIAL 1 -->


                </div>
                <!--END OF TESTIMONIAL 5 -->
            </div>
        </div>
    </div>
</div>
</section>
<?php endif; ?>


<section class="Introducing">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="introducing_freelance" data-aos="flip-up">
                    <h6>Introducing <?php echo e(SITE_TITLE); ?></h6>
                    <p>It’s a job marketplace which users can be register as a both poster
                        and worker.Works will be both online and offline.</p>
                    <a class="get_started" href="<?php echo e(URL::to( 'about-us')); ?>">Get Started</a>
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
                    <p>Connect to opportunities and show your professional potential to the world with us. As the world’s most affordable and easiest to use the digital marketplace, <?php echo SITE_TITLE; ?> enables freelancers and entrepreneurs to start doing, growing and succeeding. Geography, time, and budget are no longer barriers.</p>
                    <ul class="android">
						<li> <img  src="public/img/front/home/Play_Store.png" height="50" aria-hidden="true"></li>
						<li> <img  src="public/img/front/home/App_Store.png"  height="50" aria-hidden="true"></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="img_section">
                    <?php echo e(HTML::image('public/img/front/home/download_the.png', SITE_TITLE)); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php echo e(HTML::script('public/js/front/pageScript.js')); ?>

<style>
    .hidden {
	overflow: hidden;
}
</style>
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

    $('#offerslider').
    ({
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
                767: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1170: {
                    items: 3
                }
            }
        });
    });
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

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
      $('.responsive1').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoPlay:true,
        arrows:true,
        nextArrow:'',
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1.5,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
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
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>