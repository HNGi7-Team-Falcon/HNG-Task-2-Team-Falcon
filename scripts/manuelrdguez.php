<?php

   $sFullName = "Manuel Rodriguez Romero";
   $sId       = "HNG-01343";
   $sLanguage = "PHP";
   $sEmail    = "man.rdguez@gmail.com";
   $sFile     = $sId . ".php";

   $sGreeting = "Hello World, this is "
      . $sFullName
      . " with HNGi7 ID "
      . $sId
      . " using "
      . $sLanguage
      . " for stage 2 task."
      . $sEmail;

   echo $sGreeting;
?>
