<?php
include_once "lib/PDOConfig.php";

    if($_GET){
    $id=$_GET['id'];  
 
    $base=new PDOConfig();
    $sql="select * from categoria";
    $resultado=$base->query($sql);
    $comboselect="";
            
    if ($resultado){
        $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach($datos as $elem){
            $comboselect.=" <h1>Desea eliminar ".$elem['nombre']."</h1>";
            }
            $comboselect.="";
        
    } else {
        echo "error al generar combo";
    }

    $sqldocumento="select * from documento where id_documento=".$id;
    
    $resultadodocumento=$base->query($sqldocumento);
    if($resultado){
        $datosdocumento=$resultadodocumento->fetchAll(PDO::FETCH_ASSOC);
      

    }

?>

<html>
    <head></head>
    <body>

    <div>
    <? echo $comboselect;?>
    
    </div>
        <form action="modificar.php" method="get" id="form" name="form">
    
         <input type="text" name="id" id="id" value='"<?php echo $id;?>"'>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" value= '"<?php echo $datosdocumento[0]['nombre'];?>"' disabled><br>
            
            <label for="descripcion">Descripcion: </label>
            <br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $datosdocumento[0]['descripcion']?></textarea><br>
        
            <label for="ruta">Ruta: </label>
            <input type="text" id="ruta" name="ruta" value="<?php echo $datosdocumento[0]['ruta'];?>" disabled><br>

            <label for="nombre">Categoria: </label>

            
            <select name='categoria' id='categoria' value="<?php echo $elemselect; ?>"><?php echo $comboselect;?><br>

<input type="submit" >
             
        </form>
    </body>

</html>
<?php
}
?>