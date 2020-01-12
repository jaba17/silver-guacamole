<?php
/*
*
* This file is a collection of useful functions
*
*/



function writeToFile($file_path, $text_to_write){

  $f_open = fopen("./../".$file_path, "w");

  fwrite($f_open, $text_to_write);
  fclose($f_open);

}

function readFromFile($file_path){

  try{

    $f_open = fopen("./../".$file_path, "r");
    return fread($f_open, filesize("./../".$file_path));
    fclose($f_open);

  } catch (Exception $e) {
    return "file does not exist";
  }

}
?>
