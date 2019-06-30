<?php 

include'../autoload.php';

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
    DATE_FORMAT(dateCreate,'%d/%m/%Y %H:%i:%s') dateCreate

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
    // echo json_encode($result);

     $json = [ 

       "sEcho"=>1,
       "iTotalRecords"=>count($result),
       "iTotalDisplayRecords"=>count($result),
       "aaData"=>$result
     ];

     echo json_encode($json);



	} catch (Exception $e) {

    echo "Error: ".$e->getMessage();
		
	}

		break;

	case 2:

	$id = $_REQUEST['id'];
    
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

    $nombres   = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $dni       = $_REQUEST['dni'];
    $usuario   = $_REQUEST['usuario'];
    $password  = md5($dni);

	
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
  
    $nombres   = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $dni       = $_REQUEST['dni'];
    $usuario   = $_REQUEST['usuario'];
   // $password    =  md5("mateo");
    $id        = $_REQUEST['id'];

    
    try {
    	
    $query = "UPDATE usuario SET 
    
    nombres   =:nombres,
    apellidos =:apellidos,
    dni       =:dni,
    usuario   =:usuario
    
    WHERE id=:id";
    
    $statement = $conexion->prepare($query);

    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':dni',$dni);
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':id',$id);

    $statement->execute();

    echo json_encode( 
     
    array(

    "title" => "Buen Trabajo",
    "text"  => "Registro Actualizado",
    "type"  => "success"

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

     $id = $_REQUEST['id'];
   
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