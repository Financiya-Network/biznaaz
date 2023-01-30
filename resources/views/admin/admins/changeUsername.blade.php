@extends('layouts.admin')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $("#adminForm").validate();
    });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Change Username</h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('admin/admins/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-cogs"></i> Configuration</a></li>
            <li class="active">Change Username</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">&nbsp;</h3>
            </div>
            <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
            {{ Form::open(array('method' => 'post', 'id' => 'adminForm', 'class' => 'form form-signin')) }}
            <div class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Current Username <span class="require"></span></label>
                        <div class="col-sm-10">
                            {{Form::text('old_username', $adminInfo->username, ['class'=>'form-control required', 'placeholder'=>'Username', 'autocomplete' => 'off', 'readonly'=>true])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">New Username <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('new_username', null, ['class'=>'form-control required', 'placeholder'=>'New Username', 'autocomplete' => 'off', 'id'=>'newusername'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Confirm Username <span class="require">*</span></label>
                        <div class="col-sm-10">
                            {{Form::text('confirm_username', null, ['class'=>'form-control required', 'placeholder'=>'Confirm Username', 'autocomplete' => 'off', 'equalTo' => '#newusername'])}}
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