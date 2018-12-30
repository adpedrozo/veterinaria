<?php

// controllers/eliminarcliente.php

require '../fw/fw.php';
require '../models/Mascotas.php';
require '../views/Estilos.php';
require '../views/BajaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idMascota'])){

	$m = new Mascotas;
	$m->borrarMascota($_POST['idMascota']);

	$ver = new BajaOk;
	$ver->render();
}