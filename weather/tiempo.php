<?php
	
	require_once ('../lib/nusoap.php');

	$wsdl="http://www.webservicex.net/globalweather.asmx?wsdl";
	$client = new nusoap_client($wsdl,'wsdl');

	echo '<form method="post">';
	echo 'Ciudad: <input type="text" name="ciudad" id="ciudad"><br><br>';
	echo 'Pais: <input type="text" name="pais" id="pais"><br><br>';
	echo '<input type="submit" value="GO!">';
	echo '</form>';

	$err = $client->getError();
	$ciudad=$_POST["ciudad"];
	$pais=$_POST["pais"];
	$cadena =  '<s:element><tg:CurrentWeather><tg:Location></tg:Location><tg:Time></tg:Time><tg:Wind></tg:Wind><tg:Visibility></tg:Visibility><tg:Temperature></tg:Temperature><tg:DewPoint></tg:DewPoint><tg:RelativeHumidity></tg:RelativeHumidity><tg:Pressure></tg:Pressure><tg:Status></tg:Status></tg:CurrentWeather>';
	
	if ($err) 
	{
		// Display the error
		echo '<p><b>Error: '.$err.'</b></p>';
	}else
	{
		$respuesta = $client->call($ciudad, $pais, $cadena, "");
		echo $respuesta;
	}	

?>