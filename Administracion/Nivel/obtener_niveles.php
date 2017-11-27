<?php
include_once "../../lib/PDOConfig.php";
$base=new PDOConfig;

$sql="select * from nivel";
$resultado=$base->query($sql);
$niveles =" niveles";
if($resultado){
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $niveles = "<div class = 'form-group'>";
  $niveles .= "<select class='form-control' id='niveles'>";
  foreach ($datos as $nivel) {
    $niveles.="<option value='".$nivel['id_nivel']."'>".$nivel['nombre']."</option>";
  }
  $niveles .= "</select>";
  $niveles .= "</div>";
}else{
  $niveles = "Error en consulta Niveles";
}
echo $niveles;
 ?>
