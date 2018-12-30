<?php

// controllers/gestionarinventario.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../views/GestionInventario.php';

$e = new Estilos;
$e->render();

$menuInventario = new GestionInventario;
$menuInventario->render();