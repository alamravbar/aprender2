<?php
include_once "../../lib/PDOConfig.php";
?>
<html>
<?php
$base = new PDOConfig();
//id_documento 	nombre 	ruta 	extension 	descripcion 	id_categoria
$sql=" select nombre from Documento";
$mostrar = "";
$resultado=$base->query($sql);
if(!$resultado){
  echo "Resultado Inesperado en la consulta a la BD";
}else{
  $datos = $resultado->fetchAll(PDO::FETCH_NUM);
  print_r($datos);
$cant = (count($datos))-1;
  $elementos="";
  $i=0;
  foreach($datos as $elem){

      $elementos.='\"'.$elem[0].'\"';
      $i=$i+1;
    
      if($i<=$cant){
          $elementos.=",";
          
      }
  }
  echo $elementos;
  ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
      alert('<?php print_r($datos);?>');
    var availableTags = [
        '<?php $elementos;} ?>';
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
  </head>
<body>



<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 <?php ?>
</body>
</html>