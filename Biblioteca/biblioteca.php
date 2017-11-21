<?php
include_once "../lib/Login.php";

$oLogin=new Login();

?>
<div class="container">
<?php if($oLogin->activa()){?>
  <p class="intros">
    Biblioteca es una colección de los libros, documentos, videos, infografías realizadas por
    nuestros docentes, no dude en usarlos!<br><br>

  </p>

  <div class="botones" style="float:right;margin-right:1%;margin-bottom:1%;">
    <!--   <a href="pruebas/subirArchivos/index.php"><img src="img/iconos/+.png" alt="Subir Documento"></a>
  -->
  <?php
  if($oLogin->getRol()==2 || $oLogin->getRol()==3 || $oLogin->getRol()==4){

  ?>
   <ul class="nav navbar-nav navbar-right">
  <li><button type="button" class="openBtn"><img src="img/iconos/+.png" alt="Subir Documento"></button></li>
</ul>
  <?php
    }
  ?>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formSubirArchivo" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Modal with Dynamic Content</h4>
      </div>
      <div class="modal-body">

      </div>

    </div>
  </div>
</div>
<div class="show_archive">

</div>
<?php }else{
?>
<p class="intros">
    Para ver más ingrese a su cuente o registrese<br><br>

</p>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<?php } ?>

<!--<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
  -->
  
<script type="text/javascript">
$.get("Biblioteca/vista-archivos.php", function(data){
  $(".show_archive").html(data);
});
$("#vistacarga").click(function(){
  $("#modalLogin").modal();
});
$(".openBtn").on('click',function(){
  $('.modal-body').load('Biblioteca/subir-archivo.php',function(){
    $('#formSubirArchivo').modal({show:true});
  });
});
