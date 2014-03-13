<!DOCTYPE html>
<html lan="es">
<head>
	<title>Productos</title>
	<meta charset="utf-8">
	{{ HTML::style('css/bootstrap.min.css') }}
</head>
<body>
	<div class="container">
		<div class="header">
			<ul class="nav nav-pills pull-right">
				<li>{{ HTML::link('productos', 'Lista de Productos') }}</li>
				<li>{{ HTML::link('productos/create', 'Agregar Producto') }}</li>				
			</ul>
			<h3 class="text-muted">Productos</h3>
		</div>
		
		@yield('contenido')

		<div class="footer">
			<p>&copy; Norwin Guerrero</p>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>