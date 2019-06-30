<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Bienvenidos</title>

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
	
<!-- nav -->
<div class="row">
	
<div class="col-md-12">
<div id="nav"></div>
</div>
</div>

<!-- Contenido -->
<div class="row">
<div class="col-md-12">

<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="#" >Inicio</a>
</li>
<li class="breadcrumb-item breadcrumb-item-menu">
Home
</li>
<li class="breadcrumb-item active breadcrumb-item-submenu" >
...
</li>
</ol>
</nav>

	
<div id="contenido"></div>

</div>
</div>



</div>

<script>

//Cargar Nav
$(document).ready(function (){

$.get('templates/nav.php',{},function(nav){

$('#nav').html(nav);

});

});

//Cargar Página
$(document).on('click','.dropdown-pagina',function(){

 menu    = $(this).data('menu');
 submenu = $(this).data('submenu');
 pagina  = $(this).data('pagina');

 $.ajax({
 
  url:"pages/"+pagina+".php",
  type:"GET",
  data:{},
  beforeSend:function(){

	swal({

	title:"Cargando...",
	text:"No Cierre la ventana",
	imageUrl:"img/loader2.gif",
	showConfirmButton:false

	});


  },
  success:function(data){

  $('#contenido').html(data);

  $('.breadcrumb-item-menu').html(menu);
  $('.breadcrumb-item-submenu').html(submenu);

  swal({
  
  title:"Buen Trabajo",
  text :"Página Cargada",
  type:"success",
  timer:2000,
  showConfirmButton:false

  });



  },
  error:function(xhr,status,error)
  {

   swal({
  
  title:error,
  text :"...",
  type:"warning",
  timer:2000,
  showConfirmButton:false

  }); 
  
  $('.breadcrumb-item-menu').html(menu);
  $('.breadcrumb-item-submenu').html(submenu);
  $('#contenido').html('<h1>Página No encontrada :(</h1>');

  }




 });



});


</script>
</body>
</html>