<!DOCTYPE html>
<!-- html/AltaTurno.php -->
<html>
<head>
	<title>Alta de Turno</title>
</head>
<body>

	<h2>Alta de Turno</h2>
	<form action="" method="post">
		<?php foreach( $this->clientes as $c ) { ?>
			<span><span class="nombres-azulados">Cliente: </span><?= $c['nombre'] . " " . $c['apellido'] ?></span>
		<?php } ?>
		</br>
		<?php foreach( $this->mascotas as $m ) { ?>
			<span><span class="nombres-azulados">Mascota: </span><?= $m['nombre'] ?></span>
		<?php } ?>
		</br>
		<label class="nombres-azulados" for="f">Fecha: </label>
		<input size="2" type="text" name="fechaDia" placeholder="DD" id="f">
		<input size="2" type="text" name="fechaMes" placeholder="MM" id="f">
		<input size="4" type="text" name="fechaAnio" placeholder="AAAA" id="f">
		</br>
		<label class="nombres-azulados" for="h">Horario (Formato 24hs.): </label>
		<input size="2" type="text" name="horarioHH" placeholder="HH" id="h">
		<input size="2" type="text" name="horarioMM" placeholder="MM" id="h">
		</br></br>
		
		<label for="m" class="subtitulo">Servicios: </label>
		</br>
		<?php foreach( $this->servicios as $s ) { ?>
			<label for="<?=$s['descripcion']?>"><?=$s['descripcion'] ." ($". $s['precio_unitario'] .")"?></label>
			<input type="radio" name="motivo" value="<?=$s['descripcion']?>" id="<?=$s['descripcion']?>">
			</br>
		<?php } ?>

		</br></br>
		
		<label for="m" class="subtitulo">Prestaciones Médicas: </label>
		</br>
		<?php foreach( $this->prestaciones as $p ) { ?>
			<label for="<?=$p['descripcion']?>"><?=$p['descripcion'] ." ($". $p['precio_unitario'] .")"?></label>
			<input type="radio" name="motivo" value="<?=$p['descripcion']?>" id="<?=$p['descripcion']?>">
			</br>
		<?php } ?>
		
		</br></br>
		
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="hidden" name="idMascota" value="<?=$_POST['idMascota']?>">
		<input type="submit" value="Confirmar" class="boton-bien">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

</body>
</html>