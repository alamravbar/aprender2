<?php


require "rb.php";
$db = new R();
$db->setup("mysql:host=localhost;dbname=fi","root","");
$db->freeze(false);
$db->nuke();

 // $perfil = $db->dispense("perfil");
 // $perfil->nombre ="";
 // $perfil->contrasenia="";
// // $agenda = $db->dispense("agenda");
// //
// //
// // $agenda->numero = 5554449990;
// // $agenda->correo = "daniel@lastdragon.net";
// // $agenda->nacimiento = "1995-06-10";
// // $agenda->perfil = $perfil;
// //
// $db->store($perfil);
// $fields = R::inspect( 'perfil' );
// print_r($fields);
//$perfil->anio_nac = '2017-10-10';
//$db->store($perfil);
//
// $agenda = $db->load("agenda",1);
//
// $perfil = $db->load("perfil",3);
// $perfil->contrasenia = "12345";
// //$db->trash($perfil);
//
// echo $perfil->nombre."<br>";
// echo $agenda->numero."<br>";
// $perfil = $db->findAll("perfil");
// foreach ($perfil as $perfilcito ) {
//   echo $perfilcito->nombre."<br>";
// }
 ?>
