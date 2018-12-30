<!DOCTYPE html>
<!-- html/AvisoEliminarCliente.php -->
<html>
<head>
	<title>Aviso</title>
</head>
<body>

	<h2>¿Está seguro que desea eliminar el cliente seleccionado?</h2>
	<form action="eliminarcliente.php" method="post">
		<input type="hidden" name="idCliente" value="<?= $_POST['idCliente'] ?>">
		<input type="submit" value="Confimar">
	</form>
	</br>
	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

</body>
</html>