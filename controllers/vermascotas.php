<?php

// controllers/vermascotas.php

require '../fw/fw.php';
require '../models/Mascotas.php';
require '../views/Estilos.php';
require '../views/ListaMascotas.php';
require '../views/QuitarFiltrosMascotas.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){
	$m = new Mascotas;
	$todos = $m->getMascotas();

	$ver = new ListaMascotas;
	$ver->mascotas = $todos;
	$ver->render();
}
else {
	if($_GET['busqueda'] == "pornombre"){

		$l = new QuitarFiltrosMascotas;
		$l->render();
	
		$m = new Mascotas;
		$todos = $m->getMascotasPorNombre($_GET['datos']);

		$ver = new ListaMascotas;
		$ver->mascotas = $todos;
		$ver->render();
	}
	if($_GET['busqueda'] == "porapellido"){

		$l = new QuitarFiltrosMascotas;
		$l->render();
	
		$m = new Mascotas;
		$todos = $m->getMascotasPorApellido($_GET['datos']);

		$ver = new ListaMascotas;
		$ver->mascotas = $todos;
		$ver->render();
	}
}