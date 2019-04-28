<?php 
#Sentencias de Control

#Simple
/*
$edad = 18;
if($edad >= 18)
{
echo "Es mayor de Edad";
}
else
{
echo "No cumple la mayoria de edad";
}
*/
#Múltiple

$operacion = "retiro";

switch ($operacion) {
	case 'retiro':
	echo "retiro";
		break;
	case 'consulta':
	echo "consulta";
		break;
	case 'transferencia':
	echo "transferencia";
		break;
	default:
	echo "opción no disponible";
		break;
}



 ?>