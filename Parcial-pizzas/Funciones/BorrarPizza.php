<?php

parse_str(file_get_contents("php://input"), $params);
if(isset($params["sabor"])&&isset($params["tipo"]))
{
    $sabor = $params['sabor'];
    $tipo = $params['tipo'];

    $pizza = Pizza::TraerPizzasPorTipoySabor2($RUTA_PIZZAS, $sabor, $tipo);
    
    if($pizza != null){
	
        if($pizza->MoverImagenABackUp2($RUTA_CARPETA_IMAGENES_BACKUP, $RUTA_CARPETA_IMAGENES, $RUTA_PIZZAS))
        {
            if($pizza->BorrarPizza2($RUTA_PIZZAS, $pizza)!=null)
            {
                echo "La imagen se pudo subir correctamente al Backup y borrar el item.";
            }
            else
                {echo "No se pudo borrar el id.";}
        }
        else{
            echo "No se pudo hacer el backUp de la imagen.";}
	}else{
        echo "No existe una pizza con ese ".$sabor ." y tipo" .$tipo;}
}
else
{
    echo 'Error cargue "id".';
}
?>