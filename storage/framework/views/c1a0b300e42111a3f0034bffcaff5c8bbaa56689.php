<?php $__env->startSection('content'); ?>
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
</script>
<?php echo e(HTML::script('public/js/jquery.raty.min.js')); ?>

<div class="main_dashboard">
    <?php echo $__env->make('elements.topcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-4">
                    <div class="profile-bx">
                        <div class="profile-img-bxa">
                            <div class="profile-img">
                                <?php if($recordInfo->profile_image): ?>
                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?>

                                <?php else: ?>
                                <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?>

                                <?php endif; ?>

                            </div>
                            <?php /*
                            @if(count($topRatedInfo) >= 10)
                                <span class="level_dv level3"></span>
                            @elseif($sellingOrders)
                            <?php $classLvl = ''; ?>
                                @if($sellingOrders['0']->total_sum > 400 && $sellingOrders['0']->total_sum <= 1000)
                                    <?php $classLvl = 'level1'; ?>
                                @elseif($sellingOrders['0']->total_sum > 1000)
                                    <?php $classLvl = 'level2'; ?>
                                @endif
                                @if($classLvl)
                                <span class="level_dv <?php echo $classLvl;?>"></span>
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
                        <h2><?php echo $recordInfo->first_name.' '.$recordInfo->last_name; ?></h2>
                        <div class="pub_rat">
                                <script>
                                    $(function() {
                                        $('#avgRating22').raty({
                                            starOn:    'star-on.png',
                                            starOff:   'star-off.png',
                                            start: <?php echo e($recordInfo->average_rating); ?>,
                                            readOnly: true
                                        });
                                    });
                                </script>
                                <span class="pprate" id="avgRating22"></span>
                                <span class="pprate pub_cntr" id="avgRating22"><?php echo e($recordInfo->average_rating); ?> (<?php echo e($recordInfo->total_review); ?> Reviews)</span>
                                <?php if($recordInfo->id != Session::get('user_id')): ?>
                                <span class="contct_per"><a href="javascript:void(0);" class="btn btn-primary" onclick='$("#info12").show();'data-toggle="modal" data-target="#myModal">Contact Me</a></span>
                                <?php endif; ?>
                        </div>
                        <div class="user-details">
                            <ul>
                                <li><label><i class="fa fa-user" aria-hidden="true"></i>Member since</label><span><?php echo $recordInfo->created_at->format('M Y'); ?></span></li>
                                <li id="countryctn">
                                    <label class="cntry_div"><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                    <span class="cnnnm cntry_right" id="countryid">
                                        <span id="cname">
                                            <?php
                                            $addd = array();
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
                                        <span id="statusname" class="<?php echo $cls ?>">
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
                                <div class="text-section" >
                                    <p id="desctext"><?php echo nl2br($recordInfo->description); ?></p>
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
                                    <?php if($recordInfo->languages): ?>
                                        <?php $__currentLoopData = json_decode($recordInfo->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="<?php echo $key; ?>"><span class="title"><?php echo $lang->lang_name; ?></span><span class="sub-title"><?php echo $lang->lang_level; ?></span></span></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="user-txt-bx">
                            <h3>Linked Accounts</h3>
                            <div class="text-section">
                                <ul class="linked-acc">
                                    <?php if($recordInfo->facebook_id): ?>
                                    <li>
                                        <i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($recordInfo->google_id): ?>
                                    <li>
                                        <i class="fa fa-google" aria-hidden="true"></i><span>Google</span>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="user-txt-bx">
                            <h3>Skills</h3>
                            <div class="text-section">
                                <ul class="linked-skills" id="addskilldiv">
                                    <?php if($recordInfo->skills): ?>
                                    <?php $__currentLoopData = explode(',', $recordInfo->skills); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skillid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="s<?php echo $skillid; ?>"> <span> <?php echo $skillsList[$skillid]; ?></span> </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?> 
                                </ul>
                            </div>
                        </div>

                        <div class="user-txt-bx">
                            <h3>Education</h3>
                            <div class="text-section" id="addedudiv">
                                <?php if($recordInfo->educations): ?>
                                <?php $__currentLoopData = json_decode($recordInfo->educations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li id="<?php echo $key; ?>"><div class="edutop"><span class="title"><?php echo $edu->qual_name; ?></span><span class="sub-title"><?php echo $edu->stream_name; ?></span> </div><div class="edu_btm"><span class="title"> <?php echo $edu->university_name; ?>, <?php echo $edu->country_name; ?>, Pass in <?php echo $edu->year; ?></span></div></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="user-txt-bx user-txt-bx-last">
                            <h3>Certification</h3>
                            <div class="text-section" id="addcertdiv">
                                <?php if($recordInfo->certifications): ?>
                                <?php $__currentLoopData = json_decode($recordInfo->certifications); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li id="<?php echo $key; ?>"><div class="edutop"><span class="title"><?php echo $cert->certificate_name; ?></span> </div><div class="edu_btm"><span class="title"> <?php echo $cert->certificate_from; ?>, Pass in <?php echo $cert->year; ?></span></div></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-8">
                    <div class="dashboard-rights-section">
                        <div class="row pubgig">
                            <?php if(!$mygigs->isEmpty()): ?>
                                <?php $__currentLoopData = $mygigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                    if (file_exists(GIG_FULL_UPLOAD_PATH.$allrecord->youtube_image)) {
                                                        $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                                    }
                                                }
                                                if ($gigimgname == '') {
                                                    $gigimgname = 'public/img/front/dummy.png';
                                                }
                                                ?>
                                                <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>" class=""><?php echo e(HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])); ?></a>
                                            </div>
                                            <div class="caption">
                                                <h3><a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>"><?php echo e($allrecord->title); ?> </a></h3>
                                                <div class="bottom_row">
                                                    <?php echo $__env->make('elements.likeunlike', ['gid'=>$allrecord->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                    <a href="<?php echo e(URL::to( 'gig-details/'.$allrecord->slug)); ?>" class="amount_list"><?php echo e(CURR.$allrecord->basic_price); ?></a>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                            <div class="col-md-12"><div class="management-full">No gig posted by this user yet.</div></div>
                            <?php endif; ?>
                        </div>                      
                    </div>
                    <?php if(!$myreviews->isEmpty()): ?>
                    <div class="letest-review">
                        <h2>Latest Reviews</h2>
                        <div class="client-rievews">
                                <?php $__currentLoopData = $myreviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($allrecord->Otheruser->first_name)): ?>
                                    <div class="client-chat">
                                        <div class="clientimg-about">
                                            <?php if(isset($allrecord->Otheruser->profile_image) && file_exists(PROFILE_SMALL_UPLOAD_PATH.$allrecord->Otheruser->profile_image)): ?>
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
                                                            start: <?php echo e($allrecord->rating); ?>,
                                                            readOnly: true
                                                        });
                                                    });
                                                </script>
                                                <span class="lstreview lstreview_new" id="lst<?php echo e($allrecord->id); ?>"></span>
                                                <b><?php echo e($allrecord->rating); ?></b>
                                            </div>
                                            <p>
                                               <?php echo e(nl2br($allrecord->comment)); ?>

                                            </p>

                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
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
                                <?php if($recordInfo->profile_image): ?>
                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?>

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
                                            <?php echo e(Form::hidden('receiver_id', $recordInfo->id, ['id'=>'receiver_id'])); ?>

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
<script>

$(".show-more").click(function () {
        if($(".text").hasClass("show-more-height")) {
            $(this).text("(Show Less)");
        } else {
            $(this).text("(Show More)");
        }

        $(".text").toggleClass("show-more-height");
    });</script>
<style>
#profile-description {
  position:relative;
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>