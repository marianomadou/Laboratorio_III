<?php
if(isset($_POST['email']) && isset($_POST['sabor']) && isset($_POST['tipo']) && isset($_POST['cantidad']))
{
    $email = $_POST['email'];
    $sabor = $_POST['sabor'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    if($tipo == "molde" || $tipo == "piedra")
    {
        if($sabor == "muzza" || $sabor == "jamon" || $sabor == "especial")
        {
            $idStock = Pizza::RetornarIdStock($RUTA_PIZZAS, $sabor, $tipo, $cantidad);
            if($idStock != null)
            {
                $miPizza = Pizza::TraerPizzaPorId($RUTA_PIZZAS, $idStock);
                if($miPizza != null)
                {
                    if($miPizza->Vender($RUTA_PIZZAS, $cantidad))
                    {
                        //ID AUTOINCREMENTAL
                        $venta = new Venta(1, $email, $sabor, $tipo, $cantidad);
                        if($venta->Guardar($RUTA_VENTAS))
                        {
                                echo "Exito.";
                        }
                        else
                            echo "Fallo.";
                    }
                    else
                        echo "Fallo.";
                }
                else
                    echo "Fallo.";
            }
            else
                echo "No hay stock.";
        }
        else
            echo 'Error cargue "sabor" como "muzza", "jamon" o "especial".';
    }
    else
        echo 'Error cargue "tipo" como "molde" o "piedra".';
    
}
else
    echo 'Error cargue "email", "sabor", "tipo", "cantidad" y "imagen".';
?>