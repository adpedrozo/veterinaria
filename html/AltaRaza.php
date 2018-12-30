<!DOCTYPE html>
<!-- html/AltaMascota.php -->
<html>
<head>
	<title>Alta de Raza</title>
</head>
<body>

	<h2>Nueva Raza</h2>
	<form action="" method="post">
		<label class="nombres-azulados">Especie: </label>
		</br>
		<?php foreach( $this->especies as $e ) { ?>
			<label for="<?= $e['nombre'] ?>"><?= $e['nombre'] ?> </label>
			<input type="radio" name="idEspecie" value="<?= $e['cod_especie'] ?>"
				id="<?= $e['nombre'] ?>">
			</br>
		<?php } ?>
		</br>
		<label class="nombres-azulados" for="n">Nombre: </label>
		<input type="text" name="nombre" id="n">

		</br></br>

		<input type="submit" value="Confirmar" class="boton-bien">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

</body>
</html>