<?php $__env->startSection('content'); ?>
<?php echo e(HTML::script('public/js/front/lightslider.js')); ?>


<?php echo e(HTML::script('public/js/facebox.js')); ?>

<?php echo e(HTML::style('public/css/facebox.css')); ?>

<script type="text/javascript">
    $(document).ready(function ($) {
    $("#contactmessage").validate();
            $('.close_image').hide();
            $('a[rel*=facebox]').facebox({
    closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
    });
    });
</script>
<script>
            function countChar() { 
            var text_max = 2500;
                    var text_length = $('#messageid').val().length;
                    var text_remaining = text_max - text_length;
                    $('#charcount').html(text_length + '/' + text_max);
                    if (text_remaining == 0){
            $('.contact_div').addClass('error_ext');
            } else{
            $('.contact_div').removeClass('error_ext');
            }

            }
</script>

<script type="text/javascript">
    var img_path = "<?php echo HTTP_PATH; ?>/public/img";
            $(document).ready(function () {
    $('#image-gallery').lightSlider({
    gallery: true,
            item: 1,
            thumbItem: 9,
            slideMargin: 0,
            speed: 500,
            auto: true,
            loop: true,
            onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
            }
    });
    });
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;
            function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
            height: '390',
                    width: '640',
                    videoId: 'M7lc1UVf-VE',
                    events: {
                    'onReady': onPlayerReady,
                            'onStateChange': onPlayerStateChange
                    }
            });
            }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
    event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
            function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
                    done = true;
            }
            }
    function stopVideo() {
    player.stopVideo();
    }
</script>

<?php echo e(HTML::script('public/js/jquery.raty.min.js')); ?>

<?php echo e(HTML::style('public/css/front/lightslider.css')); ?>

