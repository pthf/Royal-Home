
app.service('getPanoramio', function($http, $q){
    var panoramas;
    var url = 'http://www.panoramio.com/map/get_panoramas.php?set=public&from=0&to=20&minx=-180&miny=-90&maxx=180&maxy=90&size=medium&mapfilter=true'
    $http.get(url)
    .then(function(req){
        req = panoramas;
    })
    return panoramas
})
//Servicios RoyalHome
app.service('getDataProjects', function($http, $q){
    this.dataProjects = function(idEstado){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getProjectList&idEstado='+idEstado)
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataDetailsProjects', function($http, $q){
    this.dataDetailsProjects = function(id){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getListDetailsProject&id='+id)
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataDesarrollos', function($http, $q){
    this.dataDesarrollos = function(idEstado){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getDesarrolloList&idEstado='+idEstado)
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataDetailsDesarrollos', function($http, $q){
    this.dataDetailsDesarrollos = function(id){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getListDetailsDesarrollo&id='+id)
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataPropiedades', function($http, $q){
    this.dataPropiedades = function(idEstado){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getPropiedadList&idEstado='+idEstado)
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataDetailsPropiedades', function($http, $q){
    this.dataDetailsPropiedades = function(id){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getListDetailsPropiedad&id='+id)
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataCategorys', function($http, $q){
    this.dataCategorysList = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getInmobiliariaList')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataType', function($http, $q){
    this.dataTypeList = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getTypeInmobiliariaList')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataState', function($http, $q){
    this.dataStateList = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getStatesList')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataStateFront', function($http, $q){
    this.dataStateListFront = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getStatesListFront')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataStateFrontDes', function($http, $q){
    this.dataStateListFrontDes = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getStatesListFrontDes')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataStateFrontProp', function($http, $q){
    this.dataStateListFrontProp = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getStatesListFrontProp')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});
app.service('getDataCity', function($http, $q){
    this.dataCityList = function(){
        var deferred = $q.defer();
        $http.get('./php/services.php?namefunction=getCitiesList')
            .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
});




app.service('getbanner', function($http, $q){
    var url = 'backend/proyectos.php'
    $http.get(url)
    .then(function(req){
        req = banners;
    })
    return banners
});
app.service('getbanner', function($http, $q){
    var url = 'backend/desarrollos.php'
    $http.get(url)
    .then(function(req){
        req = banners;
    })
    return banners
});
app.service('getbanner', function($http, $q){
    var url = 'backend/propiedades.php'
    $http.get(url)
    .then(function(req){
        req = banners;
    })
    return banners
});




app.service('getItems', function($http, $q){
    var url = 'backend/items.php'
    $http.get(url)
    .then(function(req){
        req = items;
    })
    return items
})

app.service('getMenu', function($http, $q){
    var url = 'backend/menu.php'
    $http.get(url)
    .then(function(req){
        req = products_new;
    })
    return menu
})


app.service('newProducts', function($http, $q){
    var url = 'backend/new_products.php'
    $http.get(url)
    .then(function(req){
        req = products_new;
    })
    return products_new
})

app.service('newProductsFeatures', function($http, $q){
    var url = 'backend/new_products_features.php'
    $http.get(url)
    .then(function(req){
        req = products_feature;
    })
    return products_feature
})

app.service('search', function($http, $q){
    var url = 'backend/search.php'
    $http.get(url)
    .then(function(req){
        req = products_feature;
    })
    return search
})
