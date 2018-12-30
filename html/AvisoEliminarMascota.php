<!DOCTYPE html>
<!-- html/AvisoEliminarMascota.php -->
<html>
<head>
	<title>Aviso</title>
</head>
<body>

	<h2>¿Está seguro que desea eliminar la mascota seleccionada?</h2>
	<form action="eliminarmascota.php" method="post">
		<input type="hidden" name="idMascota" value="<?= $_POST['idMascota'] ?>">
		<input type="submit" value="Confimar">
	</form>
	</br>
	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

</body>
</html>