<div class="main_dashboard">
    <?php echo $__env->make('elements.topcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="dashboard-section dashboard-section-new">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="top_row_new">
                        <div class='brd_cls'>
                            <?php if(isset($recordInfo->Category->slug)): ?>

                            <a href="<?php echo e(URL::to( 'gigs/'.$recordInfo->Category->slug)); ?>"><?php echo e($recordInfo->Category->name); ?></a>
                            <?php if(isset($recordInfo->Subcategory->slug)): ?>
                            >

                            <a href="<?php echo e(URL::to( 'gigs/'.$recordInfo->Category->slug.'/'.$recordInfo->Subcategory->slug)); ?>"><?php echo e($recordInfo->Subcategory->name); ?></a>
                            <?php endif; ?>
                            <?php endif; ?>

                        </div>
                        <h3 class="left_title"><?php echo e($recordInfo->title); ?></h3>
                        
                        <div class="seller_review">

                            <div class="sel_img">

                                <div class="sel_img_img">





                                    <?php if(file_exists(PROFILE_FULL_UPLOAD_PATH . $recordInfo->User->profile_image) && !empty($recordInfo->User->profile_image)): ?>

                                    <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->User->profile_image, SITE_TITLE)); ?></a>

                                    <?php else: ?>

                                    <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?></a>

                                    <?php endif; ?>

                                </div>

                                <div class="sel_img_txt">

                                    <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e($recordInfo->User->first_name?$recordInfo->User->first_name.' '.$recordInfo->User->last_name:''); ?> </a>

                                </div>

                            </div>

                            |

                            <div class="about-rating">

                                <script>

                                    $(function() {

                                    $('#avgRating23').raty({

                                    starOn:    'star-on.png',
                                            starOff:   'star-off.png',
                                            start: <?php echo e($recordInfo -> User -> average_rating); ?>,
                                            readOnly: true

                                    });
                                    });</script>

                                <span class="pprate gigdtlrat" id="avgRating23"></span>

                                <span><b><?php echo $recordInfo->User->average_rating; ?></b> (<?php echo $recordInfo->User->total_review; ?>)</span>

                            </div>

                            |

                            <div class="order_data">

                                <?php echo e($gigCount); ?> Orders in Queue

                            </div>

                        </div>
                        
                        <div class="clearfix" id="galleryddd">
                            <?php $isanyimage = 0; ?>
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <?php if($recordInfo->youtube_url!=''): ?>
                                <li data-thumb="<?php echo e(GIG_FULL_DISPLAY_PATH.$recordInfo->youtube_image); ?>" alt=""> 
                                    <iframe src="<?php echo e(App\Models\Gig::get_video_code($recordInfo->youtube_url)); ?>" width="580" height="350" frameborder="0" allowfullscreen  border="0" id="player"></iframe>
                                </li> 
                                <?php $isanyimage = 1; ?>
                                <?php endif; ?>
                                <?php $__currentLoopData = $recordInfo->Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gigimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <?php if(isset($gigimage->name) && !empty($gigimage->name)): ?>
                                <?php $path = GIG_FULL_UPLOAD_PATH . $gigimage->name; ?>
                                <?php if(file_exists($path) && !empty($gigimage->name)): ?>
                                <?php $isanyimage = 1; ?>
                                <li data-thumb="<?php echo e(GIG_FULL_DISPLAY_PATH.$gigimage->name); ?>" alt="<?php echo e($recordInfo->title); ?>"> 
                                    <?php echo e(HTML::image(GIG_FULL_DISPLAY_PATH.$gigimage->name, SITE_TITLE,['title'=>$recordInfo->title])); ?>

                                </li>
                                <?php endif; ?> 
                                <?php endif; ?> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php if($isanyimage == 0): ?>
                        <script> $('#galleryddd').hide();</script>
                        <!--                        <?php echo e(HTML::image('public/img/front/no_image.png', SITE_TITLE)); ?>-->
                        <?php endif; ?>
                        <div class="image_desp">

                            <div class="detail_img">
                                <h2>Description</h2>
                                <?php echo nl2br($recordInfo->description); ?>

                            </div>    
                        </div>
                        <?php if(!empty($recordInfo->Gigfaq) && count($recordInfo->Gigfaq) > 0): ?>
                        <div id="four" class="same_box">
                            <div class="table">
                                <h4 class="gig-fancy-header">Frequently Asked Questions</h4>
                            </div>  
                            <div class="accordion">
                                <?php $__currentLoopData = $recordInfo->Gigfaq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gigfaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-<?php echo e($key); ?>"><?php echo e($gigfaq->question); ?></a>
                                    <div id="accordion-<?php echo e($key); ?>" class="accordion-section-content">
                                        <p><?php echo e($gigfaq->answer); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($recordInfo->Gigextra) && count($recordInfo->Gigextra) > 0): ?>
                        <div id="four" class="same_box">
                            <div class="table">
                                <h4 class="gig-fancy-header">Gig Extras</h4>
                            </div>  
                            <div class="accordion">
                                <?php global $delivery_days; ?>
                                <?php $__currentLoopData = $recordInfo->Gigextra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gigextraa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-section">
                                    <a class="accordion-section-title" href="#accordion-<?php echo e($gigextraa->id); ?>"><?php echo e($gigextraa->title); ?></a>
                                    <div id="accordion-<?php echo e($gigextraa->id); ?>" class="accordion-section-content">
                                        <p><?php echo e($gigextraa->description); ?></p>
                                        <p><strong>Delivery Time : </strong><?php echo e($delivery_days[$gigextraa->delivery]); ?></p>
                                        <input type="hidden" class="extra_price" id="amt" value="<?php echo e($gigextraa->price); ?>">
                                            <input type="hidden" class="extra_id" id="gigextraid<?php echo $gigextraa->price;?>" value="<?php echo e($gigextraa->id); ?>">
                                        <p><strong>Price : </strong>$<?php echo e($gigextraa->price); ?></p>
                                        <span   class="btn-lrg-standard add_btn" id="addbtn<?php echo $gigextraa->price;?>" onclick="Addamount(this,<?php echo e($gigextraa->id); ?>)" style="margin-top: -65px;" >ADD</span>
                                        <span class="js-str-currency" id="btnpricee">
                                          
                                        </span>
                                        <span   class="btn-lrg-standard remv_btn" id="removebtn<?php echo $gigextraa->price;?>" onclick="removeAmt(this,<?php echo e($gigextraa->id); ?>)" style="margin-top: -65px;display:none;
