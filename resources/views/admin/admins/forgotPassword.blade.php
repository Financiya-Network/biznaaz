@extends('layouts.adminlogin')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#adminlogin").validate();
    });
</script>
<div class="login-logo">{{HTML::image(LOGO_PATH, SITE_TITLE)}}</div>
<div class="login-box-body">
    <p class="login-box-msg">Forgot Password</p>
    @include('elements.admin.errorSuccessMessage')
    {{ Form::open(array('method' => 'post', 'id' => 'adminlogin', 'class' => 'form form-signin')) }}
    <div class="form-group has-feedback">
        {{Form::text('email', null, ['class'=>'form-control required email', 'placeholder'=>'Enter email address'])}}
        <span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox"><a href="{{ URL::to( 'admin/admins/login')}}">I remember my password</a></div>
        </div>
        <div class="col-xs-4">
            {{Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat'])}}
        </div>
    </div>
    {{ Form::close()}}    
</div>
@endsection