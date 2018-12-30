<?php

// controllers/seleccionarcliente.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/SeleccionarCliente.php';

$menu = new Estilos;
$menu->render();

$c = new Clientes;
$todos = $c->getTodos();

$ver = new SeleccionarCliente;
$ver->clientes = $todos;
$ver->render();