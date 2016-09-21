angular.module('rhome.directives', [])

    .directive('menuheader', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/header.html',
			controller: function($document){
                window.addEventListener('scroll', function(e){
                    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 300,
                    header = document.querySelector("header");
                    if (distanceY > shrinkOn) {
                        $('.header').addClass('down');
                        $('.header').find('.logo').attr('src','./assets/images/logo2.svg');
                        $( ".logo-right img" ).attr( "src", "./assets/images/s-logo2.png" );
                        $('.navbar-default .navbar-toggle').css('border-color', '#6EB253');
                        $('.navbar-default .navbar-toggle .icon-bar').css('background-color','#6EB253')
                        if (document.documentElement.clientWidth < 750){
                            $('.down .container ul li a').css('color', '#fff');
                            $('.down .container ul li').click(function(){

                            })
                        }else{
                            $('.down .container ul li a').css('color', '#6EB253')

                        }

                    } else {
                        $('.container ul li a').css('color', '#fff')
                        $('.header').removeClass('down');
                        $('.logo').attr('src','./assets/images/logo.svg');
                        $( ".logo-right img" ).attr( "src", "./assets/images/s-logo.png" );
                        $('.navbar-nav').find('li').removeClass('focus');
                        $('.navbar-default .navbar-toggle .icon-bar').css('background-color','#fff')
                        $('.navbar-default .navbar-toggle').css('border-color', '#fff');
                    }
                });

                $(window).resize(function(){
                    if (document.documentElement.clientWidth < 750){
                        $('.down .container ul li a').css('color', '#fff');

                    }else{
                        $('.down .container ul li a').css('color', '#6EB253');
                    }
                })

                $('.navbar ul li').click(function(e){
                    e.preventDefault();
                    if(document.documentElement.clientWidth < 750){
                        $('.navbar-toggle').click();
                    }
                    if($('.navbar').hasClass('down')){
                        $(this).closest('.navbar-nav').find('li').removeClass('focus');
                        $(e.currentTarget).addClass('focus');
                    }
                });

                function onScroll(event){
                    var scrollPos = $(document).scrollTop();
                    $('.nav > a').each(function () {
                        var currLink = $(this);
                        var refElement = $(currLink.attr("href"));
                        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                            $('.navbar ul li a').removeClass("focus");
                            currLink.addClass("focus");
                        }
                        else{
                            currLink.removeClass("active");
                        }
                    });
                }


			}

		}
    })
    .directive('quienesomos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/quinesomos.html',
			controller: function($document){

			}
		}
    })
    .directive('selectproyectos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/select.html',
			controller: function($document){

                $('.head').click(function(e){
                    var opt = $(e.currentTarget).closest('.container-fluid').parent().find('.opt');
                    opt.slideToggle();
                });

                $('.opt').click(function(e){
                    var id = $(e.currentTarget).attr('id');
                    $(e.currentTarget).closest('.container-fluid').find($('.texto')).html($(e.currentTarget).text());

                    if(id == 'todos'){
                        $('#proyectos .grid .b-grid').show();
                    }else{
                        $('#proyectos .grid .b-grid').fadeOut('', function(){
                            $('#proyectos .grid .'+id).fadeIn('');
                            $('#proyectos .grid .'+id).css('opacity','1');
                        });
                    }
                    $('.opt').slideToggle();

                });

                $('.grid .b-grid')
                .mouseenter(function(e){
                    //$(e.currentTarget).find('.cintillo').fadeIn('fast')
                    $(e.currentTarget).find('.cintillo').css('opacity','1');
                }).mouseleave(function(e){
                    //$(e.currentTarget).find('.cintillo').fadeOut('fast')
                    $(e.currentTarget).find('.cintillo').css('opacity','0');
                })

			}
		}
    })
    .directive('selectpropiedades', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/selectpropiedades.html',
			controller: function($document){

                $('.headp').click(function(e){
                    var opt = $(e.currentTarget).closest('.container-fluid').parent().find('.optp');
                    opt.slideToggle();
                });
                $('.optp').click(function(e){
                    var id = $(e.currentTarget).attr('id');
                    $(e.currentTarget).closest('.container-fluid').find($('.texto')).html($(e.currentTarget).text());
                    if(id == 'todos'){
                        $('#propiedades .grid .b-grid').show();
                    }else{
                        $('#propiedades .grid .b-grid').fadeOut('', function(){
                            $('#propiedades .grid .'+id).fadeIn('');
                            $('#propiedades .grid .'+id).css('opacity','1');
                        });
                    }
                    $('.optp').slideToggle();
                });
                $('.grid .b-grid')
                .mouseenter(function(e){
                    //$(e.currentTarget).find('.cintillo').fadeIn('fast')
                    $(e.currentTarget).find('.cintillo').show('fast');
                    //$(e.currentTarget).find('.cintillo').css('opacity','1');
                }).mouseleave(function(e){
                    //$(e.currentTarget).find('.cintillo').fadeOut('fast')
                    $(e.currentTarget).find('.cintillo').hide('fast');
                    //$(e.currentTarget).find('.cintillo').css('opacity','0');
                })

			}
		}
    })
    .directive('selectdesarrollos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/selectdesarrollos.html',
			controller: function($document){

                $('.headd').click(function(e){
                    var opt = $(e.currentTarget).closest('.container-fluid').parent().find('.optd');
                    opt.slideToggle();
                });
                $('.optd').click(function(e){
                    var id = $(e.currentTarget).attr('id');
                    $(e.currentTarget).closest('.container-fluid').find($('.texto')).html($(e.currentTarget).text());
                    if(id == 'todos'){
                        $('#desarrollos .grid .b-grid').show();
                    }else{
                        $('#desarrollos .grid .b-grid').fadeOut('', function(){
                            $('#desarrollos .grid .'+id).fadeIn('');
                            $('#desarrollos .grid .'+id).css('opacity','1');
                        });
                    }
                    $('.optd').slideToggle();
                });
                $('.grid .b-grid')
                .mouseenter(function(e){
                    //$(e.currentTarget).find('.cintillo').fadeIn('fast')
                    $(e.currentTarget).find('.cintillo').css('opacity','1');
                }).mouseleave(function(e){
                    //$(e.currentTarget).find('.cintillo').fadeOut('fast')
                    $(e.currentTarget).find('.cintillo').css('opacity','0');
                })

			}
		}
    })
    .directive('proyectos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/proyectos/grid.html',
			controller: function($document){

          var galleryTop = new Swiper('.gallery-top', {
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 10,
            keyboardControl: true
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            centeredSlides: true,
            slidesPerView: 4,
            touchRatio: 0.2,
            slideToClickedSlide: true
        });
        galleryTop.params.control = galleryThumbs;
        galleryThumbs.params.control = galleryTop;


			}
		}
    })
    .directive('desarrollos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/desarrollos/grid.html',
			controller: function($document){

			}
		}
    })
    .directive('propiedades', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/propiedades/grid.html',
			controller: function($document){

			}
		}
    })
    .directive('contacto', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/contacto.html',
			controller: function($document){

			}
		}
    })
    .directive('footer', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/footer.html',
			controller: function($document){

			}
		}
    })
