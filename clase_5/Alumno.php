<?php

class Alumno 
{
    public $nombre;
    public $legajo;

    function __construct($nombre, $legajo)
    {
        $this->nombre = $nombre;
        $this->legajo = $legajo;
    }

    function Guardar($path) 
    {
        $file = fopen($path, 'a');

        $texto = $this->nombre . ", " . $this->legajo;

        if ($file == true)
        {
            fwrite($file, $texto . ";" . PHP_EOL);

            fclose($file);
        }
    }

    function RetornarJson() 
    {
        return json_encode($this);
    }

    function GuardarJson() 
    {
        $retorno = false;
        $file = fopen('Alumno.json', 'w');
        if ($file == true)
        {
            fwrite($file, $this->RetornarJson());

            $retorno = true;
        }
        fclose($file);

        if ($retorno)
        {
            echo $this->RetornarJson();
        }
    }
}

?>