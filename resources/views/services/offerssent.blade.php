@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
   <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">Sent Offers <a href="{{ URL::to( 'services/create-request')}}" class="btn btn-primary">Post a Request</a></div>
            <div class="management-bx">
                <div class="ee er_msg">@include('elements.errorSuccessMessage')</div>
                <div class="management-bx-over">
                    <div class="m_content" id="listID">
                        @include('elements.services.offerssent')
                    </div>                   
                </div>
            </div>
        </div>
    </section>
</div>
@endsection