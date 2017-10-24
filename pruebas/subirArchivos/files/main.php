<?php 
include_once 'transacciones/Abmmaquina.php';
include_once 'transacciones/Abmarcade.php';
include_once 'transacciones/Abmkiddies.php';
include_once 'transacciones/AbmMaquinaTieneReparacion.php';
include_once 'transacciones/Abmreparacion.php';
include_once 'transacciones/Abmrepuesto.php';
function main(){
	
	$maq=new Abmmaquina();
	$arca=new Abmarcade();
	$kiddie=new Abmkiddies();
	$registro=new AbmMaquinaTieneReparacion();
	$reparacion=new Abmreparacion();
	$repuestos=new Abmrepuesto();

	$opcion=3;
do {
	$opcion=menu();
		switch ($opcion) {
			case 1 :
				echo "ingrese id de maquina que desea ingresar";
				$id = trim ( fgets ( STDIN ) );
				echo "ingrese nombre de maquina";
				$nom = trim ( fgets ( STDIN ) );
				echo "ingrese descripcion";
				$desc = trim ( fgets ( STDIN ) );
				echo $arca->ingresarArcade ( $id, $nom, $desc );
				break;
			case 2:
				
				echo "ingrese id de arcade que quiere eliminar";
				$id=trim(fgets(STDIN));
				echo $arca->eliminarArcade($id);
				
				break;
			case 3:
				echo "ingrese id de maquina que desea modificar";
				$id=trim(fgets(STDIN));
				echo "ingrese nueva descripcion";
				$desc=trim(fgets(STDIN));
				echo $arca->modificarArcade($id, $desc);
				break;
			case 4:
				$arca->listar();
				break;
			case 5:
				echo "ingrese id de maquina a ingresar";
				$id=trim(fgets(STDIN));
				echo "ingrese nombre de maquina";
				$nom=trim(fgets(STDIN));
				echo "ingrese cantidad de luces";
				$cant=trim(fgets(STDIN));
				echo $kiddie->ingresarKiddie($id, $nom, $cant);
				break;
			case 6:
				echo "ingrese id de maquina a eliminar";
				$id=trim(fgets(STDIN));
				echo $kiddie->eliminarKiddie($id);
				break;
			case 7:
				echo "ingrese id de kiddie";
				$id=trim(fgets(STDIN));
				echo "ingrese nueva cantidad de luces";
				$cant=trim(fgets(STDIN));
				echo $kiddie->modificarKiddie($id, $cant);
				break;
			case 8:
				$kiddie->listar();
				break;
			case 9:
				$maq->listar();
				break;
			case 10:
				echo "ingrese id de maquina";
				$id=trim(fgets(STDIN));
				echo "ingrese nombre de maquina";
				$nom=trim(fgets(STDIN));
				echo $maq->modificarKiddie($id, $nom);
				break;
			case 11:
				echo "ingrese id de la maquina que quiere eliminar";
				$id=trim(fgets(STDIN));
				echo $maq->eliminarMaquina($id);
				break;
			case 12 :
				echo "ingrese id de maquina reparada";
				$id = trim ( fgets ( STDIN ) );
				echo "ingrese id de reparacion";
				$idrep = trim ( fgets ( STDIN ) );
				echo "ingrese dia de reparacion";
				$dd = trim ( fgets ( STDIN ) );
				echo "ingrese mes";
				$mm = trim ( fgets ( STDIN ) );
				echo "ingrese año";
				$aaaa = trim ( fgets ( STDIN ) );
				$fecha = "" . $aaaa . "-" . $mm . "-" . $dd . "";
				echo $registro->registrarReparacion ( $id, $fecha, $idrep );
				break;
			case 13:
				echo "ingrese id de reparacion";
				$idrep=trim(fgets(STDIN));
				echo "ingrese motivo de reparacion";
				$motivo=trim(fgets(STDIN));
				$reparacion->ingresarMotivo($idrep, $motivo);				
				break;
			case 14:
				echo "ingrese id de repuesto";
				$idrepuesto=trim(fgets(STDIN));
				echo "ingrese nombre de repuesto";
				$nombreRepuesto=trim(fgets(STDIN));
				echo "ingrese id de reparacion";
				$idrep=trim(fgets(STDIN));
				echo $repuestos->ingresarRepuesto($idrepuesto, $nombreRepuesto,$idrep);
				break;
			case 15:
				$reparacion->listar();
				break;
			case 16:
				$repuestos->listar();
				break;
			case 17:
				$registro->listar();
				break;
			
				
		}
	} while ( $opcion != 0 );
}main();
function menu(){
	echo "\n------------Arcade-----------------";
	echo "\n 1 - ingresar arcade";
	echo "\n 2 - eliminar arcade";
	echo "\n 3 - modificar arcade";
	echo "\n 4 - listar maquinas arcade";
	echo "\n------------Kiddie-----------------";
	echo "\n 5 - ingresar kiddie";
	echo "\n 6 - eliminar kiddie";
	echo "\n 7 - modificar kiddie";
	echo "\n 8 - listar maquinas kiddie";
	
	
	echo "\n------------Maquinas-----------------";
	echo "\n 9 - Listar todas las maquinas";
	echo "\n 10 - modificar una maquina";
	echo "\n 11 - eliminar maquina";
	
	echo "\n------------Reparacion-----------------";
	echo "\n 12 - Registrar reparacion de una maquina";
	echo "\n 13 - Ingresar motivo de reparacion";
	echo "\n 14 - Ingresar repuesto";
	echo "\n 15 - Listar reparaciones realizadas";
	echo "\n 16 - Listar repuestos";
	echo "\n 17 - Listar las reparaciones que tuvieron las maquinas";
	echo "\n 0 - Para Salir\n";
	
	$opcion=trim(fgets(STDIN));
	return $opcion;
}

?>