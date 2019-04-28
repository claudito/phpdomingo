
<?php 

/*
SQL
1 lista de compras
2 lista de ventas
3 lista de ingresos/salidas
*/

$query =  array (

'compras'  => "SELECT * FROM compras",
'ventas'   => "SELECT * FROM ventas",
'ingresos' => "SELECT * FROM ingresos"

);

echo $query['ingresos'];





 ?>