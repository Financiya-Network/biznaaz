@extends('layouts.dashboard')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#requestform").validate();
    });
    
    function postform(){
        if($("#requestform").valid()){
            $('#ddbuton').hide();
            $('#btnloader').show();
            $("#requestform").submit();
        }
    }
 </script>
<div class="main_dashboard">
    @include('elements.topcategories')
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="pull-left topcreate">Edit you service request</h3>    
                </div>
                {{Form::model($recordInfo, ['method' => 'post', 'id' => 'requestform', 'enctype' => "multipart/form-data"]) }}
                <div class="col-md-12">
                    <div class="form-post-request">
                        <div class="ee er_msg postfrm">@include('elements.errorSuccessMessage')</div>
                        <div class="form-row post-request-describe js-pr-describe cf titlebox">
                            <label for="request[message]">
                                Title for your service
                            </label>
                            <div class="input-wrap write-wrap request-desc m-b-30 cf select_row">
                                {{Form::text('title', null, ['class'=>'form-control required', 'placeholder'=>'Title', 'autocomplete' => 'off'])}}
                            </div>
                            <aside class="post-request-tooltip titleboxhover">
                                <figure>
                                    <div class="icn"><i class="fa fa-lightbulb-o"></i></div>
                                    <h3>Title for your service</h3>
                                    <p>Give best suitable title for you service request, so that seller can easily understand your request.</p>
                                </figure>
                            </aside>
                        </div>


                        <div class="form-row post-request-describe js-pr-describe cf textareahover">
                            <label for="request[message]">
                                Describe the service in detail as possible
                            </label>
                            <div class="input-wrap write-wrap request-desc m-b-30 cf select_row textarea ">
                                {{Form::textarea('description', null, ['class'=>'js-br-description required', 'placeholder'=>"I'm looking for...", 'autocomplete' => 'off', 'rows'=>5, 'id'=>'description'])}}
