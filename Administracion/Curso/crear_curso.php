<?php
include_once '../../lib/PDOConfig.php';
if($_POST){

  $nombre = $_POST["nombre_curso"];
  $link = $_POST["link_curso"];
  $id_asignatura = $_POST['id_asignatura'];
  $ing_cor = true;
  $sale = "";
  $base = new PDOConfig();
  if($nombre != ""){
    $sql= "SELECT nombre FROM asignatura WHERE nombre= '".$nombre."'";
    $resultado=$base->query($sql);
    if(!$resultado){
      $sale.= "Resultado Inesperado en la consulta a la BD por buscar nombre";
    }else{
      $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
      if($dato > 0){
      $sale.="El nombre de curso ya se encuentra\n";
      $ing_cor = false;
      $ing_correcto = false;
      }else{
        $sale.="El nombre esta bien\n";
      }
    }
  }
  if($ing_cor){
    $sqlInsertarCurso = "INSERT INTO `curso`(`nombre`, `link`, `id_asignatura`) VALUES ('".$nombre."','".$link."',".$id_asignatura.")";
    //$sale .=$sqlInsertarAsignatura;
    $resultado=$base->query($sqlInsertarCurso);
    if(!$resultado){
      $sale.= "Resultado Inesperado en la consulta a la BD por ingresar Curso\n";
    }else{
      $sale .= "Se ingreso correctamente";
    }
  }

  echo $sale;
}

 ?>
