<?php

// models/Vacunas.php

class Vacunas extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM vacunas
							ORDER BY descripcion");
		return $this->db->fetchAll();	
	}

	public function getTodosConProveedor(){
		$this->db->query("SELECT v.cod_vacuna,v.descripcion,v.precio_unitario,
								v.stock,v.punto_reposicion,pv.razon_social,pv.email
						FROM vacunas v
						LEFT JOIN provisto_vacunas pp ON v.cod_vacuna = pp.cod_vacuna
						LEFT JOIN proveedores pv ON pv.cod_proveedor = pp.cod_proveedor
						GROUP BY v.descripcion");
		return $this->db->fetchAll();	
	}

	public function getVacunasPorNombre($nom){

		if(strlen($nom) < 1) die("ERROR con Datos de Búsqueda.");
		$nom = substr($nom,0,50);
		$nom = $this->db->escapeString($nom);
		$nom = $this->db->escapeComodines($nom);

		$this->db->query("SELECT *
							FROM vacunas v
							LEFT JOIN provisto_vacunas pp ON v.cod_vacuna = pp.cod_vacuna
							LEFT JOIN proveedores pv ON pv.cod_proveedor = pp.cod_proveedor
							WHERE v.descripcion LIKE '%". $nom . "%'
							ORDER BY v.descripcion");
		return $this->db->fetchAll();
	}
	
	public function getVacunaById($idVacuna){
		$this->db->query("SELECT *
						FROM vacunas v
						LEFT JOIN provisto_vacunas pp ON v.cod_vacuna = pp.cod_vacuna
						LEFT JOIN proveedores pv ON pv.cod_proveedor = pp.cod_proveedor
						WHERE v.cod_vacuna = " . $idVacuna);
		return $this->db->fetchAll();	
	}	

	public function validar($idVacuna){
		if(!ctype_digit($idVacuna)) return false;

		$this->db->query("SELECT *
							FROM vacunas
							WHERE cod_vacuna = " . $idVacuna );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function validarCantidad($cant){
		if(!ctype_digit($cant)) return false;
		if($cant < 1) return false;
		if($cant > 500) return false;

		return true;	
	}

	public function updateVacunas($idVacuna,$descrip,$precio,$stock,$puntoRep){

		if(!$this->validar($idVacuna)) die("ERROR con ID de Vacuna.");

		if(strlen($descrip) < 1) die("ERROR con Nombre de Vacuna.");
		$descrip = substr($descrip,0,100);
		$descrip = $this->db->escapeString($descrip);

		if(!is_numeric($precio)) die("ERROR con el Precio.");
		if($precio < 1) die("ERROR con el Precio.");
		if($precio > 99999) die("ERROR con el Precio.");

		if(!ctype_digit($stock)) die("ERROR con el Stock.");
		if($stock < 1) die("ERROR con el Stock.");
		if($stock > 999) die("ERROR con el Stock.");

		if(!ctype_digit($puntoRep)) die("ERROR con el Punto de Reposición.");
		if($puntoRep < 1) die("ERROR con el Punto de Reposición.");
		if($puntoRep > 999) die("ERROR con el Punto de Reposición.");

		$this->db->query("UPDATE vacunas 
						  SET descripcion = '$descrip',
						  	precio_unitario = $precio,
						  	stock = $stock,
						  	punto_reposicion = $puntoRep
						  WHERE cod_vacuna = $idVacuna
						  LIMIT 1");
	}
}