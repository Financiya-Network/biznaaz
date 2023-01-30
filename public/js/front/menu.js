(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = $(this), settings = $.extend({
            format: "dropdown",
            sticky: false
        }, options);
        return this.each(function () {
            $(this).find(".button").on('click', function () {

                var mainmenu = $(this).next('ul');
                if ($(this).hasClass('menu-opened')) {
                    mainmenu.slideUp().removeClass('open');
                    $(this).removeClass('menu-opened');
                    $(this).parent().parent().removeClass('newopened');
                    $('.posstt').removeClass('ned');
                    $('.posstt').addClass('post_icon');
                }
                else {
                    mainmenu.slideDown().addClass('open');
                    $(this).addClass('menu-opened');
                    $(this).parent().parent().addClass('newopened');
                    $('.posstt').addClass('ned');
                    $('.posstt').removeClass('post_icon');

                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    }
                    else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle')
                multiTg();
            else
                cssmenu.addClass('dropdown');
            if (settings.sticky === true)
                cssmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 767;
                if ($(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    $('.has-sub').find('ul').hide().removeClass('open');
                    //cssmenu.find('ul').hide().removeClass('open');
//                    if ($('.button').hasClass('menu-opened')) {
//                        $('.menu-opened').next('ul').slideDown().addClass('open');
//                    }
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $("#cssmenu").menumaker({
            format: "multitoggle"
        });
        $("#secondmenu").menumaker({
            format: "multitoggle"
        });

    });
})(jQuery);