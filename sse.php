<?php

require 'SSE.php';

$vendor = $_GET['vendor'] ?? '';


$sse = new SSE();

$sse->setDefaultChannel('synced');


if (empty($vendor)){
	$sse->send([
		'error' => 'vendor is empty'
	]);

	exit(0);
}


$current = 0;
while (1) 
{
	$data = [
		'vendor' => $vendor,
		'products'  => [
			'current' => $current,
			'total'   => 253
		]
	];

	$sse->send($data);
	
	$current++;
}


