<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clase 2 - Aplicación 2</title>
</head>

<body>

<?php

include "./auto_class.php";

//Crear dos objetos “Auto” de la misma marca y distinto color.
$auto1=new Auto("Blanco", 180000, "Chevrolet");
$auto2=new Auto("Negro", 170000, "Chevrolet");
//$auto2=new Auto("Blanco", 170000, "Chevrolet");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$auto3=new Auto("Gris plata", 150000, "Ford");
$auto4=new Auto("Gris  plata", 220000, "Ford");

//Crear un objeto “Auto” utilizando la sobrecarga restante.
$auto5=new Auto("Gris  plata", 240000, "Ford", date("Y-m-d H:i:s"));

//Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

//Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
Auto::Add($auto1, $auto2);

//Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
if($auto1->Equals($auto2)){
	echo"<div><p>El primer auto y el segundo son iguales </p></div>";
}else
{
	echo"<div><p>El primer auto y el segundo NO son iguales </p></div>";
}
if($auto1->Equals($auto5)){
	echo"<div><p>El primer auto y el quinto son iguales </p></div>";
}else
{
	echo"<div><p>El primer auto y el quinto NO son iguales </p></div>";
}

//Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
Auto::MostrarAuto($auto1);
Auto::MostrarAuto($auto3);
Auto::MostrarAuto($auto5);



?>

</body>
</html>