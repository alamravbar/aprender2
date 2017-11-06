<?php
include_once "lib/PDOConfig.php";
$base=new PDOConfig();
if(isset($_GET)){
    $id=$_GET['id'];
    $descripcion=$_GET['descripcion'];

    $sql = "UPDATE documento SET descripcion='".$descripcion."' WHERE id_documento=".$id." ";
    
    $resultado=$base->query($sql);

    if($resultado){
        echo "Modificación realizada con exito";
    }else{
        echo "no pudo realizarse la modificación";
    }
    }else{
        echo "no se puede realizar modificacion";
    }
?>