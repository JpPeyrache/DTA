<?php
  session_start();
  if(isset($_POST['pseudo']) && isset($_POST['age']) && isset($_POST['ville'])){
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['ville'] = $_POST['ville'];
  }
  include('BdD.class.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Chat</title>
    <!-- <META HTTP-EQUIV="refresh" CONTENT="5"> -->
    <style>
      .chat{
        height: 500px;
        width: 500px;
        background-color: antiquewhite;
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
      $bdd = new BdD();

      $res = $bdd->req("SELECT id_user,msg,DATE_FORMAT(dat,'%d/%m/%Y') AS date FROM msg");

      while($donnees = $res->fetch()){
        $msg = $bdd->prepReq('SELECT pseudo FROM user WHERE id=?',array($donnees['id_user']))->fetch();
        echo "<div class=\"msg\">";
        echo $msg['pseudo']." le ".$donnees['date']. " : ".$donnees['msg'];
        echo "</div>";
      }
     ?>
    </div>
    <form method="post" action="envoi.php">
      Ecrivez votre message : <input type="text" name="msg" /><input type="submit" value="Envoyer" />
    </form>
  </body>
</html>
