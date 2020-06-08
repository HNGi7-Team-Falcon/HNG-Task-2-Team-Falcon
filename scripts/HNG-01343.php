<?php

   $sFullName = "Manuel Rodriguez Romero";
   $sId       = "HNG-01343";
   $sLanguage = "PHP";
   $sEmail    = "man.rdguez@gmail.com";
   $sFile     = $sId . ".php";
   $sMessage  = "";

   $sGreeting = "Hello World, this is "
      . $sFullName
      . " with HNGi7 ID "
      . $sId
      . " using "
      . $sLanguage
      . " for stage 2 task. "
      . $sEmail;

   $sMessage = $sGreeting;

   if ( isset( $_GET[ 'json' ] ) ) {

      $sGreeting = "Hello World, this is "
         . $sFullName
         . " with HNGi7 ID "
         . $sId
         . " and email "
         . $sEmail
         . " using "
         . $sLanguage
         . " for stage 2 task";

      $oPersData->file      = $sFile;
      $oPersData->output    = $sGreeting;
      $oPersData->name      = $sFullName;
      $oPersData->id        = $sId;
      $oPersData->email     = $sEmail;
      $oPersData->language  = $sLanguage;

      $myJSON = json_encode($oPersData);

      $sMessage = $myJSON;
   }

   echo $sMessage;
?>
