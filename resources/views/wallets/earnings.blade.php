@extends('layouts.inner')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#withdrawform").validate();
    });
    function sendwithreq(){
        $('#whtform').toggle('slow');
    }
 </script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="top_roworders"><h2>Earnings</h2>
                <!--<span class="pull-right">Expected Earnings: {{CURR.number_format($amountArray['expectedearnings'], 2)}}</span>-->
            </div>
            <div class="ee er_msg postfrm">@include('elements.errorSuccessMessage')</div>
            <div class="js-db-stats ">
                <span><small>Net Income</small>{{CURR.number_format($amountArray['netincome'], 2)}}</span>
                <span><small>Withdrawn</small>{{CURR.number_format(-$amountArray['withdrawn'], 2)}}</span>
                <span><small>Used for Purchases</small>{{CURR.number_format(-$amountArray['userforpurchase'], 2)}}</span>
                <span><small>Pending Clearance</small>{{CURR.number_format(-$amountArray['pendingclearance'], 2)}}</span>
                <span><small>Available for Withdrawal</small>{{CURR.number_format($amountArray['availableforwithdraw'], 2)}}</span>
                <span><small>Minimum Withdraw Amount</small>{{CURR.$siteSettings->minimum_withdraw_amount}} 
                    @if($amountArray['availableforwithdraw'] >= $siteSettings->minimum_withdraw_amount)
                    <p class="btn btn-primary" onclick="sendwithreq()">Request</p>
                    @endif
                </span>
            </div>
            <div class="with_form" id="whtform">
                {{ Form::open(array('url' => 'wallets/withdraw-request', 'method' => 'post', 'id' => 'withdrawform')) }}
                <div class="with_form_f"><label>Withdraw Amount ({{CURR}})</label><span class="wht_text">{{Form::text('amount', null, ['class'=>'form-control required digits', 'placeholder'=>'Enter amount you want to withdraw', 'autocomplete' => 'off', 'min'=>$siteSettings->minimum_withdraw_amount, 'max'=>$amountArray['availableforwithdraw']])}}</span> <span class="wht_btn">{{Form::submit('Send Request', ['class' => 'btn btn-info'])}}</span></div>
                {{ Form::close()}}
            </div>
            <div class="er_space"></div>            
            <div class="tab-pane active" id="buyeractive">
                <div class="buyer-request-bx"><h3>Transaction History</h3>
                    <?php /*{{ Form::open(array('method' => 'post', 'id' => 'buyerrequestform')) }}
                        <div class="allsub-category">
                            <div class="market-select">
                                <span> {{Form::select('type', $walletTypes,null, ['class' => 'form-control','placeholder' => 'All Categories', 'onchange'=>'filterrequest()'])}}</span>
                            </div>                                    
                        </div>
                    {{Form::hidden('page', $page, ['id'=>'buyerpage'])}}
                    {{ Form::close()}} */?>
                </div>
                <div class="main_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                <div class="buyer_req" id="buyer_req">
                    @include('elements.wallets.earnings')
                </div>
                @if(!$allrecords->isEmpty() && count($allrecords) > 29)
                    <div class="loadmore" id="reqloaddiv">
                        <span class="loadmorebtn" id="loadmorebtn" onclick="buyerloadmore()">Load more...</span>
                    </div>
                @endif
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