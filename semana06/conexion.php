<?php 

class Conexion{

function get_conexion(){

try {
/*4 parametros:

1. 3 Partes
2. 1 parte
3. 1 parte
4. array /configuración(s): UTF8

utf8: caracteres especiales español
ñ,í,ü

*/
$conexion = new PDO(

"mysql:host=localhost;dbname=db_curso_php",
"root",
"",
array(

PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"

)

);
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

return $conexion;


} catch (Exception $e) {
	
//Recuperar el mensaje de error/excepción que nos devuelva el servidor(Apache-MySQL/MariaDB)
echo "Error :".$e->getMessage();

}






}




}

 ?>