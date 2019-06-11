<?php
if(isset($_GET['mostrar']))
{
    $mostrar = $_GET['mostrar'];


        switch ($mostrar)
        {
            case 'cargadas': 
                echo "<div align='center'><h1>Lista de Pizzas cargadas</h1></div>"  ;
                echo Pizza::PizzasATabla($RUTA_CARPETA_IMAGENES);
                break;
            case 'borradas': 
                echo "<div align='center'><h1>Lista de Pizzas borradas</h1></div>"  ;
                echo Pizza::PizzasATablaBackup($RUTA_CARPETA_IMAGENES_BACKUP);
                break;
            default:
                break;
        }
    }
        ?>