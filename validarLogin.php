	<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Validar Login</title>
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
	    <nav class="navbar navbar-default">
	      <div class="container-fluid" style="height:100px;">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo aprender.com.ar"></a>
	        </div>

	      </div>
	    </nav>
	  </header>
			<div class="container contenedor" style="text-align:center;">
				<h2>Validar Usuario</h2>
				<?php
				/**
				 * recibe el nombre de usuario y clave desde el formulario de  login
				 * inicia el objeto Login y lo intenta validar
				 *   si valida redirige a paginaSegura1.php
				 *   si no muestra el error
				 */
				include('lib/Login.php');
				$oLogin=new Login();
				$oLogin->iniciar($_POST['nombre_usuario'],$_POST['psw']);
				if ($oLogin->validar()){
					header('location:index.php');
					exit();
				}else{
					echo $oLogin->getError();
					echo " <a href='index.php'>Volver</a>";
					}
				?>

		</div>
</body>
</html>
