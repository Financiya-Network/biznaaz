{{ HTML::script('public/js/facebox.js')}}
{{ HTML::style('public/css/facebox.css')}}
<script type="text/javascript">
    $(document).ready(function ($) {
        $('.close_image').hide();
        $('a[rel*=facebox]').facebox({
            closeImage: '{!! HTTP_PATH !!}/public/img/close.png'
        });
    });
</script>
<div class="admin_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
@if(!$allrecords->isEmpty())
    <div class="panel-body marginzero">
        <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
        {{ Form::open(array('method' => 'post', 'id' => 'actionFrom')) }}
            <section id="no-more-tables" class="lstng-section">
                <div class="topn">
                    <div class="topn_left">Manage Withdraw Requests</div>
                    <div class="topn_rightd ddpagingshorting" id="pagingLinks" align="right">
                        <div class="panel-heading" style="align-items:center;">
                            {{$allrecords->appends(Input::except('_token'))->render()}}
                        </div>
                    </div>                
                </div>
                <div class="tbl-resp-listing">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf ddpagingshorting">
                        <tr>
                            <th class="sorting_paging">@sortablelink('name', 'User Name')</th>
                            <th class="sorting_paging">@sortablelink('amount', 'Amount')</th>
                            <th class="sorting_paging">@sortablelink('trn_id', 'Transaction ID')</th>
                            <th class="action_dvv"> Status</th>
                            <th class="sorting_paging">@sortablelink('created_at', 'Date')</th>                            
                            <th class="action_dvv"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allrecords as $allrecord)
                            <tr>
                                <td data-title="Name">{{isset($allrecord->User)?$allrecord->User->first_name.' '.$allrecord->User->last_name:""}}</td>
                                <td data-title="Amount">{{CURR.number_format(-$allrecord->revenue, 2)}}</td>
                                <td data-title="Transaction ID">
                                    @if($allrecord->status == 1)
                                        {{$allrecord->trn_id}}
                                    @endif
                                </td>
                                <td data-title="Date">
                                    @if($allrecord->status == 0)
                                        Pending
                                    @elseif($allrecord->status == 1)
                                        Approved
                                    @else 
                                        Rejected
                                    @endif
                                </td>
                                <td data-title="Status">{{$allrecord->created_at->format('M d, Y')}}</td>
                                <td data-title="Action">
                                    @if($allrecord->status == 0)
                                    <a href="{{ URL::to( 'admin/wallets/approve-reject/accept/'.$allrecord->slug)}}" title="Approve" class="deactivate"  onclick="return confirm('Are you sure you have transferred the amount?')"><span class="btn btn-success btn-xs"><i class="fa fa-check"></i></span></a>
                                    <a href="{{ URL::to( 'admin/wallets/approve-reject/reject/'.$allrecord->slug)}}" title="Reject" class="activate"  onclick="return confirm('Are you sure you want to reject this record?')"><span class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></span></a>
                                    @endif
                                    @if(isset($allrecord->User))
                                    <a target="_blank" href="{{ URL::to( 'admin/wallets/history/'.$allrecord->User->slug)}}" title="View Wallet History" class="btn btn-primary btn-xs"><i class="fa fa-money"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        {{ Form::close()}}
        </div>         
    </div>
@else 
    <div id="listingJS" style="display: none;" class="alert alert-success alert-block fade in"></div>
    <div class="admin_no_record">No record found.</div>
@endif