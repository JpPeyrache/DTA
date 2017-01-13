<?php
// Classe dé qui simule le fonctionnement d'un dé à 6 faces

class De{

  private $_faces;

  // Constructeur de ma classe dé
  public function __construct(){
    $this->_faces = 6;
  }

  // Permet de lancer le dé et de récupérer une valeur entre 1 et 6
  public function lanceDe(){
    return rand(1,$this->_faces);
  }
}
?>
