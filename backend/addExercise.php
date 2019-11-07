<?php
  /*
  *
  * This file manages saving the questions
  *
  */
  require_once('functions.php');
  require_once('classes/Exercise.php');
  // header declaration
  header('Content-Type: application/json');

  // declaration of global variables
  $response = [];

  if(isset($_REQUEST['session_id'])&&isset($_REQUEST['question'])&&isset($_REQUEST['answer_1'])&&isset($_REQUEST['answer_2'])&&isset($_REQUEST['answer_3'])&&isset($_REQUEST['answer_4'])){
    $session_id = $_REQUEST['session_id'];
    $question = $_REQUEST['question'];
    $answer1 = $_REQUEST['answer_1'];
    $answer2 = $_REQUEST['answer_2'];
    $answer3 = $_REQUEST['answer_3'];
    $answer4 = $_REQUEST['answer_4'];

    $exercise = new Exercise($question, $answer1, $answer2, $answer3, $answer4);



    $exercise_data = $exercise->getExerciseData();


    $quiz_data = json_encode(readFromFile("data/sessions/".$session_id."/quiz_data.json"), true);

    $quiz_exercises = $quiz_data['exercises'];
    $response['d'] = $exercise_data;

    array_push($quiz_exercises, $exercise_data);
    writeToFile("data/sessions/".$session_id."/quiz_data.json", $quiz_exercises);

    //addQuestion($session_id, $question, $answer1, $answer2, $answer3, $answer4);
  }else {
    $response['success'] = "FALSE";
//    $response['success']['details'] = "not enough parameters given";


  }


  echo json_encode($response);

/*  function saveExerciseToTXT(json){

  }
*/
?>
