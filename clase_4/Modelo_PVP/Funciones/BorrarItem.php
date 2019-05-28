<?php
//Funciona con "x-www-form-urlencoded"
parse_str(file_get_contents("php://input"), $params);
if(isset($params["id"]))
{
    $id = $params['id'];
    $producto = Producto::TraerproductoPorId($RUTA_PRODUCTOS, $id);
    if($producto != null)
        if($producto->BorrarProducto($RUTA_PRODUCTOS))
        {
            if($producto->MoverImagenABackUp($RUTA_CARPETA_IMAGENES_BACKUP, $RUTA_CARPETA_IMAGENES, $RUTA_PRODUCTOS))
            {
                if($producto->CargarImagen($imagen, $RUTA_CARPETA_IMAGENES))
                    echo "Exito.";
                echo "La imagen no se pudo subir.";
            }
            else
                echo "No se pudo hacer el backUp de la imagen.";
        }
        else
            echo "Fallo";
    else
        echo "No existe ".$id;
}
else
{
    echo 'Error cargue "id".';
}
?>