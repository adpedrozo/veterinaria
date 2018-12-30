<?php

// controllers/seleccionarclientecertificado.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/SeleccionarClienteCertificado.php';

$menu = new Estilos;
$menu->render();

$c = new Clientes;
$todos = $c->getTodos();

$ver = new SeleccionarClienteCertificado;
$ver->clientes = $todos;
$ver->render();