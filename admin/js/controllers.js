(function(){
  angular.module('RoyalHomePanel.controllers', [])
  .controller('menuNavController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){
		$scope.routeParams = $location.path();
		switch ($scope.routeParams) {
      case '/proyectos': $scope.selected = 1;  break;
      case '/proyecto': $scope.selected = 1;  break;
      case '/desarrollos': $scope.selected = 2;  break;
      case '/desarrollo': $scope.selected = 2;  break;
      case '/propiedades': $scope.selected = 3;  break;
      case '/propiedad': $scope.selected = 3;  break;
      case '/tipo-inmobiliaria': $scope.selected = 4;  break;
		}
		$scope.changeNav = function(item){
			$scope.selected = item;
		};
	}])
  //Controladores Proyectos
  .controller('getImagesProjectController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationProjects().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
    $scope.valor={};
    $scope.valor1={};
  }])
  .controller('getListProjectController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.projectList = [];
    RoyalHomeService.getProjectList().then(function(data){
      $scope.projectList = data;
    });
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationProjects().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
  }])
  .controller('projectDescription', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.projectElement = [];
    $scope.id = parseInt($routeParams.id);
    RoyalHomeService.getProjectById($scope.id).then(function(data){
      $scope.projectElement = data;
    });
  }])
  //Controladores Desarrollos
  .controller('getImagesDesarrolloController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationDesarrollos().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
    $scope.valor={};
    $scope.valor1={};
  }])
  .controller('getListDesarrolloController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.DesarrolloList = [];
    RoyalHomeService.getDesarrolloList().then(function(data){
      $scope.DesarrolloList = data;
    });
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationDesarrollos().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
  }])
  .controller('desarrolloDescription', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.desarrolloElement = [];
    $scope.id = parseInt($routeParams.id);
    RoyalHomeService.getDesarrolloById($scope.id).then(function(data){
      $scope.desarrolloElement = data;
    });
  }])
  //Controladores Propiedades
  .controller('getImagesPropiedadesController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationPropiedades().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
    $scope.valor={};
    $scope.valor1={};
  }])
  .controller('getListPropiedadesController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.PropiedadList = [];
    RoyalHomeService.getPropiedadList().then(function(data){
      $scope.PropiedadList = data;
    });
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationPropiedades().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
  }])
  .controller('propiedadesDescription', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.propiedadElement = [];
    $scope.id = parseInt($routeParams.id);
    RoyalHomeService.getPropiedadById($scope.id).then(function(data){
      $scope.propiedadElement = data;
    });
  }])
  // Controladores Tipo Inmobiliaria
  .controller('getTypeInmobiliariaController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.listImages = [];
    $scope.loadImages = function(){
      RoyalHomeService.getInfomationProjects().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadImages();
    $scope.valor={};
    $scope.valor1={};
  }])

  .controller('getListStates', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
   $scope.availableOptions = [];
    RoyalHomeService.getStatesList().then(function(data){
      $scope.availableOptions = data;
    });
  }])
  .controller('getListCities', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
   $scope.availableOptions = [];
    RoyalHomeService.getCitiesList().then(function(data){
      $scope.availableOptions = data;
    });
  }])
  .controller('getListInmobiliaria', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
   $scope.availableOptions = [];
    RoyalHomeService.getInmobiliariaList().then(function(data){
      $scope.availableOptions = data;
    });
  }])
  .controller('getListTypeInmobiliaria', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
   $scope.availableOptions = [];
    RoyalHomeService.getTypeInmobiliariaList().then(function(data){
      $scope.availableOptions = data;
    });
  }])
  .controller('getListTypeOperation', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
   $scope.availableOptions = [];
    RoyalHomeService.getTypeOperationList().then(function(data){
      $scope.availableOptions = data;
    });
  }])







  .controller('tinyController', ['$scope', function($scope){
    $scope.tinymceModel = 'Initial content';
    $scope.getContent = function() {
      console.log('Editor content:', $scope.tinymceModel);
    };
    $scope.setContent = function() {
      $scope.tinymceModel = 'Time: ' + (new Date());
    };
    $scope.tinymceOptions = {
      onChange: function(e) {
      },
      inline: false,
      plugins : 'advlist autolink link image lists charmap print preview table',
      skin: 'lightgray',
      theme : 'modern',
      height : 600,
      convert_urls:true,
      relative_urls:false,
      remove_script_host:false,
    };
  }])
  .controller('viewNavController', ['$scope', function($scope){
    $scope.item = 1;
    $scope.selectItem = function(item){
      $scope.item = item;
    };
  }])
  .controller('getListInterestBlogController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.listInterestBlog = [];
    $scope.loadList = function(){
      RoyalHomeService.getListInterestBlog().then(function(data){
        $scope.listInterestBlog = data;
      });
    }
    $scope.loadList();
  }])
  .controller('getImagesLibraryController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.listImages = [];
    $scope.loadList = function(){
      RoyalHomeService.getImagesLibrary().then(function(data){
        $scope.listImages = data;
      });
    }
    $scope.loadList();
  }])
  .controller('getInterestPostByIdController', ['$scope', '$routeParams', 'RoyalHomeService', '$sce', function($scope, $routeParams, RoyalHomeService, $sce){
    $scope.id = parseInt($routeParams.id);
    $scope.informationPost = [];
    $scope.loadInformation = function(){
      RoyalHomeService.getInformationPost($scope.id).then(function(data){
        $scope.informationPost = data;
      });
    }
    $scope.loadInformation();
    $scope.trustAsHtml = function(html) {
      return $sce.trustAsHtml(html);
    };
  }])
  // .controller('getEventPostByIdController', ['$scope', '$routeParams', 'RoyalHomeService', '$sce', function($scope, $routeParams, RoyalHomeService, $sce){
  //   $scope.id = parseInt($routeParams.id);
  //   $scope.informationPost = [];
  //   $scope.loadInformation = function(){
  //     RoyalHomeService.getInformationEventPost($scope.id).then(function(data){
  //       $scope.informationPost = data;
  //     });
  //   }
  //   $scope.loadInformation();
  //   $scope.trustAsHtml = function(html) {
  //     return $sce.trustAsHtml(html);
  //   };
  // }])
  .controller('projectNavController', ['$scope', function($scope){
		$scope.item = 1;
		$scope.selectItem = function(item){
			$scope.item = item;
		};
  }])
  .controller('projectListController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.projectList = [];
    RoyalHomeService.getProjectList().then(function(data){
      $scope.projectList = data;
    });
  }])
  .controller('sliderHome', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.sliderElements = [];
    RoyalHomeService.getSliderHome().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('serviceListController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.serviceList = [];
    RoyalHomeService.getServicesList().then(function(data){
      $scope.serviceList = data;
    });
  }])
  .controller('serviceDescription', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.serviceElement = [];
    $scope.id = parseInt($routeParams.id);
    RoyalHomeService.getServiceById($scope.id).then(function(data){
      $scope.serviceElement = data;
    });
  }])
  .controller('sliderPromotions', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.sliderElements = [];
    RoyalHomeService.getSliderPromotions().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderEquipment', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.sliderElements = [];
    RoyalHomeService.sliderEquipment().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderInstalations', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.sliderElements = [];
    RoyalHomeService.sliderInstalations().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderMaterial', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.sliderElements = [];
    RoyalHomeService.sliderMaterial().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('sliderPersonal', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.sliderElements = [];
    RoyalHomeService.sliderPersonal().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('patientListController', ['$scope', 'RoyalHomeService', function($scope, RoyalHomeService){
    $scope.patientList = [];
    RoyalHomeService.getPatientList().then(function(data){
      $scope.patientList = data;
    });
  }])
  .controller('patientDescription', ['$scope', '$routeParams', 'RoyalHomeService', function($scope, $routeParams, RoyalHomeService){
    $scope.patientElement = [];
    $scope.id = parseInt($routeParams.id);
    RoyalHomeService.getPatientById($scope.id).then(function(data){
      $scope.patientElement = data;
    });
  }])
})();
