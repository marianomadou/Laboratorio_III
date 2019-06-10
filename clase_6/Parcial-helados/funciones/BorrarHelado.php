<?php
//Funciona con "x-www-form-urlencoded"

parse_str(file_get_contents("php://input"), $params);
//var_dump($params);
if(isset($params["id"]))
{
    $id = $params['id'];

    $helado = Helado::TraerHeladoPorId($RUTA_HELADOS, $id);
    if($helado != null)
        if($helado->BorrarHelado($RUTA_HELADOS))
        {
            if($helado->MoverImagenABackUp($RUTA_CARPETA_IMAGENES_BACKUP, $RUTA_CARPETA_IMAGENES, $RUTA_HELADOS))
            {
                echo "Exito.";
            }
            else{
                echo "No se pudo hacer el backUp de la imagen.";
            }
                
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