<?php

// controllers/modificarmascota.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../models/Mascotas.php';
require '../models/Razas.php';
require '../views/ModificarMascota.php';
require '../views/UpdateOk.php';

$menu = new Estilos;
$menu->render();

if(!isset($_POST['idMascota'])){
	die("ERROR con el ID de Mascota.");
}
else{
	if(!isset($_POST['idMascota'])) die("ERROR con ID de Mascota.");
	
	$m = new Mascotas;
	if( !$m->validar($_POST['idMascota']) ) die("ERROR con ID de Mostrar.");

	if( isset($_POST['nombre']) &&
		isset($_POST['idRaza']) &&
		isset($_POST['peso']) &&
		isset($_POST['sexo']) &&
		isset($_POST['edad']) ) {

			$m->updateMascotas($_POST['idMascota'],
							$_POST['nombre'],
							$_POST['idRaza'],
							$_POST['peso'],
							$_POST['sexo'],
							$_POST['edad'] );

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}

	/* render de los datos a modificar */
	$r = new Razas;
	$rTodas = $r->getOrdenadasPorEspecie();

	$mascot = $m->getMascotaById($_POST['idMascota']);

	$formUpdateMascota = new ModificarMascota;
	$formUpdateMascota->mascotas = $mascot;
	$formUpdateMascota->razas = $rTodas;

	$formUpdateMascota->render();
}
