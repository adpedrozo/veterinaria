<?php

// models/Servicios.php

class Servicios extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM servicios
							ORDER BY descripcion");
		return $this->db->fetchAll();	
	}

	public function getServicioById($idServicio){
		$this->db->query("SELECT *
						FROM servicios
						WHERE cod_servicio = " . $idServicio);
		return $this->db->fetchAll();	
	}

	public function getServiciosPorNombre($nom){

		if(strlen($nom) < 1) die("ERROR con Datos de Búsqueda.");
		$nom = substr($nom,0,50);
		$nom = $this->db->escapeString($nom);
		$nom = $this->db->escapeComodines($nom);

		$this->db->query("SELECT *
							FROM servicios
							WHERE descripcion LIKE '%". $nom . "%'
							ORDER BY descripcion");
		return $this->db->fetchAll();
	}

	public function validar($idServicio){
		if(!ctype_digit($idServicio)) return false;

		$this->db->query("SELECT *
							FROM servicios
							WHERE cod_servicio = " . $idServicio );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function updateServicio($idServicio,$descrip,$precio){

		if(!$this->validar($idServicio)) die("ERROR con ID de Servicio.");

		if(strlen($descrip) < 1) die("ERROR con Nombre de Servicio.");
		$descrip = substr($descrip,0,100);
		$descrip = $this->db->escapeString($descrip);

		if(!is_numeric($precio)) die("ERROR con el Precio.");
		if($precio < 1) die("ERROR con el Precio.");
		if($precio > 99999) die("ERROR con el Precio.");

		$this->db->query("UPDATE servicios 
						  SET descripcion = '$descrip',
						  	precio_unitario = $precio
						  WHERE cod_servicio = $idServicio
						  LIMIT 1");
	}

}