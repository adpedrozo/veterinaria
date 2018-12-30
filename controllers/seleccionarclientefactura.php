<?php

// controllers/seleccionarclientefactura.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/SeleccionarClienteFactura.php';

$menu = new Estilos;
$menu->render();

$c = new Clientes;
$todos = $c->getTodos();

$ver = new SeleccionarClienteFactura;
$ver->clientes = $todos;
$ver->render();