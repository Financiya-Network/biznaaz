<?php $__env->startSection('content'); ?>
    <?php echo e(HTML::script('public/js/facebox.js')); ?>

    <?php echo e(HTML::style('public/css/facebox.css')); ?>

    <script type="text/javascript">
        $(document).ready(function($) {
            $('.close_image').hide();
            $('a[rel*=facebox]').facebox({
                closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
            });
            $("#message").validate();
            $("#offer").validate();
            //        $('#message_part').animate({
            //    scrollTop: $('#message_part').offset().top}, 1000);
            //$(document).scrollTop(50);
            $('#message_part').animate({
                scrollTop: $('#message_part').prop('scrollHeight')
            });
        });

        function sendoffer() {
            if (!$("input[name='select_gig']:checked").val()) {
                alert('Please select a Gig!');
                //return false;
            } else {
                //alert('One of the radio buttons is checked!');
                $('#offer_section').show();
                $('#gigs_section').hide();

                var gigid = $("input[name='select_gig']:checked").val();
                ///alert($("#data-gig-"+gigid).text());
                $(".select_gig_ttl").text($("#data-gig-" + gigid).text());
            }
        }
    </script>
    <div class="main_dashboard message_dashboard terms_footer" >
        <div class="container">
            <div class="message_sections">
                <div class="row ml-0 mr-0">
                    <div class="col-xs-12 col-sm-4 col-md-3 no-padding">
                        <div class="message_left_part">
                            <h4>All Conversations</h4>
                            <div class="messagebx">
                                <ul>
                                    <?php
                                if ($userData) { 
                                    foreach ($userData as $users) { 
                                        ?>
                                    <li>
                                        <a href="<?php echo e(URL::to('messages/message/' . $users['slug'])); ?>">
                                            <div class="user_imges">
                                                <?php if ($users['profile_image']) { ?>
                                                <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $users['profile_image'], SITE_TITLE, ['id' => 'pimage'])); ?>

                                                <?php } else { ?>
                                                <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                                <?php } 
                                                    ?>
                                            </div>
                                            <?php if($users['user_status'] == 'Online'){ ?>
                                            <div class="status_online"><i class="fa fa-circle"></i></div>
                                            <?php }else{ ?>
                                            <div class="status_offline"><i class="fa fa-circle"></i></div>
                                            <?php } ?>
                                            <div class="message_chat_right">
                                                <h3><?php echo e($users['name']); ?></h3>
                                                <p><?php echo e($users['message']); ?></p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                    }
                                }
                                ?>
                                    <?php if(!$userData): ?>
                                        <?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e(URL::to('public-profile/' . $users['slug'])); ?>">
                                                    <div class="user_imges">
                                                        <?php if($users->profile_image): ?>
                                                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $users['profile_image'], SITE_TITLE, ['id' => 'pimage'])); ?>

                                                        <?php else: ?>
                                                            <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                                        <?php endif; ?>
                                                        <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE)); ?>

                                                    </div>
                                                    <div class="message_chat_right">
                                                        <h3><?php echo e($users['name']); ?></h3>
                                                        <p><?php echo e($users['message']); ?></p>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <!--     <li>
                                                                        <a href="#">
                                                                            <div class="user_imges"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE)); ?></div>
                                                                            <div class="message_chat_right">
                                                                                <h3>Madan mohan</h3>
                                                                                <p>Thank you so much!</p>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="user_imges"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE)); ?></div>
                                                                            <div class="message_chat_right">
                                                                                <h3>Madan mohan</h3>
                                                                                <p>Thank you so much!</p>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="user_imges"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE)); ?></div>
                                                                            <div class="message_chat_right">
                                                                                <h3>Madan mohan</h3>
                                                                                <p>Thank you so much!</p>
                                                                            </div>
                                                                        </a>
                                                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if($user): ?>
                        <div class="col-xs-12 col-sm-4 col-md-6 no-padding">
                            <div class="message_middel_part">
                                <h4><?php echo e($user->first_name . ' ' . $user->last_name); ?></h4>
                                <div class="messagebx_middel messagebx_middel_rightr" id="message_part">
                                    <ul>
                                        <?php if(!$messages->isEmpty()): ?>
                                            <?php
                                            $timeSecDay = '';
                                            $timeSecMonth = '';
                                            $timeSecYear = '';
                                            $oldTimeSecDay = '';
                                            $oldTimeSecMonth = '';
                                            $oldTimeSecYear = '';
                                            ?>
                                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php //echo '<pre>';print_r($message->User->first_name);
                                                $timeSecDay = date('d', strtotime($message->created_at));
                                                $timeSecMonth = date('m', strtotime($message->created_at));
                                                $timeSecYear = date('Y', strtotime($message->created_at));
                                                if ($timeSecYear != $oldTimeSecYear) {
                                                    echo '<span class="time_seprate">' . $timeSecYear . '</span>';
                                                } elseif ($timeSecMonth != $oldTimeSecMonth) {
                                                    echo '<span class="time_seprate">' . date('F Y', strtotime($message->created_at)) . '</span>';
                                                } elseif ($timeSecDay != $oldTimeSecDay) {
                                                    echo '<span class="time_seprate">' . date('d M Y', strtotime($message->created_at)) . '</span>';
                                                }
                                                ?>
                                                <li>
                                                    <!--                                    <a href="<?php echo e(URL::to('public-profile/' . $message->Sender->slug)); ?>">-->
                                                    <div class="user_imges">
                                                        <?php if($message->Sender->profile_image): ?>
                                                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $message->Sender->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

                                                        <?php else: ?>
                                                            <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                                        <?php endif; ?>
                                                        <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE)); ?>

                                                    </div>
                                                    <div class="message_chat_right">
                                                        <h3>
                                                            <?php if($message->Sender->id == $user->id): ?>
                                                                <?php echo e($message->Sender->first_name . ' ' . $message->Sender->last_name); ?>

                                                            <?php else: ?>
                                                                Me
                                                            <?php endif; ?>
                                                            <span><?php echo e($message->created_at->format('M d, h:i A')); ?></span>
                                                        </h3>
                                                        <p><?php echo e($message->message); ?></p>
                                                        <?php if($message->attachment): ?>
                                                            <a href="<?php echo e(URL::to('messages/download/' . $message->slug . '/' . $message->attachment)); ?>"
                                                                class="download_imges">
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!--                                    </a>-->
                                                </li>
                                                <?php //echo '<pre>';print_r($message->User->first_name);
                                                $oldTimeSecDay = $timeSecDay;
                                                $oldTimeSecMonth = $timeSecMonth;
                                                $oldTimeSecYear = $timeSecYear;
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                                <div class="messagebx_commant">
                                    <div class="ee er_msg postfrm"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                                    <?php echo e(Form::open(['method' => 'post', 'id' => 'message', 'enctype' => 'multipart/form-data'])); ?>

                                    <?php echo e(Form::textarea('message', null, ['rows' => '1', 'class' => 'form-control required', 'placeholder' => 'Write your message here', 'autocomplete' => 'off', 'id' => 'description'])); ?>

                                    <!--<textarea class="form-control"></textarea>-->
                                    <div class="meaasges_btn">
                                        <div class="attach_fliles">
                                            <?php echo e(Form::file('attachment', ['class' => '', 'accept' => IMAGE_EXT . ' ,application/pdf, application/msword, text/plain'])); ?>

                                        </div>
                                        <!--<a href="#" class="attach_icon"><i class="fa fa-paperclip" aria-hidden="true"></i></a>-->
                                        <!--<a href="#" class="create_offer">Create an Offer</a>-->
                                        <a href="javascript:void(0);" class="create_offer" data-toggle="modal"
                                            data-target="#offerModel">Create an offer</a>
                                        <!--<a href="#" class="btn btn-primary">Send</a>-->
                                        <?php //echo Session::get('user_id');
                                        ?>
                                        <?php echo e(Form::hidden('receiver_id', $user->id, ['class' => 'form-control required', 'id' => 'receiver_id'])); ?>

                                        <?php echo e(Form::hidden('sender_id', Session::get('user_id'), ['class' => 'form-control required', 'id' => 'sender_id'])); ?>

                                        <input class="btn btn-primary" value="Send" type="submit">
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 no-padding">
                            <div class="message_abouts">
                                <h4>About</h4>

                                <div class="message_abouts_user">
                                    <div class="message_abouts_img">
                                        <?php if($user->profile_image): ?>
                                            <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $user->profile_image, SITE_TITLE, ['id' => 'pimage'])); ?>

                                        <?php else: ?>
                                            <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                        <?php endif; ?>



                                    </div>
                                    <h3><?php echo e($user->first_name . ' ' . $user->last_name); ?></h3>
                                    <div class="message_details">
                                        <?php /*?> ?><div class="message_about_details">
                                            <label>Avg. Response Time</label>
                                            <span>1h</span>
                                        </div><?php */?>
                                        <div class="message_about_details">
                                            <label>From </label>
                                            <span>
                                                <?php
                                                $farray = [];
                                                if (isset($user->city) && $user->city != '') {
                                                    $farray[] = $user->city;
                                                }
                                                if (isset($user->Country->name) && $user->Country->name != '') {
                                                    $farray[] = $user->Country->name;
                                                }
                                                echo implode(', ', $farray);
                                                ?></span>
                                        </div>
                                        <div class="message_about_details">
                                            <label>
                                                <?php if($user->languages): ?>
                                                    <?php $__currentLoopData = json_decode($user->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!$loop->first): ?>
                                                            ,
                                                        <?php endif; ?><?php echo $lang->lang_name; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </label>
                                            <span>Basic</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-xs-12 col-sm-8 col-md-9 no-padding">
                            <div class="blank_mesage">
                                <span>User no selected for message</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <?php if($user): ?>
        <div class="modal fade publicprofile_modal" id="offerModel" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <?php echo e(Form::open(['method' => 'post', 'id' => 'offer', 'url' => 'gigs/createoffer', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-dialog" role="document" id="gigs_section">
                <div class="modal-content">
                    <div class="nzwh-wrapper">
                        <fieldset class="nzwh">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"> Select A Gig To Offer</h4>
                            </div>
                            <div class="drt_bx">
                                <div class="drt_bx_auto">
                                    <?php if(!$mygigs->isEmpty()): ?>
                                        <?php $__currentLoopData = $mygigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="gig_lst_g">
                                                <input type="radio" id="gig_<?php echo $allrecord->id; ?>"
                                                    value="<?php echo $allrecord->id; ?>" name="select_gig">
                                                <div class="gig_lst">
                                                    <div class="gig_img">
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
                                                        <?php echo e(HTML::image($gigimgname, SITE_TITLE, ['title' => $allrecord->title])); ?>

                                                    </div>
                                                    <div class="gig_title" id="data-gig-<?php echo $allrecord->id; ?>">
                                                        <?php echo e($allrecord->title); ?>

                                                    </div>
                                                </div>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="sendoffer();">Send</a>
                                </div>
                            <?php else: ?>
                                <div class="not_found">
                                    <div class="management-full">No gig posted by this user yet.</div>
                                </div>
    <?php endif; ?>

    </div>

    </fieldset>
    </div>
    </div>
    </div>
    <div class="modal-dialog" role="document" id="offer_section" style="display:none;">
        <div class="modal-content">
            <div class="nzwh-wrapper">
                <fieldset class="nzwh">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> Create A Custom Offer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="cot_offer">
                            <h3 class="select_gig_ttl">I will provide certified german translation service</h3>
                            <div class="offer_user_imges">
                                <?php if($senderUser->profile_image): ?>
                                    <?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $senderUser->profile_image, SITE_TITLE, ['id' => 'uimage'])); ?>

                                <?php else: ?>
                                    <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage'])); ?>

                                <?php endif; ?>
                            </div>
                            <div class="offer_user_input">
                                <?php echo e(Form::textarea('description', null, ['class' => 'form-control textarea_box required', 'placeholder' => '', 'autocomplete' => 'off', 'rows' => 5, 'id' => 'description_offer'])); ?>

                            </div>
                        </div>
                        <div class="one_delivery">
                            <input type="radio" name="onedelivery" id="onedelivery" checked>
                            <label>One Delivery:<span>Delivery a finished project</span></label>
                        </div>
                        <div class="total_amount_bx">
                            <div class="total_amount">
                                <label>Total Offer Amount</label>
                                <div class="offer-market-select">
                                    <!--                                    <div class="market-select">
                                            <span>-->
                                    <?php global $package_price; ?>
                                    <?php echo e(Form::text('basic_price', '', ['class' => 'form-control required', 'placeholder' => '$5000'])); ?>



                                    <!--                                        </span>
                                        </div>-->
                                </div>
                                <!--                                <div class="offer-market-select">
                                                                        <?php echo e(Form::text('total_offer', '', ['class' => 'form-control required', 'placeholder' => '$5000 max.', 'autocomplete' => 'OFF'])); ?>

                                                                        <input type="text" class="form-control" placeholder="$5000 max.">
                                                                    </div>-->
                            </div>
                            <div class="total_amount">
                                <label>Delivery Time</label>
                                <div class="offer-market-select">
                                    <div class="market-select">
                                        <span>
                                            <?php global $delivery_days; ?>
                                            <?php echo e(Form::select('basic_delivery', $delivery_days, null, ['class' => 'form-control required', 'placeholder' => 'Delivery Time'])); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="expiration_time">
                            <label>Expiration Time (optional)</label>
                            <div class="offer-market-select">
                                <div class="market-select">
                                    <span>
                                        <?php global $expry; //$expry = array('1 day'=>'1 day','2 day'=>'2 day','3 day'=>'3 day') ?>
                                        <?php echo e(Form::select('expiry', $expry, null, ['class' => 'form-control', 'placeholder' => 'Expiration Time'])); ?>

                                        <!--                                        <select class="form-control">
                                                <option>Select time</option>
                                                <option>1 day</option>
                                                <option>2 day</option>
                                                <option>3 day</option>
                                            </select>-->
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer offer-footer">
                        <a href="javascript:void(0);" class="btn btn-default"
                            onclick="$('#offer_section').hide()
                                            ; $('#gigs_section').show();">Back</a>
                        <?php //echo $user->id;
                        ?>
                        <?php echo e(Form::hidden('offer_user', $user->id, ['class' => 'form-control required', 'id' => 'offer_user'])); ?>

                        <?php echo e(Form::submit('Submit Offer', ['class' => 'succbtn', 'id' => 'succoffer'])); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>