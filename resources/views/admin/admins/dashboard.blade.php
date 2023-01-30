@extends('layouts.admin')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Dashboard</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$dadhboardData['users_count']}}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{URL::to( 'admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$dadhboardData['gig_count']}}</h3>
                        <p>Gigs</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <a href="{{URL::to( 'admin/gigs')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$dadhboardData['payment_count']}}</h3>
                        <p>Payments</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="{{URL::to( 'admin/paypal-payment-histories')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$dadhboardData['myorder_count']}}</h3>
                        <p>Gig Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <a href="{{URL::to( 'admin/vieworders')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$dadhboardData['services_count']}}</h3>
                        <p>Services</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sellsy"></i>
                    </div>
                    <a href="{{URL::to( 'admin/services')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$dadhboardData['categoryies_count']}}</h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <a href="{{URL::to( 'admin/categories')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$dadhboardData['skills_count']}}</h3>
                        <p>Skills</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="{{URL::to( 'admin/skills')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$dadhboardData['qualifications_count']}}</h3>
                        <p>Qualifications</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list"></i>
                    </div>
                    <a href="{{URL::to( 'admin/qualifications')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <h4 class="admin_st">Users Statistics</h2>
                    <div class="relative_box_esjad">
                        <div class="company_tab">
                            <span class="cpc" id="cchart0" onclick="updateUser(0)">Today</span>
                            <span class="cpc" id="cchart1"  onclick="updateUser(1)">Yesterday</span>
                            <span class="cpc active" id="cchart4"  onclick="updateUser(4)">Last 7 days</span>
                            <span class="cpc active" id="cchart2"  onclick="updateUser(2)">Last 30 days</span>                            
                            <span  class="cpc" id="cchart3" onclick="updateUser(3)">Last 12 months</span>
                        </div>
                        <div class="chart_loader" id="user_chart_loader">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                        <div class="admin_chart" id="user_chart"></div>
                    </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {
        updateUser(2);
    });
    function updateUser(daycnt) {
        $('.cpc').removeClass('active');
        $('#cchart' + daycnt).addClass('active');
        $.ajax({
            type: 'get',
            url: '{{HTTP_PATH}}/admin/admins/userchart/' + daycnt,
            beforeSend: function () {
                $("#user_chart_loader").show();
            },
            success: function (result) {
                $("#user_chart").html(result);
            }
        });
    }
</script>
@endsection