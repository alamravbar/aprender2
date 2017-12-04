
<html>
<head>

<title>Muestra oculta</title>

<script language="JavaScript">

function muestra_oculta(id){
if (document.getElementById){ //se obtiene el id
var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
}
 
}
window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
}
</script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
</head>

<body>

<!--Al hace llamado a la función solo tienes que idicar el nombre del DIV entre parentesis -->
<p><a style='cursor: pointer;' onclick="muestra_oculta('contenido_a_mostrar')" title="">Mostrar / Ocultar</a></p>

<div id="contenido_a_mostrar">
<p>Este contenido tiene que mostrarse con el link</p>
  <a data-pin-do="embedBoard" data-pin-lang="es" data-pin-board-width="400" data-pin-scale-height="300" data-pin-scale-width="300" href="https://ar.pinterest.com/usarioprueba/ingles/pin"></a>

</div>

</body>
</html>