<?php 


// Variable Declaration and Initiation
// -Full name using $full_name
// -ID using $hngi7_id
// -Language using $language
// -Email using $email

$full_name = "Adeniyi Odefunso";
$id = "HNG-06482";
$language = "PHP";
$email = "adeniyibiz@gmail.com";

// Using the variable with some hardcoded strings to return the statement
// Using $statement
// Hello World, this is [full name] with HNGi7 ID [ID] using [language] for stage 2 task. [email]

$statement = "Hello World, this is ".$full_name. " with HNGi7 ID ".$id." using ".$language." for stage 2 task. ".$email;

// return with the hard coded statement and the dynamic variables
echo $statement;


?>