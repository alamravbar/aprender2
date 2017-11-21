<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <style media="screen">

      .flex-container{
          display: -webkit-flex;
          display: flex;
          justify-content:left;
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
          <li><a href="Administracion/administracion_usuario.php">Crear Nivel</a></li>
          <li><a href="Administracion/administracion_usuario.php">Administrar Nivel</a></li>
        </ul>
      </div>
      <div class="flex-item">
        <h3 style="text-align:left">Asignaturas</h3>
        <ul>
          <li><a href="Administracion/administracion_usuario.php">Crear Asignatura</a></li>
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
  </body>
</html>
