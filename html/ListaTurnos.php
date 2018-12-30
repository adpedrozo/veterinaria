<!DOCTYPE html>
<!-- html/ListaTurnos.php -->
<html>
<head>
	<title>Lista de Turnos</title>
</head>
<body>

	<h2>Lista de Turnos</h2>
	<form action="" method="get">
		<label>Tipo de Búsqueda: </label>
		<select name="busqueda">
			<option value="porfecha">Fecha</option>
			<option value="pornombre">Nombre de la Mascota</option>
			<option value="porapellido">Apellido de Cliente</option>
		</select>
		<input type="text" name="datos">
		<input type="submit" value="Buscar">
	</form>
	</br>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Horario</th>
			<th>Mascota</th>
			<th>Cliente</th>
			<th>Motivo/Descripción</th>
			<th>Estado</th>
			<th colspan="4">Acciones</th>
		</tr>
			<?php foreach( $this->turnos as $t ){
				$time = strtotime($t['fecha']);
				$nuevoFormato = date("d-m-Y",$time);
				?>
				<tr>
					<td><?=$nuevoFormato?></td>
					<td><?=$t['horario']?></td>
					<td><?=$t['nombre_mascota']?></td>
					<td><?=$t['apellido'] . ", " . $t['nombre_cliente']?></td>
					<td><?=$t['descripcion']?></td>
					<td><?php if( $t['asistencia'] == "SI" ) { ?>
						<span class="bien">Realizado</span> <?php } ?>
						<?php if( $t['asistencia'] == "NO" ) { ?>
						<span class="atencion">Ausente</span> <?php } ?>
						<?php if( $t['asistencia'] == "CA" ) { ?>
						<span class="atencion">Cancelado</span> <?php } ?>
						<?php if( is_null($t['asistencia']) ) { ?>
						Pendiente <?php } ?>
					</td>
					<td>
						<form action="marcarausente.php" method="post">
						<input type="hidden" name="idTurno" value="<?=$t['cod_turno']?>">
						<input type="hidden" name="fecha" value="<?=$t['fecha']?>">
						<input type="submit" value="Marcar Ausente">
						</form>
					</td>
					<td>
						<form action="marcarrealizado.php" method="post">
						<input type="hidden" name="fecha" value="<?=$t['fecha']?>">
						<input type="hidden" name="idTurno" value="<?=$t['cod_turno']?>">
						<input type="submit" value="Marcar Realizado">
						</form>
					</td>
					<td>
						<form action="modificarturno.php" method="post">
						<input type="hidden" name="idTurno" value="<?=$t['cod_turno']?>">
						<input type="hidden" name="fecha" value="<?=$t['fecha']?>">
						<input type="hidden" name="horario" value="<?=$t['horario']?>">
						<input type="submit" value="Modificar">
						</form>
					</td>
					<td>
						<form action="marcarcancelado.php" method="post">
						<input type="hidden" name="idTurno" value="<?=$t['cod_turno']?>">
						<input type="hidden" name="fecha" value="<?=$t['fecha']?>">
						<input type="submit" value="Cancelar Turno">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
