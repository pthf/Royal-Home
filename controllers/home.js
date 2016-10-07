app.controller('mainController', function($scope, $timeout, $anchorScroll, $location, getDataDetailsProjects, getDataDetailsDesarrollos, getDataDetailsPropiedades, $document){
    function isScrolledIntoView(elem) {
        view = false;
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
        if( ((elemBottom-500 <= docViewBottom) && (elemTop+320 >= docViewTop)) ){
            view = true;
        }
        return view;
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

    $scope.getDetailGrid = function(id){
      $scope.id = id;
      $scope.projectDetailsList = [];
      getDataDetailsProjects.dataDetailsProjects($scope.id).then(function(data){
        $scope.projectDetailsList = data;
      });
        $('#myModal').modal({
            show: true,
            backdrop: true
        });

        $('#myModal').on('shown.bs.modal', function(event){

          setTimeout(function(){
            var galleryTop = new Swiper('.gallery-top', {
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                spaceBetween: 10,
                keyboardControl: true,
                nested: true,
                debugger: false,
                control: galleryThumbs
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 5,
                touchRatio: 1,
                slideToClickedSlide: true,
                debugger: false,
                nested: true,
                control: galleryTop
            });
            galleryTop.params.control = galleryThumbs;
            galleryThumbs.params.control = galleryTop;
          }, 10);

          $('body').css('overflow','hidden');

        });
        $('#myModal').on('hide.bs.modal	', function(event){
            $('body').css('overflow','visible');
        })
    }

    $scope.getDetailGrid1 = function(id){
      $scope.id = id;
      $scope.desarrolloDetailsList = [];
      getDataDetailsDesarrollos.dataDetailsDesarrollos($scope.id).then(function(data){
        $scope.desarrolloDetailsList = data;
      });

        $('#myModal1').modal({
            show: true,
            backdrop: true
        });

        $('#myModal1').on('shown.bs.modal', function(event){

          setTimeout(function(){
            var galleryTop = new Swiper('.gallery-top', {
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                spaceBetween: 10,
                keyboardControl: true,
                nested: true,
                debugger: false,
                control: galleryThumbs
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                centeredSlides: true,
                slidesPerView: 5,
                touchRatio: 1,
                slideToClickedSlide: true,
                debugger: false,
                nested: true,
                control: galleryTop
            });
            galleryTop.params.control = galleryThumbs;
            galleryThumbs.params.control = galleryTop;
          }, 10);

          $('body').css('overflow','hidden');

        });
        $('#myModal1').on('hide.bs.modal ', function(event){
            $('body').css('overflow','visible');
        })
    }

    $scope.getDetailGrid2 = function(id){
      $scope.id = id;
      $scope.propiedadDetailsList = [];
      getDataDetailsPropiedades.dataDetailsPropiedades($scope.id).then(function(data){
        $scope.propiedadDetailsList = data;
      });
      $('#myModal2').modal({
          show: true,
          backdrop: true
      });


      $('#myModal2').on('shown.bs.modal', function(event){

            console.log('modal open');


            $('body').css('overflow','hidden');

            setTimeout(function(){

              $(document).ready(function () {
                var galleryTop2 = new Swiper('.gallery-top2', {
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    spaceBetween: 10,
                    setWrapperSize: true,
                    keyboardControl: true,
                    debugger: false
                });
              });
            }, 50);

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

app.controller('getTypeInmobiliariaController', function($scope){
  $scope.valor={};
  $scope.valor1={
    model:null,
  };
})
app.controller("getListProjects", function($scope, getDataProjects, getDataCityList, getDataProjectsCity){
  $scope.projectList = [];
  getDataProjects.dataProjects(0).then(function(data){
    $scope.projectList = data;
  });
  $scope.filtroProyectos = function (id) {
    $scope.id = id;
    $scope.projectList = [];
    getDataProjects.dataProjects($scope.id).then(function(data){
      $scope.projectList = data;
    });
    $scope.cityList = [];
    getDataCityList.dataCity($scope.id).then(function(data){
      $scope.cityList = data;
    });
  }
  $scope.filtroProyectosCity = function (id) {
    $scope.id = id;
    $scope.projectList = [];
    getDataProjectsCity.dataProjectsCity($scope.id).then(function(data){
      $scope.projectList = data;
    });
  }
})
app.controller("getListDesarrollos", function($scope, getDataDesarrollos, getDataCityListDes, getDataDesarrollosCity){
  $scope.desarrolloList = [];
  getDataDesarrollos.dataDesarrollos(0).then(function(data){
    $scope.desarrolloList = data;
  });
   $scope.filtroDesarrollos = function (id) {
    $scope.id = id;
    $scope.desarrolloList = [];
    getDataDesarrollos.dataDesarrollos($scope.id).then(function(data){
      $scope.desarrolloList = data;
    });
    $scope.cityList = [];
    getDataCityListDes.dataCityDes($scope.id).then(function(data){
      $scope.cityList = data;
    });
  }
  $scope.filtroDesarrollosCity = function (id) {
    $scope.id = id;
    $scope.desarrolloList = [];
    getDataDesarrollosCity.dataDesarrollosCity($scope.id).then(function(data){
      $scope.desarrolloList = data;
    });
  }
})
app.controller("getListPropiedades", function($scope, getDataPropiedades, getDataCityListProp, getDataPropiedadesCity){
  $scope.propiedadList = [];
  getDataPropiedades.dataPropiedades(0).then(function(data){
    $scope.propiedadList = data;
  });
  $scope.filtroPropiedades = function (id) {
    $scope.id = id;
    $scope.propiedadList = [];
    getDataPropiedades.dataPropiedades($scope.id).then(function(data){
      $scope.propiedadList = data;
    });
    $scope.cityList = [];
    getDataCityListProp.dataCityProp($scope.id).then(function(data){
      $scope.cityList = data;
    });
  }
  $scope.filtroPropiedadesCity = function (id) {
    $scope.id = id;
    $scope.propiedadList = [];
    getDataPropiedadesCity.dataPropiedadesCity($scope.id).then(function(data){
      $scope.propiedadList = data;
    });
  }
})
app.controller("getListCategoryInmobiliarias", function($scope, getDataCategorys){
  $scope.categorysList = [];
  getDataCategorys.dataCategorysList().then(function(data){
    $scope.categorysList = data;
  });
})
app.controller('getListTypeInmobiliaria', function($scope, getDataType){
 $scope.typeList = [];
  getDataType.dataTypeList().then(function(data){
    $scope.typeList = data;
  });
})
app.controller('getListStates', function($scope, getDataState, getDataStateFront, getDataStateFrontDes, getDataStateFrontProp){
 $scope.statesList = [];
  getDataState.dataStateList().then(function(data){
    $scope.statesList = data;
  });
  $scope.statesListFront = [];
  getDataStateFront.dataStateListFront().then(function(data){
    $scope.statesListFront = data;
  });
  $scope.statesListFrontDes = [];
  getDataStateFrontDes.dataStateListFrontDes().then(function(data){
    $scope.statesListFrontDes = data;
  });
  $scope.statesListFrontProp = [];
  getDataStateFrontProp.dataStateListFrontProp().then(function(data){
    $scope.statesListFrontProp = data;
  });
})
app.controller('getListCities', function($scope, getDataCity){
 $scope.citiesList = [];
  getDataCity.dataCityList().then(function(data){
    $scope.citiesList = data;
  });
})

