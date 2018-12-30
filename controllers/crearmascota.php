<?php

// controllers/crearmascota.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Mascotas.php';
require '../models/Razas.php';
require '../views/Estilos.php';
require '../views/AltaMascota.php';
require '../views/AltaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['nombre'])){
	if(!isset($_POST['idRaza'])) die("ERROR con Raza.");
	if(!isset($_POST['idCliente'])) die("ERROR con Cliente.");
	if(!isset($_POST['sexo'])) die("ERROR con Sexo.");
	if(!isset($_POST['peso'])) die("ERROR con Peso.");
	if(!isset($_POST['edad'])) die("ERROR con Edad.");

	$m = new Mascotas;
	$m->setMascota($_POST['nombre'],
					$_POST['idRaza'],
					$_POST['idCliente'],
					$_POST['sexo'],
					$_POST['peso'],
					$_POST['edad']);

	$ok = new AltaOk;
	$ok->render();
	exit;
}

if (isset($_POST['idCliente'])){
	$c = new Clientes;
	if(!$c->validar($_POST['idCliente'])) die("ERROR con Cliente.");
	$duenio = $c->getClienteById($_POST['idCliente']);

	$r = new Razas;
	$todos = $r->getOrdenadasPorEspecie();

	$formAltaMascota = new AltaMascota;
	$formAltaMascota->clientes = $duenio;
	$formAltaMascota->razas = $todos;
	$formAltaMascota->render();	
}