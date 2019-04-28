<?php 

/*
$usuario = array(

"codigo"   =>1,
"nombres"  =>"Luis Augusto",
"apellidos"=>"Claudio Ponce",
"edad"     => 29,
"profesion"=> "Programador"

);

echo json_encode($usuario);*/


switch ($_REQUEST['codigo']) {
	case 1:
	
		$usuario = array(

		"codigo"   =>1,
		"nombres"  =>"Luis Augusto",
		"apellidos"=>"Claudio Ponce",
		"edad"     => 29,
		"profesion"=> "Programador"

		);
     

		break;

	case 2:

	$usuario = array(

		"codigo"   =>2,
		"nombres"  =>"Juan",
		"apellidos"=>"Perez",
		"edad"     => 30,
		"profesion"=> "Analista"

		);


	break;

	default:
	
    	$usuario = array(

		"codigo"   =>'No existe',
		"nombres"  =>"No existe",
		"apellidos"=>"No existe",
		"edad"     =>"No existe",
		"profesion"=> "No existe"

		);



		break;
}

echo json_encode($usuario);


 ?>