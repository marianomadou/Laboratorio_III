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
                if(!$extension = Proveedor::TraerExtensionFoto($foto))
                {
                    echo '<br/>Error: el formato de "foto" debe ser "jpg" o "png".';
                    die;
                }
                $proveedor = new Proveedor($id, $nombre, $email, $id."_".strtolower($nombre).$extension);
                if(!$proveedor->CargarFotoBackUp($DIR_PROVEEDORES_FOTOS_BACKUP, $DIR_PROVEEDORES_FOTOS, $RUTA_PROVEEDORES))
                    echo "<br/>No se pudo hacer el backUp de la foto.";
                if(Proveedor::ModificarProveedorPorId($RUTA_PROVEEDORES, $id, $proveedor))
                {
                    if(!$proveedor->CargarFoto($foto))
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