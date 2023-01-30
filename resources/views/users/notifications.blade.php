@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">My Notifications </div>
            <div class="management-bx">
                <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="management-bx-over">
                    @if(!$allrecords->isEmpty())
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Message</div>
                            <div class="management-table-th">Action</div>
                        </div>
                        @foreach($allrecords as $allrecord)
                            <div class="management-table-tr @if($allrecord->status) unreadd @endif">
                                <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                                <div class="management-table-td">{{$allrecord->message}}</div>
                                <div class="management-table-td">
                                    <a href="{{ URL::to( 'users/delete-notification/'.$allrecord->slug)}}" title="Delete" class="btn btn-primary btn-xs action-list delete-list" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash-o"></i></a>
                                    <a href="{{ URL::to( 'users/view-notification/'.$allrecord->slug)}}" title="View" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                        <div class="management-full">No requests found. </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection