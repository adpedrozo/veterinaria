<?php

// controllers/verconfirmacioncliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/AvisoEliminarCliente.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idCliente'])){

	$c = new Clientes;
	if( !$c->validar($_POST['idCliente']) ) die("ERROR con el ID de Cliente.");

	$ver = new AvisoEliminarCliente;
	$ver->render();	
}