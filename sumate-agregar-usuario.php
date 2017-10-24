<?php
  if($_POST){
      echo "Agregado correctamente | ";
      echo "Nombre: ".$_POST['nombre'];
      echo "Fecha Nac: ".$_POST['fecha_nac'];
  }else{
    echo "No ingreso al Post";
  }
  ?>
