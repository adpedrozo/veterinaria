<?php

// controllers/vercronogramas.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../models/CronogramaVacunacion.php';
require '../views/Estilos.php';
require '../views/FechaMal.php';
require '../views/ListaCronogramasCompletos.php';
require '../views/SinVencimientos.php';

$menu = new Estilos;
$menu->render();

$cv = new CronogramaVacunacion;

$todos = $cv->getTodos();
$info = new ListaCronogramasCompletos;
$info->cronogramas = $todos;
$info->render();
