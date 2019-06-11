<?php
if(isset($_GET['mostrar']))
{
    $mostrar = $_GET['mostrar'];
    $pizzas = Pizza::Cargar($RUTA_PIZZAS);

    usort($pizzas, 'Pizza::EsCantidadMenorQue');

    $pizzas = array_reverse($pizzas);
    $result = array_slice($pizzas, 0, 3);

    if($pizzas != null)
    {
        switch ($mostrar)
        {
            case 'tabla':
                echo "<div align='center'><h1>Lista de stock TOP 3</h1></div>"  ;   
                echo Pizza::PizzasATabla($result, $RUTA_CARPETA_IMAGENES);
                break;
            default:
                break;
        }
    }
    else
    echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error fatal!</strong> No hay pizzas cargadas realizadas.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
}
else
{
    echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> Cargue en "mostrar": "tabla".
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
}
?>