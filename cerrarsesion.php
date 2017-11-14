<?php
include_once "lib/Login.php";

$oLogin=new Login();
if($oLogin->cerrar()){
	echo 'Sesion cerrada';
    $oLogin->cerrar();
     echo "<a href='index.php'>Login</a>";
}else{
	echo $oLogin->getError();
}
?>