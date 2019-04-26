

<?php
/* Aplicación Nº 14 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los Arrays de Arrays.*/

$animales=array();
array_push($animales,"Perro","Gato","Ratón", "Araña", "Mosca");

$anio=array();
array_push($anio,1986,1996,2015,78,86);

$lenguaje=array();
array_push($lenguaje,"php","mysql","html5","typescript","ajax");

$asociativo=array();
$asociativo['animales']=$animales;
$asociativo['anio']=$anio;
$asociativo['lenguajes']=$lenguaje;

echo "ASOCIATIVO.<br>";
var_dump($asociativo);
echo "<br>INDEXADO.<br>";

$indexado=array();
$indexado[0]=$animales;
$indexado[1]=$anio;
$indexado[2]=$lenguaje;
var_dump($indexado);

?>



