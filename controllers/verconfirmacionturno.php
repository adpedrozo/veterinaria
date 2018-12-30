<?php

// controllers/verconfirmacionturno.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../views/Estilos.php';
require '../views/AvisoEliminarTurno.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idTurno'])){

	$t = new Turnos;
	if( !$t->validar($_POST['idTurno']) ) die("ERROR con el ID de Turno.");

	$ver = new AvisoEliminarTurno;
	$ver->render();	
}