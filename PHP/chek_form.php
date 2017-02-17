<!DOCTYPE html>
<?php
  $name = $_POST['name'];
  $age = $_POST['age'];
?>

<html lang="fr">

  <head>

    <meta charset="utf-8" />
    <title>Page de vérification de formulaire</title>

  </head>

  <body>
    <!-- On procède à un affichage des données, avec quelques conditions pour différencier
    certains cas -->
    Votre nom est
    <?php
      if(isset($name))
        echo(htmlspecialchars(" ".$name)." ");
    ?>
    et contient
    <?php
      if(isset($name))
        echo(strlen(" ".$name)." ");
    ?>
    caractères.<br />
    Vous avez
    <?php
      if(isset($age))
        echo(htmlspecialchars(" ".$age)." ");
    ?>
    ans et vous êtes
    <?php
      if(isset($age)){
          if($age > 17)
            echo " majeur.<br />";
          else
            echo " mineur.<br />";
      }
    ?>
  </body>

</html>
