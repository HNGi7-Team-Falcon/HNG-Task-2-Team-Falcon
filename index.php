<?php
	$template = "/Hello World, this is ([\w+\s\S]+) with HNGi7 ID (HNG-[\d]+) using (\w+) for stage 2 task\s?/";
	$idRegex = "/(HNG[-{0,}][\d]+)/";
	# Retrive the runtime engine name
	function getRuntime($fileName) {;

		$supported_json = '{
			"py": "python",
			"js": "node",
			"php": "php",
			"rb": "irb",
			"java": "java"
		}'; # currently supported types should be updated
		$supported_map = json_decode($supported_json, true); # convert to json object to work with

		$tokens = explode(".", $fileName); // split file name into [fileName, extension];
		$runtime;
		if ($tokens) {
			$ext = $tokens[1]; // extension
			if (isset($ext) && isset($supported_map[strtolower($ext)])) {
				$runtime = $supported_map[strtolower($ext)]; // Get the name of the runtime
			}
		}

		return $runtime;
	}
 

	$list = shell_exec("ls ./scripts"); # Get the list of files in directory
	$files = explode("\n", $list); # Convert list to array of file names

	$data =  array();

	foreach ($files as $key => $fileName) {

		$filePath = "./scripts/$fileName";

		if (!is_dir($filePath)) {
			$item = array();
			$runtime = getRuntime("$fileName");
			$output;

			if ($runtime) {
				$output = shell_exec("$runtime $filePath 2>&1"); # Execute script and assign result
			}

			if ($output === null) {

				$item["status"] = "fail";
				$item["message"] = "unable to run script";

			} else {

				preg_match_all($template, $output, $matches);
				preg_match($idRegex, $output, $idMatches);

				$isMatched;

				$name;
				$language;
				$email;

				if (isset($matches[0][0])){
					preg_match_all($template, $matches[0][0], $matches2);

					$name = $matches2[1][0];
					$language = $matches2[3][0];
					$item["name"] = $name;
					$item["language"] = $language;
					$isMatched = $matches[0][0] === $output;
				}

				if ($isMatched) {
					$item["status"] = "pass";
				} else {
					$item["status"] = "fail";
				}

				$item["output"] = $output;
				if (isset($idMatches[0])) {
					$item["id"] = $idMatches[0];
				}
			}
			$item["fileName"] = $fileName;

			array_push($data, $item);
		}
	}

	// convert to JSON:API format https://jsonapi.org/
	$response = array();
	$response["data"] = $data;

	$isJson = false;
	if(isset($_SERVER["QUERY_STRING"])) {
	 	$queryStr = $_SERVER["QUERY_STRING"];
	 	$isJson = $queryStr == "json";
	}

	if ($isJson) {
		header("Content-Type: application/json");
	}

	echo json_encode($response);
?>