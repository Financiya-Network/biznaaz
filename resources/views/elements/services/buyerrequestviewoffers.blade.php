@if(!$alloffers->isEmpty())    
        <div class="management-bx-over">
            <div class="management-table management-table-left" id="buyer_reqappend">
                <div class="management-table-tr">
                    <div class="management-table-th">Date</div>
                    <div class="management-table-th">Seller Name</div>
                    <div class="management-table-th">Amount</div>
                    <div class="management-table-th">Deliver In</div>
                    <div class="management-table-th">Revisions</div>
                    <div class="management-table-th">Message</div>
                    <div class="management-table-th">Status</div>
                    <div class="management-table-th">Action</div>
                </div>
                <?php global $offerstatusbuyer;; ?>
                @foreach($alloffers as $allrecord)
                <div class="management-table-tr">
                    <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                    <div class="management-table-td">
                            {{$allrecord->User->first_name.' '.$allrecord->User->last_name}}
                    </div>
                    <div class="management-table-td">{{CURR.$allrecord->amount}}</div>
                    <div class="management-table-td">{{$allrecord->deliver_in}} Days</div>
                    <div class="management-table-td">{{$allrecord->revisions}}</div>
                    <div class="management-table-td">{{$allrecord->message}}</div>
                    <div class="management-table-td">{{$offerstatusbuyer[$allrecord->status]}}</div>
                    <div class="management-table-td">
                        @if($allrecord->status == 0)
                            <a  href="{{URL::to( 'services/acceptandpay/'.$allrecord->slug)}}" class="acttt actreq"  onclick="return confirm('Are you sure you want to Accept this offer?')">Accept</a>
                            <a href="{{URL::to( 'services/acceptrejectoffers/2/'.$allrecord->slug)}}" class="acttt rejreq"  onclick="return confirm('Are you sure you want to Reject this offer?')">Reject</a>
                        @elseif($serviceInfo->status == 5 && $allrecord->status == 1) 
                            <a href="{{ URL::to( 'services/workplace/'.$allrecord->slug)}}" title="View Offer Details" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    
@else
<script>$('#reqloaddiv').hide();</script>
@endif