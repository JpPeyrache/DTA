// Les tableaux permettent de stocker plusieurs éléments dans un même objet, quel que soit leur type

var tab = [1,2,3];
var tab_bis = ["test",5,true];

// On peut accéder aux différents éléments à l'aide de leur index, commençant par 0

console.log(tab[0]);
console.log(tab_bis[2]);
console.log(tab[3]);

// Des fonctions ou propriétés sont définies par rapport aux tableaux, comme pour d'autres types

// La longueur
console.log(tab.length);

// L'ajout d'un élément en fin de tableau puis la suppression de l'élément de tête
tab.push(4);
tab.shift();

console.log(tab.length);
console.log(tab);

// La boucle for se compose de trois parties, séparées par des ; La première concerne l'initialisation, la deuxième la condition, la troisième l'évolution de la variable (incrémentation ou décrémentation)

for(var i = 0;i<tab_bis.length;i++){
	console.log(tab_bis[i]);
}

// Les boucles for peuvent aussi être utilisées de cette manière avec les tableaux, prenant les valeurs d'index successives

for(var i in tab_bis){
	console.log(tab_bis[i]);
}

// Les boucles while ne contiennent qu'une condition, il ne faut pas oublier l'initialisation et l'évolution de la variable

i = 0;
while(i < tab_bis.length){
	console.log(tab_bis[i]);
	i++;
}

i = 2;

// La boucle do{}while() teste la condition après avoir effectué les instructions

do{
	console.log(tab[i]);
	i++;
}while(i < tab.length);

// Le bloc switch permet de tester la valeur d'une variable particulière et de gérer les différents cas

switch(i){
	case 1 :
		i++;
		break;
	case 2 :
		i--;
		break;
	default :
		i = -1;
		break;
}

console.log("i est égal à " + i);

// Une chaine de caractères est en fait un tableau de caractères

var chaine = "CHAINE";

// Comme pour les tableaux, les chaines possèdent des fonctions et propriétés prédéfinies et accessibles

for(i = 0;i<chaine.length;i++){
	console.log("La lettre à l'indice " + i + " est " + chaine[i].toLowerCase());
}

// typeof permet de tester le type d'une variable

if((typeof chaine === String) && (typeof i === Number))
	console.log("C'est bon");

// Les fonctions prennent un certain nombre de paramètres et renvoient une valeur

function add(a,b){
	return (a+b);
}

function mult(a,b){
	console.log(a*b);
}

// On peut ensuite récupérer la valeur retournée par la fonction, à laquelle on a fourni les paramètres

var sum_1 = add(3,7);
var sum_2 = add(i,12);
var mult = mult(3,7);

console.log(sum_1 + " " + sum_2 + " " + mult);
