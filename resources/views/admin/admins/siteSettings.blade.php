@extends('layouts.admin')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#adminForm").validate();
        
        $( "#admin_commission" ).keyup(function() {
  var admin_commission = this.value;
  var commission_admin = $('#commission_admin').val();
  
  var final_commission = parseFloat(commission_admin)+parseFloat(admin_commission);
  
  $('#final_commission').val(final_commission);
});

$( "#commission_admin" ).keyup(function() {
  var admin_commission = $('#admin_commission').val();
  var commission_admin = this.value;;
  
  var final_commission = parseFloat(commission_admin)+parseFloat(admin_commission);
  
  $('#final_commission').val(final_commission);
});
    });
    
    



</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Site Settings</h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('admin/admins/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-cogs"></i> Configuration</a></li>
            <li class="active">Manage Site Settings</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Site Information</h3>
            </div>
            <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
            {{Form::model($recordInfo, ['method' => 'post', 'id' => 'adminForm', 'enctype' => "multipart/form-data"]) }}  
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Site Title <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('site_title', null, ['class'=>'form-control required', 'placeholder'=>'Site title', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tag Line <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('tag_line', null, ['class'=>'form-control', 'placeholder'=>'Tag line', 'autocomplete' => 'off'])}}
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Company Name <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('company_name', null, ['class'=>'form-control required', 'placeholder'=>'Company name', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contact Number <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('contact_number', null, ['class'=>'form-control required', 'placeholder'=>'Contact number', 'autocomplete' => 'off', 'minlength' => 8, 'maxlength' => 16])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contact Email <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('contact_email', null, ['class'=>'form-control required email', 'placeholder'=>'Contact email', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Company Address <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::textarea('address', null, ['class'=>'form-control required', 'placeholder'=>'Enter your company address', 'autocomplete' => 'off', 'rows'=>4])}}
                        </div>
                    </div>
<div class="form-group">
                        <label class="col-sm-2 control-label">Home Logo <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::file('home_logo', ['class'=>'form-control', 'accept'=>'image/png'])}}
                            <span class="help-text"> Supported File Types: png (Max. 2MB) (Best view:183 x 46px)</span>
                            @if($recordInfo->home_logo != '')
                               <div>{{HTML::image(LOGO_IMAGE_DISPLAY_PATH.$recordInfo->home_logo, SITE_TITLE,['style'=>"max-width: 200px"])}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Logo <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::file('logo', ['class'=>'form-control', 'accept'=>'image/png'])}}
                            <span class="help-text"> Supported File Types: png (Max. 2MB) (Best view:183 x 46px)</span>
                            @if($recordInfo->logo != '')
                               <div>{{HTML::image(LOGO_IMAGE_DISPLAY_PATH.$recordInfo->logo, SITE_TITLE,['style'=>"max-width: 200px"])}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Favicon Icon <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::file('favicon', ['class'=>'form-control', 'accept'=>'image/png'])}}
                            <span class="help-text"> Supported File Types: png (Max. 50KB)</span>
                            @if($recordInfo->favicon != '')
                               <div>{{HTML::image(LOGO_IMAGE_DISPLAY_PATH.$recordInfo->favicon, SITE_TITLE)}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="box-header with-border"><h3 class="box-title">Social Links</h3></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Facebook Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('facebook_link', null, ['class'=>'form-control url', 'placeholder'=>'Facebook link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Twitter Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('twitter_link', null, ['class'=>'form-control url', 'placeholder'=>'Twitter link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Google+  Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('google_link', null, ['class'=>'form-control url', 'placeholder'=>'Google+ link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Instagram  Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('instagram_link', null, ['class'=>'form-control url', 'placeholder'=>'Instagram link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Linkedin  Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('linkedin_link', null, ['class'=>'form-control url', 'placeholder'=>'Linkedin link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pinterest  Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('pinterest_link', null, ['class'=>'form-control url', 'placeholder'=>'Pinterest link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Youtube  Link <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('youtube_link', null, ['class'=>'form-control url', 'placeholder'=>'Youtube link', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="box-header with-border"><h3 class="box-title">Paypal Settings</h3></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Payment Mode <span class="require"></span></label>
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <?php 
                                $chk0 = $chk1 = '';
                                if($recordInfo->payment_mode == 1){
                                    $chk1 = 'checked';
                                }else{
                                    $chk0 = 'checked';
                                }?>
                                <div class="radd"> 
                                    <input name="payment_mode" type="radio" value="0" <?php echo $chk0;?>>
                                    <!--{!! Form::radio('payment_mode', 0, $recordInfo->payment_mode) !!}-->
                                    <span>Sandbox</span> </div>
                                <div class="radd"> 
                                    <input name="payment_mode" type="radio" value="1" <?php echo $chk1;?>>
                                    <!--{!! Form::radio('payment_mode', 1, $recordInfo->payment_mode) !!}-->
                                    <span>Live</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Paypal Email Address <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('paypal_email_address', null, ['class'=>'form-control email required', 'placeholder'=>'Paypal email address', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Paypal API Username <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('api_username', null, ['class'=>'form-control required', 'placeholder'=>'Paypal API Username', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Paypal API Password <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('api_password', null, ['class'=>'form-control required', 'placeholder'=>'Paypal API Password', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Paypal API Signature <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('api_signature', null, ['class'=>'form-control required', 'placeholder'=>'Paypal API Signature', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="box-header with-border"><h3 class="box-title">Commission</h3></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Service Fee Deduction <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('admin_commission', null, ['id'=>'admin_commission','class'=>'form-control', 'placeholder'=>'Service Fee Deduction', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tax Deduction <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('commission_admin', null, ['id'=>'commission_admin','class'=>'form-control', 'placeholder'=>'Taxe Deduction', 'autocomplete' => 'off'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Final Deduction <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('final_commission', null, ['id'=>'final_commission','class'=>'form-control', 'placeholder'=>'Final Deduction', 'autocomplete' => 'off','readonly'])}}
                        </div>
                    </div>
                    @if(IS_DEMO == 0)
                        <div class="box-footer">
                            <label class="col-sm-2 control-label" for="inputPassword3">&nbsp;</label>
                            {{Form::submit('Submit', ['class' => 'btn btn-info'])}}
                            <a href="{{URL::to('admin/admins/dashboard')}}" class="btn btn-default canlcel_le">Cancel</a>
                        </div>
                    @else
                         <blockquote> You are not allowed to update above information, because it's a demo of this product. Once we deliver code to you, you'll be able to update this information. </blockquote>
                    @endif
                </div>
            </div>
            {{ Form::close()}}
        </div>
    </section>
</div>
@endsection