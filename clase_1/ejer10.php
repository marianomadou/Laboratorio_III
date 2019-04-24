

<?php
/*
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando las estructuras while y foreach.
*/


echo "Generando los datos del array...<br /><br />";
$nros_a_generar = 10;
$numeros = NULL;   // el array donde se almacena los números
$comimpares = 0;
$numeros_clasificados = NULL;

echo "Los n&uacute;meros del array...<br />";
for ($i = 0; $i < $nros_a_generar; $i++ ) {
	$numeros[$i] = mt_rand(1,100);
	if ( ($numeros[$i] % 2) != 0) {  // es impar
		$numeros_clasificados[$comimpares++] = $numeros[$i];
	}

	echo $comimpares[$i]. " ";
}
echo "<br/><br />";



?>


