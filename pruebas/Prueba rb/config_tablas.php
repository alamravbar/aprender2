<?php
require "rb.php";
$db = new R();
$db->setup("mysql:host=localhost;dbname=fi","root","");
$db->freeze(false);

//Creo y agrego la tabla "rol": (id,nombre) => id es automático
$rol1 = $db->dispense("rol");
$rol1->nombre = "administrador";
$db->store($rol1);
$rol2 = $db->dispense("rol");
$rol2->nombre = "moderador";
$db->store($rol2);
$rol3 = $db->dispense("rol");
$rol3->nombre = "docente";
$db->store($rol3);
$rol4 = $db->dispense("rol");
$rol4->nombre = "alumno";
$db->store($rol4);


//Creo y agrego la tabla "persona": (id,dni,nombre,apellido) => id es automático
//Persona administrador
$persona = $db->dispense("persona");
$persona->dni = "12345678";
$persona->nombre = "administrador";
$persona->apellido = "aprender";
$db->store($persona);

//Persona docente
$persona_doc = $db->dispense("persona");
$persona_doc->dni = "87654321";
$persona_doc->nombre = "docente";
$persona_doc->apellido = "aprender";
$db->store($persona_doc);

//Persona alumno
$persona_alum = $db->dispense("persona");
$persona_alum->dni = "01234567";
$persona_alum->nombre = "alumno";
$persona_alum->apellido = "aprender";
$db->store($persona_alum);

//Creo y agrego la tabla "usuario": (id,mail,nombre,password,id_rol,id_persona) => id es automático
//Tener en cuenta que id_rol e id_persona se va a hacer de la siguiente forma
//$usuario->rol = $rol1; ->porque rol1 corresponde a administrador
//$usuario->persona = $persona;
//Usuario Administrador
$usuario = $db->dispense("usuario");
$usuario->mail = "administrador@aprender.com.ar";
$usuario->nombre = "administrador";
$usuario->password = "1234";
$usuario->rol = $rol1;
$usuario->persona = $persona;
$db->store($usuario);

//Usuario Docente
$usuario_doc = $db->dispense("usuario");
$usuario_doc->mail = "docente@aprender.com.ar";
$usuario_doc->nombre = "docente";
$usuario_doc->password = "1234";
$usuario_doc->rol = $rol3;
$usuario->persona = $persona_doc;
$db->store($usuario_doc);

//Usuario Alumno
$usuario_alum = $db->dispense("usuario");
$usuario_alum->mail = "alumno@aprender.com.ar";
$usuario_alum->nombre = "alumno";
$usuario_alum->password = "1234";
$usuario_alum->rol = $rol4;
$usuario->persona = $persona_alum;
$db->store($usuario_alum);


//Creo y agrego la tabla "docente": (id,cuil,id_persona) => id es automático
//$docente->persona = $persona;
$docente = $db->dispense("docente");
$docente->cuil ="20123456783";
$docente->persona = $persona_doc;
$db->store($docente);

//Creo y agrego la tabla "Alumno": (id,id_persona) => id es automático
//Tener en cuenta que id_persona se va a hacer de la siguiente forma
//$alumno->persona = $persona;
$alumno = $db->dispense("alumno");
$alumno->persona = $persona_alum;
$db->store($alumno);


//Creo y agrego la tabla "titulo": (id,nombre,descripcion) => id es automático
$titulo = $db->dispense("titulo");
$titulo->nombre = "Profesor de Quimica";
$titulo->descripcion = "Profesor con orientación en Quimica Orgánica e Inorgánica, capacitado para trabajar en nivel primario y secundario, con grandes conocimientos en física de los componentes.";
$db->store($titulo);

//Creo y agrego la tabla "obtuvo": (id,id_titulo, id_docente, anio_obtencion) => id es automático
//Tener en cuenta que id_titulo e id_docente se va a hacer de la siguiente forma
//$obtuvo->titulo = $titulo;
//$obtuvo->docente = $docente;
$obtuvo = $db->dispense("obtuvo");
$obtuvo->titulo = $titulo;
$obtuvo->docente = $docente;
$obtuvo->anio_obtencion = '2014';
$db->store($obtuvo);

//Creo y agrego la tabla "nivel": (id,nombre,descripcion) => id es automático
//Nivel = Primario
$nivel_prim = $db->dispense("nivel");
$nivel_prim->nombre = "primario";
$nivel_prim->descripcion = "Asignaturas con nivel primario";
$db->store($nivel_prim);

