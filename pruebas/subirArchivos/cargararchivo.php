<?php
include_once "../../lib/PDOConfig.php";

$base=new PDOConfig();

$sql="select * from categoria";
$resultado=$base->query($sql);
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

$categoria="<option value=-1>Seleccione una categoria..</option>";
foreach($datos as $elem){
    $categoria.="<option value=".$elem['id_categoria'].">".$elem['nombre']."</option>";
} 
$categoria.="";
$sqletiquetas="select * from etiqueta";
$resultadoCombo=$base->query($sqletiquetas);
$datosCombo=$resultadoCombo->fetchAll(PDO::FETCH_ASSOC);
$comboetiqueta="<div class='checkbox'>";
foreach($datosCombo as $elem){
    $comboetiqueta.="<input type='checkbox' name='etiqueta[]' value='".$elem['id_etiqueta']."'>".$elem['nombre']."<br>";
    }
    $comboetiqueta.="</div>";
    ?>
<html>
<head><title>Ejemplo del uso de formularios</title></head>
<body>
<form method='post' action='ejemplo.php' enctype="multipart/form-data">
Ingresa el archivo: <input name="miArchivo" id="miArchivo" type="file" />


            <div class="form-group">
                <label for="comentario">Descripcion</label><br>
                <textarea name="comentario" id="comentario" cols="30" rows="10" class="formulario">Ingrese detalles del archivo...</textarea>
            </div>
            <div class="form-group">
                <select id="categoria" name="categoria"><?php echo $categoria;?></select>
            </div>
            <div class="form-group">
                <?php echo $comboetiqueta;?>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                
                </div>



            <input type="submit" value="Enviar"/>
</form>






</body>
</html>
</form>
</body>
</html>