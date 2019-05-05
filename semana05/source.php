<?php 

/*
- incluimos el archivo de conexion a la bd
- Creamos un objeto de conexion a la BD

*/
include'conexion.php';

$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$opcion   = $_REQUEST['op'];

switch ($opcion) {
	case 1:
	
	try {
		
	 $query =  "
	 SELECT 

     id,
     nombres,
     apellidos,
     dni,
     usuario,
     password,
     dateCreate

     FROM usuario";
     
     //sentencia preparada
     $statement = $conexion->prepare($query);
     //ejecución de código
     $statement->execute();
     
     //Creamos un array de datos
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
     
     //Impresión del Array
     //var_dump($result);

     //JSON
     echo json_encode($result);


	} catch (Exception $e) {

    echo "Error: ".$e->getMessage();
		
	}

		break;

	case 2:

	$id = 2;
    
    try {

    $query =  "
     
    SELECT 

    id,
    nombres,
    apellidos,
    dni,
    usuario,
    password,
    dateCreate FROM usuario WHERE id=:id";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);


    	
    } catch (Exception $e) {

    echo "Error: ".$e->getMessage();
    	
    }

	break;

	case 3:

    $nombres   = "MARIELA";
    $apellidos = "JUAREZ";
    $dni       = "44557799";
    $usuario   = "mariela.juarez";
    $password  = md5("mariela");

	
	try {
		
	$query =  "
	INSERT INTO usuario
	(nombres,apellidos,dni,usuario,password)
	VALUES
	(:nombres,:apellidos,:dni,:usuario,:password)";

	$statement = $conexion->prepare($query);

	$statement->bindParam(':nombres',$nombres);
	$statement->bindParam(':apellidos',$apellidos);
	$statement->bindParam(':dni',$dni);
	$statement->bindParam(':usuario',$usuario);
	$statement->bindParam(':password',$password);

	$statement->execute();

    echo json_encode(
    
    array(
    
    "title" => "Buen Trabajo",
    "text"  => "Registro Agregado",
    "type"  => "success"

    )
 
    );


	} catch (Exception $e) {
		
    //echo "Error: ".$e->getMessage();
    
    echo json_encode(
    
    array(

    "title"=>"Error",
    "text"=>$e->getMessage(),
    "type"=>"error"

    )
 

    );



	}

		break;

	case 4:
  
    $nombres     = "MATEO";
    $apellidos   = "ROJA";
    $dni         = "77889900";
    $usuario     = "mateo.rojas";
    $password    =  md5("mateo");
    $id          =  5;

    
    try {
    	
    $query = "UPDATE usuario SET 
    
    nombres   =:nombres,
    apellidos =:apellidos,
    dni       =:dni,
    usuario   =:usuario,
    password  =:password
    
    WHERE id=:id";
    
    $statement = $conexion->prepare($query);

    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':dni',$dni);
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':password',$password);
    $statement->bindParam(':id',$id);

    $statement->execute();

    echo json_encode( 
     
    array(

    "title" => "Buen Trabajo",
    "text"  => "Registro Actualizado",
    "type"  => "succcess"

    )

    );
 

    } catch (Exception $e) {
   
     
    echo json_encode(
    
    array(
 
    "title"=>"Error",
    "text" =>$e->getMessage(),
    "type" =>"error"
    )
 
    );


    }
   
		break;

    case 5:

     $id = 3;
   
     try {

     $query  =  "DELETE FROM usuario WHERE id=:id";

     $statement = $conexion->prepare($query);

     $statement->bindParam(':id',$id);

     $statement->execute();

     echo  json_encode(
     
     array(
     
     "title" => "Buen Trabajo",
     "text"  => "Registro Eliminado",
     "type"  => "success"
 
     )

     );

     	
     } catch (Exception $e) {

     
     echo json_encode(
 
     array(
     
     "title"=>"Error",
     "text" => $e->getMessage(),
     "type" => "error"
 
     ) 
    
     );


     	
     }

		break;
	
	default:
	
	echo "opción no disponible";
		break;
}



 ?>