<!DOCTYPE html>
<!-- html/AltaCliente.php -->
<html>
<head>
	<title>Alta de Cliente</title>
</head>
<body>

	<h2>Alta de Cliente</h2>
	<form action="" method="post">
		<label for="n" class="nombres-azulados">Nombre: </label>
		<input type="text" name="nombre" id="n">
		</br>
		<label for="a" class="nombres-azulados">Apellido: </label>
		<input type="text" name="apellido" id="a">
		</br>
		<label for="doc1" class="nombres-azulados">Tipo de Documento: </label>
		<select name="tipoDoc" id="doc1">
			<option value="DNI">D.N.I.</option>
			<option value="LC">Libreta Cívica</option>
			<option value="LE">Libreta de Enrolamiento</option>
			<option value="CI">Cédula de Identidad</option>
		</select>
		</br>
		<label for="doc2" class="nombres-azulados">Nº de Documento: </label>
		<input type="text" name="numDoc" id="doc2">
		</br>
		<label for="d" class="nombres-azulados">Dirección: </label>
		<input type="text" name="direccion" id="d">
		</br>
		<label for="t" class="nombres-azulados">Teléfono: </label>
		<input type="text" name="telefono" id="t">
		</br>
		<label for="em" class="nombres-azulados">E-mail: </label>
		<input type="text" name="email" id="em">
		</br></br>
		
		<input type="submit" value="Confirmar" class="boton-bien">
	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

</body>
</html>