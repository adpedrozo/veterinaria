<?php

// controllers/gestionarmascotas.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../views/GestionMascotas.php';

$menu = new Estilos;
$menu->render();

$menuMascotas = new GestionMascotas;
$menuMascotas->render();