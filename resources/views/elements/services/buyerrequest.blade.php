@if(!$allrecords->isEmpty())
    @if($page == 1)
        <div class="management-bx-over">
            <div class="management-table management-table-left" id="buyer_reqappend">
                <div class="management-table-tr">
                    <div class="management-table-th">Date</div>
                    <div class="management-table-th">Buyer</div>
                    <div class="management-table-th">Request</div>
                    <div class="management-table-th">Offers</div>
                    <div class="management-table-th">Duration</div>
                    <div class="management-table-th">Budget</div>
                </div>
                 @endif
                <?php global $serviceDays; ?>
                @foreach($allrecords as $allrecord)
                <div class="management-table-tr">
                    <div class="management-table-td">{{$allrecord->created_at->format('d M, Y')}}</div>
                    <div class="management-table-td">
                        <div class="buyer-img">
                        @if(isset($allrecord->User->profile_image))
                            {{HTML::image(PROFILE_SMALL_DISPLAY_PATH.$allrecord->User->profile_image, SITE_TITLE,['style'=>"max-width: 60px"])}}
                        @else
                            {{HTML::image('public/img/front/user-img.png', SITE_TITLE,['style'=>"max-width: 60px"])}}
                        @endif
                        </div>
                    </div>
                    <div class="management-table-td management-table-td-fixed">
                        <a href="{{ URL::to( 'buyer-requests/'.$allrecord->slug)}}" class="">{{$allrecord->title}}</a>
                        <p>{{ str_limit($allrecord->description, $limit = 200, $end = '...') }}</p>
                    </div>
                    <div class="management-table-td">
                        {{count($allrecord->Servicesoffer)}}
                        
               </div>
                    <div class="management-table-td">{{$serviceDays[$allrecord->day]}}</div>
                    <div class="management-table-td">{{CURR.$allrecord->price}}</div>
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