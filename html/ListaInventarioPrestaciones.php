<!DOCTYPE html>
<!-- html/ListaInventarioPrestaciones.php -->
<html>
<head>
	<title>Lista de Productos</title>
</head>
<body>

	<h2>Inventario Disponible</h2>

	<table>
		<tr>
			<th>Tipo</th>
			<th>Nombre</th>
			<th>Proveedor</th>
			<th>Precio de Venta Unitario</th>
			<th>Stock Disponible</th>
			<th>Punto de Reposición</th>
			<th>Acciones</th>
		</tr>
			<?php foreach( $this->prestaciones as $v ){ ?>
				<tr>
					<td>Prestación Médica</td>
					<td><?=$v['descripcion']?></td>
					<td>No Determinado</td>
					<td>$ <?=$v['precio_unitario']?></td>
					<td>No Determinado</td>
					<td>No Determinado</td>
					<td>Sin Acciones</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
