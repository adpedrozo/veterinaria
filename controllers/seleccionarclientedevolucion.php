<?php

// controllers/seleccionarclientedevolucion.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/SeleccionarClienteDevolucion.php';

$menu = new Estilos;
$menu->render();

$c = new Clientes;
$todos = $c->getTodos();

$ver = new SeleccionarClienteDevolucion;
$ver->clientes = $todos;
$ver->render();