<?php
  include_once '../../lib/PDOConfig.php';
  include_once "../../lib/Login.php";
  $base = new PDOConfig();
  $oLogin=new Login(); //Generamos el objeto Login
  if($oLogin->activa() && ($oLogin->getRol() == 3 || $oLogin->getRol() == 2)){
    if($_POST){
      $id = $_POST['id'];
      $estado = $_POST['estado'];
      if($id != ""){
        $sqlValidar = "UPDATE `documento` SET `estado`=".$estado."  WHERE id_documento = ".$id;
        //echo $sqlValidar;
        $resultado=$base->query($sqlValidar);
        if(!$resultado){
          echo "Error al actualizar estado";
        }else{
          echo "¡Estado Actualizado!";
        }
      }

    }
  }
 ?>
