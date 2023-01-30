
@if(isset($allrecord->User->slug))
<div class="list_box searchlist">
    <div class="images_list">
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
                $gigimgname = HTTP_PATH.'/public/img/front/dummy.png';
            }
        ?>
        <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class=""><img class="lazy" src="{{HTTP_PATH}}/public/img/loading2.gif" data-original="{{$gigimgname}}"></a>
    </div>    
    <div class="bottom_box">
        <div class="profilename">
            <span class="dp">
                <?php //echo '<pre>';print_r($allrecord->User->profile_image); ?>
                @if (isset($allrecord->User->profile_image))
                @if (file_exists(PROFILE_FULL_UPLOAD_PATH . $allrecord->User->profile_image) && !empty($allrecord->User->profile_image))
                    {{HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->User->profile_image, SITE_TITLE)}}
                @else
                    {{HTML::image('public/img/front/dummy.png', SITE_TITLE)}}
                @endif
                @endif
            </span>
            <span class="dpname"><a href="{{ URL::to( 'public-profile/'.$allrecord->User->slug)}}">{{$allrecord->User->first_name.' '.$allrecord->User->last_name}}</a></span>
        </div>
        <div class="list_con">
            <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}">{{ mb_substr($allrecord->title,0,40)}} </a>
        </div>
        <div class="rating-badges-container">
            <span class="review"><i class="fa fa-star"></i> {{ $allrecord->User->average_rating}} <b>({{ $allrecord->User->total_review}} reviews)</b></span>
        </div>
        <div class="bottom_row">
            @include('elements.likeunlike', ['gid'=>$allrecord->id])
            <a href="{{ URL::to( 'gig-details/'.$allrecord->slug)}}" class="amount_list">${{$allrecord->basic_price}}</a>
        </div>
    </div>
</div> 

@endif