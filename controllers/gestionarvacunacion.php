<?php

// controllers/gestionarvacunacion.php

require '../fw/fw.php';
require '../views/Estilos.php';
require '../views/GestionVacunacion.php';

$e = new Estilos;
$e->render();

$menuVacunacion = new GestionVacunacion;
$menuVacunacion->render();