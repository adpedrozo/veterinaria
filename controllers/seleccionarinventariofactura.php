<?php

// controllers/seleccionarinventariofactura.php

require '../fw/fw.php';
require '../models/Productos.php';
require '../models/Servicios.php';
require '../models/Vacunas.php';
require '../models/PrestacionesMedicas.php';
require '../views/Estilos.php';
require '../views/SeleccionarInventarioFactura.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){
	$p = new Productos;
	$pTodos = $p->getTodos();

	$s = new Servicios;
	$sTodos = $s->getTodos();

	$pm = new PrestacionesMedicas;
	$pmTodos = $pm->getTodos();

	$v = new Vacunas;
	$vTodos = $v->getTodos();

	$ver = new SeleccionarInventarioFactura;
	$ver->productos = $pTodos;
	$ver->vacunas = $vTodos;
	$ver->prestaciones = $pmTodos;
	$ver->servicios = $sTodos;
	$ver->render();
}