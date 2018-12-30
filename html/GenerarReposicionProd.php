<!DOCTYPE html>
<!-- html/GenerarReposicion.php -->
<html>
<head>
	<title>Generar Reposición</title>
</head>
<body>

	<h2>Generar Reposición de Producto</h2>
	<form action="mailto:<?=$_POST['email']?>" method="post" enctype="text/plain">
		<?php foreach( $this->productos as $p ) { ?>
			<span><span class="nombres-azulados">Nombre de Producto: </span><?= $p['nombre_producto'] ?></span>
			</br>
			<span><span class="nombres-azulados">Proveedor: </span><?= $p['razon_social'] ?></span>
			</br>
			<span><span class="nombres-azulados">E-Mail: </span><?= $p['email'] ?></span>
			</br>
			<span><span class="nombres-azulados">Precio de Costo Unitario: </span>$ <?= $p['precio_costo'] ?></span>
			</br>
			<span class="nombres-azulados">Cantidad a Reponer: </span>
			<input type="text" name="Cantidad_Pedida" id="cantidadBox" onchange="costoTotal()">
			</br></br></br>
			<span><span class="nombres-azulados">Precio de Costo Total: </span><span id="datojs"> </span>
			
			<input type="hidden" name="email" value="<?=$p['email']?>">
		<?php } ?>
		</br></br>
		
		<input type="hidden" name="Nombre_del_Producto" value="<?=$p['nombre_producto']?>">
		<input type="submit" value="Enviar Solicitud" class="boton-bien" onmouseover="costoTotal();">
	</form>

	<form action="verinventario.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

<script type="text/javascript">
	
function costoTotal() {
    var x = document.getElementById("cantidadBox").value;
    document.getElementById("datojs").innerHTML = "$ " + x * <?= $p['precio_costo'] ?> ;
}

</script>

</body>
</html>