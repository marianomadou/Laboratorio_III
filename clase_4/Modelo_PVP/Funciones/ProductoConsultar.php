<?php
if(isset($_GET['bebida']) && isset($_GET['tipo']))
{
    $bebida = $_GET['bebida'];
    $tipo = $_GET['tipo'];
    $respuesta = Producto::ExisteProductoPorBebidaYTipo($RUTA_PRODUCTOS, $bebida, $tipo);
    if($respuesta){
		
        echo "Existe ese tipo de bebida.";
    }
    else
        echo "No existe la bebida ".$bebida." y tipo ".$tipo.".";
}
else
{
    echo 'Error! cargue correctamente "bebida" y "tipo".';
}
?>