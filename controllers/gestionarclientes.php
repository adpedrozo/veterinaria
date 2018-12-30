<?php

// controllers/gestionarclientes.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../views/GestionClientes.php';

$menu = new Estilos;
$menu->render();

$menuClientes = new GestionClientes;
$menuClientes->render();