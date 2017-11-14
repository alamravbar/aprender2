<?php
include_once('lib/Login.php');
$oLogin=new Login();
 echo 'Rol: '.$oLogin->getRol()." Nombre usuario: ".$oLogin->getNombreUsuario();
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Aprender</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo aprender.com.ar"></a>
        </div>
        <?php


//if($oLogin->activa()){

?>  
        <ul class="nav navbar-nav navbar-right">
          <?php
          if(!$oLogin->activa()){ ?>
          <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
          <?php }else{ ?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
             <?php
             
               echo $oLogin->getNombreUsuario();
             echo 	$oLogin->getRol ();
             ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Cambiar Contraseña</a></li>
              <li><a href="cerrarLogin.php">Salir</a></li>
            </ul>
          </li>
        </ul>
        
        <?php     }
             
             ?>
  
        <ul class="nav navbar-nav navbar-right">
          <li class="active"id="inicio"><a href="#">Inicio</a></li>
          <li id="bibliotec"><a href="#" id="biblioteca">Biblioteca</a></li>
          <li id="asignatur"><a href="#" id="asignatura">Asignatura</a></li>
          <li id="sugerenci"><a href="#" id="sugerencia">Sugerencias</a></li>
          <li id="plataform"><a href="#" id="plataforma">Plataforma</a></li>
          <li id="sumat"><a href="#" id="sumate">Sumate</a></li>
          <li id="administracio"><a href="#" id="administracion">Administración</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container contenedor">
    <div class=""id="vista">

    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 footerleft ">
          <div class="logofooter"> Logo</div>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
          <p><i class="fa fa-map-pin"></i> 210, Aggarwal Tower, Rohini sec 9, New Delhi -        110085, INDIA</p>
          <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 878 398</p>
          <p><i class="fa fa-envelope"></i> E-mail : info@webenlance.com</p>

        </div>
        <div class="col-md-2 col-sm-6 paddingtop-bottom">
          <h6 class="heading7">GENERAL LINKS</h6>
          <ul class="footer-ul">
            <li><a href="#"> Career</a></li>
            <li><a href="#"> Privacy Policy</a></li>
            <li><a href="#"> Terms & Conditions</a></li>
            <li><a href="#"> Client Gateway</a></li>
            <li><a href="#"> Ranking</a></li>
            <li><a href="#"> Case Studies</a></li>
            <li><a href="#"> Frequently Ask Questions</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 paddingtop-bottom">
          <h6 class="heading7">LATEST POST</h6>
          <div class="post">
            <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
            <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
            <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 paddingtop-bottom">
          <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
              <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/aprender.com.ar/">Facebook</a></blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="container">
        <div class="col-md-6">
          <p>© 2016 - All Rights with Webenlance</p>
        </div>
        <div class="col-md-6">
          <ul class="bottom_ul">
            <li><a href="#">webenlance.com</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Faq's</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Site Map</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!--footer start from here-->
  <!-- Modal -->
  <div class="modal fade" id="modalLogin" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Ingresar </h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" id="formingreso" name="formingreso" action="validarLogin.php" method="post">
            <div class="form-group">
              <label for="nombre_usuario"><span class="glyphicon glyphicon-user"></span> Usuario</label>
              <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contraseña</label>
              <input type="text" class="form-control" id="psw" name="psw" placeholder="Ingrese Contraseña">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Recuerdame</label>
            </div>
            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Ingresar</button>
            <button type="submit" class="btn btn-danger btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          
          </form>
          <div id="result"></div>
        </div>
        <div class="modal-footer">


        </div>
      </div>

    </div>
  </div>


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $.get("Inicio/inicio.php", function(data){
      $("#vista").html(data);
    });
    $("#login").click(function(){
      $("#modalLogin").modal();
    });
  });

  $("#biblioteca").click(function(){
    $.get("biblioteca.php", function(data){
      $("#vista").html(data);
      $("#bibliotec").addClass("active");
      $("#asignatur").removeClass("active");
      $("#administacio").removeClass("active");
      $("#sugerenci").removeClass("active");
      $("#plataform").removeClass("active");
      $("#sumat").removeClass("active");
      $("#inicio").removeClass("active");
    });
     // Interceptamos el evento submit

  
    
  });
  $("#sumate").click(function(){
    $.get("Sumate/sumate.php", function(data){
      $("#vista").html(data);
      $("#sumat").addClass("active");
      $("#asignatur").removeClass("active");
      $("#administacio").removeClass("active");
      $("#sugerenci").removeClass("active");
      $("#plataform").removeClass("active");
      $("#bibliotec").removeClass("active");
      $("#inicio").removeClass("active");
    });});

    $("#administracion").click(function(){
      $.get("Administracion/administracion.php", function(data){
        $("#vista").html(data);
        $("#administacio").addClass("active");
        $("#bibliotec").removeClass("active");
        $("#asignatur").removeClass("active");
        $("#sugerenci").removeClass("active");
        $("#plataform").removeClass("active");
        $("#sumat").removeClass("active");
        $("#inicio").removeClass("active");
      });
    });
    $("#sugerencia").click(function(){
      $.get("Sugerencia/sugerencia.php", function(data){
        $("#vista").html(data);
        $("#sugerenci").addClass("active");
        $("#bibliotec").removeClass("active");
        $("#asignatur").removeClass("active");
        $("#plataform").removeClass("active");
        $("#administacio").removeClass("active");
        $("#sumat").removeClass("active");
        $("#inicio").removeClass("active");
      });
    });
    $("#asignatura").click(function(){
      $.get("Asignatura/asignatura.php", function(data){
        $("#vista").html(data);
        $("#asignatur").addClass("active");
        $("#bibliotec").removeClass("active");
        $("#plataform").removeClass("active");
        $("#sugerenci").removeClass("active");
        $("#administacio").removeClass("active");
        $("#sumat").removeClass("active");
        $("#inicio").removeClass("active");
      });
    });
    $("#plataforma").click(function(){
      $.get("Plataforma/plataforma.php", function(data){
        $("#vista").html(data);
        $("#plataform").addClass("active");
        $("#bibliotec").removeClass("active");
        $("#asignatur").removeClass("active");
        $("#sugerenci").removeClass("active");
        $("#administacio").removeClass("active");
        $("#sumat").removeClass("active");
        $("#inicio").removeClass("active");
      });
    });
    $("#inicio").click(function(){
      $.get("Inicio/inicio.php", function(data){
        $("#vista").html(data);
        $("#inicio").addClass("active");
        $("#asignatur").removeClass("active");
        $("#sugerenci").removeClass("active");
        $("#plataform").removeClass("active");
        $("#bibliotec").removeClass("active");
        $("#sumat").removeClass("active");
      });});

      </script>

    </body>
    </html>
