<?php
class Helado
{
public $id;
public $sabor;
public $precio;
public $tipo;
public $cantidadKg;

function __construct($id, $sabor, $precio, $tipo, $cantidadKg)
{
    $this->id = $id;
    $this->sabor = $sabor;
    $this->precio = $precio;
    $this->tipo = $tipo;
    $this->cantidadKg = $cantidadKg;
}

public function Guardar($ruta)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        $maxId = self::TraerMayorId($helados);
        $this->id = $maxId + 1;
        if(!self::ExisteHeladoEnLista($helados, $this))
        {
            if(file_exists($ruta))
            {
                $archivo = fopen($ruta, "a");
                return fwrite($archivo, $this->DevolverJson().PHP_EOL);
            }
            $archivo = fopen($ruta, "w");
            return fwrite($archivo, $this->DevolverJson().PHP_EOL);
        }
    }
    else
    {
        if(file_exists($ruta))
        {
            $archivo = fopen($ruta, "a");
            return fwrite($archivo, $this->DevolverJson().PHP_EOL);
        }
        $archivo = fopen($ruta, "w");
        return fwrite($archivo, $this->DevolverJson().PHP_EOL);
    }
    return false;
}

public static function GuardarTodo($helados, $ruta)
{
    if(file_exists($ruta))
    {
        foreach ($helados as $key => $icecream)
        {
            if($key == 0)
            {
                $archivo = fopen($ruta, "w");
                fwrite($archivo, json_encode($helados[0]).PHP_EOL);
                fclose($archivo);
            }
            else
            {
                $archivo = fopen($ruta, "a");
                fwrite($archivo, json_encode($helados[$key]).PHP_EOL);
                fclose($archivo);
            }
        }
        return true;
    }
    return false;
}

public static function Cargar($ruta)
{
    if(file_exists($ruta))
    {
        $archivo = fopen($ruta, "r");
        $helados = array();
        while(!feof($archivo))
        {
            $renglon = fgets($archivo);
            if($renglon != "")
            {
                $objeto = json_decode($renglon);
                if (isset($objeto)!=null) {
                    $helado = new Helado($objeto->id, $objeto->sabor, $objeto->precio, $objeto->tipo, $objeto->cantidadKg);
                    array_push($helados, $helado);
                }
            }
        }
        fclose($archivo);
        if(count($helados) > 0)
            return $helados;
    }
    return null;
}

private static function ExisteHeladoEnLista($helados, $helado)
{
    foreach ($helados as $icecream)
    {
        if($icecream->id == $helado->id)
            return true;
    }
    return false;
}

public static function ExisteHeladoPorSaborYTipo($ruta, $sabor, $tipo)
{
    $helados = self::Cargar($ruta);
    
    if($helados != null)
    {
        foreach ($helados as $icecream)
        {
            if($sabor == $icecream->sabor &&
                $tipo == $icecream->tipo){
                    return true;
                }       
        }
    }
    return false;
}

public static function ExisteHeladoPorSabor($ruta, $sabor)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        foreach ($helados as $icecream)
        {
            if(strtolower($sabor) == strtolower($icecream->sabor)){
                return true;
            }
        }
    }
    return false;
}

public static function HeladosATabla($helados, $rutaCarpetaImagenes)
{
    $texto = "<div align='center'>";
    $texto .= "<table border='1px'>";
    $texto .= "<thead bgcolor='#ff8080'>";
    $texto .= "<tr>";
    $texto .= "<th>Sabor</th>";
    $texto .= "<th>Precio</th>";
    $texto .= "<th>Tipo</th>";
    $texto .= "<th>Cantidad</th>";
    $texto .= "<th>Imagen</th>";
    $texto .= "</tr>";
    $texto .= "</thead>";
    $texto .= "<tbody>";
    foreach ($helados as $helado)
    {
        $texto .= "<tr>";
        $texto .= "<td>".$helado->sabor."</td>";
        $texto .= "<td>".$helado->precio."</td>";
        $texto .= "<td>".$helado->tipo."</td>";
        $texto .= "<td>".$helado->cantidadKg."</td>";
        $texto .= "<td><img src='".$rutaCarpetaImagenes.$helado->id."_".$helado->sabor.".png' height='75' width='75' /></td>";
        $texto .= "</tr>";
    }
    $texto .= "</tbody>";
    $texto .= "</table>";
    $texto .= "</div>";
    return $texto;
}

