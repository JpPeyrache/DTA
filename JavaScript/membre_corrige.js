// On écrit la définition de l'objet Membre

function Membre(pseudo,pass,grade){

// On définit le constructeur, qui enregistre les valeurs dans les propriétés correspondantes
  this.pseudo = pseudo;
  this.pass = pass;
  this.grade = grade;

// On fait une fonction toString pour afficher notre objet
  Membre.prototype.toString = function(){
    return "Pseudo : " + this.pseudo + ", de grade " + this.grade;
  }

// On fait une fonction connexion pour vérifier le mot de passe
  Membre.prototype.connexion = function(password){
    if(this.pass == password)
      return "Bon mot de passe !";
    else
      return "Mauvais mot de passe !";
  }
}

// On écrit la définition de l'objet Equipe

function Equipe(){

// On initialise la liste des membres comme étant vide
  this.list = [];

// On crée des fonctions d'ajout, de suppression et d'affichage des membres
  Equipe.prototype.ajoutMembre = function(membre){
    this.list.push(membre);
  }

  Equipe.prototype.suppressionMembre = function(membre){
    for(var i=0;i<this.list.length;i++){
      if(this.list[i] == membre)
        this.list.splice(i,1);
    }
  }

  Equipe.prototype.afficherMembres = function(){
    for(var i=0;i<this.list.length;i++)
      console.log(this.list[i]+"\n");
  }
}

// On écrit la définition de l'objet Administrateur

function Administrateur(pseudo,pass,grade){

// On appelle le constructeur de Membre
  Membre.call(this,pseudo,pass,grade);

// On crée une fonction permettant de créer de nouveaux membres
  Administrateur.prototype.creationMembre = function(pseudo,motdepasse,grade){
    return new Membre(pseudo,motdepasse,grade);
  }
}
