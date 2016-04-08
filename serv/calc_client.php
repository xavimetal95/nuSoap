<?php
 
require_once ('../lib/nusoap.php');

$wsdl="http://localhost/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
echo '<form method="post">';
echo 'Num 1: <input type="text" name="num1" id="num1"><br>';
echo 'Num 2: <input type="text" name="num2" id="num2"><br><br>';
echo 'Operaciones: <input type="submit" value="suma" name="suma"><input type="submit" value="resta" name="resta"><input type="submit" value="multiplicar" name="multi"><input type="submit" value="dividir" name="divi">';
echo '</form>';
$err = $client->getError();
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$params=array('a'=>$num1, 'b'=>$num2);
$result= 0;

if(isset($_POST["suma"]))
{
	$result= $client->call('add', $a, $b);
	echo '<h2>Resultat: '.$result.'</h2><pre>';
}

if(isset($_POST["resta"]))
{
	$result= $client->call('resta', $params);
	echo '<h2>Resultat: '.$result.'</h2><pre>';
}

if(isset($_POST["multi"]))
{
	$result= $client->call('multi', $params);
	echo '<h2>Resultat: '.$result.'</h2><pre>';
}

if(isset($_POST["divi"]))
{
	$result= $client->call('divi', $params);
	echo '<h2>Resultat: '.$result.'</h2><pre>';
}

if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
}

?>