<div class="social-login">
    <a href="<?php echo HTTP_PATH; ?>/users/redirecttofacebook" class="face-login" onclick="return loginsignup('redirecttofacebook');"><i class="fa fa-facebook-official" aria-hidden="true"></i><p>Continue with Facebook</p></a>
    <a href="<?php echo HTTP_PATH; ?>/users/redirecttogoogle" class="google-login" onclick="return loginsignup('redirecttogoogle');"><i class="fa fa-google" aria-hidden="true"></i><p>Continue with Google</p></a>
    <!--<a href="<?php echo HTTP_PATH; ?>/users/redirecttolinkedin" class="face-login" onclick="return loginsignup('redirecttolinkedin');"><i class="fa fa-linkedin" aria-hidden="true"></i></a>-->
</div>
<div class="or-dev"><span>OR</span></div>
<script type="text/javascript">
    var newwindow;
    var intId;
    function loginsignup(type) {
        var screenX = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
                screenY = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
                outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
                outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
                width = 800,
                height = 500,
                left = parseInt(screenX + ((outerWidth - width) / 2), 10),
                top = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
                features = (
                        'width=' + width +
                        ',height=' + height +
                        ',left=' + left +
                        ',top=' + top
                        );

        newwindow = window.open('<?php echo HTTP_PATH; ?>/users/'+type, 'Social Login', features);
        if (window.focus) {
            newwindow.focus()
        }
        return false;
    }
</script>