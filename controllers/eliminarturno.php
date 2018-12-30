<?php

// controllers/eliminarturno.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../views/Estilos.php';
require '../views/BajaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idTurno'])){

	$t = new Turnos;
	$t->borrarTurno($_POST['idTurno']);

	$ver = new BajaOk;
	$ver->render();
}