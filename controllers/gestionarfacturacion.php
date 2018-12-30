<?php

// controllers/gestionarfacturacion.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../views/GestionFacturacion.php';

$e = new Estilos;
$e->render();

$menu = new GestionFacturacion;
$menu->render();