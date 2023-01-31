<div class="layout-service-sidebar main-content container inner">
 <div class="row">
  <div id="main-content" class="col-12 col-12">
            <main id="main" class="site-main layout-type-default" role="main">
                <div class="services-listing-wrapper main-items-wrapper" data-display_mode="grid">
                    <div class="services-wrapper items-wrapper">
                        <div class="row items-wrapper-grid" data-rows="2">
                            <?php $__empty_1 = true; $__currentLoopData = $allrecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if(isset($allrecord->User->slug)): ?>
                                    <?php echo $__env->make('elements.gigbox', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="no_record">No more records found.</div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <?php if(!$allrecords->isEmpty() && $allrecords->lastPage() > 1): ?>
                    <div class="showtotap">
                        <div class="shpagel">Showing page <?php echo e($allrecords->currentPage()); ?> of
                            <?php echo e($allrecords->lastPage()); ?> </div>
                        <div class="topn_rightd ajaxpagee ddpagingshorting" id="pagingLinks" align="right">
                            <div class="panel-heading" style="align-items:center;">
                                <?php echo e($allrecords->appends(Input::except('_token'))->render()); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
</div>
<script>
$(document).ready(function () {
    $("img.lazy").lazyload();
    <?php if(isset($isajax)): ?>
    $('html, body').animate({
        scrollTop: $('#backtotop').offset().top - 1
    }, 'slow');
    <?php endif; ?>
});
</script>