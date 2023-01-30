@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Manage Requests <a href="{{ URL::to( 'services/create-request')}}" class="btn btn-primary">Post a Request</a></div>
            <div class="management-bx">
                <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="management-bx-over">
                    @if(!$allrecords->isEmpty())
                    <div class="management-table">
                        <div class="management-table-tr">
                            <div class="management-table-th">Date</div>
                            <div class="management-table-th">Request</div>
                            <div class="management-table-th">Offers</div>
                            <div class="management-table-th">Action</div>
                        </div>
                        @foreach($allrecords as $allrecord)
                            <div class="management-table-tr">
                                <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                                <div class="management-table-td">{{$allrecord->title}}</div>
                                <div class="management-table-td">
                                    @if(count($allrecord->Servicesoffer) > 0)
                                        <a href="{{ URL::to( 'buyer-requests-view-offers/'.$allrecord->slug)}}" class="">{{count($allrecord->Servicesoffer)}}</a>
                                    @else
                                        {{count($allrecord->Servicesoffer)}}
                                    @endif
                                </div>
                                <div class="management-table-td">
                                    @if($allrecord->status < 5)
                                        <a href="{{ URL::to( 'services/edit-request/'.$allrecord->slug)}}" title="Edit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ URL::to( 'services/delete-request/'.$allrecord->slug)}}" title="Delete" class="btn btn-danger btn-xs action-list delete-list" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash-o"></i></a>
                                    @else
                                        <a href="{{ URL::to( 'services/workplace/'.$allrecord->serviceoffer_slug)}}" title="Go to Workplace" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                                    @endif
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