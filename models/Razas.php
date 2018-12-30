<?php

// models/Razas.php

class Razas extends Model {

	public function getOrdenadasPorEspecie(){
		$this->db->query("SELECT r.cod_raza,r.nombre as nombre_raza,
							e.cod_especie, e.nombre as nombre_especie
							FROM razas r
							LEFT JOIN especies e ON e.cod_especie = r.cod_especie
							ORDER BY e.cod_especie, nombre_raza");
		return $this->db->fetchAll();	
	}

	public function validar($idRaza){
		if(!ctype_digit($idRaza)) return false;

		$this->db->query("SELECT *
							FROM razas
							WHERE cod_raza = " . $idRaza );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function setRazas($nom,$idEspecie){

		if(strlen($nom) < 1) die("ERROR con Nombre.");
		$nom = substr($nom,0,30);
		$nom = $this->db->escapeString($nom);

		$e = new Especies;
		if( !$e->validar($idEspecie) ) die("ERROR con ID de Especie.");

		$this->db->query("INSERT INTO razas(nombre,cod_especie) 
						  VALUES('$nom',$idEspecie)");

	}	
}