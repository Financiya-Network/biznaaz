@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Request Work Place<a href="#" class="btn btn-primary">Back</a></div>
            <div class="req_dtl">
                <div class="req_dtl_head">Request Information</div>
                <div class="req_row">
                    <label>Title: </label> <span>{{$serviceInfo->title}}</span>
                    <div class="req_post"><label>Posted: </label> {{$serviceInfo->created_at->diffForHumans()}}</div>
                </div>
                <div class="req_row">
                    <label>Category: </label> <span>{{$serviceInfo->Category->name}} >> {{$serviceInfo->Subcategory->name}}</span>
                    <div class="req_post"><label>Budget: </label> @if($serviceInfo->price) {{CURR.$serviceInfo->price}} @else N/A @endif</div>
                </div>
                <div class="req_row _des">
                    {{$serviceInfo->description}}
                </div>
                <div class="dddds"><a href="{{ URL::to( 'services/markcompleted/'.$servicesofferInfo->slug)}}" title="Mark as Completed" class="btn btn-primary btn-xs">Mark as Completed</a></div>
            </div>
            <div class="offer_dtl">
                <div class="req_dtl_head">Offer Information</div>
                <div class="req_row">
                    <label>Offer Amount: </label> <span>{{CURR.$servicesofferInfo->amount}}</span>
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
            </div>
            
            <div class="management-bx">
                <div class="message_chat">
                    
                </div>
                
                <div class="offer_dtl">
                    <div class="req_dtl_head">About The Seller</div>
                    <div class="dpimg-about_right">
                        <div class="buy_row">
                            <div class="buy_img">
                                @if($servicesofferInfo->User->profile_image)
                                    {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$servicesofferInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}
                                @else
                                    {{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}
                                @endif
                            </div>
                            <div class="buy_name">
                                <span>{{$servicesofferInfo->User->first_name.' '.$servicesofferInfo->User->last_name}}</span>
                                <div class="about-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span><b>5.0</b> (27 reviews)</span>
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
                </div>
            </div>
        </div>
    </section>
</div>
@endsection