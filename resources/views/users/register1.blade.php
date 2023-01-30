@extends('layouts.login')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    $.get("https://www.iplocate.io/api/lookup", function (response){
        var ippp=response.ip;
       
        $("#countryname").val(response.country);
           
     },'jsonp');
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[\w.]+$/i.test(value);
        }, "Only letters, numbers and underscore allowed.");
        $.validator.addMethod("passworreq", function (input) {
            var reg = /[0-9]/; //at least one number
            var reg2 = /[a-z]/; //at least one small character
            var reg3 = /[A-Z]/; //at least one capital character
            //var reg4 = /[\W_]/; //at least one special character
            return reg.test(input) && reg2.test(input) && reg3.test(input);
        }, "Password must be a combination of Numbers, Uppercase & Lowercase Letters.");
        $("#loginform").validate();
    });
    function checkForm(){        
        $('#captcha_msg').html("").removeClass('gcerror');
        if ($("#loginform").valid()) {
            var captchaTick = grecaptcha.getResponse(); 
            if (captchaTick == "" || captchaTick == undefined || captchaTick.length == 0) {
                $('#captcha_msg').html("Please confirm captcha to proceed").addClass('gcerror');
                $('#captcha_msg').addClass('gcerror');
                return false;
            }
        }else{
            var captchaTick = grecaptcha.getResponse(); 
            if (captchaTick == "" || captchaTick == undefined || captchaTick.length == 0) {
                $('#captcha_msg').html("Please confirm captcha to proceed").addClass('gcerror');
                return false;
            }
        }        
    };
</script>
<div class="detai_page">
    <div class="top_pop"><div class="signn-logo"><a href="{!! HTTP_PATH !!}">{{HTML::image(LOGO_PATH, SITE_TITLE)}}</a></div></div>
    <div class="login-wapper ddreg">        
        <div class="login-bg">  
            <div class="signn">Create your Account </div>
            @include('elements.socialLogin')
            <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
            <div class="socila_login">
                <?php //echo $this->element('social_register', array('type' => 'register')); ?>
            </div>
            <div normal_login>
                {{ Form::open(array('method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin')) }}             
                <div class="login_fieldarea">
                    <div class="inputt">
                        <span class="fieldd namehalf">
                            {{Form::text('first_name', null, ['class'=>'form-control required alphanumeric', 'placeholder'=>'First name', 'autocomplete'=>'OFF'])}}
                        </span>
                        <span class="fieldd namehalf">
                            {{Form::text('last_name', null, ['class'=>'form-control required alphanumeric', 'placeholder'=>'Last name', 'autocomplete'=>'OFF'])}}
                        </span>
                    </div>
                    <div class="inputt">
                        <span class="fieldd">
                            {{Form::text('email_address', Cookie::get('user_email_address'), ['class'=>'form-control required email', 'placeholder'=>'Email Address', 'autocomplete'=>'OFF'])}}
                        </span>
                    </div>
                    <div class="inputt">
                        <span class="fieldd namehalf">
                            {{Form::password('password', ['class'=>'form-control required passworreq', 'placeholder' => 'Password', 'minlength' => 8, 'id'=>'password'])}}
                        </span>
                        <span class="fieldd namehalf">
                            {{Form::password('confirm_password', ['class'=>'form-control required', 'placeholder' => 'Confirm password', 'equalTo' => '#password'])}}
                        </span>
                    </div>
                    <div class="inputt gcpaatcha">
                        <div id="recaptchaQ" class="g-recaptcha" data-sitekey="{{ CAPTCHA_KEY }}" style="transform:scale(0.2);-webkit-transform:scale(1);transform-origin:0 0;-webkit-transform-origin:0 0;" ></div>
                        <div class="gcpc" id="captcha_msg"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="sign_in" id="sub_btn_dive">
                        <input type ="hidden" name="countryname" id="countryname" value="">  
                        {{Form::submit('Sign up', ['class' => 'btn btn-primary btn-block btn-flat', 'onclick'=>'return checkForm()'])}}
                    </div>
                </div>
                <div class="sign_center">
                    <div class="always_btn">Already Have an Account? <a href="{{ URL::to( 'login')}}"></i>Login</a></div> 
                </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection