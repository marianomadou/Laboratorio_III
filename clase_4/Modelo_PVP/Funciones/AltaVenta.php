<?php
if(isset($_POST['nombre']) && isset($_POST['bebida']) && isset($_POST['tipo']) && isset($_POST['cantidad']) && isset($_FILES['imagen']))
{
    $nombre = $_POST['nombre'];
    $bebida = $_POST['bebida'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_FILES['imagen'];
    if($tipo == "gaseosa" || $tipo == "alcoholica"){
		
        if($bebida == "coca-cola" || $bebida == "fanta" || $bebida == "cerveza"){
			
            $idStock = Producto::RetornarIdStock($RUTA_PRODUCTOS, $bebida, $tipo, $cantidad);
            if($idStock != null){
				
                $miProducto = Producto::TraerProductoPorId($RUTA_PRODUCTOS, $idStock);
                if($miProducto != null)
                {
                    if($miProducto->Vender($RUTA_PRODUCTOS, $cantidad))
                    {
                        $venta = new Cliente(1, $nombre, $bebida, $tipo, $cantidad);
                        if($venta->Guardar($RUTA_CLIENTES))
                        {
                            if($venta->CargarImagen($imagen, $RUTA_CARPETA_IMAGENES))
                                echo "Exito.";
                            else
                            {
                                $venta->BorrarVenta($RUTA_VENTAS);
                                echo "Fallo.";
                            }
                        }
                        else
                            echo "Fallo.";
                    }
                    else
                        echo "Fallo.";
                }
                else
                    echo "Fallo.";
            }
            else
                echo "No hay stock.";
        }
        else
            echo 'Error cargue "bebida" como "cocacola", "fanta" o "cerveza".';
    }
    else
        echo 'Error cargue "tipo" como "gaseosa" o "alcoholica".';
    
}
else
    echo 'Error cargue "nombre", "bebida", "tipo", "cantidad" y "imagen".';
?>