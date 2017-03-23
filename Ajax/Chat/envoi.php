<?php
  session_start();
  include('BdD.class.php');
  include('Chat.class.php');

  // Récupération des variables de session
  $pseudo = $_SESSION['pseudo'];
  $age = $_SESSION['age'];
  $ville = $_SESSION['ville'];
  $msg = $_POST['msg'];

  $chat=new Chat(new BdD());

  // On regarde si l'utilisateur existe
  if($id = $chat->getIdUser($pseudo)){
    // Si oui, on enregistre le message
    $chat->saveMessage($msg,$id);
  }else{
    // Si non, on enregistre l'utilisateur, on récupère son ID, puis on enregistre le message
    $chat->saveUser($pseudo,$age,$ville);
    $id = $chat->getIdUser($pseudo);
    $chat->saveMessage($msg,$id);
  }

   $date = date("d/m/Y");
   echo "<div class=\"msg\">".$pseudo." le ".$date. " : ".$msg."</div>";
?>
