<?php
include_once "../../lib/PDOConfig.php";
if($_POST){
  $base=new PDOConfig();
  $descripcion = $_POST['descripcion'];
  $id_documento = $_POST['id_documento'];
  $sql = "INSERT INTO `observacion`(descripcion) VALUES (".$descripcion.")";
  $res=$base->query($sql);
  $id_observacion = $base->lastInsertId();
  if(!$res){
    echo "Error al ingresar obseracion";
  }else{
    $sql_presenta = "INSERT INTO `presenta`(`id_documento`, `id_observacion`) VALUES (".$id_documento.",".$id_observacion.");";
    $res_presenta=$base->query($sql_presenta);
    if(!$res_presenta){
      echo "Error al ingresar presenta";
    }
  }
}


 ?>
