<?php

require 'Sse.php';

/*
	Ejemplo de uso
*/

$sse = new SSE();
$sse->setInterval(1);

while (1) 
{
	$data = [
		'name' => 'Felipe',
		'age'  => 10
	];

	$sse->send('Hello World');  
	$sse->send($data, 'vendor-x#created');
	
}


