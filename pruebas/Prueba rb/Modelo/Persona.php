<?php
require "../rb.php";
class Persona{
  //CRUD ---> Create (Construct), Read, Update, Deletes

  function __construct(){
    $db = new R();
    $db->setup("mysql:host=localhost;dbname=fi","root","");
    $db->freeze(false);
  }

  /*function create($dni,$nombre,$apellido){
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
      $db->close();
    }else{
      $sale = false; //Retorna false en caso de que ya exista el dni
    }
  }
  function read($dni){
     $db = new R();
     $db->setup("mysql:host=localhost;dbname=fi","root","");
     //$db->freeze(false);
     $persona = $this->db->findOne("persona","dni=?",["$dni"]);
     return $persona;
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
      $db1 = new R();
      $db1->setup("mysql:host=localhost;dbname=fi","root","");
      $db1->freeze(false);
      $persona = $db1->findOne("persona","dni=?",["$dni"]);
      if(!empty($persona)){
        $db1->trash($persona);
      }
    }*/
    function crud($method, $args){
      //$db = R::addDatabase('DB1',"mysql:host=localhost;dbname=fi","root","",false);


      switch ($method) {
        case 'create':
            $dni = $args["dni"];
            $db = R::selectDatabase('default');
            $persona = $db->findOne("persona","dni=?",["$dni"]);
            //print_r($persona);
            if(empty($persona)){
              $persona = $db->dispense("persona");
              $persona->dni = $args["dni"];
              $persona->nombre = $args["nombre"];
              $persona->apellido = $args["apellido"];
              $db->store($persona);
              $sale=true;
            }else{
              $sale=false;
            }

            break;
        case 'read':
          $sale = false;
          if(isset($args) && isset($args["dni"])){
            $dni = $args["dni"];
            echo $dni;
            //$persona = $db->findOne("persona","dni=?",["$dni"]);
          }

          $sale = $persona;
        break;
        case 'update':
          $dni = $args["dni"];
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
            break;
          case 'delete':
          $dni = $args["dni"];
          $persona = $db->findOne("persona","dni=?",["$dni"]);
            if(!empty($persona)){
              $db1->trash($persona);
            }
          break;
        break;
        default:
          # code...
          break;
      }
      $db->close();
      return $sale;
    }


  }
    $persona = new Persona();
    $transaccion = $persona->crud('create',['dni'=>12399923,
                               'nombre'=>'Alam',
                               'apellido'=>'Brito']);
    $transaccion = $persona->crud('read',['dni'=>12399923]);
    if($transaccion){
      echo "Se realizo Correctamente";
    }else{
      echo "No se realizo la Transacción";
    }
 ?>
