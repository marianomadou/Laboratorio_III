<?php

include_once ("./traerVehiculos.php");
include_once ("./crearVehiculo.php");
$mensaje = "";
$fileProveedores = "./proveedores.txt";
$filePedidos = "./pedidos.txt";
$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo)
{
    case 'POST':
        switch ($_POST['caso'])
        {
            case 'cargarProveedor':
                $mensaje = json_encode(Proveedor::cargarProveedor($fileProveedores));
                break;
            case 'hacerPedido':
                $mensaje = json_encode(Pedido::hacerPedido($fileProveedores, $filePedidos));
                break;
            case 'modificarProveedor':
                $mensaje = json_encode(Proveedor::modificarProveedor($fileProveedores));
                break;
            default:
                $mensaje = 'Usar la propiedad "caso" con el valor "cargarProveedor", "hacerPedido" o "modificarProveedor"';
                break;
        }
        break;
    case 'GET':
        switch ($_GET['caso'])
        {
            case 'consultarProveedor':
                $mensaje = json_encode(Proveedor::consultarProveedor($fileProveedores));
                break;
            case 'proveedores':
                $mensaje = json_encode(Proveedor::proveedores($fileProveedores));
                break;
            case 'listarPedidos':
                $mensaje = json_encode(Pedido::listarPedidos($filePedidos));
                break;
            case 'listarPedidoProveedor':
                $mensaje = json_encode(Pedido::listarPedidoProveedor($filePedidos));
                break;
            case 'fotosBack':
                $mensaje = json_encode(Proveedor::fotosBack($fileProveedores));
                break;
            default:
                $mensaje = 'Usar la propiedad "caso" con el valor "consultarProveedor", "proveedores" o "listarPedidos"';
                break;
        }
        break;
}
echo $mensaje;
?>
