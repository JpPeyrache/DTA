<?php
// Fonction permettant de charger automatiquement les classes nécessaires
  function __autoload($class_name) {
    include $class_name . '.class.php';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mon petit jeu de combat</title>
  </head>
  <body>
    <?php
      // Si on a reçu un pseudo, on lance la partie
      if(isset($_POST['pseudo'])){
        $pseudo = $_POST['pseudo'];

        // On crée un nouveau joueur pour la partie
        $joueur = new Joueur($pseudo);

        // On initialise le dé pour la partie
        $de = new De();

        // On compte le nombre de combats
        $nb = 1;

        // Tant que le joueur est vivant, il combat un monstre
        while($joueur->estVivant()){
          // On affiche le numéro du combat
          echo("<strong>Combat numéro " . $nb . "</strong><br /><br />");

          // On initialise un nouveau monstre facile
          $monstre = new MonstreFacile("Ivan le Terrible");
          echo($joueur->getPseudo() . " est prêt à affronter " . $monstre->getNom() . "<br /><br />");

          // Tant que le monstre est vivant (et le joueur aussi), le combat se déroule
          while($monstre->estVivant() && $joueur->estVivant()){
            // On lance le dé pour déterminer la force de l'attaque
            $degats = $joueur->attaqueMonstre($de->lanceDe());
            $monstre->subitDegats($degats);

            echo($monstre->getNom() . " a subi " . $degats . " de dégats<br />");
            echo("Il lui reste " . $monstre->getSante() . " de santé<br /><br />");

            // Le monstre attaque à son tour et le joueur essaye de se protéger
            $degats = $monstre->attaqueJoueur($de->lanceDe());
            $joueur->activeBouclier($de->lanceDe());
            $joueur->subitDegats($degats);

            echo($joueur->getPseudo() . " a subi " . $degats . " de dégats<br />");
            echo("Il lui reste " . $joueur->getSante() . " de santé<br /><br />");

          }
          $nb++;
          
	  // On regarde si le joueur est toujours vivant
          if($joueur->estVivant()){
            echo("Bravo, " . $joueur->getPseudo() . " a tué le monstre " . $monstre->getNom() . "<br /><br />");
          }
        }

        // Message si le joueur est mort
        echo($joueur->getPseudo() . " est mort, tué par le monstre " . $monstre->getNom() . "<br />");
      }else{
        // Sinon, on affiche le formulaire pour que le joueur entre son pseudo
    ?>
    <form method="post" action="jeu.php">
      <label for="pseudo">Pseudo : </label><input type="text" name="pseudo" />
      <br />
      <input type="submit" value="Commencer le jeu" />
    </form>
    <?php
      }
    ?>
  </body>
</html>