"  >Remove</span>
                                        <span class="js-str-currency" id="btnpriceen">  
                                    </span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($recordInfo->pdf_doc)): ?>
                        <?php $pdf_doc = explode(',',$recordInfo->pdf_doc) ?>
                        <?php array_filter($pdf_doc); ?>
                        <?php if(count($pdf_doc) > 0): ?>
                        <div id="four" class="same_box">
                            <div class="table">
                                <h4 class="gig-fancy-header">GIG Documents</h4>
                            </div>  
                            <div class="accordion-doc">
                                <ul>
                                    <?php $__currentLoopData = array_filter($pdf_doc); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachmental): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(file_exists(GIG_DOC_FULL_UPLOAD_PATH.$attachmental) && $attachmental!=""): ?>
                                    <li data-img="<?php echo e($attachmental); ?>" class="portfolio-cc"><?php echo e(substr($attachmental,9)); ?><a href="<?php echo e(GIG_DOC_FULL_DISPLAY_PATH.$attachmental); ?>" class="delete" download><i class="fa fa-download"></i></a></li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>

                        <div class="about_seller">
                            <h5>About the Seller</h5>
                            <div class="profile-about">
                                <div class="dpimg-about">
                                    <?php if(file_exists(PROFILE_FULL_UPLOAD_PATH . $recordInfo->User->profile_image) && !empty($recordInfo->User->profile_image)): ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $recordInfo->User->profile_image, SITE_TITLE)); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="dp_details-about"><h3><a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e($recordInfo->User->first_name?$recordInfo->User->first_name.' '.$recordInfo->User->last_name:''); ?> </a></h3>
                                    <p><?php echo e($recordInfo->User->address); ?></p>
                                    <div class="about-rating">
                                        <script>
                                                    $(function() {
                                                    $('#avgRating22').raty({
                                                    starOn:    'star-on.png',
                                                            starOff:   'star-off.png',
                                                            start: <?php echo e($recordInfo -> User -> average_rating); ?>,
                                                            readOnly: true
                                                    });
                                                    });</script>
                                        <span class="pprate gigdtlrat" id="avgRating22"></span>
                                        <span><b><?php echo $recordInfo->User->average_rating; ?></b> (<?php echo $recordInfo->User->total_review; ?> reviews)</span>
                                    </div>
                                    <!--                                <a href="#" class="btn btn-default">Contact Me</a>-->
                                </div>

                                <div class="client-reviews">
                                    <div class="client-reviews-left">
                                        <h3>About me</h3>
                                        <p class="text-viewer"><?php echo $recordInfo->User->description; ?></p>
                                    </div>
                                    <div class="client-reviews-right">
                                        <h3>General Info</h3>
                                        <ul class="general-info">
                                            <li>
                                                <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                                <span>
                                                    <?php
                                                    $farray = array();
                                                    if (isset($recordInfo->User->city) && $recordInfo->User->city != '') {
                                                        $farray[] = $recordInfo->User->city;
                                                    }
                                                    if (isset($recordInfo->User->Country->name) && $recordInfo->User->Country->name != '') {
                                                        $farray[] = $recordInfo->User->Country->name;
                                                    }
                                                    echo implode(', ', $farray);
                                                    ?>
                                                </span>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                                <span><?php echo date('F Y', strtotime($recordInfo->User->created_at)); ?></span>
                                            </li>
                                            <?php if($recordInfo->User->languages): ?>
                                            <li>
                                                <label><i class="fa fa-language" aria-hidden="true"></i>Languages</label>
                                                <span>
                                                    <?php $__currentLoopData = json_decode($recordInfo->User->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!$loop->first): ?>, <?php endif; ?><?php echo $lang->lang_name; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </span>
                                            </li>
                                            <?php endif; ?>
                                            <!--                                        <li>
                                                                                        <label><i class="fa fa-clock-o" aria-hidden="true"></i>Avg. Response Time</label>
                                                                                        <span>3 hours</span>
                                                                                    </li>-->
                                            <!--                                        <li>
                                                                                        <label><i class="fa fa-send" aria-hidden="true"></i>Recent Delivery</label>
                                                                                        <span>about 4 hours</span>
                                                                                    </li>-->

                                        </ul>
                                    </div>
                                </div>
                                <?php if(!$gigreviews->isEmpty()): ?>
                                <div class="client-rievews gigdtl_pg">                                
                                    <?php $__currentLoopData = $gigreviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="client-chat gigdtl_pgin">
                                        <div class="clientimg-about">
                                            <?php if($allrecord->Otheruser->profile_image): ?>
                                            <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Otheruser->slug)); ?>" class=""><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Otheruser->profile_image, SITE_TITLE)); ?></a>
                                            <?php else: ?>
                                            <a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Otheruser->slug)); ?>" class=""><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="client-rv">
                                            <h3><a href="<?php echo e(URL::to( 'public-profile/'.$allrecord->Otheruser->slug)); ?>" class=""><?php echo e($allrecord->Otheruser->first_name.' '.$allrecord->Otheruser->last_name); ?></a></h3>
                                            <span class="review-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo e($allrecord->created_at->diffForHumans()); ?></span>
                                            <div class="client-review-reting">
                                                <script>
                                                            $(function() {
                                                            $('#lst<?php echo e($allrecord->id); ?>').raty({
                                                            starOn:    'star-on.png',
                                                                    starOff:   'star-off.png',
                                                                    start: <?php echo e($allrecord -> rating); ?>,
                                                                    readOnly: true
                                                            });
                                                            });</script>
                                                <span class="lstreview lstreview_new" id="lst<?php echo e($allrecord->id); ?>"></span>
                                                <b><?php echo e($allrecord->rating); ?></b>
                                            </div>
                                            <p>
                                                <?php echo e(nl2br($allrecord->comment)); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class=" col-xs-12 col-md-4">
                    <div class="offer_wrap_top offer_wrap_top__new sticky">
 <div class="offer_wrap_bg__new">
                        <!-- Nav tabs -->
                        <ul class="nav offer-nav-tabs" role="tablist">
                            <li role="presentation"><a href="#basic" class="active" aria-controls="basic" role="tab" data-toggle="tab" onclick="updateprice('<?php echo e($recordInfo->basic_price); ?>', 'basic')">Basic</a></li>
                            <li role="presentation"><a href="#standard" aria-controls="standard" role="tab" data-toggle="tab" onclick="updateprice('<?php echo e($recordInfo->standard_price); ?>', 'standard')">Standard</a></li>
                            <li role="presentation"><a href="#premium" aria-controls="premium" role="tab" data-toggle="tab" onclick="updateprice('<?php echo e($recordInfo->premium_price); ?>', 'premium')">Premium</a></li>  
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="basic">
                                <div class="offer-bxs">
                                    <div class="offer-bxs-price">
                                        <span class="package-title-text"><?php echo e($recordInfo->basic_title); ?></span>
                                        <span class="package-price"><?php echo e(CURR.$recordInfo->basic_price); ?></span>
                                    </div>
                                    <p class="package-description"><?php echo e($recordInfo->basic_description); ?></p>
                                    <div class="offers-details">
                                        <span class="offer-icons">
                                            <i class="fa fa-clock-o fa-lg"></i>
                                            <span class="delivery-time"><?php echo e($recordInfo->basic_delivery); ?> days</span>
                                            Delivery
                                        </span>
                                        <span class="offer-icons">
                                            <i class="fa fa-refresh fa-lg"></i>
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
                                        <span class="package-title-text"><?php echo e($recordInfo->standard_title); ?></span>
                                        <span class="package-price"><?php echo e(CURR.$recordInfo->standard_price); ?></span>
                                    </div>
                                    <p class="package-description"><?php echo e($recordInfo->standard_description); ?></p>
                                    <div class="offers-details">
                                        <span class="offer-icons">
                                            <i class="fa fa-clock-o fa-lg"></i>
                                            <span class="delivery-time"><?php echo e($recordInfo->standard_delivery); ?> days</span>
                                            Delivery
                                        </span>
                                        <span class="offer-icons">
                                            <i class="fa fa-refresh fa-lg"></i>
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
                                        <span class="package-title-text"><?php echo e($recordInfo->basic_title); ?></span>
                                        <span class="package-price"><?php echo e(CURR.$recordInfo->basic_price); ?></span>
                                    </div>
                                    <p class="package-description"><?php echo e($recordInfo->basic_description); ?></p>
                                    <div class="offers-details">
                                        <span class="offer-icons">
                                            <i class="fa fa-clock-o fa-lg"></i>
                                            <span class="delivery-time"><?php echo e($recordInfo->basic_delivery); ?> days</span>
                                            Delivery
                                        </span>
                                        <span class="offer-icons">
                                            <i class="fa fa-refresh fa-lg"></i>
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
                                        <span class="package-title-text"><?php echo e($recordInfo->premium_title); ?></span>
                                        <span class="package-price"><?php echo e(CURR.$recordInfo->premium_price); ?></span>
                                    </div>
                                    <p class="package-description"><?php echo e($recordInfo->premium_description); ?></p>
                                    <div class="offers-details">
                                        <span class="offer-icons">
                                            <i class="fa fa-clock-o fa-lg"></i>
                                            <span class="delivery-time"><?php echo e($recordInfo->premium_delivery); ?> days</span>
                                            Delivery
                                        </span>
                                        <span class="offer-icons">
                                            <i class="fa fa-refresh fa-lg"></i>
                                            <?php echo e($recordInfo->premium_revision); ?> Revision
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
                            <?php echo e(Form::open(array('method' => 'post', 'id' => 'addggiform'))); ?>

                            <input type="hidden" name="type" id="settype" value="basic">
                            <input type="hidden" name="slug" id="gigslug" value="<?php echo e($recordInfo->slug); ?>">
                            <input type="hidden" name="examt" id="examt" value="">
                            <input type=hidden id="extragig_idd" name="extragig_idd" value="" />
                            <input type=hidden id="gigextra_rm" name="gigextra_rm" value="" />
                            <div class="package-footer">
                                <p class="" id="hidebtn">

                                    <?php if(Session::get('user_id') != $recordInfo->user_id): ?>

                                    <?php if($recordInfo->pause == 0 || $recordInfo->User->accept_orders == 0 || $recordInfo->User->hide_weekend == 1): ?>

