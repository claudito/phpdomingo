      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="navbar-toggler-icon"></span>
        </button> <a class="navbar-brand" href="">Inicio</a>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <!-- Menu -->
          <ul class="navbar-nav nav-item-menu"> 

          </ul>
  


        
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="text" /> 
            <button class="btn btn-primary my-2 my-sm-0" type="submit">
              Buscar
            </button>
          </form>
          <ul class="navbar-nav ml-md-auto">
            <li class="nav-item active">
    <a class="nav-link" href="#"><i class="fa fa-user text-success"></i>
     <span class="fullname-user"></span> <span class="sr-only">(current)</span></a>

            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider">
                </div> <a class="dropdown-item session-close" href="#">Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


<script>
  
//Cargar Nombre de Usuario
$.getJSON('source/nav.php?op=1',{},function(data){

$('.fullname-user').html(data.nombres+' '+data.apellidos);


});

//Cargar Opción Salir
$(document).on('click','.session-close',function(){

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


//Cargar Menú
$(document).ready(function (){

$.getJSON('source/nav.php?op=2',{},function(data){

menu    = data;

submenu = data;

html_menu    = "";


//menú
menu.forEach(function (row_menu){



if(row_menu.tipo=='MENU')
{


 html_menu    +=' <li class="nav-item dropdown">';
  
 html_menu    +='<a class="nav-link dropdown-toggle"  data-toggle="dropdown">'+row_menu.menu+'</a>';
   
 html_menu    +='<div class="dropdown-menu">';

//Submenú
submenu.forEach(function (row_submenu){

if(row_submenu.tipo=='SUBMENU')
{

if(row_submenu.id_menu==row_menu.id_menu)
{

html_menu    +='<a class="dropdown-item dropdown-pagina" data-menu="'+row_submenu.menu+'"  data-submenu="'+row_submenu.submenu+'" data-pagina="'+row_submenu.pagina+'">'+row_submenu.submenu+'</a>';

}


}

})
    
 
 html_menu    +='</div>';
   
 html_menu    +='</li>';


$('.nav-item-menu').html(html_menu);

}



});


});




});



</script>



