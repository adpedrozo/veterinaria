<!DOCTYPE html>
<!-- html/AltaCredito.php -->
<html>
<head>
	<title>Alta Credito</title>
</head>
<body>

	<h2>Generando nuevo crédito por devolución de producto:</h2>
	<form action="" method="post">
		<?php foreach( $this->productos as $p ) { ?>
			<span><span class="nombres-azulados">Nombre de Producto: </span><?=$p['nombre_producto']?></span>
			</br>
			<span class="nombres-azulados">Cantidad a Devolver: </span>
			<input type="text" name="cantDevuelta" id="cantidadBox" onchange="costoTotal(); costoTotal2();">
			</br>
			<span><span class="nombres-azulados">Precio del Producto: </span>$ <?=$p['precio_unitario']?></span>
			</br></br>
			<span><span class="nombres-azulados">Monto del Crédito: </span><span id="datojs"></span>
			</br>
			</br>
			<span><span class="nombres-azulados">Para Cliente: </span>
			<?php foreach( $this->clientes as $c ) { ?>
				<span><?=$c['apellido'] . ", " . $c['nombre']?></span>
			<?php } ?>
			</br></br>
			<textarea rows="4" cols="50" name="descrip" id="mot" placeholder="Escriba aquí el motivo de la devolución..."></textarea>

		</br></br>
		
		<input type="hidden" name="monto" value="" id="datojs2">
		<input type="hidden" name="idProducto" value="<?=$_POST['idProducto']?>">
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="submit" value="Confirmar" class="boton-bien" onmouseover="costoTotal();">
		<?php } ?>
	</form>

	<form action="verinventario.php">
		<input type="submit" value="Cancelar" class="boton-atencion">
	</form>

<script type="text/javascript">
	
	function costoTotal() {
	    var x = document.getElementById("cantidadBox").value;
	    document.getElementById("datojs").innerHTML = "$ " + x * <?= $p['precio_unitario'] ?> ;
	}

	function costoTotal2() {
	    var x = document.getElementById("cantidadBox").value;
	    document.getElementById("datojs2").value = x * <?= $p['precio_unitario'] ?> ;
	}

</script>

</body>
</html>