<?php

require 'vendor/autoload.php';

use YGZLib\PidGenerator;

// echo PidGenerator::generate("TEST");

while (true) {
	usleep(500000);
	echo PidGenerator::idTime() ."---\n";
}
