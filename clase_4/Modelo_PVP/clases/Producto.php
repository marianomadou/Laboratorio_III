<?php
class Producto
{
public $id;
public $bebida;
public $precio;
public $tipo;
public $cantidad;

function __construct($id, $bebida, $precio, $tipo, $cantidad){
	
	$this->id = $id;
	$this->bebida = $bebida;
	$this->precio = $precio;
	$this->tipo = $tipo;
	$this->cantidad = $cantidad;
}

public function Guardar($ruta){
	
	$productos = self::Cargar($ruta);
	if($productos != null){
		
		$maxId = self::BuscarMayorId($productos);
		$this->id = $maxId + 1;
		if(!self::ProductosEstaEnLaLista($productos, $this)){
			
			if(file_exists($ruta)){
				
				$archivo = fopen($ruta, "a");
				return fwrite($archivo, $this->DevolverJson().PHP_EOL);
			}
			$archivo = fopen($ruta, "w");
			return fwrite($archivo, $this->DevolverJson().PHP_EOL);
		}
	}
	else{
		
		if(file_exists($ruta)){
			
			$archivo = fopen($ruta, "a");
			return fwrite($archivo, $this->DevolverJson().PHP_EOL);
		}
		$archivo = fopen($ruta, "w");
		return fwrite($archivo, $this->DevolverJson().PHP_EOL);
	}
	return false;
}

public static function Cargar($ruta){
	
	if(file_exists($ruta)){
		
		$archivo = fopen($ruta, "r");
		$productos = array();
		while(!feof($archivo)){
			
			$renglon = fgets($archivo);
			if($renglon != ""){
				
				$objeto = json_decode($renglon);
				$producto = new Producto($objeto->id, $objeto->bebida, $objeto->precio, $objeto->tipo, $objeto->cantidad);
				array_push($productos, $producto);
			}
		}
		fclose($archivo);
		if(count($productos) > 0){
			
			return $productos;
		}
	}
	return null;
}

public static function GuardarTodo($productos, $ruta){
	
	if(file_exists($ruta)){
		
		foreach ($productos as $key => $producto){
			
			if($key == 0){
				
				$archivo = fopen($ruta, "w");
				fwrite($archivo, json_encode($productos[0]).PHP_EOL);
				fclose($archivo);
			}
			else{
				
				$archivo = fopen($ruta, "a");
				fwrite($archivo, json_encode($productos[$key]).PHP_EOL);
				fclose($archivo);
			}
		}
		return true;
	}
	return false;
}

private static function ProductosEstaEnLaLista($productos, $producto){
	
	foreach ($productos as $produc){
		
		if($produc->id == $producto->id){
			
			return true;
		}
	}
	return false;
}

public static function ExisteProductoPorBebidaYTipo($ruta, $bebida, $tipo){
	
	$productos = self::Cargar($ruta);
	if($productos != null){
		
		foreach ($productos as $produc){
			
			if(strtolower($bebida) == strtolower($produc->bebida) && strtolower($tipo) == strtolower($produc->tipo)){
				
				return true;
			}
		}
	}
	return false;
}

    public static function ProductoToTable($productos, $rutaCarpetaImagenes){
		
        $texto = "<table border='1'>";
        $texto .= "<thead bgcolor='#00CCFF'>";
        $texto .= "<tr>";
        $texto .= "<th>bebida</th>";
        $texto .= "<th>Precio</th>";
        $texto .= "<th>Tipo</th>";
        $texto .= "<th>Cantidad</th>";
        $texto .= "<th bgcolor='#0099FF'>Imagen</th>";
        $texto .= "</tr>";
        $texto .= "</thead>";
        $texto .= "<tbody>";
        foreach ($productos as $producto){
			
            $texto .= "<tr>";
            $texto .= "<td>".$producto->bebida."</td>";
            $texto .= "<td>".$producto->precio."</td>";
            $texto .= "<td>".$producto->tipo."</td>";
            $texto .= "<td>".$producto->cantidad."</td>";
            $texto .= "<td><img src='".$rutaCarpetaImagenes.$producto->id."_".$producto->bebida.".png' height='120' width='120' /></td>";
            $texto .= "</tr>";
        }
        $texto .= "</tbody>";
        $texto .= "</table>";
        return $texto;
    }

