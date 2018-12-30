<?php

// controllers/crearraza.php

require '../fw/fw.php';
require '../models/Razas.php';
require '../models/Especies.php';
require '../views/Estilos.php';
require '../views/AltaRaza.php';
require '../views/AltaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['nombre'])){
	if(!isset($_POST['idEspecie'])) die("ERROR con Especie.");

	$r = new Razas;
	$r->setRazas($_POST['nombre'],$_POST['idEspecie']);

	$ok = new AltaOk;
	$ok->render();
	exit;

}

$e = new Especies;
$eTodas = $e->getTodos();

$formAltaRaza = new AltaRaza;
$formAltaRaza->especies = $eTodas;
$formAltaRaza->render();