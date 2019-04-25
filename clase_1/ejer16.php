

<?php
/*
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$miArray=array('h','o','l','a');

echo "Muestra el array en sentido normal: <br>";
for($i=0;$i<count($miArray);$i++)
{
	echo $miArray[$i];
}

echo "<br>Muestra el array en sentido inverso: <br>";

$miArrayReverse=arrayRevertido($miArray); 

for($i=0;$i<count($miArrayReverse);$i++)
{
	echo $miArrayReverse[$i];
}

function arrayRevertido($array){ //funcion que revierte el orden del array
    return array_reverse($array);
} 


?>


