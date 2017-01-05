<?php

  // On supprime les espaces du champ de titre et on enregistre les contenus dans des variables (plus faciles à manipuler)
  $titre = str_replace(" ", "", htmlspecialchars($_POST['titre']));
  $zoneTexte = $_POST['zoneTexte'];

  // On vérifie que le titre ne soit pas vide
  if (empty($titre)){
    echo "Champ obigatoire";
  }else{
    // On vérifie que le fichier puisse bien se créer (ne pas oublier de créer le dossier articles)
    if($fichier = fopen("articles/$titre.html","a")){
      // Si oui, on enregistre le contenu de l'article
      fputs($fichier,$zoneTexte);
      fclose($fichier);

      echo "Le fichier a bien été enregistré";
    }else{
      echo "Problème lors de la création du fichier";
    }
  }

 ?>
