<?php
include_once('../lib/Login.php');
$oLogin=new Login();
$opciones = "";
if(isset($_GET)){
 $nombre =(isset($_GET['nombre_usuario'])?$_GET['nombre_usuario']:" 1 ");
 $email =(isset($_GET['email'])?$_GET['email']:" 1 ");
 if($nombre != ""){
   $nombre = " AND nombre='".$nombre."'";
 }else{
   $nombre = "";
 }
if($email != ""){
  $email = " AND mail='".$email."'";
}else{
  $email = "";
}
 $tipo_usuario = "";
 if(isset($_GET["tipo_usuario"])){
  $tip_usu = $_GET["tipo_usuario"];
  foreach ($tip_usu as $tipo) {
    $tipo_usuario .= " AND tipo_usuario=".$tipo;
  }
}else{
  $tipo_usuario = "";
}
$habilitado = isset($_GET["habilitado"])?" AND habilitado=1 ":" AND habilitado=0 ";
// if(isset($_GET["habilitado"]) && $_GET["habilitado"]=="1"){
//  $habilitado = " AND habilitado = 1";
// }else{
//  $habilitado = "AND habilitado = 1";
// }

$opciones = $nombre.$email.$tipo_usuario.$habilitado;
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <style media="screen">
      .form1{
        width: 80%;
        margin: 0 auto;
      }
      .form2{
        width: 90%;
         margin: 0 auto;
      }
      .get_usuarios{
        height: 600px;
      }
      .paginas{
        width: 200px;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../"><img src="../img/logo.png" alt="Logo aprender.com.ar"></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <?php
            if(!$oLogin->activa()){ ?>
            <li><a href="#" id="login"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
            <?php }else{ ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <?php

                 echo $oLogin->getNombreUsuario();

               ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Cambiar Contraseña</a></li>
                <li><a href="../cerrarLogin.php">Salir</a></li>
              </ul>
            </li>
          </ul>

          <?php     }

               ?>
        </div>
      </nav>
    </header>
    <p class="intros" style="text-align:center;">
      ¡En esta página podrás modificar a los usuarios del sitio!
    </p>
      <form method="get" class="form-inline form1" action="administracion_usuario.php">
        <div class="form-group">
          <label for="nombre_usuario"></label>
          <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" class="form-control" />
        </div>
        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" placeholder="Email" class="form-control" >
        </div>

        <div class="form-group" style="border:solid 0.5px #b4b6bf;padding:4px;border-radius:5px;">
            Tipo de Usuario:
            Alumno<input type="checkbox" name="tipo_usuario[]" value="1">
            Docente<input type="checkbox" name="tipo_usuario[]"  value="2">
            Moderador<input type="checkbox" name="tipo_usuario[]"  value="3">
            Administrador<input type="checkbox" name="tipo_usuario[]"  value="4">
        </div>


        <div class="checkbox">
            <label>Habilitado<input type="checkbox" name="habilitado" value="1"></label>
        </div>

        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <?php
      include_once 'paginacion.php';
      include_once '../lib/Login.php';
      if($oLogin->activa() && $oLogin->getRol() == 4){


      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'tp_final_final';

      $mysqli = new mysqli($host,$user,$pass,$db);

      //DO NOT limit this query with LIMIT keyword, or...things will break!
      $query = "SELECT * FROM usuario WHERE 1 ".$opciones;
      //these variables are passed via URL
      $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; //movies per page
      $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
      $links = 5;

      $paginator = new Paginator( $mysqli, $query ); //__constructor is called
      $results = $paginator->getData( $limit, $page );

      //print_r($results);die; $results is an object, $result->data is an array

      //print_r($results->data);die; //array

      if($results->data[0] != -1){ //Preguntamos si viene algo en la consulta sino mostrara un mensaje de "NADA QUE MOSTRAR"
      ?>
      <div class="paginas">
        <?php
        echo $paginator->createLinks( $links, 'pagination pagination-sm' );
         ?>
      </div>

      <form class="form2">


      <table class='table table-striped'>
        <thead>
          <tr>
            <th>Nombre de Usuario</th>
            <th>Email</th>
            <th>Tipo de Usuario</th>
            <th>Habilitado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
     <?php

      for ($p = 0; $p < count($results->data); $p++): ?>

              <?php
              //store in $movie variable for easier reading

              $usuario = $results->data[$p];

              echo "<tr>";
              echo "<td><input type='text' name='nombre_".$usuario['id_usuario']."' id='nombre_".$usuario['id_usuario']."' value='".$usuario['nombre']."'></td>";
              echo "<td><input type='text' name='email_".$usuario['id_usuario']."' id='email_".$usuario['id_usuario']."' value='".$usuario['mail']."'></td>";
              echo "<td>";

              echo "<div class='form-group'>";
              echo "<select class='form-control' id='rol_".$usuario['id_usuario']."'>";
              switch ($usuario['id_rol']) {
                case 1:
                 echo "<option value='1' selected>Alumno</option>";
                 echo "<option value='2'>Docente</option>";
                 echo "<option value='3'>Moderador</option>";
                 echo "<option value='4'>Administrador</option>";
                 break;
                case 2:
                echo "<option value='1'>Alumno</option>";
                echo "<option value='2' selected>Docente</option>";
                echo "<option value='3'>Moderador</option>";
                echo "<option value='4'>Administrador</option>";
                 break;
                case 3:
                echo "<option value='1'>Alumno</option>";
                echo "<option value='2'>Docente</option>";
                echo "<option value='3' selected>Moderador</option>";
                echo "<option value='4'>Administrador</option>";
                  break;
                case 4:
                echo "<option value='1'>Alumno</option>";
                echo "<option value='2'>Docente</option>";
                echo "<option value='3'>Moderador</option>";
                echo "<option value='4' selected>Administrador</option>";
                 break;
              }
              echo "</select>";
              echo "</div>";

              echo "</td>";
              echo "<td>".(($usuario['habilitado']==1)?"<input type='checkbox' name='habilitado_".$usuario['id_usuario']."' id='habilitado_".$usuario['id_usuario']."'checked>":"<input type='checkbox' name='habilitado_".$usuario['id_usuario']."' id='habilitado_".$usuario['id_usuario']."'>")."</td>";
              echo "<td><a id='actualizar' class='actualizar' data-id='".$usuario['id_usuario']."'>Actualizar</a></td>";
              echo "</tr>";

              ?>
      <?php endfor; ?>
     </tbody>
     </table>
     </form>



      <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/bootstrap.js"></script>
      <script type="text/javascript">
        $(".actualizar").click(function(){
          var id = $(this).data("id");
          var habilitado = $("#habilitado_"+id).prop('checked');
          if(habilitado){
            habilitado = 1;
          }else{
            habilitado = 0;
          }
          //alert("Habilitado " + $("#habilitado_"+id).prop('checked'));
          /*alert("Actualizar "+ id);
          alert("Nombre " + $("#nombre_"+id).val());
          alert("Email " + $("#email_"+id).val());
          alert("Rol " + $("#rol_"+id).val());
          alert("Habilitado " + $("#habilitado_"+id).val());*/
          $.post("actualizar_usuario.php",
          {/**$_POST['email'];
          $nombre = $_POST['nombre'];
          $habilitado = $_POST['habilitado'];
          $id_rol = $_POST['id_rol'];
          $id = $_POST['id'];*/
              email: $("#email_"+id).val(),
              nombre: $("#nombre_"+id).val(),
              habilitado: habilitado,
              id_rol:$("#rol_"+id).val(),
              id: id
          },
          function(data){
              alert(data);
          });
        });
      </script>
    </body>
</html>
<?php
}else{
  echo "<p class='intros'style='text-align:center;'><strong> NADA QUE MOSTRAR</strong></p>";
}
} ?>
