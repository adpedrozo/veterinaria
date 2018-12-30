<!DOCTYPE html>
<!-- html/ListaCronogramasCompletos.php -->
<html>
<head>
	<title>Lista de Cronogramas</title>
</head>
<body>

	<h2>Cronograma de Vacunación</h2>
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
			<th>Cliente</th>
			<th>E-Mail</th>
			<th>Mascota</th>
			<th>Vacuna</th>
			<th>Fecha</th>
			<th>Horario</th>
			<th>Estado</th>
		</tr>
			<?php foreach( $this->cronogramas as $p ){
				$time = strtotime($p['fecha']);
				$nuevoFormato = date("d-m-Y",$time);
				?>
				<tr>
					<td><?=$p['apellido'] . ", " . $p['nombre_cliente']?></td>
					<td><?=$p['email']?></td>
					<td><?=$p['nombre_mascota']?></td>
					<td><?=$p['descripcion']?></td>
					<td><?=$nuevoFormato?></td>

					<?php if (!is_null($p['horario'])) { ?>
						<td><?=$p['horario']?></td>
					<?php } else { ?> <td>Sin Horario Definido</td> <?php } ?>

					<?php if (is_null($p['estado'])) { ?>
						<td>Pendiente</td>
					<?php } ?>
					<?php if ($p['estado']=="SI") { ?>
						<td class="bien">Realizado</td>
					<?php } ?>
					<?php if ($p['estado']=="NO") { ?>
						<td class="atencion">Vencido</td>
					<?php } ?>
					
				</tr>
			<?php } ?>
	</table>

</body>
</html>