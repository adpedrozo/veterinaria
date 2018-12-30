<!DOCTYPE html>
<!-- html/SeleccionarInventario.php -->
<html>
<head>
	<title>Lista de Inventario</title>
</head>
<body>

	<h2>Seleccionar ítem/s para facturación:</h2>
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
<form action="crearfactura.php" method="post">
	<table>
		<tr>
			<th>Tipo</th>
			<th>Nombre de Artículo</th>
			<th>Precio de Venta Unitario</th>
			<th>Stock Disponible</th>
			<th>Seleccionar</th>
			<th>Cantidad</th>
		</tr>
			<?php foreach( $this->productos as $p ){ ?>
				<tr>
					<td>Producto</td>
					<td><?=$p['nombre_producto']?></td>
					<td>$ <?=$p['precio_unitario']?></td>
					<td><?=$p['stock']?></td>
					<td>
						<input type="checkbox" name="art[]" value="<?=$p['nombre_producto']?>">
					</td>
					<td><input type="text" name="cantP"></td>
				</tr>
			<?php } ?>
			<?php foreach( $this->servicios as $p ){ ?>
				<tr>
					<td>Servicio</td>
					<td><?=$p['descripcion']?></td>
					<td>$ <?=$p['precio_unitario']?></td>
					<td></td>
					<td>
						<input type="checkbox" name="art[]" value="<?=$p['descripcion']?>">
					</td>
					<td><input type="text" name="cantS"></td>
				</tr>
			<?php } ?>
			<?php foreach( $this->prestaciones as $p ){ ?>
				<tr>
					<td>Prestación Médica</td>
					<td><?=$p['descripcion']?></td>
					<td>$ <?=$p['precio_unitario']?></td>
					<td></td>
					<td>
						<input type="checkbox" name="art[]" value="<?=$p['descripcion']?>">
					</td>
					<td><input type="text" name="cantPM"></td>
				</tr>
			<?php } ?>
			<?php foreach( $this->vacunas as $p ){ ?>
				<tr>
					<td>Vacuna</td>
					<td><?=$p['descripcion']?></td>
					<td>$ <?=$p['precio_unitario']?></td>
					<td></td>
					<td>
						<input type="checkbox" name="art[]" value="<?=$p['descripcion']?>">
					</td>
					<td><input type="text" name="cantV"></td>
				</tr>
			<?php } ?>
	</table>
	</br></br>

	<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
	<input type="submit" value="Confirmar">
</form>

</body>
</html>