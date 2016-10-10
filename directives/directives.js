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
                        $( ".logo-right img" ).attr( "src", "./assets/images/s-logo2.svg" );
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
                        $( ".logo-right img" ).attr( "src", "./assets/images/s-logo.svg" );
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

                $(document).on('click', '.busqueda', function(){
                    var idCategoria = $("#categoria").attr('data-categoria');
                    var idTipo = $("#tipo").attr('data-tipo');
                    var idEstado = $("#estado").attr('data-estado');
                    var idCiudad = $("#ciudad").attr('data-ciudad');
                    if (idCategoria && idTipo && idEstado && idCiudad) {
                        location.href="./busqueda/index.php?categoria="+idCategoria+"&tipo="+idTipo+"&estado="+idEstado+"&ciudad="+idCiudad+"";
                    } else if (idCategoria && idTipo && idEstado) {
                        location.href="./busqueda/index.php?categoria="+idCategoria+"&tipo="+idTipo+"&estado="+idEstado+"";
                    } else if (idCategoria && idTipo) {
                        location.href="./busqueda/index.php?categoria="+idCategoria+"&tipo="+idTipo+"";
                    } else if (idCategoria && idEstado) {
                        location.href="./busqueda/index.php?categoria="+idCategoria+"&estado="+idEstado+"";
                    } else if (idCategoria) {
                        location.href="./busqueda/index.php?categoria="+idCategoria+"";
                    } else if (idEstado) {
                        location.href="./busqueda/index.php?estado="+idEstado+"";
                    } else {
                        $('.resultado-error').html('<p style="color:white;padding-top: 1%;">SELECCIONA ALGÚN ELEMENTO PARA LA BÚSQUEDA.</p>');
                        $('.resultado-error').css({'opacity' : '1'});
                        setTimeout(function () {
                            $('.resultado-error').css({'opacity' : '0'});
                            $('.resultado-error').text('');
                        }, 4000);
                    }
                });
                $("select[name=categoria]").change(function(){
                    var categoria = $('select[name=categoria]').val();
                    // $('.categoria-value').val($(this).val());
                    $(".divCategoria").html("<input type='text' name='categoria-value' class='categoria-value' value="+categoria+" id='categoria' data-categoria="+categoria+">");
                });
                $("select[name=tipo]").change(function(){
                    var tipo = $('select[name=tipo]').val();
                    $(".divTipo").html("<input type='text' name='tipo-value' class='tipo-value' value="+tipo+" id='tipo' data-tipo="+tipo+">");
                });
                $("select[name=estado]").change(function(){
                    var estado = $('select[name=estado]').val();
                    $(".divEstado").html("<input type='text' name='estado-value' class='estado-value' value="+estado+" id='estado' data-estado="+estado+">");
                });
                $("select[name=ciudad]").change(function(){
                    var ciudad = $('select[name=ciudad]').val();
                    $(".divCiudad").html("<input type='text' name='ciudad-value' class='ciudad-value' value="+ciudad+" id='ciudad' data-ciudad="+ciudad+">");
                });

                

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
    .directive('selectProyectos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/select-proyectos.html',
			controller: function($document){

                $('.head').click(function(e){
                    var opt = $(e.currentTarget).closest('.container-fluid').parent().find('.opt');
                    opt.slideToggle();
                });
                $('.head2').click(function(e){
                    var opt2 = $(e.currentTarget).closest('.container-fluid').parent().find('.opt2');
                    opt2.slideToggle();
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
    .directive('selectPropiedades', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/select-propiedades.html',
			controller: function($document){

                $('.headp').click(function(e){
                    var opt = $(e.currentTarget).closest('.container-fluid').parent().find('.optp');
                    opt.slideToggle();
                });
                $('.headp-2').click(function(e){
                    var opt2 = $(e.currentTarget).closest('.container-fluid').parent().find('.optd2');
                    opt2.slideToggle();
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
    .directive('selectDesarrollos', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/select-desarrollos.html',
			controller: function($document){

                $('.headd').click(function(e){
                    var opt = $(e.currentTarget).closest('.container-fluid').parent().find('.optd');
                    opt.slideToggle();
                });

                $('.headd-2').click(function(e){
                    var opt2 = $(e.currentTarget).closest('.container-fluid').parent().find('.optd2');
                    opt2.slideToggle();
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
                $('.modal-contacto-propiedad').hide();
                $('#formContactPropiedades').submit(function(){
                    var ajaxData = new FormData();
                    ajaxData.append("namefunction","datosContactaPropiedad");
                    ajaxData.append("data", $(this).serialize());
                    $.ajax({
                        url: "admin/php/functions.php",
                        type: "POST",
                        data: ajaxData,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,   // tell jQuery not to set contentType
                        success: function(result){
                            alert(result);
                            if (result == 1) {
                                $('#formContactPropiedades')[0].reset();
                                $('.resultado').html('<p style="color:white;padding-top: 1%;">MENSAJE ENVIADO CORRECTAMENTE, PRONTO NOS PONEMOS EN CONTACTO CON USTED.</p>');
                                $('.resultado').css({'opacity' : '1'});
                                setTimeout(function () {
                                    $('.resultado').css({'opacity' : '0'});
                                    $('.resultado').text('');
                                }, 4000);
                            };
                        },
                        error: function(error){
                          alert(error);
                        }
                    });
                });
                $(document).on('click', '.contactanos', function(){
                    var idPropiedad = $(".disponible").attr('data-id');
                    var namefunction = 'modalContactanosPropiedad';
                    $.ajax({
                        url: "admin/php/functions.php",
                        type: "POST",
                        data: {
                            namefunction: namefunction,
                            idPropiedad: idPropiedad
                        },
                        success: function(result){
                            $('.modal-propiedad').hide();
                            $('.modal-contacto-propiedad').show();
                            $('.input-id-propiedad').html(result);
                        },
                        error: function(error){
                            alert(error);
                        }
                    });
                });
			}
		}
    })
    .directive('contacto', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/contacto.html',
			controller: function($document){
                $('#formContacto').submit(function(){
                    var ajaxData = new FormData();
                    ajaxData.append("namefunction","datosContacto");
                    ajaxData.append("data", $(this).serialize());
                    $.ajax({
                        url: "admin/php/functions.php",
                        type: "POST",
                        data: ajaxData,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,   // tell jQuery not to set contentType
                        success: function(result){
                            if (result == 1) {
                                $('form#formContacto')[0].reset();
                                $('.resultado').html('<p style="color:white;padding-top: 1%;">MENSAJE ENVIADO CORRECTAMENTE, PRONTO NOS PONEMOS EN CONTACTO CON USTED.</p>');
                                $('.resultado').css({'opacity' : '1'});
                                setTimeout(function () {
                                    $('.resultado').css({'opacity' : '0'});
                                    $('.resultado').text('');
                                }, 4000);
                            };
                        },
                        error: function(error){
                          alert(error);
                        }
                    });
                });
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


    .directive('busqueda', function(){
        return{
			restrict: 'E',
			templateUrl: './pages/busqueda.html',
			controller: function($document){

			}
		}
    })
