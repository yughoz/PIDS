<?php

require 'vendor/autoload.php';

use YGZLib\PidGenerator;

// echo PidGenerator::generate("TEST");
$tempArr = [];
$number = 1000000000;
// $number = 2147483647;
while (true) {
	usleep(50000);
	$pid = PidGenerator::idTime(2);
	$NUM = PidGenerator::idTime(0,$number);

	if (in_array($pid, $tempArr)) {
		echo "END :" .$pid;die;
	}
	$tempArr[] = $pid;
	echo "NO : ".$number ."---\n";
	echo "NUM : ".$NUM ."---\n";
	echo $pid ."---\n";

	$number++;
}
