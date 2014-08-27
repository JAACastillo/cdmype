<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	body {
		background-color: #ebeceb;
		font-size: 1.1em;
	}
		.contenido{
			background-color: #ffffff;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
			color: #454545;
			border: 1px solid black;
			border-top: 20px solid #000000;
			line-height: 40px;
			padding-left: 20px

		}

		.iniciar{
			padding-top: 10px;
			padding-bottom: 10px;
			padding-left: 30px;
			padding-right: 30px;
			background-color: #22a710;
			border-radius: 5px;
			color: #ffffff;
			text-decoration: none;
			width: 150px;

		}
		.contenido .datos{
			padding-left: 20px;
		}

	</style>
</head>
<body>

<div class="contenido">

<h2 class="usuario"> <strong>{{$usuario->nombre}}</strong> </h2>

	
	Estos son los datos de acceso para el sistema CDMYPE <br><br>
	
	<div class="datos">
		Usuario: <strong> {{$usuario->email}} </strong><br><br>
		Contraseña: <strong> {{$pass}} </strong> <br><br>
	</div>

	<a href="{{route('login')}}" class="iniciar"> Entrar al Sistema</a> <br><br>

</div>




</body>
</html>