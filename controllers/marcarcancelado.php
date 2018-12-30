<?php

// controllers/marcarcancelado.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../views/Estilos.php';
require '../views/ListaTurnos.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idTurno']) && isset($_POST['fecha'])){

	$t = new Turnos;
	$t->marcarCancelado($_POST['idTurno'],$_POST['fecha']);

	$todos = $t->getTurnosCompletos();

	$ver = new ListaTurnos;
	$ver->turnos = $todos;
	$ver->render();
}