<?php
// INTERNSHIP ID: HNG-05192
$full_name = 'Ebube Okorie';
$id = 'HNG-05192';
$language = 'PHP';
$email = 'okorieebube1@gmail.com';

function slack_details($full_name,$id,$language,$email){
    return "Hello World, this is ".$full_name." with HNGi7 ID ".$id." using ".$language." for stage 2 task.".$email;
}
$returned = slack_details($full_name,$id,$language,$email);
print $returned;
