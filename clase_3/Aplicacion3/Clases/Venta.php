<?php

class Venta
{
//atributos
public $id;
public $idProveedor;
public $idProducto;
public $precioFinal;
public $cantidad;
public $fecha;

//constructor
public function __construct($id, $idProveedor, $idProducto, $cantidad, $precioFinal, $fecha= "0000-00-00 00:00:00"){
	
	$this->id = $id;
	$this->idProveedor = $idProveedor;
	$this->idProducto = $idProducto;
	$this->cantidad = $cantidad;
	$this->precioFinal = $precioFinal;
	$this->fecha = $fecha;
}

//metodos

public static function hacerVenta($archivoProveedores,$archivoProductos, $archivoVentas){
	
	$proveedores = Proveedor::proveedores($archivoProveedores);
	$productos = Producto::productos($archivoProductos);
	
	var_dump($productos);
	
	if (Proveedor::consultarProveedorPorId($proveedores)){ ///	if (Proveedor::consultarProveedorPorId($proveedores) && Proveedor::consultarProveedorPorId($proveedores)){
		
		$ventas = Venta::listarVentas($archivoVentas);

		date_default_timezone_set("America/Argentina/Buenos_Aires");
		$fecha=date("Y-m-d H:i:s");
		$id = 18000 + (sizeof($ventas) + 1);
		
		$retorno = new Venta($id, $_POST['idProveedor'], $_POST['idProducto'], $_POST['precioFinal'], $_POST['cantidad'], $fecha);
		
		$ventas[] = $retorno;
		$file = fopen($archivoVentas, "w");

		foreach ($ventas as $venta)
		{
			$cadena = $venta->id . " " . $venta->idProveedor . " " . $venta->idProducto . " " . $venta->precioFinal . " " . $venta->cantidad . " " . $venta->fecha . PHP_EOL;
			fwrite($file, $cadena);
		}

		fclose($file);
	}
	else 
	{
		$retorno = "No existe el id " . $_POST['idProveedor'];
	}

	return $retorno;
}

public static function listarVentas($archivo){
	
	$ventas = array();
	$file = fopen($archivo, "r");
	
	if ($file){
		
		while (!feof($file)){
			
			$arrayDeDatos = fscanf($file, "%s %s %s %s %s %s\n");

			if ($arrayDeDatos){
				
				$retorno = new Venta($arrayDeDatos[0], $arrayDeDatos[1], $arrayDeDatos[2], $arrayDeDatos[3], $arrayDeDatos[4], $arrayDeDatos[5]); //revisar, pueden ser 3 valores
				$ventas[] = $retorno;
			}
		}

		fclose($file);
	}

	return $ventas;
}

public static function listarVentaProveedor($archivo){
	
	$retorno = array();
	$flag = false;
	
	if ($_GET['idProveedor'] != null){
		
		$ventas = Venta::listarVentas($archivo);
		
		foreach ($ventas as $venta){
			
			if ($_GET['idProveedor'] == $venta->idProveedor){
				
				$retorno[] = $venta;
			}
		}
	}
	
	return $retorno;
}
}

?>