@extends('plantilla')

@section('contenido')

<div class="jumbotron">
@if(!$producto)
	<h1>El producto no existe</h1>
@else	
	<h1>Editanto el producto: {{ $producto->nombre }}</h1>	
</div>
	<div class="container">
		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

		{{ Form::model($producto, array('route' => array('productos.update', $producto->id), 'method' => 'PUT','class' => 'form-horizontal')) }}
			<div class="form-group">
				{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-6">
					{{ Form::text('nombre', Input::old('nombre') ? Input::old('nombre'): $producto->nombre, array('class' => 'form-control', 'placeholder'=> 'Nombre del producto')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('descripcion', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-6">
					{{ Form::text('descripcion', Input::old('descripcion') ? Input::old('descripcion'): $producto->descripcion, array('class' => 'form-control', 'placeholder'=> 'Descripcion del producto')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('stock', 'Stock', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-6">
					{{ Form::text('stock', Input::old('stock') ? Input::old('stock'): $producto->stock, array('class' => 'form-control', 'placeholder'=> 'Stock del producto')) }}	
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('precio', 'Precio', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-6">
					{{ Form::text('precio', Input::old('precio') ? Input::old('precio'): $producto->precio, array('class' => 'form-control', 'placeholder'=> 'Precio del producto')) }}	
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					{{ Form::submit('Editar Producto' , array('class'=> 'btn btn-primary')) }}
				</div>	
			</div>
		{{ Form::close() }}
	</div>		
@endif	
	
@stop