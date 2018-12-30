<!DOCTYPE html>
<!-- html/SeleccionarCliente.php -->
<html>
<head>
	<title>Lista de Clientes</title>
</head>
<body>

	<h2>Seleccionar Cliente</h2>
<!--	<form action="" method="get" id="busq">
		<label>Tipo de Búsqueda: </label>
		<select name="busqueda">
			<option value="apellido">Apellido</option>
			<option value="doc">Nº de Documento</option>
		</select>
		<input type="text" name="datos">
		<input type="submit" value="Buscar">
	</form>
	<form action="crearcliente.php">
		<input type="submit" value="Nuevo Cliente" class="resaltado">
	</form>
	</br>
-->
	<table>
		<tr>
			<th>Apellido</th>
			<th>Nombre</th>
			<th>Tipo de Documento</th>
			<th>Nº de Documento</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>E-Mail</th>
			<th>Acciones</th>
		</tr>
			<?php foreach( $this->clientes as $c ){ ?>
				<tr>
					<td><?=$c['apellido']?></td>
					<td><?=$c['nombre']?></td>
					<td><?=$c['tipo_documento']?></td>
					<td><?=$c['nro_documento']?></td>
					<td><?=$c['direccion']?></td>
					<td><?=$c['telefono']?></td>
					<td><?=$c['email']?></td>
					<td>
						<form action="seleccionarinventariofactura.php" method="post">
						<input type="hidden" name="idCliente" value="<?=$c['cod_cliente']?>">
						<input type="submit" value="Seleccionar">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
