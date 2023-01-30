@extends('layouts.inner')
@section('content')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script>
    $(function () {
        $("#skill_nameid").chosen({disable_search_threshold: 10});
    })
</script>
{{ HTML::script('public/js/facebox.js')}}
{{ HTML::style('public/css/facebox.css')}}
<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '{!! HTTP_PATH !!}/public/img/close.png'
        });
    });
</script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-4">
                    <div class="profile-bx">
                        {{ Form::open(array('method' => 'post', 'id' => 'uplaodprofileimg', 'enctype' => "multipart/form-data")) }}
                        <div class="profile-img">
                            @if(isset($recordInfo->profile_image))
                            {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}
                            @else
                            {{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}
                            @endif
                            <div class="new-image-add">
                                {{Form::file('profile_image', ['class'=>'form-control', 'accept'=>IMAGE_EXT, 'id'=>'profile_image'])}}
                                <a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a>
                            </div>
                            <span class="ploader" id="ploader">{{HTML::image('public/img/loading.gif', SITE_TITLE)}}</span>
                        </div>
                        {{ Form::close()}}
                        {{ Form::open(array('method' => 'post', 'id' => 'updatecontact')) }}
                        <h2>@if(isset($recordInfo->first_name))
                            {!! $recordInfo->first_name.' '.$recordInfo->last_name !!}
                            @else
                            {{'N/A'}}
                            @endif
                        </h2>
                        @if(isset($recordInfo->contact))
                        <p id="contactn" class="showall"> <span id="showcontact"> {!! $recordInfo->contact !!} </span> <span class="curpointer" onclick="showeditdiv('contactn');"><i class="fa fa-pencil" aria-hidden="true"></i></span></p>
                        <div class=" displaynone" id="div_contactn">
                            {{Form::text('contact', $recordInfo->contact, ['class'=>'form-control required digits', 'placeholder'=>'Contact Number', 'autocomplete' => 'off', 'minlength' => 8, 'maxlength' => 16, 'id'=>'contactid'])}}
                            <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn" onclick="hideeditdiv('contactn');">Cancel</button> <button type="button" class="succbtn" id="succbtnbtn">Update</button></div>
                        </div>
                        @endif
                        <div class="preview-btn"><a href="{{ URL::to( 'public-profile/'.$recordInfo->slug)}}" class="btn btn-default">Preview Public Mode</a></div>

                        <div class="user-details">
                            <ul>
                                <li><label><i class="fa fa-user" aria-hidden="true"></i>Member since</label><span>{!! $recordInfo->created_at->format('M Y')!!}</span></li>
                                <li id="countryctn" class="showall">
                                    <label class="cntry_div"><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                    <span class="cnnnm cntry_right" id="countryid">
                                        <span id="cname">
                                            <?php
                                            $cname = '';
                                            $addd = array();
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
                                        <span class="curpointer" onclick="showeditdiv('countryctn');"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                    </span>
                                </li>
                                <li id="statusctn" class="showall">
                                    <label class="cntry_div"><i class="fa fa-info" aria-hidden="true"></i>Online Status</label>
                                    <span class="cnnnm cntry_right" id="statusid">
                                        <span id="statusname">
                                            <?php
                                            if ($recordInfo->user_status) {
                                                $statusname = $recordInfo->user_status;
                                                echo $recordInfo->user_status;
                                            }
                                            ?>
                                        </span>
                                        <span class="curpointer" onclick="showeditdiv('statusctn');"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                    </span>
                                </li>
                            </ul>
                            <div class=" displaynone" id="div_countryctn">
                                <div class="market-select">
                                    <span>
                                         {{Form::select('countryname', $countryLists, $cname, ['class' => 'form-control required','placeholder' => 'Select country', 'id'=>'countrynameid'])}}
                                    </span>
                                </div>
                               
                                <div class="educss">
                                    <div class="lan_field qul_selecy">
                                        {{Form::text('city', $recordInfo->city, ['class'=>'form-control required', 'placeholder'=>'City', 'autocomplete' => 'off', 'id'=>'city_id', 'maxlength'=>20])}}
                                    </div>
                                    <div class="lan_field"> {{Form::text('zipcode', $recordInfo->zipcode, ['class'=>'form-control required', 'placeholder'=>'Zipcode', 'autocomplete' => 'off', 'id'=>'zipcode_id', 'maxlength'=>10])}}</div>
                                </div>
                                <div class="upbtn"><button type="button" class="cancelbtn" onclick="hideeditdiv('countryctn');">Cancel</button> <button type="button" class="succbtn" id="countrybtn">Update</button></div>
                            </div>
                            <div class=" displaynone" id="div_statusctn">
                                <div class="market-select">
                                    <span>
                                        <?php 
                                        $statusList = array('Online'=>'Online','Offline'=>'Offline');
                                        ?>
                                         {{
                                             
                                             Form::select('user_status', $statusList, $statusname, ['class' => 'form-control required','placeholder' => 'Select status', 'id'=>'statusnameid'])}}
                                    </span>
                                </div>
                                <div class="upbtn"><button type="button" class="cancelbtn" onclick="hideeditdiv('statusctn');">Cancel</button> <button type="button" class="succbtn" id="statusbtn">Update</button></div>
                            </div>
                        </div>
                        {{ Form::close()}}
                    </div>
                    {{ Form::open(array('method' => 'post', 'id' => 'updateother')) }}
                    <div class="profile-txtbx">
                        <div class="user-txt-bx">
                            <div id="descriptioncnt" class="showall">
                                <h3>About Yourself</h3>
                                <span class="curpointer editright" onclick="showeditdiv('descriptioncnt');"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <div class="text-section" >
                                    <p id="desctext">{!! nl2br($recordInfo->description) !!}</p>
                                </div>
                            </div>
                            <div class="editprofile displaynone" id="div_descriptioncnt">
                                <h3>About Yourself</h3>
                                <div class="text-section" >
                                    {{Form::textarea('description', $recordInfo->description, ['class'=>'form-control required', 'placeholder'=>'Tell us about yourself', 'autocomplete' => 'off', 'rows'=>4, 'id'=>'descriptionid'])}}
                                </div>
                                <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn" onclick="hideeditdiv('descriptioncnt');">Cancel</button> <button type="button" class="succbtn" id="descriptionbtn">Update</button></div>
                            </div>
                        </div>
                        <div class="user-txt-bx">
                            <h3>Languages</h3>
                            <span class="curpointer addright" onclick="showeditdiv('languagesctn', '1');" id="pl_languagesctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <div class="languages_div displaynone" id="div_languagesctn">
                                <div class="lan_field"> {{Form::text('language_name', null, ['class'=>'form-control required', 'placeholder'=>'Add language', 'autocomplete' => 'off', 'id'=>'language_nameid'])}}</div>
                                <div class="lan_field">
                                    <div class="market-select">
                                        <span>
                                            <?php global $languageLevels; ?>
                                            {{Form::select('language_level', $languageLevels, null, ['class' => 'form-control required','placeholder' => 'Language level', 'id'=>'language_levelid'])}}
                                        </span>
                                    </div>

                                </div>

                                <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn" onclick="hideeditdiv('languagesctn');">Cancel</button> <button type="button" class="succbtn" id="langbtn">Update</button></div>
                                {{Form::hidden('language_old', null, ['class'=>'form-control', 'id'=>'language_old'])}}
                            </div>
                            <div class="text-section">
                                <ul class="items-list" id="addlangdiv">
                                    @if($recordInfo->languages)
                                    @foreach(json_decode($recordInfo->languages) as $key => $lang)
                                    <li id="{!! $key !!}"><span class="title">{!! $lang->lang_name !!}</span><span class="sub-title">{!! $lang->lang_level !!}</span><span class="hint--top"><a href="javascript:void();" onclick="editLang('{!! $key !!}', '{!! $lang->lang_name !!}', '{!! $lang->lang_level !!}')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteLang('{!! $key !!}')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="user-txt-bx">
                            <h3>Linked Accounts</h3>
                            <div class="text-section">
                                <ul class="linked-acc">
                                    @if($recordInfo->facebook_id)
                                    <li>
                                        <i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span>
                                    </li>
                                    @else 
                                    <li>
                                        <a href="{!! HTTP_PATH !!}/users/redirecttoacebook" onclick="return loginsignup('redirecttofacebook');"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
                                    </li>
                                    @endif
                                    @if($recordInfo->google_id)
                                    <li>
                                        <i class="fa fa-google" aria-hidden="true"></i><span>Google</span>
                                    </li>
                                    @else 
                                    <li>
                                        <a href="{!! HTTP_PATH !!}/users/redirecttogoogle" onclick="return loginsignup('redirecttogoogle');"><i class="fa fa-google" aria-hidden="true"></i><span>Google</span></a>
                                    </li>
                                    @endif
                                </ul>
                                <script type="text/javascript">
                                    var newwindow;
                                    var intId;
                                    function loginsignup(type) {
                                        var screenX = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
                                                screenY = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
                                                outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
                                                outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
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

                                        newwindow = window.open('{!! HTTP_PATH !!}/users/' + type, 'Social Login', features);
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
                            <span class="curpointer addright" onclick="showeditdiv('skillsctn', '1');" id="pl_skillsctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <div class="skills_div displaynone" id="div_skillsctn">
                                <div class="lan_field"> 
                                    {{Form::select('skill_name', $skillsList, null, ['class' => 'form-control skill_nameid_chosen required', 'placeholder'=>'Select skill', 'id'=>'skill_nameid'])}} 
                                </div>
                                <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn" onclick="hideeditdiv('skillsctn');">Cancel</button> <button type="button" class="succbtn" id="addskilbtn">Add</button></div>
                            </div>
                            <div class="text-section">
                                <ul class="linked-skills" id="addskilldiv">
                                    @if($recordInfo->skills)
                                    @foreach(explode(',', $recordInfo->skills) as $skillid)
                                    <li id="s{!! $skillid !!}"> <span> {!! $skillsList[$skillid] !!}</span> <div class="animate-show"><a href="javascript:void();" onclick="deleteSkill('{!! $skillid !!}')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div></li>
                                    @endforeach
                                    @endif 
                                </ul>
                            </div>
                        </div>

                        <div class="user-txt-bx">
                            <h3>Education</h3>
                            <span class="curpointer addright" onclick="showeditdiv('educationctn', '1');"  id="pl_educationctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <div class="languages_div displaynone" id="div_educationctn">
                                <div class="lan_field">
                                    <div class="market-select">
                                        <span> {{Form::select('country_name', $countryLists, null, ['class' => 'form-control required','placeholder' => 'Country of college/university', 'id'=>'country_nameid'])}}</span>
                                    </div>
                                </div>
                                <div class="lan_field"> {{Form::text('university_name', null, ['class'=>'form-control required', 'placeholder'=>'College/university name', 'autocomplete' => 'off', 'id'=>'university_nameid'])}}</div>
                                <div class="educss">
                                    <div class="lan_field qul_selecy">
                                        <div class="market-select">
                                            <span>{{Form::select('qual_name', $qualificationsLists, null, ['class' => 'form-control required','placeholder' => 'Qualifications', 'id'=>'qual_nameid'])}}</span>
                                        </div>
                                    </div>
                                    <div class="lan_field"> {{Form::text('stream_name', null, ['class'=>'form-control required', 'placeholder'=>'In stream', 'autocomplete' => 'off', 'id'=>'stream_nameid'])}}</div>
                                </div>
                                <div class="lan_field">
                                    <div class="market-select">
                                        <span>
                                            <?php global $yeatArray; ?>
                                            {{Form::select('year', $yeatArray, null, ['class' => 'form-control required','placeholder' => 'Year of education', 'id'=>'yearid'])}}
                                        </span>
                                    </div>
                                </div>
                                <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn" onclick="hideeditdiv('educationctn');">Cancel</button> <button type="button" class="succbtn" id="edubtn">Add</button></div>
                                {{Form::hidden('edu_old', null, ['class'=>'form-control', 'id'=>'edu_old'])}}
                            </div>                            
                            <div class="text-section" id="addedudiv">
                                @if($recordInfo->educations)
                                @foreach(json_decode($recordInfo->educations) as $key => $edu)
                                <li id="{!! $key !!}"><div class="edutop"><span class="title">{!! $edu->qual_name !!}</span><span class="sub-title">{!! $edu->stream_name !!}</span> <span class="hint--top"><a href="javascript:void();" onclick="editEdu('{!! $key !!}', '{!! $edu->country_name !!}', '{!! $edu->university_name !!}', '{!! $edu->qual_name !!}', '{!! $edu->stream_name !!}', '{!! $edu->year !!}')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteEdu('{!! $key !!}')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> {!! $edu->university_name !!}, {!! $edu->country_name !!}, Pass in {!! $edu->year !!}</span></div></li>
                                @endforeach
                                @endif
                            </div>
                        </div>


                        <div class="user-txt-bx user-txt-bx-last">
                            <h3>Certification</h3>
                            <span class="curpointer addright" onclick="showeditdiv('certificationctn', '1');"  id="pl_certificationctn"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <div class="languages_div displaynone" id="div_certificationctn">
                                <div class="lan_field"> {{Form::text('certificate_name', null, ['class'=>'form-control required', 'placeholder'=>'Certificate or award', 'autocomplete' => 'off', 'id'=>'certificate_nameid'])}}</div>
                                <div class="lan_field"> {{Form::text('certificate_from', null, ['class'=>'form-control required', 'placeholder'=>'Certified from (e.g. Adobe)', 'autocomplete' => 'off', 'id'=>'certificate_fromid'])}}</div>
                                <div class="lan_field">
                                    <div class="market-select">
                                        <span>
                                            {{Form::select('year', $yeatArray, null, ['class' => 'form-control required','placeholder' => 'Year of certification', 'id'=>'yearcertid'])}}
                                        </span>
                                    </div>
                                </div>
                                <div class="upbtn"><button type="button" class="cancelbtn" id="cntsuccbtn" onclick="hideeditdiv('certificationctn');">Cancel</button> <button type="button" class="succbtn" id="certbtn">Add</button></div>
                                {{Form::hidden('cert_old', null, ['class'=>'form-control', 'id'=>'cert_old'])}}
                            </div>
                            <div class="text-section" id="addcertdiv">
                                @if($recordInfo->certifications)
                                @foreach(json_decode($recordInfo->certifications) as $key => $cert)
                                <li id="{!! $key !!}"><div class="edutop"><span class="title">{!! $cert->certificate_name !!}</span> <span class="hint--top"><a href="javascript:void();" onclick="editCert('{!! $key !!}', '{!! $cert->certificate_name !!}', '{!! $cert->certificate_from !!}', '{!! $cert->year !!}')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteCert('{!! $key !!}')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> {!! $cert->certificate_from !!}, Pass in {!! $cert->year !!}</span></div></li>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    {{ Form::close()}}
                </div>
                <div class="col-sm-7 col-md-8">
                    <div class="dashboard-rights-section">
                        <div class="row">
                            @if(!$mygigs->isEmpty())
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <div class="creat-new">
                                            <a href="{{ URL::to( 'gigs/create')}}">
                                                <i> {{HTML::image('public/img/front/plus.png', SITE_TITLE)}}</i>
                                                <span>Create a new gig</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @foreach($mygigs as $allrecord)
                                    <div class="col-sm-6 col-md-4">
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
                                                <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class="">{{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])}}</a>
                                            </div>
                                            <div class="caption">
                                                <h3><a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class="">{{mb_substr($allrecord->title,0,40)}}</a></h3>
                                                <div class="pro-bottm">
                                                    <div class="pro-bottm-left"><a id="maraction-{{$allrecord->id}}" class="maraction" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Gig Actions">{{HTML::image('public/img/front/ellipsis.png', SITE_TITLE)}}</a></div>
                                                    <div class="pro-bottm-right">
                                                        <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}"><small>Starting at</small>{{CURR.$allrecord->basic_price}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="offer-show-{{$allrecord->id}}" class="show-adwanv">
                                                <ul>
                                                    <li>
                                                        <a href="{{ URL::to( 'gigs/edit/'.$allrecord->slug)}}" class=""><i class="fa fa-pencil" aria-hidden="true"></i><span>Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class=""><i class="fa fa-eye" aria-hidden="true"></i><span>View Detail</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ URL::to( 'gigs/delete/'.$allrecord->slug)}}" class="" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></a>
                                                    </li>
                                                    <li class="advanced-setting">
                                                        <a href="javascript:void(0);" class="clsstng" id="close-{{$allrecord->id}}"><i class="fa fa-close" aria-hidden="true"></i><span>Close</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @else 
                                <div class="col-sm-6 col-md-12">
                                    <div class="thumbnail">
                                        <div class="creat-new creat-new-full">
                                            <a href="{{ URL::to( 'gigs/create')}}">
                                                <i> {{HTML::image('public/img/front/plus.png', SITE_TITLE)}}</i>
                                                <span>Create a new gig</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        @if(!$myorders->isEmpty())
                            <div class="dashborad-tt">
                            <div class="buyer-top-title"><h2>Latest Selling Orders</h2></div>
                            <div class="management-bx">
                                <div class="management-bx-over">
                                    <div class="management-table">
                                        <div class="management-table-tr">
                                            <div class="management-table-th dashdate">Date</div>
                                            <div class="management-table-th dashbuyer">Buyer Name</div>
                                            <div class="management-table-th dashtitle">Gig Title</div>
                                            <div class="management-table-th">Package</div>
                                            <div class="management-table-th">Amount</div>
                                            <div class="management-table-th">Action</div>
                                        </div>
                                        <?php global $gigOrderStatus; ?>
                                        @foreach($myorders as $allrecord)
                                        <div class="management-table-tr">
                                            <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                                            <div class="management-table-td">
                                                @if(isset($recordInfo->Buyer))
                            {!! $allrecord->Buyer->first_name.' '.$allrecord->Buyer->last_name !!}
                            @else
                            {{'N/A'}}
                            @endif
                            </div>
                                            <div class="management-table-td">{{$allrecord->Gig->title or ''}}</div>
                                            <div class="management-table-td">{{$allrecord->package}}</div>
                                            <div class="management-table-td">{{CURR.$allrecord->revenue}}</div>
                                            <div class="management-table-td">
                                                <a href="#info{!! $allrecord->id !!}" title="View Offer Details" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @foreach($myorders as $allrecord)
                                <div id="info{!! $allrecord->id !!}" style="display: none;" class="frnt_div">
                                    <div class="nzwh-wrapper">
                                        <fieldset class="nzwh">
                                            <legend class="head_pop">
                                                Order #
                                                @if($allrecord->pay_type === 'Wallet')
                                                    {{$allrecord->wallet_trn_id}}
                                                @else 
                                                    {{$allrecord->paypal_trn_id}}
                                                @endif
                                            </legend>
                                            <div class="drt">
                                                <div class="admin_pop"><span>Buyer Name: </span>  <label> @if(isset($recordInfo->Buyer))
                            {!! $allrecord->Buyer->first_name.' '.$allrecord->Buyer->last_name !!}
                            @else
                            {{'N/A'}}
                            @endif</label></div>
                                                <div class="admin_pop"><span>Gig Title: </span>  <label>{{$allrecord->Gig->title or ''}}</label></div>
                                                <div class="admin_pop"><span>Order Date: </span>  <label>{{$allrecord->created_at->format('d M, Y')}}</label></div>
                                                <div class="admin_pop"><span>Order ID: </span>  <label>
                                                    @if($allrecord->pay_type === 'Wallet')
                                                        {{$allrecord->wallet_trn_id}}
                                                    @else 
                                                        {{$allrecord->paypal_trn_id}}
                                                    @endif
                                                    </label>
                                                </div>
                                                <div class="admin_pop"><span>Package: </span>  <label>{{$allrecord->package}}</label></div>
                                                <div class="admin_pop"><span>Amount: </span>  <label>{{$allrecord->revenue}}</label></div>
                                                <div class="admin_pop"><span>Status: </span>  <label>{{$gigOrderStatus[$allrecord->status]}}</label></div>
                                        </fieldset>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                        
                        @if(!$latestservices->isEmpty())
                        <div class="dashborad-tt">
                            <div class="buyer-top-title"><h2>Latest Buyer Requests</h2></div>
                            <div class="management-bx">
                                <div class="management-table management-table-left">
                                    <div class="management-table-tr">
                                        <div class="management-table-th">Date</div>
                                        <div class="management-table-th">Buyer</div>
                                        <div class="management-table-th">Request</div>
                                        <div class="management-table-th">Budget</div>
                                    </div>
                                    @foreach($latestservices as $allrecord)
                                    @if(isset($allrecord->User->slug))
                                        <div class="management-table-tr">
                                            <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                                            <div class="management-table-td">
                                                <div class="buyer-img">
                                                    @if(isset($allrecord->User->profile_image))
                                                    <a href="{{ URL::to('public-profile/'.$allrecord->User->slug)}}" class="">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->User->profile_image, SITE_TITLE,['style'=>"max-width: 60px"])}}</a>
                                                    @else
                                                    <a href="{{ URL::to('public-profile/'.$allrecord->User->slug)}}" class="">{{HTML::image('public/img/front/user-img.png', SITE_TITLE,['style'=>"max-width: 60px"])}}</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="management-table-td management-table-td-fixed dashlink">
                                                <a href="{{ URL::to( 'buyer-requests/'.$allrecord->slug)}}" class="">{{$allrecord->title}}</a>
                                                <p>{{ str_limit($allrecord->description, $limit = 150, $end = '...') }}</p>
                                            </div>
                                            <div class="management-table-td">{{CURR.number_format($allrecord->price, 2)}}</div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
                    $(this).toggleClass('open');
                }
        );
    });</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function showeditdiv(did, add = 0){  
        $('.curpointer').show();
        $('#pl_'+did).hide();
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
        $('#pl_'+did).show();
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
            url: "{!! HTTP_PATH !!}/users/updatedata",
            type: "POST",
            data: {"deletekey": key, _token: '{{csrf_token()}}'},
        });
    }
    function deleteSkill(key) {
        $('#s' + key).remove();
        $.ajax({
            url: "{!! HTTP_PATH !!}/users/updatedata",
            type: "POST",
            data: {"deleteskill": key, _token: '{{csrf_token()}}'},
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
            url: "{!! HTTP_PATH !!}/users/updatedata",
            type: "POST",
            data: {"deleteedu": key, _token: '{{csrf_token()}}'},
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
            url: "{!! HTTP_PATH !!}/users/updatedata",
            type: "POST",
            data: {"deletecert": key, _token: '{{csrf_token()}}'},
        });
    }

    $(document).ready(function () {
        $("#uplaodprofileimg").on('change', function (event) {
            var postData = new FormData(this);
            event.preventDefault();
            $.ajax({
                url: "{!! HTTP_PATH !!}/users/uploadprofileimage",
                type: "POST",
                data: postData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('#ploader').show();
                },
                success: function (imagename) {
                    $('#pimage').attr("src", "{!! PROFILE_SMALL_DISPLAY_PATH !!}" + imagename);
                    $('#ploader').hide();
                }
            });
        });

        $("#succbtnbtn").click(function () {
            if ($("#updatecontact").valid()) {
                $('#showcontact').html($("#contactid").val());
                $('#contactn').show();
                $('#div_contactn').hide();
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    data: $('#updatecontact').serialize(),
                });
            }
        });

        $("#countrybtn").click(function () {
            if ($("#updatecontact").valid()) {
                var countryname = $('#city_id').val() + ', ' + $("#countrynameid option:selected").text() + ', ' + $('#zipcode_id').val();
                $('#countryctn').show();
                $('#div_countryctn').hide();
                $('#cname').html(countryname);
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"countrynameid": $('#countrynameid').val(), "city_id": $('#city_id').val(), "zipcode_id": $('#zipcode_id').val(), _token: '{{csrf_token()}}'},
                });
            }
        });
        $("#statusbtn").click(function () {
            if ($("#updatecontact").valid()) {
                var statusname = $("#statusnameid option:selected").text();
                $('#statusctn').show();
                $('#div_statusctn').hide();
                $('#statusname').html(statusname);
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"statusnameid": $('#statusnameid').val(), _token: '{{csrf_token()}}'},
                });
            }
        });

        $("#descriptionbtn").click(function () {
            if ($("#updateother").valid()) {
                $('#desctext').html($("#descriptionid").val().replace(/\n/g, "<br>"));
                $('#descriptioncnt').show();
                $('#div_descriptioncnt').hide();
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"description": $('#descriptionid').val(), _token: '{{csrf_token()}}'},
                });
            }
        });

        $("#langbtn").click(function () {
            if ($("#updateother").valid()) {
                $('#div_languagesctn').hide();
                if ($('#language_old').val()) {
                    var sl = $('#language_old').val();
                    $('#' + $('#language_old').val()).html('<span class="title">' + $('#language_nameid').val() + '</span><span class="sub-title">' + $('#language_levelid').val() + '</span><span class="hint--top"><a href="javascript:void();" onclick="editLang(\'' + sl + '\',\'' + $('#language_nameid').val() + '\',\'' + $('#language_levelid').val() + '\')"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteLang(\'' + sl + '\')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span>');
                } else {
                    var sl = $('#language_nameid').val().replace(" ", "_").toLowerCase();
                    $('#addlangdiv').append('<li id="' + sl + '"><span class="title">' + $('#language_nameid').val() + '</span><span class="sub-title">' + $('#language_levelid').val() + '</span><span class="hint--top"><a href="javascript:void();" onclick="editLang(\'' + sl + '\',\'' + $('#language_nameid').val() + '\',\'' + $('#language_levelid').val() + '\')"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteLang(\'' + sl + '\')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </span></li>');
                }
                $('#pl_languagesctn').show();
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"lang_name": $('#language_nameid').val(), "lang_level": $('#language_levelid').val(), "lang_old": $('#language_old').val(), _token: '{{csrf_token()}}'},
                });
            }
        });

        $("#addskilbtn").click(function () {
            if ($("#updateother").valid()) {
                $('#div_skillsctn').hide();
                var skillId = $('#skill_nameid').val();
                var skilltext = $("#skill_nameid option:selected").text();
                $('#addskilldiv').append('<li id="s' + skillId + '"> <span> ' + skilltext + '</span> <div class="animate-show"><a href="javascript:void();" onclick="deleteSkill(' + skillId + ')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </div></li>');
                $('#pl_skillsctn').show();
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"skill_ids": $('#skill_nameid').val(), _token: '{{csrf_token()}}'},
                });
            }
        });
        $("#edubtn").click(function () {
            if ($("#updateother").valid()) {
                $('#div_educationctn').hide();
                var countryName = $("#country_nameid").val();
                var qualName = $("#qual_nameid").val();

                if ($('#edu_old').val()) {
                    var sl = $('#edu_old').val();
                    $('#' + $('#edu_old').val()).html('<div class="edutop"><span class="title">' + qualName + '</span><span class="sub-title">' + $('#stream_nameid').val() + '</span> <span class="hint--top"><a href="javascript:void();" onclick="editEdu(\'' + sl + '\',\'' + countryName + '\',\'' + $('#university_nameid').val() + '\',\'' + qualName + '\',\'' + $('#stream_nameid').val() + '\',\'' + $('#yearid').val() + '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteEdu(\'' + sl + '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' + $('#university_nameid').val() + ', ' + countryName + ', Pass in ' + $('#yearid').val() + '</span></div>');
                } else {
                    var sl = $('#stream_nameid').val().replace(" ", "_").toLowerCase();
                    $('#addedudiv').append('<li id="' + sl + '"><div class="edutop"><span class="title">' + qualName + '</span><span class="sub-title">' + $('#stream_nameid').val() + '</span> <span class="hint--top"><a href="javascript:void();" onclick="editEdu(\'' + sl + '\',\'' + countryName + '\',\'' + $('#university_nameid').val() + '\',\'' + qualName + '\',\'' + $('#stream_nameid').val() + '\',\'' + $('#yearid').val() + '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteEdu(\'' + sl + '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' + $('#university_nameid').val() + ', ' + countryName + ', Pass in ' + $('#yearid').val() + '</span></div></li>');
                }
                $('#pl_educationctn').show();
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"country_name": countryName, "university_name": $('#university_nameid').val(), "qual_name": qualName, "stream_name": $('#stream_nameid').val(), "year": $('#yearid').val(), "edu_old": $('#edu_old').val(), _token: '{{csrf_token()}}'},
                });
            }
        });
        $("#certbtn").click(function () {
            if ($("#updateother").valid()) {
                $('#div_certificationctn').hide();
                if ($('#cert_old').val()) {
                    var sl = $('#cert_old').val();
                    $('#' + $('#cert_old').val()).html('<div class="edutop"><span class="title">' + $('#certificate_nameid').val() + '</span> <span class="hint--top"><a href="javascript:void();" onclick="editCert(\'' + sl + '\',\'' + $('#certificate_nameid').val() + '\',\'' + $('#certificate_fromid').val() + '\',\'' + $('#yearcertid').val() + '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteCert(\'' + sl + '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' + $('#certificate_fromid').val() + ', Pass in ' + $('#yearcertid').val() + '</span></div>');
                } else {
                    var sl = $('#certificate_nameid').val().replace(" ", "_").toLowerCase();
                    $('#addcertdiv').append('<li id="' + sl + '"><div class="edutop"><span class="title">' + $('#certificate_nameid').val() + '</span> <span class="hint--top"><a href="javascript:void();" onclick="editCert(\'' + sl + '\',\'' + $('#certificate_nameid').val() + '\',\'' + $('#certificate_fromid').val() + '\',\'' + $('#yearcertid').val() + '\')" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span> <span class="hint--top"><a href="javascript:void();" onclick="deleteCert(\'' + sl + '\')" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></div><div class="edu_btm"><span class="title"> ' + $('#certificate_fromid').val() + ', Pass in ' + $('#yearcertid').val() + '</span></div></li>');
                }
                $('#pl_certificationctn').show();
                $.ajax({
                    url: "{!! HTTP_PATH !!}/users/updatedata",
                    type: "POST",
                    dataType: 'json',
                    data: {"certificate_name": $('#certificate_nameid').val(), "certificate_from": $('#certificate_fromid').val(), "year": $('#yearcertid').val(), "cert_old": $('#cert_old').val(), _token: '{{csrf_token()}}'},
                });
            }
        });

        $("#maraction").click(function () {
            $("#offer-show").addClass("offer-div");
            $(".dashboard-rights-section").removeClass("offer-div");
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".maraction").click(function () {
            thisid = this.id;
            var id = thisid.split('-');
            $("#offer-show-"+id[1]).addClass("offer-div");
//            $(".dashboard-rights-section").removeClass("offer-div");
        });
        $(".clsstng").click(function () {
            thisid = this.id;
            var id = thisid.split('-');
            $("#offer-show-"+id[1]).removeClass("offer-div");
        });
    });
</script>
@endsection