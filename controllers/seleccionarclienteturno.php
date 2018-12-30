<?php

// controllers/seleccionarclienteturno.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/SeleccionarClienteTurno.php';

$menu = new Estilos;
$menu->render();

$c = new Clientes;
$todos = $c->getTodos();

$ver = new SeleccionarClienteTurno;
$ver->clientes = $todos;
$ver->render();