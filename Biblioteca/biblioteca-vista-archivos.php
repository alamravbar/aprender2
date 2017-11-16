<?php
include_once 'lib/PDOConfig.php';
include_once "lib/Login.php";
$base = new PDOConfig();
$oLogin=new Login();


//id_documento 	nombre 	ruta 	extension 	descripcion 	id_categoria
$sql=" select * from documento";
$mostrar = "";
$resultado=$base->query($sql);
if(!$resultado){
  echo "Resultado Inesperado en la consulta a la BD";
}else{
  $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
  /*$mostrar="<div class='listado'>
  <table class='table table-striped table-bordered'>
  <thead class='thead-inverse'>
  <tr>
  <th>Info</th><th>Imagen</th>
  </tr></thead>";
  foreach($datos as $elem){
      $extension=$elem['extension'];
      //print_r($extension);
      $mostrar.="<tr class='table table-sm'><td><img src='img/".$extension.".jpg' align='center' width='68' height='68'></td><td><a href='".$elem['ruta']."'>".$elem['nombre']."</a></td></tr>";
  }

  $mostrar.="</table></div>";
  //echo $mostar;*/

  $mostrar="<div class='row archivos' >";
  //$mostrar.="<div class='col-md-2'></div>";

  $mostrar.="<div class='col-md-12 table-responsive'>";
  $mostrar.="<table class='table'>";
  $mostrar.="<tr><thead style='text-align:center;'><td>Archivo</td>";
  if($oLogin->getRol()!=1){
$mostrar.="<td>Funciones</td>";
  }
  
  $mostrar.="</thead></tr><tbody>";
  foreach($datos as $elem){

      $mostrar.="<tr>";
      $extension=$elem['extension'];
      //print_r($extension);
       //<a href="#" class="list-group-item">

      $mostrar.="<td>";
      $mostrar.=" <a href='".$elem['ruta']."' class='list-group-item'><img src='img/".$extension.".jpg' class='img-rounded' align='center' width='68' height='68'> ".$elem['nombre']."</a>";
      $mostrar.="</td>";
if($oLogin->getRol()!=1){
      $mostrar.="<td class='botones'>";

      $mostrar.="<a href='eliminar.php?id=".$elem['id_documento']."'><img src='img/iconos/-.png' alt='Eliminar Archivo'></a>";
      $mostrar.="<a id='modificar_archivo' href='formulariomodificar.php?id=".$elem['id_documento']."'><img src='img/iconos/lapiz.png' alt='Eliminar Archivo'></a>";

      $mostrar.="<a id='validar_moderador' href='#'><img src='img/iconos/validar_v.png' alt='Eliminar Archivo'></a>";
      $mostrar.="<a id='validar_docente' href='#'><img src='img/iconos/validar_g.png' alt='Eliminar Archivo'></a>";
      $mostrar.="</td>";
}
      $mostrar.="</tr>";
  }
  $mostrar.="</tbody>";
  $mostrar.="</table'>";
  $mostrar.="</div></div>";
  echo $mostrar;
}

?>
