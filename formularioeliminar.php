<?php
include_once "lib/PDOConfig.php";

    if($_GET){
    $id=$_GET['id'];  
 
    $base=new PDOConfig();
    $sqldocumento="select * from documento where id_documento=".$id;
    $resultado=$base->query($sqldocumento);
    $comboselect="";
            
    if ($resultado){
        $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach($datos as $elem){
            $comboselect.=" <h1>Desea eliminar el archivo ".$elem['nombre'].".".$elem['extension']."?</h1>";
            }
            $comboselect.="";
        
    } else {
        echo "error al generar combo";
    }

   
    
    $resultadodocumento=$base->query($sqldocumento);
    if($resultado){
        $datosdocumento=$resultadodocumento->fetchAll(PDO::FETCH_ASSOC);
      

    }

?>

<html>
    <head></head>
    <body>

    <div>
    
    
    </div>


        <form action="modificar.php" method="get" id="form" name="form">
    
         <input type="text" name="id" id="id" value='"<?php echo $id;?>"'>
            <label for="nombre"><?php echo $comboselect;?></label>
            
            

            <input type="submit" >
             
        </form>
    </body>

</html>
<?php
}
?>