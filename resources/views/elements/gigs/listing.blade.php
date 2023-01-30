<div class="layout-service-sidebar main-content container inner">
 <div class="row">
  <div id="main-content" class="col-12 col-12">
            <main id="main" class="site-main layout-type-default" role="main">
                <div class="services-listing-wrapper main-items-wrapper" data-display_mode="grid">
                    <div class="services-wrapper items-wrapper">
                        <div class="row items-wrapper-grid" data-rows="2">
                            @forelse($allrecords as $allrecord)
                                @if (isset($allrecord->User->slug))
                                    @include('elements.gigbox')
                                @endif
                            @empty
                                <div class="no_record">No more records found.</div>
                            @endforelse

                        </div>
                    </div>
                </div>
                @if (!$allrecords->isEmpty() && $allrecords->lastPage() > 1)
                    <div class="showtotap">
                        <div class="shpagel">Showing page {{ $allrecords->currentPage() }} of
                            {{ $allrecords->lastPage() }} </div>
                        <div class="topn_rightd ajaxpagee ddpagingshorting" id="pagingLinks" align="right">
                            <div class="panel-heading" style="align-items:center;">
                                {{ $allrecords->appends(Input::except('_token'))->render() }}
                            </div>
                        </div>
                    </div>
                @endif
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
</div>
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