<?php

// controllers/modificarcliente.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../models/Clientes.php';
require '../views/ModificarCliente.php';
require '../views/UpdateOk.php';

$menu = new Estilos;
$menu->render();

if(!isset($_POST['idCliente'])){
	die("ERROR con el ID del Cliente.");
}
else{
	if(!isset($_POST['idCliente'])) die("ERROR con ID del Cliente.");
	
	$c = new Clientes;
	if( !$c->validar($_POST['idCliente']) ) die("ERROR con ID del Cliente.");

	if( isset($_POST['nombre']) &&
		isset($_POST['apellido']) &&
		isset($_POST['tipoDoc']) &&
		isset($_POST['numDoc']) &&
		isset($_POST['direccion']) &&
		isset($_POST['telefono']) &&
		isset($_POST['email']) ) {

			$c->updateClientes($_POST['idCliente'],
							$_POST['nombre'],
							$_POST['apellido'],
							$_POST['tipoDoc'],
							$_POST['numDoc'],
							$_POST['direccion'],
							$_POST['telefono'],
							$_POST['email'] );

			$ok = new UpdateOk;
			$ok->render();
			exit;
	}

	/* render de los datos a modificar */

	$client = $c->getClienteById($_POST['idCliente']);

	$formUpdateCliente = new ModificarCliente;
	$formUpdateCliente->clientes = $client;

	$formUpdateCliente->render();
}
