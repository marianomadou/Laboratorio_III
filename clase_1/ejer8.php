

<?php
$num=rand(20,60);
$num=23;
echo $num."<br>";

	switch ($num)
		{
			case '20':
				echo "veinte";
				break;
			case '30':
				echo "treinta";
				break;
			case '40':
				echo "cuarenta";
				break;
			case '50':
				echo "cincuenta";
				break;
			case '60':
				echo "sesenta";
				break;
		}
		
	if($num>20 && $num<30)
		{
			echo "veinti";
			$num-=20;
		}
	elseif ($num>30 && $num<40)
		{
			echo "treinta y ";
			$num-=30;
		}
	elseif ($num>40 && $num<50)
		{
			echo "cuarenta y ";
			$num-=40;
		}
	elseif ($num>50 && $num<60)
		{
			echo "cincuenta y ";
			$num-=50;
		}
switch ($num)
	{
		case '1':
			echo "uno";
			break;
		case '2':
			echo "dos";
			break;
		case '3':
			echo "tres";
			break;
		case '4':
			echo "cuatro";
			break;
		case '5':
			echo "cinco";
			break;
		case '6':
			echo "seis";
			break;
		case '7':
			echo "siete";
			break;
		case '8':
			echo "ocho";
			break;
		case '9':
			echo "nueve";
			break;
	}
?>


