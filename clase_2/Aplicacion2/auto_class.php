<?php

class Auto{
	
	//atributos privados
	private $_color;
	private $_precio;
	private $_marca;
	private $_fecha;
		
	//Realizar un constructor capaz de poder instanciar objetos pasándole todos los parámetros:
	public function __construct($color="sin color", $price=0, $brand="sin marca", $date = "08-05-2019"){
		
		$this->_color=$color;
		$this->_precio=$price;
		$this->_marca=$brand;
		$this->_fecha=$date;
	}
	
	//Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por parámetro y que se sumará al precio del objeto.
	public function AgregarImpuestos($impuesto)
	{
		$this->_precio = $this->_precio + $impuesto;
		echo "<div><p>Se agregó el valor del impuesto, el nuevo valor es: ".$this->_precio."<br></p></div>";
	}
	
	//Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto” por parámetro y que mostrará todos los atributos de dicho objeto.
	public static function MostrarAuto($unAuto){
		
		echo "<div><p> Color: " . $unAuto->_color . "<br>Precio: " . $unAuto->_precio . "<br>Marca: " . $unAuto->_marca . "<br>Fecha: " . $unAuto->_fecha . "</p></div>" ; 
		
	}
	
	//Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo devolverá TRUE si ambos “Autos” son de la misma marca.
	public function Equals($auto1){
		if($auto1->_marca == $this->_marca){
			return TRUE;	
		}else{
			return FALSE;
		}
	}
	
	//Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con la suma de los precios o cero si no se pudo realizar la operación.
	
	public static function Add($auto1, $auto2){
		if($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color){
			$preciosSumados=$auto1->_precio + $auto2->_precio;
			if($preciosSumados)
			{
				echo "La suma del precio de los dos autos es: " . $preciosSumados . "<br>";
				return $preciosSumados;
			}
		}else{
			echo "No se pudo sumar el precio de ambos autos. Los autos no son iguales en marca y color. <strong>0</strong>";
			return 0;
		}
		
	}
		
}

?>
