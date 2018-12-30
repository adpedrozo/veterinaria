<?php

// controllers/crearcliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/AltaCliente.php';
require '../views/AltaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['nombre'])){
	if(!isset($_POST['apellido'])) die("ERROR con Apellido.");
	if(!isset($_POST['tipoDoc'])) die("ERROR con Tipo de Documento.");
	if(!isset($_POST['numDoc'])) die("ERROR con Nº de Documento.");
	if(!isset($_POST['direccion'])) die("ERROR con Dirección.");
	if(!isset($_POST['telefono'])) die("ERROR con Teléfono.");
	if(!isset($_POST['email'])) die("ERROR con E-Mail.");

	$c = new Clientes;
	$c->setCliente($_POST['nombre'],
					$_POST['apellido'],
					$_POST['tipoDoc'],
					$_POST['numDoc'],
					$_POST['direccion'],
					$_POST['telefono'],
					$_POST['email']);

	$ok = new AltaOk;
	$ok->render();
	exit;

}

$formAltaCliente = new AltaCliente;
$formAltaCliente->render();