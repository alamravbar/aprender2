<?php
include_once "vistatwits.php";
$t=new Twitter();

?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <div id="" class="form-group text-center">
                 <a data-pin-do="embedUser" data-pin-lang="es" data-pin-board-width="400" data-pin-scale-height="300" data-pin-scale-width="300" href="https://ar.pinterest.com/usarioprueba/"></a>          
              </div>
   
    <div id="" class="form-group text-center">
               <?php echo $t->getTweets();?>
              </div>
          


</body>
</html>