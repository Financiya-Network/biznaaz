<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    var img_path = "<?php echo HTTP_PATH; ?>/public/img";    
</script>
<?php echo e(HTML::script('public/js/jquery.raty.min.js')); ?>

<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="top_row col-xs-12 col-md-8">
                    <h3 class="left_title"><?php echo e($recordInfo->title); ?></h3>
                    <?php if($recordInfo->attachment != '' && file_exists(SERVICE_FULL_UPLOAD_PATH.$recordInfo->attachment)): ?>
                        <?php 
                            $fnameArray =  explode('.', $recordInfo->attachment);
                            $imgext = array_pop($fnameArray);
                            $extArray = array('jpg', 'jpeg', 'png');
                        ?>   
                        <?php if(in_array($imgext, $extArray)): ?>
                            <div class="showeditimage"><?php echo e(HTML::image(SERVICE_FULL_DISPLAY_PATH.$recordInfo->attachment, SITE_TITLE,['class'=>"maxreing"])); ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="req-dtl">
                        <span class="post-category"><?php echo e($recordInfo->Category->name); ?> >> <?php echo e($recordInfo->Subcategory->name); ?></span>
                        <span class="post-date">Posted on: <?php echo e($recordInfo->created_at->diffForHumans()); ?></span>
                        <?php  global $serviceDays; global $revisions;  ?>
                        <div class="post-dtl">
                            <span>Need to delivered in: <?php echo e($serviceDays[$recordInfo->day]); ?></span>
                            <span>Offers: <?php echo e(count($recordInfo->Servicesoffer)); ?></span>
                            <span>Budget: <?php if($recordInfo->price): ?> <?php echo e(CURR.$recordInfo->price); ?> <?php else: ?> N/A <?php endif; ?></span>
                        </div>
                        <?php if($recordInfo->attachment != '' && file_exists(SERVICE_FULL_UPLOAD_PATH.$recordInfo->attachment)): ?>
                            <?php if(!in_array($imgext, $extArray)): ?>
                                <div class="post-dtl"><div class="showeditimage"> <a download href="<?php echo e(SERVICE_FULL_DISPLAY_PATH.$recordInfo->attachment); ?>"> <?php echo e(substr($recordInfo->attachment, 9)); ?></a></div></div>
                            <?php endif; ?>
                        <?php endif; ?>    
                    </div>
                    <div class="about_seller">
                        <h5>Description</h5>
                        <div class="profile-about">
                            <?php echo e($recordInfo->description); ?>

                        </div>
                    </div>
                    
                    <div class="about_seller">
                        <h5>About the Buyer</h5>
                        <?php if(isset($recordInfo->User)): ?>
                        <div class="profile-about">
                            <div class="dpimg-about">
                                <?php if($recordInfo->User->profile_image): ?>
                                <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                <?php else: ?>
                                <a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="dp_details-about">
                                <h3><a href="<?php echo e(URL::to( 'public-profile/'.$recordInfo->User->slug)); ?>"><?php echo e($recordInfo->User->first_name?$recordInfo->User->first_name.' '.$recordInfo->User->last_name:''); ?> </a></h3>
                                <p><?php echo e($recordInfo->User->address); ?></p>
                                <div class="about-rating">
                                    <script>
                                        $(function() {
                                            $('#avgRating22').raty({
                                                starOn:    'star-on.png',
                                                starOff:   'star-off.png',
                                                start: <?php echo e($recordInfo->User->average_rating); ?>,
                                                readOnly: true
                                            });
                                        });
                                    </script>
                                    <span class="pprate gigdtlrat" id="avgRating22"></span>
                                    <span class="req_rate"><b><?php echo e($recordInfo->User->average_rating); ?></b> (<?php echo e($recordInfo->User->total_review); ?> reviews)</span>
                                </div>
