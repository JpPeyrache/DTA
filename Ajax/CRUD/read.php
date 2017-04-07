<?php
  require('BdD.class.php');
  $bdd = new BdD();

  $req = $bdd->req('SELECT id,pseudo,mail,name,surname FROM cm_users');

  $json = array();
  $i = 0;
  while($line = $req->fetch()){
    $json[$i] = $line;
    $i++;
  }

  echo json_encode($json);
?>
