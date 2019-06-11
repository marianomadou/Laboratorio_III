<?php
if(isset($_GET['sabor']) && isset($_GET['precio']) && isset($_GET['tipo']) && isset($_GET['cantidad']))
{
    $sabor = $_GET['sabor'];
    $precio = $_GET['precio'];
    $tipo = $_GET['tipo'];
    $cantidad = $_GET['cantidad'];
    if($tipo == "molde" || $tipo == "piedra")
    {
        if($sabor == "muzza" || $sabor == "jamon" || $sabor == "especial")
        {
    
            $pizza = new Pizza(1, $sabor, $precio, $tipo, $cantidad);
            if($pizza->Guardar($RUTA_PIZZAS))
            {
                    echo "Exito.";
            }
            else
                echo "Fallo al intentar guardar.";
        }
        else
            echo 'Error cargue "sabor" como "muzza", "jamon" o "especial".';
    }
    else
        echo 'Error cargue "tipo" como "molde" o "piedra".';
}
else
    echo 'Error cargue "id", "sabor", "precio", "tipo", "cantidad" y "imagen".';
?>