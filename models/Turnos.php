<?php

// models/Turnos.php

class Turnos extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM turnos");
		return $this->db->fetchAll();
	}

	public function getTurnosCompletos(){
		$this->db->query("SELECT c.cod_cliente, m.cod_mascota, t.cod_turno, t.fecha, t.horario,
							m.nombre as nombre_mascota, c.apellido, c.nombre as nombre_cliente,
							t.descripcion, t.asistencia
							FROM turnos t
							LEFT JOIN clientes c ON t.cod_cliente = c.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = t.cod_mascota
							ORDER BY t.fecha");
		return $this->db->fetchAll();	
	}

	public function getTurnosPorFecha($fecha){

		if(strlen($fecha) < 1) die("ERROR con Datos de Búsqueda.");
		$fecha = substr($fecha,0,10);
		$fecha = $this->db->escapeString($fecha);
		$fecha = $this->db->escapeComodines($fecha);

		$this->db->query("SELECT c.cod_cliente, m.cod_mascota, t.cod_turno, t.fecha, t.horario,
							m.nombre as nombre_mascota, c.apellido, c.nombre as nombre_cliente,
							t.descripcion, t.asistencia
							FROM turnos t
							LEFT JOIN clientes c ON t.cod_cliente = c.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = t.cod_mascota
							WHERE t.fecha LIKE '%". $fecha . "%'
							ORDER BY t.fecha");
		return $this->db->fetchAll();	
	}

	public function getTurnosPorMascota($nom){

		if(strlen($nom) < 1) die("ERROR con Datos de Búsqueda.");
		$nom = substr($nom,0,50);
		$nom = $this->db->escapeString($nom);
		$nom = $this->db->escapeComodines($nom);

		$this->db->query("SELECT c.cod_cliente, m.cod_mascota, t.cod_turno, t.fecha, t.horario,
							m.nombre as nombre_mascota, c.apellido, c.nombre as nombre_cliente,
							t.descripcion, t.asistencia
							FROM turnos t
							LEFT JOIN clientes c ON t.cod_cliente = c.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = t.cod_mascota
							WHERE m.nombre LIKE '%". $nom . "%'
							ORDER BY m.nombre");
		return $this->db->fetchAll();
	}

	public function getTurnosPorApellido($ape){

		if(strlen($ape) < 1) die("ERROR con Datos de Búsqueda.");
		$ape = substr($ape,0,50);
		$ape = $this->db->escapeString($ape);
		$ape = $this->db->escapeComodines($ape);

		$this->db->query("SELECT c.cod_cliente, m.cod_mascota, t.cod_turno, t.fecha, t.horario,
							m.nombre as nombre_mascota, c.apellido, c.nombre as nombre_cliente,
							t.descripcion, t.asistencia
							FROM turnos t
							LEFT JOIN clientes c ON t.cod_cliente = c.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = t.cod_mascota
							WHERE c.apellido LIKE '%". $ape . "%'
							ORDER BY c.apellido");
		return $this->db->fetchAll();
	}

	public function getTurnoById($idTurno){
		$this->db->query("SELECT c.cod_cliente, m.cod_mascota, t.cod_turno, t.fecha, t.horario,
							m.nombre as nombre_mascota, c.apellido, c.nombre as nombre_cliente,
							t.descripcion
							FROM turnos t
							LEFT JOIN clientes c ON t.cod_cliente = c.cod_cliente
							LEFT JOIN mascotas m ON m.cod_mascota = t.cod_mascota
							WHERE t.cod_turno = " . $idTurno );
		return $this->db->fetchAll();
	}
	
	public function getDia($f){
		$str = "$f";
		$fecha = strtotime($str);

		return date("d", $fecha);
	}

	public function getMes($f){
		$str = "$f";
		$fecha = strtotime($str);

		return date("m", $fecha);
	}

	public function getAnio($f){
		$str = "$f";
		$fecha = strtotime($str);

		return date("Y", $fecha);
	}

	public function getHora($h){
		$str = "$h";
		$horario = strtotime($str);

		return date("H", $horario);
	}

	public function getMinutos($h){
		$str = "$h";
		$horario = strtotime($str);

		return date("i", $horario);
	}

	public function validar($idTurno){
		if(!ctype_digit($idTurno)) return false;

		$this->db->query("SELECT *
							FROM turnos
							WHERE cod_turno = " . $idTurno );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function setTurnos($fechaDia,$fechaMes,$fechaAnio,
							$horarioHH,$horarioMM,$motivo,$idCliente,$idMascota){

		/* validación de fecha */
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
		if( $fechaDia <= date("d") ) die("ERROR con la Fecha.");

		if( !checkdate($fechaMes,$fechaDia,$fechaAnio) ) die("ERROR con la Fecha.");
		$fecha = "$fechaAnio-$fechaMes-$fechaDia";
		$dayOfWeek = date("l", strtotime($fecha));
		if( $dayOfWeek == 'Sunday' ) die("ERROR con la Fecha, Veterinaria Cerrada los Domingos.");

		/* validación de horario */
		if(!ctype_digit($horarioHH)) die("ERROR con Horario.");
		if( $horarioHH < 9 ) die("ERROR con Horario.");
		if( $horarioHH > 20 ) die("ERROR con Horario.");

		if(!ctype_digit($horarioMM)) die("ERROR con Horario.");
		if( $horarioMM < 0 ) die("ERROR con Horario.");
		if( $horarioMM > 59 ) die("ERROR con Horario.");

		/* validación de motivo */
		if(strlen($motivo) < 1) die("ERROR con Motivo.");
		$motivo = substr($motivo,0,50);
		$motivo = $this->db->escapeString($motivo);

		$c = new Clientes;
		if ( !$c->validar($idCliente) ) die("ERROR con Cliente.");

		$m = new Mascotas;
		if ( !$m->validar($idMascota) ) die("ERROR con Mascota.");

		$this->db->query("INSERT INTO turnos(fecha,horario,descripcion,cod_cliente,cod_mascota) 
						  VALUES('$fechaAnio-$fechaMes-$fechaDia','$horarioHH:$horarioMM',
									'$motivo',$idCliente,$idMascota) ");
	}

	public function updateTurnos($idTurno,$fechaDia,$fechaMes,$fechaAnio,
							$horarioHH,$horarioMM,$motivo){

		if ( !$this->validar($idTurno) ) die("ERROR con ID de Turno.");

		/* validación de fecha */
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
		if( $fechaDia <= date("d") ) die("ERROR con la Fecha, la Veterinaria da turnos a partir del día siguiente al actual.");

		if( !checkdate($fechaMes,$fechaDia,$fechaAnio) ) die("ERROR con la Fecha.");
		$fecha = "$fechaAnio-$fechaMes-$fechaDia";
		$dayOfWeek = date("l", strtotime($fecha));
		if( $dayOfWeek == 'Sunday' ) die("ERROR con la Fecha, Veterinaria Cerrada los Domingos.");

		/* validación de horario */
		if(!ctype_digit($horarioHH)) die("ERROR con Horario.");
		if( $horarioHH < 9 ) die("ERROR con Horario.");
		if( $horarioHH > 20 ) die("ERROR con Horario.");

		if(!ctype_digit($horarioMM)) die("ERROR con Horario.");
		if( $horarioMM < 0 ) die("ERROR con Horario.");
		if( $horarioMM > 59 ) die("ERROR con Horario.");

		/* validación de motivo */
		if(strlen($motivo) < 1) die("ERROR con Motivo.");
		$motivo = substr($motivo,0,50);
		$motivo = $this->db->escapeString($motivo);

		$this->db->query("UPDATE turnos 
						  SET fecha = '$fechaAnio-$fechaMes-$fechaDia',
						  	horario = '$horarioHH:$horarioMM',
						  	descripcion = '$motivo'
						  WHERE cod_turno = $idTurno
						  LIMIT 1");
	}

	public function borrarTurno($idTurno){

		if ( !$this->validar($idTurno) ) die("ERROR con el ID de Turno.");

		$this->db->query("DELETE FROM turnos
						  WHERE cod_turno = $idTurno
						  LIMIT 1");

	}

	public function compararFechas($fecha){

		$dateActual = date("Y-m-d");
		$dateTimestamp = strtotime($fecha);
		$dateTimestampActual = strtotime($dateActual);
		 
		if ($dateTimestampActual >= $dateTimestamp)
		 return true;
		else
		 return false;

	}

	public function marcarRealizado($idTurno,$fecha){

		if ( !$this->validar($idTurno) ) die("ERROR con el ID de Turno.");

		if ( !$this->compararFechas($fecha) ) die("ERROR con la fecha. Solo puede cambiar el estado
													de una fecha pasada.");

		$this->db->query("UPDATE turnos 
						  SET asistencia = 'SI'
						  WHERE cod_turno = $idTurno
						  LIMIT 1");
	}

	public function marcarAusente($idTurno,$fecha){
		
		if ( !$this->validar($idTurno) ) die("ERROR con el ID de Turno.");

		if ( !$this->compararFechas($fecha) ) die("ERROR con la fecha. Solo puede cambiar el estado
													de una fecha pasada.");

		$this->db->query("UPDATE turnos 
						  SET asistencia = 'NO'
						  WHERE cod_turno = $idTurno
						  LIMIT 1");
	}

	public function marcarCancelado($idTurno,$fecha){
		
		if ( !$this->validar($idTurno) ) die("ERROR con el ID de Turno.");

		$this->db->query("UPDATE turnos 
						  SET asistencia = 'CA'
						  WHERE cod_turno = $idTurno
						  LIMIT 1");
	}
}