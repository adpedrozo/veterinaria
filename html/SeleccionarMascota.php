<!DOCTYPE html>
<!-- html/SeleccionarMascota.php -->
<html>
<head>
	<title>Lista de Mascotas</title>
</head>
<body>

	<h2>Seleccionar Mascota</h2>
	<form action="" method="get" id="busq">
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
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="submit" value="Nueva Mascota" class="resaltado">
	</form>
	</br>
	<table>
		<tr>
			<th>Mascota</th>
			<th>Cliente</th>
			<th>Nº de Documento</th>
			<th>Raza</th>
			<th>Especie</th>
			<th>Acciones</th>
		</tr>
			<?php foreach( $this->mascotas as $m ){ ?>
				<tr>
					<td><?=$m['nombre_mascota']?></td>
					<td><?=$m['apellido'] . ", " . $m['nombre_cliente']?></td>
					<td><?=$m['nro_documento']?></td>
					<td><?=$m['nombre_raza']?></td>
					<td><?=$m['nombre_especie']?></td>
					<td>
						<form action="crearturno.php" method="post">
						<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
						<input type="hidden" name="idMascota" value="<?=$m['cod_mascota']?>">
						<input type="submit" value="Seleccionar">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
