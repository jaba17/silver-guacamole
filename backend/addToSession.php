<?php
  /*
  *
  * This file adds a user to a specific game session
  *
  */
  // header declaration
  //header('Content-Type: application/json');



  // declaration of global variables
  $GLOBALS['path_to_game_files'] = "./../data/quiz_sessions/";
  $GLOBALS['path_to_sessions_file'] = "./../data/sessions.txt";

  if(isset($_REQUEST['session_id']) && isset($_REQUEST['user_name'])){
    $session_id = $_REQUEST ['session_id'];
    $user_name = $_REQUEST ['user_name'];

    addToSession($session_id, $user_name);
  }

  function addToSession($session_id, $user_name){
    $session_directory = $_GLOBALS['path_to_game_files'].$session_id;

  }
?>
