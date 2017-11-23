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
          width: 30%;
          height: 200px;
          margin: 10px;
        }
        a{
          color:white;
        }
        a:hover{
          color:black;
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
          <li><a href="Administracion/administracion_usuario.php">Crear Curso</a></li>
          <li><a href="Administracion/administracion_usuario.php">Administrar Curso</a></li>
        </ul>
      </div>
    </div>
    <!-- Trigger the modal with a button -->
    <!-- Modal Crear Nivel-->
    <div class="modal fade" id="crear_nivel" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Crear Nivel</h4>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" id="nivel" name="nivel" method="post">

              <div class="form-group">
                <label for="nombre_nivel">Nombre de Nivel</label>
                <input type="text" class="form-control" id="nombre_nivel" name="nombre_usuario">
              </div>

              <div class="form-group">
                <label for="descripcion_nivel">Descripción del Nivel</label>
                <textarea name="descripcion_nivel" class="form-control" rows="5" id="comment"></textarea>
              </div>


              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Agregar</button>
              <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>

            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <!-- Fin del modal-->
    <!-- Modal Crear Asignatura-->
    <div class="modal fade" id="crear_asignatura" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-header" style="padding:35px 50px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Crear Asignatura</h4>
          </div>

          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" id="nivel" name="nivel" method="post">

              <div class="form-group">
                <label for="nombre_asignatura">Nombre de Asignatura</label>
                <input type="text" class="form-control" id="nombre_asignatura" name="nombre_asignatura">
              </div>

              <div class="form-group">
                <label for="descripcion_asignatura">Descripción de Asignatura</label>
                <textarea class="form-control" rows="5" id="descripcion_asignatura" name="descripcion_asignatura"></textarea>
              </div>

              <div class="form-group">
                <label for="id_nivel">Nivel al que pertenece</label>
                <?php echo $niveles; ?>
              </div>

              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Agregar</button>
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
    $(document).ready(function() {

    });
    </script>
  </body>

</html>