<?php
$waitlist = $recordInfo->waitlist;

$wait = explode(',', $waitlist);
?>

                                    <?php if(Session::get('user_id')): ?>

                                    <?php if(in_array(Session::get('user_id'),$wait)): ?>

                                    <span class="btn-lrg-standard btn-lrg-basc" >Added to Waiting List</span>

                                    <?php else: ?>                                    

                                    <span class="btn-lrg-standard" id="myBtn1" onclick="submitwaitlist()" id="waitlist">Add to Waiting List</span>

                                    <?php endif; ?>

                                    <?php else: ?>

                                    <span class="btn-lrg-standard" id="myBtn1" onclick="submitwaitlist()" id="waitlist">Add to Waiting List</span>

                                    <?php endif; ?>

                                    <?php else: ?>

                                    <span  onclick="submitform()" class="btn-lrg-standard" >Continue
                                        (<?php echo e(CURR); ?><span class="js-str-currency" id="btnprice"><?php echo e($recordInfo->basic_price); ?></span>)
                                    </span>

                                    <?php endif; ?>

                                    <?php endif; ?>

                                </p>
                                <div class="gigdloader" id="gigdloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
 </div>
                   
                    <?php if(Session::get('user_id') != $recordInfo->user_id): ?>
                    
                    <span class="contct_per_detail"><a href="javascript:void(0);" class="btn-lrg-standard" onclick='$("#info12").show();'data-toggle="modal" data-target="#myModal">Contact Seller</a></span>
                    <?php endif; ?>
                     </div>
                </div>
                
            </div>

        </div>
    </section>
