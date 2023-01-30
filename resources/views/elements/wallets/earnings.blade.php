@if(!$allrecords->isEmpty())
    @if($page == 1)
        <div class="management-bx-over">
            <div class="management-table management-table-left" id="buyer_reqappend">
                <div class="management-table-tr">
                    <div class="management-table-th">Date</div>
                    <div class="management-table-th">Source</div>
                    <div class="management-table-th">Transaction ID</div>
                    <div class="management-table-th">Status</div>
                    <div class="management-table-th">Amount</div>
                </div>
                 @endif
                <?php global $serviceDays; ?>
                @foreach($allrecords as $allrecord)
                <div class="management-table-tr">
                    <div class="management-table-td">{{$allrecord->created_at->format('d M, Y h:i A')}}</div>
                    <div class="management-table-td">{!! $allrecord->source !!}</div>
                    <div class="management-table-td">
                        @if($allrecord->status == 1)
                            {{$allrecord->trn_id}}
                        @endif
                    </div>
                    <div class="management-table-td">
                        @if($allrecord->status == 0)
                            Pending
                        @elseif($allrecord->status == 1)
                            Approved
                        @else 
                            Rejected
                        @endif
                    </div>
                    <div class="management-table-td">
                        @if($allrecord->type == 4)
                            <span class="">- {{CURR.number_format(-$allrecord->revenue, 2)}}</span>  
                        @elseif($allrecord->revenue < 0)
                            <span class="amt_nt">- {{CURR.number_format(-$allrecord->revenue, 2)}}</span>  
                        @else 
                            <span class="amt_add">+ {{CURR.number_format($allrecord->revenue, 2)}}</span>  
                        @endif
                    </div>
                </div>
                @endforeach
                @if($page == 1)
            </div>
        </div>
    @endif
    <script>$('#reqloaddiv').show();</script>
@else
@if($page == 1)
    <script>$('#reqloaddiv').hide();</script>
    <div class="management-full">No requests found. </div>
@else
<script>$('#reqloaddiv').hide();</script>
@endif
@endif