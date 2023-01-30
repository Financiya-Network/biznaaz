@extends('layouts.inner')
@section('content')
<div class="main_dashboard">
    <section class="dashboard-section">
        <div class="container">
            <div class="manage-btn">My Saved Gigs</div>
            <div class="dashboard-rights-section">
                <div class="mysavedgig" id="mysavedgig">{{HTML::image("public/img/website_load.svg", SITE_TITLE)}}</div>
                <div class="row pubgig">
                    @if(!$allrecords->isEmpty())
                        @foreach($allrecords as $allrecord)
                        <div class="col-sm-6 col-md-3" id="gigdiv{{$allrecord->id}}">
                                <div class="thumbnail my_savedgig">
                                    <div class="project-img">
                                        <?php
                                        $gigimgname = '';
                                        if ($allrecord->Image) {
                                            foreach ($allrecord->Image as $gigimage) {
                                                if (isset($gigimage->name) && !empty($gigimage->name)) {
                                                    $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                                                    if (file_exists($path) && !empty($gigimage->name)) {
                                                        $gigimgname = GIG_FULL_DISPLAY_PATH . $gigimage['name'];
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        if ($gigimgname == '' && $allrecord->youtube_image) {
                                            if (file_exists(GIG_FULL_UPLOAD_PATH.$allrecord->youtube_image)) {
                                                $gigimgname = GIG_FULL_DISPLAY_PATH . $allrecord->youtube_image;
                                            }
                                        }
                                        if ($gigimgname == '') {
                                            $gigimgname = 'public/img/front/dummy.png';
                                        }
                                        ?>
                                        <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class="">{{HTML::image($gigimgname, SITE_TITLE,['title'=>$allrecord->title])}}</a>
                                    </div>
                                    <div class="caption">
                                        <div class="profilename">
                                            <span class="dp">
                                                @if (file_exists(PROFILE_FULL_UPLOAD_PATH . $allrecord->User->profile_image) && !empty($allrecord->User->profile_image))
                                                    {{HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->User->profile_image, SITE_TITLE)}}
                                                @else
                                                    {{HTML::image('public/img/front/dummy.png', SITE_TITLE)}}
                                                @endif
                                            </span>
                                            <span class="dpname"><a href="{{ URL::to( 'public-profile/'.$allrecord->User->slug)}}">{{$allrecord->User->first_name.' '.$allrecord->User->last_name}}</a></span>
                                        </div>
                                        <h3><a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}">{{ $allrecord->title}} </a></h3>
                                        <div class="rating-badges-container">
                                            @if($allrecord->User->average_rating > 0)
                                                <span class="review"><i class="fa fa-star"></i> {{ $allrecord->User->average_rating}} <b>({{ $allrecord->User->total_review}})</b></span>
                                            @else 
                                                <span class="review"><i class="fa fa-star-o"></i> {{ $allrecord->User->average_rating}} <b>({{ $allrecord->User->total_review}})</b></span>
                                            @endif
                                        </div>
                                        <div class="bottom_row">
                                            <span class="liremoave" onclick="removesavedgig({{$allrecord->id}})">Remove</span>
                                            <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class="amount_list">{{$allrecord->basic_price}}+</a>
                                        </div>
                                    </div>                                            
                                </div>
                            </div>
                        @endforeach
                    @else 
                    <div class="col-md-12"><div class="management-full">No record found.</div></div>
                    @endif
                </div>                      
            </div>
        </div>
    </section>
</div>
<script>
function removesavedgig(gid){
    if(confirm('Are you sure you want to remove Gig from saved Gigs?') == true){
        $.ajax({
            url: "{!! HTTP_PATH !!}/users/deletelikeunlike",
            type: "POST",
            data: {'gid': gid, _token: '{{csrf_token()}}'},
            beforeSend: function() {$('#mysavedgig').show();},
            complete: function() {$('#mysavedgig').hide();},
            success: function (result) {
               $('#gigdiv'+gid).remove();
            }
        });
    }    
}
</script>
@endsection