<?php
// Classe MonstreFacile, qui représente un monstre de niveau facile

class MonstreFacile{

  private $_monstre;
  private $_sante;
  private $_force;

  // Constructeur de la classe MonstreFacile, initialisation des attributs
  public function __construct($nom){
    $this->_monstre=$nom;
    $this->_sante=50;
    $this->_force=5;
  }

  // Fonction qui renvoie le nom du monstre
  public function getNom(){
    return $this->_monstre;
  }

  // Fonction qui renvoie la santé du monstre
  public function getSante(){
    return $this->_sante;
  }

  // Fonction qui permet au monstre d'attaquer le joueur
  public function attaqueJoueur($de){
    return $this->_force * $de;
  }

  // Fonction qui retire les points de vie correspondants au monstre
  public function subitDegats($degats){
    $this->_sante -= $degats;
  }

  // Fonction qui indique si un monstre est encore vivant
  public function estVivant(){
    return $this->_sante>0?true:false;
  }
}
?>
