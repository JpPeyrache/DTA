<?php
  require('BdD.class.php');
  $bdd = new BdD();

  $array[0] = $_POST['pseudo'];
  $array[1] = $_POST['mail'];
  $array[2] = $_POST['name'];
  $array[3] = $_POST['surname'];
  $array[4] = $_POST['id'];

  $bdd->prepreq('UPDATE cm_users SET pseudo=?,mail=?,name=?,surname=? WHERE id=?',$array);

  echo("La modification a été effectuée");

?>
