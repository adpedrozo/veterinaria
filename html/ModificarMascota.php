<!DOCTYPE html>
<!-- html/ModificarMascota.php -->
<html>
<head>
	<title>Modificar Mascota</title>
</head>
<body>

	<h2>Modificar Mascota</h2>
	<form action="" method="post">
		<?php foreach( $this->mascotas as $m ) { ?>
			<label for="n">Nombre: </label>
			<input type="text" name="nombre" value="<?= $m['nombre'] ?>" id="n">
			</br>
			<label for="r">Raza: </label>
			<select name="idRaza" id="r">
				<?php foreach( $this->razas as $r ) { ?>
					<option <?php if($m['cod_raza'] == $r['cod_raza']) { ?> selected="selected" <?php } ?> 
					value="<?=$r['cod_raza']?>"><?=$r['nombre_raza']." (".$r['nombre_especie'].")"?> </option>
				<?php } ?>
			</select>
			</br>
			<label for="s">Sexo: </label>
			<label for="m">Macho </label>
			<input type="radio" <?php if($m['sexo'] == "Macho") { ?> checked <?php } ?>
				name="sexo" value="Macho" id="m">
			<label for="h">Hembra </label>
			<input type="radio" <?php if($m['sexo'] == "Hembra") { ?> checked <?php } ?>
				name="sexo" value="Hembra" id="h">
			</br>
			<label for="d">Peso (gramos): </label>
			<input type="text" name="peso" value="<?= $m['peso'] ?>" id="p">
			</br>
			<label for="t">Edad (meses): </label>
			<input type="text" name="edad" value="<?= $m['edad'] ?>" id="t">
		<?php } ?>
		</br></br>
		
		<input type="hidden" name="idMascota" value="<?=$_POST['idMascota']?>">
		<input type="submit" value="Confirmar">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

</body>
</html>