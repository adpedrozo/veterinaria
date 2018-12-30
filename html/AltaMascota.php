<!DOCTYPE html>
<!-- html/AltaMascota.php -->
<html>
<head>
	<title>Alta de Mascota</title>
</head>
<body>

	<h2>Alta de Mascota</h2>
	<form action="" method="post">
		<?php foreach( $this->clientes as $c ) { ?>
			<span><span class="nombres-azulados">Cliente: </span><?= $c['nombre'] . " " . $c['apellido'] ?></span>
		<?php } ?>
		</br>
		<label class="nombres-azulados" for="n">Nombre: </label>
		<input type="text" name="nombre" id="n">
		</br>
		<label class="nombres-azulados" for="r">Raza: </label>
		<select name="idRaza" id="r">
			<?php foreach( $this->razas as $r ) { ?>
				<option value="<?=$r['cod_raza']?>"><?=$r['nombre_raza']." (".$r['nombre_especie'].")"?> </option>
			<?php } ?>
		</select>
		</br></br>
		<label class="nombres-azulados" for="s">Sexo: </label>
		<label for="m">Macho </label>
		<input type="radio" name="sexo" value="Macho" id="m">
		<label for="h">Hembra </label>
		<input type="radio" name="sexo" value="Hembra" id="h">
		</br></br>
		<label class="nombres-azulados" for="d">Peso (gramos): </label>
		<input type="text" name="peso" id="p">
		</br>
		<label class="nombres-azulados" for="t">Edad (meses): </label>
		<input type="text" name="edad" id="t">
		</br></br>
		
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="submit" value="Confirmar" class="boton-bien">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

</body>
</html>