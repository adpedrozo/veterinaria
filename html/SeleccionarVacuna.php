<!DOCTYPE html>
<!-- html/SeleccionarVacuna.php -->
<html>
<head>
	<title>Lista de Vacunas</title>
</head>
<body>

	<h2>Seleccionar Vacuna</h2>
<!--	<form action="" method="get" id="busq">
		<label>Tipo de Búsqueda: </label>
		<select name="busqueda">
			<option value="nombre">Nombre de la Mascota</option>
			<option value="apellido">Apellido de Cliente</option>
			<option value="doc">Nº de Documento de Cliente</option>
		</select>
		<input type="text" name="datos">
		<input type="submit" value="Buscar">
	</form>
	<form action="crearmascota.php" method="post">
		<input type="hidden" name="idCliente" value="ST['idCliente']?>">
		<input type="submit" value="Nueva Mascota" class="resaltado">
	</form>
	</br>
-->
	<table>
		<tr>
			<th>Tipo</th>
			<th>Nombre</th>
			<th>Precio de Venta Unitario</th>
			<th>Stock Disponible</th>
			<th>Punto de Reposición</th>
			<th>Acciones</th>
		</tr>
			<?php foreach( $this->vacunas as $v ){ ?>
				<tr>
					<td>Vacuna</td>
					<td><?=$v['descripcion']?></td>
					<td>$ <?=$v['precio_unitario']?></td>
					<td><?=$v['stock']?></td>
					<td><?=$v['punto_reposicion']?></td>
					<td>
						<form action="crearcronograma.php" method="post">
						<input type="hidden" name="idVacuna" value="<?=$v['cod_vacuna']?>">
						<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
						<input type="hidden" name="idMascota" value="<?=$_POST['idMascota']?>">
						<input type="submit" value="Seleccionar">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
