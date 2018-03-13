(function($) {
    $( document ).ready(function() {
        var sideMenu = $(".menu"),
            burgerButton = $(".burger-button");


        //        CLOSE/OPEN MENU
        burgerButton.click(function(){
            burgerButton.toggleClass("active");
            $('html,body').toggleClass('hidden');
            $(this).parent().find(sideMenu).toggleClass('active');
        });


        //        CRAFTBOX CONTENT ON HOVER
        if( $('.craft-box-content').length ) {

            $(".js-show-box-content").hover(
                function () {
                    var craftboxNumber = $(this).attr('id');
                    $("[data-attr=" + craftboxNumber + "]").show().css({
                        top: $(this).offset().top + 25
                    });
                },
                function () {
                    $(".craft-box-content").hide();
                }

            );
        }

        //        FULLPAGE PLUGIN

        if ( $('.page-home').length ) {
            if ($(document).width() > 1024) {
                $('.js-equal').equalHeights();
            }

            $('.fullpage').fullpage({
                scrollOverflow              :   true,
                navigation                  :   true,
                fixedElements               :   ".menu, .burger-button, .scroll-indicator-container",
                anchors                     :   ['0','1', '2', '3','4', '5','6'],
                lockAnchors                 :   false,
                bigSectionsDestination      :   'top',
                navigationTooltips          :   ['','1', '2', '3','4', '5','6'],
                slideSelector               :   '.fullpage-slide',
                showActiveTooltip           :   true
            });

            $('.js-scroll-down').click(function () {
                $.fn.fullpage.moveSectionDown();
            });

            $('.scroll-indicator-container').midnight();

            $('.fp-show-active.right').append('<span class="divider">/</span>' +
                '<span class="all">6</span>');
        }


        //        CHANGE BURGER BUTTON ON SCROLL
        if ( $('.page-all-candies').length ) {
            if ($(document).width() > 1024) {
                var elementHeight = $('.hero-screen').outerHeight();
                $(window).on('scroll', function() {
                    if ( $(window).scrollTop() > elementHeight ) {
                        burgerButton.addClass('black');
                    } else {
                        burgerButton.removeClass('black');
                    }
                });
            }
        }


        if ($('.categories').length) {
            //        ACTIVE CATEGORY INDICATOR
            $('.categories ul li').click(function () {
                $('.categories ul li').removeClass('active');
                $(this).addClass('active');
            });

            //        SHOW CATEGORIES ON MOBILE
            $('.open-selection').click(function () {
                $('.categories').addClass('opened')
            });

            //        HIDE CATEGORIES ON MOBILE
            $('.categories .js-close-categories').click(function () {
                $('.categories').removeClass('opened')
            });
        }

        //        FANCYBOX FUNCTIONS
        if ($('.product-page').length) {
            var largeImages = $('.product-images .large .tile'),
                smallImages = $('.product-images .small .tile');

            var removeActive = function () {
                smallImages.removeClass('active');
                largeImages.removeClass('active');
            };

            smallImages.click(function () {
                removeActive();
                $(this).addClass('active');
                $('.' + $(this).data("attr")).addClass('active');
            });

            $("[data-fancybox]").fancybox({
                afterShow : function( instance, current ) {
                    removeActive();
                    largeImages.eq(current.index).addClass('active');
                    smallImages.eq(current.index).addClass('active');

                }
            });
        }

    });
})(jQuery);