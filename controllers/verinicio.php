<?php

// controllers/verinicio.php

require '../fw/fw.php';
require '../views/Inicio.php';
require '../views/Bienvenida.php';
require '../views/Autor.php';

$b = new Bienvenida;
$b->render();

$menu = new Inicio;
$menu->render();

$c = new Autor;
$c->render();