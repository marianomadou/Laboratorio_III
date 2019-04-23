
<?php

$a=6;
$b=8;
$c=8;


	if($a==$b || $a==$c || $b==$c)
	{
		echo "no hay valor medio!";
	}else
	{
		if(($a>$b) && ($b>$c))
		{
			echo "El resultado medio es: " . $b;
		}elseif (($a>$c) && ($c>$b)) {
			echo "El resultado medio es: " . $c;
		}elseif (($b>$a) && ($a>$c)) {
			echo "El resultado medio es: " . $a;
		}elseif (($b>$c) && ($c>$a)) {
			echo "El resultado medio es: " . $c;
		}elseif (($c>$a) && ($a>$b)) {
			echo "El resultado medio es: " . $a;
		}else{
			echo "El resultado medio es: " . $b;
		}	
	}

	

?>