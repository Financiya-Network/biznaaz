<?php $__env->startSection('content'); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
    function checkForm(){        
        $('#captcha_msg').html("").removeClass('gcerror');
        if ($("#contactform").valid()) {
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
<div class="main_dashboard terms_footer">
    
    <div class="container">
    <div class="st_pages">
        <div class="st_pages_title">Send Your Enquiry</div>
        <div class="st_pages_cnt">
            <div class="row">
                 <div class="col-sm-6 col-md-6">
            <div class="stp_left">
                <div class="stp_left_r company"><i class="fa fa-building-o" aria-hidden="true"></i><span><?php echo $siteSettings->company_name; ?></span></div>
                <div class="stp_left_r phone-number"><i class="fa fa-phone" aria-hidden="true"></i><span><?php echo $siteSettings->contact_number; ?></span></div>
                <div class="stp_left_r your-email"><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?php echo $siteSettings->contact_email; ?></span></div>
                <div class="stp_left_r your-address"><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo nl2br($siteSettings->address); ?></span></div>
            </div>
                 </div>
          
                 <div class="col-sm-6 col-md-6">
            <div class="stp_right">
                <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
                <?php echo e(Form::open(array('method' => 'post', 'id' => 'contactform', 'class' => 'form form-signin'))); ?>  
                <div class="form-group">
                    <?php echo e(Form::text('name', null, ['class'=>'form-control required', 'placeholder'=>'Your name', 'autocomplete'=>'OFF'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::text('email', null, ['class'=>'form-control required email', 'placeholder'=>'Your email addrerss', 'autocomplete'=>'OFF'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::text('contact', null, ['class'=>'form-control required digits', 'placeholder'=>'Your contact number', 'autocomplete'=>'OFF', 'minlength' => 8, 'maxlength' => 16])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::textarea('message', null, ['class'=>'form-control required', 'placeholder'=>'Your enquiry message', 'autocomplete' => 'off', 'rows'=>4])); ?>

                </div>
                <div class="form-group">
                    <div class="inputt gcpaatcha">
                        <div id="recaptchaQ" class="g-recaptcha" data-sitekey="<?php echo e(CAPTCHA_KEY); ?>" style="transform:scale(0.2);-webkit-transform:scale(1);transform-origin:0 0;-webkit-transform-origin:0 0;" ></div>
                        <div class="gcpc" id="captcha_msg"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="setting-btn">
                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary btn-block btn-flat succbtn', 'onclick'=>'return checkForm()'])); ?>

                    </div>
                </div>
                <?php echo e(Form::close()); ?>                
            </div>
                 </div>
            </div>
        </div> 
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>