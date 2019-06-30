	
<div class="row">
	
<div class="col-md-12">

<button class="btn btn-primary btn-agregar"><i class="fa fa-plus"></i> Agregar</button>

<hr>

<div class="table-responsive">
	
<table id="consulta" class="table">
	
<thead>
	
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dni</th>
<th>Usuario</th>
<th>Fecha de Creación</th>
<th>Acciones</th>

</tr>

</thead>


</table>



</div>

</div>

</div>



<!-- Modal Registro (Agregar / Actualizar) -->

<form id="registro" autocomplete="off">
	
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="accion" class="accion">
      <input type="hidden" name="id" class="id">

       
      <div class="form-group">
      <label>Nombres</label>
      <input type="text" name="nombres" class="nombres form-control" required>
      </div>

      <div class="form-group">
      <label>Apellidos</label>
      <input type="text" name="apellidos" class="apellidos form-control" required>
      </div>


      <div class="form-group">
      <label>Dni</label>
      <input type="text" name="dni" class="dni form-control" required>
      </div>


      <div class="form-group">
      <label>Usuario</label>
      <input type="text" name="usuario" class="usuario form-control" required>
      </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>


</form>


<script>
	
//Data
function loadData(){

$(document).ready(function (){


$('#consulta').dataTable({


 "destroy":true,
 "language":{

 "url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"

 },

 "bProcessing":true,
 "sAjaxSource":"source/usuarios.php?op=1",
 "aoColumns":[

  { mData : 'id'},
  { mData : 'nombres'},
  { mData : 'apellidos'},
  { mData : 'dni'},
  { mData : 'usuario'},
  { mData : 'dateCreate'},
  { mData : null,render:function(data){

   acciones  = '<button type="button" data-id="'+data.id+'"  class="btn btn-primary btn-sm btn-edit"><i class="fa fa-edit"></i></button> ';

   acciones  += '<button type="button" data-id="'+data.id+'" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></button>';
    
   return acciones;

  }}
 





 ]

});


});


}

loadData();


//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function(){

$('#registro')[0].reset();

$('.accion').val('agregar');
$('.modal-title').html('Agregar');
$('.btn-submit').html('Agregar');
$('#modal-registro').modal('show');


});



//Cargar Modal Actualizar
$(document).on('click','.btn-edit',function(){

$('#registro')[0].reset();

$('.accion').val('actualizar');

id = $(this).data('id');
$('.id').val(id);

//Cargar Información
$.getJSON('source/usuarios.php?op=2',{'id':id},function(data){

$('.nombres').val(data.nombres);
$('.apellidos').val(data.apellidos);
$('.dni').val(data.dni);
$('.usuario').val(data.usuario);


});

 
$('.modal-title').html('Actualizar');
$('.btn-submit').html('Actualizar');
$('#modal-registro').modal('show');


});


//Cargar Modal Eliminar
$(document).on('click','.btn-delete',function(){

id = $(this).data('id');
 
swal({
  title: "¿Estás Seguro?",
  text: "El registro se eliminará permanentemente",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si",
  cancelButtonText:"Cancelar",
  closeOnConfirm: false
},
function(){

$.getJSON('source/usuarios.php?op=5',{'id':id},function(data){

loadData();

swal({

title:data.title,
text:data.text,
type:data.type,
showConfirmButton:false,
timer:2000

});


});



});


});


//Registro

$(document).on('submit','#registro',function(e){

parametros = $(this).serialize();

accion     = $('.accion').val();

if(accion=='agregar')
{

 url = "source/usuarios.php?op=3";

}
else
{

 url = "source/usuarios.php?op=4";

}

//ajax
$.ajax({

url:url,
type:"POST",
data:parametros,
dataType:"JSON",
beforeSend:function(){

swal({

title:"Cargando...",
imageUrl:"img/loader2.gif",
text:"No Cierre la ventana",
showConfirmButton:false

});



},
success:function(data){

loadData();

swal({

title:data.title,
text:data.text,
type:data.type,
showConfirmButton:false,
timer:2000

});


}



});





e.preventDefault();
});


</script>

