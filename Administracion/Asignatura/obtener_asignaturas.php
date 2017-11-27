<?php
include_once "../../lib/PDOConfig.php";
$base=new PDOConfig;

$sql="select * from asignatura";
$resultado=$base->query($sql);
if($resultado){
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $asignaturas = "<div class = 'form-group'>";
  $asignaturas .= "<select class='form-control' id='asignatura'>";
  foreach ($datos as $asignatura) {
    $asignaturas.="<option value='".$asignatura['id_asignatura']."'>".$asignatura['nombre']."</option>";
  }
  $asignaturas .= "</select>";
  $asignaturas .= "</div>";
}else{
  $asignaturas = "Error en consulta Niveles";
}
 ?>
