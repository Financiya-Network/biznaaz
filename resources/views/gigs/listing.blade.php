@extends('layouts.dashboard')
@section('content')
    <div class="main_dashboard big_dashboard " id="backtotop">
        {{-- @include('elements.topcategories') --}}
        <section class="dashboard-section ">
            {{ Form::open(['method' => 'post', 'id' => 'searchform']) }}
            <div class="breadcrumbs-simple">
                <div class="layout-service-sidebar main-content container inner">
                    <ol class="breadcrumb ">
                        @if (isset($catInfo) && !empty($catInfo))
                            <li><a href="{{ URL::to('gigs') }}">Gigs</a> </li>
                            <li><span class="active">{{ $catInfo->name }}</span></li>
                        @else
                            Refine Result
                        @endif
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
                                                        @if (isset($catInfo) && !empty($catInfo))
                                                            <h2 class="elementor-heading-title elementor-size-default">
                                                                {{ $catInfo->name }}</h2>
                                                        @else
                                                            Refine Result
                                                        @endif
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
                        @include('elements.gigs.filters')
                    </section>
                </div>
            </div>
            <div class="container">
                <div class="wrapper-fillter">
                    <div class="container" style="padding-bottom: 30px;">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand none-d" href="#">Filter</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle subcat" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Services Options
                                        </a>
                                        <ul class="dropdown-menu scroll">
                                            <div class="container con-bt ">
                                                @if (isset($catInfo) && !empty($catInfo))
                                                    <div class="headding"><b>{{ $catInfo->name }}</b> </div>
                                                @else
                                                    Refine Result
                                                @endif
                                                <li class="dropdown menu-item-5194 aligned-left con-size">
                                                    <div class="flex-parent-element">
                                                        <div class="flex-child-element magenta" id="subcat">
                                                         <input type="hidden" for="subcat" class="cat" name="cat" value="1">
                                                        @if (!session()->has('user_id'))
                                                            @if ($subcategories)
                                                                @foreach ($subcategories as $cat)
                                                                    <div class="form-check form-check-inline col-4">
                                                                        <input class="form-check-input categories"
                                                                            type="checkbox" id="test{{ $cat->id }}"
                                                                            value="{{ $cat->id }}" name="categories">
                                                                        <label class="form-check-label"
                                                                            for="test{{ $cat->id }}">{!! $cat->name !!}</label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="show-more" style="cursor: pointer;">(Show More)</div>
                                                </li>
                                            </div>
                                            <div class="container con-bt">
                                                <div class="form-group row">
                                                    <button type="reset" value="Apply"
                                                        class="btn-submit btn-sm w-25 btn btn-reset "
                                                        onclick="resetfilter();" style="margin-right: 200px;">Clear
                                                        All</button>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Seller Details
                                        </a>
                                        <ul class="dropdown-menu scroll">
                                            {{-- <div class="container con-bt">
                                                <div class="headding"><b> Seller Level</b> </div>
                                                <li class="dropdown menu-item-5194 aligned-left con-size">
                                                    <div class="flex-parent-element">
                                                        <div class="flex-child-element magenta">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="inlineCheckbox1" value="option1">
                                                                <label class="form-check-label" for="inlineCheckbox1">Top
                                                                    Rated
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
                                                                <label class="form-check-label" for="inlineCheckbox1">New
                                                                    Seller</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div> --}}
                                            <div class="container con-bt">
                                                <div class="headding"><b>Seller Speaks</b> </div>
                                                <?php global $searchLanguageArray; ?>
                                                <li class="dropdown menu-item-5194 aligned-left con-size">
                                                    <div class="flex-parent-element">
                                                        <div class="flex-child-element magenta">
                                                            @foreach ($searchLanguageArray as $key => $val)
                                                                <div class="form-check form-check-inline">
                                                                    <label class="checkbox checkbox-indent">
                                                                        <input type="checkbox" name="langauge[]"
                                                                            class="langg" value="{{ $key }}">
                                                                        <i class="icon-checkbox"></i>{{ $val }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="container con-bt">
                                                <div class="headding"><b> Seller Lives In</b> </div>
                                                <li class="dropdown menu-item-5194 aligned-left con-size">
                                                    <div class="flex-parent-element">
                                                        {{ Form::select('country', $countryLists, null, ['class' => 'form-control', 'placeholder' => 'Select Country', 'onchange' => 'updateresult()']) }}
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
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Budget
                                        </a>
                                        <ul class="dropdown-menu">
                                            <div class="container con-bt">
                                                <li class="dropdown menu-item-5194 aligned-left con-size">
                                                    <div class="flex-parent-element">
                                                        <div class="flex-child-element magenta">
                                                            <div class="form-check form-check-inline">
                                                                <div class="headding"><b> MIN</b> </div>
                                                                <div class="form-group">
                                                                    <label>{{ CURR }}</label>
                                                                    <input type="text" name="price_min"
                                                                        class="form-control numbrreg" placeholder="min">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-child-element green">
                                                            <div class="form-check form-check-inline">
                                                                <div class="headding"><b> MAX</b> </div>
                                                                <div class="form-group">
                                                                    <label>{{ CURR }}</label>
                                                                    <input type="text" name="price_max"
                                                                        class="form-control numbrreg" placeholder="max">
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
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Delivery Time
                                        </a>
                                        <ul class="dropdown-menu">
                                            <div class="container con-bt">
                                                <?php global $searchTimeArray; ?>
                                                @foreach ($searchTimeArray as $key => $val)
                                                    <li class="dropdown menu-item-5194 aligned-left"
                                                        style="width: 150px;">
                                                        <input type="radio" class="deltime"
                                                            id="test{{ $key }}" name="delivery_time"
                                                            value="{{ $key }}">
                                                        <label for="test{{ $key }}"
                                                            onclick="applyfilter()">{{ $val }}
                                                        </label>

                                                    </li>
                                                @endforeach
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
                                    <li class="nav-item dm-1 item-right ">
                                        <ul class="row">
                                            <div class="col-sm">
                                                <div class="row items-wrapper-grid" data-rows="2">
                                                    <div class="item-service col-md-2 col-lg-2 col-xl-auto col-12">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input deltimesub" type="checkbox"
                                                                id="cheak-input" name="subcategory_id">
                                                            <label class="form-check-label" for="cheak-input">Pro
                                                                services</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dm-1">
                                        <ul class="row">
                                            <div class="col-sm">
                                                <div class="row items-wrapper-grid" data-rows="2">
                                                    <div class="item-service col-md-2 col-lg-2 col-xl-auto col-12">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input deltimesub" type="checkbox"
                                                                id="cheak-input" name="subcategory_id">
                                                            <label class="form-check-label" for="cheak-input">Local
                                                                sellers</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dm-1">
                                        <ul class="row">
                                            <div class="col-sm ">
                                                <div class="row items-wrapper-grid" data-rows="2">
                                                    <div class="item-service col-md-4 col-lg-4 col-xl-auto col-12">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input online_user" type="checkbox"
                                                                id="online_user" name="seller_status" value="Online">
                                                            <label class="form-check-label" for="online_user">Online
                                                                sellers</label>
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
                    <div class="apus-listing-filter d-sm-flex align-items-center">
                        <div class="results-count">
                            Showing <span class="first">1</span> &ndash; <span class="last">8</span> of 12
                            results</div>
                        <div class="services-alert-ordering-wrapper">
                            <div class="services-ordering-wrapper">
                                <form class="services-ordering" method="get" action="">
                                    {{-- <select name="filter-orderby" class="orderby" data-placeholder="Sort by"> --}}
                                    <span> <?php global $searcFilterArray; ?>
                                        {{ Form::select('filter_type', $searcFilterArray, null, ['class' => 'form-control', 'onchange' => 'updateresult()', 'placeholder' => 'Sort by (Default)']) }}
                                    </span>
                                    <span class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span>
                                    {{-- <option value="menu_order" selected='selected'>Sort by (Default)</option>
                                            <option value="newest">Newest</option>
                                            <option value="oldest">Oldest</option>
                                            <option value="random">Random</option> --}}
                                    {{-- </select> --}}
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
            {{-- <div class="top-headers">
                <div class="container">
                    <h2>
                        @if (isset($catInfo) && !empty($catInfo))
                            <a href="{{ URL::to('gigs') }}">Gigs</a> >
                            {{ $catInfo->name }}
                        @else
                            Refine Result
                        @endif
                    </h2>
                    <div class="sortby">
                    <label>Sort by</label>
                    <div class="market-select">
                        <span> --}}
            <?php global $searcFilterArray; ?>
            {{-- {{Form::select('filter_type', $searcFilterArray, null, ['class' => 'form-control', 'onchange'=>'updateresult()'])}}
                        </span>
                    </div>
                </div>
                </div>
            </div> --}}
            <div class="container">
                <div class="row-listing">
                    <div class="row">
                        {{-- <div class="col-xs-3 col-md-4 col-lg-3">
                            @include('elements.gigs.filters')
                        </div> --}}
                        <div class="">
                            <div class="right_listing">
                                <div class="searchloader displaynone" id="searchloader" style="display: none;">
                                    {{ HTML::image('public/img/website_load.svg', SITE_TITLE, ['style' => 'margin-top: 150px;padding-left: 40rem;']) }}
                                </div>

                                <div class="loadgigs" id="loadgigs">
                                    @include('elements.gigs.listing')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <input type="hidden" value="1" id="pageidd" name="page">
    {{ Form::close() }}

    </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".deltime").click('change', function(event) {
                updateresult();
            });
            $(".categories").click('change', function(event) {
                updateresult();
            });
            $(".online_user").click('change', function(event) {
                updateresult();
            });
            $(".subcat").click('change', function(event) {
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
                    $('#subcat').html(result);
                }
            });
        }

        function clearfilter() {
            window.location.href = window.location.protocol;
        }

        function resetfilter() {
            $('input:checkbox').removeAttr('checked');
            updateresult();
           
        }

    </script>
    <script>
        $(".show-more").click(function() {
            if ($(".text").hasClass("show-more-height")) {
                $(this).text("(Show Less)");
            } else {
                $(this).text("(Show More)");
            }

            $(".text").toggleClass("show-more-height");
        });
    </script>
@endsection
