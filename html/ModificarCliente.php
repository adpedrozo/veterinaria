<!DOCTYPE html>
<!-- html/ModificarCliente.php -->
<html>
<head>
	<title>Modificar Cliente</title>
</head>
<body>

	<h2>Modificar Cliente</h2>
	<form action="" method="post">
		<?php foreach( $this->clientes as $c ) { ?>
			<label for="n">Nombre: </label>
			<input type="text" name="nombre" value="<?= $c['nombre'] ?>" id="n">
			</br>
			<label for="a">Apellido: </label>
			<input type="text" name="apellido" value="<?= $c['apellido'] ?>" id="a">
			</br>
			<label for="doc1">Tipo de Documento: </label>
			<select name="tipoDoc" id="doc1">
				<option value="DNI" <?php if($c['tipo_documento'] == "DNI") { ?>
					selected="selected" <?php } ?> >D.N.I.</option>
				<option value="LC" <?php if($c['tipo_documento'] == "LC") { ?>
					selected="selected" <?php } ?> >Libreta Cívica</option>
				<option value="LE" <?php if($c['tipo_documento'] == "LE") { ?>
					selected="selected" <?php } ?> >Libreta de Enrolamiento</option>
				<option value="CI" <?php if($c['tipo_documento'] == "CI") { ?>
					selected="selected" <?php } ?> >Cédula de Identidad</option>
			</select>
			</br>
			<label for="doc2">Nº de Documento: </label>
			<input type="text" name="numDoc" value="<?= $c['nro_documento'] ?>" id="doc2">
			</br>
			<label for="d">Dirección: </label>
			<input type="text" name="direccion" value="<?= $c['direccion'] ?>" id="d">
			</br>
			<label for="t">Teléfono: </label>
			<input type="text" name="telefono" value="<?= $c['telefono'] ?>" id="t">
			</br>
			<label for="em">E-mail: </label>
			<input type="text" name="email" value="<?= $c['email'] ?>" id="em">
		<?php } ?>
		</br></br>
		
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="submit" value="Confirmar">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

</body>
</html>