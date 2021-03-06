<?php
class Vuelo{
	
//Atributos privados: _fecha (DateTime), _empresa (string) _precio (double), _listaDePasajeros (array de tipo Pasajero), _cantMaxima (int; con su getter). Tanto _listaDePasajero como _cantMaxima sólo se inicializarán en el constructor.
	
	private $_fecha;
	private $_empresa;
	private $_precio;
	private $_listaDePasajeros;
	private $_cantMaxima;
	
//Crear el constructor capaz de que de poder instanciar objetos pasándole como parámetros: i. La empresa y el precio. ii. La empresa, el precio y la cantidad máxima de pasajeros.	

public function __construct($company,$price,$maximumQuantity=0){
	$this->_fecha = new DateTime;
	$this->_empresa = $company;
	$this->_precio = $price;
	$this->_cantMaxima = $maximumQuantity;
	$this->_listaDePasajeros = array();
}

//Agregar un método getter, que devuelva en una cadena de caracteres toda la información de un vuelo: fecha, empresa, precio, cantidad máxima de pasajeros, y toda la información de todos los pasajeros.

public function GetVuelo(){
	$retorno = 	"Fecha: ".$this->_fecha->format('Y-m-d')." ||
				Empresa: $this->_empresa ||
				Precio: $this->_precio ||
				Cantidad máxima de pasajeros: $this->_cantMaxima ||
				Listado de pasajeros:
	            <br/>";
	foreach($this->_listaDePasajeros as $pasajero){        
		$retorno = $retorno.$pasajero->GetInfoPasajero()."</br>";
	}
	return $retorno;
}

//Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista, se agregará (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de retorno de este método indicará si se agregó o no.

public function AgregarPasajero($nuevoPasajero){
	if(count($this->_listaDePasajeros) < $this->_cantMaxima){
		$siExiste = false;
		
		foreach($this->_listaDePasajeros as $pasajero){
			
			if($nuevoPasajero->Equals($pasajero)){
				$siExiste = true;
				break;
			}
		}
		if(!$siExiste){
			$this->_listaDePasajeros[] = $nuevoPasajero;
			return true;
		}
	}
	return false;
}

//Agregar un método de instancia llamado MostrarVuelo, que mostrará la información de un vuelo.

public static function MostrarVuelo($unVuelo){
	echo $unVuelo->GetVuelo();
}

//Crear el método de clase “Add” para que permita sumar dos vuelos. El valor devuelto deberá ser de tipo numérico, y representará el valor recaudado por los vuelos. Tener en cuenta que si un pasajero es Plus, se le hará un descuento del 20% en el precio del vuelo.

public static function Add($unVuelo, $otroVuelo){
	return self::CalculaPrecioTotalVuelo($unVuelo) + self::CalculaPrecioTotalVuelo($otroVuelo);
}

private static function CalculaPrecioTotalVuelo($vuelo){
	$precioTotal = 0;
	$precio = $vuelo->_precio;
	$precioConDescuento = $precio - $precio * 0.20;
	
	foreach($vuelo->_listaDePasajeros as $pasajero){
		
		if($pasajero->__get("_esPlus")){//__get() sobrecarga que se utiliza para consultar datos a partir de propiedades inaccesibles.
			$precioTotal += $precioConDescuento;
		}else{
			$precioTotal += $precio;
		}
	}
	return $precioTotal;
}



//Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y cuando el pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un objeto de tipo Vuelo.

public static function Remove($vuelo,$pasajero){
	foreach($vuelo->_listaDePasajeros as $key => $pasajer){
		
		if($pasajer->Equals($pasajero)){
			unset($vuelo->_listaDePasajeros[$key]);
			break;
		}
	}
	return $vuelo;
}

	
}


?>
