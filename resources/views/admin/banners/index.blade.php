@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Banners</h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('admin/admins/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="active"> Manage Banners</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
              <div class="add_new_record"><a href="{{URL::to('admin/banners/add')}}" class="btn btn-default"style="
    margin-top: -24px;
"><i class="fa fa-plus"></i> Add Banner</a></div>   
            <div class="m_content" id="listID">
                @include('elements.admin.banners.index')
            </div>
        </div>
    </section>
</div>
@endsection