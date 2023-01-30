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
            <div class="manage-btn">PayPal Transaction History </div>
            <div class="management-bx">
                <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="management-bx-over">
                    @if(!$allrecords->isEmpty())
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Title</div>
                            <div class="management-table-th">Amount</div>
                            <div class="management-table-th">Transaction ID</div>
                            <div class="management-table-th">Status</div>
                        </div>
                        <?php global $gigOrderStatus; ?>
                        @foreach($allrecords as $allrecord)
                            <div class="management-table-tr">
                                <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                                <div class="management-table-td">
                                    @if(isset($allrecord->Gig))
                                        {{$allrecord->Gig->title}}
                                    @elseif(isset($allrecord->Service))
                                        {{$allrecord->Service->title}}
                                    @endif
                                </div>
                                <div class="management-table-td">{{CURR.$allrecord->amount}}</div>
                                <div class="management-table-td">{{$allrecord->transaction_id}}</div>
                                <div class="management-table-td">
                                    @if($allrecord->status)
                                        Completed
                                    @else
                                        Pending
                                    @endif    
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
@endsection