<?php
require_once 'clases/Pizza.php';
class Venta
{
    public $id;
    public $email;
    public $sabor;
    public $tipo;
    public $cantidad;

function __construct($id, $email, $sabor, $tipo, $cantidad)
{
    $this->id = $id;
    $this->email = $email;
    $this->sabor = $sabor;
    $this->tipo = $tipo;
    $this->cantidad = $cantidad;
}

public function Guardar($ruta)
{
    $ventas = self::Cargar($ruta);
    if($ventas != null)
    {
        $maxId = self::TraerMayorId($ventas);
        $this->id = $maxId + 1;
        if(!self::ExisteVentaEnVentas($ventas, $this))
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
        $ventas = array();
        while(!feof($arch))
        {
            $linea = fgets($arch);
            if($linea != "")
            {
                $stdObj = json_decode($linea);
                if(isset($stdObj)){
                $venta = new Venta($stdObj->id, $stdObj->email, $stdObj->sabor, $stdObj->tipo, $stdObj->cantidad);
                array_push($ventas, $venta);
                }
            }
        }
        fclose($arch);
        if(count($ventas) > 0)
            return $ventas;
    }
    return null;
}

public static function GuardarTodo($ventas, $ruta)
{
    if(file_exists($ruta))
    {
        foreach ($ventas as $key => $pi)
        {
            if($key == 0)
            {
                $arch = fopen($ruta, "w");
                fwrite($arch, json_encode($ventas[0]).PHP_EOL);
                fclose($arch);
            }
            else
            {
                $arch = fopen($ruta, "a");
                fwrite($arch, json_encode($ventas[$key]).PHP_EOL);
                fclose($arch);
            }
        }
        return true;
    }
    return false;
}

private static function ExisteVentaEnVentas($ventas, $venta)
{
    foreach ($ventas as $ve)
    {
        if($ve->id == $venta->id)
            return true;
    }
    return false;
}

public function CargarImagen($files, $rutaCarpetaImagenes)
{
    if(isset($files))
    {
        $extension = self::TraerExtensionImagen($files);
        if($extension != null)
        {
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $nombreDelArchivoImagen = strtolower($this->sabor)."_".date('Ymd').$extension;
            $rutaCompletaImagen = $rutaCarpetaImagenes.$nombreDelArchivoImagen;
            return move_uploaded_file($files["tmp_name"], $rutaCompletaImagen);
        }
    }
    return false;
}

public function CargarImagenVenta($files, $rutaCarpetaImagenes)
{
    if(isset($files))
    {
        $extension = self::TraerExtensionImagen($files);
        if($extension != null)
        {
            $newEmail=$this->email;
            $arr= explode('@', $newEmail);
            $newEmail=$this->email;
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $nombreDelArchivoImagen = strtolower($this->tipo)."_".strtolower($this->sabor)."_".$arr[0]."_".date('Ymd').$extension;
            $rutaCompletaImagen = $rutaCarpetaImagenes.$nombreDelArchivoImagen;
            return move_uploaded_file($files["tmp_name"], $rutaCompletaImagen);
        }
    }
    return false;
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

public function BorrarVenta($ruta)
{
    $ventas = self::Cargar($ruta);
    if($ventas != null)
    {
        if(self::ExisteVentaEnVentas($ventas, $this))
        {
            foreach ($ventas as $key => $ve)
            {
                if($ve->id == $this->id)
                {
                    unset($ventas[$key]);
                    break;
                }
            }
            return self::GuardarTodo($ventas, $ruta);
        }
    }
    return false;
}

public static function TraerMayorId($ventas)
{
    $maxId = $ventas[0]->id;
    foreach ($ventas as $ve)
    {
        if($ve->id > $maxId)
            $maxId = $ve->id;
    }
    return $maxId;
}

public function RetornarJson()
{
    return json_encode($this, JSON_UNESCAPED_UNICODE);
}

public static function VentasATabla($ventas)
{
    $contVentas=0;
    $texto = "<h1>Total de ventas</h1>";
    $texto .= "<table class='table table-striped'";
    $texto .= "<thead class='thead-dark'>";
    $texto .= "<tr>";
    $texto .= "<th scope='col'>id</th>";
    $texto .= "<th scope='col'>Email</th>";
    $texto .= "<th scope='col'>Sabor</th>";
    $texto .= "<th scope='col'>Tipo</th>";
    $texto .= "<th scope='col'>Cantidad</th>";
    $texto .= "</tr>";
    $texto .= "</thead>";
    $texto .= "<tbody>";
    foreach ($ventas as $venta)
    {
        $texto .= "<tr>";
        $texto .= "<td>".$venta->id."</td>";
        $texto .= "<td>".$venta->email."</td>";
        $texto .= "<td>".$venta->sabor."</td>";
        $texto .= "<td>".$venta->tipo."</td>";
        $texto .= "<td>".$venta->cantidad."</td>";
        $contVentas+=$venta->cantidad;
        $texto .= "</tr>";
    }
    $texto .= "</tbody>";
    $texto .= "</table>";
    $texto .="<h3> Cantidad total de unidades vendidas: ". $contVentas ." pizzas</h3>";
    return "<div align=\"center\"> " . $texto . "</div>";
}

public static function VentasATablaTop($ventas, $rutaCarpetaImagenes)
{
    $estrella="<img src='" .$rutaCarpetaImagenes. "estrella.png" ."' class='rounded float-right' height='20' width='20' />";
    $contVentas=0;
    $texto = "<h1>TOP 3 de mejores clientes</h1>";
    $texto .= "<table class='table table-striped'";
    $texto .= "<thead class='thead-dark'>";
    $texto .= "<tr>";
    $texto .= "<th scope='col'>id</th>";
    $texto .= "<th scope='col'>Email</th>";
    $texto .= "<th scope='col'>Sabor</th>";
    $texto .= "<th scope='col'>Tipo</th>";
    $texto .= "<th scope='col'>Cantidad</th>";
    $texto .= "</tr>";
    $texto .= "</thead>";
    $texto .= "<tbody>";
        $texto .= "<tr>";
        $texto .= "<td>".$ventas[0]->id."</td>";
        $texto .= "<td>".$ventas[0]->email."</td>";
        $texto .= "<td>".$ventas[0]->sabor."</td>";
        $texto .= "<td>".$ventas[0]->tipo."</td>";
        $texto .= "<td>".$ventas[0]->cantidad. $estrella . $estrella . $estrella ."</td>";
        $texto .= "</tr>";
        $texto .= "<tr>";
        $texto .= "<td>".$ventas[1]->id."</td>";
        $texto .= "<td>".$ventas[1]->email."</td>";
        $texto .= "<td>".$ventas[1]->sabor."</td>";
        $texto .= "<td>".$ventas[1]->tipo."</td>";
        $texto .= "<td>".$ventas[1]->cantidad. $estrella . $estrella ."</td>";
        $texto .= "</tr>";
        $texto .= "<tr>";
        $texto .= "<td>".$ventas[2]->id."</td>";
        $texto .= "<td>".$ventas[2]->email."</td>";
        $texto .= "<td>".$ventas[2]->sabor."</td>";
        $texto .= "<td>".$ventas[2]->tipo."</td>";
        $texto .= "<td>".$ventas[2]->cantidad. $estrella . "</td>";
        $texto .= "</tr>";
    $texto .= "</tbody>";
    $texto .= "</table>";
    $texto .=   "<div class='alert alert-primary' role='alert'>
                El mejor comprador de la pizzeria es: <a class='alert-link'>" . $ventas[0]->email . "</a> . Con un total de " . $ventas[0]->cantidad . " pizzas.</div>";
    return "<div align=\"center\"> " . $texto . "</div>";
}

public static function EsCantidadMayorQue($unaVenta, $otraVenta)
{
    return  $unaVenta->cantidad < $otraVenta->cantidad;
}

public static function EsCantidadMenorQue($unaVenta, $otraVenta)
{
    return  $unaVenta->cantidad > $otraVenta->cantidad;
}

}
?>