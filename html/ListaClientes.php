<!DOCTYPE html>
<!-- html/ListaClientes.php -->
<html>
<head>
	<title>Lista de Clientes</title>
</head>
<body>

	<h2>Lista de Clientes</h2>
	<form action="" method="get">
		<label>Tipo de Búsqueda: </label>
		<select name="busqueda">
			<option value="porapellido">Apellido</option>
			<option value="pordoc">Nº de Documento</option>
		</select>
		<input type="text" name="datos">
		<input type="submit" value="Buscar">
	</form>
	</br>
	<table>
		<tr>
			<th>Apellido</th>
			<th>Nombre</th>
			<th>Tipo de Documento</th>
			<th>Nº de Documento</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>E-Mail</th>
			<th colspan="2">Acciones</th>
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
						<form action="modificarcliente.php" method="post">
						<input type="hidden" name="idCliente" value="<?=$c['cod_cliente']?>">
						<input type="submit" value="Modificar">
						</form>
					</td>
					<td>
						<form action="verconfirmacioncliente.php" method="post">
						<input type="hidden" name="idCliente" value="<?=$c['cod_cliente']?>">
						<input type="submit" value="Eliminar">
						</form>
					</td>
				</tr>
			<?php } ?>
	</table>

</body>
</html>
