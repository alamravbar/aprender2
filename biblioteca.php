
  <div class="botones">
    <a href="pruebas/subirArchivos/index.php"><img src="img/iconos/+.png" alt="Subir Documento"></a>
  </div>
  <div class="container">
    <p>
    Biblioteca es una colección de los libros, documentos, videos, infografías realizadas por
    nuestros docentes, no dude en usarlos!
    </p>
  </div>
    <div class="show_archive" style="overflow-y: scroll; height:400px;">

    </div>
    <br>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
    $.get("vista-archivos.php", function(data){
      $(".show_archive").html(data);
    });
    </script>
