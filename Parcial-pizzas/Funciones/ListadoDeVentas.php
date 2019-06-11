<?php
if(isset($_GET['mostrar']))
{
    $mostrar = $_GET['mostrar'];
    $ventas = Venta::Cargar($RUTA_VENTAS);

    if($ventas != null)
    {
        switch ($mostrar)
        {
            case 'tabla':   
                echo Venta::VentasATabla($ventas, $RUTA_CARPETA_IMAGENES);
                break;
            default:
                break;
        }
    }
    else{
        echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error fatal!</strong> no hay ventas realizadas.
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