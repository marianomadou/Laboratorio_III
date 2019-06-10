<?php
//Funciona con "x-www-form-urlencoded"

parse_str(file_get_contents("php://input"), $params);

if(isset($params["id"]))
{
    $id = $params['id'];

    $pizza = Pizza::TraerPizzaPorId($RUTA_HELADOS, $id);
    if($pizza != null)
        if($pizza->BorrarPizza($RUTA_PIZZAS))
        {
            if($XXXXX->MoverImagenABackUp($RUTA_CARPETA_IMAGENES_BACKUP, $RUTA_CARPETA_IMAGENES, $RUTA_XXXXXs))
            {
                if($XXXXX->CargarImagen($IMG1, $RUTA_CARPETA_IMAGENES))
                    echo "Exito.";
                echo "La imagen no se pudo subir.";
            }
            else
                echo "No se pudo hacer el backUp de la imagen.";
        }
        else
            echo "Fallo";
    else
        echo "No existe ".$id;
}
else
{
    echo 'Error cargue "id".';
}
?>

<?php
require_once "Clases/proveedor.php";
$RUTA_PROVEEDORES="Archivos/proveedores.txt";
$DIR_PROVEEDORES_FOTOS_BACKUP="backUpFotos/";
$DIR_PROVEEDORES_FOTOS="Fotos/";
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_FILES['foto']))
            {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $email = strtolower($_POST['email']);
                $foto = $_FILES['foto'];
                if(!$extension = Pizza::TraerExtensionFoto($foto))
                {
                    echo '<br/>Error: el formato de "foto" debe ser "jpg" o "png".';
                    die;
                }
                $proveedor = new Proveedor($id, $nombre, $email, $id."_".strtolower($nombre).$extension);
                if(!$proveedor->CargarFotoBackUp($DIR_PROVEEDORES_FOTOS_BACKUP, $DIR_PROVEEDORES_FOTOS, $RUTA_PROVEEDORES))
                    echo "<br/>No se pudo hacer el backUp de la foto.";
                if(Proveedor::ModificarPizzaPorId($RUTA_PIZZAS, $id, $pizza))
                {
                    if(!$pizza->CargarFoto($foto))
                        echo "<br/>La foto no se pudo subir.";
                    echo "<br/>Exito.";
                }
                else
                    echo "<br/>Fallo.";
            }
else
{
     echo '<br/>Error cargue "id", "nombre", "email" y "foto".';
}
?>