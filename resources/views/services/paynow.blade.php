@extends('layouts.payment')
@section('content')

<div class="main_dashboard">
    <div class="pay_poader">
        <div class="pay_poader_222">
            <div class="logo_image">{{HTML::image(LOGO_PATH, SITE_TITLE)}}</div>
            <div class="waiting_text">Please wait, redirecting to payment gateway...</div>
            <div class="waiting_text _hsss">Please do not refresh or click on browser back button.</div>
            <div class="waiting_text">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
        </div>
    </div>

    <?php
    //$notify_url = HTTP_PATH . '/payments/notify/' . $order_slug;
    $cancel_return = HTTP_PATH . '/payments/cancel/' . $order_slug;
    $return = HTTP_PATH . '/payments/successpaypal/' . $order_slug;
    if($siteSettings->payment_mode == 1){
        $paypalurl = 'https://www.paypal.com/cgi-bin/webscr';
    }else{
        $paypalurl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    }
    ?>
    <form name="payment_form" action="<?php echo $paypalurl; ?>" method="post" id="paymentForm">
        <input type="hidden" name="business" value="{{$siteSettings->paypal_email_address}}">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_number" value="{{$order_number}}"/>
        <input type="hidden" name="item_name" value="Payment for accepting request  {{$serviceInfo->title}}"/>
        <input type="hidden" name="amount" value="{{$servicesofferInfo->amount}}">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="lc" value="EN"/>
        <input type="hidden" name="return" value="<?php echo $return; ?> "/>
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_return; ?>"/>
<!--        <input type="hidden" name="notify_url" value="<?php //echo $notify_url; ?> "/>-->

    </form>


    <script>
        setTimeout(function () {
           document.getElementById("paymentForm").submit();
        }, 2000)

    </script>
</div>
@endsection