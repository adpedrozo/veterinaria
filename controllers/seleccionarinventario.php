<?php

// controllers/seleccionarinventario.php

require '../fw/fw.php';
require '../models/Productos.php';
require '../models/Vacunas.php';
require '../models/Servicios.php';
require '../models/PrestacionesMedicas.php';
require '../views/Estilos.php';
require '../views/SeleccionarInventario.php';
require '../views/QuitarFiltrosInventario.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){
	$p = new Productos;
	$pTodos = $p->getTodosConProveedor();

	$v = new Vacunas;
	$vTodos = $v->getTodosConProveedor();

	$s = new Servicios;
	$sTodos = $s->getTodos();

	$pm = new PrestacionesMedicas;
	$pmTodos = $pm->getTodos();

	$ver = new SeleccionarInventario;
	$ver->productos = $pTodos;
	$ver->vacunas = $vTodos;
	$ver->servicios = $sTodos;
	$ver->prestaciones = $pmTodos;
	$ver->render();
}