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
            <input type="hidden" name="nombre_usuario" value='<?php echo $oLogin->getNombreUsuario(); ?>'>
            <div class="form-group">
              <label for="comentario">Descripcion</label>
              <textarea class="form-control" id="comentario" name="comentario" rows="3" ></textarea>
            </div>
            <div class="form-group" id="categoria"></div>
            <div class="form-group" id="agregarcate" style="display:none;">
              <label for="nombre_cat">Agregar Categoria</label>
              <input type="text" name="nombre_cat" id="nombre_cat" value="" class="form-control">
              <button type="button" id="categoria_button" class="btn btn-block btn-default">Agregar</button>
            </div>
            <div class="form-inline" id="agregareti" >
              <label for="agregareti">Agregar Etiqueta: </label>
              <input type="text" name="nombre_eti" id="nombre_eti" value="" class="form-control">
              <button type="button" id="etiqueta_button" class="btn btn-default">Agregar</button>
            </div>
            <div class="etiquetas" id="etiquetas" style="text-align:center;" >

            </div>
      </form>
      </div>
      <button id="subir_arch" class="btn btn-default btn-block" style="width:80%; margin-left:auto;margin-right:auto;">Subir Archivo</button>

      <!--div para visualizar mensajes-->
      <div class="messages" style="width:80%; margin-left:auto;margin-right:auto; text-align:center;"></div><br /><br />
      <!--div para visualizar en el caso de imagen-->
      <!-- <div class="showImage"></div></div> -->

    </div></div>
</div>
<!--- Fin Modal --->
<!-- Modal Crear observaciones-->
<div class="modal fade" id="crearObservacion" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Crear Observación</h4>
      </div>
      <div class="modal-body">
          <!-- Content here -->
          <form id="form_observacion">
            <div class="id_documento" id="id_documento">

            </div>
            <div class="form-group">
              <label for="descripcion_observacion">Descripcion</label>
              <textarea class="form-control" id="descripcion_observacion" name="descripcion_observacion" rows="3" ></textarea>
            </div>
      </form>
      <button id="button_observacion" class="btn btn-success btn-block" style="width:80%; margin-left:auto;margin-right:auto;">Crear Observación</button>
      </div>
    </div>
  </div>
</div>
<!--- Fin Modal --->
<!--- Modal Para las observaciones -->
<div class="modal fade" id="mostrar_observaciones" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Ver Observaciones</h4>
      </div>
      <div class="modal-body">
        <div id="observaciones">

        </div>
        <button type="button" class="close" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin del Modal -->
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
function agregarcategoria(){
  $("#agregarcate").show();
}
$("#categoria_button").click(function(){
  var nombre_cat = $("#nombre_cat").val();
  $.post("Biblioteca/categoria/agregar_categoria.php",{nombre_cat:nombre_cat},function(data){
    alert(data);
  });
  $("#agregarcate").hide();
  $("#categoria").load("Biblioteca/categoria/obtener_categorias.php");
});

var contador = 0;
$("#etiqueta_button").click(function(){
  var nombre_eti = $("#nombre_eti").val();
  //tendria que crear la etiqueta una especie de insertar etiqueta u obtener id => etiqueta
  //alert(nombre_eti);
  $.post("Biblioteca/etiqueta/insertar_etiqueta.php",{nombre_eti:nombre_eti},function(data){
    //alert(data);
    if(data == -1){
      alert("Nombre Vacio");
    }else{
      contador = contador + 1;
      $("#etiquetas").append("<input class='form-check-input formulario' type='checkbox' name='etiqueta[]' value="+data+" checked>"+nombre_eti+"</label>");
      if(contador == 6){
        $("#etiquetas").append("<br />");
        $("#nombre_eti").val("");
      }
    }
  });
  //Después de obtenerla agregarla con append a la parte de "etiquetas"

});
$.get("Biblioteca/documento/vista-archivos.php", function(data){
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

  $(".login").click(function(){
    $("#modalLogin").modal();
  });
  $("#button_observacion").click(function(){
    var id_documento =$("#id_docu").val();
    var descripcion = $("#descripcion_observacion").val();
    // console.log(id_documento);
    // console.log(descripcion);
    $.post("Biblioteca/observacion/insertar_observacion.php",{id_documento:id_documento,descripcion:descripcion},
        function(data){
          alert(data);
          $("#descripcion_observacion").val("");
          $.post("Biblioteca/documento/validar_documento.php",{id:id_documento,estado:2},
          function(data){
            alert(data);
          });
    });

  });
  $("#categoria").load("Biblioteca/categoria/obtener_categorias.php");
  $("#sumate").click(function(){
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

</script>

</body>
</html>
