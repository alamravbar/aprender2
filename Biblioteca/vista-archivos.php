<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
<style>
    .listado{
        margin-left:0 auto;
        width:100%;
    }

</style>

  </head>
<body>

 <?php

include_once '../lib/PDOConfig.php';
$base = new PDOConfig();
$sql=" select * from documento ";

$resultado=$base->query($sql);

$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);


$mostrar=" ";


$mostrar.="<ul class='list-group'>";
//print_r($datos);
//exit();
foreach($datos as $elem){
    
    //print_r($extension);
     //<a href="#" class="list-group-item">
    //$mostrar.="<a href='".$elem['ruta']."' class='list-group-item'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='img-rounded' align='center' width='68' height='68'>".$elem['nombre'].".".$elem['extension']."</a>";
    $mostrar.="<li class='list-group-item'><a href='Biblioteca/".$elem['ruta']."' class='text-justify'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='media-object' style='width:60px'>".$elem['nombre'].".".$elem['extension']."</a></li>";
//<img src='imagen/".$elem['extension'].".jpg' class='img-rounded' align='center' width='68' height='68'>;
}
$mostrar.="</ul>";$mostrar.="";
echo $mostrar;


?>


</script>


</body>
</html>
