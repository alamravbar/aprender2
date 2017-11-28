<?php
include_once '../../lib/PDOConfig.php';
if($_POST){

  $nombre = $_POST["nombre_nivel"];
  $descripcion = $_POST["descripcion_nivel"];
  $ing_cor = true;
  $sale = "";
  $base = new PDOConfig();
  if($nombre != ""){
    $sql= "SELECT nombre FROM nivel WHERE nombre= '".$nombre."'";
    $resultado=$base->query($sql);
    if(!$resultado){
      $sale.= "Resultado Inesperado en la consulta a la BD por buscar nombre";
    }else{
      $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
      if($dato > 0){
      $sale.="El nombre de nivel ya se encuentra";
      $ing_cor = false;
      $ing_correcto = false;
      }else{
        $sale.="El nombre esta bien";
      }
    }
  }
  if($ing_cor){
    $sqlInsertarNivel = "INSERT INTO `nivel`(`nombre`, `descripcion`) VALUES ('".$nombre."','".$descripcion."');";
    //$sale .=$sqlInsertarNivel;
    $resultado=$base->query($sqlInsertarNivel);
    if(!$resultado){
      $sale.= "Resultado Inesperado en la consulta a la BD por ingresar nivel";
    }else{
      $sale .= " Se ingreso correctamente en la base de datos";
    }
  }

  echo $sale;
}

 ?>
