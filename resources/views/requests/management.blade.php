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
                <div class="top_row col-md-12">
                    <h3 class="left_title">Manage Requests</h3>
                    <a href="#" class="btn btn-primary">Post a request</a>
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