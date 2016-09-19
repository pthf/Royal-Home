app.controller('mainController', function($scope, $timeout, $anchorScroll, $location, $document){
    function isScrolledIntoView(elem) {
        view = false;
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
        if( ((elemBottom-500 <= docViewBottom) && (elemTop+320 >= docViewTop)) ){
            view = true;
        }
        return view;s
    }
//listen scroll fadein images when focus scroll
    $(window).scroll(function () {
        $('.grid > .b-grid').each(function () {
            if (isScrolledIntoView(this) === true)
                $(this).addClass('in-view');
            //else
                //$(this).removeClass('in-view');

        });

    });

    $scope.getDetailGrid = function(){
        $('#myModal').modal({
            show: true,
            backdrop: true
        });

        $('#myModal').on('shown.bs.modal', function(event){

            $('body').css('overflow','hidden');
                var galleryTop = new Swiper('.gallery-top', {
                    nextButton: '.swiper-button-next.swiper-button-white',
                    prevButton: '.swiper-button-prev.swiper-button-white',
                    spaceBetween: 10,
                });
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 10,
                    centeredSlides: false,
                    slidesPerView: 'auto',
                    touchRatio: 0.2,
                    slideToClickedSlide: true,
                    nextButton: '.swiper-button-next.swiper-button-white',
                    prevButton: '.swiper-button-prev.swiper-button-white',
                });

                galleryTop.params.control = galleryThumbs;
                galleryThumbs.params.control = galleryTop;

        });
        $('#myModal').on('hide.bs.modal	', function(event){
            $('body').css('overflow','visible');
        })
    }

    $scope.getDetailGrid2 = function(){
        $('#myModal2').modal({
            show: true,
            backdrop: true
        });

        $('#myModal2').on('shown.bs.modal', function(event){
                $('body').css('overflow','hidden');

                var galleryTop2 = new Swiper('.gallery-top2', {
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    spaceBetween: 10,
                    setWrapperSize: true
                });

                galleryThumbs.params.control = galleryTop2;

        });
        $('#myModal2').on('hide.bs.modal', function(event){
            $('body').css('overflow','visible');
        })
    }



});

app.controller('scroll', function($scope, $anchorScroll, $location, $document, $timeout){
    $scope.scrollTo = function(event, id) {
        $el = angular.element(document.getElementById(id));


        if(document.documentElement.clientWidth > 750){
            $document.scrollToElementAnimated($el,  100, 1000).then(function(){
                $('.navbar ul li').removeClass('focus').delay('1000');
                angular.element(event.target).parent().addClass('focus');
                $('.navbar ul li.'+id+'li').addClass('focus');
            });
        }else{
            $document.scrollToElementAnimated($el,  100).then(function(){
                $('.navbar ul li').removeClass('focus');
                angular.element(event.target).parent().addClass('focus');
                $('.navbar ul li.'+id+'li').addClass('focus');
            });
        }


   }
})
