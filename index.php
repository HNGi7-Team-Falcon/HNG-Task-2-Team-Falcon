<?php

	# Retrive the runtime engine name
	function getRuntime($fileName) {
		$supported_json = '{"py":"python", "js":"node"}'; # currently supported types should be updated
		$supported_map = json_decode($supported_json, true); # convert to json object to work with

		$tokens = explode(".", $fileName); // split file name into [fileName, extension];
		$ext = $tokens[1]; // extension
		$runtime = $supported_map[$ext]; // Get the name of the runtime
		return $runtime;
	}
 
 	$queryStr = $_SERVER['QUERY_STRING'];
 	$isJson = $queryStr == "json";

	$list = shell_exec("ls ./scripts"); # Get the list of files in directory

	$files = explode("\n", $list); # Convert list to array of file names
	$data =  array();

	foreach ($files as $key => $fileName) {

		$filePath = "./scripts/$fileName";

		if (is_file($filePath)) {
			$item = array();
			$runtime = getRuntime("$fileName");
			$output = shell_exec("$runtime $filePath"); # Execute script and assign result
			$item["success"] = true;
			$item["payload"] = $output;
			array_push($data, $item);
		}
	}

	// convert to JSON:API format https://jsonapi.org/
	$response = array();
	$response["data"] = $data;

	if ($isJson) {
		header("Content-Type: application/json");
		echo json_encode($response);
	} else {
		echo implode("<br>", $response);
	}
?>