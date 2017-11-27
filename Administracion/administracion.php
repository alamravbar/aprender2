<?php
include_once "../lib/PDOConfig.php";
$base=new PDOConfig;

$sql="select * from nivel";
$resultado=$base->query($sql);
$niveles =" niveles";
if($resultado){
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $niveles = "<div class = 'form-group'>";
  $niveles .= "<select class='form-control' id='niveles'>";
  foreach ($datos as $nivel) {
    $niveles.="<option value='".$nivel['id_nivel']."'>".$nivel['nombre']."</option>";
  }
  $niveles .= "</select>";
  $niveles .= "</div>";
}else{
  $niveles = "Error en consulta Niveles";
}
$sql="select * from asignatura";
$resultado=$base->query($sql);
if($resultado){
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $asignaturas = "<div class = 'form-group'>";
  $asignaturas .= "<select class='form-control' id='id_asignatura' name='id_asignatura'>";
  foreach ($datos as $asignatura) {
    $asignaturas.="<option value='".$asignatura['id_asignatura']."'>".$asignatura['nombre']."</option>";
  }
  $asignaturas .= "</select>";
  $asignaturas .= "</div>";
}else{
  $asignaturas = "Error en consulta Niveles";
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <style media="screen">

      .flex-container{
          display: -webkit-flex;
          display: flex;
          justify-content:center;
          flex-wrap:wrap;
          width: auto;
      }

      .flex-item {
          text-align:left;
          padding: 10px;
          background-color: blue;
          color:white;
          width: 33%;
          height: 200px;
          margin: 10px;
        }
        a{
          color:white;
        }
        a:hover{
          color:black;
        }
        .error{
          color:red;
        }
    </style>
  </head>
  <body>
    <div class="flex-container">
      <div class="flex-item">
        <h3 style="text-align:left">Usuarios</h3>
        <ul>
          <li><a href="Administracion/administracion_usuario.php">Administrar Usuarios</a></li>
        </ul>
      </div>
      <div class="flex-item">
        <h3 style="text-align:left">Niveles</h3>
        <ul>
          <li><a href="#" data-toggle="modal" data-target="#crear_nivel">Crear Nivel</a></li>
          <li><a href="Administracion/administracion_usuario.php">Administrar Nivel</a></li>
        </ul>
      </div>
      <div class="flex-item">
        <h3 style="text-align:left">Asignaturas</h3>
        <ul>
          <li><a href="#" data-toggle="modal" data-target="#crear_asignatura">Crear Asignatura</a></li>
          <li><a href="Administracion/administracion_usuario.php">Administrar Asignatura</a></li>
        </ul>
      </div>
      <div class="flex-item">
        <h3 style="text-align:left">Curso</h3>
        <ul>
          <li><a href="#" data-toggle="modal" data-target="#crear_curso">Crear Curso</a></li>
          <li><a href="Administracion/administracion_usuario.php">Administrar Curso</a></li>
        </ul>
      </div>
    </div>
    <!-- Trigger the modal with a button -->
    <!-- Modal Crear Nivel-->
    <div class="modal fade" id="crear_nivel" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Crear Nivel</h4>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" id="form_nivel" method="post">

              <div class="form-group">
                <label for="nombre_nivel">Nombre de Nivel</label>
                <input type="text" class="form-control" id="nombre_nivel" name="nombre_nivel">
                <div class="error" id="nombre_nivel_error">
                  El campo nombre es obligatorio
                </div>
              </div>

              <div class="form-group">
                <label for="descripcion_nivel">Descripción del Nivel</label>
                <textarea name="descripcion_nivel" class="form-control" rows="5" id="descripcion_nivel"></textarea>
                <div class="error" id="descripcion_nivel_error">
                  El campo descripción es obligatorio
                </div>
              </div>


              <button type="button" class="btn btn-success btn-block" id="button_nivel"><span class="glyphicon glyphicon-off"></span> Agregar</button>
              <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- Fin del modal-->
    <!-- Modal Crear Asignatura-->
    <div class="modal fade" id="crear_asignatura" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Crear Asignatura</h4>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" id="form_asignatura" method="post">

              <div class="form-group">
                <label for="nombre_asignatura">Nombre de Asignatura</label>
                <input type="text" class="form-control" id="nombre_asignatura" name="nombre_asignatura">
                <div class="error" id="nombre_asignatura_error">
                  El campo nombre es obligatorio
                </div>
              </div>

              <div class="form-group">
                <label for="descripcion_asignatura">Descripción de Asignatura</label>
                <textarea class="form-control" rows="5" id="descripcion_asignatura" name="descripcion_asignatura"></textarea>
                <div class="error" id="descripcion_asignatura_error">
                  El campo descripcion es obligatorio
                </div>
              </div>

              <div class="form-group">
                <label for="id_nivel">Nivel al que pertenece</label>
                <div class="div-niveles">
                  <?php echo $niveles; ?>
                </div>

              </div>

              <button type="button" id="button_asignatura" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Agregar</button>
              <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del modal-->
    <!-- Modal Crear Curso-->
    <div class="modal fade" id="crear_curso" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Crear Curso</h4>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" id="form-curso" method="post">

              <div class="form-group">
                <label for="nombre_curso">Nombre de Curso</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso">
                <div class="error" id="nombre_curso_error">
                  El campo nombre es obligatorio
                </div>
              </div>

              <div class="form-group">
                <label for="link-curso">Link de Curso</label>
                <input type="text" class="form-control" id="link_curso" name="link_curso">
                <div class="error" id="link_curso_error">
                  El campo link es obligatorio
                </div>
              </div>

              <div class="form-group">
                <label for="asignatura">Asignatura al que pertenece</label>
                <div class="div-asignaturas">
                  <?php echo $asignaturas; ?>
                </div>

              </div>

              <button type="button" class="btn btn-success btn-block" id="button_curso"><span class="glyphicon glyphicon-off"></span> Agregar</button>
              <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del modal-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
    $(function() {
    var randomColor = Math.floor(Math.random()*16777215).toString(16);
        $(".flex-item").css({
          backgroundColor: '#' + randomColor
        });
      });
    $(document).ready(function() {

      $('.error').hide();
      $("#button_nivel").click(function(){
        var nombre= $("#nombre_nivel").val();
        var descripcion = $("#descripcion_nivel").val();
        var sale = true;
        if(nombre != ""){
          $("#nombre_nivel_error").hide();
        }else{
          $("#nombre_nivel_error").show();
          $("#nombre_nivel").focus();
          sale = false;
        }
        if(descripcion != ""){
          $("#descripcion_nivel_error").hide();
        }else{
          $("#descripcion_nivel_error").show();
          $("#descripcion_nivel").focus();
          sale = false;
        }
        if(sale){
          $.post("Administracion/Nivel/crear_nivel.php",
            $("#form_nivel").serialize()
          ,
          function(data){
              alert(data);
              $( "#div-niveles" ).load( "Administracion/Nivel/obtener_niveles.php" );
          });
        }
        return sale;
      });
      $("#button_asignatura").click(function(){
        var nombre= $("#nombre_asignatura").val();
        var descripcion = $("#descripcion_asignatura").val();
        var id_nivel = $("#niveles").val();
        console.log(id_nivel);
        var sale = true;
        if(nombre != ""){
          $("#nombre_asignatura_error").hide();
        }else{
          $("#nombre_asignatura_error").show();
          $("#nombre_asignatura").focus();
          sale = false;
        }
        if(descripcion != ""){
          $("#descripcion_asignatura_error").hide();
        }else{
          $("#descripcion_asignatura_error").show();
          $("#descripcion_asignatura").focus();
          sale = false;
        }
        if(sale){

          $.post("Administracion/Asignatura/crear_asignatura.php",
            {nombre_asignatura:nombre, descripcion_asignatura: descripcion, id_nivel:id_nivel}
          ,
          function(data){
              alert(data);
              $( "#div-asignatura").load( "Administracion/Asignatura/obtener_asignaturas.php" );
          });
        }
        return sale;
      });
      $("#button_curso").click(function(){
        var nombre= $("#nombre_curso").val();
        var link = $("#link_curso").val();
        var id_asignatura = $("#id_asignatura").val();
        console.log("id asignatura: "+ id_asignatura);
        var sale = true;
        if(nombre != ""){
          $("#nombre_curso_error").hide();
        }else{
          $("#nombre_curso_error").show();
          $("#nombre_curso").focus();
          sale = false;
        }
        if(link != ""){
          $("#link_curso_error").hide();
        }else{
          $("#link_curso_error").show();
          $("#link_curso").focus();
          sale = false;
        }
        if(sale){
          alert("Curso Agregado Normalemente");
          $.post("Administracion/Curso/crear_curso.php",
            {nombre_curso:nombre, link_curso:link , id_asignatura:id_asignatura}
          ,
          function(data){
              alert(data);

          });
        }
        return sale;
      });

    });

    </script>
  </body>

</html>
