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