<?php
abstract class User{
    protected $nom;
    protected $prenom;
    protected $id;

    public function __construct($nom,$prenom,$id){
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->id = $id;
    }

    public function getNom(){
      return $this->nom;
    }

    public function getPrenom(){
      return $this->prenom;
    }

    public function setNom($newNom){
      $this->nom = $newNom;
    }

    public function setPrenom($newPrenom){
      $this->prenom = $newPrenom;
    }

    public function getId(){
      return $this->id;
    }

    abstract public function presentation();
}
?>
