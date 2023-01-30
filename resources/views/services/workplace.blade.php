@extends('layouts.inner')
@section('content')
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}
<script type="text/javascript">
    $(document).ready(function () {
        $("#requestform").validate();
    });    
 </script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
        <div class="workplace">
            <div class="manage-btn">Request Work Place
                @if($serviceInfo->User->id == Session::get('user_id'))
                    <a href="{{ URL::to( 'services/management') }}" class="btn btn-primary">Back</a>  
                    @if($serviceInfo->is_completed == 0)
                        <div class="dddds dddds-right"><a href="{{ URL::to( 'services/markcompleted/'.$servicesofferInfo->slug)}}" title="Mark as Completed" class="btn btn-primary btn-xs" onclick="return confirm('Are you sure you want to complete this request?')">Mark as Completed</a></div>
                    @endif
                @else 
                    <a href="{{ URL::to( 'services/offers-sent') }}" class="btn btn-primary">Back</a>
                @endif
            </div>
            <div class="req_dtl">
                <div class="req_dtl_head">Request Information</div>
                <div class="req_row">
                    <label>Title: </label> <span>{{$serviceInfo->title}}</span>
                    <div class="req_post"><label>Posted: </label> {{$serviceInfo->created_at->diffForHumans()}}</div>
                </div>
                <div class="req_row">
                    <label>Category: </label> <span>{{$serviceInfo->Category->name}} >> {{$serviceInfo->Subcategory->name}}</span>
                    <div class="req_post"><label>Budget: </label> @if($serviceInfo->price) {{CURR.number_format($serviceInfo->price, 2)}} @else N/A @endif</div>
                </div>
                <div class="req_row _des">
                    {{$serviceInfo->description}}
                </div>
            </div>
            <div class="offer_dtl">
                <div class="req_dtl_head">Offer Information</div>
                <div class="req_row">
                    <label>Offer Amount: </label> <span>{{CURR.number_format($servicesofferInfo->amount, 2)}}</span>
                </div>
                <div class="req_row">
                    <label>Deliver in: </label> <span>{{$servicesofferInfo->deliver_in}} Days</span>
                </div>
                <div class="req_row">
                    <label>No. of Revisions: </label> <span>{{$servicesofferInfo->revisions}}</span>
                </div>
                <div class="req_row">
                    <label>Date: </label> <span>{{$servicesofferInfo->created_at->format('d M, Y h:iA')}}</span>
                </div>
                <div class="req_row _des">
                    <label>Message: </label> {{$servicesofferInfo->message}}
                </div>
                <div id="sentmessages" class="req_row"></div>
            </div>
            <div class="management-bx">
                <div class="message_chat">
                        <div class="req_dtl_head">Messages</div>
                        <div class="comment-form-bx sendmesg">
                            <div class="comment-form">
                                <div class="ee er_msg postfrm">@include('elements.errorSuccessMessage')</div>
                                {{ Form::open(array('method' => 'post', 'id' => 'requestform', 'enctype' => "multipart/form-data")) }}
                                    <div class="input textarea">
                                        {{Form::textarea('message', null, ['class'=>'form-control textarea_box required', 'placeholder'=>"Write your message here", 'autocomplete' => 'off', 'rows'=>5, 'id'=>'description'])}}
                                    </div>   
                                    <div class="send_msgg">
                                        <div class="send_file">
                                            {{Form::file('attachment', ['class'=>'form-control', 'accept'=>IMAGE_EXT.' ,application/pdf, application/msword, text/plain'])}}
                                            <span class="help-text"> Supported File Types: jpg, jpeg, png, doc, docx, pdf  (Max. {{ MAX_IMAGE_UPLOAD_SIZE_DISPLAY }}).</span>
                                        </div>
                                        <div class="send_file"><input class="btn btn-success" value="Send" type="submit"></div>
                                    </div>
                                {{ Form::close()}}
                            </div>
                        </div>
                        <div class="all_msgg">
                            @if(!$servicemessages->isEmpty())
                                @foreach($servicemessages as $allrecord)
                                        <div class="messages-bx @if($allrecord->receiver_id == Session::get('user_id')) messages-bx-right @endif">
                                            <div class="user-profile-message">
                                                @if($allrecord->Sender->profile_image)
                                                <a href="{{ URL::to( 'public-profile/'.$allrecord->Sender->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->Sender->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                                @else
                                                <a href="{{ URL::to( 'public-profile/'.$allrecord->Sender->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                                @endif
                                            </div>
                                            <div class="meassages-txt">
                                                <h2><a href="{{ URL::to( 'public-profile/'.$allrecord->Sender->slug)}}">{{$allrecord->Sender->first_name.' '.$allrecord->Sender->last_name}}</a></h2>
                                                <div class="message-date"><i class="fa fa-calendar" aria-hidden="true"></i><span>{{$allrecord->created_at->diffForHumans()}}</span></div>
                                                <p>
                                                    {!! nl2br($allrecord->message) !!}
                                                </p>
                                                @if($allrecord->attachment && file_exists(GIG_MSG_FULL_UPLOAD_PATH.$allrecord->attachment))
                                                <a download class="ggimsgat" href="{{GIG_MSG_FULL_DISPLAY_PATH.$allrecord->attachment}}">{{substr($allrecord->attachment, 9)}}</a>
                                                @endif
                                            </div>
                                        </div>
                                @endforeach
                            @endif                            
                        </div>
                    </div>
                <div class="workplace-seller sticky">
                <div class="offer_dtl">
                    @if($servicesofferInfo->User->id == Session::get('user_id'))
                        <div class="req_dtl_head">About the Seller</div>
                        <div class="dpimg-about_right">
                        <div class="buy_row">
                            <div class="buy_img">
                                @if($serviceInfo->User->profile_image)
                                <a href="{{ URL::to( 'public-profile/'.$serviceInfo->User->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$serviceInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                @else
                                <a href="{{ URL::to( 'public-profile/'.$serviceInfo->User->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                @endif
                            </div>
                            <div class="buy_name">
                                <span><a href="{{ URL::to( 'public-profile/'.$serviceInfo->User->slug)}}">{{$serviceInfo->User->first_name.' '.$serviceInfo->User->last_name}}</a></span>
                                <div class="about-rating">
                                    <script>
                                        $(function() {
                                            $('#avgRating22').raty({
                                                starOn:    'star-on.png',
                                                starOff:   'star-off.png',
                                                start: {{$serviceInfo->User->average_rating}},
                                                readOnly: true
                                            });
                                        });
                                    </script>
                                    <span class="pprate" id="avgRating22"></span>
                                    <span class="rating-view"><b>{{$serviceInfo->User->average_rating}}</b> ({{$serviceInfo->User->total_review}} reviews)</span>
                                </div>
                             </div>
                        </div>
                        <div class="buy_row">
                            <ul class="general-info">
                                        <li>
                                            <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                            <span>@isset($serviceInfo->User->Country->name) {{$serviceInfo->User->Country->name}} @endisset</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                            <span>{{$serviceInfo->User->created_at->format('M Y')}}</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Languages</label>
                                            <span>@if($serviceInfo->User->languages)
                                                    @foreach(json_decode($serviceInfo->User->languages) as $key => $lang)                                                      
                                                        @if(!$loop->first), @endif{!!$lang->lang_name!!}
                                                    @endforeach
                                                  @else 
                                                    N/A
                                                  @endif                                                 
                                            </span>
                                        </li>
                                        
                            </ul>
                        </div>
                    </div>
                    @else 
                        <div class="req_dtl_head">About the Bidder</div>
                        <div class="dpimg-about_right">
                        <div class="buy_row">
                            <div class="buy_img">
                                @if($servicesofferInfo->User->profile_image)
                                <a href="{{ URL::to( 'public-profile/'.$servicesofferInfo->User->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$servicesofferInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                @else
                                <a href="{{ URL::to( 'public-profile/'.$servicesofferInfo->User->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                @endif
                            </div>
                            <div class="buy_name">
                                <span><a href="{{ URL::to( 'public-profile/'.$servicesofferInfo->User->slug)}}">{{$servicesofferInfo->User->first_name.' '.$servicesofferInfo->User->last_name}}</a></span>
                                <div class="about-rating">
                                    <script>
                                        $(function() {
                                            $('#avgRating22').raty({
                                                starOn:    'star-on.png',
                                                starOff:   'star-off.png',
                                                start: {{$servicesofferInfo->User->average_rating}},
                                                readOnly: true
                                            });
                                        });
                                    </script>
                                    <span class="pprate" id="avgRating22"></span>
                                    <span class="rating-view"><b>{{$servicesofferInfo->User->average_rating}}</b> ({{$servicesofferInfo->User->total_review}} reviews)</span>
                                </div>
                             </div>
                        </div>
                        <div class="buy_row">
                            <ul class="general-info">
                                        <li>
                                            <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                            <span>@isset($servicesofferInfo->User->Country->name) {{$servicesofferInfo->User->Country->name}} @endisset</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                            <span>{{$servicesofferInfo->User->created_at->format('M Y')}}</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Languages</label>
                                            <span>@if($servicesofferInfo->User->languages)
                                                    @foreach(json_decode($servicesofferInfo->User->languages) as $key => $lang)                                                      
                                                        @if(!$loop->first), @endif{!!$lang->lang_name!!}
                                                    @endforeach
                                                  @else 
                                                    N/A
                                                  @endif                                                 
                                            </span>
                                        </li>
                                        
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                @if($serviceInfo->User->id == Session::get('user_id') && $serviceInfo->is_completed == 0)  
                    <div class="dddds"><a href="{{ URL::to( 'services/markcompleted/'.$servicesofferInfo->slug)}}" title="Mark as Completed" class="btn btn-primary btn-xs" onclick="return confirm('Are you sure you want to complete this request?')">Mark as Completed</a></div>
                @endif
                </div>
                </div>
        </div>
        </div>
    </section>
</div>
@endsection