app.config(['$locationProvider', function($routeProvider, $locationProvider){
    $routeProvider

        .when('/', {
            templateUrl: 'pages/home.html',
            controller: 'mainController'
        });

        .when('/busqueda', {
            templateUrl: 'pages/busqueda.html'
        });
        $locationProvider.html5Mode(true);
}])
