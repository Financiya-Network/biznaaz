@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Accept Offers<a href="#" class="btn btn-primary">Back</a></div>
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
            </div>
            <div class="management-bx">
                <div class="offer_dtl">
                    <div class="req_dtl_head">Offer Information</div>
                    <div class="req_row">
                        <label>Offer Amount: </label> <span>{{CURR.$servicesofferInfo->amount}}</span>
                    </div>
                    <div class="req_row">
                        <label>Deliver in: </label> <span>{{$servicesofferInfo->deliver_in}}</span>
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
                
                <div class="offer_dtl">
                    <div class="req_dtl_head">About The Seller</div>
                    <div class="dpimg-about">
                        @if($servicesofferInfo->User->profile_image)
                            {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$servicesofferInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])}}
                        @else
                            {{HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection