<?php
class Proveedor
{
	//atributos
    public $id;
    public $nombre;
    public $localidad; //email as localidad
    public $cuit; //foto as cuit

 	//constructor
    public function __construct($id, $nombre, $localidad, $cuit)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
        $this->cuit = $cuit;
    }

static function Guardar($archivo, $proveedores){
	
	$retorno = fopen($archivo, "w");

	foreach ($proveedores as $proveedor)
	{
		$cadena = $proveedor->id . " " . $proveedor->nombre . " " . $proveedor->localidad . " " . $proveedor->cuit . PHP_EOL;
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

public static function cargarProveedor($archivo){
	
	$proveedores = Proveedor::proveedores($archivo);
	$id = 500 + (sizeof($proveedores) + 1);

	$retorno = new Proveedor($id, $_POST['nombre'], $_POST['localidad'], $_POST['cuit']);
	$proveedores[] = $retorno;
	
	Proveedor::Guardar($archivo, $proveedores);

	return $retorno;
}

public static function consultarProveedor($archivo){
	
	$retorno = array();
	$flag = false;
	$proveedores = Proveedor::proveedores($archivo);
	if ($_GET['nombre'] != null){
		
		foreach ($proveedores as $proveedor){
			
			if (strcasecmp($_GET['nombre'], $proveedor->nombre) == 0){
				
				$retorno[] = $proveedor;

				$flag = true;
			}
		}
		if (!$flag){
			
			$retorno = "El proveedor " . $_GET['nombre'] . " no existe!!!";
		}
	}
	
	return $retorno;
}

public static function consultarProveedorPorId($proveedores){
	
	$flag = false;

	if ($_POST['idProveedor'] != null)
	{
		foreach ($proveedores as $proveedor)
		{
			if ($_POST['idProveedor'] == $proveedor->id)
			{
				$flag = true;
			}
		}
	}
	
	return $flag;
}

// Lista a los proveedores por echo y retorna un array de proveedores
public static function proveedores($archivo){
	
	$proveedores = array();
	
	if (file_exists($archivo)){
		
		$file = fopen($archivo, "r");
		//para .txt
		while (!feof($file)){
			
			$arrayDeDatos = fscanf($file, "%s %s %s %s\n");//id, nombre, localidad, cuit

			if ($arrayDeDatos)
			{
				$auxiliar = new Proveedor($arrayDeDatos[0], $arrayDeDatos[1], $arrayDeDatos[2], $arrayDeDatos[3]);
				$proveedores[] = $auxiliar;
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

	return $proveedores;
}

public static function modificarProveedor($archivo){
	
	$proveedores = Proveedor::proveedores($archivo);
	$retorno = array();

	if ($_POST['id'] != null){
		
		foreach ($proveedores as $proveedor){
			
			if ($_POST['id'] == $proveedor->id){
				
				$retorno[] = json_encode($proveedor);
				
				if ($_POST['nombre'] != null || $_POST['nombre'] != ''){
					
					$proveedor->nombre = $_POST['nombre'];
				}
				
				if ($_POST['localidad'] != null || $_POST['localidad'] != ''){
					
					$proveedor->localidad = $_POST['localidad'];
				}
				
				if ($_POST['cuit'] != null || $_POST['cuit'] != ''){
					
					$proveedor->cuit = $_POST['cuit'];	
				}

				$retorno[] = json_encode($proveedor);
			}
		}

		Proveedor::Guardar($archivo, $proveedores);
	}

	return $retorno;
}

    
}

?>