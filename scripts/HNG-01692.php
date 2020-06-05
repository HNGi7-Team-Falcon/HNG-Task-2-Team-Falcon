<?php
  class Intro{
      public $name = "Ajugwo Timothy";
      public $id = "HNG-01692";
      public $lang = "php";
      public $email = "timorex101ajugwo@gmail.com";

      public function display_details(){
        echo "Hello World, this is ".$this->name." with HNGi7 ID ".$this->id." using ".$this->lang." for stage 2 task. ".$this->email;
      }


  }
  $new_user = new Intro;
  $new_user->display_details();


 ?>
