app.config(['$locationProvider', function($routeProvider, $locationProvider){
    $routeProvider

        .when('/', {
            templateUrl: 'pages/home.html',
            controller: 'mainController'
        });
        $locationProvider.html5Mode(true);
}])
