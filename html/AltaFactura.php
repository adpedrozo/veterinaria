<!DOCTYPE html>
<!-- html/AltaFactura.php -->
<html>
<head>
	<title>Alta de Factura</title>
</head>
<body>

	<h2>Alta de Factura</h2>
	<form action="" method="post">
		<?php foreach( $this->clientes as $c ) { ?>
			<span>Cliente: <?= $c['nombre'] . " " . $c['apellido'] ?></span>
		<?php } ?>
		</br>
		<span><span>Categoría: </span>Consumidor Final</span>
		</br></br>

	<?php $name = $_POST['art']; ?>

	<table>
		<tr>
			<th>Artículo/Servicio</th>
			<th>Precio Unitario</th>
			<th>Cantidad</th>
			<th>Importe</th>
		</tr>
		<?php foreach( $name as $art ) { ?>
			<tr>
			<td><?=$art?></td>
			<td>
				<?php foreach( $this->productos as $p ) {
					if ( $art == $p['nombre_producto'] ) {
						$acum = $acum + $p['precio_unitario']; ?>
						<span>$ <?=$p['precio_unitario']?></span>
						<?php if ( $_POST['cantP'] == "" ) { ?>
							<td><?=$_POST['cantP']?></td>
				<?php } }
				} ?>
				<?php foreach( $this->servicios as $s ) {
					if ( $art == $s['descripcion'] ) {
						$acum = $acum + $s['precio_unitario']; ?>
						<span>$ <?=$s['precio_unitario']?></span>
						<td><?=$_POST['cantS']?></td>
				<?php }
				} ?>
				<?php foreach( $this->prestaciones as $pm ) {
					if ( $art == $pm['descripcion'] ) {
						$acum = $acum + $pm['precio_unitario']; ?>
						<span>$ <?=$pm['precio_unitario']?></span>
						<td><?=$_POST['cantPM']?></td>
				<?php }
				} ?>
				<?php foreach( $this->vacunas as $v ) {
					if ( $art == $v['descripcion'] ) {
						$acum = $acum + $v['precio_unitario']; ?>
						<span>$ <?=$v['precio_unitario']?></span>
						<td><?=$_POST['cantV']?></td>
				<?php }
				} ?>
			</td>
			<td id="total">total</td>
			</tr>
		<?php } ?>
			
	</table>


		</br></br>
		
		<input type="hidden" name="idCliente" value="<?=$_POST['idCliente']?>">
		<input type="submit" value="Confirmar">

	</form>

	<form action="verinicio.php">
		<input type="submit" value="Cancelar">
	</form>

<script type="text/javascript">
	
	document.getElementById("selectArt").selectedIndex = -1;

	function calcular() {
    var x = document.getElementById("cantidadBox").value;
    document.getElementById("total").innerHTML = "$ " + x * <?= $p['precio_unitario'] ?> ;
	}

</script>

</body>
</html>