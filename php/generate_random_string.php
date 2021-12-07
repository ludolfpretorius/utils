<?php
	$length = random_bytes('6');
	$token = bin2hex($length); // Generates a 12 character alphanumeric string
