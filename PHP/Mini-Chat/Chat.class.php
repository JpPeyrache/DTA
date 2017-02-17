<?php

class Chat{

  private $_bdd;

  public function __construct($bdd){
    $this->_bdd = $bdd;
  }

  public function getIdUser($pseudo){
    $res = $this->_bdd->prepReq('SELECT id FROM user WHERE pseudo=?',array($pseudo));
    $donnees = $res->fetch();
    return $donnees['id'];
  }

  public function saveMessage($msg,$id){
    $this->_bdd->prepReq('INSERT INTO msg(id_user,dat,msg) VALUES(?,NOW(),?)',array($id,$msg));
  }

  public function saveUser($pseudo,$age,$ville){
    $this->_bdd->prepReq('INSERT INTO user(pseudo,age,ville) VALUES(?,?,?)',array($pseudo,$age,$ville));
  }

  public function setConnexion($id){
    $query = "UPDATE user SET connexion=NOW() WHERE Id=".$id;
    $this->_bdd->req($query);
  }

  public function getMessages(){
    $res = $this->_bdd->req("SELECT id_user,msg,DATE_FORMAT(dat,'%d/%m/%Y') AS date FROM msg");
    $string = "";

    while($donnees = $res->fetch()){
      $msg = $this->_bdd->prepReq('SELECT pseudo FROM user WHERE id=?',array($donnees['id_user']))->fetch();
      $string .= "<div class=\"msg\">";
      $string .= $msg['pseudo']." le ".$donnees['date']. " : ".$donnees['msg'];
      $string .= "</div>";
    }

    return $string;
  }

  public function getActiveUsers(){
    $string = "";

    $res = $this->_bdd->req("SELECT pseudo,age,ville FROM user WHERE TIMEDIFF(NOW(),connexion) < '00:05:00'");

    while($donnees = $res->fetch()){
      $string .= "<span title=\"".$donnees['age']." ans, ".$donnees['ville']."\">".$donnees['pseudo']."</span><br />";
    }

    return $string;
  }

}
?>
