(function ($) {
    "use strict";

    var Lio_Course_Slider = function ($scope, $) {
        $scope.find('#course-carousel').each(function () {
            new Splide( '#course-carousel', {
                perPage    : 5,
                gap         : 30,
                pagination  : false,
                breakpoints: {
                    1024: {
                        perPage: 2,
                    },                    
                    640: {
                        perPage: 1,
                    },
                },
          } ).mount();
        });
    };

    var Lio_Course_Detail = function ($scope, $) {
        $scope.find('.criclmMid').each(function () {
            var body = document.querySelector('.criclmLft');
			var showMoreElm = document.querySelector('.showMore');
			if(showMoreElm) {
				showMoreElm.onclick = function () {
					body.classList.toggle('show');
				}
            }
        });
    };

    $(window).on('elementor/frontend/init', function () {

        var widgets = {
            'lio-c-grid': Lio_Course_Slider,
            'lio-course-det': Lio_Course_Detail,
        };

        if (elementorFrontend.isEditMode()) {

            $.each(widgets, function (widget, callback) {
                elementorFrontend.hooks.addAction('frontend/element_ready/' + widget + '.default', callback);
            });

        } else {

            $.each(widgets, function (widget, callback) {
                elementorFrontend.hooks.addAction('frontend/element_ready/' + widget + '.default', callback);
            });
        }
 
    });

})(jQuery);