<!--                                <div class="char-count"><em>0</em> / 2500 Characters Max</div>-->
                            </div>
                            <aside class="post-request-tooltip textareahoverbox">
                                <figure>
                                    <div class="icn"><i class="fa fa-lightbulb-o"></i></div>
                                    <h3>Describe service</h3>
                                    <p>Please describe your service request as much as possible to get best offer.</p>
                                </figure>
                            </aside>
                        </div>

                        <div class=" input-wrap write-wrap request-desc m-b-30 cf form-row walletbox">
                            <label for="request[category]">
                                Select a category
                            </label>
                            <div class="select_row wallet">
                                <div class="form-group">
                                    <div class="market-select">
                                        <span>
                                    {{Form::select('category_id', $catList,null, ['class' => 'form-control required','placeholder' => 'Select category', 'onchange'=>'updateSubCategory()', 'id'=>'service_category_id'])}}
                                        </span>
                                    </div>
                                    </div>
                                <div class="catloader" id="catloader">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
                                <div class="form-group" id="subcat">
                                    <div class="market-select">
                                        <span>
                                    {{Form::select('subcategory_id', $subcatList,null, ['class' => 'form-control required','placeholder' => 'Select sub category'])}} 
                                        </span>
                                    </div>
                                    </div>
                            </div>
                            <aside class="post-request-tooltip walletboxhover">
                                <figure>
                                    <div class="icn"><i class="fa fa-lightbulb-o"></i></div>
                                    <h3>Refine your Request</h3>
                                    <p>Select category and sub category suitable for your service request.</p>
                                    <p>These category and sub category considered for searching as seller end.</p>
                                </figure>
                            </aside>
                        </div>
                        <div class=" input-wrap write-wrap request-desc m-b-30 cf form-row hours">
                            <label >
                                Once you place your order, when would you like your service delivered?
                            </label>
                            <div class="select_row hours">
                                <?php 
                                    global $serviceDays; 
                                    $dd = 2;
                                    if($recordInfo->day){
                                        $dd = $recordInfo->day;
                                    }
                                ?> 
                                @foreach($serviceDays as $key=>$val)
                                    <span id="d{{$key}}" class="dddset btn btn-default @if($key == $dd) active @endif"  onclick="setday({{$key}})" >{{ $val }}</span>
                                @endforeach
                                {{Form::hidden('day', null, ['class'=>'required', 'id' => 'dayid', 'value'=>$dd])}}
                            </div>
                            
                            <aside class="post-request-tooltip hourshover">
                                <figure>
                                    <div class="icn"><i class="fa fa-lightbulb-o"></i></div>
                                    <h3>Set a Delivery Time</h3>
                                    <p>This is the amount of time the seller has to work on your order. Please note that a request for faster delivery may impact.</p>
                                </figure>
                            </aside>
                        </div>
                        <div class=" input-wrap write-wrap request-desc m-b-30 cf form-row ">
                            <label >
                                What is your budget for this service? (Optional)
                            </label>
                            <div class="select_row opion">
                                {{Form::text('price', null, ['class'=>'form-control optional deigits', 'min'=>5, 'placeholder' => CURR.'5 minimum'])}}
                            </div>
                        </div>
                        <div class=" input-wrap write-wrap request-desc m-b-30 cf form-row ">
                            <label >
                                Upload attachment? (Optional)
                            </label>
                            <div class="select_row image">
                                {{Form::file('attachment', ['class'=>'form-control', 'accept'=>IMAGE_EXT.' ,application/pdf, application/msword, text/plain'])}}
                                <span class="help-text"> Supported File Types: jpg, jpeg, png, doc, docx, pdf  (Max. {{ MAX_IMAGE_UPLOAD_SIZE_DISPLAY }}).</span>
                                @if($recordInfo->attachment != '' && file_exists(SERVICE_FULL_UPLOAD_PATH.$recordInfo->attachment))
                                    @php 
                                        $fnameArray =  explode('.', $recordInfo->attachment);
                                        $imgext = array_pop($fnameArray);
                                        $extArray = array('jpg', 'jpeg', 'png');
                                    @endphp   
                                    @if(in_array($imgext, $extArray))
                                        <div class="showeditimage">{{HTML::image(SERVICE_FULL_DISPLAY_PATH.$recordInfo->attachment, SITE_TITLE,['style'=>"max-width: 200px"])}}</div>
                                    @else
                                        <div class="showeditimage"> <a download href="{{SERVICE_FULL_DISPLAY_PATH.$recordInfo->attachment}}"> {{substr($recordInfo->attachment, 9)}}</a></div>
                                    @endif
                                @endif

                            </div>
                        </div>
                        <div class=" input-wrap write-wrap request-desc m-b-30 cf form-row text-right ">
                            <a href="{{ URL::to( 'services/management')}}" title="Cancel" class="btn btn-default canlcel_le">Cancel</a>
                            <button id="ddbuton" type="button" class="btn btn-primary postbtn" onclick="postform()">Post</button>
                            <div class="btnloader" id="btnloader">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div>
                        </div>
                    </div>

                </div>
                {{ Form::close()}}
            </div>
        </div>
</div>
</section>
</div>
<script>
    function setday(day){
        $('.dddset').removeClass('active');
        $('#d'+day).addClass('active');
        $('#dayid').val(day);
    }
    function updateSubCategory(){
        $.ajax({
            url: "{!! HTTP_PATH !!}/services/updatesubcategory/"+$('#service_category_id').val(),
            type: "GET",
            beforeSend: function () { $("#catloader").show();},
            complete: function () {$("#catloader").hide();},
            success: function (result) {
               $('#subcat').html(result);
            }
        });
    }    
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $("#maraction").click(function () {
        $("#offer-show").addClass("offer-div");
        $(".dashboard-rights-section").removeClass("offer-div");
    });
</script>
@endsection