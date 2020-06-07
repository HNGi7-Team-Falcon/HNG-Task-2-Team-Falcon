<?php

	$template = "/^Hello World, this is [\w\s]+ with HNGi7 ID HNG-\d{1,} using \w.* for stage 2 task/";
	$idRegex = "/(HNG[-{0,}][\d]+)/";
	$emailRegex = "/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/i";
	$languageRegex = "/using \[{0,1}(\w+[^\s]+)/i";
	$nameRegex = "/this is \[{0,1}([\w+,\s]+)]{0,1} with/i";
	 // Declaring the variable for the names of lead in the team
    $teamLeadBackEnd = '@onyijne';
    $teamLeadFrontEnd = '@Susanspecs';
	$teamLeadDevOps = '@Rufai';
	// declaaring fails and passes
	$totalFail = 0;
	$totalPass = 0;

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
// 	if(isset($_SERVER["QUERY_STRING"])) {
// 	 	$queryStr = $_SERVER["QUERY_STRING"];
// 	 	$isJson = $queryStr == "json";
// 	}

	$link = "https://";
  	// Append the host(domain name, ip) to the URL. 
  	$link .= $_SERVER['HTTP_HOST'];
  	// Append the requested resource location to the URL 
  	$link .= $_SERVER['REQUEST_URI'];

	$queryStr = parse_url($link, PHP_URL_QUERY);
	$isJson = $queryStr == "json";

	if ($isJson) {
		header("Content-Type: application/json");
		foreach ($files as $key => $fileName) {

			$filePath = "./$path/$fileName";

			if (!is_dir($filePath)) {
				$item = array();

				$runtime = getRuntime("$fileName");

				// echo $fileName;
				if ($runtime) {

					$output = null;
					try {
						$output = shell_exec("$runtime $filePath 2>&1"); # Execute script and assign result
					} catch(Exception $e) {
						$output = null;
					}
					if (is_null($output)) {

						$item["status"] = "fail";
						$item["output"] = "%> script produced no output";
						$item["name"] = $fileName;
						$totalFail += 1; //add total fail
					} else {

						if (preg_match($template, $output, $matches)) {
							$item["status"] = "pass";
							$item["output"] = trim($matches[0]);
							$totalPass += 1; //add total pass
						} else {
							$item["status"] = "fail";
							$item["output"] = $output;
							$totalFail += 1; //add total fail
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
					}

				} else {
					$item["name"] = $fileName;
					$item["output"] = "File not supported";
					$item["status"] = "fail";
				}

				// fileName
				$item["fileName"] = $fileName;

				array_push($data, $item);
			}
		}
		echo json_encode($data), JSON_PRETTY_PRINT;
	} else {
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
								$output = null;
								try {
									$output = shell_exec("$runtime $filePath 2>&1"); # Execute script and assign result
								} catch(Exeception $e) {
									$output = null;
								}
								if (is_null($output)) {

									$item["status"] = "fail";
									$item["output"] = "%> script produced no output";
									$item["name"] = $fileName;

								} else {

									if (preg_match($template, $output, $matches)) {
										$item["status"] = "pass";
										$item["output"] = $matches[0];
										$passCount++;
									} else {
										$item["status"] = "fail";
										$item["output"] = $output;
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

							} else {
								$item["name"] = $fileName;
								$item["output"] = "File not supported";
								$item["status"] = "fail";
							}

							// fileName
							$item["fileName"] = $fileName;

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
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
<?php 
	}
