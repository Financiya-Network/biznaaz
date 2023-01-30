@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">           
            <div class="manage-btn">Buyer Requests<a href="{{ URL::to( 'services/create-request')}}" class="btn btn-primary">Post a Request</a></div>
            <div class="management-bx lessmar">
<!--                <ul class="my-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#buyeractive" aria-controls="buyeractive" role="tab" data-toggle="tab">Active</a></li>
                    <li role="presentation"><a href="#buyersent" aria-controls="buyersent" role="tab" data-toggle="tab">Sent Offers</a></li>
                </ul>-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="buyeractive">
                        <div class="buyer-request-bx"><h3>Buyer Requests</h3>
                            {{ Form::open(array('method' => 'post', 'id' => 'buyerrequestform')) }}
                                <div class="allsub-category">
                                    <div class="market-select">
                                        <span> {{Form::select('category_id', $catList,null, ['class' => 'form-control','placeholder' => 'All Categories', 'onchange'=>'filterrequest()'])}}</span>
                                    </div>                                    
                                </div>
                            {{Form::hidden('page', $page, ['id'=>'buyerpage'])}}
                            {{ Form::close()}}
                        </div>
                        <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                        <div class="buyer_req" id="buyer_req">
                            @include('elements.services.buyerrequest')
                        </div>
                        @if(!$allrecords->isEmpty() && count($allrecords) > 29)
                            <div class="loadmore" id="reqloaddiv">
                                <span class="loadmorebtn" id="loadmorebtn" onclick="buyerloadmore()">Load more...</span>
                            </div>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane" id="buyersent">
                        <div class="buyer-request-bx"><h3>Offers submitted for buyer requests</h3>

                        </div>
                        <div class="management-bx-over">
                            <div class="management-table">
                                <div class="management-table-tr">
                                    <div class="management-table-th">Offer</div>
                                    <div class="management-table-th">Duration</div>
                                    <div class="management-table-th">Price</div>
                                    <div class="management-table-th">Request</div>
                                </div>
                                <div class="management-table-tr">
                                    <div class="management-table-td">Offer</div>
                                    <div class="management-table-td">Duration</div>
                                    <div class="management-table-td">Price</div>
                                    <div class="management-table-td">Request</div>
                                </div>
                            </div>
                            <div class="management-full">You must have active gigs in order to see new buyer requests! </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </section>
</div>
<script>
    function filterrequest(){
        $('#buyerpage').val('1')
        updaterecords();
    }
    function buyerloadmore(){
        $('#buyerpage').val($('#buyerpage').val()*1 + 1*1);
        updaterecords();
    }
    
    function updaterecords(){
        $.ajax({
            url: "{!! HTTP_PATH !!}/buyer-requests",
            type: "POST",
            data: $('#buyerrequestform').serialize(),
            beforeSend: function () { $("#loaderID").show();},
            complete: function () {$("#loaderID").hide();},
            success: function (result) {
                if($('#buyerpage').val() == 1){
                    $('#buyer_req').html(result);    
                }else{ 
                    $('#buyer_reqappend').append(result);
                }
            }
        });
    }
</script>
@endsection