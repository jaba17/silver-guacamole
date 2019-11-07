<?php
/*
*
* This class manages the answers of the game. As it is a class many
*
*/

class Answer {
  public $answerName;
  public $correct;


  function __construct($answer_name, $correct){
      $this->answerName = $answer_name;
      $this->correct = $correct;
  }
}


?>
