<?php
	date_default_timezone_set("Africa/Johannesburg"); // Set relevant timezone
	
	function removeCookie($cookieName, $redirect) {
		setcookie($cookieName, '', time() - 3600, '/');
		header('Location: '.$redirect, true, 302);
		exit();
	}