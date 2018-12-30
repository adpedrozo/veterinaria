<?php

// controllers/verturnos.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../views/Estilos.php';
require '../views/ListaTurnos.php';
require '../views/QuitarFiltrosTurnos.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){

	$t = new Turnos;
	$todos = $t->getTurnosCompletos();

	$ver = new ListaTurnos;
	$ver->turnos = $todos;
	$ver->render();

}
else{
	if($_GET['busqueda'] == "porfecha"){

		$l = new QuitarFiltrosTurnos;
		$l->render();

		$t = new Turnos;
		$todos = $t->getTurnosPorFecha($_GET['datos']);

		$ver = new ListaTurnos;
		$ver->turnos = $todos;
		$ver->render();
	}
	if($_GET['busqueda'] == "pornombre"){

		$l = new QuitarFiltrosTurnos;
		$l->render();

		$t = new Turnos;
		$todos = $t->getTurnosPorMascota($_GET['datos']);

		$ver = new ListaTurnos;
		$ver->turnos = $todos;
		$ver->render();
	}
	if($_GET['busqueda'] == "porapellido"){

		$l = new QuitarFiltrosTurnos;
		$l->render();

		$t = new Turnos;
		$todos = $t->getTurnosPorApellido($_GET['datos']);

		$ver = new ListaTurnos;
		$ver->turnos = $todos;
		$ver->render();
	}
}
