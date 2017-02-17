<?php
  session_start();

  // Création de la session
  if(isset($_POST['pseudo']) && isset($_POST['age']) && isset($_POST['ville'])){
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['ville'] = $_POST['ville'];
  }
  include('BdD.class.php');

  $bdd = new BdD();

  // Récupération de l'ID de l'utilisateur et mise à jour de la date de dernière connexion
  $res = $bdd->prepReq('SELECT id FROM user WHERE pseudo=?',array($_SESSION['pseudo']));
  $donnees = $res->fetch();
  if($donnees['id']){
    $query = "UPDATE user SET connexion=NOW() WHERE Id=".$donnees['id'];
    $bdd->req($query);
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
      $res = $bdd->req("SELECT id_user,msg,DATE_FORMAT(dat,'%d/%m/%Y') AS date FROM msg");

      while($donnees = $res->fetch()){
        $msg = $bdd->prepReq('SELECT pseudo FROM user WHERE id=?',array($donnees['id_user']))->fetch();
        echo "<div class=\"msg\">";
        echo $msg['pseudo']." le ".$donnees['date']. " : ".$donnees['msg'];
        echo "</div>";
      }
     ?>
    </div>
    <div class="users">
      <strong>Utilisateurs actifs</strong>
      <br />
      <br />
    <?php
      // Récupération et affichage des utilisateurs actifs dans les cinq dernières minutes
      $res = $bdd->req("SELECT pseudo,age,ville FROM user WHERE TIMEDIFF(NOW(),connexion) < '00:05:00'");

      while($donnees = $res->fetch()){
        echo "<span title=\"".$donnees['age']." ans, ".$donnees['ville']."\">".$donnees['pseudo']."</span><br />";
      }
    ?>
    </div>
    <!-- Formulaire d'envoi de message -->
    <form method="post" action="envoi.php">
      Ecrivez votre message : <input type="text" name="msg" /><input type="submit" value="Envoyer" />
    </form>
  </body>
</html>
