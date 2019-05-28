<?php
require_once 'clases/Producto.php';
class Cliente
{
public $id;
public $nombre;
public $bebida;
public $tipo; //con o sin alcohol
public $cantidad;

function __construct($id, $nombre, $bebida, $tipo, $cantidad){
	
	$this->id = $id;
	$this->nombre = $nombre;
	$this->bebida = $bebida;
	$this->tipo = $tipo;
	$this->cantidad = $cantidad;
}

public function Guardar($ruta){
	
	$ventas = self::Cargar($ruta);
	if($ventas != null){
		
		$maxId = self::BuscarMayorId($ventas);
		$this->id = $maxId + 1;
		if(!self::VentaEstaEnLaLista($ventas, $this)){
			
			if(file_exists($ruta)){
				
				$archivo = fopen($ruta, "a");
				return fwrite($archivo, $this->DevolverJson().PHP_EOL);
			}
			$archivo = fopen($ruta, "w");
			return fwrite($archivo, $this->DevolverJson().PHP_EOL);
		}
	}
	else{
		
		if(file_exists($ruta)){
			
			$archivo = fopen($ruta, "a");
			return fwrite($archivo, $this->DevolverJson().PHP_EOL);
		}
		$archivo = fopen($ruta, "w");
		return fwrite($archivo, $this->DevolverJson().PHP_EOL);
	}
	return false;
}

public static function Cargar($ruta){
	
	if(file_exists($ruta)){
		
		$archivo = fopen($ruta, "r");
		$ventas = array();
		while(!feof($archivo)){
			
			$renglon = fgets($archivo);
			if($linea != ""){
				
				$objeto = json_decode($renglon);
				$venta = new Venta($objeto->id, $objeto->nombre, $objeto->bebida, $objeto->tipo, $objeto->cantidad);
				array_push($ventas, $venta);
			}
		}
		fclose($archivo);
		if(count($ventas) > 0){
			
			return $ventas;
		}
	}
	return null;
}

public static function GuardarTodo($ventas, $ruta){
	
	if(file_exists($ruta)){
		
		foreach ($ventas as $key => $producto){
			
			if($key == 0){
				
				$archivo = fopen($ruta, "w");
				fwrite($archivo, json_encode($ventas[0]).PHP_EOL);
				fclose($archivo);
			}
			else{
				
				$archivo = fopen($ruta, "a");
				fwrite($archivo, json_encode($ventas[$key]).PHP_EOL);
				fclose($archivo);
			}
		}
		return true;
	}
	return false;
}

private static function VentaEstaEnLaLista($ventas, $venta){
	
	foreach ($ventas as $ve){
		
		if($ve->id == $venta->id)
			return true;
	}
	return false;
}

public function CargarImagen($archivos, $rutaCarpetaImagenes){
	
	if(isset($archivos)){
		
		$extension = self::TraerExtensionImagen($archivos);
		if($extension != null){
			
			date_default_timezone_set("America/Argentina/Buenos_Aires");
			$nombreDelArchivoImagen = strtolower($this->bebida)."_".date('Ymd').$extension;
			$rutaCompletaImagen = $rutaCarpetaImagenes.$nombreDelArchivoImagen;
			return move_uploaded_file($archivos["tmp_name"], $rutaCompletaImagen);
		}
	}
	return false;
}

public static function TraerExtensionImagen($archivo){
	
	switch ($archivo["type"]){
		
		case 'image/jpeg':
			$extension = ".jpg";
			break;
		case 'image/png':
			$extension = ".png";
			break;
		default:
			return null;
			break;
	}
	return $extension;
}

public function BorrarVenta($ruta){
	
	$ventas = self::Cargar($ruta);
	if($ventas != null){
		
		if(self::VentaEstaEnLaLista($ventas, $this)){
			
			foreach ($ventas as $key => $ve){
				
				if($ve->id == $this->id){
					
					unset($ventas[$key]);
					break;
				}
			}
			return self::GuardarTodo($ventas, $ruta);
		}
	}
	return false;
}

public static function BuscarMayorId($ventas){
	
	$maxId = $ventas[0]->id;
	foreach ($ventas as $ve){
		
		if($ve->id > $maxId)
			$maxId = $ve->id;
	}
	return $maxId;
}

public function DevolverJson(){
	
	return json_encode($this, JSON_UNESCAPED_UNICODE);
}

}
?>