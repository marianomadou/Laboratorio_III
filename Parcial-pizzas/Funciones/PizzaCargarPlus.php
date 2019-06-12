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
            if(Pizza::ExistePizzaPorSaborYTipo($RUTA_PIZZAS, $sabor, $tipo)){
                
                echo"existe pizza con ese sabor y tipo";
                if(Pizza::ModificarPizzaPorSaborYTipo($RUTA_PIZZAS, $sabor, $tipo, $pizza))
                {
                    echo"<br/>Exito.";
                }else{
                    echo"<br/>Falló al intentar modificar la pizza.";
                }

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