<?php
if(isset($_GET['sabor']))
{
    $sabor = $_GET['sabor'];
    $pizzas = Pizza::TraerPizzasPorSabor($RUTA_PIZZAS, $sabor);
    usort($pizzas, 'Pizza::EsCantidadMayorQue');
    
    if($pizzas != null)
    {
        echo Pizza::PizzasATabla($pizzas, $RUTA_CARPETA_IMAGENES);
    }
    else
        echo "No existe ".$sabor;
}
else
{
    echo 'Error cargue "sabor".';
}
?>