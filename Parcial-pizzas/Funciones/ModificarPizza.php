<?php
parse_str(file_get_contents("php://input"), $params);

if(isset($params["id"])&&isset($params["sabor"])&&isset($params["precio"])&&isset($params["tipo"])&&isset($params["cantidad"]))
{
    $id = $params['id'];
    $sabor=$params['sabor'];
    $precio=$params['precio'];
    $tipo=$params['tipo'];
    $cantidad=$params['cantidad'];
    
    $pizza=new Pizza($id, $sabor, $precio, $tipo, $cantidad);

    //var_dump($pizza);

    if(Pizza::ModificarPizzaPorId($RUTA_PIZZAS, $id, $pizza))
    {
        echo"<br/>Exito.";
    }else{
        echo"<br/>Falló al intentar modificar la pizza.";
    }
}
?>