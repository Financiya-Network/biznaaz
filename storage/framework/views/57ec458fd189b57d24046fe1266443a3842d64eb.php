<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    var img_path = "<?php echo HTTP_PATH; ?>/public/img";
</script>
<?php echo e(HTML::script('public/js/jquery.raty.min.js')); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#ratebuyerrform").validate();
    });
</script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
        <div class="workplace">
            <div class="manage-btn">Rate Buyer
                <a href="<?php echo e(URL::to( 'selling-orders')); ?>" class="btn btn-primary">Back</a>                
            </div>
            <div class="req_dtl">
                <div class="req_dtl_head">Gig Information</div>
                <div class="req_row">
                    <label>Title: </label> <span>
                        <?php if(isset($myorderInfo->Gig)): ?>
                            <?php echo e($myorderInfo->Gig->title); ?>

                        <?php elseif(isset($myorderInfo->Service)): ?>
                            <?php echo e($myorderInfo->Service->title); ?>

                        <?php endif; ?></span>
                    <div class="req_post"><label>Posted: </label> 
                    <?php if(isset($myorderInfo->Gig)): ?>
                        <?php echo e($myorderInfo->Gig->created_at->format('M d, Y')); ?>

                    <?php elseif(isset($myorderInfo->Service)): ?>
                        <?php echo e($myorderInfo->Service->created_at->format('M d, Y')); ?>

                    <?php endif; ?>
                    </div>
                </div>
                <div class="req_row _des">
                    <?php if(isset($myorderInfo->Gig)): ?>
                        <?php echo $myorderInfo->Gig->description; ?>

                    <?php elseif(isset($myorderInfo->Service)): ?>
                        <?php echo e($myorderInfo->Service->description); ?>

                        <?php echo $myorderInfo->Service->description; ?>

                    <?php endif; ?>
                </div>
            </div>
            
            <div class="management-bx">
                <div class="message_chat">
                    
                    <?php if($myorderInfo->status == 2 && $myorderInfo->is_seller_rate != 1): ?>
                       <div class="req_dtl_head">Give Review/Rating</div> 
                       <div class="comment-form reviewrate">
                        <div class="ee er_msg postfrm"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>   
                        <?php echo e(Form::open(array('method' => 'post', 'id' => 'ratebuyerrform'))); ?>

                          <div class="input textarea">
                              <?php echo e(Form::textarea('comment', null, ['class'=>'form-control required', 'placeholder'=>"Write your comment", 'autocomplete' => 'off', 'rows'=>5, 'id'=>'description'])); ?>

                          </div>   
                        <div class="giverate">
                            <div class="giverate_str">
                                <script>
                                    $(function() {
                                        $('#avgRating0').raty({
                                            starOn: 'star-on.png',
                                            starOff: 'star-off.png',
                                            start: 0,
                                            number: 5,
                                            half: true,
                                            click: function(score, evt) {
                                                $("#selectrating").val(score);
                                            }
                                        });
                                    });
                                </script>
                                <?php echo e(Form::hidden('rating', 0, ['class'=>'form-control required', 'id'=>'selectrating'])); ?>

                                <span id="avgRating0"></span>
                            </div>
                            <div class="giverate_btn"><input class="btn btn-success" value="Submit" type="submit"></div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <?php elseif($myorderInfo->status == 2 && $myorderInfo->is_buyer_rate == 1): ?>   
                       <div class="req_dtl_head">You already rate this order</div> 
                       <div class="comment-form reviewrate">
                           <div class="al_comment"><?php echo e($oldRatingInfo->comment); ?></div>
                           <div class="al_rate">
                               <script>
                                    $(function() {
                                        $('#avgRating22').raty({
                                            starOn:    'star-on.png',
                                            starOff:   'star-off.png',
                                            start: <?php echo e($oldRatingInfo->rating); ?>,
                                            readOnly: true
                                        });
                                    });
                                </script>
                                <span id="avgRating22"></span>
                           </div>
                       </div>
                    <?php endif; ?>
                  
                </div>
                <div class="workplace-seller">
                <div class="offer_dtl">
                    <?php if($myorderInfo->buyer_id == Session::get('user_id')): ?>
                        <div class="req_dtl_head">About The Seller</div>
                        <div class="dpimg-about_right">
                            <div class="buy_row">
                                <div class="buy_img">
                                    <?php if($myorderInfo->Seller->profile_image): ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$myorderInfo->Seller->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$myorderInfo->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$myorderInfo->Seller->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="buy_name">
                                    <span><a href="<?php echo e(URL::to( 'public-profile/'.$myorderInfo->Seller->slug)); ?>"><?php echo e($myorderInfo->Seller->first_name.' '.$myorderInfo->Seller->last_name); ?></a></span>
                                    <div class="about-rating">
                                        <script>
                                            $(function() {
                                                $('#avgRating225').raty({
                                                    starOn:    'star-on.png',
                                                    starOff:   'star-off.png',
                                                    start: <?php echo e($myorderInfo->Seller->average_rating); ?>,
                                                    readOnly: true
                                                });
                                            });
                                        </script>
                                        <span class="pprate" id="avgRating225"></span>
                                        <span class="rating-view"><b><?php echo e($myorderInfo->Seller->average_rating); ?></b> (<?php echo e($myorderInfo->Seller->total_review); ?> reviews)</span>
                                    </div>
                                 </div>
                            </div>
                            <div class="buy_row">
                                <ul class="general-info">
                                            <li>
                                                <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                                <span><?php if(isset($myorderInfo->Seller->Country->name)): ?> <?php echo e($myorderInfo->Seller->Country->name); ?> <?php endif; ?></span>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                                <span><?php echo e($myorderInfo->Seller->created_at->format('M Y')); ?></span>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-user" aria-hidden="true"></i>Languages</label>
                                                <span><?php if($myorderInfo->Seller->languages): ?>
                                                        <?php $__currentLoopData = json_decode($myorderInfo->Seller->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                      
                                                            <?php if(!$loop->first): ?>, <?php endif; ?><?php echo $lang->lang_name; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?> 
                                                        N/A
                                                      <?php endif; ?>                                                 
                                                </span>
                                            </li>

                                </ul>
                            </div>
                        </div>
                    <?php else: ?>
                       <div class="req_dtl_head">About the Buyer</div>
                        <div class="dpimg-about_right">
                            <div class="buy_row">
                                <div class="buy_img">
                                    <?php if($myorderInfo->Buyer->profile_image): ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$myorderInfo->Buyer->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$myorderInfo->Buyer->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to( 'public-profile/'.$myorderInfo->Buyer->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="buy_name">
                                    <span><a href="<?php echo e(URL::to( 'public-profile/'.$myorderInfo->Buyer->slug)); ?>"><?php echo e($myorderInfo->Buyer->first_name.' '.$myorderInfo->Buyer->last_name); ?></a></span>
                                    <div class="about-rating">
                                        <script>
                                            $(function() {
                                                $('#avgRating222').raty({
                                                    starOn:    'star-on.png',
                                                    starOff:   'star-off.png',
                                                    start: <?php echo e($myorderInfo->Buyer->average_rating); ?>,
                                                    readOnly: true
                                                });
                                            });
                                        </script>
                                        <span class="pprate" id="avgRating222"></span>
                                        <span class="rating-view"><b><?php echo e($myorderInfo->Buyer->average_rating); ?></b> (<?php echo e($myorderInfo->Buyer->total_review); ?> reviews)</span>
                                    </div>
                                 </div>
                            </div>
                            <div class="buy_row">
                                <ul class="general-info">
                                            <li>
                                                <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                                <span><?php if(isset($myorderInfo->Buyer->Country->name)): ?> <?php echo e($myorderInfo->Buyer->Country->name); ?> <?php endif; ?></span>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                                <span><?php echo e($myorderInfo->Buyer->created_at->format('M Y')); ?></span>
                                            </li>
                                            <li>
                                                <label><i class="fa fa-user" aria-hidden="true"></i>Languages</label>
                                                <span><?php if($myorderInfo->Buyer->languages): ?>
                                                        <?php $__currentLoopData = json_decode($myorderInfo->Buyer->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                      
                                                            <?php if(!$loop->first): ?>, <?php endif; ?><?php echo $lang->lang_name; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      <?php else: ?> 
                                                        N/A
                                                      <?php endif; ?>                                                 
                                                </span>
                                            </li>

                                </ul>
                            </div>
                        </div> 
                    <?php endif; ?>
                </div>
                </div>
                </div>
        </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>