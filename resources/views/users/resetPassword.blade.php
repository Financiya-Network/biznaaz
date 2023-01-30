@extends('layouts.login')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#loginform").validate();
    });
</script>
<div class="detai_page">
    <div class="top_pop"><div class="signn-logo"><a href="{!! HTTP_PATH !!}">{{HTML::image(LOGO_PATH, SITE_TITLE)}}</a></div></div>
    <div class="login-wapper">        
        <div class="login-bg">
            <div class="signn frpassword">Reset Password</div>
            <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
            <div class="socila_login">
                <?php //echo $this->element('social_register', array('type' => 'register')); ?>
            </div>
            <div normal_login>
                {{ Form::open(array('method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin')) }}
                <div class="login_fieldarea">
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-envelope"></i>
                            {{Form::password('password', ['class'=>'form-control required', 'placeholder' => 'New Password', 'minlength' => 8, 'id'=>'password'])}}
                        </span>
                    </div>
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-envelope"></i>
                            {{Form::password('confirm_password', ['class'=>'form-control required', 'placeholder' => 'Confirm Password', 'equalTo' => '#password'])}}
                        </span>
                    </div>
                    <div class="clear"></div>            
                    <div class="sign_in" id="sub_btn_dive">
                        {{Form::submit('Submit', ['class' => 'btn btn-primary btn-block btn-flat'])}}
                    </div>
                </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection