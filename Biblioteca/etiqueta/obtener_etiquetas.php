<?php
include_once "../../lib/PDOConfig.php";
$base=new PDOConfig();

  $sqletiquetas="select * from etiqueta";
  $resultadoCombo=$base->query($sqletiquetas);
  if($resultadoCombo){
    $datosCombo=$resultadoCombo->fetchAll(PDO::FETCH_ASSOC);
    $comboetiqueta="";
    foreach($datosCombo as $elem){
      $comboetiqueta.="<div class='form-check disabled'>
      <label class='form-check-label'>
      <input class='form-check-input formulario' type='checkbox' name='etiqueta[]' value=".$elem['id_etiqueta'].">".$elem['nombre']."
      </label>
      </div>";
    }
    $comboetiqueta.="";
    echo $comboetiqueta;
  }else{
    echo "No existen etiquetas que mostrar";
  }
  ?>
