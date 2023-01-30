<footer>
    <div class="container">
        <div class="footer_inner">
            <div class="foot_block foot_block_first">
                <div class="foot_title mobile_sh"><span>Top Categories</span></div>
                <div class="foot_title drop1">Top Categories</div>
                <div class="foot_menu block1">
                    <ul>
                        @if ($globalCategories)
                            @foreach ($globalCategories as $cat)
                                <li><a href="{{ URL::to('gigs/' . $cat->slug) }}">{!! $cat->name !!}</a></li>
                                @if ($loop->iteration == 10)
                                @break
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="foot_block">
            <div class="foot_title mobile_sh"><span>About</span></div>
            <div class="foot_title drop2">About</div>
            <div class="foot_menu block2">
                <ul>
                    <li><a href="{{ URL::to('about-us') }}">About us</a></li>
                    <li><a href="{{ URL::to('how-it-works') }}">How it works</a></li>
                    <li><a href="{{ URL::to('privacy-policy') }}">Privacy policy</a></li>
                    <li><a href="{{ URL::to('terms-and-condition') }}">Terms of service</a></li>
                    <li><a href="{{ URL::to('press-and-news') }}">Press & News</a></li>
                </ul>
            </div>
        </div>
        <div class="foot_block">
            <div class="foot_title mobile_sh"><span>Support</span></div>
            <div class="foot_title drop4">Support</div>

            <div class="foot_menu block4">
                <ul>
                    <li><a href="{{ URL::to('contact-us') }}">Contact us</a></li>
                    <li><a href="{{ URL::to('trust-and-safety') }}">Trust & safety</a></li>
                    <li><a href="{{ URL::to('faqs') }}">FAQ</a></li>
                    <!--                        <li><a href="#">Email</a></li>-->
                </ul>

            </div>

        </div>
        <div class="foot_block ">
            <div class="foot_title mobile_sh"><span>Follow Us</span></div>
            <div class="foot_title drop5">Follow Us</div>
            <div class="foot_menu block5">
                <ul>
                    @if ($siteSettings->facebook_link)
                        <li><a href="{!! $siteSettings->facebook_link !!}" target="_blank"><i class="fa fa-facebook"
                                    aria-hidden="true"></i> facebook</a></li>
                    @endif
                    @if ($siteSettings->twitter_link)
                        <li><a href="{!! $siteSettings->twitter_link !!}" target="_blank"><i class="fa fa-twitter"
                                    aria-hidden="true"></i> twitter</a></li>
                    @endif
                    <!--                        @if ($siteSettings->google_link)
<li><a href="{!! $siteSettings->google_link !!}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i> google+</a></li>
@endif-->
                    @if ($siteSettings->instagram_link)
                        <li><a href="{!! $siteSettings->instagram_link !!}" target="_blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i> instagram</a></li>
                    @endif
                    @if ($siteSettings->linkedin_link)
                        <li><a href="{!! $siteSettings->linkedin_link !!}" target="_blank"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i> linkedin</a></li>
                    @endif
                    @if ($siteSettings->pinterest_link)
                        <li><a href="{!! $siteSettings->pinterest_link !!}" target="_blank"><i class="fa fa-pinterest"
                                    aria-hidden="true"></i> pinterest</a></li>
                    @endif
                    @if ($siteSettings->youtube_link)
                        <li><a href="{!! $siteSettings->youtube_link !!}" target="_blank"><i class="fa fa-youtube"
                                    aria-hidden="true"></i> youtube</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="footer_adat"> © Copyright @ {!! date('Y') !!} &nbsp;|&nbsp; <a href="https://biznaaz.com"
        target="_blank">Biznaaz Dev Portal</a> by Biznaaz.com. All Rights Reserved</div>
</footer>
<!--<div class="-fixed-wrap">
<a href="javascript:void(0)" onclick="showRestorePopup()">
<small>Database Will Restore in</small>
<span id="restoreCounter"></span>
</a>
</div>-->
{{ HTML::script('public/js/front/jquery.lazyload.js') }}
<script>
    // Set the date we're counting down to
    var countDownDate = new Date('<?php echo $siteSettings->nextupdate; ?>').getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        //var now = new Date().getTime();
        var date = new Date();
        var utcDate = new Date(date.toLocaleString('en-US', {
            timeZone: "UTC"
        }));
        var now = utcDate.getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var str = ('0' + hours).slice(-2) + ":" + ('0' + minutes).slice(-2) + ":" + ('0' + seconds).slice(-2);
        // Display the result in the element with id="demo"
        $('#restoreCounter').html(str);

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            $('#restoreCounter').html("Process...");
            restoreSystem();
        }
    }, 1000);

    function restoreSystem() {
        $.ajax({
            url: "{!! HTTP_PATH !!}/updatedata",
            type: "GET",
            success: function(result) {
                if (result == 1) {
                    location.reload();
                }

            }
        });
    }

    function addtolike(gid, type) {
        $.ajax({
            url: "{!! HTTP_PATH !!}/users/likeunlike",
            type: "POST",
            data: {
                'gid': gid,
                'type': type,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                $('#lik' + gid).show();
            },
            complete: function() {
                $('#lik' + gid).hide();
            },
            success: function(result) {
                $('#likeunlikeid' + gid).html(result);
            }
        });
    }

    @if (Session::get('user_id') && Session::get('user_id') > 0)
        $(document).ready(function() {
            getmessage();
        });

        function getmessage() {
            $.ajax({
                url: "{!! HTTP_PATH !!}/check-new-notification",
                type: "GET",
                success: function(result) {
                    if (result == 1) {

                    } else {
                        $('#checkunreadmsg').removeClass('displaynone');
                        $('#msgcontaine').removeClass('displaynonenot');
                        $("#msgcontaine").html('');
                        servers = $.parseJSON(result);
                        $.each(servers, function(index, value) {
                            $("#msgcontaine").append(
                                '<li><a href="{{ HTTP_PATH }}/users/view-notification/' +
                                value.url + '"><h3>' + value.message +
                                '</h3><div class="job-tatle">' + value.from_name + '<span> ' +
                                value.timeago + '</span></div></a></li>');
                        });
                    }
                }
            });
        }
        setInterval(function() {
            getmessage();
        }, 30000);
    @endif
    $(document).ready(function() {
        $("img.lazy").lazyload();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.drop1').click(function() {
            if ($('.drop1').hasClass('open1')) {
                $('.drop1').removeClass('open1');
            } else {
                $('.drop1').addClass('open1');
            }
            $(".block1").slideToggle();
        });

        $('.drop2').click(function() {

            if ($('.drop2').hasClass('open2')) {
                $('.drop2').removeClass('open2');
            } else {
                $('.drop2').addClass('open2');
            }
            $(".block2").slideToggle();
        });

        $('.drop3').click(function() {

            if ($('.drop3').hasClass('open3')) {
                $('.drop3').removeClass('open3');
            } else {
                $('.drop3').addClass('open3');
            }

            $(".block3").slideToggle();
        });

        $('.drop4').click(function() {

            if ($('.drop4').hasClass('open4')) {
                $('.drop4').removeClass('open4');
            } else {
                $('.drop4').addClass('open4');
            }
            $(".block4").slideToggle();
        });

        $('.drop5').click(function() {

            if ($('.drop5').hasClass('open5')) {
                $('.drop5').removeClass('open5');
            } else {
                $('.drop5').addClass('open5');
            }
            $(".block5").slideToggle();
        });
    });
</script>
