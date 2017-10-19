<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    .listado{
        margin-left:0 auto;
        width:100%;
    }

</style>

  </head>
<body>

 <?php

include_once 'PDOConfig.php';
$base = new PDOConfig();
$sql=" select * from archivos ";

$resultado=$base->query($sql);

$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

$mostar="<div class='listado'>  <table class='table table-striped table-bordered'>  <thead class='thead-inverse'><tr><th>Info</th><th>Imagen</th> </tr></thead>";

foreach($datos as $elem){
    $extension=explode('.',$elem['imagen']);
    //print_r($extension);

    $mostar.="<tr class='table table-sm'><td><img src='imagen/".$extension[1].".jpg' align='center' width='68' height='68'></td><td><a href='files/".$elem['imagen']."'>".$elem['info']."</a></td></tr>";

}

$mostar.="</table></div>";
//echo $mostar;

$mostrar="<div class='row' >";
$mostrar.="<div class='col-md-4'></div>";

$mostrar.="<div class='col-md-4'><ul class='list-group'>";
foreach($datos as $elem){
    $extension=explode('.',$elem['imagen']);
    //print_r($extension);
     //<a href="#" class="list-group-item">
    $mostrar.=" <a href='files/".$elem['imagen']."' class='list-group-item'><img src='imagen/".$extension[1].".jpg' class='img-rounded' align='center' width='68' height='68'> ".$elem['info']."</a>"  ;

}
$mostrar.="</ul></div></div>";
echo $mostrar;


?>
<script type="text/javascript">
$(document).ready(function(){


})

</script>


</body>
</html>
