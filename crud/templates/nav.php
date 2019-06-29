<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand navbar-user-close" href="#" id="navbar-user">????</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimientos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Usuarios</a>
          <a class="dropdown-item" href="#">Aulas</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Profesores</a>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Código de Alumnno" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
     
  
  </div>

</nav>

<script>
  
$.getJSON('source/nav.php?op=1',{},function(data){

$('#navbar-user').html(data.nombres+' '+data.apellidos);


});

$(document).on('click','.navbar-user-close',function(){

swal({
  title: "¿Estas Seguro?",
  text: "La sesión terminara",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Cerrar Sesión",
  cancelButtonText : "Cancelar",
  closeOnConfirm: false
},
function(){
 
$.getJSON('source/acceso.php?op=2',{},function(data){


//Mensaje Sweet Alert
swal({

title : data.title,
text  : data.text,
type  : data.type,
showConfirmButton:false,
timer : 2000


});

setTimeout(function(){

window.location.href='';

},2000);


});



});



})


</script>