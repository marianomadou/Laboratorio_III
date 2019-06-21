<?php
class Pizza
{
    public $id;
    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;

function __construct($id, $sabor, $precio, $tipo, $cantidad)
{
    $this->id = $id;
    $this->sabor = $sabor;
    $this->precio = $precio;
    $this->tipo = $tipo;
    $this->cantidad = $cantidad;
}

public function Guardar($ruta)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        $maxId = self::TraerMayorId($pizzas);
        $this->id = $maxId + 1;
        if(!self::ExistePizzaEnPizzas($pizzas, $this))
        {
            if(file_exists($ruta))
            {
                $arch = fopen($ruta, "a");
                return fwrite($arch, $this->RetornarJson().PHP_EOL);
            }
            $arch = fopen($ruta, "w");
            return fwrite($arch, $this->RetornarJson().PHP_EOL);
        }
    }
    else
    {
        if(file_exists($ruta))
        {
            $arch = fopen($ruta, "a");
            return fwrite($arch, $this->RetornarJson().PHP_EOL);
        }
        $arch = fopen($ruta, "w");
        return fwrite($arch, $this->RetornarJson().PHP_EOL);
    }
    return false;
}

public static function Cargar($ruta)
{
    if(file_exists($ruta))
    {
        $arch = fopen($ruta, "r");
        $pizzas = array();
        while(!feof($arch))
        {
            $linea = fgets($arch);
            if($linea != "")
            {
                $stdObj = json_decode($linea);
                if(isset($stdObj)){
                $pizza = new Pizza($stdObj->id, $stdObj->sabor, $stdObj->precio, $stdObj->tipo, $stdObj->cantidad);
                array_push($pizzas, $pizza);
                }
            }
        }
        fclose($arch);
        if(count($pizzas) > 0)
            return $pizzas;
    }
    return null;
}

public static function GuardarTodo($pizzas, $ruta)
{
    if(file_exists($ruta))
    {
        foreach ($pizzas as $key => $pi)
        {
            if($key == 0)
            {
                $arch = fopen($ruta, "w");
                fwrite($arch, json_encode($pizzas[0]).PHP_EOL);
                fclose($arch);
            }
            else
            {
                $arch = fopen($ruta, "a");
                fwrite($arch, json_encode($pizzas[$key]).PHP_EOL);
                fclose($arch);
            }
        }
        return true;
    }
    return false;
}

private static function ExistePizzaEnPizzas($pizzas, $pizza)
{
    foreach ($pizzas as $pi)
    {
        if($pi->id == $pizza->id)
            return true;
    }
    return false;
}

public static function ExistePizzaPorSaborYTipo($ruta, $sabor, $tipo)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        foreach ($pizzas as $pi)
        {
            if(strtolower($sabor) == strtolower($pi->sabor) &&
                strtolower($tipo) == strtolower($pi->tipo))
                return true;
        }
    }
    return false;
}

public static function ExistePizzaPorSabor($ruta, $sabor)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        foreach ($pizzas as $pi)
        {
            if(strtolower($sabor) == strtolower($pi->sabor))
                return true;
        }
    }
    return false;
}

public static function PizzasATabla( $rutaCarpetaImagenes)
{
    $archivos  = scandir($rutaCarpetaImagenes);

    $backUpInfo = array();

    foreach ($archivos as $key => $archivo){

        if($key >= 2){
            
            array_push($backUpInfo, $archivo);
        }

    }

    var_dump($backUpInfo);


    $texto = "<table class='table table-hover'";
    $texto .= "<thead class='thead-dark'>";
    $texto .= "<tr>";
    $texto .= "<th scope='col'>Imagen</th>";
    $texto .= "</tr>";
    $texto .= "</thead>";
    $texto .= "<tbody>";
    foreach ($archivos as $archivo)
    {
        if(!file_exists($archivo)){
        $texto .= "<tr>";
        $texto .= "<td><img src='".$rutaCarpetaImagenes.$archivo."' height='120' width='120' /></td>";
        $texto .= "</tr>";
        }
    }
    $texto .= "</tbody>";
    $texto .= "</table>";
    return "<div align=\"center\"> " . $texto . "</div>";
}

