// On écrit la définition de l'objet Personne, qui aura comme propriétés un nom, un prenom et un age

function Personne(nom,prenom,age){

// On définit le constructeur, qui enregistre les valeurs dans les propriétés correspondantes
  this.prenom = prenom;
  this.nom = nom;
  this.age = age;

// On fait une fonction présentation, qui affiche le nom, le prénom et l'age de notre Personne
  Personne.prototype.presentation = function(){
    console.log("Bonjour, je m'appelle " + this.prenom + " " + this.nom + " et j'ai " + this.age + " ans");
  }
}

// On écrit la définition de l'objet Etudiant, qui hérite de Personne, mais qui possède
// deux propriétés supplémentaires : un tableau de notes et une filière

function Etudiant(nom,prenom,age,tab,filiere){
  Personne.call(this,nom,prenom,age);
  this.tableauNotes = tab;
  this.filiere = filiere;

  Etudiant.prototype.moyenne = function(){
    var sum = 0;

    for(var i=0;i<this.tableauNotes.length;i++)
      sum += this.tableauNotes[i];

    return sum/this.tableauNotes.length;
  }
}

// On déclare que Etudiant doit avoir les mêmes actions que Personne, à l'exception du constructeur
// qui sera celui d'Etudiant, que nous venons de déclarer
Etudiant.prototype = Object.create(Personne.prototype);
Etudiant.prototype.constructor = Etudiant;

// On écrit la définition de l'objet Professeur, qui hérite de Personne, mais qui possède
// la propriété supplémentaire filiere

function Professeur(nom,prenom,age,filiere){
  Personne.call(this,nom,prenom,age);
  this.filiere = filiere;

  // On prend en entrée une liste d'étudiants et on renvoie ceux qui sont dans la même
  // filière que le professeur concerné

  Professeur.prototype.liste_etudiants = function(list){
    var tab = [];

    for(var i=0;i<list.length;i++){
      if(list[i].filiere == this.filiere)
        tab.push(list[i]);
    }

    return tab;
  }
}

Professeur.prototype = Object.create(Personne.prototype);
Professeur.prototype.constructor = Professeur;

function Cours(prof,tab){
  this.professeur = prof;
  this.tabEtudiants = tab;

  // On prend en entrée un étudiant et on le rajoute dans la liste des inscrits au cours

  Cours.prototype.inscription = function(etudiant){
    this.tabEtudiants.push(etudiant)
  }

  // On prend la liste de tous les étudiants inscrits au cours et on renvoie un tableau
  // contenant leurs moyenens

  Cours.prototype.moyennes = function(){
    var tab = [];

    for(var i=0;i<this.tabEtudiants.length;i++)
      tab.push(this.tabEtudiants[i].moyenne());

    return tab;
  }
}

// On peut ensuite déclarer des instances de nos objets, en donnant des valeurs aux différentes
// propriétés, et utiliser les actions définies
var michael = new Personne("Poncet","Michael",37);

console.log(michael.prenom);
michael.presentation();

var jimmy = new Etudiant("Fragne","Jimmy",24,[15,12,19],"DTA");

jimmy.presentation();
jimmy.moyenne();
