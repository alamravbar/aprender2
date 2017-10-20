<?php
include_once "../../lib/PDOConfig.php";
?>
<html> 
<head></head>
<body>
<?php
//comprobamos que sea una petición ajax
$base=new PDOConfig();

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
    
    echo $file;
    //echo $file;
    $query=" select* from archivos where imagen='".$file."'";
    //SELECT * FROM `archivos` WHERE imagen='a.jpg'
    $resultado=$base->query($query);
    $dato=$resultado->fetchAll(PDO::FETCH_ASSOC);
    if(count($dato)>0){
      //$sql="insert into archivos (id,info,imagen) VALUES(null,'".$file['$file']."','".."')"
    }else{
        echo "no encontrado\n";
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
print_r($_FILES);
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}

?>
</body> 
</html>
