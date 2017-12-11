<?php
include_once "../../lib/PDOConfig.php";
$base=new PDOConfig();
if(isset($_POST)){
  $id=$_POST['id'];
  //    $file = $_FILES["archivo"]["tmp_name"];
  //    print_r($file);
  // if ($_FILES['archivo']["error"] > 0)
  // {
  //   echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  // }
  // else
  // {
  //   echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
  //   echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
  //   echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
  //   echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
  //
  //   /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
  //   move_uploaded_file($_FILES['archivo']['tmp_name'],"subida/" . $_FILES['archivo']['name']);
  // }
  $descripcion=$_POST['descripcion'];
  $categoria =$_POST['categoria'];
  $sql = "UPDATE documento SET descripcion='".$descripcion."', id_categoria='".$categoria."' WHERE id_documento=".$id." ";
  $resultado=$base->query($sql);
  if($resultado){
    echo "Modificación realizada con exito";
  }else{
    echo "no pudo realizarse la modificación";
  }
}else{
  echo "no se puede realizar modificacion";
}
?>
