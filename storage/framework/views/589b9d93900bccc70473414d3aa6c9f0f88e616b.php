<style id='wp-block-library-theme-inline-css' type='text/css'>
    .wp-block-audio figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-audio figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-audio {
        margin: 0 0 1em
    }

    .wp-block-code {
        border: 1px solid #ccc;
        border-radius: 4px;
        font-family: Menlo, Consolas, monaco, monospace;
        padding: .8em 1em
    }

    .wp-block-embed figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-embed figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-embed {
        margin: 0 0 1em
    }

    .blocks-gallery-caption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .blocks-gallery-caption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-image figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-image figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-image {
        margin: 0 0 1em
    }

    .wp-block-pullquote {
        border-top: 4px solid;
        border-bottom: 4px solid;
        margin-bottom: 1.75em;
        color: currentColor
    }

    .wp-block-pullquote__citation,
    .wp-block-pullquote cite,
    .wp-block-pullquote footer {
        color: currentColor;
        text-transform: uppercase;
        font-size: .8125em;
        font-style: normal
    }

    .wp-block-quote {
        border-left: .25em solid;
        margin: 0 0 1.75em;
        padding-left: 1em
    }

    .wp-block-quote cite,
    .wp-block-quote footer {
        color: currentColor;
        font-size: .8125em;
        position: relative;
        font-style: normal
    }

    .wp-block-quote.has-text-align-right {
        border-left: none;
        border-right: .25em solid;
        padding-left: 0;
        padding-right: 1em
    }

    .wp-block-quote.has-text-align-center {
        border: none;
        padding-left: 0
    }

    .wp-block-quote.is-large,
    .wp-block-quote.is-style-large,
    .wp-block-quote.is-style-plain {
        border: none
    }

    .wp-block-search .wp-block-search__label {
        font-weight: 700
    }

    .wp-block-search__button {
        border: 1px solid #ccc;
        padding: .375em .625em
    }

    :where(.wp-block-group.has-background) {
        padding: 1.25em 2.375em
    }

    .wp-block-separator.has-css-opacity {
        opacity: .4
    }

    .wp-block-separator {
        border: none;
        border-bottom: 2px solid;
        margin-left: auto;
        margin-right: auto
    }

    .wp-block-separator.has-alpha-channel-opacity {
        opacity: 1
    }

    .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
        width: 100px
    }

    .wp-block-separator.has-background:not(.is-style-dots) {
        border-bottom: none;
        height: 1px
    }

    .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
        height: 2px
    }

    .wp-block-table {
        margin: "0 0 1em 0"
    }

    .wp-block-table thead {
        border-bottom: 3px solid
    }

    .wp-block-table tfoot {
        border-top: 3px solid
    }

    .wp-block-table td,
    .wp-block-table th {
        word-break: normal
    }

    .wp-block-table figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-table figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-video figcaption {
        color: #555;
        font-size: 13px;
        text-align: center
    }

    .is-dark-theme .wp-block-video figcaption {
        color: hsla(0, 0%, 100%, .65)
    }

    .wp-block-video {
        margin: 0 0 1em
    }

    .wp-block-template-part.has-background {
        padding: 1.25em 2.375em;
        margin-top: 0;
        margin-bottom: 0
    }
</style>

<style id='global-styles-inline-css' type='text/css'>
    body {
        --wp--preset--color--black: #000000;
        --wp--preset--color--cyan-bluish-gray: #abb8c3;
        --wp--preset--color--white: #ffffff;
        --wp--preset--color--pale-pink: #f78da7;
        --wp--preset--color--vivid-red: #cf2e2e;
        --wp--preset--color--luminous-vivid-orange: #ff6900;
        --wp--preset--color--luminous-vivid-amber: #fcb900;
        --wp--preset--color--light-green-cyan: #7bdcb5;
        --wp--preset--color--vivid-green-cyan: #00d084;
        --wp--preset--color--pale-cyan-blue: #8ed1fc;
        --wp--preset--color--vivid-cyan-blue: #0693e3;
        --wp--preset--color--vivid-purple: #9b51e0;
        --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
        --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
        --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
        --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
        --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
        --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
        --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
        --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
        --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
        --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
        --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
        --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
        --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
        --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
        --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
        --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
        --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
        --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
        --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
        --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
        --wp--preset--font-size--small: 13px;
        --wp--preset--font-size--medium: 20px;
        --wp--preset--font-size--large: 36px;
        --wp--preset--font-size--x-large: 42px;
        --wp--preset--spacing--20: 0.44rem;
        --wp--preset--spacing--30: 0.67rem;
        --wp--preset--spacing--40: 1rem;
        --wp--preset--spacing--50: 1.5rem;
        --wp--preset--spacing--60: 2.25rem;
        --wp--preset--spacing--70: 3.38rem;
        --wp--preset--spacing--80: 5.06rem;
    }

    :where(.is-layout-flex) {
        gap: 0.5em;
    }

    body .is-layout-flow>.alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
    }

    body .is-layout-flow>.alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
    }

    body .is-layout-flow>.aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    body .is-layout-constrained>.alignleft {
        float: left;
        margin-inline-start: 0;
        margin-inline-end: 2em;
    }

    body .is-layout-constrained>.alignright {
        float: right;
        margin-inline-start: 2em;
        margin-inline-end: 0;
    }

    body .is-layout-constrained>.aligncenter {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
        max-width: var(--wp--style--global--content-size);
        margin-left: auto !important;
        margin-right: auto !important;
    }

    body .is-layout-constrained>.alignwide {
        max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
        display: flex;
    }

    body .is-layout-flex {
        flex-wrap: wrap;
        align-items: center;
    }

    body .is-layout-flex>* {
        margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
        gap: 2em;
    }

    .has-black-color {
        color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
        color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
        color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
        color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
        color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
        color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
        color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
        color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
        color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
        color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
        color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
        color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
        background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
        background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
        background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
        background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
        background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
        background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
        background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
        background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
        background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
        background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
        background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
        border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
        border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
        border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
        border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
        border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
        border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
        border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
        border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
        border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
        border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
        border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
        background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
        background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
        background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
        background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
        background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
        background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
        background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
        background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
        background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
        background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
        background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
        font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
        font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
        font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
        font-size: var(--wp--preset--font-size--x-large) !important;
    }

    .wp-block-navigation a:where(:not(.wp-element-button)) {
        color: inherit;
    }

    :where(.wp-block-columns.is-layout-flex) {
        gap: 2em;
    }

    .wp-block-pullquote {
        font-size: 1.5em;
        line-height: 1.6;
    }
