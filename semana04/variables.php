<?php 

//Variables
# Variables
/*
Variables 
PHP 7
*/

/*
DECIMAL,DOUBLE,NUMERIC => 00.00
float 
*/

$nombres = "Luis Augusto";
$edad    = 29;
$talla   = 1.62;
$estado  = false;
$fecha   = "2019-04-28";
$hora    = "09:40";

//echo  $estado;
//var_dump($hora);

/*Variables Array
- array simple
- array asociativo
*/

#array Simple
$colores = array("Azul","Verde","Amarillo");

#array asociativo
$usuario = array(

"codigo"   => 1,
"nombres"  => "Luis Augusto",
"apellidos"=> "Claudio Ponce"

);

//var_dump($colores);

//Imprimir un array
foreach ($colores as $key => $value) {
	
 echo $key.": ".$value."<br>";

}

echo "<br>";

foreach ($usuario as $key => $value) {
	
 echo $key.": ".$value."<br>";

}




 ?>