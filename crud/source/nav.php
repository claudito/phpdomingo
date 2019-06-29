<?php 

include'../autoload.php';

$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

$opcion   = $_REQUEST['op'];


switch ($opcion) {
	case 1:
	
     session_start();

     $datos = array(

     'id'         => $_SESSION[KEY.'id'],
     'nombres'    => $_SESSION[KEY.'nombres'],
     'apellidos'  => $_SESSION[KEY.'apellidos']


     );
     
     echo json_encode($datos);


		break;
	
	default:
		# code...
		break;
}



 ?>