</style>

<style id='woocommerce-inline-inline-css' type='text/css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }
</style>
<link rel='stylesheet' id='freeio-theme-fonts-css'
    href='https://fonts.googleapis.com/css?family=DM+Sans:400,500,700,400,500,700&#038;subset=latin%2Clatin-ext%2Clatin%2Clatin-ext'
    type='text/css' media='all' />
<link rel='stylesheet' id='google-fonts-1-css'
    href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.1.1'
    type='text/css' media='all' />
<style id='rs-plugin-settings-inline-css' type='text/css'>
    #rs-demo-id {}
</style>
<style id='rs-plugin-settings-inline-css' type='text/css'>

</style>
<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 0.07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>
<style id='freeio-template-inline-css' type='text/css'>
    :root {
        --freeio-theme-color: #1fbec6;
        --freeio-second-color: #1F4B3F;
        --freeio-text-color: #6B7177;
        --freeio-link-color: #222222;
        --freeio-link_hover_color: #1fbec6;
        --freeio-heading-color: #222222;
        --freeio-theme-hover-color: #1fbec6;
        --freeio-second-hover-color: #222222;
        --freeio-main-font: 'DM Sans';
        --freeio-main-font-size: 15px;
        --freeio-main-font-weight: 400;
        --freeio-heading-font: 'DM Sans';
        --freeio-heading-font-weight: 700;
        --freeio-theme-color-005: rgba(91, 187, 123, 0.05);
        --freeio-theme-color-007: rgba(91, 187, 123, 0.07);
        --freeio-theme-color-010: rgba(91, 187, 123, 0.1);
        --freeio-theme-color-015: rgba(91, 187, 123, 0.15);
        --freeio-theme-color-020: rgba(91, 187, 123, 0.2);
        --freeio-second-color-050: rgba(31, 75, 63, 0.5);
    }
</style>





<meta name="generator" content="WordPress 6.1.1" />
<meta name="generator" content="WooCommerce 7.1.0" />




<noscript>
    <style>
        .woocommerce-product-gallery {
            opacity: 1 !important;
        }
    </style>
</noscript>
<meta name="generator"
    content="Powered by Slider Revolution 6.5.12 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
<script>
    function setREVStartSize(e) {
        //window.requestAnimationFrame(function() {
        window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
        window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
        try {
            var pw = document.getElementById(e.c).parentNode.offsetWidth,
                newh;
            pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
            e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
            e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
            e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
            e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
            e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
            e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
            e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
            if (e.layout === "fullscreen" || e.l === "fullscreen")
                newh = Math.max(e.mh, window.RSIH);
            else {
                e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                for (var i in e.rl)
                    if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                for (var i in e.rl)
                    if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                var nl = new Array(e.rl.length),
                    ix = 0,
                    sl;
                e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                sl = nl[0];
                for (var i in nl)
                    if (sl > nl[i] && nl[i] > 0) {
                        sl = nl[i];
                        ix = i;
                    }
                var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
            }
            var el = document.getElementById(e.c);
            if (el !== null && el) el.style.height = newh + "px";
            el = document.getElementById(e.c + "_wrapper");
            if (el !== null && el) {
                el.style.height = newh + "px";
                el.style.display = "block";
            }
        } catch (e) {
            console.log("Failure at Presize of Slider:" + e)
        }
        //});
    };
</script>

<style id='rs-plugin-settings-inline-css' type='text/css'>
    rs-slides,
    rs-slide,
    rs-module {
        overflow: visible !important
    }
</style>




