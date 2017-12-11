<?php
  function es_creador($id_documento,$oLogin){
    $base = new PDOConfig();
    $nombre_usuario = $oLogin->getNombreUsuario();
    $sqlUsuario = "SELECT `id_usuario`, `nombre` FROM `usuario` WHERE nombre = '".$nombre_usuario."'";
    //echo $sqlUsuario;
    $res=$base->query($sqlUsuario);
    if(!$res){
      echo "Consulta mal formulada en Select usuario";
    }else{
        $dato = $res->fetch(PDO::FETCH_ASSOC);
        $id_docente = $dato['id_usuario'];
        $sqlCarga = "SELECT `id_docente`, `id_documento`, `fecha_creacion` FROM `carga` WHERE id_documento = ".$id_documento." AND id_docente= ".$id_docente.";";
        //echo $sqlCarga;
        $res=$base->query($sqlCarga);
        if(!$res){
          echo "Consulta mal formulada en select usuario";
        }else{
          $dato = $res->rowCount(PDO::FETCH_ASSOC);
          //echo "<br> DATO : ";echo $dato;echo "<br>";
          if($dato>0){
            return 1;
          }else{
            return 0;
          }
        }
    }
  }
 ?>
