<?php
include_once '../lib/PDOConfig.php';
include_once '../lib/Login.php';
$oLogin=new Login();
if($oLogin->activa() && $oLogin->getRol() == 4){

  if($_POST){
    $base = new PDOConfig();
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $habilitado =$_POST['habilitado'];
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
    $resultado=$base->query($sql);
    if(!$resultado){
      echo "Error en la consulta en la base de datos";
    }else{
      echo "Actualizado exitoso";
    }

}
}else{
  echo "Sesión no activa";
}
 ?>
