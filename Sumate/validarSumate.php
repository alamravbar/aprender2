<?php
  if($_GET){
    $id = $_GET["id"];
    //id = 1 nombre_usuario
    //id = 2 email
    $hola->status = true;
    $hola->nombre = true;
    $hola->mail = false;
    $myJSON = json_encode($hola);
    echo $myJSON;
  }

 ?>
