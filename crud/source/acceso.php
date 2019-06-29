<?php 

include'../autoload.php';

$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

$opcion   = $_REQUEST['op'];

switch ($opcion) {
	case 1:

 $user  =  trim($_REQUEST['user']);
 $pass  =  trim($_REQUEST['pass']);
 $pass  =  md5($pass);

try {

$query  =  "SELECT 

id,
UPPER(nombres)nombres,
UPPER(apellidos)apellidos,
dni,
usuario,
password,
dateCreate  FROM usuario WHERE 
   
usuario=:user AND password=:pass";

$statement = $conexion->prepare($query);
$statement->bindParam(':user',$user);
$statement->bindParam(':pass',$pass);
$statement->execute();

$result    = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0)
{

//Crear variables de Sesión

session_start();

$_SESSION[KEY.'id']        = $result[0]['id'];
$_SESSION[KEY.'nombres']   = $result[0]['nombres'];
$_SESSION[KEY.'apellidos'] = $result[0]['apellidos'];
$_SESSION[KEY.'usuario']   = $result[0]['usuario'];

echo json_encode(

array(

'title'=>'Bienvenido',
'text' =>$result[0]['nombres'].' '.$result[0]['apellidos'],
'type' =>'success'

)

);


}
else
{

echo json_encode(

array(

'title'=>'Usuario o Contraseña Incorrectos',
'text' =>'Intente de nuevo',
'type' =>'warning'

)

);



}




} catch (Exception $e) {
	
echo json_encode(

array(

'title'=>'Error',
'text' =>$e->getMessage(),
'type' =>'error'

)

);



}


		break;
	
case  2:

try {
	
session_start();

$mensaje =  $_SESSION[KEY.'nombres'].' '.$_SESSION[KEY.'apellidos'];

unset($_SESSION[KEY.'id']);        
unset($_SESSION[KEY.'nombres']);   
unset($_SESSION[KEY.'apellidos']); 
unset($_SESSION[KEY.'usuario']);   

echo json_encode(

array(

'title'=>'Adios',
'text' =>$mensaje,
'type' =>'success'

)

);




} catch (Exception $e) {

echo json_encode(

array(

'title'=>'Error',
'text' =>$e->getMessage(),
'type' =>'error'

)

);


	
}

break;


	default:
		# code...
		break;
}




 ?>