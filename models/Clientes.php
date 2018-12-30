<?php

// models/Clientes.php

class Clientes extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM clientes
							ORDER BY apellido");
		return $this->db->fetchAll();
	}

	public function getClientesPorApellido($ape){

		if(strlen($ape) < 1) die("ERROR con Datos de Búsqueda.");
		$ape = substr($ape,0,50);
		$ape = $this->db->escapeString($ape);
		$ape = $this->db->escapeComodines($ape);

		$this->db->query("SELECT * FROM clientes
							WHERE apellido LIKE '%". $ape . "%'
							ORDER BY apellido");
		return $this->db->fetchAll();
	}

	public function getClientesPorDoc($numDoc){

		if(!ctype_digit($numDoc)) die("ERROR con Nº de Documento.");
		if($numDoc < 1) die("ERROR con Nº de Documento.");
		if($numDoc > 99999999) die("ERROR con Nº de Documento.");
		$numDoc = $this->db->escapeString($numDoc);
		$numDoc = $this->db->escapeComodines($numDoc);

		$this->db->query("SELECT * FROM clientes
							WHERE nro_documento LIKE '%". $numDoc . "%'
							ORDER BY apellido");
		return $this->db->fetchAll();
	}

	public function getClienteById($idCliente){
		$this->db->query("SELECT *
							FROM clientes
							WHERE cod_cliente = " . $idCliente );
		return $this->db->fetchAll();		
	}

	public function validar($idCliente){
		if(!ctype_digit($idCliente)) return false;

		$this->db->query("SELECT *
							FROM clientes
							WHERE cod_cliente = " . $idCliente );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function setCliente($nom,$ape,$tipoDoc,$numDoc,$dir,$tel,$email){

		if(strlen($nom) < 1) die("ERROR con Nombre.");
		$nom = substr($nom,0,30);
		$nom = $this->db->escapeString($nom);

		if(strlen($ape) < 1) die("ERROR con Apellido.");
		$ape = substr($ape,0,30);
		$ape = $this->db->escapeString($ape);
		
		if(strlen($tipoDoc) < 2) die("ERROR con Tipo de Documento.");
		if( $tipoDoc != 'DNI' && $tipoDoc != 'LC' && $tipoDoc != 'LE' &&
				$tipoDoc != 'CI' ) die("ERROR con Tipo de Documento.");
		$tipoDoc = $this->db->escapeString($tipoDoc);

		if(!ctype_digit($numDoc)) die("ERROR con Nº de Documento.");
		if($numDoc < 1) die("ERROR con Nº de Documento.");
		if($numDoc > 99999999) die("ERROR con Nº de Documento.");

		if(strlen($dir) < 1) die("ERROR con Dirección.");
		$dir = substr($dir,0,30);
		$dir = $this->db->escapeString($dir);

		if(strlen($tel) < 1) die("ERROR con Teléfono.");
		$tel = substr($tel,0,15);
		$tel = $this->db->escapeString($tel);

		if(strlen($email) < 1) die("ERROR con E-Mail.");
		$email = substr($email,0,30);
		$email = $this->db->escapeString($email);


		$this->db->query("INSERT INTO clientes(nombre,apellido,tipo_documento,nro_documento,
												direccion,telefono,email) 
						  VALUES('$nom','$ape','$tipoDoc',$numDoc,'$dir','$tel','$email')");

	}

	public function updateClientes($idCliente,$nom,$ape,$tipoDoc,$numDoc,$dir,$tel,$email){

		if( !$this->validar($idCliente) ) die("ERROR con el ID de Cliente.");

		if(strlen($nom) < 1) die("ERROR con Nombre.");
		$nom = substr($nom,0,30);
		$nom = $this->db->escapeString($nom);

		if(strlen($ape) < 1) die("ERROR con Apellido.");
		$ape = substr($ape,0,30);
		$ape = $this->db->escapeString($ape);
		
		if(strlen($tipoDoc) < 2) die("ERROR con Tipo de Documento.");
		if( $tipoDoc != 'DNI' && $tipoDoc != 'LC' && $tipoDoc != 'LE' &&
				$tipoDoc != 'CI' ) die("ERROR con Tipo de Documento.");
		$tipoDoc = $this->db->escapeString($tipoDoc);

		if(!ctype_digit($numDoc)) die("ERROR con Nº de Documento.");
		if($numDoc < 1) die("ERROR con Nº de Documento.");
		if($numDoc > 99999999) die("ERROR con Nº de Documento.");

		if(strlen($dir) < 1) die("ERROR con Dirección.");
		$dir = substr($dir,0,30);
		$dir = $this->db->escapeString($dir);

		if(strlen($tel) < 1) die("ERROR con Teléfono.");
		$tel = substr($tel,0,15);
		$tel = $this->db->escapeString($tel);

		if(strlen($email) < 1) die("ERROR con E-Mail.");
		$email = substr($email,0,30);
		$email = $this->db->escapeString($email);

		$this->db->query("UPDATE clientes 
						  SET nombre = '$nom',
						  	apellido = '$ape',
						  	tipo_documento = '$tipoDoc',
						  	nro_documento = $numDoc,
						  	direccion = '$dir',
						  	telefono = '$tel',
						  	email = '$email'
						  WHERE cod_cliente = $idCliente
						  LIMIT 1");
	}

	public function borrarCliente($idCliente){

		if ( !$this->validar($idCliente) ) die("ERROR con el ID de Cliente.");

		$this->db->query("DELETE FROM clientes
						  WHERE cod_cliente = $idCliente
						  LIMIT 1");

	}
}