<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sumate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" &>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <style media="screen">
      .error{
        color:red;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <p class="intros">
        ¡¡Sumate a Nuestro equipo!! ¡¡Se parte de nuestro equipo de alumnos, docentes, moderador y desarrollador!! En aprender día a día crecemos aprendiendo y crecemos en personas.
        Participa de nuestros chat en vivo, conoce nuestra documentación creada por profesores de todo el mundo, toma clases en nuestros cursos de la plataforma, y sobre todo aprende!
        Acordate vos das el paso y nosotros te acompañamos!
        ¡¡Así que no te lo pierdas e inscribite! ¡¡Te esperamos!!
      </p>
      <form class="form" method="post" id="sumate" >
        <div class="form-group">
          <label for="nombre">Nombre</label><input type="text" class="form-control" name="nombre" id="nombre" />
        </div>
        <div class="error" id="nombre_error">
          <p>El campo nombre es obligatorio</p>
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label><input type="text" class="form-control" name="apellido" id="apellido" />
        </div>
        <div class="error" id="apellido_error">
          <p>El campo apellido es obligatorio</p>
        </div>
        <div class="form-group row">
          <div class="col-md-4">
            <label for="nombre_usuario">Nombre de Usuario</label><input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" />
            <div class="error" id="nombre_usuario_error">
              <p>El campo Nombre de Usuario es obligatorio</p>
            </div>
          </div>


          <div class="col-md-4">
            <label for="psw">Clave</label><input type="password" class="form-control" name="psw" id="psw" id="psw" />
            <div class="error" id="psw_error">
              <p>El campo Contraseña es obligatorio</p>
            </div>
          </div>

          <div class="col-md-4">
            <label for="repetir_psw">Repetir Clave</label><input type="password" class="form-control" name="repetir_psw" id="repetir_psw" />
            <div class="error" id="repetir_psw_error">
              <p>La Contraseña no es igual</p>
            </div>
          </div>

        </div>
        <div class="form-group">
          <label for="email">Email</label><input type="email" class="form-control" name="email" id="email"/>
          <div class="error" id="email_error">
            <p>El campo email es obligatorio</p>
          </div>
        </div>

        <div class="form-group">
          <label for="fecha_nac" class="control-label">Fecha de Nacimiento</label>
          <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="date" name="fecha_nac" id="fecha_nac" />
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
          <input type="hidden" id="dtp_input2" value="" /><br/>
        </div>
        <div class="error" id="fecha_error">
          <p>Debe introducir una fecha correcta</p>
        </div>
        <div class="form-group">
          <label for="">Tipo de Usuario: </label>
          <label for="tipo_usuario" class="radio-inline"><input type="radio" name="tipo_usuario" value="alumno" onclick="borrarCampoDocente();"checked>Alumno</label>
          <label for="tipo_usuario" class="radio-inline"><input type="radio" name="tipo_usuario" value="docente" onclick="mostrarCampoDocente();">Docente</label>
        </div>
        <div class="form-group">
          <label for="term_cond">Acepto los <a href="Sumate/terminos_y_condiciones.php">Terminos y Condiciones</a> </label>
          <input type="checkbox" name="term_cond" id="term_cond">
        </div>

        <div class="error" id="term_cond_error">
          <p>Debe aceptar los terminos y condiciones para continuar</p>
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
                    <input class="form-control" type="text" value=""  name="anio_obtension_0" readonly required />
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

    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.error').hide();
        $("#fecha_nac").change(function(){
          //Obtenengo nombre y hago comprobaciones
          var fecha_nac = $("#fecha_nac").val();
          var date = new Date(fecha_nac);
          if(date instanceof Date && !isNaN(date.valueOf())){
            $("#fecha_error").hide();
            return true;
          }else{
            $("#fecha_error").show();
      			$("#fecha_nac").focus();
      			return false;
          }
        });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.error').hide();
      $("#enviar").click(function(){
        //Obtengo nombre y hago comprobaciones
        var nombre = $("#nombre").val();
        var sale =true;
        if(nombre != ""){
          $("#nombre_error").hide();

        }else{
          $("#nombre_error").show();
          $("#nombre").focus();
          sale = false;
        };


        //Obtengo apellido y hago comprobaciones
        var apellido = $("#apellido").val();
        if(apellido != ""){
          $("#apellido_error").hide();

        }else{
          $("#apellido_error").show();
          $("#apellido").focus();
          sale = false;
        }

        //Obtengo nombre_usuario y hago comprobaciones
        var nombre_usuario = $("#nombre_usuario").val();
        if(nombre_usuario != ""){
          $("#nombre_usuario_error").hide();

        }else{
          $("#nombre_usuario_error").show();
          $("#nombre_usuario").focus();
          sale = false;
        }
        //Obtengo email y hago comprobaciones
        var email = $("#email").val();
        if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1){
          $("#email_error").show();
          $("#email").focus();
          sale = false;
        }else{
          $("#email_error").hide();

        }
        //Obtengo password psw y repetir_psw y hago comprobaciones
        var psw = $("#psw").val();
        var repetir_psw = $("#repetir_psw").val();
        if(psw != ""){
          $("#psw_error").hide();

        }else{
          $("#psw_error").show();
          $("#psw").focus();
          sale = false;
        }
        if(repetir_psw != ""){
          $("#repetir_psw_error").hide();

        }else{
          $("#repetir_psw_error").show();
          $("#repetir_psw").focus();
          sale = false;
        }
        if(repetir_psw != psw){
          $("#repetir_psw_error2").show();
          $("#repetir_psw").focus();
          sale = false;
        }else{
          $("#repetir_psw_error2").hide();

        }
        //Obtengo nombre y hago comprobaciones
        var fecha_nac = $("#fecha_nac").val();
        var date = new Date(fecha_nac);
        if(date instanceof Date && !isNaN(date.valueOf())){
          $("#fecha_error").hide();

        }else{
          $("#fecha_error").show();
          $("#fecha_nac").focus();
          sale = false;
        }
        var term_cond = $("#term_cond").val();
        if($('#term_cond').prop('checked')){
          $("#term_cond_error").hide();
        }else{
          $("#term_cond_error").show();
          $("#term_cond").focus();
          sale = false;
        }
        return sale;
      });
    });
    </script>
  </body>
</html>