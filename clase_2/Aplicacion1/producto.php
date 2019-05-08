<?php

	
/**
 * 
 */
class Producto
{
	public $_idup;
	public $_nombre;
	public $_importador;
	public $_paisDeOrigen;
	public $_capacidadKg;

	function __construct($id=1, $nom="Gaseosa", $imp="Vecap S.A.", $pais="Venezuela", $capac=10)
	{
		$this->_idup= $id;
		$this->_nombre= $nom;
		$this->_importador= $imp;
		$this->_paisDeOrigen= $pais;
		$this->_capacidadKg= $capac;
	}

	public function MostrarProducto($unProducto){

		echo 
		"<div>"."Id producto: ".$unProducto->_idup."<br>". 
		"Nombre: " . $unProducto->_nombre."<br>". 
		"Importador: " . $unProducto->_importador."<br>". 
		"Pais de origen: " . $unProducto->_paisDeOrigen."<br>". 
		"Capacidad: " . $unProducto->_capacidadKg."<br>". 
		"***********************************" ."<br><br>" .
		"</div>";

	}

	public function siExiste($unProducto)
        {
            if($unProducto->_nombre == $this->_nombre)
            {
                return true;
            }
            return false;
        }


}

?>









