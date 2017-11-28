<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Sugerencias</title>
  </head>
  <body>
    <!--<img src="img/web-en-construccion.jpg" alt="Web en Contrucción" width="100%">-->
          <div class="container">

    
            <div class="col-lg-4" >
      
              <div class="row" style="height: 100px !important;">
                <div class="col-xs-12 ">
                  <div id="albumpin" class="form-group text-center">
                 
                  </div>
                </div>
              </div>

       
            </div>
          </div>

          
        <!--<button class="btn btn-success" type="button" onload="getpinterest()"><span class="glyphicon glyphicon-search"></span>&nbsp;Buscar</button>-->
               
 <!--<a data-pin-do="embedUser" data-pin-lang="es" data-pin-board-width="320" data-pin-scale-height="256" data-pin-scale-width="200" href="https://ar.pinterest.com/usarioprueba/ingles/pin"></a>-->
                  <a data-pin-do="embedUser" data-pin-lang="es" data-pin-board-width="400" data-pin-scale-height="300" data-pin-scale-width="300" href="https://ar.pinterest.com/usarioprueba/"></a>

              
          
       

	
            
 

    <script async defer src="//assets.pinterest.com/js/pinit.js"></script>

  </body>
</html>

<script type="text/javascript">

 


  function getpinterest()
  {
    var boardid='ingles';

    $.ajax({
        type: "GET",
         url: "https://api.pinterest.com/v1/boards/usarioprueba/"+boardid+"/?access_token=Admj8Y06v4avchJeXCpev8eppIibFPsfQ_cdbRpEgZ25vaA6WwAAAAA&fields=image%2Curl",
        // url: "https://api.pinterest.com/v1/boards/usarioprueba/"+boardid+"/?access_token=ASm5QVooKw2B4bLVWW6-PB9u1-HpFPsgLg6oUH1EgZ25vaA6WwAAAAA&fields=image%2Clink%2Cnote%2Curl%2Cboard%2Cimage%2Cmedia%2Cmetadata",
        dataType: 'json',
        success: function (data) {
          console.log(data);
          var img = "<a href='"+data.data.url+"' target='_blank'><img src='"+data.data.image["60x60"].url+"'/></a>";
          $('#albumpin').html(img);
          console.log(data.data.url);
        },
          error: function(){
            //Error Handling for our request
            alert("Fallo el acceso a pinterest.");
            $('#albumpin').html("");
         }
      });
  }

//PINTEREST
//TOKEN: AdnJo9mtFYlp2b0xlfm0TahI2PLqFOz9Q4utIm5EY_6xoiAq8AAAAAA
// APP ID = 4928056715842175355
//ingles

   

</script>

