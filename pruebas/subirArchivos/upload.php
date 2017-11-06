<?php
include_once "../../lib/PDOConfig.php";
?>
<html> 
<head></head>
<body>
<?php

$base=new PDOConfig();

//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
    

  
    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
   
    $query=" select* from documento where nombre='".$file."'";
    //SELECT * FROM `archivos` WHERE imagen=
    $resultado=$base->query($query);
    $dato=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
    
    if(count($dato)>0){
        echo "no se puede cargar archivo, ya se encuentra cargado!.";

          }else{
          
$etiquetas=$_POST['etiqueta'];



      //  echo "no encontrado\n";  //$sql="insert into archivos (id,info,imagen) VALUES(null,'".$file['$file']."','".."')"
        $extension=explode(".",$file);
       // echo($extension[1]);
         $x=".".$extension[1];

         $nombre=basename($file,$x);
        // echo "nombre:".$nombre."  extencion".$x;
        
      $sql="insert into documento(id_documento, nombre, ruta, extension, descripcion, id_categoria) 
      VALUES (null,'".$nombre."','files/".$file."','".$extension[1]."','".$_POST['comentario']."',".$_POST['categoria'].")";
      $res=$base->query($sql);
      if($res){
          $sqlIngresado="select id_documento from documento where nombre='".$nombre."'";
          $resIngreso=$base->query($sqlIngresado);
          $datosIngreso=$resIngreso->fetchAll(PDO::FETCH_ASSOC);

        


        foreach($etiquetas as $elem){
            $sqlEtiqueta=" ";
            $sqlEtiqueta="insert into contiene(id_documento,id_etiqueta)values(".$datosIngreso[0]['id_documento'].",".$elem.")";
            $resEtiqueta=$base->query($sqlEtiqueta);

            if($resEtiqueta){
                echo "ingresaado";
            }
        }
      }else{
          echo "no ingresado";
      }

    }

    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if(!is_dir("files/")) {
        mkdir("files/", 0777);
     }
    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$file))
    {
       sleep(3);//retrasamos la petición 3 segundos
       echo basename($file,".");//devolvemos el nombre del archivo para pintar la imagen
//    print_r($_FILES);
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}

?>
</body> 
</html>
