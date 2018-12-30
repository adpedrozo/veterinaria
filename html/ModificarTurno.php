<!DOCTYPE html>
<!-- html/ModificarTurno.php -->
<html>
<head>
	<title>Modificar Turno</title>
</head>
<body>

	<h2>Modificar Turno</h2>
	<form action="" method="post">
		<?php foreach( $this->turnos as $t ) { ?>
			<span>Cliente: <?= $t['nombre_cliente'] . " " . $t['apellido'] ?></span>
			</br>
			<span>Mascota: <?= $t['nombre_mascota'] ?></span>
			</br>
			<label for="f">Fecha: </label>
			<input size="2" type="text" name="fechaDia" placeholder="DD"
				value="<?= $this->dia ?>" id="f">
			<input size="2" type="text" name="fechaMes" placeholder="MM"
				value="<?= $this->mes ?>" id="f">
			<input size="4" type="text" name="fechaAnio" placeholder="AAAA"
				value="<?= $this->anio ?>" id="f">
			</br>
			<label for="h">Horario (Formato 24hs.): </label>
			<input size="2" type="text" name="horarioHH" placeholder="HH"
				value="<?= $this->hora ?>" id="h">
			<input size="2" type="text" name="horarioMM" placeholder="MM"
				value="<?= $this->minutos ?>" id="h">
			</br></br>
			
			<label for="m" class="subtitulo">Servicios: </label>
			</br>
			<?php foreach( $this->servicios as $s ) { ?>
				<label for="<?=$s['descripcion']?>"><?=$s['descripcion'] ." ($". $s['precio_unitario'] .")"?></label>
				<input type="radio" name="motivo" value="<?=$s['descripcion']?>" id="<?=$s['descripcion']?>"
				<?php if( $t['descripcion'] == $s['descripcion'] ) {
					?> checked <?php } ?> >
				</br>
			<?php } ?>

			</br></br>
		
			<label for="m" class="subtitulo">Prestaciones Médicas: </label>
			</br>
			<?php foreach( $this->prestaciones as $p ) { ?>
				<label for="<?=$p['descripcion']?>"><?=$p['descripcion'] ." ($". $p['precio_unitario'] .")"?></label>
				<input type="radio" name="motivo" value="<?=$p['descripcion']?>" id="<?=$p['descripcion']?>"
				<?php if( $t['descripcion'] == $p['descripcion'] ) {
					?> checked <?php } ?> >
				</br>
			<?php }
			} ?>
		
		</br></br>
		
		<input type="hidden" name="idTurno" value="<?=$_POST['idTurno']?>">
		<input type="submit" value="Confirmar">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

</body>
</html>