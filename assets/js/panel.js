

var app = angular.module('panel', ['googlechart'])

.controller('panelController', ['asesorService', '$log', '$scope', function(asesorService, $log, $scope){
	// $log.info('Controlador iniciado');
	$scope.estadisticas = [];
	$scope.asesorId = 0;
	
	function cargarDatos(asesor){
		asesorService.asesor(asesor, $scope.from, $scope.to).then( function(data){
		$scope.estadisticas = data;
		// $log.info(data);
		grafica(asesor);
		$scope.asesorId = asesor;
	})
	}

	$scope.asesor = function (asesor) {
		$scope.estadisticas = [];
		cargarDatos(asesor);
	}


	function grafica(asesor){
		// para la grafica de atencion que quiero mostrar

		asesorService.grafica(asesor, $scope.from, $scope.to).then(function(data){
			var chart = {};
			   chart.type = "AreaChart";
			   chart.cssStyle = "height:300px; width:100%;";
			   chart.data = {"cols": [
			       {id: "month", label: "Mes", type: "string"},
			       {id: "asesoria-id", label: "Asesoria", type: "number"},
			       {id: "evento-id", label: "Evento", type: "number"},
			       {id: "capacitacion-id", label: "Capacitaciones", type: "number"},
			       {id: "asistencia-id", label: "Asistencia", type: "number"}
			   ], "rows": data};

			   chart.options = {
			       "title": "Actividades por mes",
			       "isStacked": "false",
			       "fill": 20,
			       "displayExactValues": true,
			       "vAxis": {
			           "title": "Cantidad de actividades", "gridlines": {"count": 6}
			       },
			       "hAxis": {
			           "title": "Fecha"
			       }
			   };

			   chart.formatters = {};

			   $scope.chart = chart;
		})

		
	}
	$scope.update = function(){
		//Date(myDate).getTime();
		time();
		cargarDatos($scope.asesorId);

	}
	function time(){
		$scope.from 	= $("#dateInicio").val();
		$scope.to 		= $("#dateFin").val();		
	}
	time();
	cargarDatos(0);

	//fin de la grafica de atencion

}])
.factory('asesorService',['$http', '$q', '$log', function($http, $q, $log){
	function asesor(asesor, from, to){
		$log.info('servicio iniciado')
		defer = $q.defer();

		$http.get('/cdmype/sistema/panel/asesor/' + asesor + "?from=" + from + '&to=' + to)
			.success( function (data){
				defer.resolve(data);
			})
			.error( function (data){
				$log.info(data);
				defer.reject(data);
			})
		return defer.promise;
	}

	function grafica(asesor, from, to){
		defer = $q.defer();

		$http.get('/cdmype/sistema/panel/grafica/' + asesor + "?from=" + from + '&to=' + to)
			.success( function (data){
				defer.resolve(data);
			})
			.error( function (data){
				$log.info(data);
				defer.reject(data);
			})
		return defer.promise;
	}

	return {
		asesor: asesor,
		grafica: grafica
	}
}])