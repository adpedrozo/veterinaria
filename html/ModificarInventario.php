<!DOCTYPE html>
<!-- html/ModificarInventario.php -->
<html>
<head>
	<title>Modificar Inventario</title>
</head>
<body>

	<h2>Modificar Datos</h2>
	<form action="" method="post">
		<?php foreach( $this->inventario as $i ) { ?>
			<label class="nombres-azulados" for="n">Nombre/Descripción: </label>
			<?php if(isset($i['cod_producto'])) { ?>
				<input type="text" size="45" name="nombre" value="<?= $i['nombre_producto'] ?>" id="n">
			<?php } else { ?>
					<input type="text" size="45" name="descrip" value="<?= $i['descripcion'] ?>" id="n">
					<?php } ?>
			</br>
			<label class="nombres-azulados" for="a">Precio Unitario ($): </label>
			<input type="text" size="10" name="precio" value="<?= $i['precio_unitario'] ?>" id="a">
			</br>
			<?php if( isset($i['cod_producto']) || isset($i['cod_vacuna']) ) { ?>
				<label class="nombres-azulados" for="doc2">Stock Disponible: </label>
				<input type="text" size="10" name="stock" value="<?= $i['stock'] ?>" id="doc2">
				</br>
				<label class="nombres-azulados" for="d">Punto de Reposición: </label>
				<input type="text" size="10" name="puntoRep" value="<?= $i['punto_reposicion'] ?>" id="d">
			<?php } 
		} ?>
		</br></br>
		
		<?php if(isset($i['cod_producto'])) { ?>
			<input type="hidden" name="idProducto" value="<?=$_POST['idProducto']?>">
		<?php } ?>
		<?php if(isset($i['cod_vacuna'])) { ?>
			<input type="hidden" name="idVacuna" value="<?=$_POST['idVacuna']?>">
		<?php } ?>
		<?php if(isset($i['cod_servicio'])) { ?>
			<input type="hidden" name="idServicio" value="<?=$_POST['idServicio']?>">
		<?php } ?>
		<?php if(isset($i['cod_pm'])) { ?>
			<input type="hidden" name="idPrestacion" value="<?=$_POST['idPrestacion']?>">
		<?php } ?>
		<input type="submit" value="Confirmar" class="boton-bien">
	</form>

	<form action="seleccionarinventario.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

</body>
</html>