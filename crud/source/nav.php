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


	case  2:
   
    session_start();

	$idusuario = $_SESSION[KEY.'id'];


	try {
		
    $query =  "
SELECT  

'' id,
'' id_submenu,
'' id_usuario,
'' estado,
'' submenu,
s.menu,
s.id_menu id_menu,
'MENU' tipo,
'' pagina

FROM permisos p 

INNER JOIN 
(
SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu,
s.id_menu id_menu

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id

) s ON p.id_submenu=s.id_submenu

WHERE p.id_usuario=:idusuario AND p.estado='TRUE'

GROUP BY s.menu


UNION 

SELECT  

p.id,
p.id_submenu,
p.id_usuario,
p.estado,
s.submenu,
s.menu,
s.id_menu id_menu,
'SUBMENU' tipo,
s.pagina pagina

FROM permisos p 

INNER JOIN 
(
SELECT 

s.id id_submenu,
s.nombre submenu,
m.nombre menu,
s.id_menu id_menu,
s.pagina pagina

FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id

) s ON p.id_submenu=s.id_submenu

WHERE p.id_usuario=:idusuario AND p.estado='TRUE'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':idusuario',$idusuario);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($result);
 

	} catch (Exception $e) {

	echo "Error: ".$e->getMessage();
		
	}





	break;
	
	default:
		# code...
		break;
}



 ?>