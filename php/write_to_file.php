<?php
	function writeToFile($filepath, $dataString) {
		$currentFileData = file_get_contents($filepath);
		$currentFileData .= $dataString . PHP_EOL;
		file_put_contents($filepath, $currentFileData);
	}