<?php
include_once "../usuario/es_creador.php";
include_once "../../lib/Login.php";
$oLogin=new Login(); //Generamos el objeto Login
//echo es_creador(127,$oLogin);
// if(es_creador(27,$oLogin)){
//   echo "es Creador";
// }
?>
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

  include_once '../../lib/PDOConfig.php';
  $base = new PDOConfig();
  $sql="SELECT d.nombre as nombre, d.ruta as ruta,d.id_documento as id_documento,d.extension as extension, d.descripcion as descripcion,d.estado as estado,d.id_categoria as id_categoria, c.nombre as nombre_cat, u.nombre as nombre_usuario
  FROM documento d
  INNER JOIN categoria c
  ON  d.id_categoria = c.id_categoria
  INNER JOIN carga car
  ON d.id_documento = car.id_documento
  INNER JOIN usuario u
  ON car.id_docente = u.id_persona
  ";

  $resultado=$base->query($sql);
  if(!$resultado){
    echo "Error en la base de datos por select";
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
        $mostrar.= "error en base de datos por select";
      }else{
        $etiquetas = "";
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $etiquetas = "<strong>Etiquetas:</strong> ";
        foreach ($datos as $etiqueta) {
          $etiquetas .=$etiqueta['nombre'].",";
        }
      }

      if($elem['estado'] == 1){
        $mostrar .= "<tr>";
        $mostrar .= "<td>";
        $mostrar .= "<a style='font-size:13px;' href='Biblioteca/".$elem['ruta']."' class='text-justify'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='media-object' style='width:60px'>".$elem['nombre'].".".$elem['extension']."</a>";
        $mostrar .= "</td>";
        $mostrar .= "<td style='font-size:10px;'>";
        $mostrar .= "<br />";
        $mostrar .= "<strong>Descripción: </strong>".$elem['descripcion']."<br />";
        $mostrar .= "<strong>Categoria: </strong>".$elem['nombre_cat']."<br />";
        $mostrar .= $etiquetas."<br />";
        $mostrar .= "<strong>Creador: </strong>".$elem['nombre_usuario']."<br />";
        $mostrar .= "</td>";
        if($oLogin->activa() && $oLogin->getRol() == 2 || $oLogin->getRol() == 3 || $oLogin->getRol() == 4 ){
          $mostrar .= "<td style='font-size:12px;'>";
          if(es_creador($elem['id_documento'],$oLogin) && $elem['estado'] != 1){
            $mostrar .= "<a href='#' class='modificar' data-id='".$elem['id_documento']."'>Modificar</a> <br />";
            $mostrar .= "<a href='#' class='eliminar' data-id='".$elem['id_documento']."' data-ruta='".$elem['ruta']."'>Eliminar</a><br /> ";
            $mostrar .= "Ver observaciones <br />";
          }

          if($oLogin->activa() && $oLogin->getRol() == 3 && $elem['estado'] == 0){
            $mostrar .= "<a class='actualizar_estado' data-id='".$elem['id_documento']."' href='#'>Validar</a> <br />";
            $mostrar .= "<a class='crear_observacion' data-id='".$elem['id_documento']."' href='#'>No Validar</a> <br />";
          }
          $mostrar .= "</td>";
        }
        $mostrar .= "</tr>";
      }else{
        if($oLogin->activa() && ($oLogin->getRol() == 2 || $oLogin->getRol() == 3 || $oLogin->getRol() == 4 )){
          $mostrar .= "<tr style='background-color:#b6c0cb;'>";
          $mostrar .= "<td>";
          $mostrar .= "<a style='font-size:13px;' href='Biblioteca/".$elem['ruta']."' class='text-justify'><img src='Biblioteca/imagen/".$elem['extension'].".jpg' class='media-object' style='width:60px'>".$elem['nombre'].".".$elem['extension']."</a>";
          $mostrar .= "</td>";
          $mostrar .= "<td style='font-size:10px;'>";
          $mostrar .= "<br />";
          $mostrar .= "<strong>Descripción: </strong>".$elem['descripcion']."<br />";
          $mostrar .= "<strong>Categoria: </strong>".$elem['nombre_cat']."<br />";
          $mostrar .= $etiquetas."<br />";
          $mostrar .= "<strong>Creador: </strong>".$elem['nombre_usuario']."<br />";
          $mostrar .= "</td>";
          if($oLogin->activa() && ($oLogin->getRol() == 2 || $oLogin->getRol() == 3 || $oLogin->getRol() == 4) ){
            $mostrar .= "<td style='font-size:12px;'>";
            $mostrar .= "<br />";
            if(es_creador($elem['id_documento'],$oLogin) && $elem['estado'] != 1){
              $mostrar .= "<a href='#' class='modificar' data-id='".$elem['id_documento']."'>Modificar</a> <br />";
              $mostrar .= "<a href='#' class='eliminar' data-id='".$elem['id_documento']."' data-ruta='".$elem['ruta']."'>Eliminar</a><br /> ";
              $mostrar .= "Ver observaciones <br />";
            }
            if($oLogin->activa() && $oLogin->getRol() == 3 && $elem['estado'] == 0){
              $mostrar .= "<a class='actualizar_estado' data-id='".$elem['id_documento']."' href='#'>Validar</a> <br />";
              $mostrar .= "<a class='crear_observacion' data-id='".$elem['id_documento']."' href='#'>No Validar</a> <br />";
            }
            $mostrar .= "</td>";
          }
          $mostrar .= "</tr>";
        }
      }

    }
    // $mostrar.="</ul>";
    $mostrar .= "</table>";

    if($oLogin->activa()){
      if($oLogin->getRol()==2 || $oLogin->getRol()==3 || $oLogin->getRol()==4){
        echo $mostrar;


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
          $.get("Biblioteca/documento/formulariomodificar.php",{id:id},
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
            $.post("Biblioteca/documento/eliminar.php",{id:id , ruta:ruta},
            function(data){
              alert(data);
            });
          }
          //alert("eliminar "+id);
        });
        $(".actualizar_estado").click(function(){
          var id = $(this).data("id");
          var elim = confirm("¿Seguro quiere Validar?");
          if (elim == true) {
            $.post("Biblioteca/documento/validar_documento.php",{id:id,estado:1},
            function(data){
              alert(data);
            });
          }
          //alert("eliminar "+id);
        });
        $(".crear_observacion").click(function(){
          var id = $(this).data("id");
          $('#crearObservacion').modal('show');
          $('#id_documento').html("<input type='hidden' name='id_documento' id='id_docu' value='"+id+"' />");

        });

        </script>


      </body>
      </html>
      <?php
    }

  }
}
?>
