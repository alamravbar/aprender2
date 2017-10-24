<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sumate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <form class="form" method="post">
      <div class="form-group">
        <label for="nombre">Nombre</label><input type="text" class="form-control" name="nombre" value="" />
      </div>
      <div class="form-group">
        <label for="apellido">Apellido</label><input type="text" class="form-control" name="apellido" value="" />
      </div>
      <div class="form-group">
        <label for="dni">Dni</label><input type="text" class="form-control" name="dni" value="" />
      </div>
      <div class="form-group">
        <label for="mail">Mail</label><input type="text" class="form-control" name="mail" value="" />
      </div>
      <div class="form-group">
        <label for="mail">Mail</label><input type="text" class="form-control" name="mail" value="" />
      </div>
      <div class="form-group">
        <label for="">Tipo de Usuario: </label>
        <label for="tipo_usuario" class="radio-inline"><input type="radio" name="tipo_usuario" value="alumno" onclick="borrarCampoDocente();"checked>Alumno</label>
        <label for="tipo_usuario" class="radio-inline"><input type="radio" name="tipo_usuario" value="docente" onclick="mostrarCampoDocente();">Docente</label>
        <label for="tipo_usuario" class="radio-inline"><input type="radio" name="tipo_usuario" value="moderador" onclick="borrarCampoDocente();">Moderador</label>
        <label for="tipo_usuario" class="radio-inline"><input type="radio" name="tipo_usuario" value="desarrollador" onclick="borrarCampoDocente();">Desarrollador</label>
      </div>
      <div id="campo_docente">
        <fieldset>
          <legend>Docente</legend>
          <div class="form-group">
            <label for="cuil">Cuil</label><input type="text" class="form-control" name="cuil" value="">
          </div>
          <div class="form-group">
            <label for="">¿Tiene Certificación de Servicios?</label>
            <label for="cert_serv" class="radio-inline"><input type="radio" name="cert_serv" value="si">Si</label>
            <label for="cert_serv" class="radio-inline"><input type="radio" name="cert_serv" value="no" checked>No</label>
          </div>

          <fieldset>
            <legend>Titulo</legend>
            <div class="form-group">
              <label for="titulo_0">Titulo</label><input type="text" name="titulo_o" value="" class="form-control"/>
              <label for="descripcion_titulo_0">Breve Descripción</label> <textarea name="descripcion_titulo_0" rows="3" class="form-control"></textarea>
              <label for="anio_obtencion">Año de Obtensión</label>
              <div class="input-group date" data-provide="datepicker">
                <input type="text" class="form-control">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
            </div>
            <div class="form-group" id="mas_titulos"></div>
            <a href="#" onclick="agregarCampos();" class="btn btn-default">+ Titulos</a>
          </fieldset>
        </fieldset>

      </div>
    </form>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.datepicker').datepicker();
    });
      var nextinput = 0;
      function agregarCampos(){
        nextinput++;
        campo ='<div class="form-group>"';
        campo += '<label for="titulo_'+nextinput+'"> Titulo </label> <input type="text" id="titulo_' + nextinput + '"&nbsp; name="titulo_' + nextinput + '"&nbsp; class="form-control" /><br>';
        campo +='</div>';
        campo +='<div class="form-group>"';
        campo += '<label for="descripcion_titulo_'+nextinput+'">Breve Descripción</label> <textarea id="descripcion_titulo_' + nextinput + '"&nbsp; name="descripcion_titulo_' + nextinput + '" class="form-control rows="3"></textarea><br>';
        campo +='</div>';
        $("#mas_titulos").append(campo);
      }
      function mostrarCampoDocente(){
        $("#campo_docente").show();
      }
      function borrarCampoDocente(){
        $("#campo_docente").hide();
      }

    </script>
  </body>
</html>
