<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/estilo.css" media="screen" title="no title" charset="utf-8" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#accordion" )
        .accordion({
          header: "> div > h3"

        })
        .sortable({
          axis: "y",
          handle: "h3",
          stop: function( event, ui ) {
            // IE doesn't register the blur when sorting
            // so trigger focusout handlers to remove .ui-state-focus
            ui.item.children( "h3" ).triggerHandler( "focusout" );

            // Refresh accordion to handle new order
            $( this ).accordion( "refresh" );
          }
        });
    } );

    </script>
  </head>

<?php
include_once('libs/Login.php');
include_once('libs/PDOConfig.php');
$base = new PDOConfig();
$oLogin=new Login();
$salida="";
$consultaST = "SELECT * FROM servicio_tecnico WHERE nro_solicitud IS NULL";
$resultadoST = $base->query($consultaST);
$pST ="";
if(!$resultadoST){
  echo "Consulta mal formulada ResultadoST";
}else{
  $datosST = $resultadoST->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datosST as $st) {
      $pST .="<p class='pedido'>";
      if(!isset($st['nro_solicitud'])){
        $pST .="ID: ".$st['id_st']." | Descrip.: ".$st['descripcion'];
      }
      $pST .="</p>";
  }
}

if(!$oLogin->activa()){
  $salida= "<br />";
  $salida .= "<p class='text-center'>";
  $salida .= $oLogin->getError();
  $salida .= "Sesión no activa\n";
  $salida .=("<a href='index.php'>Login</a>");
  $salida .= "</p>";
  $salida .= "<br />";
}else{
  $usuario = $oLogin->getNombreUsuario();
}
 ?>
  <body>
    <header>
      <?php if($oLogin->activa()){ ?>
      <div class="btn-group navbar-right ">
        <button type="button" class="btn btn-primary dropdown-toggle"
                data-toggle="dropdown">
          <small class="glyphicon glyphicon-user"> <?php echo $usuario ?></small> <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
          <li><a href="cambiarContrasena.php">Cambiar Contraseña</a></li>
          <li><a href="cerrarLogin.php">Cerrar Sesión</a></li>
        </ul>
      </div>
      <?php } ?>

      <div class="container">
        <h1 class="text-left">Inventari.@r <small>Una Herramienta para las Escuelas!!</small></h1>
      </div>

    </header>
    <br><br><br><br><br>
    <?php
    if($oLogin->activa()){
    if($oLogin->getRol() == 'administrador'){ ?>

    <div class="container contenedor">
      <div class="row">
        <div class="col-sm-12 col-md-8">
          <h2>Menu Administrador</h2>
          <div id="accordion">
          <div class="group">
            <h3>Adminitrar Usuarios</h3>
            <div>
              <ul>
                <li><a href="crearUsuario.php" id="crear-usuario">CREAR USUARIO ADMINISTRADOR</a></li>
                <li><a href="crearAlumnoConNotebook.php">CREAR ALUMNO CON NOTEBOOK</a></li>
              </ul>
            </div>
          </div>
          <div class="group">
            <h3>Administrar Notebooks</h3>
            <div>
              <ul>
                <li><a href="crearNotebook.php">CREAR NOTEBOOK</a></li>
                <li><a href="listarNotebook.php">LISTAR NOTEBOOKS / MODIFICAR / ELIMINAR / ASIGNAR</a></li>
              </ul>
            </div>
          </div>
          <div class="group">
            <h3>Administrar Servicio Técnico</h3>
            <div>
              <ul>
                <li><a href="listarST.php">LISTAR / ACEPTAR / DENEGAR ST</a></li>

              </ul>
            </div>
          </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <h2>
            Pedidos de Servicio Técnico para validar
          </h2>
          <?php echo $pST; ?>
        </div>
        </div>
        <?php
      	/*echo '<p align="right">usuario: '.$oLogin->getNombreUsuario().' / rol: '.$oLogin->getRol().'</p>';
      	echo "Menu: <a href='paginaSegura2.php'>Pagina 2</a>
      	      <a href='paginaSegura3.php'>Pagina 3</a>
                    <a href='cerrarLogin.php'>Cerrar</a>";

              echo "<h1 >Contenido Seguro de paginaSegura 1</h1><br>";
      */}else{
          if($oLogin->getRol() == 'alumno'){
            ?>
            <div class="container contenedor">

              <h2>Menu Alumno</h2>
              <a class="btn btn-primary btn-lg btn-block" href="realizarST.php">Realizar ST</a>
              <a class="btn btn-primary btn-lg btn-block" href="consultaST.php">Consultar ST</a>
              <a class="btn btn-primary btn-lg btn-block" href="mostrarQR.php">Obtener código QR</a>
              <br><br>
            </div>

            <?php
          }
        }
      }else{
      ?>
      <div class="container contenedor">
        <?php echo $salida ?>

      </div>
      <?php
      }
      ?>
    </div>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
