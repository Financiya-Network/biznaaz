<?php $__env->startSection('content'); ?>
<?php echo e(HTML::style('public/css/front/card.css')); ?>

<?php echo e(HTML::script('public/js/creditCardValidator.js')); ?>

<script>
    function cardFormValidate() {
        var cardValid = 0;
        //card number validation
        $('#card_number').validateCreditCard(function (result) {
            var cardType = (result.card_type == null) ? '' : result.card_type.name;
            if (cardType == 'Visa') {
                var backPosition = result.valid ? '2px -163px, 312px -87px' : '2px -163px, 312px -61px';
            } else if (cardType == 'MasterCard') {
                var backPosition = result.valid ? '2px -247px, 312px -87px' : '2px -247px, 312px -61px';
            } else if (cardType == 'Maestro') {
                var backPosition = result.valid ? '2px -289px, 312px -87px' : '2px -289px, 312px -61px';
            } else if (cardType == 'Discover') {
                var backPosition = result.valid ? '2px -331px, 312px -87px' : '2px -331px, 312px -61px';
            } else if (cardType == 'Amex') {
                var backPosition = result.valid ? '2px -121px, 312px -87px' : '2px -121px, 312px -61px';
            } else {
                var backPosition = result.valid ? '2px -121px, 312px -87px' : '2px -121px, 312px -61px';
            }
            $('#card_number').css("background-position", backPosition);
            if (result.valid) {
                $("#card_type").val(cardType);
                $("#card_number").removeClass('required');
                cardValid = 1;
            } else {
                $("#card_type").val('');
                $("#card_number").addClass('required');
                cardValid = 0;
            }
        });

        //card details validation
        var cardName = $("#name_on_card").val();
        var expMonth = $("#expiry_month").val();
        var expYear = $("#expiry_year").val();
        var cvv = $("#cvv").val();
        var regName = /^[a-z ,.'-]+$/i;
        var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
        var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
        var regCVV = /^[0-9]{3,3}$/;
        if (cardValid == 0) {
            $("#card_number").addClass('required');
            $("#card_number").focus();
            return false;
        } else if (!regMonth.test(expMonth)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").addClass('required');
            $("#expiry_month").focus();
            return false;
        } else if (!regYear.test(expYear)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").addClass('required');
            $("#expiry_year").focus();
            return false;
        } else if (!regCVV.test(cvv)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").addClass('required');
            $("#cvv").focus();
            return false;
        } else if (!regName.test(cardName)) {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").removeClass('required');
            $("#name_on_card").addClass('required');
            $("#name_on_card").focus();
            return false;
        } else {
            $("#card_number").removeClass('required');
            $("#expiry_month").removeClass('required');
            $("#expiry_year").removeClass('required');
            $("#cvv").removeClass('required');
            $("#name_on_card").removeClass('required');
            $('#cardSubmitBtn').prop('disabled', false);
            return true;
        }
    }

    $(document).ready(function () {
        $('#paymentForm input[type=text]').on('keyup', function () {
            cardFormValidate();
        });
    });
</script>
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="top_row col-xs-12 col-md-8">
                    <div class="offer_summay">
                        <h3 class="left_title">Offer Details</h3>
                        <div class="summary">
                            <div class="gig-summary">
                                <div class="ofsub_left">
                                    <div class="dpimg-about">
                                        <?php if($servicesofferInfo->User->profile_image): ?>
                                            <a href="<?php echo e(URL::to( 'public-profile/'.$servicesofferInfo->User->slug)); ?>"><?php echo e(HTML::image(PROFILE_SMALL_DISPLAY_PATH.$servicesofferInfo->User->profile_image, SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(URL::to( 'public-profile/'.$servicesofferInfo->User->slug)); ?>"><?php echo e(HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id'=> 'pimage'])); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <h3><a href="<?php echo e(URL::to( 'public-profile/'.$servicesofferInfo->User->slug)); ?>"><?php echo e($servicesofferInfo->User->first_name?$servicesofferInfo->User->first_name.' '.$servicesofferInfo->User->last_name:''); ?> </a></h3>
                                </div>
                                <div class="ofsub_right">
                                    <div class="ofsub_top">
                                        <div class="of_col"><label class="quantity"><span>Deliver In:</span><?php echo e($servicesofferInfo->deliver_in); ?> Days</label></div>
                                        <div class="of_col"><label class="quantity"><span>Revisions:</span><?php echo e($servicesofferInfo->revisions); ?></label></div>
                                        <div class="of_col"><label class="quantity"><span>Amount:</span><?php echo e(CURR.$servicesofferInfo->amount); ?></label></div>
                                    </div>
                                    <div class="ofsub_btm"><?php echo nl2br($servicesofferInfo->message); ?></div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="service_summay">
                        <h3 class="left_title">Service Request Details</h3>
                        <div class="summary">
                            <div class="ofsub_top">
                                <div class="of_col"><label class="quantity"><span>Title:</span><?php echo e($serviceInfo->title); ?></label></div>
                                <div class="of_col"><label class="quantity"><span>Duration:</span><?php echo e($serviceInfo->day); ?> Days</label></div>
                                <div class="of_col"><label class="quantity"><span>Budget:</span><?php echo e(CURR.$serviceInfo->price); ?></label></div>
                            </div>
                            <div class="ofsub_btm"><?php echo nl2br($serviceInfo->description); ?></div>
                        </div> 
                    </div>
                </div>
                <div class=" col-xs-12 col-md-4 sticky">
                    <div class="offer_wrap ">
                        <div class="offer_tite">Payment Summary</div>  
                        <div class="send-form"> 
                            <div class="summery-dtl">
                                <label>Subtotal</label>
                                <span><?php echo e(CURR.number_format($servicesofferInfo->amount, 2)); ?></span>
                            </div>
                            <?php // print_r($siteSettings);die; ?>
                            <?php
                                $servicefree = round(($servicesofferInfo->amount * $siteSettings->admin_commission/100), 2);
                                $payamount = $servicesofferInfo->amount + $servicefree;
                            ?>
                            <div class="summery-dtl">
                                <label>Service Fee</label>
                                <span><?php echo e(CURR.number_format($servicefree, 2)); ?></span>
                            </div>
                            <div class="summery-dtl summery-totl">
                                <label>Total</label>
                                <span><?php echo e(CURR.number_format($payamount, 2)); ?></span>
                            </div>
                            <?php if($serviceInfo->payment_status == 0): ?>
                                <div class="summery-dtl" id="btndive">
                                    <a href="javascript:void(0)" class="btn btn-primary" onclick="paybycard()">Pay By Credit Card</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" onclick="paybypaypal()">Pay By PayPal</a>
                                    <?php if($amountArray['availableforwithdraw'] >= $servicesofferInfo->amount): ?>
                                        <a href="javascript:void(0)" class="btn btn-primary default-btn" onclick="paybywallet()">Pay By Wallet Amount</a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="paywithcard" id="paywithpaypal">
                                <h3>Pay with PayPal</h3>
                                <?php echo e(Form::open(array('method' => 'post', 'id' => 'paypalForm'))); ?>

                                <?php echo e(Form::hidden('slug', $servicesofferInfo->slug, [])); ?>                                
                                <div class="summery-dtl summery-totl">
                                    <label>Order Amount</label>
                                    <span><?php echo e(CURR.number_format($payamount, 2)); ?></span>
                                </div>
                                <div class="pay-btn" id="btndivetallet">
                                    <a href="<?php echo e(URL::to( 'payments/paywithpaypalservice/'.$servicesofferInfo->slug)); ?>" class="btn btn-primary">Pay now</a>
                                    <span onclick="resetoptionpaypal()" class="btn text_default">Cancel</span>
                                </div>    
                                <?php echo e(Form::close()); ?> 
                            </div>
                            <div class="paywithcard" id="paywithwallet">
                                <h3>Pay with Wallet Balance</h3>
                                <div class="summery-dtl">
                                    <label>Wallet Balance</label>
                                    <span><?php echo e(CURR.number_format($amountArray['availableforwithdraw'], 2)); ?></span>
                                </div>
                                <div class="summery-dtl">
                                    <label>Order Amount</label>
                                    <span>-<?php echo e(CURR.number_format($payamount, 2)); ?></span>
                                </div>
                                <div class="summery-dtl summery-totl">
                                    <label>Balance after Payment</label>
                                    <span><?php echo e(CURR.number_format(($amountArray['availableforwithdraw'] - $payamount), 2)); ?></span>
                                </div>
                                <div class="pay-btn" id="btndivetallet">
                                    <a href="javascript:void(0)" class="btn btn-primary" onclick="payviawallet()">Pay now</a>
                                    <span onclick="resetoptionwallet()" class="btn text_default">Cancel</span>
                                </div>                                    
                            </div>
                            <div class="paywithcard" id="paywithcard">
                                <?php echo e(Form::open(array('method' => 'post', 'id' => 'paymentForm'))); ?>

                                <?php echo e(Form::hidden('slug', $servicesofferInfo->slug, [])); ?>

                                <h3>Pay with Credit Card</h3>
                                <div class="card_error_pay" id="card_error_pay"></div>
                                <div class="paywithcard-bx">
                                    <label>Card Number</label>
                                    <div class="paywithcard-input">
                                        <input type="text" placeholder="Card number" id="card_number"  class="form-control" name="card_number">
                                    </div>
                                </div>
                                <div class="paywithcard-bx">
                                    <div class="ex-dat">
                                        <label>Expiry Date(MM/YYYY)</label>
                                        <div class="paywithcard-input">
                                            <div class="expiry-date">
                                                <input type="text" class="form-control" placeholder="MM" maxlength="2" id="expiry_month" name="expiry_month">
                                            </div>
                                            <div class="expiry-nonth">
                                                <input type="text" class="form-control" placeholder="YYYY" maxlength="4" id="expiry_year" name="expiry_year">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-cotes">
                                        <label>CVV</label>
                                        <div class="paywithcard-input">
                                            <div class="cvv-num">
                                                <input type="text" class="form-control" placeholder="cvv" maxlength="4" id="cvv" name="cvv">
                                            </div>
                                            <div class="card-img"><?php echo e(HTML::image('public/img/front/your_cvv.png', SITE_TITLE)); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="paywithcard-bx">
                                    <label>Name on Card</label>
                                    <div class="paywithcard-input">
                                        <input type="text"  class="form-control" placeholder="Name on card" id="name_on_card" name="name_on_card">
                                    </div>
                                </div>
                                <div class="pay-btn" id="btndivecard">
                                    <input type="hidden" name="card_type" id="card_type" value=""/>
                                    <input name="card_submit" id="cardSubmitBtn" value="Pay now" class="btn btn-primary" disabled="true" type="button" onclick="paywithcard()">
                                    <span onclick="resetoption()" class="btn text_default">Cancel</span>
                                </div> 
                                <?php echo e(Form::close()); ?> 
                            </div>
                            <div class="gigdloader order_d" id="gigdloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                        </div>
                    </div>
                    <div class="buyer-protection">
                        <ul>
                            <li>
                                <i class="note-icon fa fa-lock"></i>
                                <span>
                                    <strong>SSL Secured Checkout</strong>
                                    Your information is always safe
                                </span>
                            </li>
                            <li>
                                <i class="note-icon fa fa-check-circle"></i>
                                <span>
                                    <strong>100% Risk Free Payment</strong>
                                    Your payment is protected by <?php echo e(SITE_TITLE); ?> until your order is done
                                </span>
                            </li>
                            <li>
                                <i class="note-icon fa fa-user"></i>
                                <span>
                                    <strong>24/7 Customer Support</strong>
                                    Whenever you have an issue to resolve
                                </span>
                            </li>   
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function paywithcard() {
      if (cardFormValidate()) {
            $('#btndivecard').hide();
            $('#gigdloader').show();
            $('#card_error_pay').html('');            
            $('#paywithcard').addClass('makefad');
            
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/payments/paywithcardservice",
                type: "POST",
                data: $('#paymentForm').serialize(),
                success: function (result) {
                    if(result == 1){
                        window.location = "<?php echo HTTP_PATH; ?>/services/management";
                    }else{
                        $('#gigdloader').hide();
                        $('#btndivecard').show();
                        $('#paywithcard').removeClass('makefad');
                        $('#card_error_pay').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + result + '</div>');
                    }
                }
            });
            
        }
    }
    function payviawallet() {
        if (confirm('Please do not refresh or click borwser back button.') == true) {
            $('#btndivetallet').hide();
            $('#gigdloader').show();
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/payments/payviawalletservice",
                type: "POST",
                data: {'slug': '<?php echo $servicesofferInfo->slug; ?>', _token: '<?php echo e(csrf_token()); ?>'},
                success: function (result) {
                    window.location = "<?php echo HTTP_PATH; ?>/services/management";
                }
            });
        } else {
            return false;
        }
    }
    function paybywallet() {
        $('#btndive').hide();
        $('#paywithwallet').show();
    }
    function paybycard() {
        $('#btndive').hide();
        $('#paywithcard').show();
    }
    function paybypaypal() {
        $('#btndive').hide();
        $('#paywithwallet').hide();
        $('#paywithpaypal').show();
    }

    function resetoption() {
        $('#btndive').show();
        $('#paywithcard').hide();
    }
    function resetoptionwallet() {
        $('#btndive').show();
        $('#paywithwallet').hide();
    }
    function resetoptionpaypal() {
        $('#btndive').show();
        $('#paywithpaypal').hide();
    }
</script> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>