public static function PizzasATablaBackup($rutaCarpetaImagenes)
{
    $archivos  = scandir($rutaCarpetaImagenes);
    $texto = "<table class='table table-hover'";
    $texto .= "<thead class='thead-dark'>";
    $texto .= "<tr>";
    $texto .= "<th scope='col'>Imagen</th>";
    $texto .= "</tr>";
    $texto .= "</thead>";
    $texto .= "<tbody>";
    foreach ($archivos as $archivo)
    {
        if(!file_exists($archivo)){
        $texto .= "<tr>";
        $texto .= "<td><img src='".$rutaCarpetaImagenes.$archivo."' height='120' width='120' /></td>";
        $texto .= "</tr>";
        }
    }
    $texto .= "</tbody>";
    $texto .= "</table>";
    return "<div align=\"center\"> " . $texto . "</div>";
}


public static function TraerPizzaPorId($ruta, $id)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        foreach ($pizzas as $pi)
        {
            if($pi->id == $id)
                return $pi;
        }
    }
    return null;
}

public static function TraerPizzasPorTipoySabor2($ruta, $sabor, $tipo)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        foreach ($pizzas as $pi)
        {
            if($pi->sabor == $sabor&&$pi->tipo == $tipo)
                return $pi;
        }
    }
    return null;
}


public function IsEqual($otraPizza)
{
    return  $this->id == $otraPizza->id && 
            $this->sabor == $otraPizza->sabor &&
            $this->precio == $otraPizza->precio &&
            $this->cantidad == $otraPizza->cantidad;
}

public static function EsCantidadMayorQue($unaPizza, $otraPizza)
{
    return  $unaPizza->cantidad < $otraPizza->cantidad;
}

public static function EsCantidadMenorQue($unaPizza, $otraPizza)
{
    return  $unaPizza->cantidad > $otraPizza->cantidad;
}

public function CargarImagen($files, $rutaCarpetaImagenes)
{
    if(isset($files))
    {
        $extension = self::TraerExtensionImagen($files);
        $marca= $rutaCarpetaImagenes."recursos-graficos/marcadeagua.png";

        if($extension != null)
        {   
            $nombreDelArchivoImagen = $this->id."_".strtolower($this->sabor).$extension;
            $rutaCompletaImagen = $rutaCarpetaImagenes.$nombreDelArchivoImagen;
            $resulta= move_uploaded_file($files["tmp_name"], $rutaCompletaImagen);
            $archivo=self::agregarMarcaAgua($rutaCompletaImagen, $marca);
            return $resulta;
        }
    }
    return false;
}

public function agregarMarcaAgua($archivo, $marca)
{
    $im = imagecreatefrompng($archivo);
    $estampa = imagecreatefrompng($marca);

    $margen_dcho = 30;
    $margen_inf = 30;
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);
    imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));
    imagepng($im, $archivo);
}


public static function TraerPizzasPorSabor($ruta, $sabor)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        $misPizzas = array();
        foreach ($pizzas as $pi)
        {
            if($pi->sabor == $sabor)
                array_push($misPizzas, $pi);
        }
        if(count($misPizzas) > 0)
            return $misPizzas;
    }
    return null;
}

public static function TraerPizzasPorTipo($ruta, $tipo)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        $misPizzas = array();
        foreach ($pizzas as $pi)
        {
            if($pi->tipo == $tipo)
                array_push($misPizzas, $pi);
        }
        if(count($misPizzas) > 0)
            return $misPizzas;
    }
    return null;
}

public static function TraerPizzasPorTipoySabor($ruta, $sabor, $tipo)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        $misPizzas = array();
        foreach ($pizzas as $pi)
        {
            if($pi->tipo == $tipo&&$pi->sabor==$sabor)
                array_push($misPizzas, $pi);
        }
        if(count($misPizzas) > 0)
            return $misPizzas;
    }
    return null;
}

public function MoverImagenABackUp($directorioFotosBackUp, $directorioFotos, $rutaPizzas)
{
    $pizza = self::TraerPizzaPorId($rutaPizzas, $this->id);
    if(!$pizza)
    {
        echo "<br/>No existe una pizza con ese id ".$this->id.".";
        die;
    }
    $extension = ".png";		
    $fotoAntigua= $pizza->id . "_" . $pizza->sabor . $extension;
    $rutaFotoAntigua = $directorioFotos . $fotoAntigua;
    
    if(file_exists($rutaFotoAntigua))
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $rutaFotoBackUp = $directorioFotosBackUp .date('Ymd') . "_" .$fotoAntigua;
        return rename ($rutaFotoAntigua, $rutaFotoBackUp);
    }
    else
    {
        echo '<br/>Error: no existe la foto anterior.';
        die;
    }
}

