
<?php
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
include_once "../lib/PDOConfig2.php";
if($_GET){
  $base=new PDOConfig;
  $cat_id = $_GET['cat_id'];

  $sql = "SELECT * FROM `at_course_cats` WHERE cat_parent = '".$cat_id."'";
  $resultado=$base->query($sql);
  $sale = "";
  if(!$resultado){
    $sale= "error en consulta a la base de datos";
  }else{
    $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
    if($dato > 0){
      // Si hay categorias que tiene id parent igual que el que le mandamos por parametros
      // Buscamos más categorias y las mandamos
      $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
      $sale.="<h3 style='text-align:center;'>Categorias</h3>";
      $sale.="<div class= 'flex-container-nivel'>";
      $item_categorias ="";
      foreach ($datos as $nivel) {
        $color = random_color();
        $titulo = $nivel['cat_name'];
        $palabras = explode(" ", $titulo);
        $primeras_letras = "";
        foreach ($palabras as $unaPalabra){
          $primeras_letras .=  $unaPalabra[0];
        }
        if($nivel['cat_parent'] != 0){
          $item_categorias .= "<div class='flex-item-nivel'>";
          $item_categorias .="<a href='#' class='nivel2' data-id='".$nivel['cat_id']."'>";
          $item_categorias .= "<div class='circulo-nivel' style='background-color:#".$color."'>";
          $item_categorias .= $primeras_letras;
          $item_categorias .= "</div>";
          $item_categorias .= "</a>";
          $item_categorias .= $titulo;
          $item_categorias .= "</div>";

        }
      }
      $sale.=$item_categorias."</div>";
    }else{
      $sql = "SELECT * FROM `at_courses` WHERE cat_id='".$cat_id."'";
      $resultado=$base->query($sql);
      if($resultado){
        $dato = $resultado->rowCount(PDO::FETCH_ASSOC);
        if($dato > 0){
          $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
          $sale.="<h3 style='text-align:center;'>Cursos</h3>";
          $sale.="<div class='flex-container-asig'>";
          $item_cursos ="";
          foreach ($datos as $cursos) {
            $color =random_color();
            //echo $cursos['cat_id']." - ".$cursos['title'];
            $titulo = $cursos['title'];
            $palabras = explode(" ", $titulo);
            $primeras_letras = "";
            foreach ($palabras as $unaPalabra){
              $primeras_letras .=  $unaPalabra[0];
            }
            $item_cursos .= "<div class='flex-item-asig'>";
            $item_cursos .= "<a href='#' class='curso' data-id='".$cursos['course_id']."'>";
            $item_cursos .= "<div class='circulo-asig' style='background-color:#".$color."'>";
            $item_cursos .= $primeras_letras;
            $item_cursos .= "</div>";
            $item_cursos .= "</a>";
            $item_cursos .= $titulo;
            $item_cursos .= "</div>";
          }
          $sale.=$item_cursos."</div>";
        }else{
            //Sino hay resultado quiere decir que hay que colocar un cartel de sin elementos
            $sale="<div class='flex-container-asig'><div class='nada' >Nada que mostrar</div></div><br><br>";
        }
      }else{
        $sale="Error en consulta con la base de datos";
      }
    }
  }
}
echo $sale;

?>



    <script type="text/javascript">
      $(".nivel2").click(function(){
        console.log("Entro en .nivel2");
        var cat_id = $(this).data("id");
        //alert("toco un nivel: "+$(this).data("id"));
        $.get("Asignatura/obtener_asign_o_cursos.php",{cat_id: cat_id },function(data){
          $("#lienzo2").html(data);
        });
      });
      $(".curso").click(function(){
        console.log("Entro en .curso");
        var id_curso = $(this).data("id");
        //alert("toco un nivel: "+$(this).data("id"));
        $.get("Asignatura/obtener_curso.php",{id_curso: id_curso },function(data){
          $("#contenido_curso").html(data);
          $('#curso').modal("show");
        });
      });
    </script>
