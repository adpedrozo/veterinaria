<?php

// models/Especies.php

class Especies extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM especies");
		return $this->db->fetchAll();	
	}

	public function validar($idEspecie){
		if(!ctype_digit($idEspecie)) return false;

		$this->db->query("SELECT *
							FROM especies
							WHERE cod_especie = " . $idEspecie );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}
}