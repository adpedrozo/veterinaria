<?php

// controllers/crearturno.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Mascotas.php';
require '../models/Servicios.php';
require '../models/Turnos.php';
require '../models/PrestacionesMedicas.php';
require '../views/Estilos.php';
require '../views/AltaTurno.php';
require '../views/AltaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['fechaDia'])){
	if(!isset($_POST['fechaMes'])) die("ERROR con Fecha.");
	if(!isset($_POST['fechaAnio'])) die("ERROR con Fecha.");

	if(!isset($_POST['horarioHH'])) die("ERROR con Horario.");
	if(!isset($_POST['horarioMM'])) die("ERROR con Horario.");

	if(!isset($_POST['motivo'])) die("ERROR con Motivo del Turno.");
	if(!isset($_POST['idCliente'])) die("ERROR con Cliente.");
	if(!isset($_POST['idMascota'])) die("ERROR con Mascota.");

	$t = new Turnos;
	$t->setTurnos($_POST['fechaDia'],
					$_POST['fechaMes'],
					$_POST['fechaAnio'],
					$_POST['horarioHH'],
					$_POST['horarioMM'],
					$_POST['motivo'],
					$_POST['idCliente'],
					$_POST['idMascota']);

	$ok = new AltaOk;
	$ok->render();
	exit;

}

if(isset($_POST['idCliente']) && isset($_POST['idMascota'])){
	$s = new Servicios;
	$sTodos = $s->getTodos();
	$pm = new PrestacionesMedicas;
	$pmTodos = $pm->getTodos();

	$c = new Clientes;
	if(!$c->validar($_POST['idCliente'])) die("ERROR con Cliente.");
	$duenio = $c->getClienteById($_POST['idCliente']);

	$m = new Mascotas;
	if(!$m->validar($_POST['idMascota'])) die("ERROR con Mascota.");
	$mascot = $m->getMascotaById($_POST['idMascota']);

	$formAltaTurno = new AltaTurno;
	$formAltaTurno->servicios = $sTodos;
	$formAltaTurno->prestaciones = $pmTodos;
	$formAltaTurno->clientes = $duenio;
	$formAltaTurno->mascotas = $mascot;
	$formAltaTurno->render();	
}
