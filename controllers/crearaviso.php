<?php

// controllers/crearaviso.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/CronogramaVacunacion.php';
require '../views/Estilos.php';
require '../views/FechaMal.php';
require '../views/ListaCronogramas.php';
require '../views/SinVencimientos.php';

$menu = new Estilos;
$menu->render();

if( date("l") == "Friday" && date("H") == 20 ){

	$cv = new CronogramaVacunacion;
	if(!$cv->revisarCronogramas()){
		$b = new SinVencimientos;
		$b->render();
	}

	$todos = $cv->getCronogramasVencidos();
	$info = new ListaCronogramas;
	$info->cronogramas = $todos;
	$info->render();
}
else { 

	$a = new FechaMal;
	$a->render();

 }