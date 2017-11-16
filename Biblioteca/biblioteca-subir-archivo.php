<?php
include_once "../../lib/PDOConfig.php";
$base=new PDOConfig;

$sql="select * from Categoria";
$resultado=$base->query($sql);
if(!$resultado){
  echo "Error en consulta";
}else{
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

  $categoria="<option value=-1>Seleccione una categoria..</option>";
  foreach($datos as $elem){
    $categoria.="<option value=".$elem['id_categoria'].">".$elem['nombre']."</option>";
  }
  $categoria.="";
  $sqletiquetas="select * from Etiqueta";
  $resultadoCombo=$base->query($sqletiquetas);
  $datosCombo=$resultadoCombo->fetchAll(PDO::FETCH_ASSOC);
  $comboetiqueta="<div class='checkbox'>";
  foreach($datosCombo as $elem){
    $comboetiqueta.="<input type='checkbox' name='etiqueta[]' value='".$elem['id_etiqueta']."'>".$elem['nombre']."<br>";
  }
  $comboetiqueta.="</div>";
  /*foreach ($datosCategorias as $categoria){
  $categorias.=" <option value='".$categoria['IdCategoria']."'>".$categoria['Descripcion']."</option>";
}
*/



?>
<!--
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="functions.js"></script>-->
</head>
<body>
  <!--el enctype debe soportar subida de archivos con multipart/form-data-->
  <form enctype="multipart/form-data" class="formulario .form-control">
    <div class="form-group">


      <div class="col-sm">
        <div class="form-group">
          <label>Subir un archivo</label><br/>
          <input name="archivo" type="file" id="imagen" />

        </div>
      </div>
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
          <input type="button" value="Subir archivo" class="btn <btn-primary></btn-primary>"/><br />
        </div>



      </form>
    </div>


    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
  </body>
  </html>


  <?php
}
?>
