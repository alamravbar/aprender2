<?php
include_once "../../lib/PDOConfig.php";
include_once "../../lib/Login.php";
$base = new PDOConfig();
$oLogin=new Login(); //Generamos el objeto Login
if($oLogin->activa() && $oLogin->getRol() == 3){
  if($_POST){
    $base=new PDOConfig();
    $descripcion = $_POST['descripcion'];
    $id_documento = $_POST['id_documento'];
    $nombre_usuario = $oLogin->getNombreUsuario();
    $sqlUsuario = "SELECT `id_usuario`, `nombre` FROM `usuario` WHERE nombre = '".$nombre_usuario."'";
    //echo $sqlUsuario;
    $res=$base->query($sqlUsuario);
    if(!$res){
      echo "Usuario no encontrado";
    }else{
      $datos = $res->fetch(PDO::FETCH_ASSOC);
      $id_moderador = $datos['id_usuario'];
      if($descripcion != "" && $id_documento != ""){
        $sql = "INSERT INTO `observacion`(`descripcion`, `fecha`, `id_moderador`) VALUES ('".$descripcion."',NOW(),".$id_moderador.")";
        //echo $sql;
        $res=$base->query($sql);
        $id_observacion = $base->lastInsertId();
        if(!$res){
          echo "Error al ingresar obseracion";
        }else{
          $sql_presenta = "INSERT INTO `presenta`(`id_documento`, `id_observacion`) VALUES (".$id_documento.",".$id_observacion.");";
          $res_presenta=$base->query($sql_presenta);
          if(!$res_presenta){
            echo "Error al ingresar presenta";
          }else{
            echo "¡Observación ingresada con exito!";
          }
        }
      }
    }
  }
}



 ?>
