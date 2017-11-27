<?php
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

include_once "../lib/PDOConfig2.php";
$base=new PDOConfig;
$sql = "SELECT * FROM `at_courses` WHERE 1";
$resultado=$base->query($sql);
if($resultado){
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $item_cursos ="";
  foreach ($datos as $cursos) {
    $color =random_color();
    echo $cursos['cat_id']." - ".$cursos['title'];
    $titulo = $cursos['title'];
    $palabras = explode(" ", $titulo);
    $primeras_letras = "";
    foreach ($palabras as $unaPalabra){
      $primeras_letras .=  $unaPalabra[0];
    }
    $item_cursos .= "<div class='flex-item-asig'>";
    $item_cursos .= "<div class='circulo-asig' style='background-color:#".$color."'>";
    $item_cursos .= $primeras_letras;
    $item_cursos .= "</div>";
    $item_cursos .= $titulo;
    $item_cursos .= "</div>";
  }
}
$sql = "SELECT * FROM `at_course_cats` WHERE 1";
$resultado=$base->query($sql);
if($resultado){
  $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
  $item_categorias ="";
  foreach ($datos as $nivel) {
    $color =random_color();
    echo " | ". $nivel['cat_id']." - ".$nivel['cat_name'];
    $titulo = $nivel['cat_name'];
    $palabras = explode(" ", $titulo);
    $primeras_letras = "";
    foreach ($palabras as $unaPalabra){
      $primeras_letras .=  $unaPalabra[0];
    }
    if($nivel['cat_parent'] == 0){
      $item_categorias .= "<div class='flex-item-nivel'>";
      $item_categorias .="<a href='#' class='nivel' data-id='".$nivel['cat_id']."'>";
      $item_categorias .= "<div class='circulo-nivel' style='background-color:#".$color."'>";
      $item_categorias .= $primeras_letras;
      $item_categorias .= "</div>";
      $item_categorias .= "</a>";
      $item_categorias .= $titulo;
      $item_categorias .= "</div>";
    }
  }
}

 ?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Asignatura</title>
    <style media="screen">
    .flex-container-asig{
        display: -webkit-flex;
        display: flex;
        justify-content:center;
        flex-wrap:wrap;
        width: auto;
    }

    .flex-item-asig{
        text-align:center;
        padding: 10px;

        width: 100px;
        height: 150px;
        margin: 10px;
      }
      .circulo-asig{
        border-radius: 50px;
        width: 75px;
        height: 75px;
        padding-top:20px;
        font-size: 150%;
        background-color:red;
        text-align: center;
      }
      .flex-container-nivel{
          display: -webkit-flex;
          display: flex;
          justify-content:center;
          flex-wrap:wrap;
          width: auto;
      }

      .flex-item-nivel {
          text-align:center;
          padding: 10px;
          width: 100px;
          height: 150px;
          margin: 10px;
        }
        .circulo-nivel{
          color:white;
          border-radius: 50px;
          width: 90px;
          height: 90px;
          padding-top:26px;
          font-size: 150%;
          background-color:blue;
          text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="flex-container-nivel">
      <?php echo $item_categorias; ?>
    </div>
    <div class="flex-container-asig">
      <?php echo $item_cursos; ?>
    </div>
    <script type="text/javascript">
      $(".nivel").click(function(){
        alert("toco un nivel: "+$(this).data("id"));
      });
    </script>
  </body>
</html>
