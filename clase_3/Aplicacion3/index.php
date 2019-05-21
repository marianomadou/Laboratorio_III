<?php
include_once ("./Clases/Proveedor.php");
include_once ("./Clases/Venta.php");
include_once ("./Clases/Producto.php");

$mensaje = "";
$archivoProveedores = "./proveedores.txt";
$archivoProductos = "./productos.txt";
$archivoVentas = "./ventas.txt";
$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo)
{
    case 'POST':
        switch ($_POST['key'])
        {
            case 'cargarProducto':
                $mensaje = json_encode(Producto::cargarProducto($archivoProductos));
                break;
			case 'cargarProveedor':
                $mensaje = json_encode(Proveedor::cargarProveedor($archivoProveedores));
                break;
            case 'hacerVenta':
                $mensaje = json_encode(Venta::hacerVenta($archivoProveedores, $archivoProductos,  $archivoVentas));
                break;
            case 'modificarProveedor':
                $mensaje = json_encode(Proveedor::modificarProveedor($archivoProveedores));
                break;
            default:
			case 'modificarProducto':
                $mensaje = json_encode(Producto::modificarProducto($archivoProductos));
                break;
            default:
                $mensaje = '';
                break;
        }
        break;
    case 'GET':
        switch ($_GET['key'])
        {
            case 'consultarProveedor':
                $mensaje = json_encode(Proveedor::consultarProveedor($archivoProveedores));//se pasa por GET (key=consultarProveedor & nombre=nombre)
                break;
            case 'consultarProducto':
                $mensaje = json_encode(Producto::consultarProducto($archivoProductos));//se pasa por GET (key=consultarProducto & nombre=nombre)
                break;				
            case 'proveedores':
                $mensaje = json_encode(Proveedor::proveedores($archivoProveedores));//se pasa por GET (key=proveedores)
                break;
            case 'productos':
                $mensaje = json_encode(Producto::productos($archivoProductos));//se pasa por GET (key=productos)
                break;
            case 'listarVentas':
                $mensaje = json_encode(Venta::listarVentas($archivoVentas));
                break;
            case 'listarVentaProveedor':
                $mensaje = json_encode(Venta::listarVentaProveedor($archivoVentas));//se pasa por GET (key=listarVentaProveedor & idProveedor=502)
                break;
            default:
                $mensaje = '';
                break;
        }
        break;
}

echo $mensaje;

?>