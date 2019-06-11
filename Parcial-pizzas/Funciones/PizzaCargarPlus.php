<?php
if(isset($_POST['sabor']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['cantidad']))
{
    $sabor = $_POST['sabor'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    if($tipo == "molde" || $tipo == "piedra")
    {
        if($sabor == "muzza" || $sabor == "jamon" || $sabor == "especial")
        {
            $pizza = new Pizza(1, $sabor, $precio, $tipo, $cantidad);
            if(Pizza::ExistePizzaPorSaborYTipo($RUTA_PIZZAS, $sabor, $tipo)==true){
                
                echo"la pizza ya existe";
                $newPizza=Pizza::TraerPizzasPorTipoySabor($RUTA_PIZZAS, $sabor, $tipo);
                var_dump($newPizza);
                $newPizza->precio=$pizza->precio;
                $newPizza->cantidad+=$pizza->cantidad;
                $pizza->Guardar($RUTA_PIZZAS);

            }else{
                $pizza->Guardar($RUTA_PIZZAS);
                echo "Exito.";
            }
            //else  echo "Fallo al intentar guardar.";
        }
        else
            echo 'Error cargue "sabor" como "muzza", "jamon" o "especial".';
    }
    else
        echo 'Error cargue "tipo" como "molde" o "piedra".';
}
else
    echo 'Error cargue "id", "sabor", "precio", "tipo", "cantidad".';
?>