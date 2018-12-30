<?php

// controllers/modificarinventario.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../models/Productos.php';
require '../models/Vacunas.php';
require '../models/Servicios.php';
require '../models/PrestacionesMedicas.php';
require '../views/ModificarInventario.php';
require '../views/UpdateOk.php';

$menu = new Estilos;
$menu->render();

if(!isset($_POST['idProducto']) && !isset($_POST['idVacuna']) &&
	!isset($_POST['idServicio']) && !isset($_POST['idPrestacion']) ){
	die("ERROR con el ID del Item a Modificar.");
}

if(isset($_POST['idProducto']) && !isset($_POST['idVacuna']) &&
	!isset($_POST['idServicio']) && !isset($_POST['idPrestacion'])){

	$p = new Productos;
	if( !$p->validar($_POST['idProducto']) ) die("ERROR con ID del Producto.");

	if( isset($_POST['nombre']) &&
		isset($_POST['precio']) &&
		isset($_POST['stock']) &&
		isset($_POST['puntoRep']) ) {

			$p->updateProductos($_POST['idProducto'],
							$_POST['nombre'],
							$_POST['precio'],
							$_POST['stock'],
							$_POST['puntoRep'] );

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}
	/* render de los datos a modificar */

	$inv = $p->getProductoById($_POST['idProducto']);

	$formUpdateProducto = new ModificarInventario;
	$formUpdateProducto->inventario = $inv;

	$formUpdateProducto->render();
}

if(isset($_POST['idVacuna']) && !isset($_POST['idProducto']) &&
	!isset($_POST['idServicio']) && !isset($_POST['idPrestacion'])){

	$v = new Vacunas;
	if( !$v->validar($_POST['idVacuna']) ) die("ERROR con ID de Vacuna.");

	if( isset($_POST['descrip']) &&
		isset($_POST['precio']) &&
		isset($_POST['stock']) &&
		isset($_POST['puntoRep']) ) {

			$v->updateVacunas($_POST['idVacuna'],
							$_POST['descrip'],
							$_POST['precio'],
							$_POST['stock'],
							$_POST['puntoRep'] );

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}
	/* render de los datos a modificar */

	$inv = $v->getVacunaById($_POST['idVacuna']);

	$formUpdateVacuna = new ModificarInventario;
	$formUpdateVacuna->inventario = $inv;

	$formUpdateVacuna->render();
}

if(!isset($_POST['idVacuna']) && !isset($_POST['idProducto']) &&
	isset($_POST['idServicio']) && !isset($_POST['idPrestacion'])){

	$s = new Servicios;
	if(!$s->validar($_POST['idServicio'])) die("ERROR con ID de Servicio.");

	if( isset($_POST['descrip']) &&
		isset($_POST['precio']) ) {

			$s->updateServicio($_POST['idServicio'],
							$_POST['descrip'],
							$_POST['precio'] );

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}
	/* render de los datos a modificar */
	$inv = $s->getServicioById($_POST['idServicio']);

	$formUpdate = new ModificarInventario;
	$formUpdate->inventario = $inv;

	$formUpdate->render();
}

if(!isset($_POST['idVacuna']) && !isset($_POST['idProducto']) &&
	!isset($_POST['idServicio']) && isset($_POST['idPrestacion'])){

	$pm = new PrestacionesMedicas;
	if(!$pm->validar($_POST['idPrestacion'])) die("ERROR con ID de Prestación.");

	if( isset($_POST['descrip']) &&
		isset($_POST['precio']) ) {

			$pm->updatePrestacion($_POST['idPrestacion'],
							$_POST['descrip'],
							$_POST['precio'] );

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}
	/* render de los datos a modificar */
	$inv = $pm->getPrestacionById($_POST['idPrestacion']);

	$formUpdate = new ModificarInventario;
	$formUpdate->inventario = $inv;

	$formUpdate->render();
}