(function(){
  angular.module('RoyalHomePanel.services', [])
  .factory('RoyalHomeService', ['$http', '$q', function($http, $q){
    //Funciones Proyectos
    function getInfomationProjects(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getInfomationProjects')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getProjectList(){
      var deferred = $q.defer();
			$http.get('./../php/services.php?namefunction=getProjectList')
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getProjectById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getProjectById&id='+id)
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    //Funciones Desarrollos
    function getInfomationDesarrollos(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getInfomationDesarrollos')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getDesarrolloList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getDesarrolloList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getDesarrolloById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getDesarrolloById&id='+id)
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    //Funciones Propiedades
    function getInfomationPropiedades(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getInfomationPropiedades')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getPropiedadList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getPropiedadList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getPropiedadById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getPropiedadById&id='+id)
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }

    function getStatesList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getStatesList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getCitiesList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getCitiesList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getInmobiliariaList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getInmobiliariaList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getTypeInmobiliariaList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getTypeInmobiliariaList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getTypeOperationList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getTypeOperationList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }







    function getCategory(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getCategory&id='+id)
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getSliderHome(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getSliderHome')
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getSliderPromotions(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getSliderPromotions')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderEquipment(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderEquipment')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderInstalations(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderInstalations')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderMaterial(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderMaterial')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function sliderPersonal(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=sliderPersonal')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getServicesList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getServicesList')
        .success(function(data){
          deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getServiceById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getServiceById&id='+id)
				.success(function (data) {
		        deferred.resolve(data);
		    });
		    return deferred.promise;
    }
    function getPatientList(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getPatientList')
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getPatientById(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getPatientById&id='+id)
        .success(function (data) {
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getListInterestBlog(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getListInterestBlog')
        .success(function(data){
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    function getImagesLibrary(){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getImagesLibrary')
        .success(function(data){
            deferred.resolve(data);
        });
        return deferred.promise;
    }

    function getInformationPost(id){
      var deferred = $q.defer();
      $http.get('./../php/services.php?namefunction=getInformationPost&id='+id)
        .success(function(data){
            deferred.resolve(data);
        });
        return deferred.promise;
    }
    return {
      getInfomationProjects:getInfomationProjects,  
      getProjectList : getProjectList,
      getProjectById: getProjectById,
      getInfomationDesarrollos: getInfomationDesarrollos,
      getDesarrolloList: getDesarrolloList,
      getDesarrolloById: getDesarrolloById,
      getInfomationPropiedades: getInfomationPropiedades,
      getPropiedadList: getPropiedadList,
      getPropiedadById: getPropiedadById,
      getStatesList: getStatesList,
      getCitiesList: getCitiesList,
      getInmobiliariaList: getInmobiliariaList,
      getTypeInmobiliariaList: getTypeInmobiliariaList,
      getTypeOperationList: getTypeOperationList,



      getCategory: getCategory,
      getSliderHome: getSliderHome,
      getSliderPromotions: getSliderPromotions,
      sliderEquipment: sliderEquipment,
      sliderInstalations: sliderInstalations,
      sliderMaterial: sliderMaterial,
      sliderPersonal: sliderPersonal,
      getServicesList: getServicesList,
      getServiceById: getServiceById,
      getPatientList : getPatientList,
      getPatientById: getPatientById,
      getListInterestBlog: getListInterestBlog,
      getImagesLibrary: getImagesLibrary,
      getInformationPost: getInformationPost
    }
  }]);
})();