</div>

<div class="modal fade publicprofile_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="nzwh-wrapper">
                <fieldset class="nzwh">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> Send a Message</h4>
                    </div>
                    <div class="drt">
                        <div class="right_pop">
                            <div class="profile-img">
                                <?php if($recordInfo->User->profile_image): ?>
                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?>

                                <?php else: ?>
                                <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?>

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
                                <?php echo e(Form::open(array('method' => 'post', 'id' => 'contactmessage','url' => 'users/messageuser', 'enctype' => "multipart/form-data"))); ?>

                                <div class="contact_div">
                                    <?php echo e(Form::textarea('message','', ['class'=>'form-control required', 'placeholder'=>'', 'autocomplete' => 'off', 'minlength' => '0', 'maxlength' => '2500', 'id'=>'messageid','onkeyup'=>"countChar()"])); ?>

                                    <div class="sec_blw_top">
                                        <div class="sec_blw">
                                            <span id="charcount">0/2500</span>
                                            <span class="right_sp">
                                                <?php echo e(Form::file('attachment', ['class'=>'form-control', 'accept'=>'image/png'])); ?>

                                            </span>
                                        </div>
                                        <div class="upbtn">
                                            <?php echo e(Form::hidden('receiver_id', $recordInfo->User->id, ['id'=>'receiver_id'])); ?>

                                            <!--<button type="button" class="succbtn" id="succbtnbtn">Send</button>-->
                                            <?php echo e(Form::submit('Send', ['class' => 'succbtn', 'id'=>'succbtnbtn'])); ?>

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

