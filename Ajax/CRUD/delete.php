<?php
  require('BdD.class.php');
  $bdd = new BdD();

  $array[0] = $_POST['id'];

  $bdd->prepreq('DELETE FROM cm_users WHERE id=?',$array);

  echo("La suppression a été effectuée");

?>
