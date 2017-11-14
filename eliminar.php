<?php
include_once "lib/PDOConfig.php";
$base=new PDOConfig();
if(isset($_GET)){
    $id=$_GET['id'];
    
    $sql = "Delete from documento  id_documento=".$id." ";
    
    $resultado=$base->query($sql);

    if($resultado){
        echo "Se elimino documeto";
    }else{
        echo "No pudo eliminarse el documento";
    }
    }else{
        echo "no se puede realizar la accion, faltan algunos datos";
    }
?>