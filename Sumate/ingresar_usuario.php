<?php
  include_once '../lib/PDOConfig.php';

  if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombre_usuario = $_POST['nombre_usuario_tabla'];
    $psw = ($_POST['psw_tabla']);
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nac'];
    $acepto_los_terminos = $_POST['term_cond'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $genero = $_POST['genero'];
    $myObj["ing_inc_nombre_usuario"] = false;
    $myObj["ing_inc_email"]=false;
    $myObj["ing_correcto"] = true;
    $myObj['error'] = "";
    $ing_cor = true;
    //Corroboro que el nombre_usuario y el email no se encuentren en la Base de datos:
    if($email != ""){
      $base = new PDOConfig();
      $sql= "SELECT mail FROM usuario WHERE mail= '".$email."'";
      $resultado=$base->query($sql);
      if(!$resultado){
        $myObj['error'] ="Resultado Inesperado en la consulta a la BD por email";
      }else{
        $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
        if($dato > 0){
          $myObj["ing_correcto"] = false;
          $myObj["ing_inc_email"]=true;
          $ing_cor = false;
        }else{
          $myObj["ing_inc_email"]=false;
        }
      }
    }

    if($nombre_usuario != ""){
      $base = new PDOConfig();
      $sql= "SELECT nombre FROM usuario WHERE nombre= '".$nombre_usuario."'";
      $resultado=$base->query($sql);
      if(!$resultado){
        $myObj['error'] ="Resultado Inesperado en la consulta a la BD por nombre_usuario";
      }else{
        $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
        if($dato == 1){
          $myObj["ing_inc_nombre_usuario"] = true;
          $myObj["ing_correcto"] = false;
          $ing_cor = false;
        }else{
          $myObj["ing_inc_nombre_usuario"] = false;
        }
      }
    }
    /** if the ing_correcto is true, this is that email and user_name are correct, enter in the ddbb**/
    if($ing_cor){
      $base = new PDOConfig();
      /** First enter in the data base the Persona, then Usuario and finally enter the Alumno or Docente table**/
      /** Entry Persona's table INSERT INTO `Persona`(`nombre`, `apellido`, `fecha_nac`) VALUES **/
      //$sql= "INSERT INTO 'Persona'('nombre', 'apellido', 'fecha_nac', 'genero') VALUES ('".$nombre."','".$apellido."','".$fecha_nac."','".$gerero."')";
      $sql= "INSERT INTO `persona`(`nombre`, `apellido`, `fecha_nac`, `genero`) VALUES ('".$nombre."','".$apellido."','".$fecha_nac."','".$genero."')";
      $resultado=$base->query($sql);
      $id_persona = $base->lastInsertId();
      if(!$resultado){
        $myObj['error'] ="ERROR: Resultado Inesperado en la consulta a la BD por insertar persona";
      }else{
       $myObj['error'] = "OK: Persona insertada exitosamente ";
       /**Now commming part of Usuario**/
       /**INSERT INTO `Usuario`(`id_usuario`, `mail`, `nombre`, `psw`, `habilitado`, `id_rol`, `id_persona`, `fecha_creacion`) VALUES
       ('id_usuario','mail','nombre_usuario','psw','habilitado','id_rol','id_persona','fecha_creacion')**/
       //$myObj['prueba']=$tipo_usuario;
       $id_rol = 0;
       $myObj['prueba']=$tipo_usuario;
       if($tipo_usuario == "alumno"){
         $habilitado = 1;
         $id_rol = 1;
         $sqlAlumno = "INSERT INTO `alumno`(`id_persona`) VALUES ('".$id_persona."')";
         $resultado=$base->query($sqlAlumno);
         if(!$resultado){
           $myObj['error'] ="ERROR: Resultado Inesperado en la consulta a la BD por insertar alumno";
         }else{
           $myObj['error'] = "OK: Alumno insertado exitosamente";
         }
       }else{
         if($tipo_usuario == "docente"){
           $habilitado = 0;
           $id_rol = 2;
           $cert_serv = $_POST['cert_serv'];
           $cuil = $_POST['cuil'];
           if($cert_serv == 'si'){
             $cert_serv_2 = 1;
           }else{
             $cert_serv_2 = 0;
           }

           $sql ="INSERT INTO `docente`(`id_persona`, `cuil`, `habilitado`, `cert_serv`) VALUES ('".$id_persona."','".$cuil."',".$habilitado.",".$cert_serv_2.")";
           $resultado=$base->query($sql);
           if(!$resultado){
             $myObj['error'] ="ERROR: Resultado Inesperado en la consulta a la BD por insertar docente";
           }else{
             $myObj['error'] = "OK: Docente insertado exitosamente";
             /**Insert Titulos**/

             $titulo = $_POST["titulo_0"];
             $descripcion_titulo = $_POST['descripcion_titulo_0'];
             $anio_obtension = $_POST['anio_obtension_0'];
             $sqlTitulo = "INSERT INTO `titulo`( `nombre`, `descripcion`) VALUES ('".$titulo."','".$descripcion_titulo."')";
            //  $myObj['prueba'] = $sqlTitulo;
             $resultado= $base->query($sqlTitulo);
             $id_titulo = $base->lastInsertId();
             if(!$resultado){
               $myObj['error'] ="ERROR: Resultado Inesperado en la consulta a la BD por insertar Titulo";

             }else{
               $myObj['error'] = "OK: Titulo insertado exitosamente";
               //Insert Obtuvo
               $sqlObtuvo = "INSERT INTO `obtuvo`(`id_titulo`, `id_docente`, `anio_obtension`) VALUES($id_titulo,$id_persona,$anio_obtension)";
               $resultado= $base->query($sqlObtuvo);
               if(!$resultado){
                 $myObj['error'] ="ERROR: Resultado Inesperado en la consulta a la BD por insertar Obtuvo";
               }else{
                 $myObj['error'] = "OK: Obtuvo insertado exitosamente";
               }
             }
           }
         }
       }
       $sql= "INSERT INTO `usuario`(`mail`, `nombre`, `psw`, `habilitado`, `id_rol`, `id_persona`, `fecha_creacion`) VALUES ('".$email."','".$nombre_usuario."','".$psw."','".$habilitado."','".$id_rol."','".$id_persona."',NOW())";
       $resultado=$base->query($sql);
       if(!$resultado){
         $myObj['error'] ="ERROR: Resultado Inesperado en la consulta a la BD por insertar Usuario";

       }else{
         $myObj['error'] = "OK: Usuario insertado exitosamente";
       }


      }

  }
  $myJSON = json_encode($myObj);
  echo $myJSON;
}

 ?>
