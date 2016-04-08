<?php
	require_once ('../lib/nusoap.php');

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/serv');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/serv';
	$soap->register('add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('resta', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('multi', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('divi', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function add($a, $b){
	return $a + $b;
}

function resta($a, $b){
	return $a - $b;
}

function multi($a, $b){
	return $a * $b;
}

function divi($a, $b){
	return $a / $b;
}

?>

