<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplicación 3 || Vuelos - Pasajeros</title>
</head>

<body>

<?php

require_once "./pasajero_class.php";
require_once "./vuelo_class.php";

//$name="sin dato", $surname="sin dato", $document="00000000", $plus=FALSE
$pasajero1=new Pasajero("Mariano", "Madou", "27387009", TRUE);
$pasajero2=new Pasajero("Mercedes", "Guerrero", "34152235", FALSE);
$pasajero3=new Pasajero("Gonzalo","Ferrer","26948926",TRUE);
$pasajero4=new Pasajero("Octavio","Villegas","25486241", FALSE);

//$company,$price,$maximumQuantity=0
$vuelo1=new Vuelo("Aerolineas Argentinas",950.75,3);
$vuelo2 = new Vuelo("Norway Airlines",1180.15,2);

echo "<br><strong>Agregando pasajeros al vuelo 1 (Buenos Aires - Bahía)....</strong><br>";	

$vuelo1->AgregarPasajero($pasajero1);
$vuelo1->AgregarPasajero($pasajero2);
$vuelo1->AgregarPasajero($pasajero3);

if(!$vuelo1->AgregarPasajero($pasajero1)){
	echo "<br>1er pasajero: ";
	Pasajero::MostrarPasajero($pasajero1);echo "<br>";
	}else{ 
		echo "No se pudo<br>";
	}
if(!$vuelo1->AgregarPasajero($pasajero2)){
	echo "<br>2do pasajero: ";
	Pasajero::MostrarPasajero($pasajero2);echo "<br>";
	}else{ 
		echo "No se pudo<br>";
	}
if(!$vuelo1->AgregarPasajero($pasajero3)){
	echo "<br>3er pasajero: ";
	Pasajero::MostrarPasajero($pasajero3);echo "<br>";
	}else{ 
		echo "No se pudo<br>";
	}
if(!$vuelo1->AgregarPasajero($pasajero4)){
	echo "<br>4to pasajero: ";
	Pasajero::MostrarPasajero($pasajero4);echo "<br>";
	}else{ 
		echo "No se pudo<br>";
	}


echo "<br>********************************************************************************************************";
echo "<br><strong>Mostrar vuelo 1 (Buenos Aires - Bahía)</strong><br>";	
Vuelo::MostrarVuelo($vuelo1);	
echo "<br>********************************************************************************************************<br>";

echo "<br><strong>Eliminando del vuelo 1 al pasajero 3.</strong><br>";
Vuelo::Remove($vuelo1,$pasajero3);

echo "<br>********************************************************************************************************";
echo "<br><strong>Mostrar vuelo 1 (Buenos Aires - Bahía)</strong><br>";	
Vuelo::MostrarVuelo($vuelo1);	
echo "<br>********************************************************************************************************<br>";

echo "<br><strong>Eliminando del vuelo 1 al pasajero 2.</strong><br>";
Vuelo::Remove($vuelo1,$pasajero2);

echo "<br>********************************************************************************************************";
echo "<br><strong>Mostrar vuelo 1 (Buenos Aires - Bahía)</strong><br>";	
Vuelo::MostrarVuelo($vuelo1);	
echo "<br>********************************************************************************************************<br>";

echo "<br><strong>Agregando pasajero al vuelo 2 (Montevideo - Córdoba)....</strong><br>";	

$vuelo2->AgregarPasajero($pasajero4);

if(!$vuelo2->AgregarPasajero($pasajero4)){
	echo "<br>1er pasajero: ";
	Pasajero::MostrarPasajero($pasajero4);echo "<br>";
	}else{ 
		echo "No se pudo<br>";
	}

echo "<br><strong>Recaudación total de los vuelos 1 y 2: $" . Vuelo::Add($vuelo1,$vuelo2) . "</strong></br>";

?>

</body>
</html>