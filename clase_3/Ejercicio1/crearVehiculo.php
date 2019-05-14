<?php

include_once "vehiculo_class.php";

$vehiculo=new vehiculo("HZC699", "pasado mañana", 1300); 

vehiculo::Guardar($vehiculo);

?>