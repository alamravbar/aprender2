<?php
include_once "../../lib/PDOConfig.php";

function tiene_observacion($id_documento){

      $sql = "SELECT * FROM `presenta` WHERE id_documento=".$id_documento;
      $base=new PDOConfig();
      $respuesta = $base->query($sql);
      if(!$respuesta){
        echo "error en la consulta";
      }else{
        $cant = $respuesta->rowCount(PDO::FETCH_ASSOC);
        //print_r($cant);
        if($cant>0){
          return true;
        }else{
          return false;
        }
      }
}
 ?>
