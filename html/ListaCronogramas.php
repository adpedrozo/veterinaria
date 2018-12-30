<!DOCTYPE html>
<!-- html/ListaCronogramas.php -->
<html>
<head>
	<title>Lista de Cronogramas</title>
</head>
<body>

	<h2>Generar Aviso de Cronogramas Vencidos</h2>
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
			<th>Acciones</th>
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
					<td class="atencion">Vencido</td>
					<td>
						<form action="mailto:<?=$p['email']?>" method="post" enctype="text/plain">
						<input type="hidden" name="email" value="<?=$p['email']?>">
						<input type="hidden" name="Apellido" value="<?=$p['apellido']?>">
						<input type="hidden" name="Nombre" value="<?=$p['nombre_cliente']?>">
						<input type="hidden" name="Mascota" value="<?=$p['nombre_mascota']?>">
						<input type="hidden" name="Fecha" value="<?=$nuevoFormato?>">
						<input type="hidden" name="Estado" value="Cronograma de Vacunación Vencido">
						<input type="submit" value="Enviar Aviso">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>