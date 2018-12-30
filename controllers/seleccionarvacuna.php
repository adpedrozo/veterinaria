<?php

// controllers/seleccionarvacuna.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Mascotas.php';
require '../models/Vacunas.php';
require '../views/Estilos.php';
require '../views/SeleccionarVacuna.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idCliente']) && isset($_POST['idMascota'])){
	$c = new Clientes;
	if ( !$c->validar($_POST['idCliente']) ) die("ERROR con Cliente.");

	$m = new Mascotas;
	if (!$m->validar($_POST['idMascota']) ) die("ERROR con Mascota.");

	$v = new Vacunas;
	$todos = $v->getTodos();

	$ver = new SeleccionarVacuna;
	$ver->vacunas = $todos;
	$ver->render();
}