    public static function TraerProductoPorId($ruta, $id){
		
        $productos = self::Cargar($ruta);
        if($productos != null){
			
            foreach ($productos as $produc)
            {
                if($produc->id == $id)
                    return $produc;
            }
        }
        return null;
    }

public function IsEqual($otroProducto){
	
	return 	$this->id == $otroProducto->id && 
			$this->bebida == $otroProducto->bebida &&
			$this->precio == $otroProducto->precio &&
			$this->tipo == $otroProducto->tipo &&
			$this->cantidad == $otroProducto->cantidad;
}


public function CargarImagen($archivos, $rutaCarpetaImagenes){
	
	if(isset($archivos)){
		
		$extension = self::TraerExtensionImagen($archivos);
		if($extension != null){
			
			$nombreDelarchivoivoImagen = $this->id."_".strtolower($this->bebida).$extension;
			$rutaCompletaImagen = $rutaCarpetaImagenes.$nombreDelarchivoivoImagen;
			return move_uploaded_file($archivos["tmp_name"], $rutaCompletaImagen);
		}
	}
	return false;
}
    
public static function TraerProductosPorBebida($ruta, $bebida){
	
	$productos = self::Cargar($ruta);
	if($productos != null){
		
		$misproductos = array();
		foreach ($productos as $produc){
			
			if($produc->bebida == $bebida){
				
				array_push($misproductos, $produc);
			}
		}
		if(count($misproductos) > 0){
			
			return $misproductos;
		}
	}
	return null;
}
/*
    public function MoverImagenABackUp($rutaCarpetaImagenesBackUp, $rutaCarpetaImagenes, $rutaXXXXXs)
    {
        $XXXXX = self::TraerXXXXXPorATR1($rutaXXXXXs, $this->ATR1);
        if($XXXXX != null)
        {
            $rutaCompletaImagenAntigua = $rutaCarpetaImagenes.$XXXXX->IMG1;
            if(file_exists($rutaCompletaImagenAntigua))
            {
                $extension = ".".array_reverse(explode(".", $XXXXX->IMG1))[0];
                date_default_timezone_set("America/Argentina/Buenos_Aires");
                $rutaCompletaImagenBackUp = $directorioFotosBackUp.$this->ATR1."_".date('Ymd').$extension;
                return rename($rutaCompletaImagenAntigua, $rutaCompletaImagenBackUp);
            }
        }
        return false;
    }
*/
public static function TraerExtensionImagen($archivos){
	
	switch ($archivos["type"]){
		
		case 'image/jpeg':
			$extension = ".jpg";
			break;
		case 'image/png':
			$extension = ".png";
			break;
		default:
			return null;
			break;
	}
	return $extension;
}

public function Vender($ruta, $cantidad){
	
	$productos = self::Cargar($ruta);
	if($productos != null){
		
		if(self::ProductosEstaEnLaLista($productos, $this)){
			
			foreach ($productos as $key => $produc){
				
				if($produc->id == $this->id){
					
					$productos[$key]->cantidad -= $cantidad;
					break;
				}
			}
			return self::GuardarTodo($productos, $ruta);
		}
	}
	return false;
}

public function BorrarProducto($ruta){
	
	$productos = self::Cargar($ruta);
	if($productos != null){
		
		if(self::ProductosEstaEnLaLista($productos, $this)){
			
			foreach ($productos as $key => $produc){
				
				if($produc->id == $this->id){
					
					unset($productos[$key]);
					break;
				}
			}
			return self::GuardarTodo($productos, $ruta);
		}
	}
	return false;
}

public static function BuscarMayorId($productos){
	
	$maxId = $productos[0]->id;
	foreach ($productos as $produc){
		
		if($produc->id > $maxId){
			
			$maxId = $produc->id;
		}
	}
	return $maxId;
}

public static function RetornarIdStock($ruta, $bebida, $tipo, $cantidad){
	
	$productos = self::Cargar($ruta);
	if($productos != null){
		
		foreach ($productos as $produc){
			
			if($produc->bebida == $bebida && $produc->tipo == $tipo && $produc->cantidad >= $cantidad){
				
				return $produc->id;
			}
		}
	}
	return null;
}

public function DevolverJson(){
	
	return json_encode($this, JSON_UNESCAPED_UNICODE);
}

}
?>