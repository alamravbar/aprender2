<?php
  include_once '../lib/PDOConfig.php';

  if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $psw = $_POST['psw'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nac'];
    $acepto_los_terminos = $_POST['term_cond'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $myObj["ing_inc_email"]=false;
    $myObj["ing_correcto"] = true;
    $myObj['error'] = "";
    //Base de datos:
    if($email != ""){
      $base = new PDOConfig();
      $sql= "SELECT mail FROM Usuario WHERE mail= '".$email."'";
      $resultado=$base->query($sql);
      if(!$resultado){
        $myObj['error'] ="Resultado Inesperado en la consulta a la BD por email";
      }else{
        $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
        if($dato == 1){
          $myObj["ing_correcto"] = false;
          $myObj["ing_inc_email"]=true;
        }else{
          $myObj["ing_inc_email"]=false;
        }
      }
    }
    if($nombre_usuario != ""){
      $base = new PDOConfig();
      $sql= "SELECT nombre FROM Usuario WHERE nombre= '".$nombre_usuario."'";
      $resultado=$base->query($sql);
      if(!$resultado){
        $myObj['error'] ="Resultado Inesperado en la consulta a la BD por nombre_usuario";
      }else{
        $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
        if($dato == 1){
          $myObj["ing_correcto"] = false;
          $myObj["ing_inc_nombre_usuario"] = true;
        }else{
          $myObj["ing_inc_nombre_usuario"] = false;
        }
      }
    }

    $myJSON = json_encode($myObj);
    echo $myJSON;
  }

 ?>
