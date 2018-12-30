<!DOCTYPE html>
<!-- html/AvisoEliminarTurno.php -->
<html>
<head>
	<title>Aviso</title>
</head>
<body>

	<h2>¿Está seguro que desea eliminar el turno seleccionado?</h2>
	<form action="eliminarturno.php" method="post">
		<input type="hidden" name="idTurno" value="<?= $_POST['idTurno'] ?>">
		<input type="submit" value="Confimar">
	</form>
	</br>
	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

</body>
</html>