//Nivel = Secundario
$nivel_sec = $db->dispense("nivel");
$nivel_sec->nombre = "secundario";
$nivel_sec->descripcion = "Asignaturas con nivel secundario";
$db->store($nivel_sec);

//Nivel = Terciario
$nivel_terc = $db->dispense("nivel");
$nivel_terc->nombre = "terciario";
$nivel_terc->descripcion = "Asignaturas con nivel terciario";
$db->store($nivel_terc);

//Creo y agrego la tabla "asignatura": (id,nombre,descripcion,id_nivel) => id es automático
//Tener en cuenta que id_nivel se va a hacer de la siguiente forma
//$asignatura->nivel = $nivel_primario;
$asignatura = $db->dispense("asignatura");
$asignatura->nombre = "Química de 1ero a 3er Año";
$asignatura->descripcion = "En esta asignatura se ven sumas restas multiplicación con numeros del 0 al 1000, etc.";
$asignatura->nivel = $nivel_sec;
$db->store($asignatura);

//Creo y agrego la tabla "curso": (id,nombre,link,id_asignatura) => id es automático
//Tener en cuenta que id_asignatura se va a hacer de la siguiente forma
//$curso->asignatura = $asignatura;
$curso = $db->dispense("curso");
$curso->nombre = "Química de 1ero a 3er Año - Modulo I ";
$curso->link = "http://localhost/aprender2/";
$curso->asignatura = $asignatura;
$db->store($curso);

//Creo y agrego la tabla "Categoria": (id,nombre) => id es automático
$categoria = $db->dispense("categoria");
$categoria->nombre = "Fisica";
$db->store($categoria);

//Creo y agrego la tabla "Etiqueta": (id,nombre) => id es automático
$etiqueta = $db->dispense("etiqueta");
$etiqueta->nombre = "LHC";
$db->store($etiqueta);

//Creo y agrego la tabla "Documento": (id,nombre,ruta,extension,descripcion,id_categoria) => id es automático
//Tener en cuenta que id_categoria se va a hacer de la siguiente forma
//$documento->categoria = $categoria;
$documento = $db->dispense("documento");
$documento->nombre = "LHC Colisionador de Adrones.pdf";
$documento->ruta = "http://localhost.aprender2/";
$documento->extension = "pdf";
$documento->descripcion = "El Gran Colisionador de Hadrones, GCH (en inglés Large Hadron Collider, LHC) es un acelerador y colisionador de partículas ubicado en la Organización Europea para la Investigación Nuclear (CERN, sigla que corresponde a su antiguo nombre en francés: Conseil Européen pour la Recherche Nucléaire), cerca de Ginebra, en la frontera franco-suiza. Fue diseñado para colisionar haces de hadrones, más exactamente de protones, de hasta 7 TeV de energía, siendo su propósito principal examinar la validez y límites del Modelo Estándar, el cual es actualmente el marco teórico de la física de partículas, del que se conoce su ruptura a niveles de energía altos.";
$documento->categoria = $categoria;
$db->store($documento);

//Creo y agrego la tabla "Contiene": (id,id_documento,id_etiqueta) => id es automático
//Tener en cuenta que id_documento se va a hacer de la siguiente forma
//$contiene->documento = $documento;
//$contiene->etiqueta = $etiqueta;
$contiene = $db->dispense("contiene");
$contiene->documento = $documento;
$contiene->etiqueta = $etiqueta;
$db->store($contiene);

//Creo y agrego la tabla "Carga": (id,id_docente_persona,id_documento, fecha_creacion) => id es automático
//Tener en cuenta que id_documento e id_docente se va a hacer de la siguiente forma
//$carga->docente = $docente;
//$carga->documento = $documento;
$carga = $db->dispense("carga");
$carga->docente = $docente;
$carga->documento = $documento;
$carga->fecha_creacion = "2017-10-8";
$db->store($carga);

//Creo y agrego la tabla "Dicta": (id,id_docente_persona,id_curso) => id es automático
//Tener en cuenta que id_docente e id_curso se va a hacer de la siguiente forma
//$dicta->docente = $docente;
//$dicta->curso = $curso;
$dicta = $db->dispense("dicta");
$dicta->docente = $docente;
$dicta->curso = $curso;
$db->store($dicta);

//Creo y agrego la tabla "Participa": (id,id_alumno,id_curso,fecha_inicio,fecha_fin) => id es automático
//Tener en cuenta que id_alumno e id_curso se va a hacer de la siguiente forma
//$participa->alumno = $alumno;
//$participa->curso = $curso;
$participa = $db->dispense("participa");
$participa->alumno = $alumno;
$participa->curso = $curso;
$db->store($participa);




 ?>
