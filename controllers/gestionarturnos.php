<?php

// controllers/gestionarturnos.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../views/GestionTurnos.php';

$menu = new Estilos;
$menu->render();

$menuTurnos = new GestionTurnos;
$menuTurnos->render();