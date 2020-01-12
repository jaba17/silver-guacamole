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

  function checkIfPlayerExists($player_name){
    $player_data = json_decode(readFromFile("data/sessions/".$this->session_id."/player_data.json"), true) or die("not found");
    echo json_encode($player_data['players']);
    if (in_array($player_name, $player_data['players'])){
      return true;
    }else{
      return false;
    }
  }

  function addToPlayerTXT($session_id){
    $player_data = json_decode(readFromFile("data/sessions/".$session_id."/player_data.json"), true) or die("not found");

    $new_player_data["username"] = $this->username;
    $new_player_data["credits"] = $this->credits;

    array_push($player_data["players"], $new_player_data);
    echo json_encode($player_data);
    writeToFile("data/sessions/".$session_id."/player_data.json", json_encode($player_data));

  }





}

?>
