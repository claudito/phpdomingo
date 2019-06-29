<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Acceso</title>

 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

 <!-- Jquery -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
 <!-- Bootstrap JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>

 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Sweet Alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


</head>
<body>
	
<div class="container-fluid">
	
<div class="row">

<div class="col-md-4"></div>
	
<div class="col-md-4">
	
<form id="login" autocomplete="off">

<div class="card">
	
<div class="card-header text-center">
Inicio de Sesión
</div>

<div class="card-body">
	
<div class="form-group">
<label >Usuario</label>
<input type="text" name="user" class="form-control" required>
</div>

<div class="form-group">
<label >Contraseña</label>
<input type="password" name="pass" class="form-control" required>
</div>


<button class="btn btn-primary btn-block">Ingresar</button>


</div>

<div class="card-footer text-center">

Perutec Academy 2019

</div>


</div>

</form>

</div>



</div>

</div>

<script>
	
$(document).on('submit','#login',function(e){

parametros  = $(this).serialize();

$.ajax({

url:"source/acceso.php?op=1",
type:"POST",
data:parametros,
dataType:"JSON",
beforeSend:function(){

swal({

title:"Cargando...",
text:"No Cierre la ventana",
imageUrl:"img/loader2.gif",
showConfirmButton:false

});


},
success:function(data){

//Mensaje Sweet Alert
swal({

title : data.title,
text  : data.text,
type  : data.type,
showConfirmButton:false,
timer : 2000


});

//Refrescar la página si las credenciales son correctas
if(data.type=='success')
{

setTimeout(function (){

window.location.href='';


},2000);


}





}


});




e.preventDefault();
});


</script>
</body>
</html>