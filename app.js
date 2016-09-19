var app = angular.module('app', [
                                  'rhome.directives',
                                  'angular-parallax',
                                  'ngMap',
                                  'duScroll'
                              ]);

app.run(function($rootScope, $timeout, $anchorScroll) {
    console.log('starting run');

    $rootScope.$watch('$viewContentLoaded', function(){
        $timeout(function () {
            var adding = function(element, direction){
                $('.navbar-nav').find('li').removeClass('focus');
                    if(direction == 'down'){
                        $(element).addClass('focus');
                    }
                    else if(direction == 'up'){
                        $(element).removeClass('focus');
                        $(element).addClass('focus');
                    }

            }
            $('#quienesomos').waypoint({
                handler: function(direction) {
                    adding('.quienesomosli', direction);
                }
            })
            $('#filosofia').waypoint({
                handler: function(direction) {
                    adding('.quienesomosli', direction);
                }
            })
            $('#proyectos').waypoint({
                handler: function(direction) {
                    adding('.proyectosli', direction);
                }
            },
            { offset: '-250%'})
            $('#desarrollos').waypoint({
                handler: function(direction) {
                    adding('.desarrollosli', direction);
                }
            })
            $('#propiedades').waypoint({
                handler: function(direction) {
                    adding('.propiedadesli', direction);
                }
            })
            $('#contacto').waypoint({
                handler: function(direction) {
                    adding('.contactoli', direction);
                }
            })
        }, 800);

    });
});
