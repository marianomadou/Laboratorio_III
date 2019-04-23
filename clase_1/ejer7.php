

<?php
// Se asume que hoy es March 10th, 2001, 5:16:18 pm, y que estamos en la
// zona horaria Mountain Standard Time (MST)
date_default_timezone_set('America/Argentina/Buenos_Aires');

echo $hoy = date("F j, Y, g:i a") . "<br>";                 // March 10, 2001, 5:16 pm
echo $hoy = date("m.d.y") . "<br>";                         // 03.10.01
echo $hoy = date("j, n, Y") . "<br>";                       // 10, 3, 2001
echo $hoy = date("Ymd") . "<br>";                           // 20010310
echo $hoy = date('h-i-s, j-m-y, it is w Day') . "<br>";     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
echo $hoy = date('\i\t \i\s \t\h\e jS \d\a\y.') . "<br>";   // it is the 10th day.
echo $hoy = date("D M j G:i:s T Y") . "<br>";               // Sat Mar 10 17:16:18 MST 2001
echo $hoy = date('H:m:s \m \i\s\ \m\o\n\t\h') . "<br>";     // 17:03:18 m is month
echo $hoy = date("H:i:s") . "<br>";                         // 17:16:18
echo $hoy = date("Y-m-d H:i:s") . "<br>";                   // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)




?>


