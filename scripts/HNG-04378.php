<?php
function Intro(){
    $FullName   = "George Chukwuebuka";
    $ID         = "HNG-04378";
    $Language   = "PHP";
    $Email      = "george.chuks.gc51@gmail.com";
    return "Hello World, this is {$FullName} with HNGi7 ID {$ID} using {$Language} for stage 2 task. {$Email}";
}
$MyIntro = Intro();
echo $MyIntro;
?>