<script type="text/javascript"> 
    function Addamount(amt,id)
    {
        //alert(id);
        var addamt=(amt.parentNode.getElementsByTagName("input")[0].value);
        
        var changeascurr=addamt;
        
		var prev_pr = $('#btnprice').html();
		prev_pr = prev_pr.split(',').join('');
		//alert(prev_pr);
		//alert(changeascurr);
		$('#btnprice').html((parseFloat(prev_pr)+parseFloat(changeascurr)).toFixed(2));
		
		var gigextra_id=$('#extragig_idd').val();
		//alert(gigextra_id);
		if(gigextra_id == ''){
		    $("#extragig_idd").val(id);
		}else{
		    $("#extragig_idd").val(gigextra_id+','+id);
		}
//           //alert(gigextra_id);
           
		
		var btnnadd='addbtn'+addamt;
           var removebtn='removebtn'+addamt;
           //alert(btnnadd);
         document.getElementById(btnnadd).style.display= 'none';
        document.getElementById(removebtn).style.display= 'block';
        
         
  
    }
    function removeAmt(removeamt,id)
    {
        //alert("remove");
        var removeamt=(removeamt.parentNode.getElementsByTagName("input")[0].value);
//alert(removeamt);
      


var remammt=removeamt;
//alert(remammt);
//var remammt = Math.round(remammt1);
         var btnprice=document.getElementById("btnprice").innerText;
         //alert(btnprice);
         var minusamt=(parseFloat(btnprice)-parseFloat(remammt)).toFixed(2)
         //var minusamt=Math.round(+btnprice - +remammt,2); 
         //alert(minusamt); 
         document.getElementById("btnprice").innerHTML =minusamt;
        //concatinate for geting dynamic id
          var btnnadd='addbtn'+removeamt;
          var removebtn='removebtn'+removeamt;
          // alert(btnnadd);
          document.getElementById(btnnadd).style.display= 'block';
          document.getElementById(removebtn).style.display= 'none';
          
          var extragig_idd=$('#extragig_idd').val();
          var arr = $.makeArray( extragig_idd );
        //   alert(JSON.stringify(arr));
          removeItem = id;
          arr.splice($.inArray(removeItem ,arr),1);
// alert(JSON.stringify(arr));
		//alert(gigextra_id);
		if(arr){
		    var x = arr.toString();
		}else{
		    var x = '';
		}
		$("#extragig_idd").val(x);
// 		if(gigextra_rm == ''){
// 		    $("#gigextra_rm").val(id);
// 		}else{
// 		    $("#gigextra_rm").val(gigextra_rm+','+id);
// 		}
    }
