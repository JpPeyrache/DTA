<?php
/* Les balises php sont les suivantes <?php ?>
php est un langage de programmation qui a pour but de traiter les informations
et de les renvoyer pour affichage en HTML. PHP n'est pas interprétable
par le navigateur */

// Les variables php peuvent contenir n'importe quel type, elles sont déclarées avec $
$age = 17;
$nom = str_shuffle("Machin Truc");

// echo permet d'afficher des éléments. Ce sont les seuls éléments qui seront visibles
// Ils peuvent contenir des balises HTML, qui seront interprétées par le navigateur
echo "Nom : $nom et age : $age<br />";
echo '<h1>Nom : $nom et age : $age</h1>';

// Les conditions ont une forme classique, les opérateurs sont les suivants
// <,>,==,!=,>=,<= && (ou AND), || (ou OR)
// On peut utiliser if, else, elseif, switch...

if($age > 18){
  $majeur = true;
}else{
  $majeur = false;
}

// Cette condition peut aussi être déclarée de la manière suivante :
// (condition)?reponsesivrai:reponsesifaux
$majeur = ($age > 18)?true:false;

// Les boucles se font classiquement, ainsi avec while ou for($i=0,$i<10;$i++)
$i = 0;
while($i < 10){
  echo"$i<br />";
  $i++;
}

// include permet d'inclure le code d'une page à l'intérieur d'une autre (copier-coller)
// Utile pour éviter la répétition de code dans plusieurs pages (en-tête, menu de côté)
include("index.html");

// Plusieurs fonctions sont prédéfinies pour les chaînes de caractères
// strlen, str_replace, str_shuffle, strtolower, strtoupper...
// Mais aussi pour les dates : date('d-m-Y')

// Une fonction se déclare de la manière suivante
function DireBonjour($nom){
  echo "Bonjour $nom<br />";
}

// Un tableau se construit avec array()
$prenoms = array("Michel","Marie","Nicole");

// Un appel de fonction
DireBonjour($prenoms[0]);

// Il est aussi possible de définir des tableaux associatifs, qui indexe les éléments
// non pas avec des indices mais avec des clés au format texte
$coordonnees = array(
  'prenom' => 'Martin',
  'nom' => 'Durand',
  'ville' => 'Roanne'
);

// On accède ainsi à l'élément associé à la clé
echo $coordonnees['ville']."<br />";

// foreach permet de parcourir tous les éléments d'un tableau à l'aide d'une variable
// qui prend les valeurs successives
foreach ($prenoms as $elem) {
  echo "$elem<br />";
}

// Des fonctions prédéfinies existent aussi pour les tableaux
// array_key_exists, in_array, array_search...

// isset() permet de vérifier si une variable est existante et contient une valeur
// $_GET permet de récupérer les valeurs des éléments envoyés par le protocole GET (par l'URL)
// $_POST permet de récupérer les valeurs des éléments envoyés par le protocole POST
if(isset($_GET['nom']) && isset($_GET['prenom'])){
  echo "Bonjour ".$_GET['prenom']." ".$_GET['nom'];
}else{
  echo "Bonjour<br />";
}
 ?>
