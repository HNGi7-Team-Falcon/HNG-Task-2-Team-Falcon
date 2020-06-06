<?php 


// Variable Declaration and Initiation
// -Full name using $full_name
// -ID using $hngi7_id
// -Language using $language
// -Email using $email

$full_name = "Udeme Christopher";
$id = "HNG-06636";
$language = "PHP";
$email = "udemechris1@gmail.com";

// Using the variable with some hardcoded strings to return the statement
// Using $statement
// Hello World, this is [full name] with HNGi7 ID [ID] using [language] for stage 2 task. [email]

$statement = "Hello World, this is ".$full_name. " with HNGi7 ID ".$id." using ".$language." for stage 2 task. ".$email;

// return with the hard coded statement and the dynamic variables
echo $statement;


?>