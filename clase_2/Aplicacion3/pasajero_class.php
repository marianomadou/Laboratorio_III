<?php

class Pasajero{
	
//Atributos privados: _apellido (string), _nombre (string), _dni (string), _esPlus (boolean)
private $_apellido;
private $_nombre;
private $_dni;
private $_esPlus;

//Crear un constructor capaz de recibir los cuatro parámetros.
public function __construct($name, $surname, $document, $plus){
	$this->_nombre=$name;
	$this->_apellido=$surname;
	$this->_dni=$document;
	$this->_esPlus=$plus;
}

//Crear el método de instancia “Equals” que permita comparar dos objetos Pasajero. Retornará TRUE cuando los _dni sean iguales.
public function Equals($unPasajero){
	if(!is_null($unPasajero)){
		if($unPasajero->_dni == $this->_dni){
			return TRUE;	
		}else{
			return FALSE;
		}
	}
}

//Agregar un método getter llamado GetInfoPasajero, que retornará una cadena de caracteres con los atributos concatenados del objeto.
public function GetInfoPasajero(){
	return "<br/>Nombre: ".$this->_nombre." ".$this->_apellido."<br/>DNI: ".$this->_dni;
}

//Agregar un método de clase llamado MostrarPasajero que mostrará los atributos en la página.
public static function MostrarPasajero($pasajero){
	echo $pasajero->GetInfoPasajero();
}

//para poder acceder a una propiedad inaccesible
public function __get($property){
	return $this->$property;
}

}



?>