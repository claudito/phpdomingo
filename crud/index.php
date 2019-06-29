<?php 

include'autoload.php';
session_start();

if(isset($_SESSION[KEY.'id']))
{
 include'templates/home.php';
}
else
{
include'templates/acceso.php';
}




 ?>