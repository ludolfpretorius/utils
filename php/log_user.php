<?php
	date_default_timezone_set("Africa/Johannesburg"); // Set relevant timezone
	require('./write_to_file.php'); // import "writeToFile()" function

	function logUser($log) {
		$query = json_decode(file_get_contents('http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR']));
		if ($query && $query->status == 'success') {
			$user = date('d-m-Y H:i:s').' - '.$_SERVER['REMOTE_ADDR'].' - '.$_SERVER['HTTP_USER_AGENT'].' - '.$query->country.', '.$query->regionName.', '.$query->city.', '.$query->zip.', '.$query->isp.', '.$query->org.', '.$query->as;
			writeToFile($log, $user);
		} else {
			$user = date('d-m-Y H:i:s').' - '.$_SERVER['REMOTE_ADDR'].' - '.$_SERVER['HTTP_USER_AGENT'];
			writeToFile($log, $user);
		}
	}