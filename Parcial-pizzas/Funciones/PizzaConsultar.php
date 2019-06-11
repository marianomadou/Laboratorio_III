<?php
if(isset($_POST['sabor']) && isset($_POST['tipo']))
{
    $sabor = $_POST['sabor'];
    $tipo = $_POST['tipo'];
    
    $respuestaSaborYTipo = Pizza::ExistePizzaPorSaborYTipo($RUTA_PIZZAS, $sabor, $tipo);
    $respuestaSabor = Pizza::ExistePizzaPorSabor($RUTA_PIZZAS, $sabor);

        echo "<div align='center'><h1>Consultas de Pizzas</h1></div>"  ;
    if($respuestaSabor){

        if($respuestaSaborYTipo)
        {
            echo    '<div class="alert alert-success alert-dismissible fade show">
            <strong>Exito!</strong> Si hay pizza de sabor '.$sabor.' y del tipo '.$tipo.'
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';

        }else{
            echo    '<div class="alert alert-warning alert-dismissible fade show">
            <strong>Atención!</strong> Si hay pizza de sabor '.$sabor.' pero no del tipo '.$tipo.'
            <br> Recomendación: Busque por <strong>otro tipo</strong> de pizza.
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
        }
    }
    else
        echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> No hay pizza con sabor '.$sabor.'..
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
}
else 
{
    echo    '<div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> cargue "sabor" y "tipo".
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>';
}
?>