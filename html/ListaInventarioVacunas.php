<!DOCTYPE html>
<!-- html/ListaInventarioVacunas.php -->
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
			<?php foreach( $this->vacunas as $v ){ ?>
				<tr>
					<td>Vacuna</td>
					<td><?=$v['descripcion']?></td>
					<td><?=$v['razon_social']?></td>
					<td>$ <?=$v['precio_unitario']?></td>
					<td><?=$v['stock']?></td>
					<td><?=$v['punto_reposicion']?></td>
					<td>
						<form action="generarreposicion.php" method="post">
						<input type="hidden" name="idVacuna" value="<?=$v['cod_vacuna']?>">
						<input type="submit" value="Generar Reposición">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
