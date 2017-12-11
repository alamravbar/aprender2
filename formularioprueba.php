<?php
include_once('lib/Login.php');
$oLogin=new Login();

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cambiar Clave</title>

    
  </head>
  <body>
    
    <form name="form1" id="form1" method="get" action="cambiarClave.php" onSubmit="return validarCambioClave();">
    </br></br>
    <input type="hidden" id="claveLogeo" value="<?php echo $oLogin->getPsw();?>">
     <div class="col-md-10 mb-3">
      <label for="claveActual">Clave Actual</label>
      <input type="password" class="form-control " id="claveActual" name="claveActual" placeholder="ingrese clave actual" value="" >
    </div>
    <div class="col-md-10 mb-3">
      <label for="claveNueva">Clave Nueva</label>
      <input type="password" class="form-control " id="claveNueva" name="claveNueva" placeholder="ingrese nueva clave" value="" >
    </div>
    <div class="col-md-10 mb-3">
      <label for="claveNueva1">Clave Nueva</label>
      <input type="password" class="form-control " id="claveNueva1" name="claveNueva1" placeholder="repita nueva clave" value="" >
    </div>  
    <div class="col-md-10">
     <div class="col-md-10">
          </div>
          <div class="col-md-2 col-sm-12"></br>
      <input type="submit" class="btn btn-primary"  >
      </div>
    
    </form>
    
  <script type="text/javascript">
  
    var exito=true;
  function validarCambioClave(){
    var claveActual=document.getElementById("claveActual").value;
    var claveNueva=document.getElementById("claveNueva").value;
    var claveNueva1=document.getElementById("claveNueva1").value;
    var Clave=document.getElementById("claveLogeo").value;
    
    alert("Datos erroneos");
   
    
    
    
       document.getElementById("claveActual").style.border="1px solid gray";
       document.getElementById("claveNueva").style.border="1px solid gray";
       document.getElementById("claveNueva1").style.border="1px solid gray";
    if(claveActual==""){
       document.getElementById("claveActual").style.border="2px solid pink";
       return false;
    }
    if(claveActual!=Clave){
       document.getElementById("claveActual").style.border="2px solid pink";
       return false;
    }
    
    if(claveNueva==""){
      document.getElementById("claveNueva").style.border="2px solid pink";
     return false;
    }
    if(claveNueva1==""){
      document.getElementById("claveNueva1").style.border="2px solid pink";
      return false;
    }
     if(claveNueva!=claveNueva1){
      document.getElementById("claveNueva").style.border="2px solid pink";
      document.getElementById("claveNueva1").style.border="2px solid pink";
      return false;
    }
    
      return true;
  }
 
</script>
  </body>
</html>
