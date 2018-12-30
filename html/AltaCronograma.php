<!DOCTYPE html>
<!-- html/AltaCronograma.php -->
<html>
<head>
	<title>Alta Certificado</title>
</head>
<body>

	<h2>Crear Certificado de Vacunación</h2>
	<form action="" method="post">
		<?php foreach( $this->mascotas as $m ) { ?>
			<span><span class="nombres-azulados">Nombre de Mascota: </span><?= $m['nombre'] ?></span>
		<?php } ?>
		</br>
		<?php foreach( $this->clientes as $c ) { ?>
			<span><span class="nombres-azulados">Nombre de Cliente: </span><?= $c['apellido'] . ", " . $c['nombre'] ?></span>
		<?php } ?>
		</br>
		<?php foreach( $this->vacunas as $v ) { ?>
			<span><span class="nombres-azulados">Vacuna: </span><?= $v['descripcion'] ?></span>
		<?php } ?>
		</br></br>
		<label for="f">Fecha de Aplicación: </label>
		<input size="2" type="text" name="fechaDia" placeholder="DD" id="f">
		<input size="2" type="text" name="fechaMes" placeholder="MM" id="f">
		<input size="4" type="text" name="fechaAnio" placeholder="AAAA" id="f">

		</br></br>
		
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="hidden" name="idVacuna" value="<?=$_POST['idVacuna']?>">
		<input type="hidden" name="idMascota" value="<?=$_POST['idMascota']?>">
		<input type="submit" value="Confirmar e Imprimir" onclick="imprimir();" class="boton-bien"">
	</form>

	<form action="verinventario.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

<script>
function imprimir() {
    window.print();
}
</script>

</body>
</html>