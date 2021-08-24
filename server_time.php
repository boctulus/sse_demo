<?php

date_default_timezone_set("America/New_York");
header("Content-Type: text/event-stream\n\n");


while (1) {
	// Every second, sent a "ping" event.

	$data = [
		'name' => 'Felipe',
		'age'  => 10
	];

	echo "event: vendor-x#created\n";
	echo 'data: ' . json_encode($data);
	echo "\n\n";

	ob_flush();
	flush();
	sleep(1);
}