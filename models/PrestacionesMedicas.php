<?php

// models/PrestacionesMedicas.php

class PrestacionesMedicas extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM prestaciones_medicas
							ORDER BY descripcion");
		return $this->db->fetchAll();	
	}

	public function getPrestacionById($idPrestacion){
		$this->db->query("SELECT *
						FROM prestaciones_medicas
						WHERE cod_pm = " . $idPrestacion);
		return $this->db->fetchAll();	
	}

	public function validar($idPrestacion){
		if(!ctype_digit($idPrestacion)) return false;

		$this->db->query("SELECT *
							FROM prestaciones_medicas
							WHERE cod_pm = " . $idPrestacion );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function getPrestacionesPorNombre($nom){

		if(strlen($nom) < 1) die("ERROR con Datos de Búsqueda.");
		$nom = substr($nom,0,50);
		$nom = $this->db->escapeString($nom);
		$nom = $this->db->escapeComodines($nom);

		$this->db->query("SELECT *
							FROM prestaciones_medicas
							WHERE descripcion LIKE '%". $nom . "%'
							ORDER BY descripcion");
		return $this->db->fetchAll();
	}

	public function updatePrestacion($idPrestacion,$descrip,$precio){

		if(!$this->validar($idPrestacion)) die("ERROR con ID de Prestación.");

		if(strlen($descrip) < 1) die("ERROR con Nombre de Prestación.");
		$descrip = substr($descrip,0,100);
		$descrip = $this->db->escapeString($descrip);

		if(!is_numeric($precio)) die("ERROR con el Precio.");
		if($precio < 1) die("ERROR con el Precio.");
		if($precio > 99999) die("ERROR con el Precio.");

		$this->db->query("UPDATE prestaciones_medicas
						  SET descripcion = '$descrip',
						  	precio_unitario = $precio
						  WHERE cod_pm = $idPrestacion
						  LIMIT 1");
	}
}