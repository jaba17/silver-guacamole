<?php

  // import functions php file
  require_once('functions.php');

  // header declaration
  header('Content-Type: application/json');

  // declaration of global variables
  $GLOBALS['path_to_game_files'] = "data/sessions/";
  $GLOBALS['path_to_sessions_file'] = "data/sessions.json";

  $response['success'] = "true";

//  initSessionTXT();

  // create session id
  $id = createSessionID();
  createSession($id);

  echo json_encode($response);

  // creates a digit session id
  function createSessionID() {
    $id = uniqid (rand ());
    return $id;
  }

  // initializes the data  file
  function initSessionTXT (){

    // set initial values
    $init_vals = [];
    $init_vals['number_of_sessions'] = 0;
    $init_vals['sessions'] = [];

    $init_vals_json = json_encode($init_vals);

    writeToFile($GLOBALS['path_to_sessions_file'], $init_vals_json);
    /*$sessions_txt = fopen($GLOBALS['path_to_sessions_file'], "w");

    fwrite($sessions_txt, $init_vals_json);
    fclose($sessions_txt);*/

  }

  function createSession($session_id){

    addSessionIdToSessionsTXT($session_id);

    // make new directory for session data
    $dirname = "./../data/sessions/".$session_id;
    if (!is_dir($dirname))
    {
        mkdir($dirname, 0777, true);
    }

    // write session init data
    $session_init_data["timestamp"] = mktime();
    writeToFile("data/sessions/".$session_id."/session_data.json", json_encode($session_init_data));

    // write quiz init data
    $quiz_init_data['exercises'] = [];
    writeToFile("data/sessions/".$session_id."/quiz_data.json", json_encode($quiz_init_data));

    // write quiz init data
    $player_init_data['players'] = [];
    writeToFile("data/sessions/".$session_id."/player_data.json", json_encode($player_init_data));


  }

  # adds a new session to the big sessions.txt file
  function addSessionIdToSessionsTXT ($session_id){

        $sessions_file = json_decode(readFromFile("data/sessions.json"), true);

        $sessions_num = (int)$sessions_file['number_of_sessions'];
        $sessions = $sessions_file['sessions'];

        // create a new session element
        $newSession = [];
        $newSession['session_id'] = $session_id;
        $newSession['timestamp'] = mktime();
        array_push($sessions, $newSession);

        // increment the session counter by one
        $sessions['number_of_sessions'] = $sessions_num++;
    //    echo json_encode($sessions);
        // write the new json to the file
        writeToFile("data/sessions.json", json_encode($sessions));

  }
/*
  function writeToFile($file_path, $text_to_write){

        $sessions_txt = fopen($file_path, "w");

        fwrite($sessions_txt, $text_to_write);
        fclose($sessions_txt);

  }
*/

?>
