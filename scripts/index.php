<?php

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
			}

			$data = [];
			$data['id'] = $id;
			$data['output'] = @$res;
			$data['status'] = @$status;
			$result = new stdClass();
			$result->data = $data;
			if ($response_type === 'json') {
				echo json_encode($result, JSON_PRETTY_PRINT);
				echo "<br>";
			}else{
				$table = '<table>
              <thead>
                <tr style="text-align: center;">
                  <th>ID</th>
                  <th>OUTPUT</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody>';
				echo output_html($id,$res,$status,$table);
				//echo $table;
				
			}
			
		}
	}

function output_html($id,$res,$status, $table)
{
	$table = $table;
	$table .= '<tr style="text-align: center;">';
    $table .= '<td>'.$id.'</td>';
    $table .= '<td>'.$res.'</td>';
    $table .= '<td>'.$status.'</td>';
    $table .= '</tr>';
    $table .= '</tbody>';
	return $table;
}
	

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
