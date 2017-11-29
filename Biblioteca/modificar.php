<?php
include_once "../lib/PDOConfig.php";
$base=new PDOConfig();
if(isset($_POST)){
    $id=$_POST['id'];
    $descripcion=$_POST['descripcion'];
    $categoria =$_POST['categoria'];
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
