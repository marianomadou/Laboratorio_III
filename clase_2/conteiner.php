<?php

/**
 * 
 funcion agregarProducto(recibe un producto)
 si existe y hay capacidad (kilos libres) lo sumo a los kilos.

 Si no existe y hay kilos libres, lo agrego

 Si no hay kilos libres

DamekilosLibres () funcion. Recorre el array, los suma y devuelve la cantidad de los kilos.

 */


class Conteiner
{
	public $_id;
	public $_tamano;
	public $_capacidad;
	public $_listadodeProductos; //array de productos


	function __construct($ida, $tam,$capac)

	{	$this->_listadodeProductos=array();
		$this->_id= $ida;
		$this->_tamano= $tam;
		$this->_capacidad= $capac;
	}


	public function Mostrar()
        {
            echo 
		"<div>" . "Id conteiner: ". $this->_id ."<br>" . 
		"Tamaño: " . $this->_tamano ."<br>" . 
		"Capacidad: " . $this->_capacidad . "<br>" . 
		"</div>";

        }


	public function Existe($unProducto){

       return in_array($unProducto,$this->_listadodeProductos);

    }

    public function AgregarProducto($unProducto){
        if(!$this->Existe($unProducto)){
            array_push($this->_listadodeProductos,$unProducto);
        }
    }

    

    public function MostrarConteiner(){
        foreach($this->_listadodeProductos as $producto ){
            echo Producto::MostrarProducto($producto);
        }
    }
   

}

?>