<?php
/** Este archivo lo que nos permitirá es
* agregar la etiqueta y devolver el id, en caso de contar con la etiqueta ya,
*  devolverá el id de esa etiqueta**/

include_once "../../lib/PDOConfig.php";
$base=new PDOConfig();
if($_POST){
  $nombre_eti = $_POST['nombre_eti'];
  if($nombre_eti == ""){
    echo -1;
  }else{
    $sql = "SELECT `id_etiqueta`, `nombre` FROM `etiqueta` WHERE nombre='".$nombre_eti."'";
    $resultado=$base->query($sql);
    if(!$resultado){
      echo "error en consulta para encontrar etiqueta";
    }else{
      $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
      if($dato>0){
        $dato = $resultado->fetch(PDO::FETCH_ASSOC);
        echo $dato['id_etiqueta'];
      }else{
        /* Ahora donde no se encontro hay que insertarlo en la base de datos y devolver el id**/
        $sqlInsert = "INSERT INTO `etiqueta`(`nombre`) VALUES ('".$nombre_eti."')";
        $resultado=$base->query($sqlInsert);
        $id_etiqueta = $base->lastInsertId();
        if(!$resultado){
          echo "error en consulta para insertar etiqueta";
        }else{
          echo $id_etiqueta;
        }
      }
    }
  }
}

 ?>
