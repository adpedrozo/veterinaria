<?php

// models/Proveedores.php

class Proveedores extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM proveedores");
		return $this->db->fetchAll();	
	}

	public function validar($idProveedor){
		if(!ctype_digit($idProveedor)) return false;

		$this->db->query("SELECT *
							FROM proveedores
							WHERE cod_proveedor = " . $idProveedor );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}
}