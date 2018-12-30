<!DOCTYPE html>
<!-- html/ListaInventarioProductos.php -->
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
			<?php foreach( $this->productos as $p ){ ?>
				<tr>
					<td>Producto</td>
					<td><?=$p['nombre_producto']?></td>
					<td><?=$p['razon_social']?></td>
					<td>$ <?=$p['precio_unitario']?></td>
					<td><?=$p['stock']?></td>
					<td><?=$p['punto_reposicion']?></td>
					<td>
						<form action="generarreposicion.php" method="post">
						<input type="hidden" name="idProducto" value="<?=$p['cod_producto']?>">
						<input type="submit" value="Generar Reposición">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
