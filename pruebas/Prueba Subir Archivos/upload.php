<?php
include_once "../../lib/PDOConfig.php";
?>
<html> 
<head></head>
<body>
<?php
//comprobamos que sea una petición ajax
$base=new PDOConfig();eeeeeeeeeeeeeeeeeeeeeeeeeeeefvdv

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    //obtenemos el archivo a subir
    $file = $_FILES['archivo']['name'];
    
    echo $file;
    //echo $file;
    $query=" select* from documento where <nombre></nombre>='".$file."'";
    //SELECT * FROM `archivos` WHERE imagen='a.jpg'
    $resultado=$base->query($query);
    $dato=$resultado->fetchAll(PDO::FETCH_ASSOC);
    if(count($dato)>0){
        echo "no puede cargarse archivo, ya se encuentra cargado";
      //$sql="INSERT INTO `documento`(`id_documento`, `nombre`, `ruta`, `extension`, `descripcion`, `id_categoria`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])"
    }else{
        echo "no encontrado\n";
        $rwe=basename($file,'.pdf');
        echo $rwe;
        //$sql="insert into documento values(null,'".$file.")"
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
