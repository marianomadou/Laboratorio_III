

<?php
/*
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la función rand). Mediante una estructura condicional, determinar si el promedio de los números son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el resultado.
*/
//arrays indexados (se asocian por posicion/indice) //arrays asociativos (se asocian por valor)

	$miArray=array();
	
	for ($i=0;$i<5;$i++) {
		
	    $num_aleatorio = rand(1,10);
    	array_push($miArray,$num_aleatorio);
		
    }
	
	for($i=0;$i<5;$i++)
	{
		echo "el numero en la posición del array " . $i . " es: " . $miArray[$i] . "<br>";
	}
	
	echo "--------------------------------------------------<br>";
	
	
	$promedio= array_sum ($miArray)/count($miArray);

	
	echo "promedio : " . $promedio;
	
	if($promedio>6){
		echo "<br>el promedio es <strong>mayor a 6</strong>";
	}elseif($promedio<6)
	{
		echo "<br>el promedio es <strong>menor a 6</strong>";
	}else{
		 echo "<br>el promedio es <strong>igual a 6</strong>";
	}

?>


