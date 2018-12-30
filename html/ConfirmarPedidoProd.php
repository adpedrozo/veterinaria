<!DOCTYPE html>
<!-- html/ConfirmarPedidoProd.php -->
<html>
<head>
	<title>Confirmar Pedido Producto</title>
</head>
<body>

	<h2>E-mail enviado con éxito.</h2>
	<form action="" method="post">
		<?php foreach( $this->productos as $p ) { ?>
			<span><span class="nombres-azulados">Proveedor: </span><?= $p['razon_social'] ?></span>
			</br>
			<span><span class="nombres-azulados">E-Mail: </span><?= $p['email'] ?></span>
			</br>
			<span><span class="nombres-azulados">Teléfono: </span><?= $p['telefono'] ?></span>
			</br>
			<span><span class="nombres-azulados">Persona de Contacto: </span><?= $p['nombre_contacto'] ?></span>
			</br></br>
			<span><span class="nombres-azulados">Importe de Pedido de Reposición:
					</span>$ <?= $p['precio_costo'] * $_POST['cantPedida'] ?></span>
			</br>
			<span><span class="nombres-azulados">Nombre de Producto: </span><?= $p['nombre_producto'] ?></span>
			</br>
				
		
		<?php } ?>
		</br></br>

	</form>

	<form action="verinventario.php">
		<input type="submit" value="Aceptar">
	</form>

</body>
</html>