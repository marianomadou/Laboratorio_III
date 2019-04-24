

<?php
/*
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando las estructuras while y foreach.
*/


$i = 1;     // contar los números generados
$n = 10;   // cuantos impares se deben generar
$impar = 1; // el numero impar generado
$miArray=array();


while ( $i <= $n){
	array_push($miArray,$impar);
	$i = $i + 1;
	$impar = $impar + 2;
}

echo "<br>Recorriendo el array cargado con numeros impares con la estructura FOR <br>";
for($i=0;$i<10;$i++)
	{
		echo $miArray[$i] . "<br>";
	}
echo "<br>Recorriendo el array cargado con numeros impares con la estructura FOREACH <br>";

foreach ($miArray as $v) {
    echo $v . "<br>";
}


echo "<br>Recorriendo el array cargado con numeros impares con la estructura while <br>";
$contador=0;

while ( $contador < count($miArray)){
	echo $miArray[$contador] . "<br>";
	$contador++;
}


?>



