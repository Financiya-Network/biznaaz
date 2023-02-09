<?php $__env->startSection('content'); ?>
    <div class="main_dashboard big_dashboard " id="backtotop">
        
        <section class="dashboard-section ">
            <?php echo e(Form::open(['method' => 'post', 'id' => 'searchform'])); ?>

            <div class="breadcrumbs-simple">
                <div class="layout-service-sidebar main-content container inner">
                    <ol class="breadcrumb ">
                        <?php if(isset($catInfo) && !empty($catInfo)): ?>
                            <li><a href="<?php echo e(URL::to('gigs')); ?>">Gigs</a> </li>
                            <li><span class="active"><?php echo e($catInfo->name); ?></span></li>
                        <?php else: ?>
                            Refine Result
                        <?php endif; ?>
                    </ol>
                </div>
            </div>
            <div id="wrapper-container" class="wrapper-container">
                <div id="apus-main-content">
                    <section id="main-container" class="page-service-board inner layout-type-default has-filter-top">
                        <div class="services-top-content-wrapper">
                            <div data-elementor-type="section" data-elementor-id="1984" class="elementor elementor-1984">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-6251156 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="6251156" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9d78cac"
                                            data-id="9d78cac" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-27b2413 elementor-widget elementor-widget-heading"
                                                    data-id="27b2413" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <style>
                                                            /*! elementor - v3.8.1 - 13-11-2022 */
                                                            .elementor-heading-title {
                                                                padding: 0;
                                                                margin: 0;
                                                                line-height: 1
                                                            }

                                                            .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                                                color: inherit;
                                                                font-size: inherit;
                                                                line-height: inherit
                                                            }

                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                                                font-size: 15px
                                                            }

                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                                                font-size: 19px
                                                            }

                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                                                font-size: 29px
                                                            }

                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                                                font-size: 39px
                                                            }

                                                            .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                                                font-size: 59px
                                                            }
                                                        </style>
                                                        <?php if(isset($catInfo) && !empty($catInfo)): ?>
                                                            <h2 class="elementor-heading-title elementor-size-default">
                                                                <?php echo e($catInfo->name); ?></h2>
                                                        <?php else: ?>
                                                            Refine Result
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-e0dab48 elementor-widget elementor-widget-text-editor"
                                                    data-id="e0dab48" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <style>
                                                            /*! elementor - v3.8.1 - 13-11-2022 */
                                                            .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                                background-color: #818a91;
                                                                color: #fff
                                                            }

                                                            .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                                color: #818a91;
                                                                border: 3px solid;
                                                                background-color: transparent
                                                            }

                                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                                margin-top: 8px
                                                            }

                                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                                width: 1em;
                                                                height: 1em
                                                            }

                                                            .elementor-widget-text-editor .elementor-drop-cap {
                                                                float: left;
                                                                text-align: center;
                                                                line-height: 1;
                                                                font-size: 50px
                                                            }

                                                            .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                                display: inline-block
                                                            }
                                                        </style> Give your visitor a smooth online
                                                        experience with a
                                                        solid UX design
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0022aba elementor-widget__width-auto elementor-widget elementor-widget-apus_element_popup_video"
                                                    data-id="0022aba" data-element_type="widget"
                                                    data-widget_type="apus_element_popup_video.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-video ">
                                                            <div class="video-wrapper-inner position-relative style1">
                                                                <a class="popup-video d-flex align-items-center"
                                                                    href="https://www.youtube.com/watch?v=7e90gBu4pas">
                                                                    <span class="popup-video-inner flex-shrink-0">
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-center video-icon">
                                                                            <i class="fa fa-play"></i>
                                                                        </div>
                                                                    </span>
                                                                    <div class="flex-grow-1">
                                                                        <h2 class="title">
                                                                            How Biznaaz Works </h2>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <?php echo $__env->make('elements.gigs.filters', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </section>
                </div>
            </div>
            <div class="container">
                <div class="wrapper-fillter">
                    <div class="container" style="padding-bottom: 30px;">
                        <div class="row">
                            <nav data-duration="400" class="apus-megamenu animate navbar navbar-expand p-0"
                                role="navigation">
                                <div class="">
                                    <ul class="nav_1 navbar-nav1 megamenu effect1">
                                        <li class="dropdown menu-item-5226 aligned-left">Services Options<b
                                                class="caret"></b>
                                            <ul class="dropdown-menu scroll">
                                                <div class="container con-bt ">
                                                    <div class="headding"><b>Website type</b> </div>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">E-Commerce</label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Business promotion</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Product & service marketing</label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Blog</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="container con-bt">
                                                    <div class="headding"><b>Platform & tool</b> </div>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Wordpress</label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Figma</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Adobe Photoshop</label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Adobe XD</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-5227 aligned-left">Seller Details
                                            <b class="caret"></b>
                                            <ul class="dropdown-menu scroll">
                                                <div class="container con-bt">
                                                    <div class="headding"><b> Seller Level</b> </div>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Top Rated
                                                                        Seller</label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Lavel Two</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">Lavel One</label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="inlineCheckbox1" value="option1">
                                                                    <label class="form-check-label"
                                                                        for="inlineCheckbox1">New
                                                                        Seller</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="container con-bt">
                                                    <div class="headding"><b>Seller Speaks</b> </div>
                                                    <?php global $searchLanguageArray; ?>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <?php $__currentLoopData = $searchLanguageArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="checkbox checkbox-indent">
                                                                            <input type="checkbox" name="langauge[]"
                                                                                class="langg"
                                                                                value="<?php echo e($key); ?>">
                                                                            <i
                                                                                class="icon-checkbox"></i><?php echo e($val); ?>

                                                                        </label>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="container con-bt">
                                                    <div class="headding"><b> Seller Lives In</b> </div>
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <?php echo e(Form::select('country', $countryLists, null, ['class' => 'form-control', 'placeholder' => 'Select Country', 'onchange' => 'updateresult()'])); ?>

                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="container con-bt">
                                                    <div class="form-group row">
                                                        <button type="reset" value="Apply"
                                                            class="btn-submit btn-sm w-25 btn btn-reset "
                                                            onclick="clearfilter();" style="margin-right: 200px;">Clear
                                                            All</button>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-64 aligned-left">Budget
                                            <b class="caret"></b>
                                            <ul class="dropdown-menu">
                                                <div class="container con-bt">
                                                    <li class="dropdown menu-item-5194 aligned-left con-size">
                                                        <div class="flex-parent-element">
                                                            <div class="flex-child-element magenta">
                                                                <div class="form-check form-check-inline">
                                                                    <div class="headding"><b> MIN</b> </div>
                                                                    <div class="form-group">
                                                                        <label><?php echo e(CURR); ?></label>
                                                                        <input type="text" name="price_min"
                                                                            class="form-control numbrreg"
                                                                            placeholder="min">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child-element green">
                                                                <div class="form-check form-check-inline">
                                                                    <div class="headding"><b> MAX</b> </div>
                                                                    <div class="form-group">
                                                                        <label><?php echo e(CURR); ?></label>
                                                                        <input type="text" name="price_max"
                                                                            class="form-control numbrreg"
                                                                            placeholder="max">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <div class="container con-bt">
                                                    <div class="form-group row">
                                                        <button type="reset" value="Apply"
                                                            class="btn-submit btn-sm w-25 btn btn-reset "
                                                            onclick="clearfilter();" style="margin-right: 200px;">Clear
                                                            All</button>
                                                        <button type="button" value="Apply"
                                                            class="btn-submit btn-sm w-25 btn btn-theme "
                                                            onclick="updateresult();">Apply</button>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-65 aligned-left">Delivery Time
                                            <b class="caret"></b>
                                            <ul class="dropdown-menu">
                                                <div class="container con-bt">
                                                    <?php global $searchTimeArray; ?>
                                                    <?php $__currentLoopData = $searchTimeArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="dropdown menu-item-5194 aligned-left"
                                                            style="width: 150px;">
                                                            <input type="radio" class="deltime"
                                                                id="test<?php echo e($key); ?>" name="delivery_time"
                                                                value="<?php echo e($key); ?>">
                                                            <label for="test<?php echo e($key); ?>"
                                                                onclick="applyfilter()"><?php echo e($val); ?>

                                                            </label>

                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="container">
                                                    <div class="form-group row">
                                                        <button type="reset" value="Apply"
                                                            class="btn-submit btn-sm w-25 btn btn-reset "
                                                            onclick="clearfilter();" style="margin-right: 200px;">Clear
                                                            All</button>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                        <li class="dropdown menu-item-65 aligned-left d-flex_last" style="margin-left: 450px;">
                                            <ul class="row">
                                                <div class="col-sm">
                                                    <div class="row items-wrapper-grid" data-rows="2">
                                                        <div class="item-service col-md-2 col-lg-2 col-xl-auto col-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input deltimesub" type="checkbox"
                                                                    id="cheak-input" name="subcategory_id">
                                                                <label class="form-check-label" for="cheak-input">Pro services</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="row items-wrapper-grid" data-rows="2">
                                                        <div class="item-service col-md-2 col-lg-2 col-xl-auto col-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input deltimesub" type="checkbox"
                                                                    id="cheak-input" name="subcategory_id">
                                                                <label class="form-check-label" for="cheak-input">Local sellers</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm ">
                                                    <div class="row items-wrapper-grid" data-rows="2">
                                                        <div class="item-service col-md-4 col-lg-4 col-xl-auto col-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input deltimesub" type="checkbox"
                                                                    id="cheak-input" name="subcategory_id">
                                                                <label class="form-check-label" for="cheak-input">Online sellers</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="apus-listing-filter d-sm-flex align-items-center">
                        <div class="results-count">
                            Showing <span class="first">1</span> &ndash; <span class="last">8</span> of 12
                            results</div>
                        <div class="services-alert-ordering-wrapper">
                            <div class="services-ordering-wrapper">
                                <form class="services-ordering" method="get" action="">
                                    
                                    <span> <?php global $searcFilterArray; ?>
                                        <?php echo e(Form::select('filter_type', $searcFilterArray, null, ['class' => 'form-control', 'onchange' => 'updateresult()', 'placeholder' => 'Sort by (Default)'])); ?>

                                    </span>
                                    <span class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span>
                                    
                                    
                                    <input type="hidden" name="paged" value="1" />
                                </form>
                            </div>
                            <div class="filter-in-sidebar-wrapper">
                                <span class="filter-in-sidebar"><svg width="14" height="12" viewBox="0 0 14 12"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.06254 0.9375L3.06248 9.7035L3.78979 8.97725L4.58529 9.77275L2.50004 11.858L0.414795 9.77275L1.21029 8.97725L1.93748 9.7035L1.93754 0.9375H3.06254ZM8.12504 9.375V10.5H5.31254V9.375H8.12504ZM9.81254 6.5625V7.6875H5.31254V6.5625H9.81254ZM11.5 3.75V4.875H5.31254V3.75H11.5ZM13.1875 0.9375V2.0625H5.31254V0.9375H13.1875Z"
                                            fill="currentColor" />
                                    </svg><span class="text">Filter</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php global $searcFilterArray; ?>
            
            <div class="container">
                <div class="row-listing">
                    <div class="row">
                        
                        <div class="">
                            <div class="right_listing">
                                <div class="searchloader displaynone" id="searchloader" style="display: none;">
                                    <?php echo e(HTML::image('public/img/website_load.svg', SITE_TITLE, ['style' => 'margin-top: 150px;padding-left: 40rem;'])); ?>

                                </div>

                                <div class="loadgigs" id="loadgigs">
                                    <?php echo $__env->make('elements.gigs.listing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" value="1" id="pageidd" name="page">
    <?php echo e(Form::close()); ?>


    </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".deltime").click('change', function(event) {
                updateresult();
            });
            $(".deltimesub").click('change', function(event) {
                updateresult();
            });
            $(".langg").click('change', function(event) {
                updateresult();
            });
            $(document).on('click', '.ajaxpagee a', function() {

                var npage = $(this).html();
                if ($(this).html() == '»') {
                    npage = $('.ajaxpagee .active').html() * 1 + 1;
                } else if ($(this).html() == '«') {
                    npage = $('.ajaxpagee .active').html() * 1 - 1;
                }
                $('#pageidd').val(npage);
                updateresult();
                return false;
            });

            $(".numbrreg").keypress(function(event) {
                if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                    event.preventDefault(); //stop character from entering input
                }
            });
        });

        function applyfilter() {
            //updateresult();
        }

        function applyfilter1() {
            alert("Hello! I am an alert box!!");
            updateresult();
        }

        function updateresult() {
            var thisHref = $(location).attr('href');
            console.log(thisHref);

            $.ajax({
                url: thisHref,
                type: "POST",
                data: $('#searchform').serialize(),
                beforeSend: function() {
                    $("#searchloader").show();
                },
                complete: function() {
                    $("#searchloader").hide();
                },
                success: function(result) {
                    $('#loadgigs').html(result);
                }
            });
        }

        function clearfilter() {
            window.location.href = window.location.protocol;
        }
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>