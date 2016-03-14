<?php
var_dump($_GET);
  $file_title = "highscores.txt";
  //faili sisu
  $entries_from_file = file_get_contents($file_title);
  //echo $entries_from_file;
  //string objektideks
  $entries = json_decode($entries_from_file);
  //var_dump($entries);
  if(isset($_GET["p_name"]) && isset($_GET["guessed_words"])){
    //ei ole tuhjad
    if(!empty($_GET["p_name"])){
      //lihtne objekt
      $object = new StdClass();
      $object->p_name = $_GET["p_name"];
      $object->score = $_GET["guessed_words"];
      array_push($entries, $object);
      //salvestan faili ule, salvestan massiivi stringi kujul
      file_put_contents($file_title, json_encode($entries));
  }
}
// trukin valja stringi kuju massiivi
echo(json_encode($entries));
?>