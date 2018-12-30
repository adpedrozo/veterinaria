<!DOCTYPE html>
<!-- html/ListaMascotas.php -->
<html>
<head>
	<title>Lista de Mascotas</title>
</head>
<body>

	<h2>Lista de Mascotas</h2>
	<form action="" method="get">
		<label>Tipo de búsqueda: </label>
		<select name="busqueda">
			<option value="pornombre">Nombre de la Mascota</option>
			<option value="porapellido">Apellido de Cliente</option>
		</select>
		<input type="text" name="datos">
		<input type="submit" value="Buscar">
	</form>
	</br>
	<table>
		<tr>
			<th>Mascota</th>
			<th>Cliente</th>
			<th>Nº de Documento</th>
			<th>Sexo</th>
			<th>Raza</th>
			<th>Especie</th>
			<th>Peso</th>
			<th>Edad</th>
			<th colspan="2">Acciones</th>
		</tr>
			<?php foreach( $this->mascotas as $m ){ ?>
				<tr>
					<td><?=$m['nombre_mascota']?></td>
					<td><?=$m['apellido'] . ", " . $m['nombre_cliente']?></td>
					<td><?=$m['nro_documento']?></td>
					<td><?=$m['sexo']?></td>
					<td><?=$m['nombre_raza']?></td>
					<td><?=$m['nombre_especie']?></td>
					<td><?=$m['peso']/1000 . " Kg."?></td>
					<td><?=$m['edad'] . " Meses"?></td>
					<td>
						<form action="modificarmascota.php" method="post">
						<input type="hidden" name="idMascota" value="<?=$m['cod_mascota']?>">
						<input type="submit" value="Modificar">
						</form>
					</td>
					<td>
						<form action="verconfirmacionmascota.php" method="post">
						<input type="hidden" name="idMascota" value="<?=$m['cod_mascota']?>">
						<input type="submit" value="Eliminar">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>