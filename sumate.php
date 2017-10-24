<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sumate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" &>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <p class="intros">
        ¡¡Sumate a Nuestro equipo!! ¡¡Se parte de nuestro equipo de alumnos, docentes, moderador y desarrollador!! En aprender día a día crecemos aprendiendo y crecemos en personas.
        Participa de nuestros chat en vivo, conoce nuestra documentación creada por profesores de todo el mundo, toma clases en nuestros cursos de la plataforma, y sobre todo aprende!
        Acordate vos das el paso y nosotros te acompañamos!
        ¡¡Así que no te lo pierdas e inscribite! ¡¡Te esperamos!!
      </p>
      <form class="form" method="post" id="sumate">
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
          <label for="dtp_input2" class="control-label">Fecha de Nacimiento</label>
          <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" value="" name="fecha_nac" readonly>
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
          <input type="hidden" id="dtp_input2" value="" /><br/>
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
                <label for="titulo_0">Titulo</label><input type="text" name="titulo_0" value="" class="form-control"/>
                <label for="descripcion_titulo_0">Breve Descripción</label> <textarea name="descripcion_titulo_0" rows="3" class="form-control"></textarea>
                <div class="form-group">
                  <label for="dtp_input1" class="control-label">Año de Obtención de Titulo</label>
                  <div class="input-group date form_datetime" data-date="2015-10-23T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" type="text" value=""  name="anio_obtension_0" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                     <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                  <input type="hidden" id="dtp_input1" value="" /><br/>
                </div>
              </div>

              <div class="" id="mas_titulos"></div>
              <a href="#" onclick="agregarCampos();" class="btn btn-default">+ Titulos</a>
            </fieldset>
          </fieldset>

        </div>
        <div class="row">
          <div class="col-md-10">

          </div>
          <div class="col-md-2 col-sm-12">
            <input type="reset" name="" class="btn btn-default" value="Borrar">
            <input type="button" name="" id="enviar" class="btn btn-success" value="Enviar">

          </div>
          <br><br>
        </div>
      </form>

    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
    <script type="text/javascript">
      var nextinput = 0;
      function agregarCampos(){
        nextinput++;
        campo='';
        campo+='<div class="form-group">';
        campo+='  <label for="titulo_'+nextinput+'">Titulo</label><input type="text" name="titulo_'+nextinput+'" value="" class="form-control"/>';
        campo+='  <label for="descripcion_titulo_'+nextinput+'">Breve Descripción</label> <textarea name="descripcion_titulo_'+nextinput+'" rows="3" class="form-control"></textarea>';
        campo+='  <div class="form-group">';
        campo+='    <label for="dtp_input1" class="control-label">Año de Obtención de Titulo</label>';
        campo+='    <div class="input-group date form_datetime" data-date="2015-10-23T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">';
        campo+='      <input class="form-control" type="text" value=""  name="anio_obtension_'+nextinput+'" readonly>';
        campo+='      <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>';
        campo+='       <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>';
        campo+='    </div>';
        campo+='    <input type="hidden" id="dtp_input1" value="" /><br/>';
        campo+='  </div>';
        campo+='</div>';
        // campo ='<div class="form-group>"';
        // campo +='<label for="titulo_'+nextinput+'"> Titulo </label> <input type="text" id="titulo_' + nextinput + '"&nbsp; name="titulo_' + nextinput + '"&nbsp; class="form-control" /><br>';
        // campo +='</div>';
        // campo +='<div class="form-group>"';
        // campo += '<label for="descripcion_titulo_'+nextinput+'">Breve Descripción</label> <textarea id="descripcion_titulo_' + nextinput + '"&nbsp; name="descripcion_titulo_' + nextinput + '" class="form-control rows="3"></textarea><br>';
        // campo +='</div>';
        // campo +='<div class="form-group">';
        // campo +='<label for="dtp_input1" class="control-label">Año de Obtención de Titulo</label>';
        // campo +='<div class="input-group date form_datetime" data-date="2010-10-23T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">';
        // campo +='<input class="form-control" type="text" name="anio_obtension_"'+nextinput+' readonly>';
        // campo +='<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>';
        // campo +='<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>';
        // campo +='</div>';
        // campo +='<input type="hidden" id="dtp_input1" value="" /><br/>';
        // campo +='</div>';
        $("#mas_titulos").append(campo);
        $('.form_datetime').datetimepicker({
          format: " yyyy",
      		viewMode: "years",
      		minViewMode: "years",
      		startView:4,
      		endView:4,
      		minView:4,
      		maxView:4,
      		autoclose:true,
      		startDate:"1910"
          });
      }
      function mostrarCampoDocente(){
        $("#campo_docente").show();
      }
      function borrarCampoDocente(){
        $("#campo_docente").hide();
      }
      $('.form_datetime').datetimepicker({
        //language:'es',
        //weekStart: 1,
        //~todayBtn:  1,
    		//~autoclose: 1,
    		//~todayHighlight: 1,
    		//~startView: 2,
    		//~forceParse: 0,
        //~showMeridian: 1
        format: " yyyy",
    		viewMode: "years",
    		minViewMode: "years",
    		startView:4,
    		endView:4,
    		minView:4,
    		maxView:4,
    		autoclose:true,
    		startDate:"1910"
        });
    	$('.form_date').datetimepicker({
        language:  'es',
        format: " yyyy/mm/dd",
        weekStart: 1,
        todayBtn:  1,
    		autoclose: 1,
    		todayHighlight: 1,
    		startView: 2,
    		minView: 2,
    		forceParse: 0
        });
      $("#enviar").click(function(){
        $.post("sumate-agregar-usuario.php",$("form").serialize(),function(data){
          alert("Data: " + data);
        });
      });
    </script>

  </body>
</html>
