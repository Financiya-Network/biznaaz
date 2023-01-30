{{ HTML::script('public/js/jquery-2.1.0.min.js')}}
<script type="text/javascript" language="javascript">
    function show_div() {
        $('.loader_img').show();
    }
    $(function(){
         setTimeout(function() {
            $('#payment_form').submit();
        }
        ,1000);
    })   
</script>
<title>{{$title.TITLE_FOR_LAYOUT}}</title>
<div class="active_vb">
    <div class="wrapper">
        <div class="modalv2 mpre"> 
            <div class="activate-popup alum-popup pricing">
                <div class="content">
                    <div class="paypal_process_t" style="text-align:center; padding-top:80px">
                        <div class="">
                            <h1>Please wait, redirecting to payment gateway...</h1>
                            <div>Please do not refresh or click on back browser button</div>
                           <div class="loder_img cerntekej">
                                <span class="loading_img"></span>
                                <br/>
                                {{HTML::image(LOGO_PATH, SITE_TITLE)}}
                                <br/>
                                <br/>
                                {{HTML::image('public/img/loader-new.gif', SITE_TITLE)}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rws">
                    <div class="full_input forgot_text">                        
                        <div class="rgt_input">
                            <form name="payment_form" action="{{$paypal_url}}" method="post" id="payment_form">
                                   
                                    <input type="hidden" name="business" value="{{$paypal_email}}">
                                    <input type="hidden" name="currency_code" value="{{$currency}}">
                                    
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="item_number" value="{{$item_number}}"/>
                                    <input type="hidden" name="item_name" value="Payment for {{$product_name}} on {{SITE_TITLE}}"/>
                                    <input type="hidden" name="amount" value="{{$amount}}">
                                    <input type="hidden" name="no_shipping" value="1">
                                    <input type='hidden' name='rm' value='2'>
                                    <input type="hidden" name="lc" value="EN"/>
                                    <input type="hidden" name="return" value="{{$success_url}} "/>
                                    <input type="hidden" name="cancel_return" value="{{$cancel_url}}"/>
                                    <div style="float:left ;margin-top: 29px;margin-left: 34px;display:none;" class="loader_img">
                                        &nbsp;&nbsp;<span class="redirect_txt"> Please wait... You are being redirected to PayPal</span></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="invite-now"></div>
            </div>        
        </div>
    </div>
</div>   
