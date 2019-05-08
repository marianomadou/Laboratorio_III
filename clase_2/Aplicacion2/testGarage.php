<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test Garage - Aplicacion 2</title>
</head>

<body>

<?php

include "./auto_class.php";
include "./garage_class.php";

//Crear dos objetos “Auto” de la misma marca y distinto color.
$auto1=new Auto("Blanco", 180000, "Chevrolet");
$auto2=new Auto("Negro", 170000, "Chevrolet");
//$auto2=new Auto("Blanco", 170000, "Chevrolet");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$auto3=new Auto("Gris plata", 150000, "Ford");
$auto4=new Auto("Gris plata", 220000, "Ford");

//Crear un objeto “Auto” utilizando la sobrecarga restante.
$auto5=new Auto("Gris  plata", 240000, "Ford", date("Y-m-d H:i:s"));

    $garage= new Garage("Los gronchos",25);

    echo "<strong>Agregando Autos..... </strong><br>";
    $garage->Add($auto1);
    $garage->Add($auto2);
    $garage->Add($auto3);
    $garage->Add($auto4);
    $garage->Add($auto5);

    echo "<strong>Mostrar autos del </strong>";
    $garage->MostrarGarage();
    echo "<br><br>";

    echo "<strong>Borrando el primer auto....</strong><br>";
    $garage->Remove($auto1);
    echo "<strong>despues de borrar el auto: </strong><br>";
    $garage->MostrarGarage();
    echo "<br><br>";
	
	echo "<strong>Borrando el tercer auto....</strong><br>";
    $garage->Remove($auto3);
    echo "<strong>Garage despues de borrar auto:</strong><br>";
    $garage->MostrarGarage();
    echo "<br><br>";

?>


</body>
</html>