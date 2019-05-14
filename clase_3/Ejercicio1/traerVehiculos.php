<<?php 

include_once "vehiculo_class.php";

$listado=Vehiculo::Leer();

foreach ($listado as $auto) {
	$auto->Mostrar();

}




 ?>