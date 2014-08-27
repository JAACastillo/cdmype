<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	body {
	}
		.contenido{
			

		}

		.iniciar{

		}
		.contenido .datos{
			
		}

	</style>
</head>
<body style="
		background-color: #ebeceb;
		font-size: 1.1em;">

<div class="contenido" style="background-color: #ffffff;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
			color: #454545;
			border: 1px solid #454545;
			border-top: 20px solid #000000;
			line-height: 40px;
			padding-left: 20px">

<h2 class="usuario"> <strong>{{$usuario->nombre}}</strong> </h2>

	
	Estos son los datos de acceso para el sistema CDMYPE <br>
	
	<div class="datos" style="padding-left: 20px;">
		Usuario: <strong> {{$usuario->email}} </strong><br>
		Contraseña: <strong> {{$pass}} </strong> <br>
	</div>

	<a href="{{route('login')}}" class="iniciar" style="
			padding-top: 10px;
			padding-bottom: 10px;
			padding-left: 30px;
			padding-right: 30px;
			background-color: #22a710;
			border-radius: 5px;
			color: #ffffff;
			text-decoration: none;
			width: 150px;
			margin-bottom: 50px;
			"> Entrar al Sistema</a> <br>

</div>




</body>
</html>