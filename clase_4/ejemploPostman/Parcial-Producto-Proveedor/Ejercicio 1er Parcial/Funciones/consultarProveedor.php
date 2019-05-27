<?php

require_once "Clases/proveedor.php";

echo "<br>ENTRO A consultarProveedor.php (por NOMBRE)<br/>";

if(isset($_GET['nombre']))
{
 $nombre=$_GET['nombre'];

    $estaAlumno= proveedor::TraerProveedorPorNombre("Archivos/proveedores.txt",$nombre);
    
    if($estaAlumno == true)
    {
        echo $estaAlumno->ToString();
    }
    else
    {
        echo "El proveedor ".$nombre. " no se encuentra en la lista Proveedores.txt";

    }
    
}

else
{
    echo "FALTAN DATOS";
}



?>