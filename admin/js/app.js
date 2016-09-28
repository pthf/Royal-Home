(function(){
  var app = angular.module('RoyalHomePanel', [
		'ngRoute',
		'RoyalHomePanel.controllers',
		'RoyalHomePanel.services',
		'RoyalHomePanel.directives',
    'ui.tinymce',
    'ngclipboard',
    'ngSanitize'
	]);
  app.config(['$routeProvider', function($routeProvider){
    $routeProvider
      .when('/proyectos', {
        templateUrl: './../views/proyectos.html',
        controller: 'menuNavController'
      })
      .when('/proyecto/:id', {
        templateUrl: './../views/detalle-proyecto.html',
        controller: 'getInterestPostByIdController'
      })
      .when('/desarrollos', {
        templateUrl: './../views/desarrollos.html',
        controller: 'menuNavController'
      })
      .when('/desarrollo/:id', {
        templateUrl: './../views/detalle-desarrollo.html',
        controller: 'getInterestPostByIdController'
      })
      .when('/propiedades', {
        templateUrl: './../views/propiedades.html',
        controller: 'menuNavController'
      })
      .when('/propiedad/:id', {
        templateUrl: './../views/detalle-propiedad.html',
        controller: 'getInterestPostByIdController'
      })
      .when('/tipo-inmobiliaria', {
        templateUrl: './../views/inmobiliarias.html',
        controller: 'menuNavController'
      })
      .otherwise({
        redirectTo: '/proyectos'
      });
  }]);
})();
