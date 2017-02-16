<?php
  session_start();
  include('BdD.class.php');

  $pseudo = $_SESSION['pseudo'];
  $age = $_SESSION['age'];
  $ville = $_SESSION['ville'];
  $msg = $_POST['msg'];

  $bdd = new BdD();

  $res = $bdd->prepReq('SELECT id FROM user WHERE pseudo=?',array($pseudo));
  $donnees = $res->fetch();
  if($id = $donnees['id']){
    $bdd->prepReq('INSERT INTO msg(id_user,dat,msg) VALUES(?,NOW(),?)',array($id,$msg));
  }else{
    $bdd->prepReq('INSERT INTO user(pseudo,age,ville) VALUES(?,?,?)',array($pseudo,$age,$ville));

    $res = $bdd->prepReq('SELECT id FROM user WHERE pseudo=?',array($pseudo));
    $donnees = $res->fetch();
    $bdd->prepReq('INSERT INTO msg(id_user,dat,msg) VALUES(?,NOW(),?)',array($donnees['id'],$msg));
  }

  header('Location: chat.php');
?>
