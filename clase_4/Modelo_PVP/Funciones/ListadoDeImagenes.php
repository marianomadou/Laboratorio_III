<?php
if(isset($_GET['mostrar'])){
	
    $mostrar = $_GET['mostrar'];
    $productos = Producto::Cargar($RUTA_PRODUCTOS);
    if($productos != null){
		
        switch ($mostrar){
			
            case 'cargadas':
                echo Producto::ProductoToTable($productos, $RUTA_CARPETA_IMAGENES);
                break;
            case 'borradas':
                echo Producto::ProductoToTable($productos, $RUTA_CARPETA_IMAGENES_BACKUP);
                break;
            default:
                break;
        }
    }
    else
        echo "Error no hay productos cargados.";
}
else
{
    echo 'Error cargue en "mostrar": "cargados" o "borrados".';
}
?>