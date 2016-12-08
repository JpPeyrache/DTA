<?php
class Fichier{
   private $_nomFichier;

   public function __construct($file){
     $this->_nomFichier = $file;
   }

   public function lire(){
     $file = fopen($this->_nomFichier,"r");
     $contenu = "";
     while($line=fgets($file)){
       $contenu .= $line;
     }
     fclose($file);
     return $contenu;
   }

   public function ecrire($contenu){
     $file = fopen($this->_nomFichier,"w");
     fputs($file,$contenu);
     fclose($file);
   }
}

?>
