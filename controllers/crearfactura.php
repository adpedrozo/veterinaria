<?php

// controllers/crearfactura.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/Productos.php';
require '../models/Servicios.php';
require '../models/Vacunas.php';
require '../models/PrestacionesMedicas.php';
require '../models/Facturas.php';
require '../views/Estilos.php';
require '../views/AltaFactura.php';
require '../views/AltaOk.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['descripcion'])){
	if(!isset($_POST['idCliente'])) die("ERROR con Cliente.");
	if(!isset($_POST['fechaDia'])) die("ERROR con Fecha.");
	if(!isset($_POST['fechaMes'])) die("ERROR con Fecha.");
	if(!isset($_POST['fechaAnio'])) die("ERROR con Fecha.");
	if(!isset($_POST['monto_total'])) die("ERROR con Sexo.");


/*ejemplo*/
	$m = new Mascotas;
	$m->setMascota($_POST['nombre'],
					$_POST['idRaza'],
					$_POST['idCliente'],
					$_POST['sexo'],
					$_POST['peso'],
					$_POST['edad']);

	$ok = new AltaOk;
	$ok->render();
	exit;
}

if (isset($_POST['idCliente'])){
	$c = new Clientes;
	if(!$c->validar($_POST['idCliente'])) die("ERROR con Cliente.");
	$client = $c->getClienteById($_POST['idCliente']);

	$p = new Productos;
	$prod = $p->getTodos();

	$s = new Servicios;
	$serv = $s->getTodos();

	$v = new Vacunas;
	$vac = $v->getTodos();

	$pm = new PrestacionesMedicas;
	$prest = $pm->getTodos();

	$form = new AltaFactura;
	$form->clientes = $client;
	$form->productos = $prod;
	$form->vacunas = $vac;
	$form->servicios = $serv;
	$form->prestaciones = $prest;
	$form->render();	
}