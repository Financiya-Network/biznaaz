@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Manage Gigs
                @if($allrecords->isEmpty())
                <a href="{{ URL::to( 'gigs/create')}}" class="btn btn-primary">Create a new gig</a>
                @endif
            </div>

            <div>
                {{ Form::open(array('method' => 'post', 'id' => 'gigmanagementform')) }}
                <!-- Nav tabs -->
                <div class="managment-tab-box">
                    <ul class="nav nav-managment-tabs" role="tablist">
                        <li role="presentation" class=""><a href="#allproduct" aria-controls="allproduct" role="tab" data-toggle="tab" class="active">All</a></li>
                        <li role="presentation"><a href="#activeproduct" aria-controls="activeproduct" role="tab" data-toggle="tab">Active</a></li>
                        <li role="presentation"><a href="#draft" aria-controls="draft" role="tab" data-toggle="tab">Draft</a></li>
                        <li role="presentation"><a href="#paused" aria-controls="paused" role="tab" data-toggle="tab">Paused</a></li>
                    </ul>
                    <div class="hedeweek"> <?php //print_r($userdata->hide_weekend);exit; ?>
                        <?php
                        if ($userdata->hide_weekend == 1) {
                            $selectH = "checked='checked'";
                        } else {
                            $selectH = "";
                        }
                        ?>
                        <span class="toptoltip">Enable this option if you are not able to work on weekends. Your quotes will be automatically hidden from the catalog from 18:00 Friday to 8:00 Monday (GMT). It will not be possible to order your Gigs at this time.</span>
                        <input type="checkbox" id="hideweek"  value="1" name="hide_week" onclick="updateconh()" <?php echo $selectH; ?>>
                        <label class="in-label" for="hideweek">Hide weekend gigs</label>
                    </div>
                    <div class="appept-orders">
                        <?php
                        $clsB = '';
                        $clsA = '';
                        if ($userdata->accept_orders == 1) {
                            $selectA = "checked='checked'";
                            $clsB = 'active_cls';
                            
                        } else {
                            $selectA = "";
                            
                            $clsA = 'active_cls';
                        }
                        
                        ?>
                        <b class='busy_chk <?php echo $clsB;?>'>Busy</b>
                        
                        <p class="onoff">
                            <input type="checkbox" name="accept_order" value="1" id="checkboxID" <?php echo $selectA; ?>>
                            <label for="checkboxID"></label>
                            <span class="toptoltip">You can pause the sale of all Gigs. Gigs will disappear from the ranking, but direct links will work and your customers will be able to pre-order within 30 days and receive notifications when Gig is available again.</span>
                        </p>
                        <span class='accept_chk <?php echo $clsA;?>'>I accept orders</span>
                    </div>
                </div>
                <!-- Tab panes -->
                <input type="hidden" value="" id="id_fil" name="id_fil">
                <input type="hidden" value="{{isset($userdata)?$userdata->accept_orders:0}}" id="accept_orders" name="accept_orders">
                <input type="hidden" value="0" id="hide_weekend" name="hide_weekend">
                
                <div class="tab-content" id="mng_gig">
                    
                                    @include('elements.gigs.management')
                                
                    
                    
                </div>
                {{ Form::close()}}

            </div>


        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('#checkboxID').click(function(){
            var isChecked = $("#checkboxID").is(":checked");
            if (isChecked) {    
                $('#accept_orders').val('1');
                $('.busy_chk').removeClass('active_cls');
                $('.accept_chk').addClass('active_cls');
            } else { 
                $('#accept_orders').val('0');
                $('.accept_chk').addClass('active_cls');
                $('.busy_chk').removeClass('active_cls');
            }
            updaterecords();
        });
    });
    
    function filterrequest() {
        $('#buyerpage').val('1')
        updaterecords();
    }


    function updatecon2(id) {        
        $('#id_fil').val(id);
        updaterecords();
    }
    
    function updatecon1(id) {        
        $('#id_fil').val(id);
        updaterecords();
    }
    
    
    function updatecon(id) {
        updaterecords();
    }
    
    function updateconh(id) {
        updaterecords();
    }

    function gigloadmore() {
        $('#gigpage').val($('#gigpage').val() * 1 + 1 * 1);
        updaterecords();
    }

    function updaterecords() {
        $.ajax({
            url: "{!! HTTP_PATH !!}/gigs/management",
            type: "POST",
            data: $('#gigmanagementform').serialize(),
            beforeSend: function () {
                $("#loaderID").show();
            },
            complete: function () {
                $("#loaderID").hide();
            },
            success: function (result) {
                if ($('#gigpage').val() == 1) {
                    $('#mng_gig').html(result);
                    $('#id_fil').val('');
                } else {
                    $('#mng_gig').append(result);
                    $('#id_fil').val('');
                }
            }
        });
    }
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).ready(function () {
        $(".maraction").click(function () {
            thisid = this.id;
            var id = thisid.split('-');
            $("#offer-show-" + id[1]).addClass("offer-div");
//            $(".dashboard-rights-section").removeClass("offer-div");
        });
        $(".clsstng").click(function () {
            thisid = this.id;
            var id = thisid.split('-');
            $("#offer-show-" + id[1]).removeClass("offer-div");
        });
    });
</script>
@endsection