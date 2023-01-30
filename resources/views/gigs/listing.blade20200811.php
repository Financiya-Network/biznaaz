@extends('layouts.dashboard')
@section('content')
<div class="main_dashboard" id="backtotop">
    @include('elements.topcategories')
    <section class="dashboard-section">
        <div class="container">
            {{ Form::open(array('method' => 'post', 'id' => 'searchform')) }}
            <div class="top-headers">
                <h2>
                    @if(isset($catInfo) && !empty($catInfo))
                        <a href="{{URL::to( 'gigs')}}">Gigs</a> > 
                        {{$catInfo->name}}
                    @else  
                        Refine Result
                    @endif                    
                </h2>
                <div class="sortby">
                    <label>Sort by</label>
                    <div class="market-select"> 
                        <span>
                            <?php global $searcFilterArray; ?>
                            {{Form::select('filter_type', $searcFilterArray, null, ['class' => 'form-control', 'onchange'=>'updateresult()'])}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row-listing">
                @include('elements.gigs.filters')
                <div class="right_listing">
                    <div class="searchloader displaynone" id="searchloader">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                    <div class="loadgigs" id="loadgigs">
                        @include('elements.gigs.listing')
                    </div>
                </div>   
            </div>
            <input type="hidden" value="1" id="pageidd" name="page"> 
            {{ Form::close()}}
        </div>
    </section>
</div>

<script> 
    $(document).ready(function () {
        
        $(".deltime").click('change', function (event) {
            updateresult ();
        });
        $(".deltimesub").click('change', function (event) {
            updateresult ();
        });
        $(".langg").click('change', function (event) {
            updateresult ();
        });
        $(document).on('click', '.ajaxpagee a', function () {
            
            var npage = $(this).html();
            if ($(this).html() == '»') {
                npage = $('.ajaxpagee .active').html() * 1 + 1;
            } else if ($(this).html() == '«') {
                npage = $('.ajaxpagee .active').html() * 1 - 1;
            }
            $('#pageidd').val(npage);
            updateresult ();
            return false;
        });
        
        $(".numbrreg").keypress(function (event) {
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault(); //stop character from entering input
            }
        });
    });
    function applyfilter(){ 
       // updateresult()
    }
    
    function updateresult(){ 
        var thisHref = $(location).attr('href');
        $.ajax({
            url: thisHref,
            type: "POST",
            data: $('#searchform').serialize(),
            beforeSend: function () { $("#searchloader").show();},
            complete: function () {$("#searchloader").hide();},
            success: function (result) {
               $('#loadgigs').html(result);
            }
        });
    }  
    
    function clearfilter(){
        window.location.href = window.location.protocol;
    }
    
</script>

@endsection