<?php
if(isset($_GET['tipo']))
{
    $tipo = $_GET['tipo'];

    $pizza = Pizza::TraerPizzasPorTipo($RUTA_PIZZAS, $tipo);

    if($pizza != null)
    {
        echo "<div align='center'><h1>Lista filtrada por tipo</h1></div>"  ;
        echo Pizza::PizzasATabla($pizza, $RUTA_CARPETA_IMAGENES);
    }
    else
        echo "No existe ".$tipo;
    }
else
{
    echo 'Error cargue "mostrar" y elija un "tipo".';
}
?>