@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
             <div class="workplace">
            <div class="manage-btn">View Offers<a href="{{HTTP_PATH.'/services/management'}}" class="btn btn-primary">Back</a></div>
            <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
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
                <div class="tab-content lessmargin">
                    <div role="tabpanel" class="tab-pane active" id="buyeractive">
                        <div class="buyer-request-bx"><h3>View Offers</h3></div>
                        <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                        <div class="buyer_req" id="buyer_req">
                            @include('elements.services.buyerrequestviewoffers')
                        </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </section>
</div>
@endsection