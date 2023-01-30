<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#loginform").validate();
    });
</script>
<div class="detai_page">
    <div class="top_pop"><div class="signn-logo"><a href="<?php echo HTTP_PATH; ?>"><?php echo e(HTML::image(LOGO_PATH, SITE_TITLE)); ?></a></div></div>
    <div class="login-wapper">        
        <div class="login-bg">
            <div class="signn frpassword">Forgot Password</div>
            <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
            <div class="socila_login">
                <?php //echo $this->element('social_register', array('type' => 'register')); ?>
            </div>
            <div normal_login>
                <?php echo e(Form::open(array('method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin'))); ?>

                <div class="login_fieldarea">
                    <div class="inputt">
                        <span class="fieldd"><i class="fa fa-envelope"></i>
                            <?php echo e(Form::text('email_address', Cookie::get('user_email_address'), ['class'=>'form-control required', 'placeholder'=>'Email Address', 'autocomplete'=>'OFF'])); ?>

                        </span>
                    </div>
                    <div class="clear"></div>            
                    <div class="sign_in" id="sub_btn_dive">
                        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary btn-block btn-flat'])); ?>

                    </div>
                </div>
                <div class="sign_center ">
                    <div class="always_btn">Oops, I just remembered it! Take me back to the <a href="<?php echo e(URL::to( 'login')); ?>"></i>Login</a></div> 
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>