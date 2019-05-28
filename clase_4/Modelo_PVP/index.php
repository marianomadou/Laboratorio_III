<?php
require './clases/Producto.php';
require './clases/Cliente.php';
if(isset($_REQUEST['caso']))
{
    $RUTA_PRODUCTOS = "./archivos/Producto.txt";
    $RUTA_PIZZAS_BORRADAS = "./archivos/PizzaBorradas.txt";
    $RUTA_CLIENTES = "./archivos/Cliente.txt";
    $RUTA_CARPETA_IMAGENES = "./imagenes/";
    $RUTA_CARPETA_IMAGENES_BACKUP = "./backUpFotos/";
    $caso = strtolower($_REQUEST['caso']);
    $verboHttp = strtoupper($_SERVER["REQUEST_METHOD"]);
    $caso .= "-".$verboHttp;
    switch ($caso)
    {
        case '​productocargar-POST':
            include "Funciones/ProductoCargar.php";
            break;
        case 'productoconsultar-GET':
            include "Funciones/ProductoConsultar.php";
            break;
        case 'altaventa-POST':
            include "Funciones/AltaVenta.php";
            break;
        case 'listadodeimagenes-GET':
            include "Funciones/ListadoDeImagenes.php";
            break;
        case 'listadodeproductos-GET':
            include "Funciones/ListadoDeProductos.php";
            break;
        case 'borraritem-DELETE':
            include "Funciones/BorrarItem.php";
            break;
        default:
            echo 'Error "HTTP" o "caso" mal ingresado.';
            break;
    }
}
else
{
    echo "Ingrese un caso.";
}
?>