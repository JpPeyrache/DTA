<?php
  require('BdD.class.php');
  $bdd = new BdD();

  $array[0] = $_POST['pseudo'];
  $array[1] = $_POST['mail'];
  $array[2] = $_POST['name'];
  $array[3] = $_POST['surname'];

  $bdd->prepreq('INSERT INTO cm_users(pseudo,mail,name,surname) VALUES(?,?,?,?)',array($_POST['pseudo'],$_POST['mail'],$_POST['name'],$_POST['surname']));
  $req = $bdd->prepreq('SELECT id,pseudo,mail,name,surname FROM cm_users WHERE pseudo=?',array($_POST['pseudo']));
  $res = $req->fetch();
  $json[0] = $res;

  echo json_encode($json);

?>