public function MoverImagenABackUp2($directorioFotosBackUp, $directorioFotos, $rutaPizzas)
{
    $pizza = self::TraerPizzasPorTipoySabor2($rutaPizzas, $this->sabor, $this->tipo);
    if(!$pizza)
    {
        //echo "<br/>No existe una pizza con ese sabor ".$this->sabor.".";
        die;
    }
    $extension = ".png";		
    $fotoAntigua= $pizza->id . "_" . $pizza->sabor . $extension;
    $rutaFotoAntigua = $directorioFotos . $fotoAntigua;
    
    if(file_exists($rutaFotoAntigua))
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $rutaFotoBackUp = $directorioFotosBackUp .date('Ymd') . "_" .$fotoAntigua;
        return rename ($rutaFotoAntigua, $rutaFotoBackUp);
    }
    else
    {
        echo '<br/>Error: no existe la foto anterior.';
        die;
    }
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

public function Vender($ruta, $cantidad)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        if(self::ExistePizzaEnPizzas($pizzas, $this))
        {
            foreach ($pizzas as $key => $pi)
            {
                if($pi->id == $this->id)
                {
                    $pizzas[$key]->cantidad -= $cantidad;
                    break;
                }
            }
            return self::GuardarTodo($pizzas, $ruta);
        }
    }
    return false;
}

public function BorrarPizza($ruta)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        if(self::ExistePizzaEnPizzas($pizzas, $this))
        {
            foreach ($pizzas as $key => $pi)
            {
                if($pi->id == $this->id)
                {
                    unset($pizzas[$key]);
                    break;
                }
            }
            return self::GuardarTodo($pizzas, $ruta);
        }
    }
    return false;
}

public function BorrarPizza2($ruta, $pizza)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        if(self::ExistePizzaEnPizzas($pizzas, $pizza))
        {
            foreach ($pizzas as $key => $pi)
            {
                if($pi->sabor == $pizza->sabor&&$pi->tipo == $pizza->tipo)
                {
                    unset($pizzas[$key]);
                    break;
                }
            }
            return self::GuardarTodo($pizzas, $ruta);
        }
    }
    return false;
}


public static function TraerMayorId($pizzas)
{
    $maxId = $pizzas[0]->id;
    foreach ($pizzas as $pi)
    {
        if($pi->id > $maxId)
            $maxId = $pi->id;
    }
    return $maxId;
}

public static function ModificarPizzaPorId($ruta, $id, $nuevaPizza)
{
    $pizzas = self::Cargar($ruta);
    
    if(!$pizzas || $pizzas == "NADA")
    {
        echo "<br/>No hay pizzas cargadas.";
        die;
    }
    if(!self::TraerPizzaPorId($ruta, $id))
    {
        echo "<br/>No exite una pizza con id ".$id.".";
        die;
    }
    foreach ($pizzas as $key => $pizza)
    {
        if($pizza->id == $nuevaPizza->id)
        {
            $pizzas[$key] = $nuevaPizza;
            break;
        }
    }
    return self::GuardarTodo($pizzas, $ruta);
}

public static function ModificarPizzaPorSaborYTipo($ruta, $sabor, $tipo, $nuevaPizza)
{
    $pizzas = self::Cargar($ruta);
    
    if(!$pizzas || $pizzas == "NADA")
    {
        echo "<br/>No hay pizzas cargadas.";
        die;
    }
    if(!self::TraerPizzasPorTipoySabor2($ruta, $sabor, $tipo))
    {
        echo "<br/>No exite una pizza con id ".$sabor. " y ese ".$tipo.".";
        die;
    }
    foreach ($pizzas as $pizza)
    {
        if($pizza->sabor == $nuevaPizza->sabor&&$pizza->tipo == $nuevaPizza->tipo)
        {
            $pizza->precio = $nuevaPizza->precio;
            $pizza->cantidad+=$nuevaPizza->cantidad;
            break;
        }
    }
    return self::GuardarTodo($pizzas, $ruta);
}


public static function RetornarIdStock($ruta, $sabor, $tipo, $cantidad)
{
    $pizzas = self::Cargar($ruta);
    if($pizzas != null)
    {
        foreach ($pizzas as $pizza)
        {
            if($pizza->sabor == $sabor &&
                $pizza->tipo == $tipo &&
                $pizza->cantidad >= $cantidad)
                return $pizza->id;
        }
    }
    return null;
}

public function RetornarJson()
{
    return json_encode($this, JSON_UNESCAPED_UNICODE);
}
}
?>