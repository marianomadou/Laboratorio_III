<?php
if(isset($_GET['bebida'])){
	
    $bebida = $_GET['bebida'];
    $productos = Producto::TraerProductosPorBebida($RUTA_PRODUCTOS, $bebida);
    if($productos != null){
		
        echo Producto::ProductoToTable($productos, $RUTA_CARPETA_IMAGENES);
    }else{
		
        echo "No existe ".$sabor;
	}
}
else
{
    echo 'Error cargue "bebida" como parametro en el GET.';
}
?>