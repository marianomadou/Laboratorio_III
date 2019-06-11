<?php
if(isset($_GET['mostrar']))
{
    $mostrar = $_GET['mostrar'];
    $ventas = Venta::Cargar($RUTA_VENTAS);
    usort($ventas, 'Venta::EsCantidadMenorQue');
    $ventas = array_reverse($ventas);
    $result = array_slice($ventas, 0, 3);

    if($ventas != null)
    {
        switch ($mostrar)
        {
            case 'tabla':   
                echo Venta::VentasATablaTop($result, $RUTA_CARPETA_IMAGENES_RECURSOS);
                break;
            default:
                break;
        }
    }
    else{
        echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error fatal!</strong> No hay ventas realizadas.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
    }
        
}
else
{
    echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> Cargue en "mostrar": "tabla".
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
}
?>