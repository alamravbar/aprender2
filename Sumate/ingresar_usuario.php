<?php
  if($_POST){
    $myObj["ing_correcto"] = false;
    $myObj["ing_inc_email"]=true;
    $myObj["ing_inc_nombre_usuario"] = true;

    $myJSON = json_encode($myObj);

    echo $myJSON;
  }

 ?>
