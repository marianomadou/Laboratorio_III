<?php
require_once 'clases/Pizza.php';
require_once 'clases/Venta.php';
if(isset($_REQUEST['caso']))
{
    $RUTA_PIZZAS = "./archivos/Pizza.txt";
    $RUTA_PIZZAS_BORRADAS = "./archivos/PizzaBorradas.txt";
    $RUTA_VENTAS = "./archivos/Venta.txt";
    $RUTA_CARPETA_IMAGENES = "./imagenes/";
    $RUTA_CARPETA_IMAGENES_BACKUP = "./backUpFotos/";
    $caso = strtolower($_REQUEST['caso']);
    $verboHttp = strtoupper($_SERVER["REQUEST_METHOD"]);
    $caso .= "-".$verboHttp;
    switch ($caso)
    {
        case '​pizzacargar-POST':
            include "Funciones/PizzaCargar.php";
            break;
        case 'pizzaconsultar-GET':
            include "Funciones/PizzaConsultar.php";
            break;
        case 'altaventa-POST':
            include "Funciones/AltaVenta.php";
            break;
        case 'listadodeimagenes-GET':
            include "Funciones/ListadoDeImagenes.php";
            break;
        case 'listadodepizza-GET':
            include "Funciones/ListadoDePizza.php";
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