<body
    class="page-template-default page page-id-26 wp-embed-responsive theme-freeio woocommerce-no-js header_transparent main apus-body-loading body-footer-mobile elementor-default elementor-kit-6 elementor-page elementor-page-26">



    <div id="wrapper-container" class="wrapper-container">
        <div class="apus-page-loading">
            <div class="apus-loader-inner"></div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false"
            role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-dark-grayscale">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0 0.49803921568627" />
                        <feFuncG type="table" tableValues="0 0.49803921568627" />
                        <feFuncB type="table" tableValues="0 0.49803921568627" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false"
            role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-grayscale">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0 1" />
                        <feFuncG type="table" tableValues="0 1" />
                        <feFuncB type="table" tableValues="0 1" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0" focusable="false"
            role="none" style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-purple-yellow">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0.54901960784314 0.98823529411765" />
                        <feFuncG type="table" tableValues="0 1" />
                        <feFuncB type="table" tableValues="0.71764705882353 0.25490196078431" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0"
            focusable="false" role="none"
            style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-blue-red">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0 1" />
                        <feFuncG type="table" tableValues="0 0.27843137254902" />
                        <feFuncB type="table" tableValues="0.5921568627451 0.27843137254902" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0"
            focusable="false" role="none"
            style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-midnight">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0 0" />
                        <feFuncG type="table" tableValues="0 0.64705882352941" />
                        <feFuncB type="table" tableValues="0 1" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0"
            focusable="false" role="none"
            style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-magenta-yellow">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0.78039215686275 1" />
                        <feFuncG type="table" tableValues="0 0.94901960784314" />
                        <feFuncB type="table" tableValues="0.35294117647059 0.47058823529412" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0"
            focusable="false" role="none"
            style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-purple-green">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0.65098039215686 0.40392156862745" />
                        <feFuncG type="table" tableValues="0 1" />
                        <feFuncB type="table" tableValues="0.44705882352941 0.4" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" width="0" height="0"
            focusable="false" role="none"
            style="visibility: hidden; position: absolute; left: -9999px; overflow: hidden;">
            <defs>
                <filter id="wp-duotone-blue-orange">
                    <feColorMatrix color-interpolation-filters="sRGB" type="matrix"
                        values=" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 " />
                    <feComponentTransfer color-interpolation-filters="sRGB">
                        <feFuncR type="table" tableValues="0.098039215686275 1" />
                        <feFuncG type="table" tableValues="0 0.66274509803922" />
                        <feFuncB type="table" tableValues="0.84705882352941 0.41960784313725" />
                        <feFuncA type="table" tableValues="1 1" />
                    </feComponentTransfer>
                    <feComposite in2="SourceGraphic" operator="in" />
                </filter>
            </defs>
        </svg>
        <div id="wrapper-container" class="wrapper-container">

            <div id="apus-mobile-menu" class="apus-offcanvas d-block d-xl-none">
                <div class="apus-offcanvas-header d-flex align-items-center">
                    <div class="title">
                        Menu </div>
                    <span class="close-offcanvas ms-auto d-flex align-items-center justify-content-center"><i
                            class="ti-close"></i></span>
                </div>
                <div class="apus-offcanvas-body flex-column d-flex">

                    <div class="offcanvas-content">
                        <div class="middle-offcanvas">

                            <nav id="menu-main-menu-navbar" class="navbar navbar-offcanvas" role="navigation">
                                <div id="mobile-menu-container" class="menu-primary-menu-container">
                                    <ul id="menu-primary-menu" class="">
                                        <?php if(session()->has('user_id')): ?>
                                            <li class="menu-item-61 has-mega-menu aligned-left"><a
                                                    href="<?php echo e(URL::to('gigs/create')); ?>" class=""
                                                    data-hover="dropdown" data-toggle="dropdown">Post
                                                    Gig
                                                    <b class="caret"></b></a>
                                            </li>
                                            <li class="menu-item-61 has-mega-menu aligned-left"><a
                                                    href="<?php echo e(URL::to('gigs')); ?>" class="" data-hover="dropdown"
                                                    data-toggle="dropdown">Browse Gigs
                                                    <b class="caret"></b></a>
                                            </li>
                                            <li class="menu-item-61 has-mega-menu aligned-left"><a href="#"
                                                    class="" data-hover="dropdown"
                                                    data-toggle="dropdown">Notifications
                                                    <b class="caret"></b></a>
                                            </li>
                                            <li class="menu-item-61 has-mega-menu aligned-left"><a
                                                    href="<?php echo e(URL::to('messages/message')); ?>" class=""
                                                    data-hover="dropdown" data-toggle="dropdown">Message
                                                    <b class="caret"></b></a>
                                            </li>
                                        <?php else: ?>
                                            <li id="menu-item-61" class="has-submenu menu-item-61"><a
                                                    href="<?php echo e(URL::to('index1')); ?>">Home</a>
                                            </li>
                                            <li id="menu-item-5226" class="has-submenu menu-item-5226"><a
                                                    href="#">Browse
                                                    Jobs</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-5161" class="has-submenu menu-item-5161"><a
                                                            href="#">Services</a>
                                                        <ul class="sub-menu">
                                                            <?php if($globalCategories): ?>
                                                                <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li id="menu-item-5162" class="menu-item-5162">
                                                                        <a
                                                                            href="<?php echo e(URL::to('gigs/' . $cat->slug)); ?>"><?php echo $cat->name; ?></a>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </li>
                                                    <li id="menu-item-5182" class="has-submenu menu-item-5182"><a
                                                            href="#">Projects</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-5183" class="menu-item-5183"><a
                                                                    href="<?php echo e(URL::to('maintenance')); ?>">Project
                                                                    &#8211; List</a></li>
                                                        </ul>
                                                    </li>
                                                    <li id="menu-item-5212" class="has-submenu menu-item-5212"><a
                                                            href="#">Jobs</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-5213" class="menu-item-5213"><a
                                                                    href="<?php echo e(URL::to('job')); ?>">Layout
                                                                    &#8211; v1</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="menu-item-5227" class="has-submenu menu-item-5227"><a
                                                    href="#">Users</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-5194" class="has-submenu menu-item-5194"><a
                                                            href="#">Freelancers</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-5195" class="menu-item-5195"><a
                                                                    href="<?php echo e(URL::to('maintenance')); ?>">Layout
                                                                    &#8211; v1</a></li>
                                                        </ul>
                                                    </li>
                                                    <li id="menu-item-5222" class="has-submenu menu-item-5222"><a
                                                            href="#">Employers</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-5223" class="menu-item-5223"><a
                                                                    href="<?php echo e(URL::to('maintenance')); ?>">Layout
                                                                    &#8211; v1</a></li>
                                                        </ul>
                                                    </li>
                                                    <li id="menu-item-1606" class="menu-item-1606"><a
                                                            href="<?php echo e(URL::to('become-seller')); ?>">Become
                                                            Seller</a></li>
                                                </ul>
                                            </li>
                                            <li id="menu-item-64" class="has-submenu menu-item-64"><a
                                                    href="">Blog</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-5132" class="menu-item-5132"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                            &#8211; Grid</a></li>
                                                    <li id="menu-item-5130" class="menu-item-5130"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                            &#8211;
                                                            List V1</a></li>
                                                    <li id="menu-item-5131" class="menu-item-5131"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                            &#8211;
                                                            List V2</a></li>
                                                    <li id="menu-item-5133" class="menu-item-5133"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                            &#8211; Detail</a></li>
                                                </ul>
                                            </li>
                                            <li id="menu-item-65" class="has-submenu menu-item-65"><a
                                                    href="#">Pages</a>
                                                <ul class="sub-menu">
                                                    <li id="menu-item-5137" class="menu-item-5137"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Shop</a></li>
                                                    <li id="menu-item-68" class="menu-item-68"><a
                                                            href="<?php echo e(URL::to('contact-us')); ?>">Contact</a></li>
                                                    <li id="menu-item-66" class="menu-item-66"><a
                                                            href="<?php echo e(URL::to('about-us')); ?>">About
                                                            v1</a></li>
                                                    <li id="menu-item-67" class="menu-item-67"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">About
                                                            v2</a></li>
                                                    <li id="menu-item-71" class="menu-item-71"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Pricing</a></li>
                                                    <li id="menu-item-70" class="menu-item-70"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">Help</a>
                                                    </li>
                                                    <li id="menu-item-69" class="menu-item-69"><a
                                                            href="<?php echo e(URL::to('faqs')); ?>">FAQ</a>
                                                    </li>
                                                    <li id="menu-item-72" class="menu-item-72"><a
                                                            href="<?php echo e(URL::to('terms-and-condition')); ?>">Terms</a></li>
                                                    <li id="menu-item-1754" class="menu-item-1754"><a
                                                            href="<?php echo e(URL::to('maintenance')); ?>">404</a></li>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <ul class="menu-account-mobile">
                                    <?php if(session()->has('user_id')): ?>
                                        <li>
                                            <a href="<?php echo e(URL::to('logout')); ?>" title="Login">
                                                Logout</a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="<?php echo e(URL::to('login')); ?>" title="Login">
                                                Login </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(URL::to('register')); ?>" title="Register">
                                                Register </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="over-dark"></div>
            <div id="apus-header-mobile" class="header-mobile d-block d-xl-none clearfix">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-5">
                            <div class="logo logo-theme">
                                <a href="">
                                    <img src="public/images/logo.png" alt="Freeio">
                                </a>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center justify-content-end">

                            <div class="top-wrapper-menu ">
                                <a class="btn-account btn-login " href="<?php echo e(URL::to('login')); ?>" title="Login">
                                    Login </a>
                            </div>


                            <a href="#navbar-offcanvas" class="btn-showmenu">
                                <i class="mobile-menu-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="apus-header" class="apus-header no_keep_header d-none d-xl-block header-2-3201">
                <div data-elementor-type="wp-post" data-elementor-id="3201" class="elementor elementor-3201">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-9f9f26e elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="9f9f26e" data-element_type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-extended">
                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b61a72a"
                                data-id="b61a72a" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-4a9b1f0 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_logo"
                                        data-id="4a9b1f0" data-element_type="widget"
                                        data-widget_type="apus_element_logo.default">
                                        <div class="elementor-widget-container">
                                            <div class="logo ">
                                                <a href="">
                                                    <span class="logo-main">
                                                        <?php echo e(HTML::image('public/images/logo.png', SITE_TITLE, ['style' => 'width:133px;height:40px'])); ?>

                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-c36693e elementor-widget__width-auto elementor-widget elementor-widget-apus_element_vertical_menu"
                                        data-id="c36693e" data-element_type="widget"
                                        data-widget_type="apus_element_vertical_menu.default">
                                        <div class="elementor-widget-container">
                                            <div class="vertical-wrapper  show-hover">
                                                <span class="action-vertical d-flex align-items-center">
                                                    <i class="flaticon-menu"></i>
                                                    <span class="title">
                                                        Categories </span>
                                                </span>
                                                <div class="content-vertical">
                                                    <ul id="vertical-menu" class="apus-vertical-menu nav">
                                                        <?php if($globalCategories): ?>
                                                            <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li id="menu-item-5663"
                                                                    class="menu-item-5663 has-mega-menu aligned-left">
                                                                    <a href="<?php echo e(URL::to('gigs/' . $cat->slug)); ?>"
                                                                        class="dropdown-toggle" data-hover="dropdown"
                                                                        data-toggle="dropdown">
                                                                        <?php echo e(HTML::image('public/img/front/home/' . $cat->image, SITE_TITLE)); ?><?php echo $cat->name; ?>

                                                                        <b class="caret"></b></a>
                                                                    <div class="dropdown-menu development-it"
                                                                        style="width:500px">
                                                                        <div class="dropdown-menu-inner">
                                                                            <div data-elementor-type="wp-post"
                                                                                data-elementor-id="3167"
                                                                                class="elementor elementor-3167">
                                                                                <section
                                                                                    class="elementor-section elementor-top-section elementor-element elementor-element-d0c3572 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                                                    data-id="d0c3572"
                                                                                    data-element_type="section">
                                                                                    <div class="elementor-container elementor-column-gap-no"
                                                                                        style="background-color: white;">
                                                                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-080ab5d"
                                                                                            data-id="080ab5d"
                                                                                            data-element_type="column">
                                                                                            <div
                                                                                                class="elementor-widget-wrap elementor-element-populated">
                                                                                                <div class="elementor-element elementor-element-c563a07 elementor-widget elementor-widget-apus_element_nav_menu"
                                                                                                    data-id="c563a07"
                                                                                                    data-element_type="widget"
                                                                                                    data-widget_type="apus_element_nav_menu.default">
                                                                                                    <div
                                                                                                        class="elementor-widget-container">
                                                                                                        <div
                                                                                                            class="widget-nav-menu no-margin widget  ">

                                                                                                            <h2
                                                                                                                class="widget-title">
                                                                                                                Top Jobs
                                                                                                            </h2>

                                                                                                            <div
                                                                                                                class="widget-content">
                                                                                                                <div
                                                                                                                    class="menu-top-jobs-container">
                                                                                                                    <?php if(isset($globalSubCategories[$cat->id])): ?>
                                                                                                                        <ul id="menu-top-jobs"
                                                                                                                            class="menu">
                                                                                                                            <?php $__currentLoopData = $globalSubCategories[$cat->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                <li id="menu-item-4338"
                                                                                                                                    class="menu-item menu-item-type-taxonomy menu-item-object-job_listing_category menu-item-4338">
                                                                                                                                    <a
                                                                                                                                        href="<?php echo e(URL::to('gigs/' . $cat->slug . '/' . $subCat->slug)); ?>"><?php echo $subCat->name; ?></a>
                                                                                                                                </li>
                                                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                        </ul>
                                                                                                                    <?php endif; ?>
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
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-14b46c9 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_primary_menu"
                                        data-id="14b46c9" data-element_type="widget"
                                        data-widget_type="apus_element_primary_menu.default">
                                        <div class="elementor-widget-container">
                                            <div class="main-menu  ">
                                                <nav data-duration="400"
                                                    class="apus-megamenu animate navbar navbar-expand-lg p-0"
                                                    role="navigation">
                                                    <div class="collapse navbar-collapse no-padding">
                                                        <ul id="primary-menu" class="nav navbar-nav megamenu effect1">
                                                            <li class="menu-item-61 has-mega-menu aligned-left"><a
                                                                    href="<?php echo e(URL::to('index1')); ?>" class=""
                                                                    data-hover="dropdown" data-toggle="dropdown">Home
                                                                    <b class="caret"></b></a>
                                                            </li>
                                                            <li class="dropdown menu-item-5226 aligned-left"><a
                                                                    href="#" class="dropdown-toggle"
                                                                    data-hover="dropdown"
                                                                    data-toggle="dropdown">Browse
                                                                    Jobs <b class="caret"></b></a>
                                                                <ul class="dropdown-menu">
                                                                    <li class="dropdown menu-item-5161 aligned-left"><a
                                                                            href="#" class="dropdown-toggle"
                                                                            data-hover="dropdown"
                                                                            data-toggle="dropdown">Services <b
                                                                                class="caret"></b></a>
                                                                        <ul class="dropdown-menu">
                                                                            <?php if($globalCategories): ?>
                                                                                <?php $__currentLoopData = $globalCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <li
                                                                                        class="menu-item-5162 aligned-left">
                                                                                        <a
                                                                                            href="<?php echo e(URL::to('gigs/' . $cat->slug)); ?>"><?php echo $cat->name; ?></a>
                                                                                    </li>
                                                                                    <?php if($loop->iteration == 10): ?>
                                                                                    <?php break; ?>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown menu-item-5182 aligned-left"><a
                                                                        href="#" class="dropdown-toggle"
                                                                        data-hover="dropdown"
                                                                        data-toggle="dropdown">Projects <b
                                                                            class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="menu-item-5183 aligned-left"><a
                                                                                href="<?php echo e(URL::to('maintenance')); ?>">Project
                                                                                &#8211; List</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown menu-item-5212 aligned-left"><a
                                                                        href="#" class="dropdown-toggle"
                                                                        data-hover="dropdown"
                                                                        data-toggle="dropdown">Jobs
                                                                        <b class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="menu-item-5213 aligned-left"><a
                                                                                href="<?php echo e(URL::to('job')); ?>">Layout
                                                                                &#8211; v1</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown menu-item-5227 aligned-left"><a
                                                                href="#" class="dropdown-toggle"
                                                                data-hover="dropdown" data-toggle="dropdown">Users
                                                                <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li class="dropdown menu-item-5194 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>"
                                                                        class="dropdown-toggle"
                                                                        data-hover="dropdown"
                                                                        data-toggle="dropdown">Freelancers <b
                                                                            class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="menu-item-5195 aligned-left"><a
                                                                                href="<?php echo e(URL::to('maintenance')); ?>">Layout
                                                                                &#8211; v1</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown menu-item-5222 aligned-left"><a
                                                                        href="#" class="dropdown-toggle"
                                                                        data-hover="dropdown"
                                                                        data-toggle="dropdown">Employers <b
                                                                            class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="menu-item-5223 aligned-left"><a
                                                                                href="<?php echo e(URL::to('maintenance')); ?>">Layout
                                                                                &#8211; v1</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="menu-item-1606 aligned-left"><a
                                                                        href="<?php echo e(URL::to('become-seller')); ?>">Become
                                                                        Seller</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown menu-item-64 aligned-left"><a
                                                                href="" class="dropdown-toggle"
                                                                data-hover="dropdown" data-toggle="dropdown">Blog
                                                                <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li class="menu-item-5132 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                                        &#8211; Grid</a></li>
                                                                <li class="menu-item-5130 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                                        &#8211; List V1</a></li>
                                                                <li class="menu-item-5131 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                                        &#8211; List V2</a></li>
                                                                <li class="menu-item-5133 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Blog
                                                                        &#8211; Detail</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="dropdown menu-item-65 aligned-left"><a
                                                                href="#" class="dropdown-toggle"
                                                                data-hover="dropdown" data-toggle="dropdown">Pages
                                                                <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li class="menu-item-5137 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Shop</a>
                                                                </li>
                                                                <li class="menu-item-68 aligned-left"><a
                                                                        href="<?php echo e(URL::to('contact-us')); ?>">Contact</a>
                                                                </li>
                                                                <li class="menu-item-66 aligned-left"><a
                                                                        href="<?php echo e(URL::to('about-us')); ?>">About
                                                                        v1</a></li>
                                                                <li class="menu-item-67 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">About
                                                                        v2</a></li>
                                                                <li class="menu-item-71 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Pricing</a>
                                                                </li>
                                                                <li class="menu-item-70 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">Help</a>
                                                                </li>
                                                                <li class="menu-item-69 aligned-left"><a
                                                                        href="<?php echo e(URL::to('faqs')); ?>">FAQ</a>
                                                                </li>
                                                                <li class="menu-item-72 aligned-left"><a
                                                                        href="<?php echo e(URL::to('terms-and-condition')); ?>">Terms</a>
                                                                </li>
                                                                <li class="menu-item-1754 aligned-left"><a
                                                                        href="<?php echo e(URL::to('maintenance')); ?>">404</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-efb26be"
                            data-id="efb26be" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-39ebc28 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_service_search_form"
                                    data-id="39ebc28" data-element_type="widget"
                                    data-widget_type="apus_element_service_search_form.default">
                                    <div class="elementor-widget-container">


                                        <button type="button" class="btn-search-header" data-bs-toggle="modal"
                                            data-bs-target="#search-header"><i
                                                class="flaticon-loupe"></i></button>
                                        <div class="modal modal-search-header fade" id="search-header"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <button type="button" class="btn-close ms-auto"
                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                            class="ti-close"></i></button>

                                                    <div class="widget-listing-search-form  button horizontal">
                                                        <form id="filter-listing-form-zCi6n" action=""
                                                            class="form-search filter-listing-form button"
                                                            method="GET">
                                                            <div class="search-form-inner">
                                                                <div class="main-inner clearfix">
                                                                    <div class="content-main-inner">
                                                                        <div
                                                                            class="row row-20 align-items-center list-fileds">
                                                                            <div
                                                                                class="item-column col-12 col-md-9 col-lg-9  has-icon item-last">
                                                                                <div
                                                                                    class="form-group form-group-title  ">
                                                                                    <div
                                                                                        class="form-group-inner inner has-icon">
                                                                                        <i
                                                                                            class="flaticon-loupe"></i>
                                                                                        <input type="text"
                                                                                            name="filter-title"
                                                                                            class="form-control apus-autocompleate-input autocompleate-service"
                                                                                            value=""
                                                                                            id="zCi6n_title"
                                                                                            placeholder="What service are you looking for today?">
                                                                                    </div>
                                                                                </div><!-- /.form-group -->


                                                                            </div>
                                                                            <div
                                                                                class="col-12 col-md-3 form-group-search ">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-end">
                                                                                    <button
                                                                                        class="btn-submit btn w-100 btn-theme btn-inverse"
                                                                                        type="submit">
                                                                                        Search </button>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-2a61283 elementor-widget__width-auto elementor-widget elementor-widget-button"
                                    data-id="2a61283" data-element_type="widget"
                                    data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a href="<?php echo e(URL::to('become-seller')); ?>"
                                                class="elementor-button-link elementor-button elementor-size-sm"
                                                role="button">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">Become a Seller</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-2cfa795 elementor-widget__width-auto elementor-widget elementor-widget-apus_element_user_info"
                                    data-id="2cfa795" data-element_type="widget"
                                    data-widget_type="apus_element_user_info.default">
                                    <div class="elementor-widget-container">

                                        <div class="top-wrapper-menu ">
                                            <a class="btn-account btn-login" data-toggle="modal"
                                                data-target="#exampleModalCenter" style="cursor: pointer;">
                                                Login </a>
                                            
                                            <!-- Button trigger modal -->
                                            

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="signn">Log In </div>
                                                            <button type="button" class="btn-close"
                                                                data-dismiss="modal" aria-label="Close"
                                                                style="margin-top: -3rem;">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php echo $__env->make('elements.socialLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            </div>
                                                            <div id="result" class="text-danger"></div>
                                                            <div normal_login>
                                                                <?php echo e(Form::open(['method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin'])); ?>

                                                                <div class="login_fieldarea">
                                                                    <div class="inputt">
                                                                        <span class="fieldd"><i
                                                                                class="fa fa-envelope"></i>
                                                                            <?php echo e(Form::text('email_address', Cookie::get('user_email_address'), ['class' => 'form-control required email enterkey', 'placeholder' => 'Email address', 'autocomplete' => 'OFF', 'id' => 'email_address'])); ?>

                                                                        </span>
                                                                    </div>
                                                                    <div class="inputt">
                                                                        <span class="fieldd"><i
                                                                                class="fa fa-key"></i>
                                                                            <?php echo e(Form::input('password', 'password', Cookie::get('user_password'), ['class' => 'required form-contro enterkeyl', 'placeholder' => 'Password', 'id' => 'user_password'])); ?>

                                                                        </span>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="inputt inputt_rev">
                                                                        <div
                                                                            class="col_tow_logns remember_secsd sdgsef">
                                                                            <?php echo e(Form::checkbox('user_remember', '1', Cookie::get('user_remember'), ['class' => 'css-checkbox in-checkbox', 'id' => 'remember_sec'])); ?>

                                                                            <label for="remember_sec"
                                                                                class="in-label">Remember
                                                                                Me</label>
                                                                        </div>
                                                                        <div class="col_tow_logns forgot_pass_sec">
                                                                            <a
                                                                                href="<?php echo e(URL::to('forgot-password')); ?>"></i>Forgot
                                                                                your Password?</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="sign_in" id="sub_btn_dive">
                                                                        <button id="ddbuton" type="button"
                                                                            class="btn  loginbtn"
                                                                            onclick="postform()">Log In</button>
                                                                        <div class="loginbtnloader"
                                                                            id="btnloader">
                                                                            <?php echo e(HTML::image('public/img/loading.gif', SITE_TITLE)); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="sign_center ">
                                                                    <div class="always_btn"> Don't have an account?
                                                                        <a href="<?php echo e(URL::to('register')); ?>"></i>Sign
                                                                            Up</a>
                                                                    </div>
                                                                </div>
                                                                <?php echo e(Form::close()); ?>

                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn-account btn-register" href="<?php echo e(URL::to('register')); ?>"
                                                title="Sign Up">
                                                Sign Up </a>
                                            <a class="btn-account btn-register" data-toggle="modal"
                                                data-target="#register" style="cursor: pointer;">
                                                Sign Up </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="register" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="signn">Log In </div>
                                                            <button type="button" class="btn-close"
                                                                data-dismiss="modal" aria-label="Close"
                                                                style="margin-top: -3rem;">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php echo $__env->make('elements.socialLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            <div class="ee er_msg"><?php echo $__env->make('elements.errorSuccessMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                            </div>
                                                            <div class="socila_login">
                                                                <?php //echo $this->element('social_register', array('type' => 'register'));
                                                                ?>
                                                            </div>
                                                            <div normal_login>
                                                                <?php echo e(Form::open(['method' => 'post', 'id' => 'loginform', 'class' => 'form form-signin'])); ?>

                                                                <div class="login_fieldarea">
                                                                    <div class="inputt">
                                                                        <span class="fieldd namehalf">
                                                                            <?php echo e(Form::text('first_name', null, ['class' => 'form-control required alphanumeric', 'placeholder' => 'First name', 'autocomplete' => 'OFF'])); ?>

                                                                        </span>
                                                                        <span class="fieldd namehalf">
                                                                            <?php echo e(Form::text('last_name', null, ['class' => 'form-control required alphanumeric', 'placeholder' => 'Last name', 'autocomplete' => 'OFF'])); ?>

                                                                        </span>
                                                                    </div>
                                                                    <div class="inputt">
                                                                        <span class="fieldd">
                                                                            <?php echo e(Form::text('email_address', Cookie::get('user_email_address'), ['class' => 'form-control required email', 'placeholder' => 'Email Address', 'autocomplete' => 'OFF'])); ?>

                                                                        </span>
                                                                    </div>
                                                                    <div class="inputt">
                                                                        <span class="fieldd namehalf">
                                                                            <?php echo e(Form::password('password', ['class' => 'form-control required passworreq', 'placeholder' => 'Password', 'minlength' => 8, 'id' => 'password'])); ?>

                                                                        </span>
                                                                        <span class="fieldd namehalf">
                                                                            <?php echo e(Form::password('confirm_password', ['class' => 'form-control required', 'placeholder' => 'Confirm password', 'equalTo' => '#password'])); ?>

                                                                        </span>
                                                                    </div>
                                                                    
                                                                    <div class="clear"></div>
                                                                    <div class="sign_in" id="sub_btn_dive">
                                                                        <input type="hidden" name="countryname"
                                                                            id="countryname" value="">
                                                                        <?php echo e(Form::submit('Sign up', ['class' => 'btn btn-primary btn-block btn-flat', 'onclick' => 'return checkForm()'])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="sign_center">
                                                                    <div class="always_btn">Already Have an
                                                                        Account? <a
                                                                            href="<?php echo e(URL::to('login')); ?>"></i>Login</a>
                                                                    </div>
                                                                </div>
                                                                <?php echo e(Form::close()); ?>

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
                    </div>
                </section>
            </div>
        </div>

    </div>
    <style>
        body.modal-open {
            height: 100vh;
            overflow-y: hidden;

        }

        .modal-dialog {
            overflow-y: initial !important
        }

        .modal-body {
            height: 55vh;
            overflow-y: auto;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#loginform").validate();
            $(".enterkey").keyup(function(e) {
                if (e.which == 13) {
                    postform();
                }
            });
            $("#user_password").keyup(function(e) {
                if (e.which == 13) {
                    postform();
                }
            });
        });

        function postform() {
            alert("Hello");
            var loginForm = $("#loginForm");
            var formData = {
                email_address: $("#email_address").val(),
                password: $("#user_password").val(),

                "_token": "<?php echo e(csrf_token()); ?>",
            };
            console.log(formData);
            $.ajax({
                type: "POST",
                url: 'login',

                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },

                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response == 'success') {
                        $('#btnloader').show();
                        $("#loginform").submit({

                        });
                        window.location.href = 'users/dashboard';
                    } else {

                        $("#result").text(response);
                        setTimeout(function() {
                            $("#result").remove();
                        }, 3000); // 3 secs

                    }
                }
            });
        }
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        $.get("https://www.iplocate.io/api/lookup", function(response) {
            var ippp = response.ip;

            $("#countryname").val(response.country);

        }, 'jsonp');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[\w.]+$/i.test(value);
            }, "Only letters, numbers and underscore allowed.");
            $.validator.addMethod("passworreq", function(input) {
                var reg = /[0-9]/; //at least one number
                var reg2 = /[a-z]/; //at least one small character
                var reg3 = /[A-Z]/; //at least one capital character
                //var reg4 = /[\W_]/; //at least one special character
                return reg.test(input) && reg2.test(input) && reg3.test(input);
            }, "Password must be a combination of Numbers, Uppercase & Lowercase Letters.");
            $("#loginform").validate();
        });

        function checkForm() {
            $('#captcha_msg').html("").removeClass('gcerror');
            if ($("#loginform").valid()) {
                var captchaTick = grecaptcha.getResponse();
                if (captchaTick == "" || captchaTick == undefined || captchaTick.length == 0) {
                    $('#captcha_msg').html("Please confirm captcha to proceed").addClass('gcerror');
                    $('#captcha_msg').addClass('gcerror');
                    return false;
                }
            } else {
                var captchaTick = grecaptcha.getResponse();
                if (captchaTick == "" || captchaTick == undefined || captchaTick.length == 0) {
                    $('#captcha_msg').html("Please confirm captcha to proceed").addClass('gcerror');
                    return false;
                }
            }
        };
    </script>
    </section>
