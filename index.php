<?php
	$template = "/^Hello World, this is [\w\s?-]+ with HNGi7 ID HNG-\d{1,} using \w.* for stage 2 task/";
	$idRegex = "/(HNG[-{0,}][\d]+)/";
	$emailRegex = "/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/i";
	$languageRegex = "/using \[{0,1}(\w+[^\s]+)/i";
	$nameRegex = "/this is \[{0,1}([\w+,\s]+)]{0,1} with/i";

	$supported_json = '{
		"py": "python",
		"js": "node",
		"php": "php",
		"rb": "irb",
		"java": "java",
		"kt": "kotlinc",
		"kts": "kotlinc",
		"dart": "dart"
	}'; # currently supported types should be updated
	$supported_map = json_decode($supported_json, true); # convert to json object to work with

	# Retrive the runtime engine name
	function getRuntime($fileName) {;
		global $supported_map;

		$tokens = explode(".", $fileName); // split file name into [fileName, extension];
		if (isset($tokens[1])) {
			$ext = $tokens[1]; // extension
			if ($ext && isset($supported_map[strtolower($ext)])) {
				$runtime = $supported_map[strtolower($ext)]; // Get the name of the runtime
				return $runtime;
			}
		}

		return null;
	}
 

	$path = "scripts";
	$files = scandir($path);

	$totalCount = count($files);
?>

<?php
	$data =  array();

	$isJson = false;
	if(isset($_SERVER["QUERY_STRING"])) {
	 	$queryStr = $_SERVER["QUERY_STRING"];
	 	$isJson = $queryStr == "json";
	}

	if ($isJson) {
		header("Content-Type: application/json");
		foreach ($files as $key => $fileName) {

			$filePath = "./$path/$fileName";

			if (!is_dir($filePath)) {
				$item = array();

				$runtime = getRuntime("$fileName");

				// echo $fileName;
				if ($runtime) {
					$output = shell_exec("$runtime $filePath 2>&1 << input.txt"); # Execute script and assign result
					if (is_null($output)) {

						$item["status"] = "fail";
						$item["output"] = "%> script produced no output";
						$item["name"] = $fileName;

					} else {

						if (preg_match($template, $output, $matches)) {
							$item["status"] = "pass";
							$item["output"] = $matches[0];
						} else {
							$item["status"] = "fail";
							$item["output"] = $output;
						}

					}
					// extract id
					preg_match($idRegex, $output, $idMatches);
					if (isset($idMatches[0])) {
						$item["id"] = trim($idMatches[0]);
					}

					// extract name 
					preg_match($nameRegex, $output, $nameMatches);
					if (isset($nameMatches[1])) {
						$item["name"] = trim($nameMatches[1]);	
	
					} else {
						$item["name"] = $fileName;
					}

					// extract language
					preg_match($languageRegex, $output, $languageMatches);
					if (isset($languageMatches[1])) {
						$item["language"] = $languageMatches[1];
					}

					// extract email
					preg_match($emailRegex, $output, $emailMatches);
					if (isset($emailMatches[0])) {
						$item["email"] = trim($emailMatches[0]);
					} else {
						$item["status"] = "fail";
					}

					// fileName
					$item["fileName"] = $fileName;
				} else {
					$item["name"] = $fileName;
					$item["output"] = "File type not supported";
					$item["status"] = "fail";
				}

				array_push($data, $item);
			}
		}
		echo json_encode($data);
		die();
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Team Falcon</title>
	</head>
		<body>
			<div class=container>
			<h1 class="text-center">Team Falcon</h1>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
			<table class="table">
				<thead>
					<tr class="text-center">
						<th scope="col">Submitted</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="col-4 table-info text-center"><?php echo $totalCount; ?></td>
					</tr>
				</tbody>
			</table>
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Output</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php

						foreach ($files as $key => $fileName) {
							$filePath = "./$path/$fileName";

							if (!is_dir($filePath)) {
							$item = array();

							$runtime = getRuntime("$fileName");

							// echo $fileName;
							if ($runtime) {
								$output = shell_exec("$runtime $filePath 2>&1 << input.txt"); # Execute script and assign result
								if (is_null($output)) {

									$item["status"] = "fail";
									$item["output"] = "%> script produced no output";
									$item["name"] = $fileName;

								} else {

									if (preg_match($template, $output, $matches)) {
										$item["status"] = "pass";
										$item["output"] = $matches[0];
									} else {
										$item["status"] = "fail";
										$item["output"] = substr($output, 0, 200);
									}

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
								} else {
									$item["name"] = $fileName;
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
								} else {
									$item["status"] = "fail";
								}

								// fileName
								$item["fileName"] = $fileName;
							} else {
								$item["name"] = $fileName;
								$item["output"] = "File type not supported";
								$item["status"] = "fail";
							}

							echo getRow($item);
						}
					}

					$counter = 0;
					function getRow($item) {
						global $counter;
						$fail = $item["status"] == "fail";
						$class = $fail ? "text-danger" : "'text-success'";
						$counter++;

						return "
						<tr>"
							."<th scope='row'>".$counter."</th>"
							."<td class=".$class.">".$item["name"]."</td>"
							."<td><samp>".htmlspecialchars($item["output"])."</samp></td>"
							."<td class=".$class.">".strtoupper($item["status"])."</td>"
						."</tr>";
					}
				?>
			</tbody>
		</table>
		</div>
	</body>
</html>
