
<?php
	$n = 1;
	$calculo = "".($n - 1);
	$suma = 0;
	while($n + $suma < 1000)
	{
		$calculo = $calculo." + $n ";
		$suma += $n;
		$n++;
	}
	$calculo = $calculo." = $suma";
	echo $calculo;
?>