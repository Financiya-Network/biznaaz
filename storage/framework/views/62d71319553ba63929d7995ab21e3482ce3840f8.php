<?php $__env->startSection('content'); ?>
<div class="main_dashboard" id="backtotop">
    <?php echo $__env->make('elements.topcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="dashboard-section mt-0">
            <?php echo e(Form::open(array('method' => 'post', 'id' => 'searchform'))); ?>

            <div class="top-headers">
                <div class="container">
                <h2>
                    <?php if(isset($catInfo) && !empty($catInfo)): ?>
                        <a href="<?php echo e(URL::to( 'gigs')); ?>">Gigs</a> > 
                        <?php echo e($catInfo->name); ?>

                    <?php else: ?>  
                        Refine Result
                    <?php endif; ?>                    
                </h2>
                <div class="sortby">
                    <label>Sort by</label>
                    <div class="market-select">
                        <span>
                            <?php global $searcFilterArray; ?>
                            <?php echo e(Form::select('filter_type', $searcFilterArray, null, ['class' => 'form-control', 'onchange'=>'updateresult()'])); ?>

                        </span>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
            <div class="row-listing">
            <div class="row">
            <div class="col-xs-3 col-md-4 col-lg-3">
                <?php echo $__env->make('elements.gigs.filters', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
                <div class="col-xs-3 col-md-8 col-lg-9">
                <div class="right_listing">
                    <div class="searchloader displaynone" id="searchloader"><?php echo e(HTML::image("public/img/website_load.svg", SITE_TITLE)); ?></div>
                    <div class="loadgigs" id="loadgigs">
                        <?php echo $__env->make('elements.gigs.listing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>   
                </div>   
            </div>
            </div>
            <input type="hidden" value="1" id="pageidd" name="page"> 
            <?php echo e(Form::close()); ?>

        </div>
    </section>
</div>
<script> 
    $(document).ready(function () {
        $(".deltime").click('change', function (event) {
            updateresult ();
        });
        $(".deltimesub").click('change', function (event) {
            updateresult ();
        });
        $(".langg").click('change', function (event) {
            updateresult ();
        });
        $(document).on('click', '.ajaxpagee a', function () {
            
            var npage = $(this).html();
            if ($(this).html() == '»') {
                npage = $('.ajaxpagee .active').html() * 1 + 1;
            } else if ($(this).html() == '«') {
                npage = $('.ajaxpagee .active').html() * 1 - 1;
            }
            $('#pageidd').val(npage);
            updateresult ();
            return false;
        });
        
        $(".numbrreg").keypress(function (event) {
            if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                event.preventDefault(); //stop character from entering input
            }
        });
    });
    function applyfilter(){ 
       // updateresult()
    }
    
    function updateresult(){ 
        var thisHref = $(location).attr('href');
        $.ajax({
            url: thisHref,
            type: "POST",
            data: $('#searchform').serialize(),
            beforeSend: function () { $("#searchloader").show();},
            complete: function () {$("#searchloader").hide();},
            success: function (result) {
               $('#loadgigs').html(result);
            }
        });
    }  
    
    function clearfilter(){
        window.location.href = window.location.protocol;
    }
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>