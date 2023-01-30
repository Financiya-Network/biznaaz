<div class="left_bar">
    <div class="tagline headline">
        <?php if(isset($catInfo) && !empty($catInfo)): ?>
            
        <?php else: ?>  
            Refine By Category
        <?php endif; ?>   
    </div> 
    <div class="all_caterogy">
        <ul>
            <?php if(isset($catInfo) && !empty($catInfo)): ?>
                <li>All Sub Categories <span class="no">(<?php echo e(array_sum($gigcatlist)); ?>)</span></li>
                <?php $__currentLoopData = $gigcatlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catid=>$gigcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($catList[$catid])): ?>
                        <li class="delivery_check">
                            <input type="radio" class="deltimesub" id="testsub<?php echo e($catid); ?>" name="subcategory_id" value="<?php echo e($catid); ?>">
                            <label for="testsub<?php echo e($catid); ?>" onclick="applyfilter()"><?php echo e($catList[$catid]); ?></label>
                            <span class="no">(<?php echo e($gigcat); ?>)</span>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <?php else: ?>
                <li>All Categories <span class="no">(<?php echo e(array_sum($gigcatlist)); ?>)</span></li>
                <?php $__currentLoopData = $gigcatlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catid=>$gigcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($catList[$catid])): ?>
                        <li><a href="<?php echo e(URL::to( 'gigs/'.$catListSlugs[$catid])); ?>"><?php echo e($catList[$catid]); ?></a> <span class="no">(<?php echo e($gigcat); ?>)</span></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            <?php endif; ?>    
        </ul>    
    </div>
    <div class="morefilter samestyle">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Search by title" value="<?php echo e($olftitle); ?>">
        </div>
        <div class="price_sec newsfilter">
            <div class="form-group">
                <label><?php echo e(CURR); ?></label>
                <input type="text" name="price_min" class="form-control numbrreg" placeholder="min">
            </div>
            <span class="">to</span>
            <div class="form-group">
                <label><?php echo e(CURR); ?></label>
                <input type="text" name="price_max"  class="form-control numbrreg" placeholder="max">
            </div>
        </div>
        <div class="form-group">
            <input type="button" value="Apply" class="btn btn-primary succbtn" onclick="updateresult();">
        </div>
    </div>
    
    <div class="delivery_time samestyle">
        <div class="same_tag">Delivery Time</div>
        <ul class="delivery">
            <?php global $searchTimeArray; ?>
            <?php $__currentLoopData = $searchTimeArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="delivery_check">
                    <input type="radio" class="deltime" id="test<?php echo e($key); ?>" name="delivery_time" value="<?php echo e($key); ?>">
                    <label for="test<?php echo e($key); ?>" onclick="applyfilter()"><?php echo e($val); ?></label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    
    <div class="delivery_time samestyle">
        <div class="same_tag">Seller Language</div>
        <ul class="delivery">
            <?php global $searchLanguageArray; ?>
            <?php $__currentLoopData = $searchLanguageArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><label class="checkbox checkbox-indent">
                        <input type="checkbox" name="langauge[]" class="langg" value="<?php echo e($key); ?>">
                        <i class="icon-checkbox"></i><?php echo e($val); ?>

                    </label>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="delivery_time samestyle">
        <div class="same_tag">Seller Location</div>
        <div class="fil_ciuntry">
            <div class="market-select"><span><?php echo e(Form::select('country_id', $countryLists, null, ['class' => 'form-control','placeholder' => 'Select Country', 'onchange'=>'updateresult()'])); ?></span></div>
        </div>
        <div class="clear-filter same_tag" onclick="clearfilter();">Clear All Filters</div>
    </div>
</div>   