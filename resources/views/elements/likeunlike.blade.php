<div class="likeunlike">
    {{-- <div class="liukeloader" id="lik{{$gid}}">{{HTML::image("public/img/loading.gif", SITE_TITLE)}}</div> --}}
    <div class="likeunlike_in" id="likeunlikeid{{$gid}}">
    
        @include('elements.likeunlikeinner', ['gid'=>$gid])
    </div>
</div>


