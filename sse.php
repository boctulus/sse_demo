<?php

class SSE
{
	private $channel;
	private $interval = 1;

	function __construct(){
		header("Content-Type: text/event-stream\n\n");
	}

	function setDefaultChannel(string $name){
		// validar. Solo permitidos [a-z-#] y alguno más. Ej: vendor-x#created
		$this->channel = $name; 
	}

	function setInterval(int $seconds){
		$this->interval = $seconds;
	}

	function send($data, string $channel = null){
		if (empty($channel)){
			$channel = !empty($this->channel) ? $this->channel : 'default';
		}

		echo "event: $channel\n";
		echo 'data: ' . json_encode($data);
		echo "\n\n";

		ob_flush();
		flush();

		sleep($this->interval);
	}

}

/*
	Ejemplo de uso
*/

$sse = new SSE();

while (1) 
{
	$data = [
		'name' => 'Felipe',
		'age'  => 10
	];

	$sse->send($data, 'vendor-x#created');
}


