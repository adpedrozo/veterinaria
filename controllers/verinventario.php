<?php

// controllers/verinventario.php

require '../fw/fw.php';
require '../models/Productos.php';
require '../models/Vacunas.php';
require '../models/Servicios.php';
require '../models/PrestacionesMedicas.php';
require '../views/Estilos.php';
require '../views/ListaInventario.php';
require '../views/ListaInventarioProductos.php';
require '../views/ListaInventarioServicios.php';
require '../views/ListaInventarioPrestaciones.php';
require '../views/ListaInventarioVacunas.php';
require '../views/QuitarFiltrosInventario.php';

$menu = new Estilos;
$menu->render();

if(!isset($_GET['busqueda'])){
	$p = new Productos;
	$pTodos = $p->getTodosConProveedor();

	$v = new Vacunas;
	$vTodos = $v->getTodosConProveedor();

	$s = new Servicios;
	$sTodos = $s->getTodos();

	$pm = new PrestacionesMedicas;
	$pmTodos = $pm->getTodos();

	$ver = new ListaInventario;
	$ver->productos = $pTodos;
	$ver->vacunas = $vTodos;
	$ver->servicios = $sTodos;
	$ver->prestaciones = $pmTodos;
	$ver->render();
}
else{
	if($_GET['busqueda'] == "porP"){

		$l = new QuitarFiltrosInventario;
		$l->render();
		
		$p = new Productos;
		$ptodos = $p->getProductosPorNombre($_GET['datos']);

		$ver = new ListaInventarioProductos;
		$ver->productos = $ptodos;
		$ver->render();
	}
	if($_GET['busqueda'] == "porS"){

		$l = new QuitarFiltrosInventario;
		$l->render();
		
		$s = new Servicios;
		$stodos = $s->getServiciosPorNombre($_GET['datos']);

		$ver = new ListaInventarioServicios;
		$ver->servicios = $stodos;
		$ver->render();
	}
	if($_GET['busqueda'] == "porPM"){

		$l = new QuitarFiltrosInventario;
		$l->render();
		
		$pm = new PrestacionesMedicas;
		$pmtodos = $pm->getPrestacionesPorNombre($_GET['datos']);

		$ver = new ListaInventarioPrestaciones;
		$ver->prestaciones = $pmtodos;
		$ver->render();
	}
	if($_GET['busqueda'] == "porV"){

		$l = new QuitarFiltrosInventario;
		$l->render();
		
		$v = new Vacunas;
		$vtodos = $v->getVacunasPorNombre($_GET['datos']);

		$ver = new ListaInventarioVacunas;
		$ver->vacunas = $vtodos;
		$ver->render();
	}
}
