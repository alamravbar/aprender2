<?php
include_once "../lib/PDOConfig.php";
$base=new PDOConfig();
$sql="select * from categoria";
$resultado=$base->query($sql);
if(!$resultado){
  echo "Error en la base de datos";
}else{
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

  $categoria="<option value=-1>Seleccione una categoria..</option>";
  foreach($datos as $elem){
    $categoria.="<option value=".$elem['id_categoria'].">".$elem['nombre']."</option>";
  }
  $categoria.="";
  $sqletiquetas="select * from etiqueta";
  $resultadoCombo=$base->query($sqletiquetas);
  if($resultado){
    $datosCombo=$resultadoCombo->fetchAll(PDO::FETCH_ASSOC);
    $comboetiqueta="";


    foreach($datosCombo as $elem){
      $comboetiqueta.="<div class='form-check disabled'>
      <label class='form-check-label'> <input class='form-check-input formulario' type='checkbox' name='etiqueta[]' value=".$elem['id_etiqueta'].">".$elem['nombre']."</label></div>";
    }
    $comboetiqueta.="";
  }else{
    echo "Resultado incorrecto";
  }

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bibliteca</title>
    <style media="screen">
      .intros{
        margin-left: -19px;
      }
    </style>
  </head>
  <body>


<?php
include_once "../lib/Login.php";

$oLogin=new Login();

?>
<div class="container">
  <?php if($oLogin->activa()){?>
    <p class="intros">
      Biblioteca es una colección de los libros, documentos, videos, infografías realizadas por
      nuestros docentes, no dude en usarlos!<br><br>

    </p>

    <div class="botones" style="float:right;margin-right:1%;margin-bottom:1%;">
      <!--   <a href="pruebas/subirArchivos/index.php"><img src="img/iconos/+.png" alt="Subir Documento"></a>
    -->
    <?php
    if($oLogin->getRol()==2 || $oLogin->getRol()==3 || $oLogin->getRol()==4){
      ?>

        <a href="#" class="openBtn"><img src="img/iconos/+.png" alt="Subir Documento"></a>

      <?php
    }
    ?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formSubirArchivo" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Subir Archivos</h4>
      </div>
      <div class="modal-body">
          <!-- Content here -->
          <form enctype="multipart/form-data" class="formulario">
            <div class="form-group">
              <label for="imagen">Seleccione un archivo..</label>
              <input type="file" class="form-control-file formulario btn btn-default" id="imagen" name="archivo">
            </div>

            <div class="form-group">
              <label for="comentario">Descripcion</label>
              <textarea class="form-control" id="comentario" name="comentario" rows="3" ></textarea>
            </div>


            <div class="form-group">
              <label for="categoria">Seleccione una categoria..</label>
              <select class="form-control formulario" id="categoria" name = "categoria">
                <?php echo $categoria;?>
              </select>
            </div>

            <?php echo $comboetiqueta;?>
      </form>
      </div>
      <button id="subir_arch">Subir Archivo</button>

      <!--div para visualizar mensajes-->
      <div class="messages"></div><br /><br />
      <!--div para visualizar en el caso de imagen-->
      <!-- <div class="showImage"></div></div> -->

    </div></div>
</div>
<!--- Fin Modal --->
<div class="show_archive">

</div>
<?php }else{
  ?>
  <p class="intros">
    Para ver más
    <a href="#" class="login">Ingrese</a>
    a su cuente o
    <a href="#" class="sumate">Registrese</a>
    <br>
  </p>
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <br><br>
  <div class="" id="formmod">

  </div>

<?php } ?>

<!--<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
-->
<script type="text/javascript" src="Biblioteca/subirarchivo.js"></script>
<script type="text/javascript">
$.get("Biblioteca/vista-archivos.php", function(data){
  $(".show_archive").html(data);
});

$(".openBtn").on('click',function(){
  $('#formSubirArchivo').modal({show:true});
});
// $(".openBtn").on('click',function(){
//   $('.modal-body').load('Biblioteca/subir-archivo.php',function(){
//     $('#formSubirArchivo').modal({show:true});
//   });
// });
$(".sumate").click(function(){
  $.get("Sumate/sumate.php", function(data){
    $("#vista").html(data);
    $("#sumat").addClass("active");
    $("#asignatur").removeClass("active");
    $("#administracio").removeClass("active");
    $("#sugerenci").removeClass("active");
    $("#plataform").removeClass("active");
    $("#bibliotec").removeClass("active");
    $("#inicio").removeClass("active");
  });});
  $(".login").click(function(){
    $("#modalLogin").modal();
  });
</script>

</body>
</html>
