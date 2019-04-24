

<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

echo $hoy = date("F j, Y, g:i a") . "<br>";
echo $hoy = date("m.d.y") . "<br>";
echo $hoy = date("j, n, Y") . "<br>";
echo $hoy = date("Ymd") . "<br>";
echo $hoy = date('h-i-s, j-m-y, it is w Day') . "<br>";
echo $hoy = date('\i\t \i\s \t\h\e jS \d\a\y.') . "<br>";
echo $hoy = date("D M j G:i:s T Y") . "<br>";               
echo $hoy = date('H:m:s \m \i\s\ \m\o\n\t\h') . "<br>";
echo $hoy = date("H:i:s") . "<br>";
echo $hoy = date("Y-m-d H:i:s") . "<br>";                  

$estacion="";

if(date("m") >=1 && date("m") <=3 ) 
{
	$estacion="verano";
}
else if(date("m") >=4 && date("m") <=6 ) 
{
	
	$estacion="otoño";
}
else if(date("m") >=7 && date("m") <=8 ) 
{
	$estacion="invierno";
}
else if(date("m") >=9 && date("m") <=12 ) 
{
	$estacion="primavera";
}

echo "<br>La estación actual es: " . $estacion;

?>


