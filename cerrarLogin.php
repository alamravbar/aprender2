<?php
/**
 * Cierra la sesión
 */
include_once 'lib/Login.php';
$oLogin=new Login();
if($oLogin->cerrar()){
  header('location:index.php');
  exit();
}else{
	echo $oLogin->getError();
}
?>
