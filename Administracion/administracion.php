<?php

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administación</title>
    <style media="screen">
      .get_usuarios{
        height: 400px;
      }
    </style>
  </head>
  <body>
    <p class="intros">
      ¡En esta página podrás modificar a los usuarios del sitio!
    </p>
      <form method="post" class="form-inline">
        <div class="form-group">
          <label for="nombre_usuario"></label>
          <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" class="form-control" />
        </div>
        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" placeholder="Email" class="form-control" >
        </div>

        <div class="checkbox">
            <label><input type="checkbox"> Habilitado</label>
        </div>

        <button type="button" class="btn btn-default">Buscar</button>
      </form>
      <div class="get_usuarios">

      </div>
  </body>
</html>
