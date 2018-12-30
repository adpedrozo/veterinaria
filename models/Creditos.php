<?php

// models/Creditos.php

class Creditos extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM creditos");
		return $this->db->fetchAll();	
	}

	public function setCredito($idCliente,$monto,$descrip){

		$c = new Clientes;
		if(!$c->validar($idCliente)) die("ERROR con Cliente.");

		if(!ctype_digit($monto)) die("ERROR con el monto.");
		if($monto < 1) die("ERROR con el monto.");
		if($monto > 999) die("ERROR con el monto.");

		if(strlen($descrip) < 1) die("ERROR con Descripción.");
		$descrip = substr($descrip,0,200);
		$descrip = $this->db->escapeString($descrip);

		$this->db->query("INSERT INTO creditos(descripcion,monto,cod_cliente)
						  VALUES('$descrip',$monto,$idCliente)");

	}

}