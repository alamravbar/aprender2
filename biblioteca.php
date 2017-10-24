
  
  <div class="container">
    <p>
    Biblioteca es una colección de los libros, documentos, videos, infografías realizadas por
    nuestros docentes, no dude en usarlos!<br><br>
    </p>
    <div class="botones" style="float:right;margin-right:1%;margin-bottom:1%;">
      <a href="pruebas/subirArchivos/index.php"><img src="img/iconos/+.png" alt="Subir Documento"></a>
    </div>
  </div>
    <div class="show_archive">

    </div>
    <br>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
    $.get("biblioteca-vista-archivos.php", function(data){
      $(".show_archive").html(data);
    });
    </script>
