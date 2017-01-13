<!DOCTYPE html>
<?php
  require("Form.class.php");
  require("Champ.class.php");
?>

<html>

  <head>
    <title>Page de génération de formulaire</title>
  </head>

  <body>
    <?php
      if(isset($_POST['nom']) && isset($_POST['age'])){
        echo "Vous vous appelez ".$_POST['nom']." et vous avez ".$_POST['age']." ans";
      }else{
        // On crée un nouvel objet formulaire
        $formulaire = new Form("test","post","index.php");
        // On ajoute des champs en précisant leur type et leur nom
        $formulaire->ajouteChamp(new Champ("text","nom"));
        $formulaire->ajouteChamp(new Champ("number","age"));
        // On génère le formulaire pour l'afficher dans la page HTML
        $formulaire->generer();
      }
     ?>
  </body>

</html>
