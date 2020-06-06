<?php

$full_name = "Andikan Affiah";
$hngi7_id = "HNG-05249";
$language_used = "PHP";
$email = "andikanaffiah@gmail.com";


function intro_statement($name, $id, $language, $email){

	$statement = "Hello World, this is $name with HNGi7 ID $id using $language for stage 2 task. $email";
	echo $statement;

}


intro_statement($full_name, $hngi7_id, $language_used, $email);

?>
