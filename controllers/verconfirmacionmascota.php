<?php

// controllers/verconfirmacioncliente.php

require '../fw/fw.php';
require '../models/Mascotas.php';
require '../views/Estilos.php';
require '../views/AvisoEliminarMascota.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idMascota'])){

	$m = new Mascotas;
	if( !$m->validar($_POST['idMascota']) ) die("ERROR con el ID de Mascota.");

	$ver = new AvisoEliminarMascota;
	$ver->render();	
}