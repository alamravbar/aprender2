	<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Validar Login</title>
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" />

	</head>
	<body>
		<header>
			<div class="container">
				<h1>Validar Login</h1>
			</div>
		</header>
			<div class="container contenedor">
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
				}
				?>
		</div>
</body>
</html>