//manejo de imagenes
public function CargarImagen($files, $rutaCarpetaImagenes)
{
    if(isset($files))
    {
        $extension = self::TraerExtensionImagen($files);
        if($extension != null)
        {
            $nombreDelArchivoImagen = $this->id."_".strtolower($this->sabor).$extension;
            $rutaCompletaImagen = $rutaCarpetaImagenes.$nombreDelArchivoImagen;
            return move_uploaded_file($files["tmp_name"], $rutaCompletaImagen);
        }
    }
    return false;
}

//revisar este código

public function MoverImagenABackUp($directorioFotosBackUp, $directorioFotos, $rutaHelados)
{
    $helados = self::TraerHeladoPorId($rutaHelados, $this->id);
    if(!$helados)
    {
        echo "<br/>No existe un helado con id ".$this->id.".";
        die;
    }
    $rutaFotoAnterior = $directorioFotos.$this->id."_".$helados->sabor.".png";
    $extension = ".".array_reverse(explode(".", $helados->sabor))[0];
    
    var_dump($extension);

    if(file_exists($rutaFotoAnterior))
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $rutaFotoBackUp = $directorioFotosBackUp.$this->id."_".date('Ymd').$extension;
        return rename($rutaFotoAnterior, $rutaFotoBackUp);
    }
    else
    {
        echo '<br/>Error: no existe la foto antigua.';
        die;
    }
}


//fin de manejo de imagenes

public function Vender($ruta, $cantidadKg)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        if(self::ExisteHeladoEnLista($helados, $this))
        {
            foreach ($helados as $key => $icecream)
            {
                if($icecream->id == $this->id)
                {
                    $helados[$key]->cantidadKg -= $cantidadKg;
                    break;
                }
            }
            return self::GuardarTodo($helados, $ruta);
        }
    }
    return false;
}

public function BorrarHelado($ruta)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        if(self::ExisteHeladoEnLista($helados, $this))
        {
            foreach ($helados as $key => $icecream)
            {
                if($icecream->id == $this->id)
                {
                    unset($helados[$key]);
                    break;
                }
            }
            return self::GuardarTodo($helados, $ruta);
        }
    }
    return false;
}

public static function ModificarHeladoPorId($ruta, $id, $nuevoHelado)
{
    $helados = self::Cargar($ruta);
    
    if(!$helados || $helados == "NADA")
    {
        echo "<br/>No hay helados cargadas.";
        die;
    }
    if(!self::TraerHeladoPorId($ruta, $id))
    {
        echo "<br/>No existe un helado con id ".$id.".";
        die;
    }
    foreach ($helados as $key => $helado)
    {
        if($helado->id == $nuevoHelado->id)
        {
            $helados[$key] = $nuevoHelado;
            break;
        }
    }
    return self::GuardarHelados($ruta, $helados);
}

//Funciones de  TRAER
public static function TraerHeladoPorsabor($ruta, $sabor)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        $misHelados = array();
        foreach ($helados as $icecream)
        {
            if($icecream->sabor == $sabor)
                array_push($misHelados, $icecream);
        }
        if(count($misHelados) > 0)
            return $misHelados;
    }
    return null;
}

public static function TraerHeladoPorTipo($ruta, $tipo)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        $misHelados = array();
        foreach ($helados as $icecream)
        {
            if($icecream->tipo == $tipo)
                array_push($misHelados, $icecream);
        }
        if(count($misHelados) > 0)
            return $misHelados;
    }
    return null;
}

public static function TraerHeladoPorId($ruta, $id)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        foreach ($helados as $icecream)
        {
            if($icecream->id == $id)
                return $icecream;
        }
    }
    return null;
}

public static function TraerIdStock($ruta, $sabor, $tipo, $cantidadKg)
{
    $helados = self::Cargar($ruta);
    if($helados != null)
    {
        foreach ($helados as $helado)
        {
            if($helado->sabor == $sabor &&
                $helado->tipo == $tipo &&
                $helado->cantidadKg >= $cantidadKg)
                return $helado->id;
        }
    }
    return null;
}

public static function TraerMayorId($helados)
{
    $maxId = $helados[0]->id;
    foreach ($helados as $icecream)
    {
        if($icecream->id > $maxId)
            $maxId = $icecream->id;
    }
    return $maxId;
}

public static function TraerExtensionImagen($files)
{
    switch ($files["type"])
    {
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

public function IsEqual($otroHelado)
{
    return  $this->sabor == $otroHelado->sabor && 
            $this->precio == $otroHelado->precio &&
            $this->tipo == $otroHelado->tipo &&
            $this->cantidad == $otroHelado->cantidadKg;
}

public function DevolverJson()
{
    return json_encode($this, JSON_UNESCAPED_UNICODE);
}

}
?>