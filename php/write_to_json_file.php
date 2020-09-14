<?php
	function writeToJsonFile($filepath, $dataObject) {
		$currentFileData = json_decode(file_get_contents($filepath));
		$currentFileData[] = $dataObject;
		file_put_contents($filepath, json_encode($currentFileData, JSON_PRETTY_PRINT));
	}