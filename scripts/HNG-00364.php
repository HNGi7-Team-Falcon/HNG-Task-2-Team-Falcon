<?php
    ob_start();

    function myDetails()
    {
        $name = "Sajjad Khalid Abubakari";
        $id = "HNG-00364";
        $language = "Php";
        $email = "captainsajjad4@gmail.com";
        $output = "Hello World, this is ".$name." with HNGi7 ID ".$id." using ".$language." for stage 2. ".$email."";
        echo json_encode($output);
    }

    myDetails();
    ob_flush();
    