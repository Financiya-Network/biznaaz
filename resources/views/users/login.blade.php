@extends('layouts.home')

{{ HTML::style('public/css/front/bootstrap.min.css') }}
{{-- {{ HTML::script('public/js/jquery.validate.js')}} 
        {{ HTML::script('public/js/front/bootstrap.min.js')}} --}}


@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#loginform").validate();
            $(".enterkey").keyup(function(e) {
                if (e.which == 13) {
                    postform();
                }
            });
            $("#user_password").keyup(function(e) {
                if (e.which == 13) {
                    postform();
                }
            });
        });

        function postform() {
            if ($("#loginform").valid()) {
                $('#btnloader').show();
                $("#loginform").submit();
            }
        }
    </script>


    <div class="detai_page container card col-sm-3" style="margin-top: 8rem !important;margin-bottom: 3rem;">
            <div class="signn">Log In </div>
            @include('elements.socialLogin')            
            <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>            
            <div normal_login>
                {{ Form::open(array('method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin')) }}             
                <div class="login_fieldarea">
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-envelope"></i>
                            {{Form::text('email_address', Cookie::get('user_email_address'), ['class'=>'form-control required email enterkey', 'placeholder'=>'Email address', 'autocomplete'=>'OFF'])}}
                        </span>
                    </div>
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-key"></i>
                            {{Form::input('password', 'password', Cookie::get('user_password'), array('class' => "required form-contro enterkeyl", 'placeholder' => 'Password', 'id'=>'user_password'))}}
                        </span>
                    </div>
                    <div class="clear"></div>            
                    <div class="inputt inputt_rev">                    
                        <div class="col_tow_logns remember_secsd sdgsef">
                            {{Form::checkbox('user_remember', '1', Cookie::get('user_remember'), array('class' => "css-checkbox in-checkbox", 'id' =>"remember_sec"))}}
                            <label for="remember_sec" class="in-label">Remember Me</label>
                        </div>
                        <div class="col_tow_logns forgot_pass_sec">
                            <a href="{{ URL::to( 'forgot-password')}}"></i>Forgot your Password?</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="sign_in" id="sub_btn_dive">
                        <button id="ddbuton" type="button" class="btn btn-primary loginbtn" onclick="postform()">Log In</button>
                        <div class="loginbtnloader" id="btnloader">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
                    </div>
                </div>
                <div class="sign_center ">
                    <div class="always_btn"> Don't have an account? <a href="{{ URL::to( 'register')}}"></i>Sign Up</a></div> 
                </div>
                {{ Form::close()}}
            </div>
        </div>
    
@endsection
