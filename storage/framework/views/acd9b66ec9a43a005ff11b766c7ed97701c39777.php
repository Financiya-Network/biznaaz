<div class="filter-sidebar offcanvas-filter-sidebar">
    <div class="offcanvas-filter-sidebar-header d-flex align-items-center">
        <div class="title">All Filters</div>
        <span class="close-filter-sidebar ms-auto d-flex align-items-center justify-content-center"><i
                class="ti-close"></i></span>
    </div>
    <div class="filter-scroll">
        <aside class="widget widget_apus_elementor_template">
            <div data-elementor-type="section" data-elementor-id="1953" class="elementor elementor-1953">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-94b7eab elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="94b7eab" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-25370dd"
                            data-id="25370dd" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-757930f elementor-widget elementor-widget-apus_element_service_search_form"
                                    data-id="757930f" data-element_type="widget"
                                    data-widget_type="apus_element_service_search_form.default">
                                    <div class="elementor-widget-container">
                                        <div class="widget-listing-search-form   vertical">
                                            
                                            <div class="search-form-inner">
                                                <div class="main-inner clearfix">
                                                    <div class="content-main-inner">
                                                        <div class="row">
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div
                                                                    class="form-group form-group-category tax-checklist-field tax-viewmore-field show-more">
                                                                    <label class="heading-label">
                                                                        Categories </label>
                                                                    <div class="form-group-inner">
                                                                        <div class="terms-list-wrapper">
                                                                            <ul class="terms-list circle-check level-0">
                                                                                <?php if(isset($catInfo) && !empty($catInfo)): ?>
                                                                                    <li>All Sub Categories <span
                                                                                            class="no">(<?php echo e(array_sum($gigcatlist)); ?>)</span>
                                                                                    </li>
                                                                                    <?php $__currentLoopData = $gigcatlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catid => $gigcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if(isset($catList[$catid])): ?>
                                                                                            <li class="delivery_check">
                                                                                                <input type="radio"
                                                                                                    class="deltimesub"
                                                                                                    id="testsub<?php echo e($catid); ?>"
                                                                                                    name="subcategory_id"
                                                                                                    value="<?php echo e($catid); ?>">
                                                                                                <label
                                                                                                    for="testsub<?php echo e($catid); ?>"
                                                                                                    onclick="applyfilter()"><?php echo e($catList[$catid]); ?></label>
                                                                                                <span
                                                                                                    class="no">(<?php echo e($gigcat); ?>)</span>
                                                                                            </li>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php else: ?>
                                                                                    <li>All Categories <span
                                                                                            class="no">(<?php echo e(array_sum($gigcatlist)); ?>)</span>
                                                                                    </li>
                                                                                    <?php $__currentLoopData = $gigcatlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catid => $gigcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if(isset($catList[$catid])): ?>
                                                                                            <li><a
                                                                                                    href="<?php echo e(URL::to('gigs/' . $catListSlugs[$catid])); ?>"><?php echo e($catList[$catid]); ?></a>
                                                                                                <span
                                                                                                    class="no">(<?php echo e($gigcat); ?>)</span>
                                                                                            </li>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php endif; ?>
                                                                                
                                                                            </ul>
                                                                        </div>

                                                                        
                                                                    </div>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-date-posted  ">
                                                                    <label for="943ih_date-posted"
                                                                        class="heading-label">
                                                                        Date Posted </label>
                                                                    <div class="form-group-inner">
                                                                        <div class="form-group">
                                                                            <input type="text" name="title"
                                                                                class="form-control"
                                                                                placeholder="Search by title"
                                                                                value="<?php echo e($olftitle); ?>">
                                                                        </div>
                                                                        <div class="price_sec newsfilter">
                                                                            <div class="form-group">
                                                                                <label><?php echo e(CURR); ?></label>
                                                                                <input type="text" name="price_min"
                                                                                    class="form-control numbrreg"
                                                                                    placeholder="min">
                                                                            </div>
                                                                            <span class="">to</span>
                                                                            <div class="form-group">
                                                                                <label><?php echo e(CURR); ?></label>
                                                                                <input type="text" name="price_max"
                                                                                    class="form-control numbrreg"
                                                                                    placeholder="max">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="button" value="Apply"
                                                                                class="btn-submit w-100 btn btn-theme btn-inverse"
                                                                                onclick="updateresult();">
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-7 Hours  ">
                                                                    <label for="943ih_7 Hours" class="heading-label">
                                                                        Seller Language </label>
                                                                    
                                                                    <ul class="delivery">
                                                                        <?php global $searchLanguageArray; ?>
                                                                        <?php $__currentLoopData = $searchLanguageArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li><label class="checkbox checkbox-indent">
                                                                                    <input type="checkbox"
                                                                                        name="langauge[]" class="langg"
                                                                                        value="<?php echo e($key); ?>">
                                                                                    <i
                                                                                        class="icon-checkbox"></i><?php echo e($val); ?>

                                                                                </label>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                    
                                                                    
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-7 Days  ">
                                                                    <label for="943ih_7 Days" class="heading-label">
                                                                        Delivery Time </label>
                                                                    
                                                                    
                                                                    <ul class="delivery">
                                                                        <?php global $searchTimeArray; ?>
                                                                        <?php $__currentLoopData = $searchTimeArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li class="delivery_check">
                                                                                <input type="radio" class="deltime"
                                                                                    id="test<?php echo e($key); ?>"
                                                                                    name="delivery_time"
                                                                                    value="<?php echo e($key); ?>">
                                                                                <label for="test<?php echo e($key); ?>"
                                                                                    onclick="applyfilter()"><?php echo e($val); ?></label>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                    
                                                                    
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-center-location  ">
                                                                    <label for="943ih_center-location"
                                                                        class="heading-label">
                                                                        Location </label>
                                                                    <div class="same_tag">Seller Location</div>
                                                                    <div class="fil_ciuntry">
                                                                        <div class="market-select">
                                                                            <span><?php echo e(Form::select('country_id', $countryLists, null, ['class' => 'form-control', 'placeholder' => 'Select Country', 'onchange' => 'updateresult()'])); ?></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div><!-- /.form-group -->

                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 form-group-search">
                                                                <div class="btn-submit w-100 btn btn-theme btn-inverse clear-filter same_tag"
                                                                    onclick="clearfilter();">Clear All Filters<i
                                                                        class="flaticon-right-up next"></i></div>
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- Save Search -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </aside>
    </div>
</div>
