<?php
require "../rb.php";

class Persona{
  //CRUD ---> Create (Construct), Read, Update, Deletes
  private $db;
  private $dni;
  private $nombre;
  private $apellido;

  function create($dni,$nombre,$apellido){
    $db = new R();
    $db->setup("mysql:host=localhost;dbname=fi","root","");
    $db->freeze(false);
    $persona = $db->findOne("persona","dni=?",["$dni"]);
    if(empty($persona)){
      $persona = $db->dispense("persona");
      $persona->dni = $dni;
      $this->dni = $dni;
      $persona->nombre = $nombre;
      $this->nombre = $nombre;
      $persona->apellido = $apellido;
      $this->apellido = $apellido;
      $db->store($persona);
    }else{
      $sale = false;
    }
  }
  function read($dni){
    $db = new R();
    $db->setup("mysql:host=localhost;dbname=fi","root","");
    $db->freeze(false);
    return $this->db->findOne("persona","dni=?",["$dni"]);
  }
  //UPDATE
  //Update completo;
  function update($dni,$nombre,$apellido){
    $db = new R();
    $db->setup("mysql:host=localhost;dbname=fi","root","");
    $db->freeze(false);
    $persona = $db->findOne("persona","dni=?",["$dni"]);
    $sale = false;
    if(!empty($persona)){
        $persona->dni = $dni;
        $this->dni = $dni;
        $persona->nombre = $nombre;
        $this->nombre = $nombre;
        $persona->apellido = $apellido;
        $this->apellido = $apellido;
        $db->store($persona);
        $sale = true;
      }
        return $sale;
    }

    function delete($dni){
      $db = new R();
      $db->setup("mysql:host=localhost;dbname=fi","root","");
      $db->freeze(false);
      $persona = $db->findOne("persona","dni=?",["$dni"]);
      if(!empty($persona)){
        $db->trash($persona);
      }
    }

 ?>
