@extends('layouts.inner')
@section('content')
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";    
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="top_row col-xs-12 col-md-8">
                    <h3 class="left_title">{{$recordInfo->title}}</h3>
                    @if($recordInfo->attachment != '' && file_exists(SERVICE_FULL_UPLOAD_PATH.$recordInfo->attachment))
                        @php 
                            $fnameArray =  explode('.', $recordInfo->attachment);
                            $imgext = array_pop($fnameArray);
                            $extArray = array('jpg', 'jpeg', 'png');
                        @endphp   
                        @if(in_array($imgext, $extArray))
                            <div class="showeditimage">{{HTML::image(SERVICE_FULL_DISPLAY_PATH.$recordInfo->attachment, SITE_TITLE,['class'=>"maxreing"])}}</div>
                        @endif
                    @endif
                    <div class="req-dtl">
                        <span class="post-category">{{$recordInfo->Category->name}} >> {{$recordInfo->Subcategory->name}}</span>
                        <span class="post-date">Posted on: {{$recordInfo->created_at->diffForHumans()}}</span>
                        <?php  global $serviceDays; global $revisions;  ?>
                        <div class="post-dtl">
                            <span>Need to delivered in: {{$serviceDays[$recordInfo->day]}}</span>
                            <span>Offers: {{count($recordInfo->Servicesoffer)}}</span>
                            <span>Budget: @if($recordInfo->price) {{CURR.$recordInfo->price}} @else N/A @endif</span>
                        </div>
                        @if($recordInfo->attachment != '' && file_exists(SERVICE_FULL_UPLOAD_PATH.$recordInfo->attachment))
                            @if(!in_array($imgext, $extArray))
                                <div class="post-dtl"><div class="showeditimage"> <a download href="{{SERVICE_FULL_DISPLAY_PATH.$recordInfo->attachment}}"> {{substr($recordInfo->attachment, 9)}}</a></div></div>
                            @endif
                        @endif    
                    </div>
                    <div class="about_seller">
                        <h5>Description</h5>
                        <div class="profile-about">
                            {{$recordInfo->description}}
                        </div>
                    </div>
                    
                    <div class="about_seller">
                        <h5>About the Buyer</h5>
                        @if(isset($recordInfo->User))
                        <div class="profile-about">
                            <div class="dpimg-about">
                                @if($recordInfo->User->profile_image)
                                <a href="{{ URL::to( 'public-profile/'.$recordInfo->User->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$recordInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                @else
                                <a href="{{ URL::to( 'public-profile/'.$recordInfo->User->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                @endif
                            </div>
                            <div class="dp_details-about">
                                <h3><a href="{{ URL::to( 'public-profile/'.$recordInfo->User->slug)}}">{{$recordInfo->User->first_name?$recordInfo->User->first_name.' '.$recordInfo->User->last_name:''}} </a></h3>
                                <p>{{$recordInfo->User->address}}</p>
                                <div class="about-rating">
                                    <script>
                                        $(function() {
                                            $('#avgRating22').raty({
                                                starOn:    'star-on.png',
                                                starOff:   'star-off.png',
                                                start: {{$recordInfo->User->average_rating}},
                                                readOnly: true
                                            });
                                        });
                                    </script>
                                    <span class="pprate gigdtlrat" id="avgRating22"></span>
                                    <span class="req_rate"><b>{{$recordInfo->User->average_rating}}</b> ({{$recordInfo->User->total_review}} reviews)</span>
                                </div>
<!--                                <a href="#" class="btn btn-default">Contact Me</a>-->
                            </div>
                            
                            <div class="client-reviews">
                                <div class="client-reviews-left">
                                    <h3>About me</h3>
                                    <p class="text-viewer">{{$recordInfo->User->description}}</p>
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
                                            <span>{{$recordInfo->User->created_at->format('M Y')}}</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-language" aria-hidden="true"></i>Languages</label>
                                            <span>
                                                @if($recordInfo->User->languages)
                                                    @foreach(json_decode($recordInfo->User->languages) as $key => $lang)                                                      
                                                        @if(!$loop->first), @endif{!!$lang->lang_name!!}
                                                    @endforeach
                                                @endif                                                
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
                        @endif
                    </div>
                </div>
                <div class=" col-xs-12 col-md-4 sticky">
                    <div class="offer_wrap ">
                        <div class="offer_tite">Send Your Offer</div>  
                        <div class="send-form">
                            <div class="" id="offerm"></div>  
                            @if($recordInfo->status == 1)
                                {{Form::model($oldoffer, ['method' => 'post', 'id' => 'sendoffer']) }}
                                <div class="form-group offer_field">
                                    <label>Amount ({{CURR}})</label>  
                                    <div class="send_input">
                                    {{Form::text('amount', null, ['class'=>'form-control required digits', 'placeholder'=>'offer amount', 'autocomplete' => 'off'])}}
                                    </div>
                                    </div>
                                <div class="form-group offer_field">
                                    <label>Deliver in (days)</label>   
                                    <div class="send_input">
                                    {{Form::text('deliver_in', null, ['class'=>'form-control required', 'placeholder'=>'days', 'autocomplete' => 'off'])}}
                                    </div>
                                    </div>
                                <div class="form-group offer_field">
                                    <label>Number of revisions</label>   
                                    <div class="send_input">
                                        <div class="market-select">
                                            <span>
                                    {{Form::select('revisions', $revisions,old('revisions'), ['class' => 'form-control required','placeholder' => 'select'])}}
                                            </span>
                                    </div>
                                    </div>
                                    </div>
                                <div class="form-group offer_field">
                                    <label>Offer message</label>   
                                    {{Form::textarea('message', null, ['class'=>'form-control offer_box required', 'placeholder'=>"I'm provide...", 'autocomplete' => 'off', 'rows'=>5])}}
                                </div>
                                <div class="send_mesage">
                                    <button id="ddpfferbuton" type="button" class="btn btn-primary postbtn" onclick="postoffer()">Send Offer</button>
                                    <div class="btnofferloader" id="btnofferloader">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
                                </div>
                                {{Form::hidden('service_slug', $recordInfo->slug, ['class'=>'form-control required', 'placeholder'=>'days', 'autocomplete' => 'off'])}}
                                {{ Form::close()}}
                            @else 
                                <div class="al_assigned">This request already assigned to some one.</div> 
                            @endif
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
                url: "{!! HTTP_PATH !!}/send-request-offer",
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
@endsection