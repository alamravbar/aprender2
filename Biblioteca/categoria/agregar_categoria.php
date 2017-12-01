<?php
include_once "../../lib/PDOConfig.php";
if($_POST){
  $nombre = $_POST['nombre_cat'];
  if($nombre != ""){
    $base=new PDOConfig();
    $sql_select = "SELECT `nombre` FROM `categoria` WHERE nombre = '".$nombre."';";
    $resultado=$base->query($sql_select);
    if(!$resultado){
      echo "Error en la base de datos de buscar_categoria";
    }else{
      $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
      if($dato>0){
        echo "Categoria Existente";
      }else{
        $sql= "INSERT INTO `categoria`(`nombre`) VALUES ('".$nombre."')";
        $resultado=$base->query($sql);
        if(!$resultado){
          echo "Error en la base de datos de agregar_categoria";
        }else{
          echo "Agregado correctamente";
        }
      }
    }
  }else{
    echo "Categoria no puede ser vacio";
  }
}


 ?>
