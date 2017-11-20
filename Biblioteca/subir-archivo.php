<?php
include_once "../lib/PDOConfig.php";
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
$comboetiqueta="";


foreach($datosCombo as $elem){
  $comboetiqueta.="<div class='form-check disabled'>
 <label class='form-check-label'> <input class='form-check-input formulario' type='checkbox' name='etiqueta[]' value=".$elem['id_etiqueta'].">".$elem['nombre']."</label></div>";
}
$comboetiqueta.="";

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="Biblioteca/subirarchivo.js"></script>
 
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
   
</head>
<body>
<div class="container">
  <!-- Content here -->

<form enctype="multipart/form-data" class="formulario .form-control">
 <div class="form-group">
    <label for="imagen">Seleccione un archivo..</label>
    <input type="file" class="form-control-file formulario" id="imagen" name="archivo">
  </div>

  <div class="form-group">
    <label for="comentario">Descripcion</label>
    <textarea class="form-control formulario" id="comentario" name="comentario" rows="3" cols="3">Ingrese descripcion del archivo....</textarea>
  </div>


  <div class="form-group">
    <label for="categoria">Seleccione una categoria..</label>
    <select class="form-control formulario" id="categoria" name = "categoria">
      <?php echo $categoria;?>
    </select>
  </div>



  
  <?php echo $comboetiqueta;?>

    <!-- <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="button" value="Subir archivo" class="btn btn-primary>"/><br />
        </div>
   </div> -->



</form>


</div>
<button>Subir Archivo</button>






    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
</body></html>