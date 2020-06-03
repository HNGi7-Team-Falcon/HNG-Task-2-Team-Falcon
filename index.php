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
 
 	#$isJson = htmlspecialchars($_GET["json"]);
 	$isJson = true;

	$list = shell_exec("ls ./scripts"); # Get the list of files in directory

	$files = explode("\n", $list); # Convert list to array of file names

	foreach ($files as $key => $fileName) {

		$filePath = "./scripts/$fileName";

		if (is_file($filePath)) {

			$runtime = getRuntime("$fileName");
			$output = shell_exec("$runtime $filePath"); # Execute script and assign result

			if ($isJson) {
				header("Content-Type: application/json");
				echo json_encode($output);
			} else {
				echo $output . "Text";
			}
		}
	}
?>