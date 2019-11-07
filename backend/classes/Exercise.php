<?php
/*
*
* This class manages an exercise of the game.
*
*/

require_once('Question.php');
require_once('Answer.php');

class Exercise {

  public $question;
  public $answer1;
  public $answer2;
  public $answer3;
  public $answer4;


  function __construct($question, $answer1, $answer2, $answer3, $answer4) {
    $this->question = new Question($question);
    $this->answer1 = new Answer($answer1, TRUE);
    $this->answer2 = new Answer($answer2, FALSE);
    $this->answer3 = new Answer($answer3, FALSE);
    $this->answer4 = new Answer($answer4, FALSE);
  }



  function getQuestionName(){
    return $this->$questionName;
  }

  // return all exercise info as json String
  function getExerciseData (){
    $exercise_info['question'] = $this->question->questionName;

    $exercise_info['answer_1']['name'] = $this->answer1->answerName;
    $exercise_info['answer_1']['correct'] = $this->answer1->correct;

    $exercise_info['answer_2']['name'] = $this->answer2->answerName;
    $exercise_info['answer_2']['correct']  = $this->answer2->correct;

    $exercise_info['answer_3']['name'] = $this->answer3->answerName;
    $exercise_info['answer_3']['correct'] = $this->answer3->correct;

    $exercise_info['answer_4']['name'] = $this->answer4->answerName;
    $exercise_info['answer_4']['correct'] = $this->answer4->correct;

    return array($exercise_info);


  }



}

?>
