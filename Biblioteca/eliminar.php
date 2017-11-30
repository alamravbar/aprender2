<?php
include_once "../lib/PDOConfig.php";

if($_POST){
  $id=$_POST['id'];
  $ruta=$_POST['ruta'];
  //  echo $ruta;
  $base=new PDOConfig();
  $sqlcarga="delete from carga where id_documento=".$id;
  $resultadocarga=$base->query($sqlcarga);
  if($resultadocarga){
    $sqlcontiene="delete from contiene where id_documento=".$id;
    $resultadocontiene=$base->query($sqlcontiene);
    if($resultadocontiene){
      $sqldocumento="delete from documento where id_documento=".$id;
      echo $sqldocumento;
      $resultado=$base->query($sqldocumento);
      if($resultado){
        if(!unlink($ruta)){
          echo "No se elimino el archivo";
        }
        echo "Exito al eliminar archivo";

      }else{
        echo "Error al eliminar archivo";
      }
    }else{
      echo "Error no se pudo eliminar archivo";
    }
  }else{
    echo "Error no elimino carga";
  }
}

?>
