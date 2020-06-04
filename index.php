<?php
	$template = "/^Hello World, this is [\w\s]+ with HNGi7 ID HNG-\d{1,} using \w.* for stage 2 task/";
	$idRegex = "/(HNG[-{0,}][\d]+)/";
	$emailRegex = "/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/i";
	$languageRegex = "/using \[{0,1}(\w+[^\s]+)/i";
	$nameRegex = "/this is \[{0,1}([\w+,\s]+)]{0,1} with/i";


$url = $_SERVER['REQUEST_URI'];
$response_type = substr(strrchr($url, "?"), 1);
//define directory
$dir = 'scripts';
//scan directory and return array of files
$files = scandir($dir);

//loop through array of files
	foreach ($files as $key => $value) {
		if (strrpos($value, 'HNG-')  !== false ) {
			$file = $dir ."/". $value;
			//get file extensions
			$id = substr($value,0,9);
			$ext = substr(strrchr($value, "."), 1);
			//run the file in php and get the output
			$res = ($ext === 'js') ? exec("node $file 2>&1", $output) : exec("$ext $file 2>&1", $output) ; //exec("$ext $file 2>&1", $output);
			$title = "$value";
			$name = trim(get_string_between($res, 'this is', 'with'));
			$language = trim(get_string_between($res, 'using', 'for'));
			//set pass criteria
			$passCondition = "Hello World, this is {$name} with HNGi7 ID {$id} using {$language} for stage 2 task";
			if($passCondition === $res){
				$status = 'pass';
			}else{
				$status = 'fail';

	$supported_json = '{
		"py": "python",
		"js": "node",
		"php": "php",
		"rb": "irb",
		"java": "java",
		"csx": "dotnet-script"
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

	$data =  array();
	$totalCount = 0;
	$passCount = 0;
	$failCount = 0;

	foreach ($files as $key => $fileName) {

		$filePath = "./$path/$fileName";

		if (!is_dir($filePath)) {
			$item = array();
			$totalCount++;

			$runtime = getRuntime("$fileName");

			// echo $fileName;
			if ($runtime) {

				set_time_limit(5);
				$output = shell_exec("$runtime $filePath 2>&1"); # Execute script and assign result
				if (is_null($output)) {

					$item["status"] = "fail";
					$item["output"] = "unable to run script";
					$item["name"] = $fileName;
					$failCount++;

				} else {

					$isMatched = preg_match($template, $output, $matches) === 1;

					if ($isMatched) {
						$item["status"] = "pass";
						$item["output"] = $matches[0];
						$passCount++;
					} else {
						$item["status"] = "fail";
						$item["output"] = $output;
						$failCount++;
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

	$isJson = false;
	if(isset($_SERVER["QUERY_STRING"])) {
	 	$queryStr = $_SERVER["QUERY_STRING"];
	 	$isJson = $queryStr == "json";
	}

	if ($isJson) {
		header("Content-Type: application/json");
		echo json_encode($data);
	} else {
		htmlFormat($data);
	}

	function htmlFormat($data) {
		global $totalCount;
		global $passCount;
		global $failCount;

		$bootstrap = '
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>';

		$head = '
		<head>
			<title>Team Falcon</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		</head>
		';

		$rows = getRows($data);

		$table = '
		<table class="table table-bordered table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Output</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>'
				.$rows.
			'</tbody>
		</table>';

		$stats = '
		<h1 class="text-center">Team Falcon</h1>
		<table class="table">
			<thead>
				<tr class="text-center">
					<th scope="col">Submitted</th>
					<th scope="col">Passed</th>
					<th scope="col">Failed</th>
				</tr>
			</thead>
			<tbody>'
			.'<tr>'
				.'<td class="col-4 table-info text-center">'.$totalCount.'</td>'
				.'<td class="col-4 table-success text-center">'.$passCount.'</td>'
				.'<td class="col-4 table-danger text-center">'.$failCount.'</td>'
			.'</tr>'
			.'</tbody>
		</table>';

		echo "
		<!DOCTYPE html>
		<html>"
			.$head
			."<body>
					<div class=container>"
				.$stats
				.$table
				.$bootstrap
				."</div>
			</body>
		</html>";
	}

	function getRows($items) {
		$rows = "";
		foreach ($items as $key => $item) {
			$row = getRow($item); 
			$rows = $rows.$row;
		}
		return $rows;
	}

	$counter = 0;
	function getRow($item) {
		global $counter;
		$fail = $item["status"] == "fail";
		$class = $fail ? "text-danger" : "'text-success'";
		$counter++;
		return "<tr>"
			."<th scope='row'>".$counter."</th>"
			."<td class=".$class.">".$item["name"]."</td>"
			."<td><samp>".htmlspecialchars($item["output"])."</samp></td>"
			."<td class=".$class.">".strtoupper($item["status"])."</td>"
			."</tr>";
	}

?>
