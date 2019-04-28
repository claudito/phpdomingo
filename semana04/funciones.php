<?php 


#fechas y horas
#https://www.php.net/manual/es/datetime.formats.date.php
#https://www.php.net/manual/es/timezones.php
//date_default_timezone_set("America/Lima");
//echo date_default_timezone_get();
//echo date('d/m/Y H:i:s');

/*
$fecha =  "28-04-2019";

$fecha =  date_format(

date_create($fecha),
'Y-m-d'

);

echo $fecha;*/

$fecha =  "28-04-2019";

//$year  =  substr($fecha,6);
//$month =  substr($fecha,3,2);
//$day   =  substr($fecha,0,2);

$fecha =  explode("-", $fecha);

$year  =  $fecha[2];
$month =  $fecha[1];
$day   =  $fecha[0];



 ?>