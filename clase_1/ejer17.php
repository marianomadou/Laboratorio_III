<?php
/*
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas: “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/


validaString("PROGRAMACION", "15");

function validaString($palabra, $max){

	$tamPalabra=strlen($palabra);//cuento cuantas letras tiene la palabra
	
	if($tamPalabra>$max){
		echo "el tamaño de la palabra es demasiado extenso<br>";
		exit();
	}else{
		$arrayPalabras=array("Recuperatrio", "Parcial", "Programacion");
		
		echo "el tamaño de la palabra es correcto<br>";
		
		for($i=0; $i<count($arrayPalabras);$i++)
		{
			if (strcasecmp($palabra, $arrayPalabras[$i]) == 0) {
				
				echo "la palabra " . $palabra . " ya se encuentra en el listado. no es válida<br>";
				return 1;
			}
		}
		
		echo "la palabra elegida es válida y no se encontró en el listado";
		return 0;
	}
}

?>


