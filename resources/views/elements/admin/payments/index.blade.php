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
                    <div class="topn_left">PayPal Payment Histories List</div>
                    <div class="topn_rightd ddpagingshorting" id="pagingLinks" align="right">
                        <div class="panel-heading" style="align-items:center;">
                            {{$allrecords->appends(Input::except('_token'))->render()}}
                        </div>
                    </div>                
                </div>
                <div class="tbl-resp-listing">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf ddpagingshorting heafboldd">
                        <tr>
                            <th class="sorting_paging">Buyer Name</th>
                            <th class="sorting_paging">Payment For</th>
                            <th class="sorting_paging">Transaction ID</th>
                            <th class="sorting_paging">Amount</th>
                            <th class="sorting_paging">Status</th>
                            <th class="sorting_paging">Date</th>
                            <th class="action_dvv"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allrecords as $allrecord)
                            <tr>
                                <td data-title="Name">{{ isset($allrecord->User->first_name) ? $allrecord->User->first_name.' '.$allrecord->User->last_name : '' }}</td>
                                <td data-title="Payment For">
                                    @if(isset($allrecord->Gig))
                                        {{ str_limit($allrecord->Gig->title, $limit = 45, $end = '...') }} (Gig)
                                    @elseif(isset($allrecord->Service))
                                        {{ str_limit($allrecord->Service->title, $limit = 45, $end = '...') }} (Request)
                                    @endif
                                </td>
                                <td data-title="Transaction ID">{{$allrecord->transaction_id}}</td>
                                <td data-title="Amount">{{CURR.$allrecord->amount}}</td>
                                <td data-title="Status">
                                    @if($allrecord->status)
                                        Completed
                                    @else
                                        Pending
                                    @endif    
                                </td>
                                <td data-title="Date">{{$allrecord->created_at->format('d M, Y')}}</td>
                                <td data-title="Action">
                                    <a href="#info{!! $allrecord->id !!}" title="View Offer Details" class="btn btn-primary btn-xs" rel='facebox'><i class="fa fa-eye"></i></a>
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


@if(!$allrecords->isEmpty())
    @foreach($allrecords as $allrecord)
        <div id="info{!! $allrecord->id !!}" style="display: none;">
            <div class="nzwh-wrapper">
                <fieldset class="nzwh">
                    <legend class="head_pop">#{!! $allrecord->transaction_id !!}</legend>
                    <div class="drt">
                    <div class="admin_pop"><span>Buyer Name: </span>  <label>{{ isset($allrecord->User->first_name) ? $allrecord->User->first_name.' '.$allrecord->User->last_name : '' }}</label></div>
                        <div class="admin_pop"><span>Payment For: </span>  <label>
                            @if(isset($allrecord->Gig))
                                {{ str_limit($allrecord->Gig->title, $limit = 45, $end = '...') }} (Gig)
                            @elseif(isset($allrecord->Service))
                                {{ str_limit($allrecord->Service->title, $limit = 45, $end = '...') }} (Request)
                            @endif
                        </label>
                        </div>
                    <div class="admin_pop"><span>Transaction ID: </span>  <label>{{$allrecord->transaction_id}}</label></div>
                    <div class="admin_pop"><span>Amount: </span>  <label>{{CURR.$allrecord->amount}}</label></div>
                    <div class="admin_pop"><span>Status: </span> 
                        <label> @if($allrecord->status)
                                        Completed
                                    @else
                                        Pending
                                    @endif  
                        </label>
                    </div>
                    <div class="admin_pop"><span>Date: </span>  <label>{{$allrecord->created_at->format('d M, Y')}}</label></div>
                    
                </fieldset>
            </div>
        </div>
    @endforeach
@endif