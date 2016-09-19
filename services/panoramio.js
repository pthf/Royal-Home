
app.service('getPanoramio', function($http, $q){
    var panoramas;
    var url = 'http://www.panoramio.com/map/get_panoramas.php?set=public&from=0&to=20&minx=-180&miny=-90&maxx=180&maxy=90&size=medium&mapfilter=true'
    $http.get(url)
    .then(function(req){
        req = panoramas;
    })
    return panoramas
})


app.service('getbanner', function($http, $q){
    var url = 'backend/bannersHome.php'
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
