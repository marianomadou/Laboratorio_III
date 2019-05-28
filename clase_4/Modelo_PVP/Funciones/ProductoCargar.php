<?php
if(isset($_POST['bebida']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['cantidad']) && isset($_FILES['imagen'])){
	$bebida = $_POST['bebida'];
	$precio = $_POST['precio'];
	$tipo = $_POST['tipo'];
	$cantidad = $_POST['cantidad'];
	$imagen = $_FILES['imagen'];
	if($tipo == "gaseosa" || $tipo == "alcoholica"){
	
	if($bebida == "cocacola" || $bebida == "fanta" || $bebida == "cerveza"){
		
		$producto = new Producto(1, $bebida, $precio, $tipo, $cantidad);
		if($producto->Guardar($RUTA_PRODUCTOS)){
			
			if($producto->CargarImagen($imagen, $RUTA_CARPETA_IMAGENES)){
				
				echo "Exito.";
			}else{
				
				$pizza->BorrarProducto($RUTA_PRODUCTOS);
				echo "Fallo al intentar borrar.";
			}
		}
		else{
			
			echo "Fallo.";
		}
	}
	else
		echo 'Error! cargue "bebida" como "cocacola", "fanta" o "cerveza".';
	}
	else
	echo 'Error! cargue "tipo" como "gaseosa" o "alcoholica".';
	}
else
    echo 'Error cargue  "bebida", "precio", "tipo", "cantidad" y "imagen".';
?>