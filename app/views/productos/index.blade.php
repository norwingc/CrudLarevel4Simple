@extends('plantilla')

@section('contenido')

<div class="jumbotron">
	<h1>Lista de Productos</h1>	
</div>

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Descripcion</td>
					<td>Stock</td>
					<td>Precio</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $key => $value)
					<tr>
						<td>{{ $value->nombre }}</td>
						<td>{{ $value->descripcion }}</td>
						<td>{{ $value->stock }}</td>
						<td>{{ $value->precio }}</td>
						<td>

							{{ Form::open(array('url' => 'productos/'. $value->id, 'class' => 'pull-right')) }}
								{{ Form::hidden('_method', 'DELETE') }}
								{{ Form::submit('Borrar este producto', array('class' => 'btn btn-warning')) }}
							{{ Form::close() }}
							
							<a href="{{ URL::to('productos/' .$value->id) }}" class="btn btn-small btn-success"> Ver Producto</a>
							<a href="{{ URL::to('productos/' .$value->id. '/edit') }}" class="btn btn-small btn-success"> Editar Producto</a>

						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop		