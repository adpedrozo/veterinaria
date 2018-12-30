<?php

// models/Productos.php

class Productos extends Model {

	public function getTodos(){
		$this->db->query("SELECT * FROM productos");
		return $this->db->fetchAll();	
	}

	public function getProductoById($idProducto){
		$this->db->query("SELECT *
							FROM productos pd
							LEFT JOIN provisto_por pp ON pd.cod_producto = pp.cod_producto
							LEFT JOIN proveedores pv ON pv.cod_proveedor = pp.cod_proveedor
							WHERE pd.cod_producto = " . $idProducto);
		return $this->db->fetchAll();	
	}

	public function getProductosPorNombre($nom){

		if(strlen($nom) < 1) die("ERROR con Datos de Búsqueda.");
		$nom = substr($nom,0,50);
		$nom = $this->db->escapeString($nom);
		$nom = $this->db->escapeComodines($nom);

		$this->db->query("SELECT *
							FROM productos pd
							LEFT JOIN provisto_por pp ON pd.cod_producto = pp.cod_producto
							LEFT JOIN proveedores pv ON pv.cod_proveedor = pp.cod_proveedor
							WHERE pd.nombre_producto LIKE '%". $nom . "%'
							ORDER BY pd.nombre_producto");
		return $this->db->fetchAll();
	}

	public function validarCantidad($cant){
		if(!ctype_digit($cant)) return false;
		if($cant < 1) return false;
		if($cant > 500) return false;

		return true;	
	}

	public function devolucion($idProducto,$cantidad){

		if(!$this->validar($idProducto)) die("ERROR con Producto.");

		if(!ctype_digit($cantidad)) die("ERROR con la Cantidad.");
		if($cantidad < 1) die("ERROR con la Cantidad.");
		if($cantidad > 999) die("ERROR con la Cantidad.");

		$this->db->query("UPDATE productos
						  SET stock = stock + $cantidad
						  WHERE cod_producto = $idProducto
						  LIMIT 1");
	}

	public function getTodosConProveedor(){
		$this->db->query("SELECT pd.cod_producto,pd.nombre_producto,pd.precio_unitario,
								pd.stock,pd.punto_reposicion,pv.razon_social,pv.email
							FROM productos pd
							LEFT JOIN provisto_por pp ON pd.cod_producto = pp.cod_producto
							LEFT JOIN proveedores pv ON pv.cod_proveedor = pp.cod_proveedor
							GROUP BY pd.nombre_producto");
		return $this->db->fetchAll();	
	}	

	public function validar($idProducto){
		if(!ctype_digit($idProducto)) return false;

		$this->db->query("SELECT *
							FROM productos
							WHERE cod_producto = " . $idProducto );
		if($this->db->numRows() != 1) return false;
		
		return true;
	}

	public function updateProductos($idProducto,$nombre,$precio,$stock,$puntoRep){

		if(!$this->validar($idProducto)) die("ERROR con ID de Producto.");

		if(strlen($nombre) < 1) die("ERROR con Nombre de Producto.");
		$nombre = substr($nombre,0,100);
		$nombre = $this->db->escapeString($nombre);

		if(!is_numeric($precio)) die("ERROR con el Precio.");
		if($precio < 1) die("ERROR con el Precio.");
		if($precio > 99999) die("ERROR con el Precio.");

		if(!ctype_digit($stock)) die("ERROR con el Stock.");
		if($stock < 1) die("ERROR con el Stock.");
		if($stock > 999) die("ERROR con el Stock.");

		if(!ctype_digit($puntoRep)) die("ERROR con el Punto de Reposición.");
		if($puntoRep < 1) die("ERROR con el Punto de Reposición.");
		if($puntoRep > 999) die("ERROR con el Punto de Reposición.");

		$this->db->query("UPDATE productos 
						  SET nombre_producto = '$nombre',
						  	precio_unitario = $precio,
						  	stock = $stock,
						  	punto_reposicion = $puntoRep
						  WHERE cod_producto = $idProducto
						  LIMIT 1");
	}
}