<?php
/**Tengo que corroborar que el que entra en esta sección sea: usuario valido, de rol = 2 y 3 y ademas que sea el docente correspondiente*/
include_once "../../lib/PDOConfig.php";
include_once "../../lib/Login.php";
include_once "../usuario/es_creador.php";
$base = new PDOConfig();
$oLogin=new Login(); //Generamos el objeto Login
if($oLogin->activa() && $oLogin->getRol() == 2){
  if($_GET){
    /** Obtengo el id del documento y busco las observaciones de ese documento **/
    $base=new PDOConfig();
    $id_documento = $_GET['id_documento'];
    $sql= "SELECT id, descripcion,fecha, u.id_usuario as id_usuario ,u.nombre as nombre_usuario, p.id_documento as id_documento FROM observacion o
          INNER JOIN presenta p
          ON o.id = p.id_observacion
          INNER JOIN usuario u
          ON u.id_usuario = o.id_moderador
          WHERE id_documento = ".$id_documento;
    $respuesta = $base->query($sql);
    $mostrar = "";
    if(!$respuesta){
      echo "Consulta mal formulada";
    }else{
      $datos = $respuesta->fetchAll(PDO::FETCH_ASSOC);
      foreach ($datos as $observacion) {
        $mostrar .= "<h4>Observación N° ".$observacion['id']." Fecha de corrección: ".$observacion['fecha']." </h4>";
        $mostrar .= "<hr />";
        $mostrar .= "Descripición: <br />".$observacion['descripcion']."<br> <strong>Corregido por <strong>".$observacion['nombre_usuario']."<br>";
      }
      ?>
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Descripción del Observación</title>
        </head>
        <body>
          <?php echo $mostrar; ?>
          <button type="button" name="button">Mandar a Corregir</button>
          <button type="button" name="button">Volver</button>
        </body>
      </html>
      <?php
    }


  }
}
 ?>
