<?php
  session_start();
  include('BdD.class.php');
  include('Chat.class.php');

  // Création de la session
  if(isset($_POST['pseudo']) && isset($_POST['age']) && isset($_POST['ville'])){
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['ville'] = $_POST['ville'];
  }

  $chat=new Chat(new BdD());

  // Récupération de l'ID de l'utilisateur et mise à jour de la date de dernière connexion
  if($id = $chat->getIdUser($_SESSION['pseudo'])){
    $chat->setConnexion($id);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Chat</title>
    <META HTTP-EQUIV="refresh" CONTENT="30">

    <style>
      .chat{
        height: 500px;
        width: 500px;
        background-color: antiquewhite;
        display: inline-block;
      }
      .users{
        height: 200px;
        width: 500px;
        background-color: purple;
        display: inline-block;
        color : white;
        padding: 15px;
        position :absolute;
      }
      .msg{
        display: block;
        color: grey;
        font-size: 12;
      }
    </style>
    
  </head>

  <body>

    <div class="chat">
    <?php
      // Récupération et affichage des messages
      echo $chat->getMessages();
     ?>
    </div>

    <div class="users">
      <strong>Utilisateurs actifs</strong>
      <br />
      <br />
    <?php
      // Récupération et affichage des utilisateurs actifs dans les cinq dernières minutes
      echo $chat->getActiveUsers();
    ?>
    </div>

    <!-- Formulaire d'envoi de message -->
    <form method="post" action="envoi.php">
      Ecrivez votre message : <input type="text" name="msg" /><input type="submit" value="Envoyer" />
    </form>

  </body>
</html>
