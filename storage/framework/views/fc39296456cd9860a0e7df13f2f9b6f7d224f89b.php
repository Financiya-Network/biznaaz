<?php echo e(HTML::style('public/css/front/bootstrap.min.css')); ?>




<?php $__env->startSection('content'); ?>
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="signn">Log In </div>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $__env->make('elements.socialLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div normal_login>
                        <?php echo e(Form::open(['method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin'])); ?>

                        <div class="login_fieldarea">
                            <div class="inputt">
                                <span class="fieldd"><i class="fa fa-envelope"></i>
                                    <?php echo e(Form::text('email_address', Cookie::get('user_email_address'), ['class' => 'form-control required email enterkey', 'placeholder' => 'Email address', 'autocomplete' => 'OFF'])); ?>

                                </span>
                            </div>
                            <div class="inputt">
                                <span class="fieldd"><i class="fa fa-key"></i>
                                    <?php echo e(Form::input('password', 'password', Cookie::get('user_password'), ['class' => 'required form-contro enterkeyl', 'placeholder' => 'Password', 'id' => 'user_password'])); ?>

                                </span>
                            </div>
                            <div class="clear"></div>
                            <div class="inputt inputt_rev">
                                <div class="col_tow_logns remember_secsd sdgsef">
                                    <?php echo e(Form::checkbox('user_remember', '1', Cookie::get('user_remember'), ['class' => 'css-checkbox in-checkbox', 'id' => 'remember_sec'])); ?>

                                    <label for="remember_sec" class="in-label">Remember
                                        Me</label>
                                </div>
                                <div class="col_tow_logns forgot_pass_sec">
                                    <a href="<?php echo e(URL::to('forgot-password')); ?>"></i>Forgot
                                        your Password?</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="sign_in" id="sub_btn_dive">
                                <button id="ddbuton" type="button" class="btn  loginbtn" onclick="postform()">Log
                                    In</button>
                                <div class="loginbtnloader" id="btnloader">
                                    <?php echo e(HTML::image('public/img/loading.gif', SITE_TITLE)); ?>

                                </div>
                            </div>
                        </div>
                        <div class="sign_center ">
                            <div class="always_btn"> Don't have an account?
                                <a href="<?php echo e(URL::to('register')); ?>"></i>Sign
                                    Up</a>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="detai_page container card col-sm-3" style="margin-top: 8rem !important;margin-bottom: 3rem;">
            <div class="signn">Log In </div>
            <?php echo $__env->make('elements.socialLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
            <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>            
            <div normal_login>
                <?php echo e(Form::open(array('method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin'))); ?>             
                <div class="login_fieldarea">
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-envelope"></i>
                            <?php echo e(Form::text('email_address', Cookie::get('user_email_address'), ['class'=>'form-control required email enterkey', 'placeholder'=>'Email address', 'autocomplete'=>'OFF'])); ?>

                        </span>
                    </div>
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-key"></i>
                            <?php echo e(Form::input('password', 'password', Cookie::get('user_password'), array('class' => "required form-contro enterkeyl", 'placeholder' => 'Password', 'id'=>'user_password'))); ?>

                        </span>
                    </div>
                    <div class="clear"></div>            
                    <div class="inputt inputt_rev">                    
                        <div class="col_tow_logns remember_secsd sdgsef">
                            <?php echo e(Form::checkbox('user_remember', '1', Cookie::get('user_remember'), array('class' => "css-checkbox in-checkbox", 'id' =>"remember_sec"))); ?>

                            <label for="remember_sec" class="in-label">Remember Me</label>
                        </div>
                        <div class="col_tow_logns forgot_pass_sec">
                            <a href="<?php echo e(URL::to( 'forgot-password')); ?>"></i>Forgot your Password?</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="sign_in" id="sub_btn_dive">
                        <button id="ddbuton" type="button" class="btn btn-primary loginbtn" onclick="postform()">Log In</button>
                        <div class="loginbtnloader" id="btnloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                    </div>
                </div>
                <div class="sign_center ">
                    <div class="always_btn"> Don't have an account? <a href="<?php echo e(URL::to( 'register')); ?>"></i>Sign Up</a></div> 
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>