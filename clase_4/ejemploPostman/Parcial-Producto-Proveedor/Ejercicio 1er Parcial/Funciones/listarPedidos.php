<?php

echo "Listando Pedidos.php  ...";
require_once "Clases/pedido.php";
require_once "Clases/proveedor.php";
$RUTA_PEDIDOS="Archivos/pedidos.txt";
$RUTA_PROVEEDORES="Archivos/proveedores.txt";

echo Pedido::MostrarTablaPedidos($RUTA_PEDIDOS, $RUTA_PROVEEDORES);





?>