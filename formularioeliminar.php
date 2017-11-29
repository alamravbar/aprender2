<?php
include_once "lib/PDOConfig.php";

    if($_GET){
    $id=$_GET['id'];  
 
    $base=new PDOConfig();
    $sqlcontiene="delete from contiene where id_documento=".$id;
    $resultadocontiene=$base->query($sqlcontiene);



    if($resultadocontiene){

            $sqldocumento="delete from documento where id_documento=".$id;
            $resultado=$base->query($sqldocumento);
            if($resultado){
                echo "Exito al eliminar archivo";
                
            }else{
                echo "Error al eliminar archivo";
            }
    
    }else{
        echo "Error nose pudo eliminar archivo";
    }
            
    }

?>
