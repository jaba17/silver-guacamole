<?php

require_once("functions.php");


class Player{

  public $session_id;
  public $username;
  public $credits = 0;

  function __construct($session_id, $username){
    $this->session_id = $session_id;
    $this->username = $username;
  }

  function addToPlayerTXT($session_id){
    $player_data = json_decode(readFromFile("data/sessions/".$session_id."/player_data.json"), true);

    $new_player_data["username"] = $this->username;
    $new_player_data["credits"] = $this->credits;

    array_push($player_data["players"], $new_player_data);
    echo json_encode($player_data);
    writeToFile(json_encode($player_data));

  }





}

?>
