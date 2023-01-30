@extends('layouts.inner')
@section('content')
<script type="text/javascript">
    var img_path = "{!! HTTP_PATH !!}/public/img";
</script>
{{ HTML::script('public/js/jquery.raty.min.js')}}
<script type="text/javascript">
    $(document).ready(function () {
        $("#ratesellerform").validate();
    });
</script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
        <div class="workplace">
            <div class="manage-btn">Rate Seller
                <a href="{{ URL::to( 'buying-orders') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="req_dtl">
                <div class="req_dtl_head">Gig Information</div>
                <div class="req_row">
                    <label>Title: </label> <span>
                        @if(isset($myorderInfo->Gig))
                            {{$myorderInfo->Gig->title}}
                        @elseif(isset($myorderInfo->Service))
                            {{$myorderInfo->Service->title}}
                        @endif</span>
                    <div class="req_post"><label>Posted: </label> 
                    @if(isset($myorderInfo->Gig))
                        {{$myorderInfo->Gig->created_at->format('M d, Y')}}
                    @elseif(isset($myorderInfo->Service))
                        {{$myorderInfo->Service->created_at->format('M d, Y')}}
                    @endif
                    </div>
                </div>
                <div class="req_row _des">
                    @if(isset($myorderInfo->Gig))
                        {!! $myorderInfo->Gig->description !!}
                    @elseif(isset($myorderInfo->Service))
                        {{$myorderInfo->Service->description}}
                        {!! $myorderInfo->Service->description !!}
                    @endif
                </div>
            </div>
            
            <div class="management-bx">
                <div class="message_chat">
                    
                    @if($myorderInfo->status == 2 && $myorderInfo->is_buyer_rate != 1)
                       <div class="req_dtl_head">Give Review/Rating</div> 
                       <div class="comment-form reviewrate">
                        <div class="ee er_msg postfrm">@include('elements.errorSuccessMessage')</div>   
                        {{ Form::open(array('method' => 'post', 'id' => 'ratesellerform')) }}
                          <div class="input textarea">
                              {{Form::textarea('comment', null, ['class'=>'form-control required', 'placeholder'=>"Write your comment", 'autocomplete' => 'off', 'rows'=>5, 'id'=>'description'])}}
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
                                {{Form::hidden('rating', null, ['class'=>'form-control required', 'id'=>'selectrating'])}}
                                <span id="avgRating0"></span>
                            </div>
                            <div class="giverate_btn"><input class="btn btn-success" value="Submit" type="submit"></div>
                        </div>
                        {{ Form::close()}}
                    </div>
                    @elseif($myorderInfo->status == 2 && $myorderInfo->is_buyer_rate == 1)   
                       <div class="req_dtl_head">You already rate this order</div> 
                       <div class="comment-form reviewrate">
                           <div class="al_comment">{{$oldRatingInfo->comment}}</div>
                           <div class="al_rate">
                               <script>
                                    $(function() {
                                        $('#avgRating224').raty({
                                            starOn:    'star-on.png',
                                            starOff:   'star-off.png',
                                            start: {{$oldRatingInfo->rating}},
                                            readOnly: true
                                        });
                                    });
                                </script>
                                <span id="avgRating224"></span>
                           </div>
                       </div>
                    @endif
                  
                </div>
                <div class="workplace-seller">
                <div class="offer_dtl">
                    @if($myorderInfo->buyer_id == Session::get('user_id'))
                        <div class="req_dtl_head">About the Seller</div>
                        <div class="dpimg-about_right">
                        <div class="buy_row">
                                <div class="buy_img">
                                    @if($myorderInfo->Seller->profile_image)
                                    <a href="{{ URL::to( 'public-profile/'.$myorderInfo->Seller->slug)}}">{{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$myorderInfo->Seller->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @else
                                    <a href="{{ URL::to( 'public-profile/'.$myorderInfo->Seller->slug)}}">{{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}</a>
                                    @endif
                                </div>
                                <div class="buy_name">
                                    <span><a href="{{ URL::to( 'public-profile/'.$myorderInfo->Seller->slug)}}">{{$myorderInfo->Seller->first_name.' '.$myorderInfo->Seller->last_name}}</a></span>
                                    <div class="about-rating">
                                        <script>
                                            $(function() {
                                                $('#avgRating223').raty({
                                                    starOn:    'star-on.png',
                                                    starOff:   'star-off.png',
                                                    start: {{$myorderInfo->Seller->average_rating}},
                                                    readOnly: true
                                                });
                                            });
                                        </script>
                                        <span class="pprate" id="avgRating223"></span>
                                        <span class="rating-view"><b>{{$myorderInfo->Seller->average_rating}}</b> ({{$myorderInfo->Seller->total_review}} reviews)</span>
                                    </div>
                                 </div>
                            </div>
                        <div class="buy_row">
                            <ul class="general-info">
                                        <li>
                                            <label><i class="fa fa-map-marker" aria-hidden="true"></i>From</label>
                                            <span>@isset($myorderInfo->Seller->Country->name) {{$myorderInfo->Seller->Country->name}} @endisset</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Member since</label>
                                            <span>{{$myorderInfo->Seller->created_at->format('M Y')}}</span>
                                        </li>
                                        <li>
                                            <label><i class="fa fa-user" aria-hidden="true"></i>Languages</label>
                                            <span>@if($myorderInfo->Seller->languages)
                                                    @foreach(json_decode($myorderInfo->Seller->languages) as $key => $lang)                                                      
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
                </div>
                </div>
        </div>
        </div>
    </section>
</div>
@endsection