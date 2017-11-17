<?php
include_once '../lib/PDOConfig.php';
if($_POST){
  $base = new PDOConfig();
  $email = $_POST['email'];
  $nombre = $_POST['nombre'];
  $habilitado =(($_POST['habilitado'])=='on'?1:0);
  $id_rol = $_POST['id_rol'];
  $id = $_POST['id'];

    /**UPDATE `usuario`
    SET
    `mail`='".$email."',
    `nombre`='".$nombre."',
    `habilitado`='".$habilitado."',
    `id_rol`='".$id_rol."',
    WHERE `id_usuario`= $id;
    */
  $sql= "UPDATE `usuario`
          SET
          `mail`= '".$email."',
          `nombre`= '".$nombre."',
          `habilitado`= '".$habilitado."',
          `id_rol`= '".$id_rol."'
          WHERE `id_usuario`= $id;";
  echo ($_POST['habilitado']);
  // $resultado=$base->query($sql);
  // if(!$resultado){
  // }

}

 ?>
