<?php
/*
Aplicación No 15 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función que las calcule invocando la función pow).
*/

define('TAM',4); //definimos la constante TAM con valor de 4

function potencia ($numero, $potencia) //función para elevar a la potencia. recibe dos valores (base y exponente)
{
   $resultado= pow($numero, $potencia); //elevamos la base $numero al exponente $potencia
   return $resultado; //devuelve el resultado almacenado
}
 
//creamos la tabla a mostrar mediante dos bucles
echo "<table border=1>";
for ($i=1; $i<=TAM; $i++)
{
   echo "<tr>";
   for ($j=1; $j<=TAM; $j++)
      echo "<td>". potencia($i,$j). "</td>"; //pasamos el valor de los bucles a la función potencia
   echo "</tr>";
}
echo "</table>";


?>


