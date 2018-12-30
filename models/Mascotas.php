<?php

// models/Mascotas.php

class Mascotas extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM mascotas");
		return $this->db->fetchAll();
	}

	public function getMascotas(){
		$this->db->query("SELECT m.cod_mascota, m.sexo, m.nombre as nombre_mascota, c.apellido, c.nombre as 					nombre_cliente, c.nro_documento, r.nombre as nombre_raza,
							e.nombre as nombre_especie, m.peso, m.edad
							FROM mascotas m
							LEFT JOIN razas r ON m.cod_raza = r.cod_raza
							LEFT JOIN clientes c ON c.cod_cliente = m.cod_cliente
							LEFT JOIN especies e ON e.cod_especie = r.cod_especie
							ORDER BY c.apellido");
		return $this->db->fetchAll();
	}

	public function getMascotasPorNombre($nom){

		if(strlen($nom) < 1) die("ERROR con Datos de Búsqueda.");
		$nom = substr($nom,0,50);
		$nom = $this->db->escapeString($nom);
		$nom = $this->db->escapeComodines($nom);

		$this->db->query("SELECT m.cod_mascota, m.sexo, m.nombre as nombre_mascota, c.apellido, c.nombre as 					nombre_cliente, c.nro_documento, r.nombre as nombre_raza,
							e.nombre as nombre_especie, m.peso, m.edad
							FROM mascotas m
							LEFT JOIN razas r ON m.cod_raza = r.cod_raza
							LEFT JOIN clientes c ON c.cod_cliente = m.cod_cliente
							LEFT JOIN especies e ON e.cod_especie = r.cod_especie
							WHERE m.nombre LIKE '%". $nom . "%'
							ORDER BY m.nombre");
		return $this->db->fetchAll();
	}

	public function getMascotasPorApellido($ape){

		if(strlen($ape) < 1) die("ERROR con Datos de Búsqueda.");
		$ape = substr($ape,0,50);
		$ape = $this->db->escapeString($ape);
		$ape = $this->db->escapeComodines($ape);

		$this->db->query("SELECT m.cod_mascota, m.sexo, m.nombre as nombre_mascota, c.apellido, c.nombre as 					nombre_cliente, c.nro_documento, r.nombre as nombre_raza,
							e.nombre as nombre_especie, m.peso, m.edad
							FROM mascotas m
							LEFT JOIN razas r ON m.cod_raza = r.cod_raza
							LEFT JOIN clientes c ON c.cod_cliente = m.cod_cliente
							LEFT JOIN especies e ON e.cod_especie = r.cod_especie
							WHERE c.apellido LIKE '%". $ape . "%'
							ORDER BY c.apellido");
		return $this->db->fetchAll();
	}

	public function getMascotasPorCliente($idCliente){
		$this->db->query("SELECT m.cod_mascota, m.nombre as nombre_mascota, c.apellido, c.nombre as nombre_cliente, c.nro_documento, r.nombre as nombre_raza, e.nombre as nombre_especie
							FROM mascotas m
							LEFT JOIN razas r ON m.cod_raza = r.cod_raza
							LEFT JOIN clientes c ON c.cod_cliente = m.cod_cliente
							LEFT JOIN especies e ON e.cod_especie = r.cod_especie
							WHERE m.cod_cliente = " . $idCliente );
		return $this->db->fetchAll();
	}	

	public function getMascotaById($idMascota){
		$this->db->query("SELECT *
							FROM mascotas
							WHERE cod_mascota = " . $idMascota );
		return $this->db->fetchAll();		
	}

	public function validar($idMascota){
		if(!ctype_digit($idMascota)) return false;

		$this->db->query("SELECT *
							FROM mascotas
							WHERE cod_mascota = " . $idMascota );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function setMascota($nom,$idRaza,$idCliente,$sexo,$peso,$edad){
		if(strlen($nom) < 1) die("ERROR con Nombre.");
		$nom = substr($nom,0,30);
		$nom = $this->db->escapeString($nom);

		$r = new Razas;
		if ( !$r->validar($idRaza) ) die("ERROR con Raza.");
		
		$c = new Clientes;
		if ( !$c->validar($idCliente) ) die("ERROR con Cliente.");

		if(strlen($sexo) < 1) die("ERROR con el Sexo.");
		if(strlen($sexo) > 10) die("ERROR con el Sexo.");
		if($sexo != 'Macho' && $sexo != 'Hembra') die("ERROR con el Sexo.");
		$sexo = $this->db->escapeString($sexo);		

		if(!ctype_digit($peso)) die("ERROR con el Peso.");
		if($peso < 1) die("ERROR con el Peso.");
		if($peso > 99999) die("ERROR con el Peso.");

		if(!ctype_digit($edad)) die("ERROR con la Edad.");
		if($edad < 1) die("ERROR con la Edad.");
		if($edad > 999) die("ERROR con la Edad.");


		$this->db->query("INSERT INTO mascotas(nombre,sexo,peso,edad,cod_cliente,cod_raza) 
						  VALUES('$nom','$sexo',$peso,$edad,$idCliente,$idRaza) ");

	}

	public function updateMascotas($idMascota,$nom,$idRaza,$peso,$sexo,$edad){

		if( !$this->validar($idMascota) ) die("ERROR con el ID de Mascota.");

		if(strlen($nom) < 1) die("ERROR con Nombre.");
		$nom = substr($nom,0,30);
		$nom = $this->db->escapeString($nom);

		$r = new Razas;
		if ( !$r->validar($idRaza) ) die("ERROR con Raza.");

		if(strlen($sexo) < 1) die("ERROR con el Sexo.");
		if(strlen($sexo) > 10) die("ERROR con el Sexo.");
		if($sexo != 'Macho' && $sexo != 'Hembra') die("ERROR con el Sexo.");
		$sexo = $this->db->escapeString($sexo);

		if(!ctype_digit($peso)) die("ERROR con el Peso.");
		if($peso < 1) die("ERROR con el Peso.");
		if($peso > 99999) die("ERROR con el Peso.");

		if(!ctype_digit($edad)) die("ERROR con la Edad.");
		if($edad < 1) die("ERROR con la Edad.");
		if($edad > 999) die("ERROR con la Edad.");

		$this->db->query("UPDATE mascotas 
						  SET nombre = '$nom',
						  	cod_raza = $idRaza,
						  	sexo = '$sexo',
						  	peso = $peso,
						  	edad = $edad
						  WHERE cod_mascota = $idMascota
						  LIMIT 1");
	}

	public function borrarMascota($idMascota){

		if ( !$this->validar($idMascota) ) die("ERROR con el ID de Mascota.");

		$this->db->query("DELETE FROM mascotas
						  WHERE cod_mascota = $idMascota
						  LIMIT 1");

	}

}
