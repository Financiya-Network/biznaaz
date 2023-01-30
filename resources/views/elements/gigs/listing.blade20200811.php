@forelse($allrecords as $allrecord)
    @if(isset($allrecord->User->slug))
        @include('elements.gigbox')
    @endif
@empty
<div class="no_record">No more records found.</div>
@endforelse
@if(!$allrecords->isEmpty() && $allrecords->lastPage() > 1)
<div class="showtotap">
    <div class="shpagel">Showing page {{$allrecords->currentPage()}} of {{$allrecords->lastPage()}} </div>
    <div class="topn_rightd ajaxpagee ddpagingshorting" id="pagingLinks" align="right">
        <div class="panel-heading" style="align-items:center;">
            {{$allrecords->appends(Input::except('_token'))->render()}}
        </div>
    </div>
</div>
@endif
<script>
$(document).ready(function () {
    $("img.lazy").lazyload();
    @if(isset($isajax))
    $('html, body').animate({
        scrollTop: $('#backtotop').offset().top - 1
    }, 'slow');
    @endif
});
</script>