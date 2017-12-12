<?php
include_once('lib/Login.php');
include_once"lib/PDOConfig.php";
$oLogin=new Login();


	    $base=new PDOConfig();
        if(isset($_GET)&&(!empty($_GET))){
            print_r($_GET);
			$usuario=$oLogin->getNombreUsuario();
			$pswNuevo=$_GET['claveNueva'];
			$sql="UPDATE usuario SET psw='".$pswNuevo."' WHERE nombre='".$usuario."'";
			$resultado=$base->query($sql);
			if($resultado){
					echo "clave modificada";
					header('location:index.php');
					exit();
			}else{
				echo "No pudo modificarse la Clave";
				echo " <a href='index.php'>Volver</a>";
			}
        }
?>

