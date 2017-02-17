// Les variables peuvent être de forme numérique, chaîne de caractères ou booléene

var entier = 8;
var chiffre = 5.14;
var chaine = "Bonjour";
var booleen = true;

// console.log() permet d'afficher une valeur sur la console

console.log(entier);
console.log(chaine);

// Le + est un opérateur d'addition pour les valeurs numériques et de concaténation pour les chaînes de caractèriques
// Multiplication : *, Division : /, Soustraction : -, Modulo : %

console.log(chiffre+3);
chaine = chaine+" !";
console.log(chaine);

// alert(message) permet d'ouvrir une message box, prompt(message) permet en plus de récupérer une réponse de l'utilisateur

alert(chaine);
prompt("Quel est votre âge ?");

// Les conditions permettent d'effectuer des opérations si certains critères sont vérifiés
// Les opérateurs de comparaison sont les suivants : == (égalité de valeur), === (égalité de type et de valeur)
// != (différence de valeur), !== (différence de type et de valeur), <, <=, >, >=

if(age == 18){
  console.log("Vous êtes tout juste majeur");
}else if(age < 18){
  console.log("Vous êtes mineur");
}else{
  console.log("Vous êtes majeur");
}

// Pour vérifier plusieurs conditions, il faut utiliser les opérateurs logiques ET (&&) et OU (||)

if((age < 18) && (age > 13)){
  console.log("Vous êtes un adolescent");
}

// Les fonctions sont de sous-procédures réutilisables. Il faut les déclarer avant de les appeler
// La fonction carre prend un argument x, qui n'existe que le temps de la fonction

function carre(x){
  console.log(x*x);
}

// Lors de l'appel de la fonction, il ne faut donc pas oublier de lui fournir un argument

carre(chiffre);
carre(entier);
carre(4);
carre(12);
