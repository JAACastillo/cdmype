
angular.
 module('agenda', []).
  controller('asesoriaController', ['$scope','proyectoService', function ($scope, proyectoService) {
      $scope.proyectos = [];
      $scope.actividades = []
      $scope.empresarioID = $('#empresa_id').val();
      $scope.empresarios = $('#empresa').val();

      selected = 5;


      $scope.loadProyectos = function (){
         $scope.proyectos = [];
         $scope.actividades = []
        $scope.empresarioID  = $('#empresa_id').val();
          proyectoService.proyectos($scope.empresarioID)
          .then(function (proyectos){
              $scope.proyectos = proyectos;
          })
        // }
      };

      $scope.loadActividades = function (){
          proyectoService.actividades($scope.proyectoID)
          .then(function (actividades){
            $scope.actividades = actividades;
          })
      }

      $scope.loadProyectos();
  }]).

 factory('proyectoService', ['$q', '$http', function($q, $http) {

      url = $('#url').val();
      function proyectos(id){
         defer = $q.defer();

         $http.get(url + '/api/proyectos/' + id)
         .success( function(proyectos){
            defer.resolve(proyectos);

         })
         return defer.promise;
      }

      function actividades(id){
         defer = $q.defer();

         $http.get(url + '/api/actividades/' + id)
         .success( function(actividades){
            defer.resolve(actividades);

         })
         return defer.promise;
      }
      return {
         proyectos:proyectos,
         actividades:actividades
      }

  }]);
