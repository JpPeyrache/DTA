<?php
require ("Fichier.class.php");

class FichierCSV extends Fichier{

   private $_charSepar;

   public function __construct($file,$char){
     parent::__construct($file);
     $this->_charSepar = $char;
   }

   public function changeChar($newChar){

   }
}

?>
