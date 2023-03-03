@extends('layouts.home')
@section('content')

    <div id="wrapper-container" class="wrapper-container">
        <div id="apus-main-content">
            <section id="main-container" class="container inner">
                <div class="row">
                    <div id="main-content" class="main-page col-12">
                        <div id="main" class="site-main clearfix" role="main">

                            <div data-elementor-type="wp-page" data-elementor-id="26" class="elementor elementor-26">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-3c422cc elementor-section-stretched elementor-section-content-bottom elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="3c422cc" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-dbaf634"
                                            data-id="dbaf634" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-8a9b415 elementor-invisible elementor-widget elementor-widget-heading"
                                                    data-id="8a9b415" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}"
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
                                                        <h2 class="elementor-heading-title elementor-size-default">
                                                            Be Your Own Boss</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-b17a195 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-text-editor"
                                                    data-id="b17a195" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}"
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
                                                        </style> It’s a marketplace which helps workers who are seeking
                                                        for work
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-8e9df33 elementor-widget elementor-widget-apus_element_service_search_form animated slide-up"
                                                    data-id="8e9df33" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}"
                                                    data-widget_type="apus_element_service_search_form.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-listing-search-form   horizontal">
                                                            {{ Form::open(['url' => url('gigs'), 'method' => 'post', 'class' => 'searchform form-search filter-listing-form', 'id' => 'searchform']) }}
                                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                                            <div class="search-form-inner">
                                                                <div class="main-inner clearfix">
                                                                    <div class="content-main-inner">
                                                                        <div
                                                                            class="row row-20 align-items-center list-fileds">
                                                                            <div
                                                                                class="item-column col-12 col-md-6 col-lg-6  has-icon">
                                                                                <div class="form-group form-group-title  ">
                                                                                    <div
                                                                                        class="form-group-inner inner has-icon">
                                                                                        <i class="flaticon-loupe"></i>
                                                                                        <span class="twitter-typeahead"
                                                                                            style="position: relative; display: inline-block;">
                                                                                            <input type="text"
                                                                                                name="filter-title"
                                                                                                class="form-control apus-autocompleate-input autocompleate-service tt-input"
                                                                                                value=""
                                                                                                id="RmPhI_title"
                                                                                                placeholder="What are you looking for?"
                                                                                                autocomplete="off"
                                                                                                spellcheck="false"
                                                                                                dir="auto"
                                                                                                style="position: relative; vertical-align: top; background-color: transparent;">
                                                                                        </span>
                                                                                    </div>
                                                                                </div><!-- /.form-group -->
                                                                            </div>
                                                                            <div
                                                                                class="item-column col-12 col-md-4 col-lg-4   item-last">
                                                                                <div
                                                                                    class="form-group form-group-category   tax-select-field">
                                                                                    <div class="form-group-inner inner ">
                                                                                        <select name="filter-category"
                                                                                            class="form-control"
                                                                                            id="HRzSC_category"
                                                                                            data-placeholder="Choose Category">

                                                                                            <option value="">
                                                                                                Choose Category
                                                                                            </option>
                                                                                            @if ($globalCategories)
                                                                                                @foreach ($globalCategories as $cat)
                                                                                                    <option class="level-0"
                                                                                                        value="47">
                                                                                                        {!! $cat->name !!}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif

                                                                                        </select>
                                                                                    </div>
                                                                                </div><!-- /.form-group -->

                                                                            </div>
                                                                            <div
                                                                                class="col-12 col-md-2 form-group-search search_btn">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-end">
                                                                                    <div class="search_btn">
                                                                                        <button
                                                                                            class="homesearch btn-submit btn w-100 btn-theme btn-inverse"
                                                                                            type="submit">
                                                                                            Search </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" value="1" id="pageidd"
                                                                name="page">
                                                            <input type="hidden" id="is_service_selected"
                                                                name="is_service_selected" class="is_service_selected">
                                                            {{ Form::close() }}
                                                            <div class="searchgig" id="searchgig">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <section
                                                    class="elementor-section elementor-inner-section elementor-element elementor-element-21c3332 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                    data-id="21c3332" data-element_type="section">
                                                    <div class="elementor-container elementor-column-gap-no">
                                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-5f2cc6a elementor-invisible"
                                                            data-id="5f2cc6a" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-6fc48dd st_inherit elementor-widget elementor-widget-counter"
                                                                    data-id="6fc48dd" data-element_type="widget"
                                                                    data-widget_type="counter.default">
                                                                    <div class="elementor-widget-container">
                                                                        <style>
                                                                            /*! elementor - v3.8.1 - 13-11-2022 */
                                                                            .elementor-counter .elementor-counter-number-wrapper {
                                                                                display: -webkit-box;
                                                                                display: -ms-flexbox;
                                                                                display: flex;
                                                                                font-size: 69px;
                                                                                font-weight: 600;
                                                                                line-height: 1
                                                                            }

                                                                            .elementor-counter .elementor-counter-number-prefix,
                                                                            .elementor-counter .elementor-counter-number-suffix {
                                                                                -webkit-box-flex: 1;
                                                                                -ms-flex-positive: 1;
                                                                                flex-grow: 1;
                                                                                white-space: pre-wrap
                                                                            }

                                                                            .elementor-counter .elementor-counter-number-prefix {
                                                                                text-align: right
                                                                            }

                                                                            .elementor-counter .elementor-counter-number-suffix {
                                                                                text-align: left
                                                                            }

                                                                            .elementor-counter .elementor-counter-title {
                                                                                text-align: center;
                                                                                font-size: 19px;
                                                                                font-weight: 400;
                                                                                line-height: 2.5
                                                                            }
                                                                        </style>
                                                                        <div class="elementor-counter">
                                                                            <div class="elementor-counter-number-wrapper">
                                                                                <span
                                                                                    class="elementor-counter-number-prefix"></span>
                                                                                <span class="elementor-counter-number"
                                                                                    data-duration="2000"
                                                                                    data-to-value="960"
                                                                                    data-from-value="0"
                                                                                    data-delimiter=",">0</span>
                                                                                <span
                                                                                    class="elementor-counter-number-suffix">M</span>
                                                                            </div>
                                                                            <div class="elementor-counter-title">Total
                                                                                Freelancer</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-43fa34c elementor-invisible"
                                                            data-id="43fa34c" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:200}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-5663fef st_inherit elementor-widget elementor-widget-counter"
                                                                    data-id="5663fef" data-element_type="widget"
                                                                    data-widget_type="counter.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-counter">
                                                                            <div class="elementor-counter-number-wrapper">
                                                                                <span
                                                                                    class="elementor-counter-number-prefix"></span>
                                                                                <span class="elementor-counter-number"
                                                                                    data-duration="2000"
                                                                                    data-to-value="850"
                                                                                    data-from-value="0"
                                                                                    data-delimiter=",">0</span>
                                                                                <span
                                                                                    class="elementor-counter-number-suffix">M</span>
                                                                            </div>
                                                                            <div class="elementor-counter-title">
                                                                                Positive Review</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-dc3da86 elementor-invisible"
                                                            data-id="dc3da86" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:400}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-c3c60ae st_inherit elementor-widget elementor-widget-counter"
                                                                    data-id="c3c60ae" data-element_type="widget"
                                                                    data-widget_type="counter.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-counter">
                                                                            <div class="elementor-counter-number-wrapper">
                                                                                <span
                                                                                    class="elementor-counter-number-prefix"></span>
                                                                                <span class="elementor-counter-number"
                                                                                    data-duration="2000"
                                                                                    data-to-value="98" data-from-value="0"
                                                                                    data-delimiter=",">0</span>
                                                                                <span
                                                                                    class="elementor-counter-number-suffix">M</span>
                                                                            </div>
                                                                            <div class="elementor-counter-title">Order
                                                                                recieved</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-a1dd52f elementor-invisible"
                                                            data-id="a1dd52f" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:600}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-f3e25b6 st_inherit elementor-widget elementor-widget-counter"
                                                                    data-id="f3e25b6" data-element_type="widget"
                                                                    data-widget_type="counter.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="elementor-counter">
                                                                            <div class="elementor-counter-number-wrapper">
                                                                                <span
                                                                                    class="elementor-counter-number-prefix"></span>
                                                                                <span class="elementor-counter-number"
                                                                                    data-duration="2000"
                                                                                    data-to-value="250"
                                                                                    data-from-value="0"
                                                                                    data-delimiter=",">0</span>
                                                                                <span
                                                                                    class="elementor-counter-number-suffix">M</span>
                                                                            </div>
                                                                            <div class="elementor-counter-title">
                                                                                Projects Completed</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3b6a3b4 elementor-hidden-tablet elementor-hidden-mobile"
                                            data-id="3b6a3b4" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-71870f0 elementor-widget elementor-widget-apus_element_revslider"
                                                    data-id="71870f0" data-element_type="widget"
                                                    data-widget_type="apus_element_revslider.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-revslider ">

                                                            <!-- START Slider 2 REVOLUTION SLIDER 6.5.12 -->
                                                            <p class="rs-p-wp-fix"></p>
                                                            <rs-module-wrap id="rev_slider_1_1_wrapper"
                                                                data-source="gallery"
                                                                style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
                                                                <rs-module id="rev_slider_1_1" style=""
                                                                    data-version="6.5.12">
                                                                    <rs-slides>
                                                                        <rs-slide style="position: absolute;"
                                                                            data-key="rs-1" data-title="Slide"
                                                                            data-in="o:0;row:400;" data-out="a:false;">
                                                                            <img decoding="async" loading="lazy"
                                                                                src="//demoapus1.com/freeio/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                alt="" title="h12"
                                                                                width="723" height="611"
                                                                                class="rev-slidebg tp-rs-img rs-lazyload"
                                                                                data-lazyload="//demoapus1.com/freeio/wp-content/uploads/2022/09/h12.png"
                                                                                data-bg="f:auto;" data-parallax="off"
                                                                                data-no-retina>
                                                                            <!----><a id="slider-1-slide-1-layer-0"
                                                                                class="rs-layer rs-pxl-1" href=""
                                                                                target="_self" data-type="image"
                                                                                data-rsp_ch="on"
                                                                                data-xy="xo:128px,128px,118px,60px;yo:101px,101px,101px,48px;"
                                                                                data-text="w:normal;s:20,20,20,13;l:0,0,0,17;"
                                                                                data-dim="w:368px,368px,368px,300px;h:170px,170px,170px,139px;"
                                                                                data-frame_0="x:50,50,50,34;"
                                                                                data-frame_1="st:1130;sp:600;sR:1130;"
                                                                                data-frame_999="o:0;st:w;sR:7270;"
                                                                                style="z-index:10;"><img decoding="async"
                                                                                    loading="lazy"
                                                                                    src="//demoapus1.com/freeio/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                    alt=""
                                                                                    class="tp-rs-img rs-lazyload"
                                                                                    width="368" height="170"
                                                                                    data-lazyload="//demoapus1.com/freeio/wp-content/uploads/2022/10/link1.png"
                                                                                    data-no-retina>
                                                                            </a>
                                                                            <!--

                                                           --><a id="slider-1-slide-1-layer-1" class="rs-layer rs-pxl-1"
                                                                                href="" target="_self"
                                                                                data-type="image" data-rsp_ch="on"
                                                                                data-xy="xo:525px,525px,375px,217px;yo:397px,397px,247px,169px;"
                                                                                data-text="w:normal;s:20,20,20,13;l:0,0,0,17;"
                                                                                data-dim="w:368px,368px,368px,300px;h:170px,170px,170px,139px;"
                                                                                data-frame_0="x:50,50,50,34;"
                                                                                data-frame_1="st:1720;sp:600;sR:1720;"
                                                                                data-frame_999="o:0;st:w;sR:6680;"
                                                                                style="z-index:9;"><img decoding="async"
                                                                                    loading="lazy"
                                                                                    src="//demoapus1.com/freeio/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                    alt=""
                                                                                    class="tp-rs-img rs-lazyload"
                                                                                    width="368" height="170"
                                                                                    data-lazyload="//demoapus1.com/freeio/wp-content/uploads/2022/10/link2.png"
                                                                                    data-no-retina>
                                                                            </a>
                                                                            <!--

                                                           --><a id="slider-1-slide-1-layer-2" class="rs-layer rs-pxl-1"
                                                                                href="https://demoapus1.com/freeio/freelancer/"
                                                                                target="_self" data-type="image"
                                                                                data-rsp_ch="on"
                                                                                data-xy="xo:53px,53px,53px,-14px;yo:519px,519px,389px,306px;"
                                                                                data-text="w:normal;s:20,20,20,13;l:0,0,0,17;"
                                                                                data-dim="w:442px,442px,442px,350px;h:148px,148px,148px,117px;"
                                                                                data-frame_0="y:50,50,50,34;"
                                                                                data-frame_1="st:2290;sp:600;sR:2290;"
                                                                                data-frame_999="o:0;st:w;sR:6110;"
                                                                                style="z-index:8;"><img decoding="async"
                                                                                    loading="lazy"
                                                                                    src="//demoapus1.com/freeio/wp-content/plugins/revslider/public/assets/assets/dummy.png"
                                                                                    alt=""
                                                                                    class="tp-rs-img rs-lazyload"
                                                                                    width="442" height="148"
                                                                                    data-lazyload="//demoapus1.com/freeio/wp-content/uploads/2022/10/link3.png"
                                                                                    data-no-retina>
                                                                            </a>
                                                                            <!--
                                                    -->
                                                                        </rs-slide>
                                                                    </rs-slides>
                                                                </rs-module>
                                                                <script>
                                                                    setREVStartSize({
                                                                        c: 'rev_slider_1_1',
                                                                        rl: [1920, 1601, 1025, 480],
                                                                        el: [620, 620, 500, 400],
                                                                        gw: [700, 700, 700, 480],
                                                                        gh: [620, 620, 500, 400],
                                                                        type: 'standard',
                                                                        justify: '',
                                                                        layout: 'fullwidth',
                                                                        mh: "0"
                                                                    });
                                                                    if (window.RS_MODULES !== undefined && window.RS_MODULES.modules !== undefined && window.RS_MODULES.modules[
                                                                            "revslider11"] !== undefined) {
                                                                        window.RS_MODULES.modules["revslider11"].once = false;
                                                                        window.revapi1 = undefined;
                                                                        if (window.RS_MODULES.checkMinimal !== undefined) window.RS_MODULES.checkMinimal()
                                                                    }
                                                                </script>
                                                            </rs-module-wrap>
                                                            <!-- END REVOLUTION SLIDER -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-02cd312 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                    data-id="02cd312" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e534ffe"
                                            data-id="e534ffe" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-765d11b elementor-widget elementor-widget-heading"
                                                    data-id="765d11b" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default">
                                                            Need something done?</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-8b6ac53 elementor-widget elementor-widget-text-editor"
                                                    data-id="8b6ac53" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        Most viewed and all-time top-selling services </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-bdc80b0 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="bdc80b0" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-88a051a elementor-invisible"
                                            data-id="88a051a" data-element_type="column"
                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1753839 elementor-widget elementor-widget-apus_element_features_box"
                                                    data-id="1753839" data-element_type="widget"
                                                    data-widget_type="apus_element_features_box.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-features-box ">
                                                            <div class="row">
                                                                <div class="item col-12 col-md-12 col-lg-12">
                                                                    <div class="item-features-inner style1">
                                                                        <div class="top-inner position-relative">
                                                                            <div class="features-box-image icon"><i
                                                                                    class="flaticon-cv"></i></div>
                                                                        </div>
                                                                        <div class="features-box-content">
                                                                            <h3 class="title">Post a job</h3>
                                                                            <div class="description">It’s free and
                                                                                easy to post a job. Simply fill in a
                                                                                title, description.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-6a63dd8 elementor-invisible"
                                            data-id="6a63dd8" data-element_type="column"
                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:200}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-a3020c0 elementor-widget elementor-widget-apus_element_features_box"
                                                    data-id="a3020c0" data-element_type="widget"
                                                    data-widget_type="apus_element_features_box.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-features-box ">
                                                            <div class="row">
                                                                <div class="item col-12 col-md-12 col-lg-12">
                                                                    <div class="item-features-inner style1">
                                                                        <div class="top-inner position-relative">
                                                                            <div class="features-box-image icon"><i
                                                                                    class="flaticon-web-design"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="features-box-content">
                                                                            <h3 class="title">Choose freelancers</h3>
                                                                            <div class="description">It’s free and
                                                                                easy to post a job. Simply fill in a
                                                                                title, description.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-7ba5175 elementor-invisible"
                                            data-id="7ba5175" data-element_type="column"
                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:400}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-e0792ae elementor-widget elementor-widget-apus_element_features_box"
                                                    data-id="e0792ae" data-element_type="widget"
                                                    data-widget_type="apus_element_features_box.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-features-box ">
                                                            <div class="row">
                                                                <div class="item col-12 col-md-12 col-lg-12">
                                                                    <div class="item-features-inner style1">
                                                                        <div class="top-inner position-relative">
                                                                            <div class="features-box-image icon"><i
                                                                                    class="flaticon-secure"></i></div>
                                                                        </div>
                                                                        <div class="features-box-content">
                                                                            <h3 class="title">Pay safely</h3>
                                                                            <div class="description">It’s free and
                                                                                easy to post a job. Simply fill in a
                                                                                title, description.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-3465f77 elementor-invisible"
                                            data-id="3465f77" data-element_type="column"
                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:600}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-e87780e elementor-widget elementor-widget-apus_element_features_box"
                                                    data-id="e87780e" data-element_type="widget"
                                                    data-widget_type="apus_element_features_box.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-features-box ">
                                                            <div class="row">
                                                                <div class="item col-12 col-md-12 col-lg-12">
                                                                    <div class="item-features-inner style1">
                                                                        <div class="top-inner position-relative">
                                                                            <div class="features-box-image icon"><i
                                                                                    class="flaticon-customer-service"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="features-box-content">
                                                                            <h3 class="title">We’re here to help</h3>
                                                                            <div class="description">It’s free and
                                                                                easy to post a job. Simply fill in a
                                                                                title, description.</div>
                                                                        </div>
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
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-4a8d9b0 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                    data-id="4a8d9b0" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-97112e1"
                                            data-id="97112e1" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-c9849ee elementor-widget elementor-widget-apus_element_services_tabs"
                                                    data-id="c9849ee" data-element_type="widget"
                                                    data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;columns_tablet&quot;:&quot;2&quot;,&quot;slides_to_scroll&quot;:&quot;4&quot;}"
                                                    data-widget_type="apus_element_services_tabs.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-services-tabs carousel ">
                                                            <div class="top-widget-info d-xl-flex align-items-end">
                                                                <div class="inner-left">
                                                                    <h2 class="widget-title">Popular Services</h2>
                                                                    <div class="des">Most viewed and all-time
                                                                        top-selling services</div>
                                                                </div>
                                                                {{-- <ul role="tablist"
                                                                    class="nav nav-tabs nav-categories justify-content-xl-center">
                                                                    <li class="nav-item">
                                                                        <a href="#tab-0DNG5-0" class="active"
                                                                            data-bs-toggle="tab">
                                                                            Write and Translation </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#tab-0DNG5-1" class=""
                                                                            data-bs-toggle="tab">
                                                                            Graphic and Design</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#tab-0DNG5-2" class=""
                                                                            data-bs-toggle="tab">
                                                                            Digital Marketing </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a href="#tab-0DNG5-3" class=""
                                                                            data-bs-toggle="tab">
                                                                            Banquetes </a>
                                                                    </li>
                                                                </ul> --}}
                                                            </div>
                                                            <div class="tab-content">
                                                                <div id="tab-0DNG5-0" class="tab-pane fade active show">
                                                                    <div class="slick-carousel hidden-dots" data-items="4"
                                                                        data-large="2" data-medium="1" data-small="1"
                                                                        data-smallest="1" data-slidestoscroll="4"
                                                                        data-slidestoscroll_large="4"
                                                                        data-slidestoscroll_medium="4"
                                                                        data-slidestoscroll_small="1"
                                                                        data-slidestoscroll_smallest="1"
                                                                        data-pagination="false" data-nav="false"
                                                                        data-rows="2" data-infinite="true"
                                                                        data-autoplay="true">
                                                                        @if ($globalCategories)
                                                                            @foreach ($globalCategories as $cat)
                                                                                <div class="item">


                                                                                    <article
                                                                                        class="map-item service-item post-5556 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-design-creative service_category-digital-marketing"
                                                                                        data-latitude="40.77693245895672"
                                                                                        data-longitude="-73.9212720020022"
                                                                                        data-img="" data-logo="">
                                                                                        <div class="position-relative">
                                                                                            <div class="service-image">
                                                                                                <a
                                                                                                    href="{{ URL::to('gigs/' . $cat->slug) }}">
                                                                                                    <div
                                                                                                        class="image-wrapper">
                                                                                                        {{ HTML::image('public/files/categories/full/' . $cat->home_image, SITE_TITLE, ['style' => 'width:400px;height:260px']) }}
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                            {{-- <a href="javascript:void(0)"
                                                                                                class="btn-add-service-favorite"
                                                                                                data-service_id="5556"
                                                                                                data-nonce="65b95b3098"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="Add Favorite">
                                                                                                <i
                                                                                                    class="flaticon-like"></i>
                                                                                                <span>Save</span>
                                                                                            </a> --}}
                                                                                        </div>

                                                                                        <div class="service-information">
                                                                                            <div class="category-service">
                                                                                                <p>{!! $cat->sub_title !!}
                                                                                                </p>
                                                                                            </div>

                                                                                            <h2 class="service-title">
                                                                                                <a
                                                                                                    href="{{ URL::to('gigs/' . $cat->slug) }}">{!! $cat->name !!}</a>
                                                                                            </h2>
                                                                                            {{-- <h3>{!! $cat->name !!}</h3> --}}

                                                                                            {{-- <div class="rating-reviews">
                                                                                                <i class="fa fa-star"></i>
                                                                                                <span
                                                                                                    class="rating">4.5</span>
                                                                                                <span class="text">(2
                                                                                                    Reviews)</span>
                                                                                            </div> --}}
                                                                                            {{-- <div
                                                                                                class="info-bottom d-flex align-items-center">
                                                                                                <div
                                                                                                    class="service-author">
                                                                                                    <a href="">
                                                                                                        <div
                                                                                                            class="freelancer-logo d-flex align-items-center">
                                                                                                            <img loading="lazy"
                                                                                                                width="150"
                                                                                                                height="150"
                                                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-150x150.jpg"
                                                                                                                class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                                                alt=""
                                                                                                                decoding="async"
                                                                                                                srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/5.jpg 420w"
                                                                                                                sizes="(max-width: 150px) 100vw, 150px" />
                                                                                                        </div>
                                                                                                        <span
                                                                                                            class="text">
                                                                                                            John Powell
                                                                                                        </span>
                                                                                                    </a>
                                                                                                </div>
                                                                                                <div class="ms-auto">
                                                                                                    <div
                                                                                                        class="service-salary with-title">
                                                                                                        <span
                                                                                                            class="text">Starting
                                                                                                            at:</span>
                                                                                                        <span><span
                                                                                                                class="woocommerce-Price-amount amount"><bdi><span
                                                                                                                        class="woocommerce-Price-currencySymbol">&#36;</span>128</bdi></span></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div> --}}
                                                                                        </div>
                                                                                    </article><!-- #post-## -->
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="bottom-remore text-center">
                                                                    <a class="btn btn-theme-rgba10 radius-50"
                                                                        href="#" target="_self">All Services<i
                                                                            class="flaticon-right-up next"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-e05fffb elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="e05fffb" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-47fb641"
                                            data-id="47fb641" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-3db2ee6 elementor-invisible elementor-widget elementor-widget-heading"
                                                    data-id="3db2ee6" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;}"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default">For
                                                            clients</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6b650a2 elementor-invisible elementor-widget elementor-widget-heading"
                                                    data-id="6b650a2" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:150}"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default">
                                                            Find talent your way</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-cf90e93 elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-text-editor"
                                                    data-id="cf90e93" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:300}"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        Work with the largest network of independent professionals and
                                                        get things done—from quick turnarounds to big transformations.
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0979e0b elementor-invisible elementor-widget elementor-widget-button"
                                                    data-id="0979e0b" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:450}"
                                                    data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a href="#"
                                                                class="elementor-button-link elementor-button elementor-size-sm"
                                                                role="button">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span
                                                                        class="elementor-button-icon elementor-align-icon-right">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="17"
                                                                            viewBox="0 0 16 17" fill="currentColor">
                                                                            <path
                                                                                d="M15.5553 0.670898H5.77756C5.53189 0.670898 5.3331 0.86969 5.3331 1.11536C5.3331 1.36102 5.53189 1.55982 5.77756 1.55982H14.4824L0.129975 15.9122C-0.0436504 16.0859 -0.0436504 16.3671 0.129975 16.5407C0.216766 16.6275 0.330516 16.6709 0.444225 16.6709C0.557933 16.6709 0.671641 16.6275 0.758475 16.5407L15.1109 2.18827V10.8931C15.1109 11.1388 15.3097 11.3376 15.5553 11.3376C15.801 11.3376 15.9998 11.1388 15.9998 10.8931V1.11536C15.9998 0.86969 15.801 0.670898 15.5553 0.670898Z"
                                                                                fill="currentColor"></path>
                                                                        </svg> </span>
                                                                    <span class="elementor-button-text">Contact
                                                                        Us</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-8fa5b08"
                                            data-id="8fa5b08" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-ce99fff elementor-widget__width-auto elementor-absolute elementor-invisible elementor-widget elementor-widget-text-editor"
                                                    data-id="ce99fff" data-element_type="widget"
                                                    data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;slide-left&quot;,&quot;_animation_delay&quot;:300}"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="tick-2">
                                                            <li><i class="flaticon-tick"></i>The best for every budget
                                                            </li>
                                                            <li><i class="flaticon-tick"></i>Quality work done quickly
                                                            </li>
                                                            <li><i class="flaticon-tick"></i>Protected payments, every
                                                                time</li>
                                                            <li><i class="flaticon-tick"></i>24/7 support</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6b8276b elementor-invisible elementor-widget elementor-widget-image"
                                                    data-id="6b8276b" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;scale&quot;}"
                                                    data-widget_type="image.default">
                                                    <div class="elementor-widget-container">
                                                        <style>
                                                            /*! elementor - v3.8.1 - 13-11-2022 */
                                                            .elementor-widget-image {
                                                                text-align: center
                                                            }

                                                            .elementor-widget-image a {
                                                                display: inline-block
                                                            }

                                                            .elementor-widget-image a img[src$=".svg"] {
                                                                width: 48px
                                                            }

                                                            .elementor-widget-image img {
                                                                vertical-align: middle;
                                                                display: inline-block
                                                            }
                                                        </style> <img decoding="async" width="627" height="720"
                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/h2.png"
                                                            class="attachment-full size-full" alt=""
                                                            loading="lazy"
                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/09/h2.png 627w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/h2-600x689.png 600w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/h2-261x300.png 261w"
                                                            sizes="(max-width: 627px) 100vw, 627px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-7d3acca elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                    data-id="7d3acca" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0e0f4e1"
                                            data-id="0e0f4e1" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-622611d elementor-widget elementor-widget-text-editor"
                                                    data-id="622611d" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        Trusted by the world’s best </div>
                                                </div>
                                                <div class="elementor-element elementor-element-47e09d6 elementor-widget elementor-widget-apus_element_brands"
                                                    data-id="47e09d6" data-element_type="widget"
                                                    data-widget_type="apus_element_brands.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-brand  carousel default">
                                                            <div class="slick-carousel" data-items="6" data-smalldesktop=6
                                                                data-medium="4" data-smallmedium="3" data-extrasmall="3"
                                                                data-smallest="3" data-pagination="false"
                                                                data-nav="true">

                                                                <div class="item">
                                                                    <div
                                                                        class="brand-item flex-middle justify-content-center">
                                                                        <a href="#">
                                                                            <img decoding="async"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/b1.png"
                                                                                alt="Image">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="item">
                                                                    <div
                                                                        class="brand-item flex-middle justify-content-center">
                                                                        <a href="#">
                                                                            <img decoding="async"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/b2.png"
                                                                                alt="Image">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="item">
                                                                    <div
                                                                        class="brand-item flex-middle justify-content-center">
                                                                        <a href="#">
                                                                            <img decoding="async"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/b3.png"
                                                                                alt="Image">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="item">
                                                                    <div
                                                                        class="brand-item flex-middle justify-content-center">
                                                                        <a href="#">
                                                                            <img decoding="async"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/b4.png"
                                                                                alt="Image">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="item">
                                                                    <div
                                                                        class="brand-item flex-middle justify-content-center">
                                                                        <a href="#">
                                                                            <img decoding="async"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/b5.png"
                                                                                alt="Image">
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="item">
                                                                    <div
                                                                        class="brand-item flex-middle justify-content-center">
                                                                        <a href="#">
                                                                            <img decoding="async"
                                                                                src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/b6.png"
                                                                                alt="Image">
                                                                        </a>
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
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-b34ca04 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                    data-id="b34ca04" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-fdc088f"
                                            data-id="fdc088f" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-92c98b4 elementor-widget elementor-widget-apus_element_service_categories"
                                                    data-id="92c98b4" data-element_type="widget"
                                                    data-settings="{&quot;columns&quot;:&quot;5&quot;,&quot;columns_tablet&quot;:&quot;4&quot;,&quot;columns_mobile&quot;:&quot;2&quot;,&quot;slides_to_scroll&quot;:1}"
                                                    data-widget_type="apus_element_service_categories.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-service-categories ">
                                                            <div class="top-widget-info d-md-flex align-items-end">
                                                                <div class="inner-left">
                                                                    <h2 class="widget-title">Browse talent by category
                                                                    </h2>
                                                                    <div class="des">Get some Inspirations from
                                                                        1800+ skills</div>
                                                                </div>
                                                                <div class="view_more ms-auto">
                                                                    <a href="#"
                                                                        class="btn btn-small btn-theme-rgba10 radius-50">
                                                                        All Category<i class="flaticon-right-up next"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="slick-carousel " data-items="5" data-large="4"
                                                                data-medium="4" data-small="2" data-smallest="2"
                                                                data-slidestoscroll="1" data-slidestoscroll_large="1"
                                                                data-slidestoscroll_medium="1"
                                                                data-slidestoscroll_small="1"
                                                                data-slidestoscroll_smallest="1" data-pagination="false"
                                                                data-nav="true" data-rows="1" data-infinite="true"
                                                                data-autoplay="false">
                                                                @if ($globalCategories)
                                                                    @foreach ($globalCategories as $cat)
                                                                        <div class="item">
                                                                            <a class="category-banner-inner style2"
                                                                                href="{{ URL::to('gigs/' . $cat->slug) }}">

                                                                                <div class="banner-image image">
                                                                                    <div class="image-wrapper">
                                                                                        {{ HTML::image('public/files/categories/full/' . $cat->home_image, SITE_TITLE, ['width' => '260px']) }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="inner">

                                                                                    <div class="number">
                                                                                        {!! $cat->name !!}</div>
                                                                                    <h4 class="title">
                                                                                        <p>{!! $cat->description !!}</p>
                                                                                    </h4>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-45d2670 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                    data-id="45d2670" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;animation&quot;:&quot;slide-up&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-de3ba20"
                                            data-id="de3ba20" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-b2eac18 elementor-widget elementor-widget-apus_element_freeio_freelancers"
                                                    data-id="b2eac18" data-element_type="widget"
                                                    data-settings="{&quot;columns&quot;:&quot;4&quot;,&quot;slides_to_scroll&quot;:1}"
                                                    data-widget_type="apus_element_freeio_freelancers.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-freelancers carousel ">
                                                            <div class="top-widget-info d-md-flex align-items-end">
                                                                <div class="inner-left">
                                                                    <h2 class="widget-title">Freelancers</h2>
                                                                    <div class="des">Lorem ipsum dolor sit
                                                                        amet,
                                                                        consectetur.</div>
                                                                </div>
                                                                {{-- <div class="view_more ms-auto">
                                                                    <a href=""
                                                                        class="btn btn-small btn-theme-rgba10 radius-50">
                                                                        All Freelancers<i
                                                                            class="flaticon-right-up next"></i>
                                                                    </a>
                                                                </div> --}}
                                                            </div>
                                                            <div class="widget-content">
                                                                <div class="slick-carousel " data-items="4"
                                                                    data-large="2" data-medium="2" data-small="1"
                                                                    data-smallest="1" data-slidestoscroll="1"
                                                                    data-slidestoscroll_large="1"
                                                                    data-slidestoscroll_medium="1"
                                                                    data-slidestoscroll_small="1"
                                                                    data-slidestoscroll_smallest="1"
                                                                    data-pagination="true" data-nav="false"
                                                                    data-rows="1" data-infinite="true"
                                                                    data-autoplay="true">
                                                                    @foreach ($userinfo as $allrecord)
                                                                        @if (isset($allrecord))
                                                                            <div class="item">
                                                                                <article id="post-4100"
                                                                                    class="map-item freelancer-card post-4100 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-digital-marketing freelancer_category-graphics-design freelancer_tag-design-writing freelancer_tag-html5 freelancer_tag-prototyping"
                                                                                    data-latitude="" data-longitude=""
                                                                                    data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/12-150x150.jpg">
                                                                                    <div
                                                                                        class="freelancer-item position-relative">

                                                                                        <div
                                                                                            class="freelancer-logo d-flex align-items-center">
                                                                                            @if ($allrecord->profile_image)
                                                                                                <a
                                                                                                    href="{{ URL::to('public-profile/' . $allrecord->slug) }}">
                                                                                                    {{ HTML::image(PROFILE_SMALL_DISPLAY_PATH . $allrecord->profile_image, SITE_TITLE, ['id' => 'pimage']) }}
                                                                                                </a>
                                                                                            @else
                                                                                                <a
                                                                                                    href="{{ URL::to('public-profile/' . $allrecord->slug) }}">{{ HTML::image('public/img/front/user-img.png', SITE_TITLE, ['id' => 'pimage']) }}</a>
                                                                                            @endif
                                                                                        </div>
                                                                                        {{-- <a href="javascript:void(0)"
                                                                                            class="btn-add-freelancer-favorite"
                                                                                            data-freelancer_id="4100"
                                                                                            data-nonce="ec30db77ea"
                                                                                            data-toggle="tooltip"
                                                                                            title="Add Favorite">
                                                                                            <i class="flaticon-like"></i>
                                                                                            <span>Save</span>
                                                                                        </a> --}}
                                                                                        <div class="inner-bottom">
                                                                                            <div class="text-center">
                                                                                                <h2
                                                                                                    class="freelancer-title">
                                                                                                    <a href="{{ URL::to('public-profile/' . $allrecord->slug) }}"
                                                                                                        rel="bookmark">
                                                                                                        {{ $allrecord->first_name }}
                                                                                                        {{ $allrecord->last_name }}</a>
                                                                                                </h2>

                                                                                                <div
                                                                                                    class="freelancer-job">
                                                                                                    <?php if ($allrecord->user_status == 'Online') {
                                                                                                     ?>
                                                                                                    <div
                                                                                                        class="div_status is-online">
                                                                                                        <i class="fa fa-circle"
                                                                                                            style="font-size: 10px;"></i>
                                                                                                        <?php echo $allrecord->user_status; ?>
                                                                                                    </div>
                                                                                                    <?php    }?>
                                                                                                    <?php if ($allrecord->user_status == 'Offline') { ?>
                                                                                                    <div
                                                                                                        class="div_status is-offline">
                                                                                                        <i class="fa fa-circle"
                                                                                                            style="font-size: 10px;"></i>
                                                                                                        <?php echo $allrecord->user_status; ?>
                                                                                                    </div>
                                                                                                    <?php   } ?>
                                                                                                    {{-- {{ $allrecord->user_status }} --}}
                                                                                                </div>
                                                                                                <div
                                                                                                    class="rating-reviews">
                                                                                                    <i
                                                                                                        class="fa fa-star"></i>
                                                                                                    <span
                                                                                                        class="rating text-link">
                                                                                                        {{ $allrecord->average_rating }}</span>
                                                                                                    <span
                                                                                                        class="text">({{ $allrecord->total_review }}
                                                                                                        Review)</span>
                                                                                                </div>

                                                                                                {{-- <div
                                                                                                    class="freelancer-tags">
                                                                                                            <a class="tag-freelancer" 
                                                                                                                href="">{!! $allrecord->description !!}</a>
                                                                                                       
                                                                                                   
                                                                                                    <span
                                                                                                        class="count-more-tags">+1</span>

                                                                                                </div> --}}
                                                                                            </div>
                                                                                            <div
                                                                                                class="freelancer-metas d-flex align-items-center">
                                                                                                <div
                                                                                                    class="freelancer-location with-title">
                                                                                                    <strong>Location:</strong>
                                                                                                    <a
                                                                                                        href="">{{ $allrecord->city }}</a>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="freelancer-salary with-title">
                                                                                                    <strong>
                                                                                                        Linked
                                                                                                        Accounts</strong>
                                                                                                    <span>
                                                                                                        <ul
                                                                                                            class="linked-acc">
                                                                                                            @if ($allrecord->facebook_id)
                                                                                                                <li>
                                                                                                                    <i class='fab fa-facebook-f'
                                                                                                                        style='color:#2338cc'></i><span>
                                                                                                                        Facebook</span>
                                                                                                                </li>
                                                                                                            @endif
                                                                                                            @if ($allrecord->google_id)
                                                                                                                <li>
                                                                                                                    <i
                                                                                                                        class="fab fa-google-plus-g"></i>
                                                                                                                    <span>Google</span>
                                                                                                                </li>
                                                                                                            @endif
                                                                                                        </ul>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="freelancer-link">
                                                                                                <a href="{{ URL::to('public-profile/' . $allrecord->slug) }}"
                                                                                                    class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                                    Profile <i
                                                                                                        class="next flaticon-right-up"></i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </article><!-- #post-## -->
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                    {{-- <div class="item">
                                                                        <article id="post-4099"
                                                                            class="map-item freelancer-card post-4099 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-music-audio freelancer_tag-animation freelancer_tag-creative freelancer_tag-figma"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-150x150.jpg">
                                                                            <div class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a href="">
                                                                                        <img width="150" height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-150x150.jpg"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy"
                                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/5-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/5.jpg 420w"
                                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                                    </a>

                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="4099"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href=""
                                                                                                rel="bookmark">
                                                                                                John Powell </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            Product Manager </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">3.0</span>
                                                                                            <span class="text">(1
                                                                                                Review)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Animation</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Creative</a>

                                                                                            <span
                                                                                                class="count-more-tags">+1</span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a href="">Los
                                                                                                Angeles</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>55</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>60</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href=""
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div>
                                                                    <div class="item">
                                                                        <article id="post-4098"
                                                                            class="map-item freelancer-card post-4098 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-business freelancer_category-digital-marketing freelancer_tag-creative freelancer_tag-figma freelancer_tag-prototyping"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg">
                                                                            <div class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a href="">
                                                                                        <img width="150" height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy"
                                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/8.jpg 420w"
                                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                                    </a>

                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="4098"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href="https://demoapus1.com/freeio/freelancer/thomas-powell/"
                                                                                                rel="bookmark">
                                                                                                Thomas Powell </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            Design & Creative </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">4.0</span>
                                                                                            <span class="text">(1
                                                                                                Review)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/creative/">Creative</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/figma/">Figma</a>

                                                                                            <span
                                                                                                class="count-more-tags">+1</span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a
                                                                                                href="https://demoapus1.com/freeio/location/los-angeles/">Los
                                                                                                Angeles</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>30</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href="https://demoapus1.com/freeio/freelancer/thomas-powell/"
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div>
                                                                    <div class="item">
                                                                        <article id="post-4097"
                                                                            class="map-item freelancer-card post-4097 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-programming-tech freelancer_tag-creative freelancer_tag-design-writing freelancer_tag-software-design"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-150x150.jpg">
                                                                            <div class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a
                                                                                        href="https://demoapus1.com/freeio/freelancer/tom-wilson/">
                                                                                        <img width="150" height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-150x150.jpg"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy"
                                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/9.jpg 420w"
                                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                                    </a>

                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="4097"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href="https://demoapus1.com/freeio/freelancer/tom-wilson/"
                                                                                                rel="bookmark">
                                                                                                Tom Wilson </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            Marketing Manager </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">4.5</span>
                                                                                            <span class="text">(2
                                                                                                Reviews)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/creative/">Creative</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                                                Writing</a>

                                                                                            <span
                                                                                                class="count-more-tags">+1</span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a
                                                                                                href="https://demoapus1.com/freeio/location/new-york/">New
                                                                                                York</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>45</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>50</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href="https://demoapus1.com/freeio/freelancer/tom-wilson/"
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div>
                                                                    <div class="item">
                                                                        <article id="post-2056"
                                                                            class="map-item freelancer-card post-2056 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-business freelancer_category-digital-marketing freelancer_tag-design-writing freelancer_tag-figma freelancer_tag-html5"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team5-150x150.jpg">
                                                                            <div class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a
                                                                                        href="https://demoapus1.com/freeio/freelancer/robert-fox/">
                                                                                        <img width="150" height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team5-150x150.jpg"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy" /> </a>

                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="2056"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href="https://demoapus1.com/freeio/freelancer/robert-fox/"
                                                                                                rel="bookmark">
                                                                                                Robert Fox </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            Nursing Assistant </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">4.5</span>
                                                                                            <span class="text">(2
                                                                                                Reviews)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                                                Writing</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/figma/">Figma</a>

                                                                                            <span
                                                                                                class="count-more-tags">+1</span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a
                                                                                                href="https://demoapus1.com/freeio/location/new-york/">New
                                                                                                York</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>35</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href=""
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div>
                                                                    <div class="item">
                                                                        <article id="post-1918"
                                                                            class="map-item freelancer-card post-1918 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-business freelancer_category-digital-marketing freelancer_tag-design-writing freelancer_tag-figma freelancer_tag-html5 freelancer_tag-prototyping freelancer_tag-software-design"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png">
                                                                            <div class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a href="">
                                                                                        <img width="150" height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy"
                                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-150x150.png 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-298x300.png 298w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-600x604.png 600w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video-410x410.png 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/09/bg-video.png 735w"
                                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                                    </a>

                                                                                    <span class="verified"><i
                                                                                            class="flaticon-tick"></i></span>
                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="1918"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href=""
                                                                                                rel="bookmark">
                                                                                                Ali Tufan </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            UI/UX Designer </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">4.5</span>
                                                                                            <span class="text">(2
                                                                                                Reviews)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="https://demoapus1.com/freeio/freelancer-tag/design-writing/">Design
                                                                                                Writing</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Figma</a>

                                                                                            <span
                                                                                                class="count-more-tags">+3</span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a href="">Los
                                                                                                Angeles</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>15</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href=""
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div>
                                                                    <div class="item">
                                                                        <article id="post-5574"
                                                                            class="map-item freelancer-card post-5574 freelancer type-freelancer status-publish has-post-thumbnail hentry location-new-york freelancer_category-graphics-design freelancer_category-trending freelancer_tag-design-writing freelancer_tag-figma freelancer_tag-software-design"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team2-150x150.jpg">
                                                                            <div
                                                                                class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a href="">
                                                                                        <img width="150"
                                                                                            height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/team2-150x150.jpg"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy" /> </a>

                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="5574"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href=""
                                                                                                rel="bookmark">
                                                                                                Samuel Smith </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            Design & Creative </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">4.0</span>
                                                                                            <span class="text">(1
                                                                                                Review)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Design
                                                                                                Writing</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Figma</a>

                                                                                            <span
                                                                                                class="count-more-tags">+1</span>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a href="">New
                                                                                                York</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>65</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>75</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href=""
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div>
                                                                    <div class="item">
                                                                        <article id="post-5699"
                                                                            class="map-item freelancer-card post-5699 freelancer type-freelancer status-publish has-post-thumbnail hentry location-los-angeles freelancer_category-digital-marketing freelancer_tag-animation freelancer_tag-creative"
                                                                            data-latitude="" data-longitude=""
                                                                            data-img="https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-150x150.jpg">
                                                                            <div
                                                                                class="freelancer-item position-relative">
                                                                                <div
                                                                                    class="freelancer-logo d-flex align-items-center">
                                                                                    <a href="">
                                                                                        <img width="150"
                                                                                            height="150"
                                                                                            src="https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-150x150.jpg"
                                                                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                            alt=""
                                                                                            decoding="async"
                                                                                            loading="lazy"
                                                                                            srcset="https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-150x150.jpg 150w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-300x300.jpg 300w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/9-410x410.jpg 410w, https://demoapus1.com/freeio/wp-content/uploads/2022/10/9.jpg 420w"
                                                                                            sizes="(max-width: 150px) 100vw, 150px" />
                                                                                    </a>

                                                                                </div>
                                                                                <a href="javascript:void(0)"
                                                                                    class="btn-add-freelancer-favorite"
                                                                                    data-freelancer_id="5699"
                                                                                    data-nonce="ec30db77ea"
                                                                                    data-toggle="tooltip"
                                                                                    title="Add Favorite">
                                                                                    <i class="flaticon-like"></i>
                                                                                    <span>Save</span>
                                                                                </a>
                                                                                <div class="inner-bottom">
                                                                                    <div class="text-center">
                                                                                        <h2 class="freelancer-title">
                                                                                            <a href="https://demoapus1.com/freeio/freelancer/freelancer/"
                                                                                                rel="bookmark">
                                                                                                Freelancer </a>
                                                                                        </h2>

                                                                                        <div class="freelancer-job">
                                                                                            Marketing Manager </div>
                                                                                        <div class="rating-reviews">
                                                                                            <i class="fa fa-star"></i>
                                                                                            <span
                                                                                                class="rating text-link">5.0</span>
                                                                                            <span class="text">(1
                                                                                                Review)</span>
                                                                                        </div>

                                                                                        <div class="freelancer-tags">
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Animation</a>
                                                                                            <a class="tag-freelancer"
                                                                                                href="">Creative</a>


                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="freelancer-metas d-flex align-items-center">
                                                                                        <div
                                                                                            class="freelancer-location with-title">
                                                                                            <strong>Location:</strong>
                                                                                            <a href="">Los
                                                                                                Angeles</a>
                                                                                        </div>
                                                                                        <div
                                                                                            class="freelancer-salary with-title">
                                                                                            <strong>Rate:</strong>
                                                                                            <span><span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>25</bdi></span>
                                                                                                - <span
                                                                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                                                                            class="woocommerce-Price-currencySymbol">&#36;</span>30</bdi></span>
                                                                                                / hr</span>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="freelancer-link">
                                                                                        <a href=""
                                                                                            class="btn btn-theme-rgba10 w-100 radius-sm">View
                                                                                            Profile <i
                                                                                                class="next flaticon-right-up"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article><!-- #post-## -->
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-fbda096 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="fbda096" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-3430d67"
                                            data-id="3430d67" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-538814f elementor-invisible elementor-widget elementor-widget-heading"
                                                    data-id="538814f" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default">
                                                            People Love To Learn With Biznaaz</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-2931024 elementor-invisible elementor-widget elementor-widget-text-editor"
                                                    data-id="2931024" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;slide-up&quot;}"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        Lorem ipsum dolor sit amet, consectetur. </div>
                                                </div>
                                                <section
                                                    class="elementor-section elementor-inner-section elementor-element elementor-element-b0f65b3 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                    data-id="b0f65b3" data-element_type="section">
                                                    <div class="elementor-container elementor-column-gap-default">
                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-9140835 elementor-invisible"
                                                            data-id="9140835" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-9a94ded elementor-widget elementor-widget-heading"
                                                                    data-id="9a94ded" data-element_type="widget"
                                                                    data-widget_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <h2
                                                                            class="elementor-heading-title elementor-size-default">
                                                                            4.9/5</h2>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-0ba164e elementor-widget elementor-widget-text-editor"
                                                                    data-id="0ba164e" data-element_type="widget"
                                                                    data-widget_type="text-editor.default">
                                                                    <div class="elementor-widget-container">
                                                                        Clients rate professionals on Freeio </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-0577e93 elementor-invisible"
                                                            data-id="0577e93" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:200}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-fc4a5b0 elementor-widget elementor-widget-heading"
                                                                    data-id="fc4a5b0" data-element_type="widget"
                                                                    data-widget_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <h2
                                                                            class="elementor-heading-title elementor-size-default">
                                                                            90%</h2>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-54d822b elementor-widget elementor-widget-text-editor"
                                                                    data-id="54d822b" data-element_type="widget"
                                                                    data-widget_type="text-editor.default">
                                                                    <div class="elementor-widget-container">
                                                                        90% of customers are satisfied through to
                                                                        see
                                                                        their freelancers </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-0a01fe7 elementor-invisible"
                                                            data-id="0a01fe7" data-element_type="column"
                                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;,&quot;animation_delay&quot;:400}">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-8ca5034 elementor-widget elementor-widget-heading"
                                                                    data-id="8ca5034" data-element_type="widget"
                                                                    data-widget_type="heading.default">
                                                                    <div class="elementor-widget-container">
                                                                        <h2
                                                                            class="elementor-heading-title elementor-size-default">
                                                                            Award winner</h2>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-element elementor-element-4262ce7 elementor-widget elementor-widget-text-editor"
                                                                    data-id="4262ce7" data-element_type="widget"
                                                                    data-widget_type="text-editor.default">
                                                                    <div class="elementor-widget-container">
                                                                        G2’s 2022 Best Software Awards </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-b32dfc9 elementor-invisible"
                                            data-id="b32dfc9" data-element_type="column"
                                            data-settings="{&quot;animation&quot;:&quot;scale&quot;}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1b84feb elementor-widget elementor-widget-apus_element_testimonials"
                                                    data-id="1b84feb" data-element_type="widget"
                                                    data-settings="{&quot;columns&quot;:&quot;1&quot;}"
                                                    data-widget_type="apus_element_testimonials.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="widget-testimonials  style1  nofullscreen">

                                                            <div class="slick-carousel testimonial-main " data-items="1"
                                                                data-large="1" data-medium="1" data-small="1"
                                                                data-smallest="1" data-pagination="true" data-nav="false"
                                                                data-rows="1" data-infinite="true">
                                                                @foreach ($testimonils as $allrecord)
                                                                    <div class="item">

                                                                        <div class="testimonials-item">
                                                                            {{-- <h3 class="title text-theme">Great Work
                                                                            </h3> --}}
                                                                            <div class="description">
                                                                                <p>{!! str_limit($allrecord->description, $limit = 120, $end = '...') !!}</p>
                                                                            </div>
                                                                            <div class="inner-bottom">
                                                                                <div class="d-flex align-items-center">

                                                                                    <div class="wrapper-avarta">
                                                                                        <div
                                                                                            class="avarta d-flex justify-content-center align-items-center">
                                                                                            <div class="image-wrapper">
                                                                                                {{ HTML::image(TESTIMONIAL_SMALL_DISPLAY_PATH . $allrecord->image, SITE_TITLE) }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="info-testimonials">
                                                                                        <h3 class="name-client">
                                                                                            {{ $allrecord->client_name }}
                                                                                        </h3>
                                                                                        <div class="job">
                                                                                            {{ $allrecord->country }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-0d6652a elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="0d6652a" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-8b9202c elementor-invisible"
                                            data-id="8b9202c" data-element_type="column"
                                            data-settings="{&quot;animation&quot;:&quot;slide-up&quot;}">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                {{-- <div class="elementor-element elementor-element-913e4ea elementor-widget elementor-widget-button" data-id="913e4ea" data-element_type="widget" data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-text">Start today</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="elementor-element elementor-element-4e5e09b elementor-widget__width-initial elementor-widget elementor-widget-heading my-4"
                                                    data-id="4e5e09b" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <h2 class="elementor-heading-title elementor-size-default">
                                                            Download the App</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-1c58f87 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                                                    data-id="1c58f87" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        <p>Connect to opportunities and show your professional
                                                            potential to the world with us. As the world’s most
                                                            affordable and easiest to use the digital marketplace,
                                                            <?php echo SITE_TITLE; ?> enables freelancers and
                                                            entrepreneurs to start doing, growing and succeeding.
                                                            Geography, time, and budget are no longer barriers.</p>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-e03657e elementor-widget elementor-widget-spacer"
                                                    data-id="e03657e" data-element_type="widget"
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <style>
                                                            /*! elementor - v3.8.1 - 13-11-2022 */
                                                            .elementor-column .elementor-spacer-inner {
                                                                height: var(--spacer-size)
                                                            }

                                                            .e-con {
                                                                --container-widget-width: 100%
                                                            }

                                                            .e-con-inner>.elementor-widget-spacer,
                                                            .e-con>.elementor-widget-spacer {
                                                                width: var(--container-widget-width, var(--spacer-size));
                                                                -ms-flex-item-align: stretch;
                                                                align-self: stretch;
                                                                -ms-flex-negative: 0;
                                                                flex-shrink: 0
                                                            }

                                                            .e-con-inner>.elementor-widget-spacer>.elementor-widget-container,
                                                            .e-con-inner>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer,
                                                            .e-con>.elementor-widget-spacer>.elementor-widget-container,
                                                            .e-con>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer {
                                                                height: 100%
                                                            }

                                                            .e-con-inner>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer>.elementor-spacer-inner,
                                                            .e-con>.elementor-widget-spacer>.elementor-widget-container>.elementor-spacer>.elementor-spacer-inner {
                                                                height: var(--container-widget-height, var(--spacer-size))
                                                            }
                                                        </style>
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-32481aa elementor-widget__width-auto elementor-widget elementor-widget-text-editor"
                                                    data-id="32481aa" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        {{-- <a href="#" class="btn d-flex align-items-center"> --}}
                                                        <div class="app-icon"><i class="fab fa-apple"></i></div>
                                                        <div class="inner">
                                                            <div class="sub">Download on the</div>
                                                            <div class="name-app">Apple Store</div>

                                                        </div>
                                                        {{-- </a> --}}
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-17e1dc0 elementor-widget__width-auto elementor-widget elementor-widget-text-editor"
                                                    data-id="17e1dc0" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        {{-- <a href="#" class="btn d-flex align-items-center"> --}}
                                                        <div class="app-icon"><i class="fab fa-google-play"></i>
                                                        </div>
                                                        <div class="inner">
                                                            <div class="sub">Get in on</div>
                                                            <div class="name-app">Google Play</div>
                                                        </div>
                                                        {{-- </a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d0077b5 elementor-hidden-tablet elementor-hidden-mobile"
                                            data-id="d0077b5" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-d6cdf21 elementor-invisible elementor-widget elementor-widget-image"
                                                    data-id="d6cdf21" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;scale&quot;,&quot;_animation_delay&quot;:400}"
                                                    data-widget_type="image.default">
                                                    <div class="elementor-widget-container">
                                                        {{ HTML::image('public/img/front/home/download_the.png', SITE_TITLE) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><!-- .site-main -->

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {

            $('.search-area').on("keyup click", function() {
                //alert( "HTTP_PATH" );
                $(".search-bar-panel").show();
                $(".is_service_selected").val(0);
                // alert(123);
                //if (e.which == 13) {
                keyword = $('.search-area').val();
                if (keyword) {
                    $(".dlt-keyword").show();
                    var currentRequest = null;
                    $.ajaxSetup({
                        cache: false
                    }); // assures the cache is emptyDownload The App Now
                    if (currentRequest != null) {
                        currentRequest.abort();
                        currentRequest = null;
                    }
                    currentRequest = $.ajax({
                        type: 'POST',
                        url: "gigs/getkeyword",
                        data: {
                            'keyword': keyword,
                            "_token": "{{ csrf_token() }}"
                        },
                        cache: false,

                        beforeSend: function() {

                        },
                        success: function(data) {
                            //  $("#wrkr_srch_ldr").hide();
                            //NProgress.done();
                            console.log(data);
                            $(".searchgig").html('');
                            $(".searchgig").html(data);

                        },
                        error: function(data) {
                            console.log("error");
                            console.log(data);
                        }
                    });

                } else {
                    $(".dlt-keyword").hide();
                    $(".searchgig").html("");
                    $(".is_service_selected").val(0);
                }
                return false; //<---- Add this line
                // }
            });

            $('.dlt-keyword').on("click", function() {
                $(".searchgig").html("");
                $(".search-area").val("").focus();
                $(".is_service_selected").val(0);
                $(".dlt-keyword").hide();
            });
            $(".searchform").validate();
            $(".searchform").submit(function(event) {
                //alert(1);
                if ($('ul.user-ul li').hasClass('selected')) {
                    //alert(2);
                    userslug = $('ul.user-ul li.selected').attr('id');
                    //alert(userslug);
                    location.href = "{{ HTTP_PATH }}/public-profile/" + userslug;
                    event.preventDefault();
                }

            });
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.center_seacrh').length && !$(event.target).closest(
                        '.search-bar-panel').length) {
                    $(".search-bar-panel").hide();
                }
            });
        });
    </script> --}}


@endsection
