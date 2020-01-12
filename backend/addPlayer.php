<?php

require_once("functions.php");
require_once("classes/Player.php");

$response = [];

if(isset($_REQUEST["session_id"])&&isset($_REQUEST["username"])){
  $session_id = $_REQUEST['session_id'];
  $username = $_REQUEST['username'];

  $player = new Player($session_id, $username);
  if($player->checkIfPlayerExists($username)){
    $response['error'] = "player name is already used";
  }else{
    $player-> addToPlayerTXT($session_id);

  }

}

echo json_encode($response);

?>
