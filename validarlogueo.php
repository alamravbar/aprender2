<?php
/**
 * recibe el nombre de usuario y clave desde el formulario de  login
 * inicia el objeto Login y lo intenta validar
 *   si valida redirige a paginaSegura1.php
 *   si no muestra el error
 */
include_once('lib/Login.php');
$oLogin=new Login();

$oLogin->iniciar($_POST['username'],$_POST['psw']);
if ($oLogin->validar()){
	echo "nanai";
	exit();
}else{
	echo $oLogin->getError();
	exit("<a href='index.php'>Login</a>");
}
?>