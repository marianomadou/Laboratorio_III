<?php
if(isset($_GET['sabor']))
{
    $sabor = $_GET['sabor'];
    $pizzas = Pizza::TraerPizzasPorSabor($RUTA_PIZZAS, $sabor);

    if($pizzas != null)
    {
        echo "<div align='center'><h1>Lista filtrada por sabor</h1></div>"  ;
        echo Pizza::PizzasATabla($pizzas, $RUTA_CARPETA_IMAGENES);
    }
    else
        echo "No existe ".$sabor;
    }
else
{
    echo 'Error cargue un "sabor".';
}

?>