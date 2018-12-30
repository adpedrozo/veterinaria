<?php

// controllers/verconfirmacionaviso.php

require '../fw/fw.php';
require '../models/Clientes.php';
require '../views/Estilos.php';
require '../views/EmailOk.php';
require '../views/EmailBad.php';

$menu = new Estilos;
$menu->render();

if(isset($_POST['email'])){
	$e = new EmailOk;
	$e->email = $_POST['email'];
	$e->render();
}
else{
	$e = new EmailBad;
	$e->email = $_POST['email'];
	$e->render();
}