<!--                                <a href="#" class="btn btn-default">Contact Me</a>-->
                            </div>
                            
                            <div class="client-reviews">
                                <div class="client-reviews-left">
                                    <h3>About me</h3>
                                    <p class="text-viewer"><?php echo e($recordInfo->User->description); ?></p>
                                </div>
                                <div class="client-reviews-right">
                                    <h3>General Info</h3>
                                    <ul class="general-info">
                                        <li>
                                            <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                            <span>
                                                <?php
                                                 $farray = array();
                                                 if(isset($recordInfo->User->city) && $recordInfo->User->city != ''){
                                                     $farray[] = $recordInfo->User->city;
                                                 }
                                                 if(isset($recordInfo->User->Country->name) && $recordInfo->User->Country->name != ''){
                                                     $farray[] = $recordInfo->User->Country->name;
                                                 }
                                                 echo implode(', ', $farray);
                                                ?>
                                            </span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                            <span><?php echo e($recordInfo->User->created_at->format('M Y')); ?></span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-language" aria-hidden="true"></i>Languages</label>
                                            <span>
                                                <?php if($recordInfo->User->languages): ?>
                                                    <?php $__currentLoopData = json_decode($recordInfo->User->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                      
                                                        <?php if(!$loop->first): ?>, <?php endif; ?><?php echo $lang->lang_name; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>                                                
                                            </span>
                                        </li>
<!--                                        <li>
                                            <label><i class="fa fa-send" aria-hidden="true"></i>Recent Delivery</label>
                                            <span>about 4 hours</span>
                                        </li>-->

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class=" col-xs-12 col-md-4 sticky">
                    <div class="offer_wrap ">
                        <div class="offer_tite">Send Your Offer</div>  
                        <div class="send-form">
                            <div class="" id="offerm"></div>  
                            <?php if($recordInfo->status == 1): ?>
                                <?php echo e(Form::model($oldoffer, ['method' => 'post', 'id' => 'sendoffer'])); ?>

                                <div class="form-group offer_field">
                                    <label>Amount (<?php echo e(CURR); ?>)</label>  
                                    <div class="send_input">
                                    <?php echo e(Form::text('amount', null, ['class'=>'form-control required digits', 'placeholder'=>'offer amount', 'autocomplete' => 'off'])); ?>

                                    </div>
                                    </div>
                                <div class="form-group offer_field">
                                    <label>Deliver in (days)</label>   
                                    <div class="send_input">
                                    <?php echo e(Form::text('deliver_in', null, ['class'=>'form-control required', 'placeholder'=>'days', 'autocomplete' => 'off'])); ?>

                                    </div>
                                    </div>
                                <div class="form-group offer_field">
                                    <label>Number of revisions</label>   
                                    <div class="send_input">
                                        <div class="market-select">
                                            <span>
                                    <?php echo e(Form::select('revisions', $revisions,old('revisions'), ['class' => 'form-control required','placeholder' => 'select'])); ?>

                                            </span>
                                    </div>
                                    </div>
                                    </div>
                                <div class="form-group offer_field">
                                    <label>Offer message</label>   
                                    <?php echo e(Form::textarea('message', null, ['class'=>'form-control offer_box required', 'placeholder'=>"I'm provide...", 'autocomplete' => 'off', 'rows'=>5])); ?>

                                </div>
                                <div class="send_mesage">
                                    <button id="ddpfferbuton" type="button" class="btn btn-primary postbtn" onclick="postoffer()">Send Offer</button>
                                    <div class="btnofferloader" id="btnofferloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                                </div>
                                <?php echo e(Form::hidden('service_slug', $recordInfo->slug, ['class'=>'form-control required', 'placeholder'=>'days', 'autocomplete' => 'off'])); ?>

                                <?php echo e(Form::close()); ?>

                            <?php else: ?> 
                                <div class="al_assigned">This request already assigned to some one.</div> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    function postoffer(){
        if($("#sendoffer").valid()){
            $('#ddpfferbuton').hide();
            $('#btnofferloader').show();
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/send-request-offer",
                type: "POST",
                data: $('#sendoffer').serialize(),
                beforeSend: function () { $("#btnofferloader").show();},
                complete: function () {$("#btnofferloader").hide();},
                success: function (result) {
                    if(result == 1){
                         $('#offerm').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> Your offer sent successfully.</div>');
                    }else if(result == 2){
                         $('#offerm').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> You have successfully updated your offer.</div>');
                    }
                }
            });
        }
    }
    
    $(function () {
        var minimized_elements = $('p.text-viewer');
        minimized_elements.each(function () {
            var t = $(this).text();
            if (t.length < 300)
                return;

            $(this).html(
                    t.slice(0, 300) + '<span>... </span><a href="#" class="more"> + See More </a>' +
                    '<span style="display:none;">' + t.slice(300, t.length) + ' <a href="#" class="less"> - See Less </a></span>'
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
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>