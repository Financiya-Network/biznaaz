<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
    <script>
        //    $(function () {
        //        $("#skill_nameid").chosen({disable_search_threshold: 10});
        //    })
    </script>
    <?php echo e(HTML::script('public/js/facebox.js')); ?>

    <?php echo e(HTML::style('public/css/facebox.css')); ?>

    <script type="text/javascript">
        $.get("https://www.iplocate.io/api/lookup", function(response) {
            var ippp = response.ip;
            $recordInfo - > skills;
            //alert(ip);

            $("#countrynameid").val(response.country);
            $("#ip").val(ippp);
            // var ipp=document.getElementById('ip').value=ip;
            // alert(ipp);
            //var ippp=document.getElementById('id').value;

        }, 'jsonp');
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.close_image').hide();
            $('a[rel*=facebox]').facebox({
                closeImage: '<?php echo HTTP_PATH; ?>/public/img/close.png'
            });
        });
    </script>
    <div class="main_dashboard">
        <section class="dashboard-section">
            <div class="container">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="profile-bx">
                            <?php echo e(Form::open(['method' => 'post', 'id' => 'uplaodprofileimg', 'enctype' => 'multipart/form-data'])); ?>

                            <div class="profile-img">
                                <?php if(isset($recordInfo->profile_image) && file_exists('public/files/users/small/' . $recordInfo->profile_image)): ?>
                                    <?php echo e(HTML::image('public/files/users/small/' . $recordInfo->profile_image, SITE_TITLE, ['id' => 'pimage1'])); ?>

                                <?php else: ?>
                                    <?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage1'])); ?>

                                <?php endif; ?>
                                <div class="new-image-add">
                                    <?php echo e(Form::file('profile_image', ['class' => 'form-control', 'accept' => IMAGE_EXT, 'id' => 'profile_image'])); ?>

                                    <a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a>
                                </div>
                                <span class="ploader"
                                    id="ploader1"><?php echo e(HTML::image('public/img/loading.gif', SITE_TITLE)); ?></span>
                            </div>
                            <?php echo e(Form::close()); ?>

                            <?php echo e(Form::open(['method' => 'post', 'id' => 'updatename'])); ?>

                            <?php /*<h2>@if(isset($recordInfo->first_name))
                            {!! $recordInfo->first_name.' '.$recordInfo->last_name !!}
                            @else
                            {{'N/A'}}
                            @endif
                        </h2>*/
                            ?>
                            <?php if(isset($recordInfo->first_name) && $recordInfo->first_name != ''): ?>
                                <div id="name_id" class="showall">
                                    <span class="curpointer-name-user">
                                        <h2 id="showname"> <?php echo $recordInfo->first_name . ' ' . $recordInfo->last_name; ?> </h2>
                                        <span class="curpointer name-user" onclick="showeditdiv('name_id');">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </span>
                                    </span>
                                </div>
                                <div class=" displaynone" id="div_name_id">
                                    <?php echo e(Form::text('first_name', $recordInfo->first_name, ['class' => 'form-control required', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'id' => 'first_name_id'])); ?>

                                    <?php echo e(Form::text('last_name', $recordInfo->last_name, ['class' => 'form-control required', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'id' => 'last_name_id'])); ?>

                                    <div class="upbtn"><button type="button" class="cancelbtn" id="namsuccbtn"
                                            onclick="hideeditdiv('name_id');">Cancel</button> <button type="button"
                                            class="succbtn" id="succnmbtn">Update</button></div>
                                </div>
                            <?php else: ?>
                                <!--<label><i class="fa fa-pencil" aria-hidden="true"></i> Write Your Name</label>-->
                                <div id="name_id" class="showall">
                                    <span class="curpointer-name-user">
                                        <h2 id="showname"> Write Your Name </h2>
                                        <span class="curpointer" onclick="showeditdiv('name_id');">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </span>
                                    </span>
                                </div>
                                <div class=" displaynone" id="div_name_id">
                                    <?php echo e(Form::text('first_name', $recordInfo->first_name, ['class' => 'form-control required', 'placeholder' => 'First Name', 'autocomplete' => 'off', 'id' => 'first_name_id'])); ?>

                                    <?php echo e(Form::text('last_name', $recordInfo->last_name, ['class' => 'form-control required', 'placeholder' => 'Last Name', 'autocomplete' => 'off', 'id' => 'last_name_id'])); ?>

                                    <div class="upbtn"><button type="button" class="cancelbtn" id="namsuccbtn"
                                            onclick="hideeditdiv('name_id');">Cancel</button> <button type="button"
                                            class="succbtn" id="succnmbtn">Update</button></div>
                                </div>
                            <?php endif; ?>
                            <?php echo e(Form::close()); ?>


                            <?php echo e(Form::open(['method' => 'post', 'id' => 'updatecontact'])); ?>


                            <?php if(isset($recordInfo->contact)): ?>
                                <div id="contactn" class="showall"> <span id="showcontact"> <?php echo $recordInfo->contact; ?> </span>
                                    <span class="curpointer" onclick="showeditdiv('contactn');"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></span>
                                </div>
                                <div class=" displaynone" id="div_contactn">
                                    <?php echo e(Form::text('contact', $recordInfo->contact, ['class' => 'form-control required digits', 'placeholder' => 'Contact Number', 'autocomplete' => 'off', 'minlength' => 8, 'maxlength' => 16, 'id' => 'contactid'])); ?>

                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('contactn');">Cancel</button> <button type="button"
                                            class="succbtn" id="succbtnbtn">Update</button></div>
                                </div>
                            <?php else: ?>
                                <label><i class="fa fa-phone" aria-hidden="true"></i> Contact</label>
                                <div id="contactn" class="showall"> <span id="showcontact"> </span> <span
                                        class="curpointer" onclick="showeditdiv('contactn');"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></span></div>
                                <div class=" displaynone" id="div_contactn">
                                    <?php echo e(Form::text('contact', $recordInfo->contact, ['class' => 'form-control required digits', 'placeholder' => 'Contact Number', 'autocomplete' => 'off', 'minlength' => 8, 'maxlength' => 16, 'id' => 'contactid'])); ?>

                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('contactn');">Cancel</button> <button type="button"
                                            class="succbtn" id="succbtnbtn">Update</button></div>
                                </div>
                            <?php endif; ?>
                            <div class="preview-btn"><a href="<?php echo e(URL::to('public-profile/' . $recordInfo->slug)); ?>"
                                    class="btn-submit btn w-100 btn-theme btn-inverse">Preview Public Mode</a></div>

                            <div class="user-details">
                                <ul>
                                    <li><label><i class="fa fa-user" aria-hidden="true"></i>Member
                                            since</label><span><?php echo $recordInfo->created_at->format('M Y'); ?></span></li>
                                    <li id="countryctn" class="showall">
                                        <label class="cntry_div"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i>From</label>
                                        <span class="cnnnm cntry_right" id="countryid">
                                            <span id="cname">
                                                <?php
                                                $cname = '';
                                                $addd = [];
                                                if ($recordInfo->city) {
                                                    $addd[] = $recordInfo->city;
                                                }
                                                if ($recordInfo->country_id && isset($recordInfo->Country->name)) {
                                                    $cname = $recordInfo->Country->name;
                                                    $addd[] = $recordInfo->Country->name;
                                                }
                                                if ($recordInfo->zipcode) {
                                                    $addd[] = $recordInfo->zipcode;
                                                }
                                                echo implode(', ', $addd);
                                                ?>
                                            </span>
                                            <span class="curpointer" onclick="showeditdiv('countryctn');"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></span>
                                        </span>
                                    </li>
                                    <li id="statusctn" class="showall">
                                        <label class="cntry_div"><i class="fa fa-info" aria-hidden="true"></i>Online
                                            Status</label>
                                        <span class="cnnnm cntry_right" id="statusid">
                                            <span id="statusname">
                                                <?php
                                                if ($recordInfo->user_status) {
                                                    $statusname = $recordInfo->user_status;
                                                    echo $recordInfo->user_status;
                                                }
                                                ?>
                                            </span>
                                            <span class="curpointer" onclick="showeditdiv('statusctn');"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></span>
                                        </span>
                                    </li>
                                </ul>
                                <div class=" displaynone" id="div_countryctn">
                                    <div class="market-select">
                                        <span>
                                            <?php echo e(Form::select('countryname', $countryLists, $cname, ['class' => 'form-control required', 'placeholder' => 'Select country', 'id' => 'countrynameid'])); ?>

                                        </span>
                                    </div>

                                    <div class="educss">
                                        <div class="lan_field qul_selecy">
                                            <?php echo e(Form::text('city', $recordInfo->city, ['class' => 'form-control required', 'placeholder' => 'City', 'autocomplete' => 'off', 'id' => 'city_id', 'maxlength' => 20])); ?>

                                        </div>
                                        <div class="lan_field">
                                            <?php echo e(Form::text('zipcode', $recordInfo->zipcode, ['class' => 'form-control', 'placeholder' => 'Zipcode', 'autocomplete' => 'off', 'id' => 'zipcode_id', 'maxlength' => 10])); ?>

                                        </div>
                                    </div>
                                    <div class="upbtn"><button type="button" class="cancelbtn"
                                            onclick="hideeditdiv('countryctn');">Cancel</button> <button type="button"
                                            class="succbtn" id="countrybtn">Update</button></div>
                                </div>
                                <div class=" displaynone" id="div_statusctn">
                                    <div class="market-select">
                                        <span>
                                            <?php
                                            $statusList = ['Online' => 'Online', 'Offline' => 'Offline'];
                                            ?>
                                            <?php echo e(Form::select('user_status', $statusList, $statusname, ['class' => 'form-control required', 'placeholder' => 'Select status', 'id' => 'statusnameid'])); ?>

                                        </span>
                                    </div>
                                    <div class="upbtn"><button type="button" class="cancelbtn"
                                            onclick="hideeditdiv('statusctn');">Cancel</button> <button type="button"
                                            class="succbtn" id="statusbtn">Update</button></div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <?php echo e(Form::open(['method' => 'post', 'id' => 'updateother'])); ?>

                        <div class="profile-txtbx">
                            <div class="user-txt-bx">
                                <div id="descriptioncnt" class="showall">
                                    <h3>Description</h3>
                                    <span class="curpointer editright" onclick="showeditdiv('descriptioncnt');"><i
                                            class="fa fa-pencil" aria-hidden="true"> Edit Description</i></span>
                                    <div id="profile-description">
                                        <div class="text show-more-height">
                                            <div class="text-section">
                                                <p id="desctext"><?php echo nl2br($recordInfo->description); ?></p>
                                            </div>
                                        </div>
                                        <div class="show-more">(Show More)</div>
                                    </div>
                                </div>
                                <div class="editprofile displaynone" id="div_descriptioncnt">
                                    <h3>Description</h3>
                                    <div class="text-section">
                                        <?php echo e(Form::textarea('description', $recordInfo->description, ['class' => 'form-control required', 'placeholder' => 'Tell us about yourself', 'autocomplete' => 'off', 'rows' => 4, 'id' => 'descriptionid'])); ?>

                                    </div>
                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('descriptioncnt');">Cancel</button> <button
                                            type="button" class="succbtn" id="descriptionbtn">Update</button></div>
                                </div>
                            </div>
                            <div class="user-txt-bx">
                                <h3>Languages</h3>
                                <span class="curpointer addright" onclick="showeditdiv('languagesctn', '1');"
                                    id="pl_languagesctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <div class="languages_div displaynone" id="div_languagesctn">
                                    <div class="lan_field">
                                        <?php echo e(Form::text('language_name', null, ['class' => 'form-control required', 'placeholder' => 'Add language', 'autocomplete' => 'off', 'id' => 'language_nameid'])); ?>

                                    </div>
                                    <div class="lan_field">
                                        <div class="market-select">
                                            <span>
                                                <?php global $languageLevels; ?>
                                                <?php echo e(Form::select('language_level', $languageLevels, null, ['class' => 'form-control required', 'placeholder' => 'Language level', 'id' => 'language_levelid'])); ?>

                                            </span>
                                        </div>

                                    </div>

                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('languagesctn');">Cancel</button> <button type="button"
                                            class="succbtn" id="langbtn">Update</button></div>
                                    <?php echo e(Form::hidden('language_old', null, ['class' => 'form-control', 'id' => 'language_old'])); ?>

                                </div>
                                <div class="text-section">
                                    <ul class="items-list" id="addlangdiv">
                                        <?php if($recordInfo->languages): ?>
                                            <?php $__currentLoopData = json_decode($recordInfo->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li id="<?php echo $key; ?>"><span
                                                        class="title"><?php echo $lang->lang_name; ?></span><span
                                                        class="sub-title"><?php echo $lang->lang_level; ?></span><span
                                                        class="hint--top"><a href="javascript:void();"
                                                            onclick="editLang('<?php echo $key; ?>', '<?php echo $lang->lang_name; ?>', '<?php echo $lang->lang_level; ?>')"
                                                            title="Edit"><i class="fa fa-pencil"
                                                                aria-hidden="true"></i></a> </span> <span
                                                        class="hint--top"><a href="javascript:void();"
                                                            onclick="deleteLang('<?php echo $key; ?>')"
                                                            title="Delete"><i class="fa fa-trash-o"
                                                                aria-hidden="true"></i></a> </span></li>
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
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo HTTP_PATH; ?>/users/redirecttoacebook"
                                                    onclick="return loginsignup('redirecttofacebook');"><i
                                                        class="fa fa-facebook"
                                                        aria-hidden="true"></i><span>Facebook</span></a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($recordInfo->google_id): ?>
                                            <li>
                                                <i class="fa fa-google" aria-hidden="true"></i><span>Google</span>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo HTTP_PATH; ?>/users/redirecttogoogle"
                                                    onclick="return loginsignup('redirecttogoogle');"><i
                                                        class="fa fa-google"
                                                        aria-hidden="true"></i><span>Google</span></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <script type="text/javascript">
                                        var newwindow;
                                        var intId;

                                        function loginsignup(type) {
                                            var screenX = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
                                                screenY = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
                                                outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
                                                outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight -
                                                    22),
                                                width = 800,
                                                height = 500,
                                                left = parseInt(screenX + ((outerWidth - width) / 2), 10),
                                                top = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
                                                features = (
                                                    'width=' + width +
                                                    ',height=' + height +
                                                    ',left=' + left +
                                                    ',top=' + top
                                                );

                                            newwindow = window.open('<?php echo HTTP_PATH; ?>/users/' + type, 'Social Login', features);
                                            if (window.focus) {
                                                newwindow.focus()
                                            }
                                            return false;
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="user-txt-bx">
                                <h3>Skills</h3>
                                <span class="curpointer addright" onclick="showeditdiv('skillsctn', '1');"
                                    id="pl_skillsctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <div class="skills_div displaynone" id="div_skillsctn">
                                    <div class="lan_field">
                                        <?php echo e(Form::select('skill_name', $skillsList, null, ['class' => 'form-control skill_nameid_chosen required', 'placeholder' => 'Select skill', 'id' => 'skill_nameid'])); ?>

                                    </div>
                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('skillsctn');">Cancel</button> <button type="button"
                                            class="succbtn" id="addskilbtn">Add</button></div>
                                </div>
                                <div class="text-section">
                                    <ul class="linked-skills" id="addskilldiv">
                                        <?php if($recordInfo->skills): ?>
                                            <?php $skillarr = explode(',', $recordInfo->skills);
                                    if(count($skillarr) > 0){
                                    ?>
                                            <?php $__currentLoopData = $skillarr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skillid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($skillsList[$skillid])): ?>
                                                    <li id="s<?php echo $skillid; ?>"> <span>
                                                            <?php echo $skillsList[$skillid]; ?></span>
                                                        <div class="animate-show"><a href="javascript:void();"
                                                                onclick="deleteSkill('<?php echo $skillid; ?>')"
                                                                title="Delete"><i class="fa fa-trash-o"
                                                                    aria-hidden="true"></i></a> </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="user-txt-bx">
                                <h3>Education</h3>
                                <span class="curpointer addright" onclick="showeditdiv('educationctn', '1');"
                                    id="pl_educationctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <div class="languages_div displaynone" id="div_educationctn">
                                    <div class="lan_field">
                                        <div class="market-select">
                                            <span>
                                                <?php echo e(Form::select('country_name', $countryLists, null, ['class' => 'form-control required', 'placeholder' => 'Country of college/university', 'id' => 'country_nameid'])); ?></span>
                                        </div>
                                    </div>
                                    <div class="lan_field">
                                        <?php echo e(Form::text('university_name', null, ['class' => 'form-control required', 'placeholder' => 'College/university name', 'autocomplete' => 'off', 'id' => 'university_nameid'])); ?>

                                    </div>
                                    <div class="educss">
                                        <div class="lan_field qul_selecy">
                                            <div class="market-select">
                                                <span><?php echo e(Form::select('qual_name', $qualificationsLists, null, ['class' => 'form-control required', 'placeholder' => 'Qualifications', 'id' => 'qual_nameid'])); ?></span>
                                            </div>
                                        </div>
                                        <div class="lan_field">
                                            <?php echo e(Form::text('stream_name', null, ['class' => 'form-control required', 'placeholder' => 'In stream', 'autocomplete' => 'off', 'id' => 'stream_nameid'])); ?>

                                        </div>
                                    </div>
                                    <div class="lan_field">
                                        <div class="market-select">
                                            <span>
                                                <?php global $yeatArray; ?>
                                                <?php echo e(Form::select('year', $yeatArray, null, ['class' => 'form-control required', 'placeholder' => 'Year of education', 'id' => 'yearid'])); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('educationctn');">Cancel</button> <button type="button"
                                            class="succbtn" id="edubtn">Add</button></div>
                                    <?php echo e(Form::hidden('edu_old', null, ['class' => 'form-control', 'id' => 'edu_old'])); ?>

                                </div>
                                <div class="text-section" id="addedudiv">
                                    <?php if($recordInfo->educations): ?>
                                        <?php $__currentLoopData = json_decode($recordInfo->educations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li id="<?php echo $key; ?>">
                                                <div class="edutop"><span
                                                        class="title"><?php echo $edu->qual_name; ?></span><span
                                                        class="sub-title"><?php echo $edu->stream_name; ?></span> <span
                                                        class="hint--top"><a href="javascript:void();"
                                                            onclick="editEdu('<?php echo $key; ?>', '<?php echo $edu->country_name; ?>', '<?php echo $edu->university_name; ?>', '<?php echo $edu->qual_name; ?>', '<?php echo $edu->stream_name; ?>', '<?php echo $edu->year; ?>')"
                                                            title="Edit"><i class="fa fa-pencil"
                                                                aria-hidden="true"></i></a> </span> <span
                                                        class="hint--top"><a href="javascript:void();"
                                                            onclick="deleteEdu('<?php echo $key; ?>')"
                                                            title="Delete"><i class="fa fa-trash-o"
                                                                aria-hidden="true"></i></a></span></div>
                                                <div class="edu_btm"><span class="title"> <?php echo $edu->university_name; ?>,
                                                        <?php echo $edu->country_name; ?>, Pass in <?php echo $edu->year; ?></span>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="user-txt-bx user-txt-bx-last">
                                <h3>Certification</h3>
                                <span class="curpointer addright" onclick="showeditdiv('certificationctn', '1');"
                                    id="pl_certificationctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <div class="languages_div displaynone" id="div_certificationctn">
                                    <div class="lan_field">
                                        <?php echo e(Form::text('certificate_name', null, ['class' => 'form-control required', 'placeholder' => 'Certificate or award', 'autocomplete' => 'off', 'id' => 'certificate_nameid'])); ?>

                                    </div>
                                    <div class="lan_field">
                                        <?php echo e(Form::text('certificate_from', null, ['class' => 'form-control required', 'placeholder' => 'Certified from (e.g. Adobe)', 'autocomplete' => 'off', 'id' => 'certificate_fromid'])); ?>

                                    </div>
                                    <div class="lan_field">
                                        <div class="market-select">
                                            <span>
                                                <?php echo e(Form::select('year', $yeatArray, null, ['class' => 'form-control required', 'placeholder' => 'Year of certification', 'id' => 'yearcertid'])); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn"
                                            onclick="hideeditdiv('certificationctn');">Cancel</button> <button
                                            type="button" class="succbtn" id="certbtn">Add</button></div>
                                    <?php echo e(Form::hidden('cert_old', null, ['class' => 'form-control', 'id' => 'cert_old'])); ?>

                                </div>
                                <div class="text-section" id="addcertdiv">
                                    <?php if($recordInfo->certifications): ?>
                                        <?php $__currentLoopData = json_decode($recordInfo->certifications); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li id="<?php echo $key; ?>">
                                                <div class="edutop"><span class="title"><?php echo $cert->certificate_name; ?></span>
                                                    <span class="hint--top"><a href="javascript:void();"
                                                            onclick="editCert('<?php echo $key; ?>', '<?php echo $cert->certificate_name; ?>', '<?php echo $cert->certificate_from; ?>', '<?php echo $cert->year; ?>')"
                                                            title="Edit"><i class="fa fa-pencil"
                                                                aria-hidden="true"></i></a> </span> <span
                                                        class="hint--top"><a href="javascript:void();"
                                                            onclick="deleteCert('<?php echo $key; ?>')"
                                                            title="Delete"><i class="fa fa-trash-o"
                                                                aria-hidden="true"></i></a></span>
                                                </div>
                                                <div class="edu_btm"><span class="title"> <?php echo $cert->certificate_from; ?>, Pass
                                                        in <?php echo $cert->year; ?></span></div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <div class="col-sm-7 col-md-8">
                        <div class="dashboard-rights-section">
                            <div class="statistics row">
                                <div class="col-12 col-xl-12 col-sm-6">
                                    <div class="header" style="border: 1px #ddd solid;">
                                        <div
                                            class="posted-projects list-item d-flex align-items-center justify-content-between text-right">
                                            <div class="inner">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="home-tab"
                                                            data-bs-toggle="tab" data-bs-target="#home" type="button"
                                                            role="tab" aria-controls="home"
                                                            aria-selected="true">Active Gigs</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                            data-bs-target="#profile" type="button" role="tab"
                                                            aria-controls="profile" aria-selected="false">Latest Buyer
                                                            Requests</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                            data-bs-target="#contact" type="button" role="tab"
                                                            aria-controls="contact" aria-selected="false">Latest Selling
                                                            Orders</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row">
                                        <?php if(!$mygigs->isEmpty()): ?>
                                            <?php $__currentLoopData = $mygigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="thumbnail">
                                                        <div class="project-img">
                                                            <?php
                                                            $gigimgname = '';
                                                            if ($allrecord->Image) {
                                                                foreach ($allrecord->Image as $gigimage) {
                                                                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                                                                        $path = 'public/files/gigs/full/' . $gigimage->name;
                                                                        if (file_exists($path) && !empty($gigimage->name)) {
                                                                            $gigimgname = 'public/files/gigs/full/' . $gigimage['name'];
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            if ($gigimgname == '' && $allrecord->youtube_image) {
                                                                if (file_exists('public/files/gigs/full/' . $allrecord->youtube_image)) {
                                                                    $gigimgname = 'public/files/gigs/full/' . $allrecord->youtube_image;
                                                                }
                                                            }
                                                            if ($gigimgname == '') {
                                                                $gigimgname = 'public/img/front/dummy.png';
                                                            }
                                                            ?>
                                                            <a href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"
                                                                class=""><?php echo e(HTML::image($gigimgname, SITE_TITLE, ['title' => $allrecord->title])); ?></a>
                                                        </div>
                                                        <div class="caption">
                                                            <h3><a href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"
                                                                    class=""><?php echo e(mb_substr($allrecord->title, 0, 40)); ?></a>
                                                            </h3>
                                                            <div class="pro-bottm">
                                                                <div class="pro-bottm-left"><a
                                                                        id="maraction-<?php echo e($allrecord->id); ?>"
                                                                        class="maraction" href="javascript:void(0);"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Gig Actions"><?php echo e(HTML::image('public/img/front/ellipsis.png', SITE_TITLE)); ?></a>
                                                                </div>
                                                                <div class="pro-bottm-right">
                                                                    <a
                                                                        href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"><small>Starting
                                                                            at</small><?php echo e(CURR . $allrecord->basic_price); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="offer-show-<?php echo e($allrecord->id); ?>" class="show-adwanv">
                                                            <ul>
                                                                <li>
                                                                    <a href="<?php echo e(URL::to('gigs/edit/' . $allrecord->slug)); ?>"
                                                                        class=""><i class="fa fa-pencil"
                                                                            aria-hidden="true"></i><span>Edit</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"
                                                                        class=""><i class="fa fa-eye"
                                                                            aria-hidden="true"></i><span>View
                                                                            Detail</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo e(URL::to('gigs/delete/' . $allrecord->slug)); ?>"
                                                                        class=""
                                                                        onclick="return confirm('Are you sure you want to delete this record?')"><i
                                                                            class="fa fa-trash"
                                                                            aria-hidden="true"></i><span>Delete</span></a>
                                                                </li>
                                                                <li class="advanced-setting">
                                                                    <a href="javascript:void(0);" class="clsstng"
                                                                        id="close-<?php echo e($allrecord->id); ?>"><i
                                                                            class="fa fa-close"
                                                                            aria-hidden="true"></i><span>Close</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <div class="thumbnail">
                                                    <div class="creat-new">
                                                        <a href="<?php echo e(URL::to('gigs/create')); ?>">
                                                            <i>
                                                                <?php echo e(HTML::image('public/img/front/plus.png', SITE_TITLE)); ?></i>
                                                            <span>Create a new gig</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="statistics row">
                                                <div class="col-12 col-xl-12 col-sm-6">
                                                    <div class="header" style="border: 1px #ddd solid;">
                                                        <div
                                                            class="posted-projects list-item d-flex align-items-center justify-content-between text-right">
                                                            <div class="inner">
                                                                <span><button type="button"
                                                                        class="btn btn-outline-success">Active
                                                                        Gigs123</button></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="thumbnail">
                                                    <div class="creat-new creat-new-full">
                                                        <a href="<?php echo e(URL::to('gigs/create')); ?>">
                                                            <i>
                                                                <?php echo e(HTML::image('public/img/front/plus.png', SITE_TITLE)); ?></i>
                                                            <span>Create a new gig</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <?php if(!$latestservices->isEmpty()): ?>
                                        <div class="dashborad-tt">
                                            <div class="buyer-top-title">
                                                <h2>Latest Buyer Requests</h2>
                                            </div>
                                            <div class="management-bx">
                                                <div class="management-table management-table-left">
                                                    <div class="management-table-tr">
                                                        <div class="management-table-th">Date</div>
                                                        <div class="management-table-th">Buyer</div>
                                                        <div class="management-table-th">Request</div>
                                                        <div class="management-table-th">Budget</div>
                                                    </div>
                                                    <?php $__currentLoopData = $latestservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($allrecord->User->slug)): ?>
                                                            <div class="management-table-tr">
                                                                <div class="management-table-td">
                                                                    <?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                                                                <div class="management-table-td">
                                                                    <div class="buyer-img">
                                                                        <?php if(isset($allrecord->User->profile_image)): ?>
                                                                            <a href="<?php echo e(URL::to('public-profile/' . $allrecord->User->slug)); ?>"
                                                                                class=""><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->User->profile_image, SITE_TITLE, ['style' => 'max-width: 60px'])); ?></a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(URL::to('public-profile/' . $allrecord->User->slug)); ?>"
                                                                                class=""><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['style' => 'max-width: 60px'])); ?></a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="management-table-td management-table-td-fixed dashlink management-gig-title">
                                                                    <a href="<?php echo e(URL::to('buyer-requests/' . $allrecord->slug)); ?>"
                                                                        class=""><?php echo e($allrecord->title); ?></a>
                                                                    <p><?php echo e(str_limit($allrecord->description, $limit = 150, $end = '...')); ?>

                                                                    </p>
                                                                </div>
                                                                <div class="management-table-td">
                                                                    <?php echo e(CURR . number_format($allrecord->price, 2)); ?></div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <?php if(!$myorders->isEmpty()): ?>
                                        <div class="dashborad-tt">
                                            <div class="buyer-top-title">
                                                <h2>Latest Selling Orders</h2>
                                            </div>
                                            <div class="management-bx">
                                                <div class="management-bx-over">
                                                    <div class="management-table">
                                                        <div class="management-table-tr">
                                                            <div class="management-table-th dashdate">Date</div>
                                                            <div class="management-table-th dashbuyer">Buyer Name</div>
                                                            <div class="management-table-th dashtitle">Gig/Service Title
                                                            </div>
                                                            <div class="management-table-th">Package</div>
                                                            <div class="management-table-th">Amount</div>
                                                            <div class="management-table-th">Action</div>
                                                        </div>
                                                        <?php global $gigOrderStatus; ?>
                                                        <?php $__currentLoopData = $myorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="management-table-tr">
                                                                <div class="management-table-td">
                                                                    <?php echo e($allrecord->created_at->format('d M, Y')); ?></div>
                                                                <div class="management-table-td"> <?php //echo '<pre>';print_r($allrecord);
                                                                ?>
                                                                    <?php if(isset($allrecord->Buyer)): ?>
                                                                        <?php echo $allrecord->Buyer->first_name . ' ' . $allrecord->Buyer->last_name; ?>

                                                                    <?php else: ?>
                                                                        <?php echo e('N/A'); ?>

                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="management-table-td management-gig-title">
                                                                    <?php if(isset($allrecord->Gig)): ?>
                                                                        <?php echo e($allrecord->Gig->title); ?>

                                                                    <?php elseif(isset($allrecord->Service)): ?>
                                                                        <?php echo e($allrecord->Service->title); ?>

                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="management-table-td"><?php echo e($allrecord->package); ?>

                                                                </div>
                                                                <div class="management-table-td">
                                                                    <?php echo e(CURR . $allrecord->revenue); ?>

                                                                </div>
                                                                <div class="management-table-td">
                                                                    <a href="#info<?php echo $allrecord->id; ?>"
                                                                        title="View Offer Details"
                                                                        class="btn btn-primary btn-xs" rel='facebox'><i
                                                                            class="fa fa-eye"></i></a>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $myorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="info<?php echo $allrecord->id; ?>" style="display: none;"
                                                    class="frnt_div">
                                                    <div class="nzwh-wrapper">
                                                        <fieldset class="nzwh">
                                                            <legend class="head_pop">
                                                                Order #
                                                                <?php if($allrecord->pay_type === 'Wallet'): ?>
                                                                    <?php echo e($allrecord->wallet_trn_id); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($allrecord->paypal_trn_id); ?>

                                                                <?php endif; ?>
                                                            </legend>
                                                            <div class="drt">
                                                                <div class="admin_pop"><span>Buyer Name: </span> <label>
                                                                        <?php if(isset($allrecord->Buyer)): ?>
                                                                            <?php echo $allrecord->Buyer->first_name . ' ' . $allrecord->Buyer->last_name; ?>

                                                                        <?php else: ?>
                                                                            <?php echo e('N/A'); ?>

                                                                        <?php endif; ?>
                                                                    </label></div>
                                                                <div class="admin_pop"><span>Gig Title: </span>
                                                                    <label><?php echo e(isset($allrecord->Gig->title) ? $allrecord->Gig->title : ''); ?></label>
                                                                </div>
                                                                <div class="admin_pop"><span>Order Date: </span>
                                                                    <label><?php echo e($allrecord->created_at->format('d M, Y')); ?></label>
                                                                </div>
                                                                <div class="admin_pop"><span>Order ID: </span> <label>
                                                                        <?php if($allrecord->pay_type === 'Wallet'): ?>
                                                                            <?php echo e($allrecord->wallet_trn_id); ?>

                                                                        <?php else: ?>
                                                                            <?php echo e($allrecord->paypal_trn_id); ?>

                                                                        <?php endif; ?>
                                                                    </label>
                                                                </div>
                                                                <div class="admin_pop"><span>Package: </span>
                                                                    <label><?php echo e($allrecord->package); ?></label>
                                                                </div>
                                                                <div class="admin_pop"><span>Amount: </span>
                                                                    <label><?php echo e($allrecord->revenue); ?></label>
                                                                </div>
                                                                <div class="admin_pop"><span>Status: </span>
                                                                    <label><?php echo e($gigOrderStatus[$allrecord->status]); ?></label>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="dashborad-tt">
                                            <div class="buyer-top-title">
                                                <h2>Latest Selling Orders</h2>
                                            </div>
                                            <div class="management-bx">
                                                <div class="management-bx-over">
                                                    <div class="management-table">
                                                        <div class="management-table-tr">
                                                            <div class="management-table-th dashdate">Date</div>
                                                            <div class="management-table-th dashbuyer">Buyer Name</div>
                                                            <div class="management-table-th dashtitle">Gig/Service Title
                                                            </div>
                                                            <div class="management-table-th">Package</div>
                                                            <div class="management-table-th">Amount</div>
                                                            <div class="management-table-th">Action</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="buyer-top-title">
                                                    <h2>No Records Found.</h2>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        function showeditdiv(did, add = 0) {
            $('.curpointer').show();
            $('#pl_' + did).hide();
            $('.displaynone').hide();
            $('.showall').show();
            $('#language_nameid').val('');
            $('#language_levelid').val('');
            $('#language_old').val('');
            $('#skill_nameid').val('');

            $('#status_nameid').val('');
            $('#country_nameid').val('');
            $('#university_nameid').val('');
            $('#qual_nameid').val('');
            $('#stream_nameid').val('');
            $('#yearid').val('');
            $('#edu_old').val('');

            $('#certificate_nameid').val('');
            $('#certificate_fromid').val('');
            $('#yearcertid').val('');
            $('#cert_old').val('');

            if (add == 1) {
                $('.succbtn').html('Add');
            }
            $('#' + did).hide();
            $('#div_' + did).show();

        }

        function hideeditdiv(did) {
            $('#pl_' + did).show();
            $('#' + did).show();
            $('#div_' + did).hide();
        }

        function editLang(key, lname, llevel) {
            $('#div_languagesctn').show();
            $('#language_nameid').val(lname);
            $('#language_levelid').val(llevel);
            $('#language_old').val(key);
        }

        function deleteLang(key) {
            $('#' + key).remove();
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                type: "POST",
                data: {
                    "deletekey": key,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
            });
        }

        function deleteSkill(key) {
            $('#s' + key).remove();
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                type: "POST",
                data: {
                    "deleteskill": key,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
            });
        }

        function editEdu(key, country_name, university_name, qual_name, stream_name, year) {
            $('#div_educationctn').show();
            $('#country_nameid').val(country_name);
            $('#university_nameid').val(university_name);
            $('#qual_nameid').val(qual_name);
            $('#stream_nameid').val(stream_name);
            $('#yearid').val(year);
            $('#edu_old').val(key);
            $('#edubtn').html('Update');
        }

        function deleteEdu(key) {
            $('#' + key).remove();
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                type: "POST",
                data: {
                    "deleteedu": key,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
            });
        }

        function editCert(key, certificate_name, certificate_from, year) {
            $('#div_certificationctn').show();
            $('#certificate_nameid').val(certificate_name);
            $('#certificate_fromid').val(certificate_from);
            $('#yearcertid').val(year);
            $('#cert_old').val(key);
            $('#certbtn').html('Update');
        }

        function deleteCert(key) {
            $('#' + key).remove();
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                type: "POST",
                data: {
                    "deletecert": key,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
            });
        }

        $(document).ready(function() {
            $("#uplaodprofileimg").on('change', function(event) {
                var postData = new FormData(this);
                event.preventDefault();
                $.ajax({
                    url: "<?php echo HTTP_PATH; ?>/users/uploadprofileimage",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#ploader').show();
                        $('#ploader1').show();
                    },
                    success: function(imagename) {
                        $('#pimage').attr("src", "<?php echo PROFILE_SMALL_DISPLAY_PATH; ?>" + imagename);
                        $('#pimage1').attr("src", "<?php echo PROFILE_SMALL_DISPLAY_PATH; ?>" + imagename);
                        $('#ploader').hide();
                        $('#ploader1').hide();
                    }
                });
            });

            $("#succbtnbtn").click(function() {
                if ($("#updatecontact").valid()) {
                    $('#showcontact').html($("#contactid").val());
                    $('#contactn').show();
                    $('#div_contactn').hide();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        data: $('#updatecontact').serialize(),
                    });
                }
            });
            $("#succnmbtn").click(function() {
                if ($("#updatename").valid()) {
                    $('#showname').html($("#first_name_id").val() + ' ' + $("#last_name_id").val());
                    $('#name_id').show();
                    $('#div_name_id').hide();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        data: $('#updatename').serialize(),
                    });
                }
            });

            $("#countrybtn").click(function() {
                if ($("#updatecontact").valid()) {
                    var countryname = $('#city_id').val() + ', ' + $("#countrynameid option:selected")
                        .text() + ', ' + $('#zipcode_id').val();
                    $('#countryctn').show();
                    $('#div_countryctn').hide();
                    $('#cname').html(countryname);
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "countrynameid": $('#countrynameid').val(),
                            "city_id": $('#city_id').val(),
                            "zipcode_id": $('#zipcode_id').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });
            $("#statusbtn").click(function() {
                if ($("#updatecontact").valid()) {
                    var statusname = $("#statusnameid option:selected").text();
                    $('#statusctn').show();
                    $('#div_statusctn').hide();
                    $('#statusname').html(statusname);
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "statusnameid": $('#statusnameid').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });

            $("#descriptionbtn").click(function() {
                if ($("#updateother").valid()) {
                    $('#desctext').html($("#descriptionid").val().replace(/\n/g, "<br>"));
                    $('#descriptioncnt').show();
                    $('#div_descriptioncnt').hide();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "description": $('#descriptionid').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });

            $("#langbtn").click(function() {
                if ($("#updateother").valid()) {
                    $('#div_languagesctn').hide();
                    if ($('#language_old').val()) {
                        var sl = $('#language_old').val();
                        $('#' + $('#language_old').val()).html('<span class="title">' + $(
                                '#language_nameid').val() + '</span><span class="sub-title">' + $(
                                '#language_levelid').val() +
                            '</span><span class="hint--top"><a href="javascript:void();" onclick="editLang(\'' +
                            sl + '\',\'' + $('#language_nameid').val() + '\',\'' + $(
                                '#language_levelid').val() +
                            '\')"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteLang(\'' +
                            sl + '\')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span>');
                    } else {
                        var sl = $('#language_nameid').val().replace(" ", "_").toLowerCase();
                        $('#addlangdiv').append('<li id="' + sl + '"><span class="title">' + $(
                                '#language_nameid').val() + '</span><span class="sub-title">' + $(
                                '#language_levelid').val() +
                            '</span><span class="hint--top"><a href="javascript:void();" onclick="editLang(\'' +
                            sl + '\',\'' + $('#language_nameid').val() + '\',\'' + $(
                                '#language_levelid').val() +
                            '\')"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteLang(\'' +
                            sl +
                            '\')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span></li>');
                    }
                    $('#pl_languagesctn').show();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "lang_name": $('#language_nameid').val(),
                            "lang_level": $('#language_levelid').val(),
                            "lang_old": $('#language_old').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });

            $("#addskilbtn").click(function() {
                if ($("#updateother").valid()) {
                    $('#div_skillsctn').hide();
                    var skillId = $('#skill_nameid').val();
                    var skilltext = $("#skill_nameid option:selected").text();
                    $('#addskilldiv').append('<li id="s' + skillId + '"> <span> ' + skilltext +
                        '</span> <div class="animate-show"><a href="javascript:void();" onclick="deleteSkill(' +
                        skillId +
                        ')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div></li>'
                    );
                    $('#pl_skillsctn').show();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "skill_ids": $('#skill_nameid').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });
            $("#edubtn").click(function() {
                if ($("#updateother").valid()) {
                    $('#div_educationctn').hide();
                    var countryName = $("#country_nameid").val();
                    var qualName = $("#qual_nameid").val();

                    if ($('#edu_old').val()) {
                        var sl = $('#edu_old').val();
                        $('#' + $('#edu_old').val()).html('<div class="edutop"><span class="title">' +
                            qualName + '</span><span class="sub-title">' + $('#stream_nameid').val() +
                            '</span> <span class="hint--top"><a href="javascript:void();" onclick="editEdu(\'' +
                            sl + '\',\'' + countryName + '\',\'' + $('#university_nameid').val() +
                            '\',\'' + qualName + '\',\'' + $('#stream_nameid').val() + '\',\'' + $(
                                '#yearid').val() +
                            '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteEdu(\'' +
                            sl +
                            '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' +
                            $('#university_nameid').val() + ', ' + countryName + ', Pass in ' + $(
                                '#yearid').val() + '</span></div>');
                    } else {
                        var sl = $('#stream_nameid').val().replace(" ", "_").toLowerCase();
                        $('#addedudiv').append('<li id="' + sl +
                            '"><div class="edutop"><span class="title">' + qualName +
                            '</span><span class="sub-title">' + $('#stream_nameid').val() +
                            '</span> <span class="hint--top"><a href="javascript:void();" onclick="editEdu(\'' +
                            sl + '\',\'' + countryName + '\',\'' + $('#university_nameid').val() +
                            '\',\'' + qualName + '\',\'' + $('#stream_nameid').val() + '\',\'' + $(
                                '#yearid').val() +
                            '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteEdu(\'' +
                            sl +
                            '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' +
                            $('#university_nameid').val() + ', ' + countryName + ', Pass in ' + $(
                                '#yearid').val() + '</span></div></li>');
                    }
                    $('#pl_educationctn').show();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "country_name": countryName,
                            "university_name": $('#university_nameid').val(),
                            "qual_name": qualName,
                            "stream_name": $('#stream_nameid').val(),
                            "year": $('#yearid').val(),
                            "edu_old": $('#edu_old').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });
            $("#certbtn").click(function() {
                if ($("#updateother").valid()) {
                    $('#div_certificationctn').hide();
                    if ($('#cert_old').val()) {
                        var sl = $('#cert_old').val();
                        $('#' + $('#cert_old').val()).html('<div class="edutop"><span class="title">' + $(
                                '#certificate_nameid').val() +
                            '</span> <span class="hint--top"><a href="javascript:void();" onclick="editCert(\'' +
                            sl + '\',\'' + $('#certificate_nameid').val() + '\',\'' + $(
                                '#certificate_fromid').val() + '\',\'' + $('#yearcertid').val() +
                            '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteCert(\'' +
                            sl +
                            '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' +
                            $('#certificate_fromid').val() + ', Pass in ' + $('#yearcertid').val() +
                            '</span></div>');
                    } else {
                        var sl = $('#certificate_nameid').val().replace(" ", "_").toLowerCase();
                        $('#addcertdiv').append('<li id="' + sl +
                            '"><div class="edutop"><span class="title">' + $('#certificate_nameid')
                            .val() +
                            '</span> <span class="hint--top"><a href="javascript:void();" onclick="editCert(\'' +
                            sl + '\',\'' + $('#certificate_nameid').val() + '\',\'' + $(
                                '#certificate_fromid').val() + '\',\'' + $('#yearcertid').val() +
                            '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteCert(\'' +
                            sl +
                            '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' +
                            $('#certificate_fromid').val() + ', Pass in ' + $('#yearcertid').val() +
                            '</span></div></li>');
                    }
                    $('#pl_certificationctn').show();
                    $.ajax({
                        url: "<?php echo HTTP_PATH; ?>/users/updatedata",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            "certificate_name": $('#certificate_nameid').val(),
                            "certificate_from": $('#certificate_fromid').val(),
                            "year": $('#yearcertid').val(),
                            "cert_old": $('#cert_old').val(),
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                    });
                }
            });


            $('[data-toggle="tooltip"]').tooltip();

        });
    </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).ready(function() {
            $(".maraction").click(function() {
                thisid = this.id;
                var id = thisid.split('-');
                $("#offer-show-" + id[1]).addClass("offer-div");
                //            $(".dashboard-rights-section").removeClass("offer-div");
            });
            $(".clsstng").click(function() {
                thisid = this.id;
                var id = thisid.split('-');
                $("#offer-show-" + id[1]).removeClass("offer-div");
            });
        });
    </script>
    <script>
        $(".show-more").click(function() {
            if ($(".text").hasClass("show-more-height")) {
                $(this).text("(Show Less)");
            } else {
                $(this).text("(Show More)");
            }

            $(".text").toggleClass("show-more-height");
        });
    </script>
    <style>
        .management-gig-title {
            word-wrap: anywhere;
            width: 50%
        }

        #profile-description {
            position: relative;
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

<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>