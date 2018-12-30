<?php

// controllers/crearmascota.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Mascotas.php';
require '../models/Vacunas.php';
require '../models/CronogramaVacunacion.php';
require '../views/Estilos.php';
require '../views/AltaCronograma.php';
require '../views/AltaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['fechaDia'])){
	if(!isset($_POST['fechaMes'])) die("ERROR con Fecha.");
	if(!isset($_POST['fechaAnio'])) die("ERROR con Fecha.");

	if(!isset($_POST['idCliente'])) die("ERROR con Cliente.");
	if(!isset($_POST['idMascota'])) die("ERROR con Mascota.");

	$cv = new CronogramaVacunacion;
	$cv->setCronograma($_POST['fechaDia'],
					$_POST['fechaMes'],
					$_POST['fechaAnio'],
					$_POST['idCliente'],
					$_POST['idMascota'],
					$_POST['idVacuna'] );

	$ok = new AltaOk;
	$ok->render();
	exit;

}

if (isset($_POST['idCliente']) &&
	isset($_POST['idMascota']) &&
	isset($_POST['idVacuna'])){

	$c = new Clientes;
	if(!$c->validar($_POST['idCliente'])) die("ERROR con Cliente.");
	$duenio = $c->getClienteById($_POST['idCliente']);

	$m = new Mascotas;
	if(!$m->validar($_POST['idMascota'])) die("ERROR con Mascota.");
	$mascot = $m->getMascotaById($_POST['idMascota']);

	$v = new Vacunas;
	if(!$v->validar($_POST['idVacuna'])) die("ERROR con Vacuna.");
	$vac = $v->getVacunaById($_POST['idVacuna']);

	$form = new AltaCronograma;
	$form->clientes = $duenio;
	$form->vacunas = $vac;
	$form->mascotas = $mascot;
	$form->render();
}