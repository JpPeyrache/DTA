// Classe Test permettant de vérifier les résultats
class Test{
	static assertSimilar(a,b){
		if(a instanceof Array){
			if(_.isequal(a,b))
				console.log(a + " " + b + " : Test ok");
			else
				console.log(a + " " + b + " : Test raté");
		}else{
			if(a === b)
				console.log(a + " " + b + " : Test ok");
			else
				console.log(a + " " + b + " : Test raté");
		}
	}
}

// Renvoie le max de deux éléments

function max_2(a,b){
	return a>b?a:b;
}

// Batterie de tests

console.log("Tests max_2");

Test.assertSimilar(max_2(2,3),3);
Test.assertSimilar(max_2(-1,8),8);
Test.assertSimilar(max_2("abc","bcd"),"bcd");

console.log("\n");

// Renvoie le max de trois éléments

function max_3(a,b,c){
	if(a>b){
		if(a>c)
			return a;
		else
			return c;
	}else if(b>c)
			return b;
		else
			return c;
}

// Batterie de tests

console.log("Tests max_3");

Test.assertSimilar(max_3(2,3,4),4);
Test.assertSimilar(max_3(5,-1,8),8);
Test.assertSimilar(max_3("abc","bcd","def"),"def");

console.log("\n");

// Teste si un caractère est ou non une voyelle

function voyelle(c){
	return (c=="a" || c=="e" || c=="i" || c=="o" || c=="u" || c=="y")?true:false;
}

// Batterie de tests

console.log("Tests voyelle");

Test.assertSimilar(voyelle("a"),true);
Test.assertSimilar(voyelle("b"),false);
Test.assertSimilar(voyelle("1"),false);

console.log("\n");

// Teste si une chaine contient ou non une voyelle

function contient_voyelle(str){

	for(var i=0;i<str.length;i++){
		if(voyelle(str[i]))
			return true;
	}

	return false;
}

// Batterie de tests

console.log("Tests contient_voyelle");

Test.assertSimilar(contient_voyelle("abba"),true);
Test.assertSimilar(contient_voyelle("1234"),false);

console.log("\n");

// "Traduit" une chaine en doublant chaque consonne et en insérant un o entre les deux

function translate(str){
	var newStr = "";

	for(var i=0;i<str.length;i++){
		if(voyelle(str[i]))
			newStr += str[i];
		else
			newStr += str[i]+"o"+str[i];
	}

	return newStr;
}

// Batterie de tests

console.log("Tests translate");

Test.assertSimilar(translate("test"),"totesostot");
Test.assertSimilar(translate("aey"),"aey");
Test.assertSimilar(translate("bfb"),"bobfofbob");

console.log("\n");

// Inverse une chaine de caractères

function reverse(str){
	var newStr = "";

	for(var i=str.length-1;i>=0;i--){
		newStr += str[i];
	}

	return newStr;
}

// Batterie de tests

console.log("Tests reverse");

Test.assertSimilar(reverse("kayak"),"kayak");
Test.assertSimilar(reverse("test"),"tset");
Test.assertSimilar(reverse("1234"),"4321");

console.log("\n");

// Fait la somme de tous les éléments d'un tableau

function sum(tab){
	var res = 0;

	for(var i=0;i<tab.length;i++)
		res += tab[i];

	return res;
}

// Batterie de tests

console.log("Tests sum");

Test.assertSimilar(sum([1,2,3]),6);
Test.assertSimilar(sum([4,5,6]),15);

console.log("\n");

// Fait le produit de tous les éléments d'un tableau

function mult(tab){
	var res = 1;

	for(var i=0;i<tab.length;i++)
		res *= tab[i];

	return res;
}

// Batterie de tests

console.log("Tests mult");

Test.assertSimilar(mult([1,2,3]),6);
Test.assertSimilar(mult([4,5,6]),120);

console.log("\n");

// Renvoie la chaine de longueur maximale dans un tableau

function longueur_max(tab){
	var res = "";

	for(var i=0;i<tab.length;i++){
		if(tab[i].length > res.length)
			res = tab[i];
	}

	return res;
}

// Batterie de tests

console.log("Tests longueur_max");

Test.assertSimilar(longueur_max(["a","aa","aaa"]),"aaa");
Test.assertSimilar(longueur_max(["aaa","bb","c"]),"aaa");

console.log("\n");

// Renvoie le tableau contenant toutes les chaines de longueur au moins égale à i

function longueur_sup(tab,i){
	var res = [];

	for(var j=0;j<tab.length;j++){
		if(tab[j].length>=i)
			res.push(tab[j]);
	}

	return res;
}

// Batterie de tests

console.log("Tests longueur_sup");

Test.assertSimilar(longueur_sup(["test","a","bonjour","voila"],4),["test","bonjour","voila"]);
Test.assertSimilar(longueur_sup(["test","a","bonjour","voila"],6),["bonjour"]);
Test.assertSimilar(longueur_sup(["test","a","bonjour","voila"],8),[]);

console.log("\n");

// Renvoie une chaine contenant la première lettre de chacune des chaines du tableau

function premieres_lettres(tab){
	var str = "";

	for(var i=0;i<tab.length;i++){
		str += tab[i][0];
	}

	return str;
}

console.log("Tests premieres_lettres");

Test.assertSimilar(premieres_lettres(["test","a","bonjour","voila"]),"tabv");
Test.assertSimilar(premieres_lettres(["ceci","est","un","test"]),"ceut");
