@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>{{$userInfo->first_name.' '.$userInfo->last_name}} > Wallet</h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('admin/admins/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{URL::to('admin/wallets')}}"><i class="fa fa-money"></i> <span>Wallet</span></a></li>
            <li class="active"> History</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
            <div class="admin_search">
                <div class="js-db-stats ">
                    <span><small>Net Income</small>{{CURR.number_format($amountArray['netincome'], 2)}}</span>
                    <span><small>Withdrawn</small>{{CURR.number_format(-$amountArray['withdrawn'], 2)}}</span>
                    <span><small>Used for Purchases</small>{{CURR.number_format(-$amountArray['userforpurchase'], 2)}}</span>
                    <span><small>Pending Clearance</small>{{CURR.number_format(-$amountArray['pendingclearance'], 2)}}</span>
                    <span><small>Available for Withdrawal</small>{{CURR.number_format($amountArray['availableforwithdraw'], 2)}}</span>
                    <span><small>Min. Withdraw Amount</small>{{CURR.$siteSettings->minimum_withdraw_amount}}</span>
                </div>
            </div>            
            <div class="m_content" id="listID">
                @include('elements.admin.wallets.history')
            </div>
        </div>
    </section>
</div>
@endsection