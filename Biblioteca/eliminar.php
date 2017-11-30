<?php
include_once "../lib/PDOConfig.php";

    if($_POST){
    $id=$_POST['id'];
    $ruta=$_POST['ruta'];
    echo $ruta;
    $base=new PDOConfig();
    $sqlcontiene="delete from contiene where id_documento=".$id;
    $resultadocontiene=$base->query($sqlcontiene);
    if($resultadocontiene){

            $sqldocumento="delete from documento where id_documento=".$id;
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
        echo "Error nose pudo eliminar archivo";
    }

    }

?>
