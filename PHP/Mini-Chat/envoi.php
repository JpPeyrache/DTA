<?php
  session_start();
  include('BdD.class.php');

  // Récupération des variables de session
  $pseudo = $_SESSION['pseudo'];
  $age = $_SESSION['age'];
  $ville = $_SESSION['ville'];
  $msg = $_POST['msg'];

  $bdd = new BdD();

  // On regarde si l'utilisateur existe
  $res = $bdd->prepReq('SELECT id FROM user WHERE pseudo=?',array($pseudo));
  $donnees = $res->fetch();
  if($id = $donnees['id']){
    // Si oui, on enregistre le message
    $bdd->prepReq('INSERT INTO msg(id_user,dat,msg) VALUES(?,NOW(),?)',array($id,$msg));
  }else{
    // Si non, on enregistre l'utilisateur, on récupère son ID, puis on enregistre le message
    $bdd->prepReq('INSERT INTO user(pseudo,age,ville) VALUES(?,?,?)',array($pseudo,$age,$ville));

    $res = $bdd->prepReq('SELECT id FROM user WHERE pseudo=?',array($pseudo));
    $donnees = $res->fetch();
    $bdd->prepReq('INSERT INTO msg(id_user,dat,msg) VALUES(?,NOW(),?)',array($donnees['id'],$msg));
  }

  header('Location: chat.php');
?>
