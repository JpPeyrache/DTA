<?php
  // La création de sessions et de cookies doit être la première chose faite dans une page, avant même le code html

  // Si la session n'existe pas, elle est créée, sinon elle est rappelée
  session_start();

  // On crée un cookie en indiquant son nom, sa valeur et son temps avant expiration
  setcookie('pseudo',$_POST['nom'],time()+365*24*3600);
  setcookie('pays','France',time()+365*24*3600);
 ?>

<html>

  <head>
    <title>Traitement de mon formulaire</title>

  </head>
  <body>
    <!-- Bien penser  à utiliser les fonctions htmlspecialchars (pour afficher les balises)
    ou strip_tags (pour supprimer les balises), afin d'éviter l'injection de code HTML par les formulaires -->
    <p>Votre nom est <?php echo strip_tags($_POST['nom']);?></p>

    <!-- On peut récupérer les informations sur un fichier passé par un formulaire (bien rajouter enctype="multipart/form-date" dans la balise form) -->
    <?php
      // Son nom
      echo $_FILES['fichier']['name'];
      // On le déplace ensuite vers le répertoire courant pour le consever
      move_uploaded_file($_FILES['fichier']['tmp_name'],"./".$_FILES['fichier']['name']);

      // Si la session a été créée, on peut enregistrer des données qui seront accessibles tout au long de la navigation
      $_SESSION['pseudo'] = $_POST['nom'];

      // On peut lire et écrire des fichiers en PHP, d'abord en ouvrant le fichier (r pour lecture, w pour écriture, a pour ajout)
      $fichier = fopen("test.txt","r+");

      // On peut lire ligne par ligne (avec fgets) ou caractère par caractère (avec fgetc)
      while($char = fgetc($fichier)){
        echo $char."<br />";
      }

      // On peut également écrire avec fputs, et replacer le curseur avec fseek
      fputs($fichier,"\nFIN");
      fseek($fichier,0);
      fputs($fichier,"DEBUT\n");

      // Enfin, il faut toujours penser à fermer le fichier à la fin de la procédure
      fclose($fichier);
    ?>
  </body>

</html>
