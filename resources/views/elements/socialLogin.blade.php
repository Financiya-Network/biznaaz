<div class="social-login">
    <a href="users/redirecttofacebook" class="face-login" onclick="return loginsignup('redirecttofacebook');"><i class="fab fa-facebook" aria-hidden="true"></i><p>Continue with Facebook</p></a>
    <a href="/users/redirecttogoogle" class="google-login" onclick="return loginsignup('redirecttogoogle');"><i class="fab fa-google-plus-g" aria-hidden="true"></i><p>Continue with Google</p></a>
    <!--<a href="{!! HTTP_PATH !!}/users/redirecttolinkedin" class="face-login" onclick="return loginsignup('redirecttolinkedin');"><i class="fa fa-linkedin" aria-hidden="true"></i></a>-->
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

        newwindow = window.open('users/'+type, 'Social Login', features);
        if (window.focus) {
            newwindow.focus()
        }
        return false;
    }
</script>
<style>
        .fa-google-plus-g {
            background: conic-gradient(from -45deg, #ea4335 110deg, #4285f4 90deg 180deg, #34a853 180deg 270deg, #fbbc05 270deg) 73% 55%/150% 150% no-repeat;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            -webkit-text-fill-color: transparent;
        }
        {{-- .fa-facebook {
            background:#2e2eb8;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            -webkit-text-fill-color: transparent;
        } --}}
    </style>