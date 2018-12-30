<?php

// models/CronogramaVacunacion.php

class CronogramaVacunacion extends Model {

	public function getTodos(){
		$this->db->query("SELECT c.apellido,c.nombre as nombre_cliente, c.cod_cliente, c.email,
								m.nombre as nombre_mascota, v.descripcion, cv.fecha, cv.horario, cv.estado
							FROM cronograma_vacunacion cv
							LEFT JOIN clientes c ON c.cod_cliente = cv.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = cv.cod_mascota
							LEFT JOIN vacunas v ON v.cod_vacuna = cv.cod_vacuna
							ORDER BY cv.fecha");
		return $this->db->fetchAll();	
	}

	public function getCronogramasVencidos(){
		$this->db->query("SELECT c.apellido,c.nombre as nombre_cliente, c.cod_cliente, c.email,
								m.nombre as nombre_mascota, v.descripcion, cv.fecha, cv.horario, cv.estado
							FROM cronograma_vacunacion cv
							LEFT JOIN clientes c ON c.cod_cliente = cv.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = cv.cod_mascota
							LEFT JOIN vacunas v ON v.cod_vacuna = cv.cod_vacuna
							WHERE cv.estado = 'NO' 
							ORDER BY cv.fecha");
		return $this->db->fetchAll();	
	}

	public function revisarCronogramas(){

		$this->db->query("SELECT *
							FROM cronograma_vacunacion
							WHERE estado = 'NO' ");
		if($this->db->numRows() == 0) return false;	/* retorna falso al no haber vencidos */
		
		return true;

	}

	public function setCronograma($fechaDia,$fechaMes,$fechaAnio,$idCliente,$idMascota,$idVacuna){

		if(!ctype_digit($fechaAnio)) die("ERROR con la Fecha.");
		if( $fechaAnio < date("Y") ) die("ERROR con la Fecha.");
		if( $fechaAnio > (date("Y") + 1)  ) die("ERROR con la Fecha.");

		if(!ctype_digit($fechaMes)) die("ERROR con la Fecha.");
		if( $fechaMes < 1 ) die("ERROR con la Fecha.");
		if( $fechaMes > 12 ) die("ERROR con la Fecha.");
		if( $fechaMes < date("m") ) die("ERROR con la Fecha.");

		if(!ctype_digit($fechaDia)) die("ERROR con la Fecha.");
		if( $fechaDia < 1 ) die("ERROR con la Fecha.");
		if( $fechaDia > 31 ) die("ERROR con la Fecha.");
		if( $fechaDia < date("d") ) die("ERROR con la Fecha.");

		if( !checkdate($fechaMes,$fechaDia,$fechaAnio) ) die("ERROR con la Fecha.");

		$c = new Clientes;
		if ( !$c->validar($idCliente) ) die("ERROR con Cliente.");

		$m = new Mascotas;
		if ( !$m->validar($idMascota) ) die("ERROR con Mascota.");

		$v = new Vacunas;
		if ( !$v->validar($idVacuna) ) die("ERROR con Vacuna.");

		$this->db->query("INSERT INTO cronograma_vacunacion(fecha,cod_mascota,cod_cliente,cod_vacuna) 
						  VALUES('$fechaAnio-$fechaMes-$fechaDia',$idMascota,$idCliente,$idVacuna) ");

		$this->db->query("UPDATE vacunas 
						  SET stock = stock - 1
						  WHERE cod_vacuna = $idVacuna
						  LIMIT 1");
	}

}