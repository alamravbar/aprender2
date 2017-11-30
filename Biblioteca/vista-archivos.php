<html>
<head>
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
  $sql="SELECT d.nombre as nombre, d.ruta as ruta,d.id_documento as id_documento,d.extension as extension, d.descripcion as descripcion,d.habilitado as habilitado,d.id_categoria as id_categoria, c.nombre as nombre_cat  FROM documento d INNER JOIN categoria c ON  d.id_categoria = c.id_categoria;";

  $resultado=$base->query($sql);
  if(!$resultado){
    echo "Error en la base de datos";
  }else{
    $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $mostrar=" ";
    // $mostrar.="<ul class='list-group'>";
    //print_r($datos);
    //exit();
    $mostrar = "<table class='table'>";

    foreach($datos as $elem){
      $sqlEtiquetas = "SELECT c.id_documento, e.id_etiqueta, e.nombre FROM contiene c INNER JOIN etiqueta e  ON c.id_etiqueta = e.id_etiqueta
      WHERE id_documento =".$elem['id_documento'];
      $resultado=$base->query($sqlEtiquetas);
      $etiquetas = "";
      if(!$resultado){
        $mostrar.= "error en base de datos";
      }else{
        $etiquetas = "";
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $etiquetas = "<strong>Etiquetas:</strong> ";
        foreach ($datos as $etiqueta) {
          $etiquetas .=$etiqueta['nombre'].",";
        }
      }


      $mostrar .= "<tr>";
      $mostrar .= "<td>";
      $mostrar .= "<a style='font-size:13px;' href='Biblioteca/".$elem['ruta']."' class='text-justify'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='media-object' style='width:60px'>".$elem['nombre'].".".$elem['extension']."</a>";
      $mostrar .= "</td>";
      $mostrar .= "<td style='font-size:10px;'>";
      $mostrar .= "<br /><br />";
      $mostrar .= "<strong>Descripción: </strong>".$elem['descripcion']."<br />";
      $mostrar .= "<strong>Categoria: </strong>".$elem['nombre_cat']."<br />";
      $mostrar .= $etiquetas;
      $mostrar .= "</td>";
      $mostrar .= "<td style='font-size:12px;'>";
      $mostrar .= "<a href='#' class='modificar' data-id='".$elem['id_documento']."'>Modificar</a> <br />";
      $mostrar .= "<a href='#' class='eliminar' data-id='".$elem['id_documento']."' data-ruta='".$elem['ruta']."'>Eliminar</a><br /> ";
      $mostrar .= "Mandar a validar <br />";
      $mostrar .= "Validar <br />";
      $mostrar .= "No Validar <br />";
      $mostrar .= "</td>";
      //print_r($extension);
      //<a href="#" class="list-group-item">
      //$mostrar.="<a href='".$elem['ruta']."' class='list-group-item'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='img-rounded' align='center' width='68' height='68'>".$elem['nombre'].".".$elem['extension']."</a>";
      // $mostrar.="<li class='list-group-item'><a href='Biblioteca/".$elem['ruta']."' class='text-justify'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='media-object' style='width:60px'>".$elem['nombre'].".".$elem['extension']."</a></li>";
      //<img src='imagen/".$elem['extension'].".jpg' class='img-rounded' align='center' width='68' height='68'>;
      $mostrar .= "</tr>";
    }
    // $mostrar.="</ul>";
    $mostrar .= "</table>";
    echo $mostrar;

  }


  ?>
  <div class="modal fade"id="mod" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" id="formmod">

      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    $(".modificar").click(function(){
      var id = $(this).data("id");
      //alert("modificar "+id);
      $.get("Biblioteca/formulariomodificar.php",{id:id},
      function(data){
        //console.log(data);
        $("#formmod").html(data);
        $('#mod').modal('show');
      });
    });
    $(".eliminar").click(function(){
      var id = $(this).data("id");
      var ruta=$(this).data("ruta");

        var elim = confirm("¿Seguro quiere Eliminar?");
        if (elim == true) {
          $.post("Biblioteca/eliminar.php",{id:id , ruta:ruta},
          function(data){
            alert(data);
          });
        }
      //alert("eliminar "+id);
    });
  </script>


</body>
</html>
