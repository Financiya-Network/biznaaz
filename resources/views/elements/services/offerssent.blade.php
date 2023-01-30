@if(!$allrecords->isEmpty())
<div class="management-table">
    <div class="management-table-tr">
        <div class="management-table-th">Date</div>
        <div class="management-table-th">Request Title</div>
        <div class="management-table-th">Budget</div>
        <div class="management-table-th">Offer Amount</div>
        <div class="management-table-th">Deliver In</div>
        <div class="management-table-th">Revisions</div>
        <div class="management-table-th">Status</div>
        <div class="management-table-th">Action</div>
    </div>
    @foreach($allrecords as $allrecord)
    @if(isset($allrecord->Service))
    <div class="management-table-tr">
        <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
        <div class="management-table-td">@if(isset($allrecord->Service->title)){{ str_limit($allrecord->Service->title, $limit = 50, $end = '...') }}@else 
                N/A
            @endif</div>
        <div class="management-table-td">
            @if(isset($allrecord->Service->price) && $allrecord->Service->price > 0)
                {{CURR.number_format($allrecord->Service->price,2)}}
            @else 
                N/A
            @endif
        </div>
        <div class="management-table-td">{{CURR.number_format($allrecord->amount, 2)}}</div>
        <div class="management-table-td">{{$allrecord->deliver_in}} Days</div>
        <div class="management-table-td">{{$allrecord->revisions}}</div>
        <div class="management-table-td">
            @if($allrecord->Service->status == 5 && ($allrecord->status == 0 || $allrecord->status == 2))
                Rejected
            @elseif($allrecord->Service->status == 5 && $allrecord->status == 1)
                Accepted
            @else
                Pending
            @endif
        </div>
        <div class="management-table-td">
            @if($allrecord->Service->status == 5 && $allrecord->status == 1)
                <a href="{{ URL::to( 'services/workplace/'.$allrecord->slug)}}" title="Go to Workplace" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
            @else
                
            @endif
        </div>
    </div>
    @endif
    @endforeach
</div>
@else
<div class="management-full">No requests found. </div>
@endif