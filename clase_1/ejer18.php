<?php
/*
Crear una función llamada esPar que reciba un valor entero como parámetro y devuelva TRUE si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función esImpar.
*/

echo "el numero 5 es par: ";
var_dump (esPar(5));

echo "<br>el numero 4 es par: ";
var_dump (esPar(4));

echo "<br>el numero 5 es impar: ";
var_dump (esImpar(5));

echo "<br>el numero 4 es impar: ";
var_dump (esImpar(4));

function esPar($numero)
{
	if(($numero%2)==0){
		return true;
	}else return false;
}

function esImpar($numero)
{
	if(($numero%2)!=0){
		return true;
	}else return false;
}



?>


