<!DOCTYPE html>
<!-- html/SeleccionarInventario.php -->
<html>
<head>
	<title>Lista de Inventario</title>
</head>
<body>

	<h2>Seleccionar producto para devolución:</h2>
<!--	<form action="" method="get">
		<label>Tipo de Búsqueda: </label>
		<select name="busqueda">
			<option value="pornombre">Nombre del Producto</option>
			<option value="porprov">Nombre del Proveedor</option>
		</select>
		<input type="text" name="datos">
		<input type="submit" value="Buscar">
	</form>
	</br>
-->
	
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
						<form action="crearcredito.php" method="post">
						<input type="hidden" name="idProducto" value="<?=$p['cod_producto']?>">
						<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
						<input type="submit" value="Seleccionar">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>