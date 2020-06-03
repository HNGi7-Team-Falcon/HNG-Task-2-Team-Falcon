<?php
	$template = "/^Hello World, this is [\w\s]+ with HNGi7 ID HNG-\d{0,} using \w+ for stage 2 task/";
	$idRegex = "/(HNG[-{0,}][\d]+)/";
	$emailRegex = "/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/i";
	$languageRegex = "/using \[{0,1}(\w+)\b/i";
	$nameRegex = "/this is \[{0,1}([\w+,\s]+)]{0,1} with/i";

	# Retrive the runtime engine name
	function getRuntime($fileName) {;

		$supported_json = '{
			"py": "python",
			"js": "node",
			"php": "php",
			"rb": "irb",
			"java": "java",
			"kt": "kotlinc",
			"dart": "dart"
		}'; # currently supported types should be updated
		$supported_map = json_decode($supported_json, true); # convert to json object to work with

		$tokens = explode(".", $fileName); // split file name into [fileName, extension];
		$runtime = "php";
		if (isset($tokens[1])) {
			$ext = $tokens[1]; // extension
			if ($ext && isset($supported_map[strtolower($ext)])) {
				$runtime = $supported_map[strtolower($ext)]; // Get the name of the runtime
			}
		}

		return $runtime;
	}
 

	$path = "scripts";
	$files = scandir($path);

	$data =  array();

	foreach ($files as $key => $fileName) {

		$filePath = "./$path/$fileName";

		if (!is_dir($filePath)) {
			$item = array();
			$runtime = getRuntime("$fileName");
			$output;

			if ($runtime) {
				$output = shell_exec("$runtime $filePath 2>&1"); # Execute script and assign result
			}

			if (is_null($output)) {

				$item["status"] = "fail";
				$item["message"] = "unable to run script";

			} else {

				$isMatched = preg_match($template, $output, $matches) === 1;

				$name;
				$language;
				$email;

				if (isset($matches[0])){
					preg_match_all($template, $matches[0], $expectedFormat);

					if (isset($expectedformat[0])) {
						$item["expected"] = $expectedformat[0];
					}
				}

				if ($isMatched) {
					$item["status"] = "pass";
				} else {
					$item["status"] = "fail";
				}

				$item["output"] = $output;
			}
			// extract id
			preg_match($idRegex, $output, $idMatches);
			if (isset($idMatches[0])) {
				$item["id"] = $idMatches[0];
			}

			// extract name 
			preg_match($nameRegex, $output, $nameMatches);
			if (isset($nameMatches[1])) {
				$item["name"] = $nameMatches[1];
			}

			// extract language
			preg_match($languageRegex, $output, $languageMatches);
			if (isset($languageMatches[1])) {
				$item["language"] = $languageMatches[1];
			}


			// extract email
			preg_match($emailRegex, $output, $emailMatches);
			if (isset($emailMatches[0])) {
				$item["email"] = $emailMatches[0];
			}

			// fileName
			$item["fileName"] = $fileName;

			array_push($data, $item);
		}
	}

	$isJson = false;
	if(isset($_SERVER["QUERY_STRING"])) {
	 	$queryStr = $_SERVER["QUERY_STRING"];
	 	$isJson = $queryStr == "json";
	}

	if ($isJson) {
		header("Content-Type: application/json");
	}

	echo json_encode($data);
?>