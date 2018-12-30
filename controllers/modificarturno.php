<?php

// controllers/modificarturno.php

require '../fw/fw.php';
require '../models/Turnos.php';
require '../models/Servicios.php';
require '../models/PrestacionesMedicas.php';
require '../views/Estilos.php';
require '../views/ModificarTurno.php';
require '../views/UpdateOk.php';

$menu = new Estilos;
$menu->render();

if(!isset($_POST['idTurno'])){
	die("ERROR con el ID del Turno.");
}
else{
	if(!isset($_POST['idTurno'])) die("ERROR con ID de Turno.");
	
	$t = new Turnos;
	if( !$t->validar($_POST['idTurno']) ) die("ERROR con ID de Turno.");

	if( isset($_POST['fechaDia']) &&
		isset($_POST['fechaMes']) &&
		isset($_POST['fechaAnio']) &&
		isset($_POST['horarioHH']) &&
		isset($_POST['horarioMM']) &&
		isset($_POST['motivo']) ) {

			$t->updateTurnos($_POST['idTurno'],
							$_POST['fechaDia'],
							$_POST['fechaMes'],
							$_POST['fechaAnio'],
							$_POST['horarioHH'],
							$_POST['horarioMM'],
							$_POST['motivo']);

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}

	/* render de los datos del turno a modificar */
	$s = new Servicios;
	$sTodos = $s->getTodos();
	$pm = new PrestacionesMedicas;
	$pmTodos = $pm->getTodos();

	$turn = $t->getTurnoById($_POST['idTurno']);

	$dia = $t->getDia($_POST['fecha']);
	$mes = $t->getMes($_POST['fecha']);
	$anio = $t->getAnio($_POST['fecha']);
	$hora = $t->getHora($_POST['horario']);
	$minutos = $t->getMinutos($_POST['horario']);

	$formUpdateTurno = new ModificarTurno;
	$formUpdateTurno->servicios = $sTodos;
	$formUpdateTurno->prestaciones = $pmTodos;
	$formUpdateTurno->turnos = $turn;
	$formUpdateTurno->dia = $dia;
	$formUpdateTurno->mes = $mes;
	$formUpdateTurno->anio = $anio;
	$formUpdateTurno->hora = $hora;
	$formUpdateTurno->minutos = $minutos;

	$formUpdateTurno->render();
}
