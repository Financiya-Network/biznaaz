@extends('layouts.dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script>
    $(function () {
        $("#skill_nameid").chosen({disable_search_threshold: 10});
    })
</script>
<div class="main_dashboard">
    <div class="dashboard-menu">
        <div class="navbar navbar-default">
            <nav class="navbar navbar-me">
                <div class="container">
                    <div class="nevicatio-menu">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Graphics & Design</a></li>
                                <li><a href="#">Digital Marketing</a></li>
                                <li><a href="#">Writing & Translation</a></li>
                                <li><a href="#">Video & Animation</a></li>
                                <li><a href="#">Music & Audio</a></li>
                                <li><a href="#">Programming & Tech</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Fun & Lifestyle</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="pull-left">Post A Request To The Seller Community</h3>    
                </div>
                <div class="col-md-12">
                    <div class="form-post-request">
                        
                        <div class="form-row post-request-describe js-pr-describe cf">
            <label for="request[message]">
                    Describe the service you're looking to purchase - please be as detailed as possible:
            </label>
            <div class="input-wrap write-wrap request-desc m-b-30 cf">
                <textarea name="request[message]" class="js-br-description" placeholder="I'm looking for..." maxlength="2500"></textarea>
                <div class="char-count"><em>0</em> / 2500 Chars Max</div>
                <div class="attach-files">
                    <div class="attach-inner">
                        <div id="uploadifive-req-new-fileInput" class="uploadifive-button default btn-standard btn-white-grad btn-attach-files js-btn-attach-file" style="height: auto; overflow: hidden; position: relative; text-align: center; width: auto;">Attach File<input type="file" id="req-new-fileInput" class="inp-uploadify" style="display: none;"><input type="file" class="uploadifive-input" style="opacity: 0; position: absolute; right: -3px; top: -3px; z-index: 999;"></div>
                    </div>
                    <small class="attach-limit">Max Size 30MB</small>
                    <div id="req-new-fileInput-queue" class="uploadifyQueue js-uploadifyQueue"></div>
                    <input type="hidden" name="request[attachment][path]">
                    <input type="hidden" name="request[attachment][name]">
                    <input type="hidden" name="request[attachment][size]">
                </div>
                <div class="error-container js-br-desc-err"><p class="msg-error">Please enter at least 20 characters for your description.</p></div>
            </div>
            <aside class="post-request-tooltip">
                <figure>
                    <h3 class="p-t-10"><span class="fa fa-lightbulb-o"></span>Define in Detail</h3>
                    <p>Include all the necessary details needed to complete your request.</p>
                    <p class="example"><span>For example: </span>if you are looking for a logo, you can specify your company name, business type, preferred<br>color, etc.</p>
                </figure>
            </aside>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $("#maraction").click(function () {
        $("#offer-show").addClass("offer-div");
        $(".dashboard-rights-section").removeClass("offer-div");
    });
</script>
@endsection