

<?php


$num="23";
$primero;
$segundo;

if ($num[0]==2)
{
	$primero="veint";
}elseif ($num[0]==3) {
	$primero="treinta";
}elseif ($num[0]==4) {
	$primero="cuarenta";
}elseif ($num[0]==5) {
	$primero="cincuenta";
}elseif ($num[0]==6) {
	$primero="sesenta";
}



if ($num[1]==0)
{
	if ($num[0]==2){
		$segundo="e";	
	}

	$segundo="e";
}
elseif ($num[1]==1) {
	if ($num[0]==2){
		$segundo="iuno";	
	}
	$segundo=" y uno ";
}elseif ($num[1]==2) {
	if ($num[0]===2){
		$segundo="idos";	
	}
	$segundo=" y dos ";
}elseif ($num[1]==3) {
	if ($num[0]==2){
		$segundo="itres";	
	}
	$segundo=" y tres ";
}elseif ($num[1]==4) {
	if ($num[0]==2){
		$segundo="icuatro";	
	}
	$segundo=" y cuatro ";
}elseif ($num[1]==5) {
	if ($num[0]==2){
		$segundo="icinco";	
	}
	$segundo=" y cinco ";
}elseif ($num[1]==6) {
	if ($num[0]==2){
		$segundo="iseis";	
	}
	$segundo=" y seis ";
}elseif ($num[1]==7) {
	if ($num[0]==2){
		$segundo="isiete";	
	}
	$segundo=" y siete ";
}elseif ($num[1]==8) {
	if ($num[0]==2){
		$segundo="iocho";	
	}
	$segundo=" y ocho ";
}elseif ($num[1]==9) {
	if ($num[0]==2){
		$segundo="inueve";	
	}
	$segundo=" y nueve";
}



echo $primero . $segundo;

?>


