<?php

// models/Facturas.php

class Facturas extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM facturas");
		return $this->db->fetchAll();	
	}

}