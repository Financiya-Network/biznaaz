<div class="admin_loader" id="loaderID">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
@if(!$allrecords->isEmpty())
    <div class="panel-body marginzero">
        <div class="ersu_message">@include('elements.admin.errorSuccessMessage')</div>
        {{ Form::open(array('method' => 'post', 'id' => 'actionFrom')) }}
            <section id="no-more-tables" class="lstng-section">
                <div class="topn">
                    <div class="topn_left">Transaction History</div>
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
                            <th class="sorting_paging">@sortablelink('created_at', 'Date')</th>
                            <th class="sorting_paging">Source</th>
                            <th class="sorting_paging">Transaction ID</th>
                            <th class="sorting_paging">Status</th>
                            <th class="sorting_paging">Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allrecords as $allrecord)
                            <tr>
                                <td data-title="Date">{{$allrecord->created_at->format('M d, Y')}}</td>
                                <td data-title="Name">{!! $allrecord->source !!}</td>
                                <td data-title="Name">
                                    @if($allrecord->status == 1)
                                        {{$allrecord->trn_id}}
                                    @endif
                                </td>
                                <td data-title="Name">
                                    @if($allrecord->status == 0)
                                        Pending
                                    @elseif($allrecord->status == 1)
                                        Approved
                                    @else 
                                        Rejected
                                    @endif
                                </td>
                                <td data-title="Name">
                                    @if($allrecord->type == 4)
                                        <span class="">- {{CURR.number_format(-$allrecord->revenue, 2)}}</span>  
                                    @elseif($allrecord->revenue < 0)
                                        <span class="amt_nt">- {{CURR.number_format(-$allrecord->revenue, 2)}}</span>  
                                    @else 
                                        <span class="amt_add">+ {{CURR.number_format($allrecord->revenue, 2)}}</span>  
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