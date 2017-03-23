<?php
class BdD{

  private $_host = "localhost";
  private $_user = "root";
  private $_pass = "root";
  private $_base = "Chat";

  private $_connexion;

  public function __construct(){
    try{
      $path = 'mysql:host='.$this->_host.';dbname='.$this->_base.';charset=utf8';
      $this->_connexion = new PDO($path, $this->_user, $this->_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }
  }

  public function prepReq($query,$array){
    $req = $this->_connexion->prepare($query);
    $req->execute($array);
    return $req;
  }

  public function req($query){
    return $this->_connexion->query($query);
  }

}
?>
