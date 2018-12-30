<!DOCTYPE html>
<!-- html/Inicio.php -->
<html>
<head>
	<title>Veterinaria Pedrozo</title>
	<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body>

	</br>
	<div class="centrado"><button onclick="goBack()" class="boton-volver">< VOLVER</button></div>
	</br>
	<form action="verinicio.php" class="gestiones">
		<input type="image" src="../css/botoninicio.png"
			onmouseover="this.src='../css/botoninicio2.png'"
			onmouseleave="this.src='../css/botoninicio.png'" class="boton-inicio">
	</form>

	</br><div class="separador"></div>


	<script>
		function goBack() {
		    window.history.back();
		}

	</script> 

</body>
</html>