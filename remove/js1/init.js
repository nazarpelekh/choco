$ = jQuery;
$(document).ready(function () {

    setTimeout(function () {
        $('body').addClass('body-fade');
    }, 1000)
    
    /* Contact Form 7 */
    $(this).on('click', '.wpcf7-not-valid-tip', function(){
        $(this).prev().trigger('focus');
        $(this).fadeOut(500,function(){
            $(this).remove();
        });
    });

    /* Swiper Slider */
    var home = new Swiper('.home-page__slider', {
        direction: 'vertical',
        mousewheel: true
    });
    var subslider = new Swiper('.home-page__subslider', {
        direction: 'vertical',
        mousewheel: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction'
        },
    });

    /* Resize Menu */
    $(window).bind('resize orientationchange', function () {
        if ($(window).width() >= 768 ) {
            $('#menu-main-menu').removeAttr('style');
        }
    });

    /* Respond Menu */
    $('#menuOpen').click(function() {
        $(this).toggleClass('active');
        $('#mainMenu').toggleClass('active');
        $('body').css('overflow','hidden');
    });
    
    if ($("body").width() < 1024) {
        
        /* Respond Menu */
        $("#mainMenu .menu-item-has-children > a").append("<span></span>");
        $("#mainMenu .menu-item-has-children span").click(function() {
            $(this).parent().next().slideToggle(300);
            $(this).toggleClass("active");
            return false;
        });
        
        /* turn off hover on mobile view */
        var touch = 'ontouchstart' in document.documentElement
            || navigator.maxTouchPoints > 0
            || navigator.msMaxTouchPoints > 0;

        if (touch) { // remove all :hover stylesheets
            try { // prevent exception on browsers not supporting DOM styleSheets properly
                for (var si in document.styleSheets) {
                    var styleSheet = document.styleSheets[si];
                    if (!styleSheet.rules) continue;

                    for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
                        if (!styleSheet.rules[ri].selectorText) continue;

                        if (styleSheet.rules[ri].selectorText.match(':hover')) {
                            styleSheet.deleteRule(ri);
                        }
                    }
                }
            } catch (ex) {}
        }
    }

});