</script>
<script>
                                    function updateprice(price, ptype){
                                    $('#btnprice').html(price);
                                            $('#settype').val(ptype);
                                    }
                                    
                                    function submitwaitlist(){

    <?php if(!Session::get('user_id')): ?>

//            alert('<?php //echo __("message.Your must login to place your order.");  ?>');
            // Get the modal

            var modal = document.getElementById("myModallogin");
// Get the button that opens the modal

    var btn = document.getElementById("myBtn1");
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

                    data: { 'user_id':'<?php echo $recordInfo->user_id;
?>', 'gig_id':'<?php echo $recordInfo->id;
?>', _token: '<?php echo e(csrf_token()); ?>'},
                    beforeSend: function () {$("#gigdloader").show(); $("#hidebtn").hide(); },
                    complete: function () {$("#gigdloader").hide(); $("#hidebtn").show(); },
                    success: function (result) {

                    $('#hidebtn').html('<span class="btn-lrg-standard btn-lrg-basc" >Added to Waiting List</span>')

                    }

            });
    <?php endif; ?>

    }
//    
                            function submitform(){
                            <?php if(!Session::get('user_id')): ?>
                                    alert('Your must login to place your order.');
                                    <?php else: ?>
                                    $.ajax({
                                    url: "<?php echo HTTP_PATH; ?>/payments/addtocart",
                                            type: "POST",
                                            data: $('#addggiform').serialize(),
                                            //data: { _token: '<?php echo e(csrf_token()); ?>'},
                                            beforeSend: function () {$("#gigdloader").show(); $("#hidebtn").hide(); },
                                            success: function (result) {
                                            window.location = "<?php echo HTTP_PATH; ?>/order-summary/" + result;
                                            }
                                    });
                                    <?php endif; ?>
                            }

                            $(function () {
                            $('[data-toggle="tooltip"]').tooltip()
                            });
                                    $("#maraction").click(function () {
                            $("#offer-show").addClass("offer-div");
                                    $(".dashboard-rights-section").removeClass("offer-div");
                            });</script>
<script>
                                    $(function () {
                                    // here the code for text minimiser and maxmiser by faisal khan
                                    var minimized_elements = $('p.text-viewer');
                                            minimized_elements.each(function () {
                                            var t = $(this).text();
                                                    if (t.length < 200)
                                                    return;
                                                    $(this).html(
                                                    t.slice(0, 200) + '<span>... </span><a href="#" class="more"> + See More </a>' +
                                                    '<span style="display:none;">' + t.slice(200, t.length) + ' <a href="#" class="less"> - See Less </a></span>'
                                                    );
                                            });
                                            $('a.more', minimized_elements).click(function (event) {
                                    event.preventDefault();
                                            $(this).hide().prev().hide();
                                            $(this).next().show();
                                    });
                                            $('a.less', minimized_elements).click(function (event) {
                                    event.preventDefault();
                                            $(this).parent().hide().prev().show().prev().show();
                                    });
                                    });</script>
<script>
                                    jQuery(document).ready(function () {
                            function close_accordion_section() {
                            jQuery('.accordion .accordion-section-title').removeClass('active');
                                    jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
                            }

                            jQuery('.accordion-section-title').click(function (e) {
                            // Grab current anchor value
                            var currentAttrValue = jQuery(this).attr('href');
                                    if (jQuery(e.target).is('.active')) {
                            close_accordion_section();
                            } else {
                            close_accordion_section();
                                    // Add active class to section title
                                    jQuery(this).addClass('active');
                                    // Open up the hidden content panel
                                    jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
                            }

                            e.preventDefault();
                            });
                            });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>