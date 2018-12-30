<?php

// fw/Database.php

class Database {
	private $res;
	private $cn = false;
	private static $instance = false;

	public static function getInstance(){
		if( !self::$instance )	self::$instance = new Database;	
		return self::$instance;	
	}

	private function __construct(){ }

	private function connect(){
		$this->cn = mysqli_connect("localhost","root","","veterinaria");
		$this->query("SET names UTF8");
	}

	public function insertId(){
		return mysqli_insert_id($this->cn);
	}

	public function query($q){
		if ( !$this->cn ) $this->connect();	
		$this->res = mysqli_query($this->cn, $q);
		if ( mysqli_error($this->cn) != "" ){
			die("error de consulta $q -- " . mysqli_error($this->cn) );	
		}			
	}

	public function fetch(){
		return mysqli_fetch_assoc($this->res);
	}

	public function numRows(){
		return mysqli_num_rows($this->res);
	}

	public function fetchAll(){
		$aux = array();
		while( $fila = $this->fetch() ) $aux[] = $fila;
		return $aux;
	}

	public function escapeString($str){
		if ( !$this->cn ) $this->connect();
		return mysqli_escape_string($this->cn,$str);
	}
	
	public function escapeComodines($str){
		if ( !$this->cn ) $this->connect();
		$str = str_replace("%", "\%", $str);
		$str = str_replace("_", "\_", $str);
		return $str;
	}
}
