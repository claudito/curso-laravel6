@extends('layouts.app')


@section('content')


<div class="container">
	

	<div class="row">
		<div class="col-md-12">
			
		<div class="table-responsive">
			
				<table id="consulta" class="table">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th>Fecha de Creación</th>
						</tr>
					</thead>
				</table>
		</div>


		</div>
	</div>


</div>

<script>
$(document).ready(function(){

			$('#consulta').DataTable({


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
					{data:'created_at'}

				]


			});



		});
		


</script>


@endsection
