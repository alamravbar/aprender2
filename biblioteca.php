

  <div class="container">
    <p class="intros">
    Biblioteca es una colección de los libros, documentos, videos, infografías realizadas por
    nuestros docentes, no dude en usarlos!<br><br>
    </p>
    <div class="botones" style="float:right;margin-right:1%;margin-bottom:1%;">
      <a href="#" data-toggle="modal" data-target="#masModal"><img src="img/iconos/+.png" alt="Subir Documento"></a>
    </div>
  </div>
    <div class="show_archive">

    </div>
    <!-- Modal -->
    <div id="masModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Archivos</h4>
          </div>
          <div class="modal-body">
            <p>Aqui viene el agregar que esta haciendo Marce.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <br>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
    $.get("biblioteca-vista-archivos.php", function(data){
      $(".show_archive").html(data);
    });
    </script>
