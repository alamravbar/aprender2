<?php
include_once "../../lib/PDOConfig.php";
$base=new PDOConfig();
$sql="select * from categoria";
$resultado=$base->query($sql);
if(!$resultado){
  echo "Error en la base de datos";
}else{

  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $categoria = "<label for='categoria'>Seleccione una categoria..</label>
  <select class='form-control formulario' name = 'categoria'>";
  $categoria.="<option value=-1>Seleccione una categoria..</option>";
  $categoria.="<option value= -2 onclick='agregarcategoria();'>Agregar Categoria</option>";
  foreach($datos as $elem){
    $categoria.="<option value=".$elem['id_categoria'].">".$elem['nombre']."</option>";
  }
  $categoria.="</select>";
  echo $categoria;
}
?>
