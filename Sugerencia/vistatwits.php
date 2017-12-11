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
        $getfield = '?screen_name=shfly3424&count=20';        
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);
    $tuits=json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest());

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

        $filas = count($rawdata);
      
        for($i=0;$i<$filas;$i++){
          
            for($j=0;$j<$columnas;$j++){
                echo "<p>".$rawdata[$i][$j]."</p> ";

            }
           
        }       
       

return $tuits;


    }
    
}?>
<head>  

</head>
<body>
<br><br><br>


<div class="container">

<div class='<col-md-2></col-md-2>' ></div>

<div class='col-sm-8 pre-scrollable'  >
<div class="panel panel-primary">
      <div class="panel-heading"><h5>twitter</h5></div>
      <div class="panel-body">
<?php
$twitterObject = new Twitter();
$twitterObject->getTweets();

//$rawdata =  $twitterObject->getArrayTweets(;
//$twitterObject->displayTable($rawdata);
?>
</div>
</div>

  </div></div>
  <br>
  <div id="" class="form-group text-center">
                          <a data-pin-do="embedUser" data-pin-board-width="400" data-pin-scale-height="240" data-pin-scale-width="80" href="https://www.pinterest.com/usarioprueba/"></a>
              </div>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

              
  
  </body>
  