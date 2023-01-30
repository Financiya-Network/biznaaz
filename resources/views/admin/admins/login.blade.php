@extends('layouts.adminlogin')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">    
    function checkForm(){
        $('#captcha_msg').html("").removeClass('gcerror');
        if ($("#adminlogin").valid()) {
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

<div class="login-logo">{{HTML::image(LOGO_PATH, SITE_TITLE)}}</div>
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    @include('elements.admin.errorSuccessMessage')
    {{ Form::open(array('url' => 'admin/login', 'method' => 'post', 'id' => 'adminlogin', 'class' => 'form form-signin')) }}
    <div class="form-group has-feedback">
        {{Form::text('username', Cookie::get('admin_username'), ['class'=>'form-control required', 'placeholder'=>'Username'])}}
        <span class="form-control-feedback"><i class="fa fa-user"></i></span>
    </div>
    <div class="form-group has-feedback">
        {{Form::input('password', 'password', Cookie::get('admin_password'), array('class' => "required form-control", 'placeholder' => 'Password'))}}
        <span class=" form-control-feedback"><i class="fa fa-lock"></i></span>
    </div>
    <div class="form-group has-feedback">
        <div id="recaptchaQ" class="g-recaptcha" data-sitekey="{{ CAPTCHA_KEY }}" style="transform:scale(0.8);-webkit-transform:scale(1.05);transform-origin:0 0;-webkit-transform-origin:0 0;" ></div>
        <div class="gcpc" id="captcha_msg"></div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>{{Form::checkbox('remember', '1', Cookie::get('admin_remember'))}} Remember Me
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            {{Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'onclick'=>'return checkForm()'])}}
        </div>
    </div>
    {{ Form::close()}}
    <a href="{{ URL::to( 'admin/admins/forgot-password')}}"></i>I forgot my password</a>
</div>
@endsection