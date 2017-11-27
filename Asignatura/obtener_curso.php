<?php
include_once "../lib/PDOConfig2.php";
if($_GET){
  $sale="";
  $base=new PDOConfig;
  $id_curso= $_GET['id_curso'];
  //course_id
  $sql = "SELECT * FROM `at_courses` WHERE course_id='".$id_curso."'";
  $resultado=$base->query($sql);
  if(!$resultado){
    $sale= "error en consulta";
  }else{
    $sale="";
    $datos=$resultado->rowCount(PDO::FETCH_ASSOC);
    if($datos>0){
      $dato=$resultado->fetch(PDO::FETCH_ASSOC);
      $sale.="<h3 style='text-align:center;'>".$dato['title']."</h3>";

      $sale.="<h5 style='text-align:center;'>Descripción</h5>";
      $sale.=$dato['description'];
      $sale.="<br>Ingresa a la plataforma y unetenos: <a href='http://localhost/aprender2/Plataforma/login.php'>Plataforma</a>";
    }else{
      $sale="<div class='flex-container-asig'><div class='nada' >Nada que mostrar</div></div><br><br>";
    }
  }
  echo $sale;
}



 ?>
