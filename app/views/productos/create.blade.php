@extends('plantilla')

@section('contenido')

<div class="jumbotron">
	<h1>Crear Un Nuevo producto</h1>	
</div>
<div class="container">
	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

	{{ Form::open(array('url' => 'productos', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('nombre', Input::old('name'), array('class' => 'form-control', 'placeholder'=> 'Nombre del producto')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('descripcion', 'Descripcion', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=> 'Descripcion del producto')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('stock', 'Stock', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('stock', Input::old('stock'), array('class' => 'form-control', 'placeholder'=> 'Stock del producto')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('precio', 'Precio', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('precio', Input::old('precio'), array('class' => 'form-control', 'placeholder'=> 'Precio del producto')) }}	
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{ Form::submit('Agregar Producto' , array('class'=> 'btn btn-primary')) }}
			</div>	
		</div>
	{{ Form::close() }}	
</div>
@stop



