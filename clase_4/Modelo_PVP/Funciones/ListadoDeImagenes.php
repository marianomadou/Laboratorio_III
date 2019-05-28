<?php
if(isset($_GET['mostrar'])){
	
    $mostrar = $_GET['mostrar'];
    $productos = Producto::Cargar($RUTA_PRODUCTOS);
    if($productos != null){
		
        switch ($mostrar){
			
            case 'cargados':
                echo Producto::ProductoToTable($productos, $RUTA_CARPETA_IMAGENES);
                break;
            case 'borrados':
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