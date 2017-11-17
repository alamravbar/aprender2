 <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <?php

 require ('paginacion.php');

 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'tp_final_final';

 $mysqli = new mysqli($host,$user,$pass,$db);

 //DO NOT limit this query with LIMIT keyword, or...things will break!
 $query = "SELECT * FROM usuario";

 //these variables are passed via URL
 $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; //movies per page
 $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
 $links = 5;

 $paginator = new Paginator( $mysqli, $query ); //__constructor is called
 $results = $paginator->getData( $limit, $page );

 //print_r($results);die; $results is an object, $result->data is an array

 //print_r($results->data);die; //array

 echo $paginator->createLinks( $links, 'pagination pagination-sm' );

 ?> <form>


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
<script type="text/javascript">
  $(".actualizar").click(function(){
    var id = $(this).data("id");
    alert("Habilitado " + $("#habilitado_"+id).val());
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
        habilitado: $("#habilitado_"+id).val(),
        id_rol: $("#rol_"+id).val(),
        id: id
    },
    function(data){
        alert("Data: " + data );
    });
  });
</script>
