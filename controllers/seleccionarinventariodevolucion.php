<?php

// controllers/seleccionarinventariodevolucion.php

require '../fw/fw.php';
require '../models/Productos.php';
require '../views/Estilos.php';
require '../views/SeleccionarInventarioDevolucion.php';
require '../views/QuitarFiltrosInventario.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){
	$p = new Productos;
	$pTodos = $p->getTodosConProveedor();

	$ver = new SeleccionarInventarioDevolucion;
	$ver->productos = $pTodos;
	$ver->render();
}