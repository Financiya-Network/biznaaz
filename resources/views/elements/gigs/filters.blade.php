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
                                            {{-- <form id="filter-listing-form-943ih"
                                                action="https://demoapus1.com/freeio/service-layout-1/"
                                                class="form-search filter-listing-form " method="GET"> --}}
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
                                                                                @if (isset($catInfo) && !empty($catInfo))
                                                                                    <li>All Sub Categories <span
                                                                                            class="no">({{ array_sum($gigcatlist) }})</span>
                                                                                    </li>
                                                                                    @foreach ($gigcatlist as $catid => $gigcat)
                                                                                        @if (isset($catList[$catid]))
                                                                                            <li class="delivery_check">
                                                                                                <input type="radio"
                                                                                                    class="deltimesub"
                                                                                                    id="testsub{{ $catid }}"
                                                                                                    name="subcategory_id"
                                                                                                    value="{{ $catid }}">
                                                                                                <label
                                                                                                    for="testsub{{ $catid }}"
                                                                                                    onclick="applyfilter()">{{ $catList[$catid] }}</label>
                                                                                                <span
                                                                                                    class="no">({{ $gigcat }})</span>
                                                                                            </li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @else
                                                                                    <li>All Categories <span
                                                                                            class="no">({{ array_sum($gigcatlist) }})</span>
                                                                                    </li>
                                                                                    @foreach ($gigcatlist as $catid => $gigcat)
                                                                                        @if (isset($catList[$catid]))
                                                                                            <li><a
                                                                                                    href="{{ URL::to('gigs/' . $catListSlugs[$catid]) }}">{{ $catList[$catid] }}</a>
                                                                                                <span
                                                                                                    class="no">({{ $gigcat }})</span>
                                                                                            </li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                                {{-- @if ($globalCategories)
                                                                                        @foreach ($globalCategories as $cat)
                                                                                            <li
                                                                                                class="list-item level-0">
                                                                                                <div
                                                                                                    class="list-item-inner">
                                                                                                    <input
                                                                                                        id="filter-category-design-creative"
                                                                                                        type="radio"
                                                                                                        name="filter-category[]"
                                                                                                        value="47"><label
                                                                                                        for="filter-category-design-creative">{!! $cat->name !!}</label>
                                                                                                </div>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    @endif --}}
                                                                            </ul>
                                                                        </div>

                                                                        {{-- <a class="toggle-filter-viewmore"
                                                                                href="javascript:void(0);"><span
                                                                                    class="icon-more"><i
                                                                                        class="ti-plus"></i></span>
                                                                                <span class="text">Show
                                                                                    More</span></a> --}}
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
                                                                                value="{{ $olftitle }}">
                                                                        </div>
                                                                        <div class="price_sec newsfilter">
                                                                            <div class="form-group">
                                                                                <label>{{ CURR }}</label>
                                                                                <input type="text" name="price_min"
                                                                                    class="form-control numbrreg"
                                                                                    placeholder="min">
                                                                            </div>
                                                                            <span class="">to</span>
                                                                            <div class="form-group">
                                                                                <label>{{ CURR }}</label>
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
                                                                        {{-- <ul class="terms-list circle-check">
                                                                                <li class="list-item ">
                                                                                    <input
                                                                                        id="filter-date-posted-last-hour"
                                                                                        type="radio"
                                                                                        name="filter-date-posted"
                                                                                        value="1hour"><label
                                                                                        for="filter-date-posted-last-hour">Last
                                                                                        Hour</label>
                                                                                </li>
                                                                                <li class="list-item ">
                                                                                    <input
                                                                                        id="filter-date-posted-last-24-hours"
                                                                                        type="radio"
                                                                                        name="filter-date-posted"
                                                                                        value="24hours"><label
                                                                                        for="filter-date-posted-last-24-hours">Last
                                                                                        24
                                                                                        hours</label>
                                                                                </li>
                                                                                <li class="list-item ">
                                                                                    <input
                                                                                        id="filter-date-posted-last-7-days"
                                                                                        type="radio"
                                                                                        name="filter-date-posted"
                                                                                        value="7days"><label
                                                                                        for="filter-date-posted-last-7-days">Last
                                                                                        7
                                                                                        days</label>
                                                                                </li>
                                                                                <li class="list-item ">
                                                                                    <input
                                                                                        id="filter-date-posted-last-14-days"
                                                                                        type="radio"
                                                                                        name="filter-date-posted"
                                                                                        value="14days"><label
                                                                                        for="filter-date-posted-last-14-days">Last
                                                                                        14
                                                                                        days</label>
                                                                                </li>
                                                                                <li class="list-item more-fields">
                                                                                    <input
                                                                                        id="filter-date-posted-last-30-days"
                                                                                        type="radio"
                                                                                        name="filter-date-posted"
                                                                                        value="30days"><label
                                                                                        for="filter-date-posted-last-30-days">Last
                                                                                        30
                                                                                        days</label>
                                                                                </li>
                                                                                <li class="list-item more-fields">
                                                                                    <input id="filter-date-posted-all"
                                                                                        type="radio"
                                                                                        name="filter-date-posted"
                                                                                        value="all"
                                                                                        checked="checked"><label
                                                                                        for="filter-date-posted-all">All</label>
                                                                                </li>
                                                                            </ul> --}}
                                                                        {{-- <a class="toggle-filter-list"
                                                                                href="javascript:void(0);"><span
                                                                                    class="icon-more"><i
                                                                                        class="ti-plus"></i></span><span
                                                                                    class="text">Show
                                                                                    More</span></a> --}}
                                                                    </div>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-7 Hours  ">
                                                                    <label for="943ih_7 Hours" class="heading-label">
                                                                        Seller Language </label>
                                                                    {{-- <div class="delivery_time samestyle">
                                                                            <div class="same_tag">Seller Language</div> --}}
                                                                    <ul class="delivery">
                                                                        <?php global $searchLanguageArray; ?>
                                                                        @foreach ($searchLanguageArray as $key => $val)
                                                                            <li><label class="checkbox checkbox-indent">
                                                                                    <input type="checkbox"
                                                                                        name="langauge[]" class="langg"
                                                                                        value="{{ $key }}">
                                                                                    <i
                                                                                        class="icon-checkbox"></i>{{ $val }}
                                                                                </label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    {{-- </div> --}}
                                                                    {{-- <div class="form-group-inner inner ">
                                                                            <select name="filter-response_time"
                                                                                class="form-control select2-hidden-accessible"
                                                                                id="943ih_7 Hours"
                                                                                data-placeholder="Response Time"
                                                                                tabindex="-1" aria-hidden="true">
                                                                                <option value="">
                                                                                    Response Time
                                                                                </option>
                                                                                <option value="1 Hour">
                                                                                    1 Hour </option>
                                                                                <option value="2 Hours">
                                                                                    2 Hours
                                                                                </option>
                                                                                <option value="3 Hours">
                                                                                    3 Hours
                                                                                </option>
                                                                                <option value="4 Hours">
                                                                                    4 Hours
                                                                                </option>
                                                                                <option value="5 Hours">
                                                                                    5 Hours
                                                                                </option>
                                                                                <option value="6 Hours">
                                                                                    6 Hours
                                                                                </option>
                                                                                <option value="7 Hours">
                                                                                    7 Hours
                                                                                </option>
                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr"
                                                                                style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0"
                                                                                        aria-labelledby="select2-943ih_7 Hours-container"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-943ih_7 Hours-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">Response
                                                                                                Time</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span>
                                                                        </div> --}}
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-7 Days  ">
                                                                    <label for="943ih_7 Days" class="heading-label">
                                                                        Delivery Time </label>
                                                                    {{-- <div class="delivery_time samestyle"> --}}
                                                                    {{-- <div class="same_tag">Delivery Time</div> --}}
                                                                    <ul class="delivery">
                                                                        <?php global $searchTimeArray; ?>
                                                                        @foreach ($searchTimeArray as $key => $val)
                                                                            <li class="delivery_check">
                                                                                <input type="radio" class="deltime"
                                                                                    id="test{{ $key }}"
                                                                                    name="delivery_time"
                                                                                    value="{{ $key }}">
                                                                                <label for="test{{ $key }}"
                                                                                    onclick="applyfilter()">{{ $val }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    {{-- </div> --}}
                                                                    {{-- <div class="form-group-inner inner ">
                                                                            <select name="filter-delivery_time"
                                                                                class="form-control select2-hidden-accessible"
                                                                                id="943ih_7 Days"
                                                                                data-placeholder="Delivery Time"
                                                                                tabindex="-1" aria-hidden="true">
                                                                                <option value="">
                                                                                    Delivery Time
                                                                                </option>
                                                                                <option value="1 Day">
                                                                                    1 Day </option>
                                                                                <option value="2 Days">
                                                                                    2 Days </option>
                                                                                <option value="3 Days">
                                                                                    3 Days </option>
                                                                                <option value="4 Days">
                                                                                    4 Days </option>
                                                                                <option value="5 Days">
                                                                                    5 Days </option>
                                                                                <option value="6 Days">
                                                                                    6 Days </option>
                                                                                <option value="7 Days">
                                                                                    7 Days </option>
                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr"
                                                                                style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0"
                                                                                        aria-labelledby="select2-943ih_7 Days-container"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-943ih_7 Days-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">Delivery
                                                                                                Time</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span>
                                                                        </div> --}}
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                            {{-- <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                    <div
                                                                        class="clearfix form-group form-group-price  ">
                                                                        <label for="filter-price"
                                                                            class="heading-label">
                                                                            Budget </label>
                                                                        <div class="form-group-inner">

                                                                            <div class="from-to-wrapper">
                                                                                <span class="inner">
                                                                                    <span class="from-text"><span
                                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                                    class="woocommerce-Price-currencySymbol">$</span>0</bdi></span></span>
                                                                                    <span class="space">-</span>
                                                                                    <span class="to-text"><span
                                                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                                                    class="woocommerce-Price-currencySymbol">$</span>158</bdi></span></span>
                                                                                </span>
                                                                            </div>
                                                                            <div class="salary-range-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                                                                data-max="158" data-min="0">
                                                                                <div class="ui-slider-range ui-corner-all ui-widget-header"
                                                                                    style="left: 0%; width: 100%;">
                                                                                </div><span tabindex="0"
                                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                    style="left: 0%;"></span><span
                                                                                    tabindex="0"
                                                                                    class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                    style="left: 100%;"></span>
                                                                            </div>
                                                                            <input type="hidden"
                                                                                name="filter-price-from"
                                                                                class="filter-from" value="0">
                                                                            <input type="hidden"
                                                                                name="filter-price-to"
                                                                                class="filter-to" value="158">
                                                                        </div>
                                                                    </div><!-- /.form-group -->

                                                                </div>
                                                                <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                    <div class="form-group form-group-Professional  ">
                                                                        <label for="943ih_Professional"
                                                                            class="heading-label">
                                                                            English Level </label>
                                                                        <div class="form-group-inner inner ">
                                                                            <select name="filter-english_level"
                                                                                class="form-control select2-hidden-accessible"
                                                                                id="943ih_Professional"
                                                                                data-placeholder="English Level"
                                                                                tabindex="-1" aria-hidden="true">
                                                                                <option value="">
                                                                                    English Level
                                                                                </option>
                                                                                <option value="Basic">
                                                                                    Basic </option>
                                                                                <option value="Conversational">
                                                                                    Conversational
                                                                                </option>
                                                                                <option value="Fluent">
                                                                                    Fluent </option>
                                                                                <option value="Native Or Bilingual">
                                                                                    Native Or
                                                                                    Bilingual
                                                                                </option>
                                                                                <option value="Professional">
                                                                                    Professional
                                                                                </option>
                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr"
                                                                                style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0"
                                                                                        aria-labelledby="select2-943ih_Professional-container"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-943ih_Professional-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">English
                                                                                                Level</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span>
                                                                        </div>
                                                                    </div><!-- /.form-group -->


                                                                </div>
                                                                <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                    <div
                                                                        class="form-group form-group-location   tax-select-field">
                                                                        <label for="943ih_location"
                                                                            class="heading-label">
                                                                            Regions </label>
                                                                        <div class="form-group-inner inner ">
                                                                            <select name="filter-location"
                                                                                class="form-control select2-hidden-accessible"
                                                                                id="943ih_location"
                                                                                data-placeholder="Regions"
                                                                                tabindex="-1" aria-hidden="true">

                                                                                <option value="">
                                                                                    Regions</option>

                                                                                <option class="level-0"
                                                                                    value="170">
                                                                                    Los Angeles
                                                                                </option>
                                                                                <option class="level-0"
                                                                                    value="171">
                                                                                    Miami</option>
                                                                                <option class="level-0"
                                                                                    value="169">
                                                                                    New York
                                                                                </option>
                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr"
                                                                                style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0"
                                                                                        aria-labelledby="select2-943ih_location-container"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-943ih_location-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">Regions</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span>
                                                                        </div>
                                                                    </div><!-- /.form-group -->


                                                                </div> --}}
                                                            <div class="item-column col-12 col-md-12 col-lg-12   ">
                                                                <div class="form-group form-group-center-location  ">
                                                                    <label for="943ih_center-location"
                                                                        class="heading-label">
                                                                        Location </label>
                                                                    <div class="same_tag">Seller Location</div>
                                                                    <div class="fil_ciuntry">
                                                                        <div class="market-select">
                                                                            <span>{{ Form::select('country_id', $countryLists, null, ['class' => 'form-control', 'placeholder' => 'Select Country', 'onchange' => 'updateresult()']) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="form-group-inner inner ">
                                                                            <div class="action-location">
                                                                                <input type="text"
                                                                                    name="filter-center-location"
                                                                                    class="form-control"
                                                                                    value=""
                                                                                    id="943ih_center-location"
                                                                                    placeholder="" autocomplete="off">
                                                                                <div class="leaflet-geocode-container">
                                                                                </div>
                                                                                <span class="find-me"></span>
                                                                                <span class="clear-location hidden"><i
                                                                                        class="ti-close"></i></span>
                                                                            </div>
                                                                            <input type="hidden"
                                                                                name="filter-center-latitude"
                                                                                value="">
                                                                            <input type="hidden"
                                                                                name="filter-center-longitude"
                                                                                value="">

                                                                        </div> --}}
                                                                </div><!-- /.form-group -->

                                                            </div>
                                                            {{-- <div
                                                                    class="item-column col-12 col-md-12 col-lg-12   item-last">
                                                                    <div class="form-group form-group-distance">

                                                                        <div class="form-group-inner inner">

                                                                            <div
                                                                                class="search_distance_wrapper clearfix">
                                                                                <div class="search-distance-label">
                                                                                    Distance: <span
                                                                                        class="text-distance">50</span>
                                                                                    miles </div>
                                                                                <div class="search-distance-wrapper">
                                                                                    <input type="hidden"
                                                                                        name="filter-distance"
                                                                                        value="50">
                                                                                    <div
                                                                                        class="search-distance-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                                                        <div class="ui-slider-handle distance-custom-handle ui-corner-all ui-state-default"
                                                                                            tabindex="0"
                                                                                            data-value="50"
                                                                                            style="left: 50%;">
                                                                                        </div>
                                                                                        <div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min"
                                                                                            style="width: 50%;">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /.form-group -->

                                                                </div> --}}
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-12 form-group-search">
                                                                <div class="btn-submit w-100 btn btn-theme btn-inverse clear-filter same_tag"
                                                                    onclick="clearfilter();">Clear All Filters<i
                                                                        class="flaticon-right-up next"></i></div>
                                                                {{-- <button
                                                                        class="btn-submit w-100 btn btn-theme btn-inverse clear-filter same_tag"
                                                                        type="submit" onclick="clearfilter();">
                                                                        Clear All Filters<i
                                                                            class="flaticon-right-up next"></i>
                                                                    </button> --}}
                                                            </div>
                                                        </div>
                                                        <!-- Save Search -->
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </form> --}}
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
