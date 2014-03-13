@extends('plantilla')

@section('contenido')

<div class="jumbotron">
@if(!$producto)
	<h1>El producto no existe</h1>
</div>		
@else	
	<h1>Producto:  {{ $producto->nombre }}</h1>	
</div>

	<div class="container text-center">
		<p><strong>Descripcion: </strong> {{ $producto->descripcion }}</p>
		<p><strong>Stock: </strong> {{ $producto->stock }}</p>
		<p><strong>Precio: </strong> {{ $producto->precio }}</p>
	</div>	
@endif	
@stop