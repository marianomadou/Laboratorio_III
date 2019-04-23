
<?php

	$operador;
	$resultado;

	$numero1=2;
	$numero2=5;





	function setOperador($operador)
	{
		//$operador=$operador;
		return $operador;
	}

	function calcular($numero1,$numero2, $operador){
		switch ($operador) {
			case '*':
				$resultado=multiplicar($numero1,$numero2);
				break;
			case '/':
				$resultado=dividir($numero1,$numero2);
				break;
			case '+':
				$resultado=sumar($numero1,$numero2);
				break;
			case '-':
				$resultado=restar($numero1,$numero2);
				break;
			
			default:
				echo "usted puso un operador incorrecto";
				break;

		}
		return $resultado;
	}

	function mostrarResultados($operador, $resultado){
		switch ($operador) {
			case '*':
				echo "la multiplicacion es: " . $resultado;
				break;
			case '/':
				echo "la division es: " . $resultado;
				break;
			case '+':
				echo "la suma es: " . $resultado;
				break;
			case '-':
				echo "la resta es: " . $resultado;
				break;
			
			default:
				echo "usted puso un operador incorrecto";
				break;
		}
	}




	function multiplicar($numero1,$numero2)
	{
		return $numero1*$numero2;
	}
	
	function dividir($numero1,$numero2)
	{
		return $numero1/$numero2;
	}
	function sumar($numero1,$numero2)
	{
		return $numero1+$numero2;
	}
	function restar($numero1,$numero2)
	{
		return $numero1-$numero2;
	}

	$operador=setOperador('*');
	$resultado=calcular($numero1,$numero2,$operador);
	mostrarResultados($operador, $resultado);


?>