<?php

require_once('TwitterAPIExchange.php');

class Twitter{
    function getTweets(){
$settings = array(
    'oauth_access_token' => "930263305603702784-e3kqTeBtGTufqWHEWFjA6wG6aPYRMF6",
    'oauth_access_token_secret' => "ZUPIvpRSSAAQ6DdGZXg0rgpbwKlDWw2Cro4AttXbQrFxM",
    'consumer_key' => "HxAMCdVNSv1q30s9Xiq4kQ2HQ",
    'consumer_secret' => "y4aIHluMtJdd9gOw7ilvmwc4UoyyUmfVB6jDZECM4tcSbV7Hex"
);   



        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=shfly3424&count=10';        
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);

         $tuits=json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest());
//print_r($tuits);
$num_items=count($tuits);
for($i=0; $i<$num_items; $i++){

            $user = $tuits[$i];
            $fecha = $user->created_at;
            $url_imagen = $user->user->profile_image_url;
            $screen_name = $user->user->screen_name;
            $tweet = $user->text;
              $imagen = "<a href='https://twitter.com/".$screen_name."' target=_blank><img src=".$url_imagen."></img></a>";
            $name = "<a href='https://twitter.com/".$screen_name."' target=_blank>@".$screen_name."</a>";

            $rawdata[$i][0]=$fecha."<br>";
            $rawdata[$i]["FECHA"]=$fecha."<br>";
            $rawdata[$i][1]=$imagen."<br>";
             $rawdata[$i]["imagen"]=$imagen."<br>";
             $rawdata[$i][2]=$name."<br>";
             $rawdata[$i]["screen_name"]=$name."<br>";
              $rawdata[$i][3]=$tweet."<br>";
             $rawdata[$i]["tweet"]=$tweet."<br>";


}
   $columnas = count($rawdata[0])/2;
        //echo $columnas;
        $filas = count($rawdata);
        //echo "<br>".$filas."<br>";
        //Añadimos los titulos

       
        for($i=0;$i<$filas;$i++){
          
            for($j=0;$j<$columnas;$j++){
                "<p>".$rawdata[$i][$j]."</p> ";

            }
           
        }       
       




    }
    
}

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Sugerencias</title>
  </head>
  <body>
          <div class="container">
              <div id="" class="form-group text-center">
                 <a data-pin-do="embedUser" data-pin-lang="es" data-pin-board-width="400" data-pin-scale-height="300" data-pin-scale-width="300" href="https://ar.pinterest.com/usarioprueba/"></a>          
              </div>
          
              <div id="" class="form-group text-center"  style='background-color:lavender;' data-pin-board-width="100" data-pin-scale-height="100">
               <?php
               
                   $twitterObject = new Twitter();
                    $twitterObject->getTweets(); 
                   
               ?>
              </div>
          </div>







<div id="contenido_a_mostrar">
<p>Este contenido tiene que mostrarse con el link</p>
  <a data-pin-do="embedBoard" data-pin-lang="es" data-pin-board-width="400" data-pin-scale-height="300" data-pin-scale-width="300" href="https://ar.pinterest.com/usarioprueba/ingles/pin"></a>


</div>
<script language="JavaScript">
function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
 $('#contenido').load('vistatwits.php');
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}
</script>
    <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
    
  </body>
</html>



 

