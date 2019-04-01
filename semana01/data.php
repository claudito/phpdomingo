<?php 

//comentario

try {
  
//POO
$conexion = new PDO(

"mysql:host=localhost;dbname=phpdomingo",
"root",
"",
array(

PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"

)

);

//ACTIVAR LOS MENSAJES DE ERROR A NIVEL DE TABLAS U OBJETOS DE BD
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//Consulta
$query  =  "SELECT * FROM usuario";
//Sentencia Preparada / Analisís de Código
$statement = $conexion->prepare($query);
//Ejecución
$statement->execute();
//Array de Datos
$result  = $statement->fetchAll(PDO::FETCH_ASSOC);
//Impresión
//var_dump($result);

//JSON
$json = ["data"=>$result];
echo json_encode($json);


} catch (Exception $e) {

  echo "Error: ".$e->getMessage();
  
}





 ?>