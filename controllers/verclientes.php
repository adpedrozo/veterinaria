<?php

// controllers/verclientes.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/ListaClientes.php';
require '../views/QuitarFiltrosClientes.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){
	$c = new Clientes;
	$todos = $c->getTodos();

	$ver = new ListaClientes;
	$ver->clientes = $todos;
	$ver->render();
}
else{
	if($_GET['busqueda'] == "porapellido"){

		$l = new QuitarFiltrosClientes;
		$l->render();
		
		$c = new Clientes;
		$todos = $c->getClientesPorApellido($_GET['datos']);

		$ver = new ListaClientes;
		$ver->clientes = $todos;
		$ver->render();
	}
	if($_GET['busqueda'] == "pordoc"){

		$l = new QuitarFiltrosClientes;
		$l->render();
		
		$c = new Clientes;
		$todos = $c->getClientesPorDoc($_GET['datos']);

		$ver = new ListaClientes;
		$ver->clientes = $todos;
		$ver->render();
	}
}
