<?php
    require "./conteiner.php";
    require "./producto.php";

    $producto1 = new Producto(1,"Coca-Cola","coto sicsa", "argentina", "700kg");
    $producto2 = new Producto(2,"Fanta","coto sicsa", "argentina", "200kg");
    $producto3 = new Producto(3,"chocolate","fel-fort", "uruguay", "300kg");
    //$producto4 = new Producto(4,"titas","arcor sa", "brasil", "10kg");
    //$producto5 = new Producto(5,"Agua Glaciar","Glaciar sa", "argentina", "150kg");

    //print_r($producto);
    //echo $producto->Mostrar();

    $conteiner = new Conteiner(5,"chico", 1000);
 	$conteiner->AgregarProducto($producto1);
 	$conteiner->AgregarProducto($producto2);
 	$conteiner->AgregarProducto($producto3);
 	$conteiner->AgregarProducto($producto4);
 	$conteiner->AgregarProducto($producto5);




 	echo "Mostrar productos:<br>";
    $conteiner->MostrarConteiner();
    echo "<br><br>";

 	echo '<br>';

 	//print_r($conteiner);
 	//echo $conteiner->Mostrar();







 	/*


    $garage= new Garage("Mi garage",20);

    echo "Agregando Autos<br>";
    $garage->Add($auto1);
    $garage->Add($auto2);
    $garage->Add($auto3);
    $garage->Add($auto4);
    $garage->Add($auto5);

    
    echo "Mostrar autos:<br>";
    $garage->MostrarGarage();
    echo "<br><br>";

    echo "Borrando el primer auto.<br>";
    $garage->Remove($auto1);
    echo "Garage despues de borrar auto:<br>";
    $garage->MostrarGarage();
    echo "<br><br>";

 	*/



?>