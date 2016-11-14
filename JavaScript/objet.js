// On écrit la définition de l'objet Personne, qui aura comme propriétés un nom, un prenom
// un age et un tableau d'amis

function Personne(nom,prenom,age,amis){

// On définit le constructeur, qui enregistre les valeurs dans les propriétés correspondantes
  this.prenom = prenom;
  this.nom = nom;
  this.age = age;
  this.amis = amis;

// On fait une fonction présentation, qui affiche le nom, le prénom et l'age de notre Personne
  Personne.prototype.presentation = function(){
    console.log("Bonjour, je m'appelle " + this.prenom + " " + this.nom + " et j'ai " + this.age + " ans");
  }

// On fait une fonction qui ajoute un ami dans le tableau d'amis de la Personne
  Personne.prototype.ajoutAmi = function(ami){
    this.amis.push(ami);
  }
}

// On écrit la définition de l'objet Etudiant, qui hérite de Personne, mais qui possède
// une propriété supplémentaire : un numéro d'étudiant

function Etudiant(nom,prenom,age,amis,num){
  Personne.call(this,nom,prenom,age,amis);
  this.numeroEtudiant = num;
}

// On déclare que Etudiant doit avoir les mêmes actions que Personne, à l'exception du constructeur
// qui sera celui d'Etudiant, que nous venons de déclarer
Etudiant.prototype = Object.create(Personne.prototype);
Etudiant.prototype.constructor = Etudiant;

// On peut ensuite déclarer des instances de nos objets, en donnant des valeurs aux différentes
// propriétés, et utiliser les actions définies
var michael = new Personne("Poncet","Michael",37,[]);

console.log(michael.prenom);
michael.presentation();

var jimmy = new Etudiant("Fragne","Jimmy",24,[],"20160104");

jimmy.presentation();
console.log(jimmy.numeroEtudiant);
console.log(jimmy.amis);
jimmy.ajoutAmi(michael);
console.log(jimmy.amis);
