<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $.validator.addMethod("passworreq", function (input) {
            var reg = /[0-9]/; //at least one number
            var reg2 = /[a-z]/; //at least one small character
            var reg3 = /[A-Z]/; //at least one capital character
            //var reg4 = /[\W_]/; //at least one special character
            return reg.test(input) && reg2.test(input) && reg3.test(input);
        }, "Password must be a combination of Numbers, Uppercase & Lowercase Letters.");
        $("#changepassword").validate();
        $("#changeemail").validate();
    });
</script>
<section class="dashboard-section">
    <div class="container">
        <div class="your-setting">
            <div class="your-setting-bx">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="ch_password">
                            <div class="section_heading">Change Password</div>
                            <div class="passmsg" id="passmsg"></div>
                            <?php echo e(Form::open(array('method' => 'post', 'id' => 'changepassword'))); ?>

                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::password('old_password', ['class'=>'form-control required', 'placeholder'=>'Current password', 'id'=>'old_password'])); ?>

                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::password('new_password', ['class'=>'form-control required passworreq', 'placeholder'=>'New password', 'id'=>'newpassword', 'minlength'=>8])); ?>

                                    <span class="help-text">8 characters or longer and combination of upper, lowercase letters and numbers.</span>
                                </div>
                            </div>
                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::password('confirm_password', ['class'=>'form-control required', 'placeholder'=>'Confirm password', 'equalTo' => '#newpassword', 'id'=>'confirm_password'])); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="setting-btn">
                                    <button type="button" class="succbtn" id="passbtn">Save Changes</button>
                                    <div class="passloader" id="passloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>            
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="ch_paypalemail">
                            <div class="section_heading">Set Paypal Email Address</div>
                            <div class="passmsg" id="emailmsg"></div>
                            <?php echo e(Form::open(array('method' => 'post', 'id' => 'changeemail'))); ?>

                            <div class="setting-input">
                                <div class="form-group">
                                    <?php echo e(Form::text('paypal_email', $recordInfo->paypal_email, ['class'=>'form-control required email', 'placeholder'=>'Enter paypal email for payment', 'autocomplete' => 'off', 'id'=>'paypal_email'])); ?>

                                    <span class="help-text">If you don't have PayPal email address, <a href="https://www.paypal.com" target="_blank">click here</a> to create PayPal email address.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="setting-btn">
                                    <button type="button" class="succbtn" id="emailbtn">Save Changes</button>
                                    <div class="passloader" id="emailloader"><?php echo e(HTML::image("public/img/loading.gif", SITE_TITLE)); ?></div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $("#passbtn").click(function () {
        if ($("#changepassword").valid()) {
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatesettings",
                type: "POST",
                data: {"old_password": $('#old_password').val(), "newpassword": $('#newpassword').val(), "confirm_password": $('#confirm_password').val(), _token: '<?php echo e(csrf_token()); ?>'},
                beforeSend: function () {
                    $("#passloader").show();
                },
                complete: function () {
                    $("#passloader").hide();
                },
                success: function (result) {
                    if (result == 1) {
                        $('#passmsg').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> You have successfully changed your account password.</div>');
                    } else {
                        $('#passmsg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>' + result + '</div>');
                    }
                }
            });
        }
    });
    $("#emailbtn").click(function () {
        if ($("#changeemail").valid()) {
            $.ajax({
                url: "<?php echo HTTP_PATH; ?>/users/updatesettings",
                type: "POST",
                data: {"paypal_email": $('#paypal_email').val(), _token: '<?php echo e(csrf_token()); ?>'},
                beforeSend: function () {
                    $("#emailloader").show();
                },
                complete: function () {
                    $("#emailloader").hide();
                },
                success: function (result) {
                    if (result == 1) {
                        $('#emailmsg').html('<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> You have successfully changed your account password.</div>');
                    } else {
                        $('#emailmsg').html('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>Something went wrong.</div>');
                    }
                }
            });
        }
    });
    
    $('#changepassword').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
$('#changeemail').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>