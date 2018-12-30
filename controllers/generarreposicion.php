<?php

// controllers/generarreposicion.php

require '../fw/fw.php';
require '../models/Productos.php';
require '../models/Vacunas.php';
require '../views/Estilos.php';
require '../views/GenerarReposicionProd.php';
require '../views/ConfirmarPedidoProd.php';
require '../views/GenerarReposicionVac.php';
require '../views/ConfirmarPedidoVac.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idProducto']) && !isset($_POST['cantPedida'])){

	$p = new Productos;
	if ( !$p->validar($_POST['idProducto']) ) die("ERROR con Producto.");

	$prod = $p->getProductoById($_POST['idProducto']);

	$ver = new GenerarReposicionProd;
	$ver->productos = $prod;
	$ver->render();
}

if(isset($_POST['idProducto']) && isset($_POST['cantPedida'])){

	$p = new Productos;
	if ( !$p->validar($_POST['idProducto']) ) die("ERROR con Producto.");
	if ( !$p->validarCantidad($_POST['cantPedida']) ) die("ERROR con Cantidad Pedida.");

	$prod = $p->getProductoById($_POST['idProducto']);

	$ver = new ConfirmarPedidoProd;
	$ver->productos = $prod;
	$ver->render();
}

if(isset($_POST['idVacuna']) && !isset($_POST['cantPedida'])){

	$v = new Vacunas;
	if ( !$v->validar($_POST['idVacuna']) ) die("ERROR con Vacuna.");

	$vac = $v->getVacunaById($_POST['idVacuna']);

	$ver = new GenerarReposicionVac;
	$ver->vacunas = $vac;
	$ver->render();
}

if(isset($_POST['idVacuna']) && isset($_POST['cantPedida'])){

	$v = new Vacunas;
	if ( !$v->validar($_POST['idVacuna']) ) die("ERROR con Vacuna.");
	if ( !$v->validarCantidad($_POST['cantPedida']) ) die("ERROR con Cantidad Pedida.");

	$vac = $v->getVacunaById($_POST['idVacuna']);

	$ver = new ConfirmarPedidoVac;
	$ver->vacunas = $vac;
	$ver->render();
}

