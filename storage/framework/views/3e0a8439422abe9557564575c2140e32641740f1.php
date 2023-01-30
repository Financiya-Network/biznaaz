<?php $__env->startSection('content'); ?>
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
                <!--<span class="pull-right">Expected Earnings: <?php echo e(CURR.number_format($amountArray['expectedearnings'], 2)); ?></span>-->
            </div>
            <div class="ee er_msg postfrm"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <div class="js-db-stats ">
                <span><small>Net Income</small><?php echo e(CURR.number_format($amountArray['netincome'], 2)); ?></span>
                <span><small>Withdrawn</small><?php echo e(CURR.number_format(-$amountArray['withdrawn'], 2)); ?></span>
                <span><small>Used for Purchases</small><?php echo e(CURR.number_format(-$amountArray['userforpurchase'], 2)); ?></span>
                <span><small>Pending Clearance</small><?php echo e(CURR.number_format(-$amountArray['pendingclearance'], 2)); ?></span>
                <span><small>Available for Withdrawal</small><?php echo e(CURR.number_format($amountArray['availableforwithdraw'], 2)); ?></span>
                <span><small>Minimum Withdraw Amount</small><?php echo e(CURR.$siteSettings->minimum_withdraw_amount); ?> 
                    <?php if($amountArray['availableforwithdraw'] >= $siteSettings->minimum_withdraw_amount): ?>
                    <p class="btn btn-primary" onclick="sendwithreq()">Request</p>
                    <?php endif; ?>
                </span>
            </div>
            <div class="with_form" id="whtform">
                <?php echo e(Form::open(array('url' => 'wallets/withdraw-request', 'method' => 'post', 'id' => 'withdrawform'))); ?>

                <div class="with_form_f"><label>Withdraw Amount (<?php echo e(CURR); ?>)</label><span class="wht_text"><?php echo e(Form::text('amount', null, ['class'=>'form-control required digits', 'placeholder'=>'Enter amount you want to withdraw', 'autocomplete' => 'off', 'min'=>$siteSettings->minimum_withdraw_amount, 'max'=>$amountArray['availableforwithdraw']])); ?></span> <span class="wht_btn"><?php echo e(Form::submit('Send Request', ['class' => 'btn btn-info'])); ?></span></div>
                <?php echo e(Form::close()); ?>

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
                <div class="main_loader" id="loaderID"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>
                <div class="buyer_req" id="buyer_req">
                    <?php echo $__env->make('elements.wallets.earnings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <?php if(!$allrecords->isEmpty() && count($allrecords) > 29): ?>
                    <div class="loadmore" id="reqloaddiv">
                        <span class="loadmorebtn" id="loadmorebtn" onclick="buyerloadmore()">Load more...</span>
                    </div>
                <?php endif; ?>
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
            url: "<?php echo HTTP_PATH; ?>/buyer-requests",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>