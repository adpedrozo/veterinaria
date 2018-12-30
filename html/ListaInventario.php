<!DOCTYPE html>
<!-- html/ListaInventario.php -->
<html>
<head>
	<title>Lista de Productos</title>
</head>
<body>

	<h2>Inventario Disponible</h2>
	<form action="" method="get">
		<label>Tipo de Búsqueda: </label>
		<select name="busqueda">
			<option value="porP">Nombre del Producto</option>
			<option value="porS">Nombre del Servicio</option>
			<option value="porPM">Nombre de la Prestación Médica</option>
			<option value="porV">Nombre de la Vacuna</option>
		</select>
		<input type="text" size="30" name="datos">
		<input type="submit" value="Buscar">
	</form>
	</br>

	
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
						<form action="generarreposicion.php" method="post" target="_blank">
						<input type="hidden" name="idProducto" value="<?=$p['cod_producto']?>">
						<input type="hidden" name="email" value="<?=$p['email']?>">
						<input type="submit" value="Generar Reposición">
						</form>
					</td>
				</tr>
			<?php } ?>
			<?php foreach( $this->vacunas as $v ){ ?>
				<tr>
					<td>Vacuna</td>
					<td><?=$v['descripcion']?></td>
					<td><?=$v['razon_social']?></td>
					<td>$ <?=$v['precio_unitario']?></td>
					<td><?=$v['stock']?></td>
					<td><?=$v['punto_reposicion']?></td>
					<td>
						<form action="generarreposicion.php" method="post" target="_blank">
						<input type="hidden" name="idVacuna" value="<?=$v['cod_vacuna']?>">
						<input type="hidden" name="email" value="<?=$v['email']?>">
						<input type="submit" value="Generar Reposición">
						</form>
					</td>
				</tr>
			<?php } ?>
			<?php foreach( $this->servicios as $v ){ ?>
				<tr>
					<td>Servicio</td>
					<td><?=$v['descripcion']?></td>
					<td>No Determinado</td>
					<td>$ <?=$v['precio_unitario']?></td>
					<td>No Determinado</td>
					<td>No Determinado</td>
					<td>Sin Acciones</td>
				</tr>
			<?php } ?>
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
