

<?php
/*
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/

$lapiceras=array(	
				"Lapicera 1"=>array("color"=>"blanco","marca"=>"rotring", "trazo"=>"0,5","precio"=>"$200"),
				"Lapicera 2"=>array("color"=>"azul","marca"=>"mont blanc", "trazo"=>"0,7","precio"=>"$800"),
				"Lapicera 3"=>array("color"=>"rojo","marca"=>"bic", "trazo"=>"0,3","precio"=>"$50")
				);

foreach($lapiceras as $key=>$lapicera)
{ 	
		echo $key . ": " . "Color: " .$lapicera['color'] . "; ";
		echo "Marca: " .$lapicera['marca'] . "; ";
		echo "Trazo: " .$lapicera['trazo'] . "; ";
		echo "Precio: " .$lapicera['precio'] . "<br>";
}


?>



