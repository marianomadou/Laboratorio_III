<?php
class vehiculo{
	//atributos
	private $_patente;
	private $_ingreso;
	private $_importe;
	
	function __construct($pat, $ing, $imp)
	{
		$this->_patente= $pat;
		$this->_ingreso= $ing;
		$this->_importe= $imp;
	}

	public function Mostrar(){

		echo 
		"<div> Patente: $this->_patente - Ingreso: $this->_ingreso - Importe: $this->_importe <br></div>";

	}


	public static function Leer(){
		$archivo=fopen("./vehiculo.txt", "r");
		$retorno=array();

		while (!feof($archivo)) {

			$renglon=fgets($archivo);
			$arrayDeDatos=explode(",", $renglon);//Divide un string en varios string
			var_dump($arrayDeDatos);
			$vehiculo= new vehiculo($arrayDeDatos[0], $arrayDeDatos[1], $arrayDeDatos[2]);
			array_push($retorno, $vehiculo);


		}fclose($archivo);

		return $retorno;
	}

	public function Guardar($vehiculo){

		$archivo= fopen("./vehiculo.txt", "a");
		$renglon=implode(",", $vehiculo->toArray());
		fputs($archivo, $renglon.",\n");
		fclose($archivo);


	}

	public function toArray()
	{
		$retorno=array();
		array_push($retorno, $this->_patente);
		array_push($retorno, $this->_ingreso);
		array_push($retorno, $this->_importe);
		return $retorno;
	}



}

?>