;(function($) {

    "use strict";

    var PostCarousel = function() {
        if ( $().owlCarousel ) {
            $('.tf-posts').each(function(){
                var
                $this = $(this),
                col_des = $this.data("column"),
                col_tab = $this.data("column2"),
                col_mob = $this.data("column3");

                $this.find('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 0,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    slideSpeed: 500,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: col_mob,
                            dots: true,
                        },
                        768: {
                            items: col_tab,
                            dots: true,
                        },
                        1000: {
                            items: col_des,
                            dots: false,
                        },
                    }
                });
            });

        }
    }
    


    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfposts.default', PostCarousel );
    });

})(jQuery);
