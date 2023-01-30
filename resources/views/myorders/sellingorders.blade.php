@extends('layouts.inner')
@section('content')
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
            <div class="manage-btn">Manage Selling Orders </div>
            <div class="management-bx">
                <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="management-bx-over">
                    @if(!$allrecords->isEmpty())
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Buyer Name</div>
                            <div class="management-table-th">Gig/Service Title</div>
                            <div class="management-table-th">Order ID</div>
                            <div class="management-table-th">Amount</div>
                            <div class="management-table-th">Status</div>
                            <div class="management-table-th">Action</div>
                        </div>
                        <?php global $gigOrderStatus; ?>
                        @foreach($allrecords as $allrecord)
                            <div class="management-table-tr">
                                <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                                <div class="management-table-td">{{$allrecord->Buyer?$allrecord->Buyer->first_name.' '.$allrecord->Buyer->last_name:'N/A'}}</div>
                                <div class="management-table-td">
                                    @if(isset($allrecord->Gig))
                                        {{$allrecord->Gig->title}}
                                    @elseif(isset($allrecord->Service))
                                        {{$allrecord->Service->title}}
                                    @endif
                                    
                                    
                                    </div>
                                <div class="management-table-td">
                                    @if($allrecord->pay_type === 'Wallet')
                                        {{$allrecord->wallet_trn_id}}
                                    @else 
                                        {{$allrecord->paypal_trn_id}}
                                    @endif
                                </div>
                                <div class="management-table-td">
                                    <?php $val = $allrecord->revenue-$allrecord->admin_amount;
                                    //$val = $allrecord->revenue;
                                    ?>
                                    {{CURR.$val}}
                                </div>
                                <div class="management-table-td">{{$gigOrderStatus[$allrecord->status]}}</div>
                                <div class="management-table-td">
                                    <a href="#info{!! $allrecord->id !!}" title="View Offer Details" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
                                    @if($allrecord->status == 2 && $allrecord->is_seller_rate != 1 && $allrecord->gig_id > 0)
                                        <a href="{{ URL::to('myorders/ratebuyer/'.$allrecord->slug)}}" title="Rate Buyer" class="btn btn-primary btn-xs"><i class="fa fa-star"></i></a>
                                    @endif
                                    <a href="{{ URL::to( 'myorders/workplace/'.$allrecord->slug)}}" title="Go to Workplace" class="btn btn-success btn-xs"><i class="fa fa-tasks"></i></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                        <div class="management-full">No requests found. </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@if(!$allrecords->isEmpty())
@foreach($allrecords as $allrecord)
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
                <div class="admin_pop"><span>Buyer Name: </span>  <label>{!! $allrecord->Buyer?$allrecord->Buyer->first_name.' '.$allrecord->Buyer->last_name:'N/A' !!}</label></div>
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
                 <div class="admin_pop"><span>Gig Extra: </span>  
                <label>
                    <?php 

                    $extra_ids = explode(',',$allrecord->extra_ids);
                                        if ($extra_ids) {
                                            foreach ($extra_ids as $extra_id) {
                                                if(isset($gigextra[$extra_id])){
                                                echo $gigextra[$extra_id].'<br>';
                                                }
                                                
                                            }
                                        }else{
                                           echo 'N/A';
                                        }
                                        ?>
                    </label>
                    </div>
                <div class="admin_pop"><span>Amount: </span>  <label><?php $val = $allrecord->revenue-$allrecord->admin_amount;
                                    //$val = $allrecord->revenue;
                                    ?>
                                    {{CURR.$val}}
                                    <!--{{$allrecord->revenue}}--></label></div>
                <div class="admin_pop"><span>Status: </span>  <label>{{$gigOrderStatus[$allrecord->status]}}</label></div>
        </fieldset>
    </div>
</div>
@endforeach
@endif
@endsection