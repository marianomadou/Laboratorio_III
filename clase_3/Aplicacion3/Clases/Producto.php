<?php
class Producto
{
	//atributos
    public $id;
    public $nombre;
    public $stock;
    public $precio;
	public $idProveedor;

 	//constructor
    public function __construct($id, $nombre, $stock, $precio, $idProveedor)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->idProveedor = $idProveedor;
    }

static function Guardar($archivo, $productos){
	
	$retorno = fopen($archivo, "w");

	foreach ($productos as $producto)
	{
		$cadena = $producto->id . " " . $producto->nombre . " " . $producto->stock . " " . $producto->precio . " " . $producto->idProveedor . PHP_EOL;
		fwrite($retorno, $cadena);
	}

	/*
	// .csv
		foreach ($proveedores as $proveedor){
	
	    $string = $proveedor->id.",".$proveedor->nombre.",".$proveedor->localidad.",".$proveedor->cuit.",".PHP_EOL;
	    fwrite($retorno, $cadena);
		}

	// .json
		fwrite($retorno, json_encode($proveedores));
	*/

	fclose($retorno);
}

public static function cargarProducto($archivo){
	
	$productos = Producto::productos($archivo);
	$id = 1000 + (sizeof($productos) + 1);

	$retorno = new Producto($id, $_POST['nombre'], $_POST['stock'], $_POST['precio'], $_POST['idProveedor']);
	$productos[] = $retorno;
	
	Producto::Guardar($archivo, $productos);

	return $retorno;
}

public static function consultarProducto($archivo){
	
	$retorno = array();
	$flag = false;
	$productos = Producto::productos($archivo);
	if ($_GET['nombre'] != null){
		
		foreach ($productos as $producto){
			
			if (strcasecmp($_GET['nombre'], $producto->nombre) == 0){
				
				$retorno[] = $producto;

				$flag = true;
			}
		}
		if (!$flag){
			
			$retorno = "El producto " . $_GET['nombre'] . " no existe!!!";
		}
	}
	
	return $retorno;
}

public static function consultarProductoPorId($productos){
	
	$flag = false;

	if ($_POST['id'] != null)
	{
		foreach ($productos as $producto)
		{
			if ($_POST['id'] == $producto->id)
			{
				$flag = true;
			}
		}
	}
	
	return $flag;
}

// Lista a los proveedores por echo y retorna un array de proveedores
public static function productos($archivo){
	
	$productos = array();
	
	if (file_exists($archivo)){
		
		$file = fopen($archivo, "r");
		//para .txt
		while (!feof($file)){
			
			$arrayDeDatos = fscanf($file, "%s %s %s %s %s\n");

			if ($arrayDeDatos)
			{
				$auxiliar = new Producto($arrayDeDatos[0], $arrayDeDatos[1], $arrayDeDatos[2], $arrayDeDatos[3], $arrayDeDatos[4]);
				$productos[] = $auxiliar;
			}
		}

		/*
		// .csv
		 while (($buffer = fgets($file)) !== false){
			
		 	$arrayDeDatos = explode(",", $buffer);
		
		    if ($arrayDeDatos){
				
			    $auxiliar = new Proveedor($arrayDeDatos[0], $arrayDeDatos[1], $arrayDeDatos[2], $arrayDeDatos[3]);
		        $proveedores[] = $auxiliar;
		    }
		 }

		// .json
		$objetoJson = json_decode(fread($file, filesize($archivo)));
			foreach ($objetoJson as $elemento){
				
		     $auxiliar = new Proveedor($elemento->id, $elemento->nombre, $elemento->localidad, $elemento->cuit);
		     $proveedores[] = $auxiliar;
			}*/
		


		fclose($file);
	}
	else{
		
		echo "EL ARCHIVO " . $archivo . " NO EXISTE O NO PUDO LEERSE CORRECTAMENTE";
	}

	return $productos;
}

public static function modificarProducto($archivo){
	
	$productos = Producto::productos($archivo);
	$retorno = array();

	if ($_POST['id'] != null){
		
		foreach ($productos as $producto){
			
			if ($_POST['id'] == $producto->id){
				
				$retorno[] = json_encode($producto);
				
				if ($_POST['nombre'] != null || $_POST['nombre'] != ''){
					
					$producto->nombre = $_POST['nombre'];
				}
				
				if ($_POST['stock'] != null || $_POST['stock'] != ''){
					
					$producto->stock = $_POST['stock'];
				}
				
				if ($_POST['precio'] != null || $_POST['precio'] != ''){
					
					$producto->precio = $_POST['precio'];	
				}
				if ($_POST['idProveedor'] != null || $_POST['idProveedor'] != ''){
					
					$producto->idProveedor = $_POST['idProveedor'];	
				}

				$retorno[] = json_encode($producto);
			}
		}

		Producto::Guardar($archivo, $productos);
	}

	return $retorno;
}

    
}

?>