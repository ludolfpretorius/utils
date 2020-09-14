<?php
	function updateJsonFile($filepath, $dataObject, $primaryKey) {
		$currentFileData = json_decode(file_get_contents($filepath));
		$index = '';
		foreach ($currentFileData as $i => $up) {
			if ($up->id === $primaryKey) { // Note that "id" should be changed to relevant object key
				$index = $i;
			} 
		}
		$currentFileData[$index] = $dataObject;
		file_put_contents($filepath, json_encode($currentFileData, JSON_PRETTY_PRINT));
	}