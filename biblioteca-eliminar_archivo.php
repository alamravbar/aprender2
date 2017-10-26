<?php
include_once "lib/PDOConfig.php";
$base=new PDOConfig();
/*
*para eliminar un documento hay que elimninar todos los elementos que tengan como clave foranea 
*el id_documento ....
*/
if(isset($_GET)){
    $id=$_GET['id'];
   $sqlEtiquetas="DELETE FROM contiene WHERE id_documento=".$id;
   $resultadoEtiquetas=$base->query($sqlEtiquetas);
   if($resultadoEtiquetas){
     $sql = "DELETE FROM documento  WHERE id_documento=".$id." ";
    $resultado=$base->query($sql);
    if($resultado){
        echo "Se ha eliminado el documento";
    }else{
        echo "no pudo eliminarse el documento";
    }

   }else{
     echo " No pudoeliminarse documento, ya que se encuentran datos relacionados";
   }
}else{
  echo "No pudo eliminarse el documento, faltan algunos datos";
}
?>