<?php

// controllers/crearcredito.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Productos.php';
require '../models/Creditos.php';
require '../views/Estilos.php';
require '../views/AltaCredito.php';
require '../views/DevolucionOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['idCliente']) &&
		isset($_POST['idProducto']) &&
		isset($_POST['monto']) &&
		isset($_POST['descrip']) &&
		isset($_POST['cantDevuelta']) ){

		$cr = new Creditos;
		$cr->setCredito($_POST['idCliente'],
						$_POST['monto'],
						$_POST['descrip'] );

		$p = new Productos;
		$p->devolucion($_POST['idProducto'],$_POST['cantDevuelta']);

		$ok = new DevolucionOk;
		$ok->render();
		exit;
}

$c = new Clientes;
if(!$c->validar($_POST['idCliente'])) die("ERROR con el Cliente");
$client = $c->getClienteById($_POST['idCliente']);

$p = new Productos;
if(!$p->validar($_POST['idProducto'])) die("ERROR con el Producto");
$prod = $p->getProductoById($_POST['idProducto']);

$ac = new AltaCredito;
$ac->clientes = $client;
$ac->productos = $prod;
$ac->render();