<?php

// controllers/seleccionarmascota.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Mascotas.php';
require '../views/Estilos.php';
require '../views/SeleccionarMascota.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idCliente'])){
	$c = new Clientes;
	if ( !$c->validar($_POST['idCliente']) ) die("ERROR con Cliente.");

	$m = new Mascotas;
	$todos = $m->getMascotasPorCliente($_POST['idCliente']);

	$ver = new SeleccionarMascota;
	$ver->mascotas = $todos;
	$ver->render();
}
