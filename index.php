<!DOCTYPE_HTML>

<?php

$url = $_SERVER['REQUEST_URI'];
$response_type = substr(strrchr($url, "?"), 1);

//define directory
$dir = 'scripts';
$counter = 1;


/**
* source https://stackoverflow.com/a/9826656/11800056
**/
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>
<html>
<head>
	<style>
		body {
			text-align: center;
		}
		table,
		th,
		td{
			border: 1px solid black;
			border-collapse: collapse;
			text-align: left;
		}
	</style>
</head>
<body>

<?php

//scan directory and return array of files
$files = array_slice(scandir($dir),3);
$length = count($files);
$noOfPasses = 0;
$noOfFailures = 0;
//loop through array of files
if ($response_type === 'json') {
	$result = array();
	$result['length'] = $length;
		foreach ($files as $key => $value) {
			if (strrpos($value, 'HNG-')  !== false ) {
				$file = $dir ."/". $value;
				//$email_get = file_get_contents($file);
				//die(var_dump($email_get));
				//get file extensions
				$id = substr($value,0,9);
				$ext = substr(strrchr($value, "."), 1);
				//run the file in php and get the output
				$res = ($ext === 'js') ? exec("node $file 2>&1", $output) : exec("$ext $file 2>&1", $output) ;
				$name = trim(get_string_between($res, 'this is', 'with'));
				$language = trim(get_string_between($res, 'using', 'for'));
				$email = trim(get_string_between($res, 'my', 'email'));
				$response = trim(substr($res, 0,strrpos($res, 'my')));
				//set pass criteria
				$passCondition = "Hello World, this is {$name} with HNGi7 ID {$id} using {$language} for stage 2 task";
				if($passCondition === $response){
					$status = 'pass';
					$noOfPasses++;
				}else{
					$status = 'fail';
					$noOfFailures++;
				}

				$result['Pass'] = $noOfPasses;
				$result['Fail'] = $noOfFailures;
				$data = new stdClass();
				$data->file = $value;
				$data->output = $response;
				$data->owner = $name;
				$data->id = $id;
				$data->email = $email;
				$data->language = $language;
				$data->status = @$status;
				$result[] = $data;
			}
			
		}//end foreach
		
		echo json_encode($result);
		
}else{
	//display html
	echo '<h2>HNG-Task-2-Team-Falcon</h2><p>Team Falcom submission scripts in a HNG-Task-2-Team-Falcon repository for the second task in HNG.</p>
	<table style="width:100%">
	<tr style="text-align: center;">
	<th>No</th>
	<th>File</th>
	<th>HNGi7_ID</th>
	<th>Email</th>
	<th>Output</th>
	<th>Status</th></tr>';

	foreach ($files as $key => $value) {
		if (strrpos($value, 'HNG-')  !== false ) {
			$file = $dir ."/". $value;
			//get file extensions
			$id = substr($value,0,9);
			$ext = substr(strrchr($value, "."), 1);
			//run the file in php and get the output
			$res = ($ext === 'js') ? exec("node $file 2>&1", $output) : exec("$ext $file 2>&1", $output) ;
			$name = trim(get_string_between($res, 'this is', 'with'));
			$language = trim(get_string_between($res, 'using', 'for'));
			$response = trim(substr($res, 0,strrpos($res, 'my')));
			$email = trim(get_string_between($res, 'my', 'email'));
				//set pass criteria
			$passCondition = "Hello World, this is {$name} with HNGi7 ID {$id} using {$language} for stage 2 task";
			if($passCondition === $response){
				$status = 'pass';
			}else{
				$status = 'fail';
			}
	}
	echo '<tr><td>'.$counter.'</td><td>'.$value.'</td><td>'.$id.'</td><td>'.$email.'</td><td>'.$response.'</td><td>'.$status.'</td></tr>';

	$counter++;
}

echo '</table>';

}

?>
	
</body>
</html>
