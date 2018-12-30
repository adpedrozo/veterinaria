<?php

// controllers/eliminarcliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/BajaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idCliente'])){

	$c = new Clientes;
	$c->borrarCliente($_POST['idCliente']);

	$ver = new BajaOk;
	$ver->render();
}