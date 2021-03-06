<?php
include_once "../../lib/PDOConfig.php";
if($_GET){
  $id=$_GET['id'];

  $base=new PDOConfig();
  $sqldocumento="select * from documento where id_documento=".$id;
  $resultadodocumento=$base->query($sqldocumento);
  if($resultadodocumento){
    $datosdocumento=$resultadodocumento->fetch(PDO::FETCH_ASSOC);
    $nombre = $datosdocumento['nombre'];
    $descripcion = $datosdocumento['descripcion'];
    $ruta = $datosdocumento['ruta'];
    $eliminar = "<a href='#' class='eliminar btn btn-default btn-block' data-id='".$id."' data-ruta='".$ruta."'>Eliminar</a><br /> ";
    $img = "Biblioteca/imagen/".$datosdocumento['extension'].".jpg";
    $sql="select * from categoria";
    $resultado=$base->query($sql);
    $comboselect="";
    if ($resultado){
      $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
      $comboselect = "<label for='categoria'>Seleccione una categoria..</label>
      <select class='form-control formulario' name ='categoria'>";
      $comboselect.="<option value=-1>Seleccione una categoria..</option>";
      $comboselect.="<option value= -2 onclick='agregarcategoria();'>Agregar Categoria</option>";
      foreach($datos as $elem){
        $comboselect.=" <option value=".$elem['id_categoria'];
        if($datosdocumento['id_categoria'] == $elem['id_categoria']){
          $comboselect.=" selected";
        }
        $comboselect.=">".$elem['nombre']."</option>";
      }
      $comboselect.="</select>";
    } else {
      echo "error al generar combo";
    }
  }

  ?>

  <html>
  <head>
  </head>
  <body>
    <form method="post" id="form_actualizar" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id" value='"<?php echo $id;?>"'>
      <div class="row">
        <div class="col-md-2 col-sm-12">
          <img src="<?php echo $img; ?>"  class='media-object' style='width:60px' alt="icono_extension">
        </div>
        <div class="col-md-10 col-sm-12">
          <div class="form-group">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" class="form-control" value= '"<?php echo $nombre;?>"' disabled><br>
          </div>
        </div>
      </div>
      <?php echo $eliminar ?>
<!--
      <div class="row">
        <div class="col-md-6" style="padding-top:30px;">

        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="imagen">Seleccione un archivo..</label>
            <input type="file" name="archivo" id="archivo"></input>
          </div>
        </div>

      </div>
      -->
      <div class="form-group">
        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="10"><?php echo $descripcion;?></textarea><br>
      </div>
      <div class="form-group" id="categoria">
        <?php echo $comboselect; ?>
      </div>

      <div class="form-group">
        <label for="ruta">Ruta: </label>
        <input type="text" class="form-control" id="ruta" name="ruta" value="<?php echo $ruta;?>" disabled>
      </div>


      <button type="button" name="actualizar_form" id="actualizar_form" class="btn btn-default">Actualizar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

    </form>
    <script type="text/javascript">
    $("#actualizar_form").click(function(){
      $.post("Biblioteca/documento/modificar.php",$("#form_actualizar").serialize(),
      function(data){
        alert(data);
      });
    });
    $(".eliminar").click(function(){
      var id = $(this).data("id");
      var ruta=$(this).data("ruta");

      var elim = confirm("¿Seguro quiere Eliminar?");
      if (elim == true) {
        $.post("Biblioteca/documento/eliminar.php",{id:id , ruta:ruta},
        function(data){
          alert(data);
        });
      }
    });
    </script>
  </body>
  </html>
  <?php
}
?>
