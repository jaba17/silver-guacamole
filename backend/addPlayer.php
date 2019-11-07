<?php

require_once("functions.php");
require_once("classes/Player.php");


if(isset($_REQUEST["session_id"])&&isset($_REQUEST["username"])){
  $session_id = $_REQUEST['session_id'];
  $username = $_REQUEST['username'];
  $player = new Player($session_id, $username);
  $player-> addToPlayerTXT($session_id);
}

?>
