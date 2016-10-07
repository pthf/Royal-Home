(function(){
  angular.module('RoyalHomePanel.directives', [])
  .directive('topNav', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/top-nav.php',
			controller: function($document){
				var open = true;
				$(window).resize(function(){
					open = true;
					if($(window).width()>1366){
						$('.menu-nav').css({'margin-left' : '0%'});
						$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
					}else{
						if($(window).width()>768){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '80%','left' : '20%'});
						}else{
							if($(window).width()>640){
								$('.menu-nav').css({ 'margin-left' : '0%'});
								$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
							}
						}
					}
				});
				$('#menuha').click(function(){
					if(open){
						if($(window).width()>1366){
							$('.menu-nav').css({'margin-left' : '-15%'});
							$('.panel-cont').css({'width' : '100%', 'left' : '0'});
						}else{
							if($(window).width()>768){
								$('.menu-nav').css({'margin-left' : '-20%'});
								$('.panel-cont').css({'width' : '100%','left' : '0'});
							}else{
								if($(window).width()>640){
									$('.menu-nav').css({ 'margin-left' : '-25%'});
									$('.panel-cont').css({ 'width' : '100%', 'left' : '0'});
								}
							}
						}
					}else{
						if($(window).width()>1366){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
						}else{
							if($(window).width()>768){
								$('.menu-nav').css({'margin-left' : '0%'});
								$('.panel-cont').css({'width' : '80%','left' : '20%'});
							}else{
								if($(window).width()>640){
									$('.menu-nav').css({ 'margin-left' : '0%'});
									$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
								}
							}
						}
					}
					open = !open;
				});
				$('.logout').click(function(){
					var namefunction = 'logOut';
					$.ajax({
						beforeSend: function(){
						},
						url: "../php/functions.php",
						type: "POST",
						data: {
							namefunction : namefunction
						},
						success: function(result){
							location.reload();
						},
						error: function(error){
						},
						complete: function(){
						},
						timeout: 10000
					});
				});
			}
		};
	})
  .directive('menuNav', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/menu-nav.php',
			controller: function($document){
				$(window).resize(function(){
					if($(window).width()>1366){
						$('.menu-nav').css({'margin-left' : '0%'});
						$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
					}else{
						if($(window).width()>768){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '80%','left' : '20%'});
						}else{
							if($(window).width()>640){
								$('.menu-nav').css({ 'margin-left' : '0%'});
								$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
							}
						}
					}
				});
			}
		};
	})
  .directive('listSliderPersonal', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-personal.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSliderPersonal';
          $.ajax({
				url: "../php/functions.php",
				type: "POST",
				data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageSliderPersonal').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderPersonal");

			$.each($("#insertImageSliderPersonal input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageSliderPersonal['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
	// PROYECTOS 
	.directive('agregarProyecto', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/agregar-proyecto.html',
			controller: function($document){
				$('#formProyecto').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarNuevoProyecto");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#formProyecto .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('logo-proyecto['+j+']', file);
	    				})
	    			});
	    			$.each($("#formProyecto .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imagenes-proyecto['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		                $('.bReload').trigger('click');
		                $('.clickoculted').trigger('click');
		                $('#formProyecto')[0].reset();
						$('.result').html('<div class="alert alert-success" role="alert">Proyecto agregado correctamente.</div>');
	                    $('.result').css({'opacity' : '1'});
	                    setTimeout(function () {
	                        $('.result').css({'opacity' : '0'});
	                        $('.result').text('');
	                    }, 4000);
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
	.directive('listadoProyectos', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/listado-proyectos.html',
			controller: function($document){
				$(document).on('click', '.deleteElement', function(){
					var idProyecto = $(this).attr('data-id');
					var namefunction = 'eliminarProyecto';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idProyecto: idProyecto,
							namefunction: namefunction
						},
						success: function(result){
							$('.clickoculted').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('listarImagenesProyecto', function() {
		return {
			restrict: 'E',
			templateUrl: './../partials/listar-imagenes-proyecto.html',
			controller: function($document){
				$('#insertImageProject').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarImagenesProyecto");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#insertImageProject .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageGalleryProject['+j+']', file);
	    				})
	    			});
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
			              $('.bReload').trigger('click');
			            },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
		        $(document).on('click', '.deleteImage', function(){
		        	var idProyecto = $(this).attr('data-name');
					var idImagenProyecto = $(this).attr('data-id');
					var namefunction = 'eliminarImagenProyecto';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idImagenProyecto: idImagenProyecto,
							namefunction: namefunction,
							idProyecto: idProyecto
						},
						success: function(result){
							$('.bReload').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('editarProyecto', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/editar-proyecto.html',
			controller: function($document){
				$('#formEditProyecto').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","editarProyecto");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#formEditProyecto .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('logo-proyecto['+j+']', file);
	    				})
	    			});
	    			$.each($("#formEditProyecto .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imagenes-proyecto['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		                $('.bReload').trigger('click');
						$('.result').html('<div class="alert alert-success" role="alert">Producto modificado.</div>');
	                    $('.result').css({'opacity' : '1'});
	                    setTimeout(function () {
	                        $('.result').css({'opacity' : '0'});
	                        $('.result').text('');
	                    }, 4000);
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
	.directive('logoProyecto', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/logo-proyecto.html',
			controller: function($document){
				$('#insertLogoProject').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","cambiarLogoProyecto");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#insertLogoProject .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageLogoProject['+j+']', file);
	    				})
	    			});
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
			              $('.bReload').trigger('click');
			            },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
			}
		}
	})
	// DESARROLLOS 
	.directive('agregarDesarrollo', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/agregar-desarrollo.html',
			controller: function($document){
				$('#formDesarrollo').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarNuevoDesarrollo");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#formDesarrollo .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('logo-desarrollo['+j+']', file);
	    				})
	    			});
	    			$.each($("#formDesarrollo .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imagenes-desarrollo['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
			            $('.bReload').trigger('click');
			            $('.clickoculted').trigger('click');
			            $('#formDesarrollo')[0].reset();
						$('.result').html('<div class="alert alert-success" role="alert">Desarrollo agregado correctamente.</div>');
	                    $('.result').css({'opacity' : '1'});
	                    setTimeout(function () {
	                        $('.result').css({'opacity' : '0'});
	                        $('.result').text('');
	                    }, 4000);
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
	.directive('listadoDesarrollos', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/listado-desarrollos.html',
			controller: function($document){
				$(document).on('click', '.deleteElement', function(){
					var idDesarrollo = $(this).attr('data-id');
					var namefunction = 'eliminarDesarrollo';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idDesarrollo: idDesarrollo,
							namefunction: namefunction
						},
						success: function(result){
							$('.clickoculted').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('listarImagenesDesarrollo', function() {
		return {
			restrict: 'E',
			templateUrl: './../partials/listar-imagenes-desarrollo.html',
			controller: function($document){
				$('#insertImageDesarrollo').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarImagenesDesarrollo");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#insertImageDesarrollo .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageGalleryDesarrollo['+j+']', file);
	    				})
	    			});
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
			              $('.bReload').trigger('click');
			            },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
		        $(document).on('click', '.deleteImage', function(){
		        	var idDesarrollo = $(this).attr('data-name');
					var idImagenDesarrollo = $(this).attr('data-id');
					var namefunction = 'eliminarImagenDesarrollo';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idImagenDesarrollo: idImagenDesarrollo,
							namefunction: namefunction,
							idDesarrollo: idDesarrollo
						},
						success: function(result){
							$('.bReload').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('editarDesarrollo', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/editar-desarrollo.html',
			controller: function($document){
				$('#formEditDesarrollo').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","editarDesarrollo");
					ajaxData.append("data", $(this).serialize());
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		              	$('.bReload').trigger('click');
		              	$('.result').html('<div class="alert alert-success" role="alert">Desarrollo modificado.</div>');
	                    $('.result').css({'opacity' : '1'});
	                    setTimeout(function () {
	                        $('.result').css({'opacity' : '0'});
	                        $('.result').text('');
	                    }, 4000);
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
	.directive('logoDesarrollo', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/logo-desarrollo.html',
			controller: function($document){
				$('#insertLogoDesarrollo').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","cambiarLogoDesarrollo");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#insertLogoDesarrollo .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageLogoDesarrollo['+j+']', file);
	    				})
	    			});
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
			              $('.bReload').trigger('click');
			            },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
			}
		}
	})
	// PROPIEDADES 
	.directive('agregarPropiedad', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/agregar-propiedad.html',
			controller: function($document){
				$('#formPropiedad').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarNuevaPropiedad");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#formPropiedad .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('logo-propiedad['+j+']', file);
	    				})
	    			});
	    			$.each($("#formPropiedad .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imagenes-propiedad['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		                $('.bReload').trigger('click');
		                $('.clickoculted').trigger('click');
		                $('#formPropiedad')[0].reset();
						$('.result').html('<div class="alert alert-success" role="alert">Propiedad agregada correctamente.</div>');
	                    $('.result').css({'opacity' : '1'});
	                    setTimeout(function () {
	                        $('.result').css({'opacity' : '0'});
	                        $('.result').text('');
	                    }, 4000);
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
	.directive('listadoPropiedades', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/listado-propiedades.html',
			controller: function($document){
				$(document).on('click', '.deleteElement', function(){
					var idPropiedad = $(this).attr('data-id');
					var namefunction = 'eliminarPropiedad';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idPropiedad: idPropiedad,
							namefunction: namefunction
						},
						success: function(result){
							$('.clickoculted').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('listarImagenesPropiedad', function() {
		return {
			restrict: 'E',
			templateUrl: './../partials/listar-imagenes-propiedad.html',
			controller: function($document){
				$('#insertImagePropiedad').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarImagenesPropiedad");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#insertImagePropiedad .imagenes"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageGalleryPropiedad['+j+']', file);
	    				})
	    			});
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
			              $('.bReload').trigger('click');
			            },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
		        $(document).on('click', '.deleteImage', function(){
		        	var idPropiedad = $(this).attr('data-name');
					var idImagenPropiedad = $(this).attr('data-id');
					var namefunction = 'eliminarImagenPropiedad';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idImagenPropiedad: idImagenPropiedad,
							namefunction: namefunction,
							idPropiedad: idPropiedad
						},
						success: function(result){
							$('.bReload').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('editarPropiedad', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/editar-propiedad.html',
			controller: function($document){
				$('#formEditPropiedad').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","editarPropiedad");
					ajaxData.append("data", $(this).serialize());
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		              	$('.bReload').trigger('click');
		              	$('.result').html('<div class="alert alert-success" role="alert">Propiedad modificada.</div>');
	                    $('.result').css({'opacity' : '1'});
	                    setTimeout(function () {
	                        $('.result').css({'opacity' : '0'});
	                        $('.result').text('');
	                    }, 4000);
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
	.directive('logoPropiedad', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/logo-propiedad.html',
			controller: function($document){
				$('#insertLogoPropiedad').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","cambiarLogoPropiedad");
					ajaxData.append("data", $(this).serialize());

	    			$.each($("#insertLogoPropiedad .logo"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageLogoPropiedad['+j+']', file);
	    				})
	    			});
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
			              $('.bReload').trigger('click');
			            },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
			}
		}
	})
	.directive('agregarTipoInmobiliaria', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/agregar-tipo-inmobiliaria.html',
			controller: function($document){
				$('#formTipoInmobiliaria').submit(function(){
		          	var ajaxData = new FormData();
	    			ajaxData.append("namefunction","agregarTipoInmobiliaria");
					ajaxData.append("data", $(this).serialize());
		          	$.ajax({
			            url: "../php/functions.php",
			            type: "POST",
			            data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
			            success: function(result){
							$('.bReload').trigger('click');
							$('#formTipoInmobiliaria')[0].reset();
							$('.result').html('<div class="alert alert-success" role="alert">Categoría agregada.</div>');
	                        $('.result').css({'opacity' : '1'});
	                        setTimeout(function () {
	                            $('.result').css({'opacity' : '0'});
	                            $('.result').text('');
	                        }, 4000);
				        },
			            error: function(error){
			              alert(error);
			            }
		        	});
		        });
			}
		}
	})
})();
