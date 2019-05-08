<?php

/*
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.
*/
//require_once "/.auto_class.php";

	class Garage{
		
	//atributos privados		
	private $_razonSocial;//String
	private $_precioPorHora; //Double
	private $_autos; //array de autos de la clase Auto
	
	public function __construct($empresaName="La Cachimba S.A.", $pricePerHour=30.75){
		$this->_razonSocial=$empresaName;
		$this->_precioPorHora=$pricePerHour;
		$this->_autos=array();
	}
	
	//Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que mostrará todos los atributos del objeto.
	public function MostrarGarage(){
		echo "<strong>Garage ".$this->_razonSocial . "</strong>";
		foreach($this->_autos as $auto)
		{
			echo Auto::MostrarAuto($auto);
		}
	}
	
	//Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
	// funcion "in_array" — Comprueba si un valor existe en un array - Devuelve TRUE si  se encuentra en el array, FALSE de lo contrario.
	public function Equals($auto){
		return in_array($auto,$this->_autos);
	}
	
	//Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el auto no está en el garaje, de lo contrario informarlo).
	//Ejemplo: $miGarage->Add($autoUno);
	
	public function Add($auto){
		if(!$this->Equals($auto)){
			array_push($this->_autos,$auto); //array_push — Inserta uno o más elementos al final de un array
        }else{
			echo "no se pudo agregar el auto";
		}
	}

	//Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
	//Ejemplo: $miGarage->Remove($autoUno);
	public function Remove($auto){
        foreach($this->_autos as $i => $car){
            if($car->Equals($auto)){
                unset($this->_autos[$i]);
                return true;
            }
        }
        return false;
    }

	}
?>