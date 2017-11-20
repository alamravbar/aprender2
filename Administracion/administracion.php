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
          <li><a href="Administracion/administracion_usuario.php">Administración de Usuarios</a></li>
        </ul>
      </div>
      <div class="flex-item">
        <h3 style="text-align:left">Usuarios</h3>
        <ul>
          <li><a href="Administracion/administracion_usuario.php">Administración de Usuarios</a></li>
        </ul>
      </div>
    </div>
  </body>
</html>
