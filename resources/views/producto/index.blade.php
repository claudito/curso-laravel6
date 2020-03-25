@extends('layouts.app')


@section('content')


<div class="container">
	

	<div class="row">
		<div class="col-md-12">

	
		<div class="form-group">
				
		<button class="btn btn-sm btn-primary btn-agregar">
			<i class="fa fa-plus"></i> Agregar
		</button>

		</div>

			
		<div class="table-responsive">
			
				<table id="consulta" class="table">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th>Fecha de Creación</th>
							<th>Acciones</th>
						</tr>
					</thead>
				</table>
		</div>


		</div>
	</div>


</div>


<!-- Modal Agregar/Actualizar -->

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
       
		
		<div class="form-group">
			<label>Código</label>
			<input type="text" name="codigo" class="codigo form-control" required>
		</div>

		<div class="form-group">
			<label>Descripción</label>
			<input type="text" name="descripcion" class="descripcion form-control" required>
		</div>


		<div class="form-group">
			<label>Cantidad</label>
			<input type="number" name="cantidad" class="cantidad form-control" required min="0">
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

function loadData(){


	$(document).ready(function(){

			$('#consulta').DataTable({


				destroy:true,
				language:{

				url:"{{ asset('js/spanish.json') }}"

				},
				ajax:{

				url:'{{ route('productos.index') }}',
				type:'GET'


				},
				columns:[

					{data:'codigo'},
					{data:'descripcion'},
					{data:'cantidad'},
					{data:'created_at'},
					{data:null,render:function(data){


					return ` 

					 <button 

					 data-id="${data.id}"
					 class="btn btn-sm btn-primary btn-actualizar">
					  <i class="fa fa-pencil"></i>
					 </button>


					 <button 
					 data-id="${data.id}"
					 class="btn btn-sm btn-danger btn-eliminar">
						<i class="fa fa-trash"></i>
					 </button>
	

					`;


					}}

				]


			});



		});
		

}

loadData();


//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function(){

	$('#registro')[0].reset();
	$('.codigo').removeAttr('readonly','');

	$('.modal-title').html('Agregar');
	$('.btn-submit').html('Agregar');
	$('#modal-registro').modal('show');

});


//Cargar Modal Actualizar
$(document).on('click','.btn-actualizar',function(){

	$('#registro')[0].reset();
	$('.codigo').attr('readonly','');

		 id = $(this).data('id');

	$('.modal-title').html('Actualizar');
	$('.btn-submit').html('Actualizar');
	$('#modal-registro').modal('show');

});


//Cargar Alert Eliminar
$(document).on('click','.btn-eliminar',function(){

		 id = $(this).data('id');


	Swal.fire({

		title: '¿Estás Seguro?',
		text: "El Registro se eliminará de forma permanente",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, estoy seguro',
		cancelButtonText : 'Cancelar',

}).then((result) => {

  if (result.value) {


  	$.ajax({


  	  url:'{{ route('productos.eliminar') }}',
  	  type:'DELETE',
  	  data:{'id':id,'_token':'{{ csrf_token() }}'},
  	  dataType:'JSON',
  	  beforeSend:function(){

  	  	Swal.fire({

  	  	   title:'Cargando',
  	  	   text :'Espere un momento',
  	  	   imageUrl:'{{ asset('img/loader.gif') }}',
  	  	   showConfirmButton:false

  	  	});

  	  },
  	  success:function(data){


  	  	loadData();

  	    Swal.fire({

	   	title:data.title,
	   	text :data.text,
	   	icon :data.icon,
	   	timer:3000,
	   	showConfirmButton:false



	   });


  	  }


  	});
	

  }


})




});



</script>


@endsection
